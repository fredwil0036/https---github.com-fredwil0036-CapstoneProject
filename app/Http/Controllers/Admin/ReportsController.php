<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function allReport()
    {
        $allreport=Reports::paginate(10);
        return view('admin.adminpages.reports.allReports', compact('allreport'));
    }
    public function showAllReports($id){
        $report= reports::findOrFail($id);
        return response()->json($report);
    }

    public function casualtiesReports(){
        $casualties=Reports::paginate(10);
        return view('admin.adminpages.reports.casualtiesReports',compact('casualties'));
    }

    public function damagedpropertiesReports(){
        $damaged=Reports::paginate(10);
        return view('admin.adminpages.reports.damagedproperties', compact('damaged'));
    }

    public function historicalDataReports(){
        $historical=Reports::paginate(10);
        return view('admin.adminpages.reports.historicalReport',compact('historical'));
    }
}
