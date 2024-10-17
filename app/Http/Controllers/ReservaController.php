<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Muestra la lista de todas las reservas
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    // Muestra el formulario para crear una nueva reserva
    public function crear()
    {
        
        return view('reservas.crear');
    }

    // Almacena una nueva reserva en la base de datos
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'ccodigo_verificacion' => 'required|max:6',
            'dfecha' => 'required|date',
            'dhora' => 'required|date_format:H:i',
            'mesa_id' => 'required|exists:mesas,id', // Verificar que la mesa existe
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Crear una nueva reserva
        Reserva::create([
            'ccodigo_verificacion' => $request->input('ccodigo_verificacion'),
            'dfecha' => $request->input('dfecha'),
            'dhora' => $request->input('dhora'),
            'mesa_id' => $request->input('mesa_id'), // ID de la mesa seleccionada
            'user_id' => $user->id, // ID del usuario autenticado
        ]);

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('reservas.create')->with('success', 'Reserva creada exitosamente.');
    }

    // Muestra una reserva específica
    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    // Muestra el formulario para editar una reserva existente
    public function edit(Reserva $reserva)
    {
        return view('reservas.edit', compact('reserva'));
    }

    // Actualiza una reserva existente en la base de datos
    public function update(Request $request, Reserva $reserva)
    {
        $validatedData = $request->validate([
            'ccodigo_verificacion' => 'required|string|max:6',
            'dfecha' => 'required|date',
            'dhora' => 'required|date_format:H:i',
            'duracion_reserva' => 'nullable|integer',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
        ]);

        $reserva->update($validatedData);

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    // Elimina una reserva de la base de datos
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}
