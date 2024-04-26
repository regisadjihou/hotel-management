<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index($type)
    {
        $users = User::where('type',$type)->get();
        if($type == 'staff')
        return view('admin.modules.user.index',compact('users'));
        else
        return view('admin.modules.user.user_index',compact('users'));
    }
    public function create()
    {
        return view('admin.modules.user.create');
    }
    public function edit($id)
    {
        $staff = User::findOrFail($id);
        return view('admin.modules.user.edit', compact('staff'));
    }
    public function save(Request $request)
    {
        //dd($request);
        $staff = new User();
        $staff->name = $request->name ;
        $staff->position = $request->position ;
        $staff->salary = $request->salary ;
        $staff->gender = $request->gender ;
        $staff->age = $request->age ;
        $staff->phone = $request->phone ;
        $staff->email = $request->email ;
        $staff->password = bcrypt($request->password);
        $staff->hired_date = $request->hired_date;
        $staff->type = "staff";

         // Handle main image upload
       if ($request->hasFile('image')) {
            $mainImage = $request->file('image');
            $mainImageName = 'user_' . time() . '.' . $mainImage->getClientOriginalExtension();
            $mainImagePath = 'user_images/' . $mainImageName; // Change the folder structure as needed
            $mainImage->move(public_path('user_images'), $mainImageName);
            $staff->image = $mainImageName;
        }
        $staff->save();
        return redirect()->route('admin.users.index',['type' => 'staff'])->with(['success' => 'Staff Created Successfully']);

    }
    public function update(Request $request)
    {
        $staff = User::findOrFail($request->user_id);
        $staff->name = $request->name ;
        $staff->position = $request->position ;
        $staff->salary = $request->salary ;
        $staff->gender = $request->gender ;
        $staff->age = $request->age ;
        $staff->phone = $request->phone ;
        $staff->email = $request->email ;
        $staff->password = bcrypt($request->password);
        $staff->hired_date = $request->hired_date;
        $staff->type = "staff";

         // Handle main image upload
       if ($request->hasFile('image')) {
            $mainImage = $request->file('image');
            $mainImageName = 'user_' . time() . '.' . $mainImage->getClientOriginalExtension();
            $mainImagePath = 'user_images/' . $mainImageName; // Change the folder structure as needed
            $mainImage->move(public_path('user_images'), $mainImageName);
            $staff->image = $mainImageName;
        }
        $staff->save();
        return redirect()->route('admin.users.index',['type' => 'staff'])->with(['success' => 'Staff Updated Successfully']);

    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User Deleted Successfully']);
    }
}
