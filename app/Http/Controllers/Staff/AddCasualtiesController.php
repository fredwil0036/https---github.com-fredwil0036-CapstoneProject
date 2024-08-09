<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Reports;
use Illuminate\Http\Request;

class AddCasualtiesController extends Controller
{
    public function index(){
        return view("staff.staffpages.Reports.addcasualties");
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
            'lowest_water_level' => 'required',
            'highest_water_level' => 'required',
            //casualties
            'dead' => 'required|integer',
            'injured' => 'required|integer',
            'missing' => 'required|integer',
            //Number of Displaced Population 
            'displaced_persons'=> 'required|integer',
            'displaced_families'=> 'required|integer',
            //number of damaged houses 
            'totally_damaged'=> 'required|integer',
            'damages_house_partially'=> 'required|integer',
            //Damage to properties
            'infrasture_damaged' => 'required|numeric',
            'ariculture_damage' => 'required|numeric',
            'industrial_damage' => 'required|numeric',
            'privatecomercial_damage'=> 'required|numeric',
            
        ]);

       
     
        
        // Create the new staff member
         Reports::create([
            'staff_email' => $request->input('staff_email'),
            'typhoon_name' => $request->input('disaster_name'),
            'affected_barangay' => $request->input('affected_barangay'),
            'started_date' => $request->input('disaster_date'),
            'end_date' => $request->input('disaster_enddate'),
            'lowest_water_level' => $request->input('lowest_water_level'),
            'highest_water_level' => $request->input('highest_water_level'),
            'casualties_dead' => $request->input('dead'),
            'casualties_injured' => $request->input('injured'),
            'casualties_missing' => $request->input('missing'),
            'dispPol_person' => $request->input('displaced_persons'),
            'dispPol_families' => $request->input('displaced_families'),
            'totally_damaged'=> $request->input('totally_damaged'),
            'damages_house_partially'=> $request->input('damages_house_partially'),
            'infrastracture_damaged'=> $request->input('infrasture_damaged'),
            'agriculture_damaged'=> $request->input('ariculture_damage'),
            'industrial_damaged'=> $request->input('industrial_damage'),
            'privateComercial_damaged'=> $request->input('privatecomercial_damage'),
            
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Report added successfully.');
    }
}
