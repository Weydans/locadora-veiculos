<?php

namespace App\Http\Controllers;

use App\Events\ReserveCreatedEvent;
use App\Http\Requests\ReserveFormRequest;
use App\Models\Car;
use App\Models\Reserve;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();

            $reserves = Reserve::orderBy('date')
                ->where('users_id', $user->id)
                ->get();

            $messageSuccess = session('messageSuccess');

            return view('reserves.index')
                ->with('reserves', $reserves)
                ->with('messageSuccess', $messageSuccess);

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function create(Car $car)
    {
        return view('reserves.create')->with('car', $car);
    }

    public function store(Car $car, ReserveFormRequest $request)
    {
        try {
            $user = Auth::user();

            $carReserved = Reserve::query()
                ->where('cars_id', $car->id)
                ->where('date', $request->date)
                ->first();

            if ($carReserved) {
                return redirect()->back()->withErrors('Carro indisponível para a data selecionada');
            }

            $reserve = new Reserve();
            $reserve->users_id = $user->id;
            $reserve->cars_id = $car->id;
            $reserve->date = $request->date;

            $reserve->save();

            ReserveCreatedEvent::dispatch($user->id, $car->id);

            session()->flash('messageSuccess', "Reserva realizada com sucesso");

            return redirect()->route('reserves.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function edit(Reserve $reserve)
    {
        return view('reserves.edit')->with('reserve', $reserve);
    }

    public function update(Reserve $reserve, ReserveFormRequest $request)
    {
        try {
            $carReserved = Reserve::query()
                ->where('cars_id', $reserve->car->id)
                ->where('date', $request->date)
                ->first();

            if ($carReserved) {
                return redirect()->back()->withErrors('Carro indisponível para a data selecionada');
            }

            $reserve->date = $request->date;

            $reserve->save();

            session()->flash('messageSuccess', "Reserva atualizada com sucesso");

            return redirect()->route('reserves.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Reserve $reserve)
    {
        try {
            $reserve->delete();

            session()->flash('messageSuccess', "Reserva removida com sucesso");

            return redirect()->route('reserves.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
