<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Invitation;

class AllUser extends Component
{



    // public function mount()
    // {
    //     $this->users = $this->viewusers();
    // }

    public function sendinvitation($id)
    {
        // dd('send');
        $checkIfAlreadySend = Invitation::where('sender_id', auth()->user()->id)->where('receiver_id', $id)->orWhere('receiver_id', auth()->user()->id)->orWhere('sender_id', $id)->get();
        // dd($checkIfAlreadySend, $id, 'auth user =' . auth()->user()->id);


        if ($checkIfAlreadySend->count() >= 1) {
            // dd('exist');
            foreach ($checkIfAlreadySend as  $value) {
                # code...
                // dd('je vais delete');
                $value->delete();
            }
            return redirect()->back()->with('status', 'invitation annulée');
        } else {
            // dd('je vais creer');

            Invitation::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $id,
                'validated' => 'processing'
            ]);
            // dd('created');
            // dd($checkIfAlreadySend);
        }
    }



    public function render()
    {
        // dd('cc');

        return view(
            'livewire.all-user',
            [
                'users' => User::where('id', '!=', auth()->user()->id)->paginate(42),
                'invite' => Invitation::where('sender_id', auth()->user()->id)->orWhere('receiver_id', auth()->user()->id)->get()
            ]
        );
    }
}
