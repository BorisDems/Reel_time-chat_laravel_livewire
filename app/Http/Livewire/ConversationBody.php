<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Messages;
use App\Models\Conversation;
use App\Events\MEssageOpen;
use App\Events\UpdateMessage;

class ConversationBody extends Component
{
    public $myConversationwith;
    public $receiverUser;
    public $messages_count;
    public $messages;
    public $users;
    protected $listeners = ['Discussion', 'putMessage',];


    public function getListeners()
    {
        $auth_id = auth()->user()->id;
        return [
            "echo-private:chat.{$auth_id},UpdateMessage" => 'broadcastedMessageReceived',
            "echo-private:chat.{$auth_id},MEssageOpen" => 'broadcastedMessageOpen',
            'Discussion', 'putMessage',
        ];
    }

    function broadcastedMessageReceived($event)
    {
        $this->emitTo('coversation-list', 'refresh');
        // dd($event);
        $broadcastedMessage = Messages::find($event['message']);
        // dd($this->myConversationwith, $broadcastedMessage);
        if ($this->myConversationwith) {
            # code...
            // dd($event);

            if ((int) $this->myConversationwith->id === (int) $event['conversation-id']) {
                # code...
                // dd($event);
                $broadcastedMessage->open = 1;
                $broadcastedMessage->save();
                $this->putMessage($broadcastedMessage->id);
            }
        }
    }



    public function Discussion(Conversation $conversations, User $user)
    {
        // dd($conversations);
        $this->myConversationwith = $conversations;
        $this->receiverUser = $user;

        // esquive les $this->messages_count - 10 premier messages et ne recupere que 10 derniers
        $this->messages_count = Messages::where('conversation_id', $this->myConversationwith->id)->count();
        $this->messages = Messages::where('conversation_id', $this->myConversationwith->id)->skip($this->messages_count - 10)->take(10)->get();
    }



    public function putMessage($lastMessage)
    {
        // dd('put');

        $myMessage = Messages::find($lastMessage);
        $this->messages->push($myMessage);
    }

    public function render()
    {
        return view('livewire.conversation-body');
    }
}
