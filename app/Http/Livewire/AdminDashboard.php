<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AdminDashboard extends Component
{
    use WithPagination;


    public function destroy($id)
    {
        // dd($id);
        $user = User::where('id', $id)->first();
        $user->syncChanges();
        $user->forceDelete();
        Session::flash('message', 'The user xas succesfully deleted');
        Session::flash('alert-class', 'alert-danger');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user->rôle === 'guest') {
            $user->rôle = 'admin';
            $user->save();
        } else {
            # code...
            $user->rôle = 'guest';
            $user->save();
        }
        Session::flash('message', "The user Role is passed to $user->rôle");
        Session::flash('alert-class', 'alert-success');
    }

    public function SoftDelete($id)
    {
        $xxx = User::all();
        $user = User::where('id', $id)->first();
        $user->syncChanges();
        $user->conversations()->delete();
        $user->delete();
        Session::flash('message', "The user was succesfully lock from this App");
        Session::flash('alert-class', 'alert-warning');
    }

    public function render()
    {

        if (Gate::allows('access-admin')) {

            // dd($this->users);
            return view('livewire.admin-dashboard', [
                'users' => User::orderBy('name')->paginate(16)

            ]);
        }
        abort(403);
    }
}
