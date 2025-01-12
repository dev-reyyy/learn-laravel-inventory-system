<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index() {
        $warehouses = Warehouse::all();

        return view ('warehouse.index', compact('warehouses'));
    }

    public function create() {
        return view ('warehouse.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'address'   => 'required|string|max:100',
            'reference_code' => 'required|string|max:100'
        ]);

        $warehouse  = new Warehouse();
        $warehouse->name        = $validated['name'];
        $warehouse->address     = $validated['address'];
        $warehouse->reference_code    = $validated['reference_code'];
        $warehouse->save();
        
        return redirect()->back()->with('success', 'Warehouse created successfully.');
    }

    public function show($warehouseId) {
        $warehouse = Warehouse::find($warehouseId);

        return view ('warehouse.show', compact('warehouse'));
    }
    
    public function edit(Request $request, $warehouseId) {
        $warehouse = Warehouse::find($warehouseId);

        return view ('warehouse.edit', compact('warehouse'));
    }
    
    public function update(Request $request, $warehouseId) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'reference_code' => 'required|string|max:100',
        ]);
        
        $warehouse = Warehouse::find($warehouseId);
        $warehouse->name         = $validated['name'];
        $warehouse->address         = $validated['address'];
        $warehouse->reference_code  = $validated['reference_code'];
        $warehouse->save();

        return redirect()->back()->with('success', 'Warehouse updated successfully.');
    }
    
    public function destroy($warehouseId) {
        $warehouse = Warehouse::find($warehouseId);
        $warehouse->delete();

        return redirect()->back()->with('success', 'Warehouse deleted successfully.');
    }
}
