<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medicines;

class MedicineController extends Controller
{
    // READ - Display all medicines

    public function index()
    {
        $medicines = Medicines::all();
        return view('medicines.index', compact('medicines'));
    }


    // CREATE - show form to add a new medicine

    public function create()
    {
        return view('Admin.createMedicine');
    }
   

    
    public function store(Request $request)
    {
    // Validate incoming data
    $request->validate([
        'medicine_name' => 'required|string|max:255',
        'sku' => 'required|string|max:255|unique:medicines',
        'manufacturer' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'dosage' => 'required|numeric',
        'price' => 'required|numeric|min:0',
        'required_status' => 'required|string',
        'inventory_id' => 'required|integer',
        'production_date' => 'required|date',
        'expiry_date' => 'required|date',
    ]);
    
    dd($request->all());

    // Create a new medicine record
    Medicines::create([
        'medicine_name' => $request->medicine_name,
        'sku' => $request->sku,
        'manufacturer' => $request->manufacturer,
        'description' => $request->description,
        'dosage' => $request->dosage,
        'price' => $request->price,
        'required_status' => $request->required_status,
        'inventory_id' => $request->inventory_id,
        'production_date' => $request->production_date,
        'expiry_date' => $request->expiry_date,
    ]);

    return redirect()->route('medicines.index')->with('success', 'Medicine added successfully.');
    }



    // UPDATE - save update medicine

    public function update(Request $request, $id) 
    {
        $request->validate([
            'medicine_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',

        ]);

        $medicine = Medicines::findorfail($id);
        $medicine->update($request->all());

        return redirect()->route('medicines.index')->with('success', 'Medicines Updated Successfully.');
    }

    // DELETE - delete the medicine

    public function destroy($id)
    {
        $medicine = Medicines::findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine Deleted Successfully.');
    }
}