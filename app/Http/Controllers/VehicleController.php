<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('customer')->get();
        return view('pages.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        return view('pages.vehicles.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'  => 'required|exists:customers,id',
            'name'         => 'required|string|max:255',
            'model'        => 'required|string|max:255',
            'plate_number' => 'required|string|unique:vehicles,plate_number',
            'year'         => 'nullable|integer',
        ]);

        Vehicle::create([
            'customer_id' => $request->customer_id,
            'name'        => $request->name, 
            'model'       => $request->model,
            'plate_number'=> $request->plate_number,
            'year'        => $request->year,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully');
    }

    public function edit(Vehicle $vehicle)
    {
        $customers = Customer::orderBy('name')->get();
        return view('pages.vehicles.edit', compact('vehicle', 'customers'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'customer_id'  => 'required|exists:customers,id',
            'name'         => 'required|string|max:255',
            'model'        => 'required|string|max:255',
            'plate_number' => 'required|string|unique:vehicles,plate_number,' . $vehicle->id,
            'year'         => 'nullable|integer',
        ]);
    
        $vehicle->update([
            'customer_id' => $request->customer_id,
            'name'        => $request->name, 
            'model'       => $request->model,
            'plate_number'=> $request->plate_number,
            'year'        => $request->year,
        ]);
    
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }
    

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted');
    }
}