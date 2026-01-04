<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function index()
    {
        $repairs = Repair::with(['vehicle.customer', 'staff'])->paginate(10);
        return view('pages.repairs.index', compact('repairs'));
    }

    public function show(Repair $repair)
    {
        $repair->load(['vehicle.customer', 'staff', 'services']);
        return view('pages.repairs.show', compact('repair'));
    }

    public function create()
    {
        $vehicles = Vehicle::with('customer')->get();
        $services = Service::where('status', 'active')->get();
        $staffs = User::all();
        return view('pages.repairs.create', compact('vehicles', 'staffs', 'services'));
    }

    public function store(Request $request)
{
    $request->validate([
        'vehicle_id' => 'required|exists:vehicles,id',
        'user_id'    => 'required|exists:users,id',
        'status'     => 'required|in:not started,in progress,completed',
        'services'   => 'nullable|array',
    ]);

    $repair = Repair::create([
        'vehicle_id' => $request->vehicle_id,
        'user_id'    => $request->user_id,
        'status'     => $request->status,
        'total'      => 0,
    ]);

    $total = 0;

    if ($request->services) {
        foreach ($request->services as $serviceId => $data) {

            if (empty($data['quantity']) || $data['quantity'] <= 0) {
                continue;
            }

            $service = Service::find($serviceId);
            if (!$service) continue;

            $subtotal = $service->price * $data['quantity'];

            $repair->services()->attach($serviceId, [
                'price'    => $service->price,
                'quantity' => $data['quantity'],
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }
    }

    $repair->update(['total' => $total]);

    return redirect()
        ->route('repairs.index')
        ->with('success', 'Repair added successfully');
}

    public function edit(Repair $repair)
    {
        $vehicles = Vehicle::with('customer')->get();
        $services = Service::where('status', 'active')->get();
        $staffs   = User::all();

        return view('pages.repairs.edit', compact(
            'repair', 
            'vehicles', 
            'staffs',
            'services',
        ));
    }

    public function update(Request $request, Repair $repair)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'user_id'    => 'required|exists:users,id',
            'status'     => 'required|in:not started,in progress,completed',
            'services'    => 'nullable|array',
        ]);

        $repair->update([
            'vehicle_id' => $request->vehicle_id,
            'user_id'    => $request->user_id,
            'status'     => $request->status,
        ]);

        $repair->services()->detach();

        $total = 0;

        foreach ($request->services as $serviceId => $data) {
            if (!isset($data['quantity']) || $data['quantity'] <= 0) {
                continue;
            }

            $service  = Service::find($serviceId);
            $qty      = $data['quantity'];
            $price    = $service->price;
            $subtotal = $price * $qty;

            $repair->services()->attach($serviceId, [
                'price'    => $price,
                'quantity' => $qty,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $repair->update(['total' => $total]);

        return redirect()->route('repairs.index')->with('success', 'Repair updated successfully');
    }

    public function destroy(Repair $repair)
    {
        $repair->delete();
        return redirect()->route('repairs.index')->with('success', 'Repair deleted successfully');
    }

    public function updateStatus(Request $request, Repair $repair)
    {
        $request->validate([
            'status' => 'required|in:not started,in progress,completed',
        ]);

        $repair->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status updated');
    }

}
