<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @if ($myConversationwith)
        <form wire:submit.prevent='storeMessage' action="#" method="post" class="d-flex flex-nowrap ">
            <div class="conversationBody-footer ">
                <div class="d-flex flex-nowrap">
                    <input wire:model='messageContain' placeholder="text me now !" type="text" class='message'>
                    <button type="submit" class='send btn btn-primary text-muted'>send</button>
                </div>
            </div>
        </form>
    @endif

</div>
