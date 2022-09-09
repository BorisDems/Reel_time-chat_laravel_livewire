<?php

namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Profil extends Component
{

    public function update(Request $request)
    {
        dd($request->email);
    }

    public function delete($id)
    {

        $user = User::where('id', $id)->first();

        $user->syncChanges();
        $user->conversations()->delete();

        $user->delete();
        Session::flash('message', "The user was succesfully lock from this App");
        Session::flash('alert-class', 'alert-warning');
    }

    public function render()
    {
        return view('livewire.profil');
    }
}
