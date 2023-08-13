<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarFormRequest;
use App\Models\Car;
use Exception;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        $messageSuccess = session('messageSuccess');

        return view('cars.index')
            ->with('cars', $cars)
            ->with('messageSuccess', $messageSuccess);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(CarFormRequest $request)
    {
        try {
            Car::create($request->all());

            $request->session()->flash('messageSuccess', 'Veículo inserido com sucesso');

            return redirect()->route('cars.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit(Car $car)
    {
        return view('cars.edit')->with('car', $car);
    }

    public function update(Car $car, CarFormRequest $request)
    {
        try {
            $car->fill($request->all());

            $request->session()->flash('messageSuccess', 'Veículo atualizado com sucesso');

            return redirect()->route('cars.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            Car::destroy($request->car);

            $request->session()->flash('messageSuccess', 'Veículo removido com sucesso');

            return redirect()->route('cars.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
