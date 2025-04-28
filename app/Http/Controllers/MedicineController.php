<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    // READ - Display all medicines

    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.indesx', compact('medicines'));
    }

    // CREATE - show form to add a new medicine

    public function create()
    {
        return view('medicines.create');
    }

    // STORE - store new medicine in the database

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
        ]);
        Medicine::create($request-all());
        return redirect()->route('medicines.index')->with('success', 'Medicines Added Successfully.');

    }

    // UPDATE - save update medicine

    public function update(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',

        ]);
        $medicine = Medicine::findorfail($id);
        $medicine->update($request->all());

        return redirect()->route('medicines.index')->with('success', 'Medicines Updated Successfully.');
    }

    // DELETE - delete the medicine

    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine Deleted Successfully.');
    }
}