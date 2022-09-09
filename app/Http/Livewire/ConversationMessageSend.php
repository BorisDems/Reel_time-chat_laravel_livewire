<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Messages;
use App\Models\Conversation;
use App\Events\UpdateMessage;

class ConversationMessageSend extends Component
{
    public $myConversationwith;
    public $receiverUser;
    public $messageContain;
    public $newMessage;

    protected $listeners = ['sendMyMessage', 'dispatchMessageSent'];

    public function sendMyMessage(Conversation $conversation, User $user)
    {
        // dd($user, $conversation);
        $this->myConversationwith = $conversation;
        $this->receiverUser = $user;
    }

    public function storeMessage()
    {
        if ($this->messageContain != null) {
            $this->newMessage = Messages::create([
                'conversation_id' => $this->myConversationwith->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->receiverUser->id,
                'bodyMessage' => $this->messageContain,
            ]);
            $this->myConversationwith->last_message = $this->newMessage->created_at;
            $this->myConversationwith->save();
        } else {
            return null;
        }
        // dd($this->messageContain);

        // adding le new message to the body of our chat
        $this->emitTo('conversation-body', 'putMessage', $this->newMessage->id);

        // refreshing the chatlist to add the last message
        $this->emitTo('conversation-list', 'refresh');
        // $this->emitTo('chat-body', 'refresh');

        // refreshing input messageContain
        $this->reset('messageContain');

        $this->emitSelf('dispatchMessageSent');
    }

    public function dispatchMessageSent()
    {
        broadcast(new UpdateMessage(auth()->user(), $this->newMessage, $this->myConversationwith, $this->receiverUser));
    }

    public function render()
    {
        return view('livewire.conversation-message-send');
    }
}
