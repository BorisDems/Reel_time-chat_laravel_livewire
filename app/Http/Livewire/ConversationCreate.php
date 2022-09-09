<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Messages;
use App\Models\Invitation;
use App\Models\Conversation;

class ConversationCreate extends Component
{
    public $message = "let's chat on boris super App 😉";
    public function startchat($id)
    {

        $chekConversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $id)->orWhere('receiver_id', $id)->where('sender_id', auth()->user()->id)->get();

        //chek if a conversation with both id already exist
        if ($chekConversation->count() === 0) {

            //if it dosn't exist , create a conversation
            // dd('no conversation');
            $newConversation = Conversation::create([
                'receiver_id' => $id,
                'sender_id' => auth()->user()->id,
            ]);

            //create a message for the conversation created up
            $createMessage = Messages::create([
                'conversation_id' => $newConversation->id,
                'receiver_id' => $id,
                'sender_id' => auth()->user()->id,
                'bodyMessage' => $this->message,

            ]);

            //given a value to the last_message columns egal to the created_at message
            $newConversation->last_message = $createMessage->created_at;
            $newConversation->save();

            // dd('saved');
        } else {
            dd('exist conversation');
        }
    }

    public function render()
    {
        $this->users =
            Invitation::where('validated', 'accepted')
            ->where(function ($query) {
                $query->where('sender_id', auth()->user()->id)
                    ->orWhere('receiver_id', auth()->user()->id);
            })
            ->get();;
        return view('livewire.conversation-create');
    }
}
