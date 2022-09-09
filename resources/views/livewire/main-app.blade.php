<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('chatspace') }}
        </h2>
    </x-slot>
    <div class="fullContainer">
        <div class="conversationList">
            @livewire('conversation-list')
        </div>

        <div class="conversationBody">
            @livewire('conversation-body')

            @livewire('conversation-message-send')
        </div>

    </div>

</div>
