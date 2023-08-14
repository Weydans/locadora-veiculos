<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarFormRequest;
use App\Models\Car;
use App\Models\Reserve;
use Exception;
use Illuminate\Http\Request;
use stdClass;

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
            $car->save();

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

    public function availability(Car $car, Request $request)
    {
        try {
            $month = $request->month ?? date('m');
            $year  = $request->year  ?? date('Y');

            $reserves = Reserve::query()
                ->orderBy('date')
                ->where('cars_id', $car->id)
                ->whereMonth('date', $month)
                ->whereYear('date', $year)
                ->get();

            // Obtém número de dias para o mês e ano informados
            $numberDays = date('t', strtotime("$year-$month-01"));

            $availabilities = [];

            // itera sobre cada dia
            for ($i = 1; $i <= $numberDays; $i++) {
                // Obtém a data
                $date =  "$year-" .
                         str_pad($month, 2, '0', STR_PAD_LEFT) . "-" .
                         str_pad($i, 2, '0', STR_PAD_LEFT);

                $obj = new stdClass();
                $obj->date = $date;
                $obj->user = null;

                // Verifica se há reserva para o dia
                foreach ($reserves as $reserve) {
                    if ($reserve->date != $date) {
                        continue;
                    }
                    $obj->user = $reserve->user->name;
                }

                $availabilities[] = $obj;
            }

            return view('cars.availability')
                ->with('availabilities', $availabilities)
                ->with('month', $month)
                ->with('year', $year)
                ->with('car', $car);

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
