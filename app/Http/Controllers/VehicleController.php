<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'plate_number' => 'required|string|max:15|unique:vehicles',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:80',
            'vehicle_type' => 'required|string|max:50',
            'color' => 'required|string|max:30',
            'capacity' => 'required|integer',
            'daily_rate' => 'required|numeric',
        ],
        [
            'plate_number.required' => 'El campo de placa es obligatorio',
            'plate_number.unique' => 'El numero de placa ya existe',
            'brand.required' => 'El campo de marca es obligatorio',
            'model.required' => 'El campo de modelo es obligatorio',
            'vehicle_type.required' => 'El campo de tipo de vehiculo es obligatorio',
            'color.required' => 'El campo de color es obligatorio',
            'capacity.required' => 'El campo de capacidad es obligatorio',
            'daily_rate.required' => 'El campo de tarifa diaria es obligatorio',
        ]);

        Vehicle::create($validate);
        return redirect()->route('vehicles.index')->with('success', 'Vehiculo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validate = $request->validate ([
            'plate_number' => 'required|string|max:15|unique:vehicles,plate_number,' . $vehicle->id,
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:80',
            'vehicle_type' => 'required|string|max:50',
            'color' => 'required|string|max:30',
            'capacity' => 'required|integer',
            'daily_rate' => 'required|numeric',
        ],
        [
            'plate_number.required' => 'El campo de placa es obligatorio',
            'plate_number.unique' => 'El numero de placa ya existe',
            'brand.required' => 'El campo de marca es obligatorio',
            'model.required' => 'El campo de modelo es obligatorio',
            'vehicle_type.required' => 'El campo de tipo de vehiculo es obligatorio',
            'color.required' => 'El campo de color es obligatorio',
            'capacity.required' => 'El campo de capacidad es obligatorio',
            'daily_rate.required' => 'El campo de tarifa diaria es obligatorio',
        ]);

        $vehicle->update($validate);
        return redirect()->route('vehicles.index')->with('success', 'Vehiculo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'El vehiculo se elimino correctamente');
    }
}
