<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pricing;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricings = Pricing::all();
        return view('pricings.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pricings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'package' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'features' => 'nullable|string',
        ]);

        Pricing::create($request->all());

        return redirect()->route('pricings.index')->with('success', 'Pricing added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('pricings.edit', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'package' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'features' => 'nullable|string',
        ]);

        $pricing = Pricing::findOrFail($id);
        $pricing->update($request->all());

        return redirect()->route('pricings.index')->with('success', 'Pricing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $pricing = Pricing::findOrFail($id);
        $pricing->delete();

        return redirect()->route('pricings.index')->with('success', 'Pricing deleted successfully!');
    }
}
