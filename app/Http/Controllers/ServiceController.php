<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Show all services
    public function index()
    {
        $services = Service::get();
        return view('pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('pages.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'duration'     => 'nullable|string|max:50',
            'category'     => 'required|in:Engine,Spray,Maintenance,Electric',
            'status'       => 'required|in:active,inactive',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'duration'     => 'nullable|string|max:50',
            'category'     => 'required|in:Engine,Spray,Maintenance,Electric',
            'status'       => 'required|in:active,inactive',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted');
    }
}