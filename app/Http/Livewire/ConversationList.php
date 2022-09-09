<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Invitation;
use App\Models\Conversation;

class ConversationList extends Component
{

    public $conversationsList;
    public $receiverUser;
    public $name;
    public $myConversationwith;

    protected $listeners = ["conversationSelect", 'refresh' => '$refresh'];

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        // $friends = Invitation::where('validated', 'accepted')
        //     ->where(function ($query) {
        //         $query->where('sender_id', auth()->user()->id)
        //             ->orWhere('receiver_id', auth()->user()->id);
        //     })
        //     ->get();


        # code...
        // dd($friends->count());
        $this->conversationsList = Conversation::where('sender_id', auth()->user()->id)->orWhere('receiver_id', auth()->user()->id)->orderBy('last_message', 'DESC')->get();


        // dd($this->conversationsList);

    }

    /**
     * conversationSelect
     *
     * @param  mixed $conversation
     * @param  mixed $id
     * @return void
     */
    public function conversationSelect(Conversation $conversation, $id)
    {
        // dd($conversation, $id);
        $this->myConversationwith = $conversation;
        $receiverUser = User::find($id);

        $this->emitTo('conversation-body', 'Discussion', $this->myConversationwith, $receiverUser);
        $this->emitTo('conversation-message-send', 'sendMyMessage', $this->myConversationwith, $receiverUser);
    }

    /**
     * getReceiver
     *
     * @param  mixed $convers
     * @param  mixed $request
     * @return void
     */
    public function getReceiver(Conversation $convers, $request)
    {
        if ($convers->sender_id === auth()->user()->id) {
            $this->receiverUser = User::firstWhere('id', $convers->receiver_id);
        } else {
            $this->receiverUser = User::firstWhere('id', $convers->sender_id);
        }

        if (isset($request)) {
            return $this->receiverUser->$request;
        }
    }


    public function render()
    {
        return view('livewire.conversation-list');
    }
}
