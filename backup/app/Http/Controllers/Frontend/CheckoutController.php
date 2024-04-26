<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Config;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Product;
use App\Models\OrderDetail;
class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('frontend.modules.checkout');
    }
    public function checkout_account_create_or_login(Request $request)
    {
        //dd($request);
        //User Creation and Order Creation Code
        // Validation rules
        $rules = [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'street_address' => 'required|string',
            'apartment' => 'nullable|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'account_password' => 'nullable|string|min:6', // Adjust the minimum length as needed
            // Add more fields with their respective validation rules
        ];

        // Custom error messages
        $messages = [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must be a valid email address.',
            'string' => 'The :attribute must be a string.',
            'phone.required' => 'The phone field is required.',
            'street_address.required' => 'The street address field is required.',
            'apartment.string' => 'The apartment field must be a string.',
            'city.required' => 'The city field is required.',
            'postcode.required' => 'The postcode field is required.',
            'account_password.required' => 'The account password field is required.',
            'account_password.min' => 'The account password must be at least :min characters.',
        ];


        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, insert data into the Modal User table
        $user = new User();
        $user->email = $request['email'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->address = $request['street_address'];
        $user->apartment = $request['apartment'];
        $user->city = $request['city'];
        $user->postcode = $request['postcode'];
        $user->password = bcrypt($request['account_password']); // Make sure to hash the password
        $user->save();

        if($user)
        {
            $cart = session()->get('cart', []);

            $order = new Order();
            $order->user_id = $user->id;
            $uniqueIdentifier = uniqid();
            $orderNumber = date('Ymd') . $uniqueIdentifier;
            $order->order_number = $orderNumber;

            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
            $order->order_price = $totalPrice;
            $order->shipping_price = 0;
            $order->total_price = $totalPrice + 0;
            $order->ship_to_different_address = $request->has('ship_to_different_address');
            if($request['ship_to_different_address'])
            {
                $order->address = $request['street_address_2'];
                $order->apartment = $request['apartment_2'];
                $order->city = $request['city_2'];
                $order->postcode = $request['postcode_2'];
            }
            $order->notes = $request['order_note'];
            $order->save();

        }
        if($order)
        {
            foreach ($cart as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,  // Assuming $orderId is the ID of the order these details belong to
                    'product_id' => $item['product_id'],
                    'product_title' => $item['title'],
                    'product_price' => $item['price'],
                    'product_quantity' => $item['quantity'],
                    'product_size' => $item['size'],
                    'product_custom' => $item['custom'],
                ]);
            }
            // Set up Stripe with the configuration from Laravel config
            Stripe::setApiKey('sk_test_DHz9kzImzMWJ3Et1xmdgx7I4');

            $YOUR_DOMAIN = 'http://localhost/football/public/'; // Change the domain to match your application

            // Retrieve cart items from the session
            $cart = session()->get('cart', []);
            //dd($cart);
            // Build line items array for Stripe Checkout
            $lineItems = [];
            foreach ($cart as $item) {
                $product = Product::findOrFail($item['product_id']);
                $image = asset('storage/product_images/' . $product->main_image);
                //$image = "https://ajaxdevs.com/public/storage/product_images/main_1705228031.webp";
                $images = is_array($image) ? $image : [$image];
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'GBP',
                        'product_data' => [
                            'name' => $item['title'],
                            'description' => "Size: ". $item['size']. ", Custom: ".$item['custom'], // Add product description if available
                            'images' => $images,
                        ],
                        'unit_amount' => intval(($item['price']) * 100),
                    ],
                    'quantity' => $item['quantity'],
                ];
            }
            // dd($lineItems);

            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'payment_intent_data'=>[
                    'metadata'=>['order_id' => $order->id,'order_num'=>$orderNumber],
                ],
                'metadata' => ['order_id' => $order->id,'order_num' => $orderNumber],
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
        $order_id = $checkout_session['metadata']['order_id'];
        $payment_method = $checkout_session['payment_method_types'][0];
        if($order_id)
        {
            $order = Order::findOrFail($order_id);
            if($order)
            {
                $order->payment_status = 1;
                $order->payment_method = $payment_method;
                $order->save();
            }
        }
        \Illuminate\Support\Facades\Session::flush();
         return view('frontend.modules.success');
    }
    public function cancel()
    {
        dd('cancel');
    }



    public function stripe_checkout(Request $request)
    {

    }

    public function checkout_check_email(Request $request)
    {
        $email = $request->input('email');
        // Check if the email exists in the database
        $user = User::where('email', $email)->first();

        if ($user) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

}
