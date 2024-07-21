<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StaffManagementController extends Controller
{
   
    public function index()
    {
        // Query users by role
        $staffMembers = User::where('usertype', 'user')->get();

        // Pass data to the view
        return view('admin.adminpages.staff_management', compact('staffMembers'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'nullable|date',
            'phone_number' => 'nullable|string|regex:/^09\d{9}$/',
            'address' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the profile image upload
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        }
        
        // Create the new staff member
         User::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'birthdate' => $request->input('birthdate'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'profile_image' => $imagePath,
            'user_type' => 'staff',
            'is_active'=> 1,
            'is_online'=>0,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Staff member added successfully.');
    }


    public function toggleStatus($id)
    {
        $userss = User::findOrFail($id);
        $userss->is_active = !$userss->is_active;
        $userss->save();

        return redirect()->back()->with('status', 'User status updated successfully!');
    }

    public function update(Request $request, $id){
        $request->validate([
            'first_name' =>[ 'required',
            'string',
            'max:255',
            'regex:/^[A-Z][a-z\s]*$',
            'unique:user,first_name'. $id,
        ],
            'middle_name' =>[ 'required',
            'string',
            'max:255',
            'regex:/^[A-Z][a-z\s]*$',
            'unique:user,first_name'. $id,
        ],
            'last_name' =>[ 'required',
            'string',
            'max:255',
            'regex:/^[A-Z][a-z\s]*$',
            'unique:user,first_name'. $id,
        ],
        'address' => 'nullable|string|max:255',
        'birthdate' => 'nullable|date',

        'phone_number' => [
            'nullable',
            'string',
            'regex:/^09\d{9}$/',
        ],

        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->birthdate = $request->birthdate;
        $user->phonenumber = $request->phonenumber;
        //update the user
        $user->save();
        
        return redirect()->route('admin.staffmanagement')->with('status', 'User updated successfully!');

    }
    public function destroy($id)
{
    $staff = User::findOrFail($id);
    $staff->delete();

    // Optionally, redirect back to a page after deletion
    return redirect()->route('admin.staffmanagement')->with('success', 'Item deleted successfully');
}
}
