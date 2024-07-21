<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Http\Request;

class FirestoreController extends Controller
{
    protected $firestore;

    public function __construct()
    {
        $this->firestore = app('firebase.firestore')->database();
    }

    public function getWaterLevels()
    {
        $waterLevels = User::all()->map(function ($level) {
            $date = Carbon::parse($level->date);
            $level->formatted_date = $date->format('d l, F Y');
            $level->formatted_time = $date->format('h:i A');
            return $level;
        });

        return view('cloning.fetchdatainfirebase', compact('waterLevels'));
    }
}
