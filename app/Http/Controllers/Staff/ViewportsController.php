<?php

namespace App\Http\Controllers\Staff;

use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ViewportsController extends Controller
{
    
    public function index( Request $request){
        $email = Auth::user()->email;
        $disasterReports = Reports::orderBy('created_at', 'desc')->where('staff_email', $email)->paginate(10);
        // Pass the data to a view
        return view('staff.staffpages.reports.historicaldata', compact('disasterReports'));
    }

    public function casualtiesReport(Request $request){
        $email = Auth::user()->email;
    
        $disasterReports = Reports::orderBy('created_at','desc')->where('staff_email', $email)->paginate(10);
        return view('staff.staffpages.reports.casualtiesReport', compact('disasterReports'));
    }

    public function myReports(Request $request){
        $email = Auth::user()->email;
        //get the list of typhoons
        $typhoonNames = Reports::select('typhoon_name')->where('staff_email',$email)
        ->distinct()
        ->orderBy('typhoon_name', 'asc')
        ->pluck('typhoon_name');


        // Get the list of years for the dropdown
        $years = Reports::selectRaw('YEAR(created_at) as year')->where('staff_email',$email)
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
    
        // Check if a year is selected and filter reports accordingly
        $query = Reports::orderBy('created_at', 'desc')->where('staff_email', $email);
        if ($request->has('year') && $request->input('year') != '') {
            $selectedYear = $request->input('year');
            $query->whereYear('created_at', $selectedYear);
        } else {
            $selectedYear = null; // No year selected
        }

        if ($request->has('typhoon_name') && $request->input('typhoon_name') != '') {
            $selectedTyphoon = $request->input('typhoon_name');
            $query->where('typhoon_name', $selectedTyphoon);
        } else {
            $selectedTyphoon = null; // No typhoon name selected
        }
    
        $myreports = $query->paginate(10);
    
        return view('staff.staffpages.reports.myreports', compact('myreports', 'years', 'selectedYear','typhoonNames', 'selectedTyphoon'));

    }
    public function showReports($id){
        $report= reports::findOrFail($id);
        return response()->json($report);
    }

    public function damagePropertiesReport(Request $request){
        $email = Auth::user()->email;
        $report= Reports::orderBy('created_at','desc')->where('staff_email', $email)->paginate(10);

        return view('staff.staffpages.reports.damagesToproperties', compact('report'));
    }

    //deletion of checked data
    public function multipleDelete(Request $request)
{
  $ids = json_decode($request->input('ids'));
  Reports::whereIn('id', $ids)->delete();

  return redirect()->back()->with('success', 'Selected entries have been deleted.');
}

  
}
