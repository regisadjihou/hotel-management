<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Auth;
class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::where('status',1)->get();
        return view('admin.modules.room.index',compact('rooms'));
    }
    public function create()
    {
        return view('admin.modules.room.create');
    }
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.modules.room.edit', compact('room'));
    }
    public function save(Request $request)
    {
       // dd($request);
        $room = new Room();
        $room->name = $request->name ;
        $room->number = $request->number ;
        $room->type = $request->type ;
        $room->price = $request->price ;
        $room->adults = $request->adults ;
        $room->children = $request->children ;
        $room->beds = $request->beds ;
        $room->baths = $request->baths ;
        $room->description = $request->description ;

         // Handle main image upload
       if ($request->hasFile('thumb')) {
            $mainImage = $request->file('thumb');
            $mainImageName = 'main_' . time() . '.' . $mainImage->getClientOriginalExtension();
            $mainImagePath = 'room_images/' . $mainImageName; // Change the folder structure as needed
            $mainImage->move(public_path('room_images'), $mainImageName);
            $room->thumb = $mainImageName;
        }

        $room->save();

        $multipleImagesPaths = [];
        if ($request->hasFile('multipleImages')) {
            foreach ($request->file('multipleImages') as $key => $image) {
                $imageName = 'multiple_' . time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                $imagePath = 'room_images/' . $imageName; // Change the folder structure as needed
                $image->move(public_path('room_images'), $imageName);
                $multipleImagesNames[] = $imageName;
            }
            foreach($multipleImagesNames as $name)
            {
                $room_image = new RoomImage();
                $room_image->room_id = $room->id;
                $room_image->image =$name;
                $room_image->save();
            }
        }

        //return redirect()->route('admin.product.index')->with(['success' => 'Product Created Successfully']);
        return redirect()->back()->with(['success' => 'Room Created Successfully']);

    }
    public function update(Request $request)
    {
        $room = Room::findOrFail($request->id);
        $room->name = $request->name ;
        $room->number = $request->number ;
        $room->type = $request->type ;
        $room->price = $request->price ;
        $room->adults = $request->adults ;
        $room->children = $request->children ;
        $room->beds = $request->beds ;
        $room->baths = $request->baths ;
        $room->description = $request->description ;



         // Handle main image upload
        if ($request->hasFile('thumb')) {
            $mainImage = $request->file('thumb');
            $mainImageName = 'main_' . time() . '.' . $mainImage->getClientOriginalExtension();
            $mainImagePath = 'room_images/' . $mainImageName; // Change the folder structure as needed
           $mainImage->move(public_path('room_images'), $mainImageName);
            $room->thumb = $mainImageName;
        }
        $room->save();

        $multipleImagesPaths = [];
        if ($request->hasFile('multipleImages')) {
            foreach ($request->file('multipleImages') as $key => $image) {
                $imageName = 'multiple_' . time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                $imagePath = 'room_images/' . $imageName; // Change the folder structure as needed
                $image->move(public_path('room_images'), $imageName);
                $multipleImagesNames[] = $imageName;
            }
            foreach($multipleImagesNames as $name)
            {
                $room_image = new RoomImage();
                $room_image->room_id = $room->id;
                $room_image->image =$name;
                $room_image->save();
            }
        }
        return redirect()->route('admin.rooms.index')->with(['success' => 'Room Updated Successfully']);

    }

    public function image_delete(Request $request)
    {
        $roomId = $request->input('roomId');

        // Get the room by ID
        $room = Room::find($roomId);

        if (!$room) {
            return response()->json(['message' => 'Room not found.'], 404);
        }

        // // Delete the image from storage
        // $imagePath = 'room_images/' . $room->thumb;

        // if (Storage::exists($imagePath)) {
        //     Storage::delete($imagePath);
        // }

        // Update the room in the database
        $room->thumb = null;
        $room->save();

        return response()->json(['message' => 'Room deleted successfully.']);
    }
    public function image_multiple_delete(Request $request)
    {
        $imageId = $request->input('imageId');

        // Get the product by ID
        $image = RoomImage::find($imageId);

        if (!$image) {
            return response()->json(['message' => 'Image not found.'], 404);
        }

        // Delete the image from storage
        // $imagePath = 'room_images/' . $image->image;

        // if (Storage::exists($imagePath)) {
        //     Storage::delete($imagePath);
        // }

        // Update the image in the database
        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $room->status = 0;
        $room->save();
        return redirect()->route('admin.rooms.index')->with(['success' => 'Room Deleted Successfully']);
    }

    public function details($id)
    {
        $room = Room::findOrFail($id);
        return view('frontend.modules.room-details', compact('room'));
    }
    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.modules.room.bookings', compact('bookings'));
    }
    public function user_bookings()
    {
        $bookings = Booking::where('email',Auth::user()->email)->get();
        return view('admin.modules.room.user-bookings', compact('bookings'));
    }
    public function delete_bookings($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back();
    }
}
