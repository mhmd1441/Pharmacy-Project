<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicines;

class MedicineController  extends Controller
{

 public function index(Request $request)
{
    $query = Medicines::query();

    // البحث بالاسم إذا كانت القيمة موجودة
    if ($request->filled('name')) {
        $query->where('medicine_name', 'like', '%' . $request->name . '%');
    }

    // التصفية حسب تاريخ الانتهاء إذا كانت القيمة موجودة
    if ($request->filled('expiry_date')) {
        $query->whereDate('expiry_date', $request->expiry_date);
    }

    // الحصول على النتائج بعد التصفية
    $medicines = $query->get();
    $totalMedicines = $medicines->count();

    // تمرير النتائج للواجهة
    return view('admin.viewMedicines', compact('medicines', 'totalMedicines'));
}





    public function create()
    {
        return view('Admin.createMedicine');
    }



    public function store(Request $request)
    {
        // Validate first
        $validated = $request->validate([
            'medicine_name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:medicines',
            'manufacturer' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'dosage' => 'required|numeric',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'required_status' => 'required|string',
            'inventory_id' => 'required|integer',
            'production_date' => 'required|date',
            'expiry_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload (only if provided)
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('medicines', 'public');
        }

        // Create the medicine using the validated data
        Medicines::create([
            'medicine_name' => $validated['medicine_name'],
            'sku' => $validated['sku'],
            'manufacturer' => $validated['manufacturer'],
            'description' => $validated['description'],
            'dosage' => $validated['dosage'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'required_status' => $validated['required_status'],
            'inventory_id' => $validated['inventory_id'],
            'production_date' => $validated['production_date'],
            'expiry_date' => $validated['expiry_date'],
            'image' => $path,
        ]);

        $redirectUrl = session()->pull('medicine_redirect_url', route('medicines.index'));
        return redirect($redirectUrl)->with('success', 'Medicine added successfully.');
    }


    public function edit($id)
    {
        $medicine = Medicines::findOrFail($id);

        return view('medicinesEdit.medicineEdit', compact('medicine'));
    }


    // UPDATE - save update medicine

    public function update(Request $request, $id)
    {
        $medicine = Medicines::findOrFail($id);
        $medicine->update($request->all());
        return redirect()->route('medicines.index')->with('success', 'تم التحديث بنجاح');
    }

    // DELETE - delete the medicine

    public function destroy($id)
    {
        $medicine = Medicines::findOrFail($id);
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'تم الحذف بنجاح');
    }



    //Mohamad Controller to make the clientPage work
    //DONT DELETE!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function fetchMedicines()
    {
        $medicines = Medicines::paginate(8);
        return view('clients.homePage', compact('medicines'));
    }
    public function fetchAllMedicines()
    {
        $medicines = Medicines::all();
        return view('clients.medicinesPage', compact('medicines'));
    }
}
