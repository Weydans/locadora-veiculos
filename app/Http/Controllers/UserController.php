<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $messageSuccess = session('messageSuccess');

        return view('users.index')
            ->with('users', $users)
            ->with('messageSuccess', $messageSuccess);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserFormRequest $request)
    {
        try {
            User::create($request->all());

            $request->session()->flash('messageSuccess', 'Usuário inserido com sucesso');

            return redirect()->route('users.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    public function update(User $user, UserFormRequest $request)
    {
        try {
            $user->fill($request->all());
            $user->save();

            $request->session()->flash('messageSuccess', 'Usuário atualizado com sucesso');

            return redirect()->route('users.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            User::destroy($request->user);

            $request->session()->flash('messageSuccess', 'Usuário removido com sucesso');

            return redirect()->route('users.index');

        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
