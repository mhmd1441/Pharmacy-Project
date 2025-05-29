<?php

namespace App\Http\Controllers;

use App\Models\Pharmacies;
use Illuminate\Http\Request;

class PharmaciesController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacies::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('clients.listPharmacies', compact('pharmacies'));
    }

    public function show(Pharmacies $pharmacy)
    {
        if (!$pharmacy->is_active) {
            abort(404);
        }

        return view('clients.listPharmacies', compact('pharmacy'));
    }
}
