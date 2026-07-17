<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->get();

        return view('properties.index', [
            'properties' => $properties,
        ]);
    }

    public function edit(Property $property)
    {
        return view('properties.edit', [
            'property' => $property,
        ]);
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'host_name' => 'required|string|max:255',
            'host_phone' => 'nullable|string|max:255',
            'tourism_license_number' => 'nullable|string|max:255',
            'status' => 'required|in:pending_review,published,rejected,suspended',
        ]);

        $property->update($validated);

        return redirect()->route('properties.index')
            ->with('success', "{$property->title} has been updated.");
    }

    public function approve(Property $property)
    {
        $property->update(['status' => 'published']);

        return redirect()->route('properties.index')
            ->with('success', "{$property->title} has been approved and published.");
    }

    public function reject(Property $property)
    {
        $property->update(['status' => 'rejected']);

        return redirect()->route('properties.index')
            ->with('success', "{$property->title} has been rejected.");
    }
}