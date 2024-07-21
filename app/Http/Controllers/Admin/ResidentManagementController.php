<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResidentManagementController extends Controller
{
    public function index(Request $request)
    {
        $barangay = $request->query('barangay');

        $contactsQuery = Contact::query();
    
        if ($barangay) {
            $contactsQuery->where('barangay', $barangay);
        }
    
        $contacts = $contactsQuery->paginate(10);
    
        // Get distinct barangays for the dropdown
        $barangays = Contact::distinct()->pluck('barangay');
    
        return view('admin.adminpages.residentManagement', compact('contacts', 'barangays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Contact added successfully.');
    }
}
