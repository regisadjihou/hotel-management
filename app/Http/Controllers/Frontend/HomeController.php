<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Config;
use Stripe\Stripe;
use Stripe\Checkout\Session;
class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::where('status',1)->get();

        return view('frontend.modules.index',compact('rooms'));
    }
    public function contact()
    {
        return view('frontend.modules.contact');
    }
    public function about()
    {
        return view('frontend.modules.about');
    }

    public function room()
    {
        $rooms = Room::where('status',1)->get();
        return view('frontend.modules.room',compact('rooms'));
    }
    public function room_details($id)
    {
        $room = Room::findOrFail($id);
        return view('frontend.modules.room-details',compact('room'));
    }
    public function booking($id)
    {
        $room = Room::findOrFail($id);
        return view('frontend.modules.booking',compact('room'));
    }
    public function service()
    {
        return view('frontend.modules.service');
    }
    public function team()
    {
        return view('frontend.modules.team');
    }
    public function testimonial()
    {
        return view('frontend.modules.testimonial');
    }
    public function book_room(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt("password");
            $user->type = "user";


            $user->save();
        }
        $booking = Booking::create([
            'room_id' => $request['room_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'checkin' => $request['checkin'],
            'checkout' => $request['checkout'],
            'adults' => $request['adults'],
            'child' => $request['child'],
            'note' => $request['note'],
            'payment_status' => 0,
            'payment_method' => "None",
        ]);
        if($booking)
        {

            // Set up Stripe with the configuration from Laravel config
            Stripe::setApiKey('sk_test_DHz9kzImzMWJ3Et1xmdgx7I4');

            $YOUR_DOMAIN = 'http://localhost/hotel-management/public/'; // Change the domain to match your application



            // Build line items array for Stripe Checkout
            $lineItems = [];

            $room = Room::findOrFail($request['room_id']);
            $image = asset('room_images/' . $room->thumb);

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $room->name,
                        'description' => "Adults: " . $request->adults . ", Children: " . $request->child . "\nCheck-in: " . $request->checkin . "\nCheck-out: " . $request->checkout,

                    ],
                    'unit_amount' => intval($room->price * 100),
                ],
                'quantity' => 1,
            ];


            // dd($lineItems);

            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'payment_intent_data'=>[
                    'metadata'=>['booking_id' => $booking->id],
                ],
                'metadata' => ['booking_id' => $booking->id],
                'mode' => 'payment',
                'success_url' => $YOUR_DOMAIN . 'success',
                'cancel_url' => $YOUR_DOMAIN . 'cancel',
            ]);

            session(['checkout_session' => $checkout_session]);
            return redirect()->away($checkout_session->url, 303);
        }
    }
    public function success(Request $request)
    {
        $checkout_session = session('checkout_session');
        $booking_id = $checkout_session['metadata']['booking_id'];
        $payment_method = $checkout_session['payment_method_types'][0];
        if($booking_id)
        {
            $booking = Booking::findOrFail($booking_id);
            if($booking)
            {
                $booking->payment_status = 1;
                $booking->payment_method = $payment_method;
                $booking->save();
            }
        }
        \Illuminate\Support\Facades\Session::flush();
         return view('frontend.modules.success');
    }
    public function cancel()
    {
        dd('cancel');
    }




}
