<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Reports;
use Illuminate\Http\Request;

class AddCasualtiesController extends Controller
{
    public function index(){
        return view("staff.staffpages.addcasualties");
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            //staff email for filter
            'staff_email' => 'required|string|max:255',
            //Report form
            'disaster_name' => 'required|string|max:255',
            'affected_barangay' => 'required|string|max:255',
            //typhoon start and end date
            'disaster_date' => 'nullable|date',
            'disaster_enddate' => 'nullable|date',
            //water level
            'lowest_water_level' => 'required|numeric|min:0|max:10|regex:/^\d+(\.\d{1,2})?$/',
            'highest_water_level' => 'required|numeric|min:0|max:10|regex:/^\d+(\.\d{1,2})?$/',
            //casualties
            'dead' => 'required|integer',
            'injured' => 'required|integer',
            'missing' => 'required|integer',
            //Number of Displaced Population 
            'displaced_persons'=> 'required|integer',
            'displaced_families'=> 'required|integer',
        ]);

       
     
        
        // Create the new staff member
         Reports::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'birthdate' => $request->input('birthdate'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'user_type' => 'staff',
            'is_active'=> 1,
            'is_online'=>0,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Staff member added successfully.');
    }
}
