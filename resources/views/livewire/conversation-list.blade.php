<div class="">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="conversationList-head ">

        <div class="image">
            <img src="{{ asset('./img/borisLogo.JPG') }}" width="55" class="rounded-pill h1 elevation-2"
                alt="User Image">
        </div>
        <div class=" ">
            <a href="#" class="d-block text-capitalize font-weight-bold text-light h2 ">Infinity Designer</a>
        </div>

    </div>

    <div class="conversationList-body">
        @if ($conversationsList)
            @foreach ($conversationsList as $conversation)
                {{-- {{ dd('img/' . $this->getReceiver($conversation, $name = 'photo') . '.png') }} --}}
                <div class="userinfo mt-4 mb-3  row container py-2 personnalClass" wire:key='{{ $conversation->id }}'
                    wire:click="$emit('conversationSelect',{{ $conversation }},{{ $this->getReceiver($conversation, $name = 'id') }})">

                    <img src="{{ asset('img/' . $this->getReceiver($conversation, $name = 'photo') . '.png') }}"
                        class=" col-3 p-0 mx-0 userinfoimage" alt="User Image">

                    <div class="userinfocontent col-9 pr-0">
                        <p class=" d-flex align-items-center justify-content-between mb-0 ">
                            <span
                                class="d-block text-capitalize font-weight-bold text-truncate  ml-0 mb-0 h3 font-bold">{{ $this->getReceiver($conversation, $name = 'name') }}
                            </span>
                            <span
                                class="text-success h5 mb-0">{{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</span>
                        </p>
                        <p id="userRole" class="d-block  font-ligth  ml-0 mb-0 text-primary text-sm">
                            {{ $this->getReceiver($conversation, $name = 'rôle') }}</p>

                        <p class=" d-flex align-items-baseline justify-content-between mb-0 ">
                            <span class="d-block text-sacondary ml-0 mb-0  text-truncate h6"
                                style="width:
                            80%">{{ $conversation->messages->last()?->bodyMessage }}
                            </span>
                            <span class="text-sm  text-danger  mb-0 bg-danger rounded-circle "> 56 </span>
                        </p>

                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-black fw-bold">No conversation
            </p>
        @endif
    </div>

</div>
