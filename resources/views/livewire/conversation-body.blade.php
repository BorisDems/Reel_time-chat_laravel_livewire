<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if ($myConversationwith)
        {{-- {{ dd('img/' . $receiverUser->photo . '.png', 'img/' . auth()->user()->photo . '.png') }} --}}
        <div class="conversationBody-head">
            <div class=" d-flex justify-content-between py-1 pl-3" id="headerContainer">
                <a href="" class="d-flex col-5 align-items-center py-1 px-0">
                    <i class="bi bi-arrow-left pr-3"></i>
                    <div class="">

                        <img class="" src="{{ asset('img/' . $receiverUser->photo . '.png') }} "
                            alt="message user
                            image">
                    </div>
                    <div class="info text-light ml-2">
                        <span href="#"
                            class="d-block text-capitalize font-weight-bold  text-sm text-light ml-2">{{ $receiverUser->name }}</span>
                        <span href="#" id="userRole"
                            class="d-block font-weight-ligth  ml-2 text-muted  text-sm"><i
                                class="fas fa-arrow-point"></i><span>Status</span> </span>
                    </div>

                </a>

                <div class="d-flex col-2 justify-content-around align-items-center pr-3">
                    <i class="fas fa-phone text-light"></i>
                    <i class="fas fa-video text-light"></i>
                    <i class="fas fa-image text-light"></i>
                </div>
            </div>

        </div>

        <div class="conversationBody-body">
            @foreach ($messages as $message)
                <div class="d-flex justify-content-end align-items-center">

                    <img class="direct-chat-img mx-2 {{ auth()->user()->id === $message->sender_id ? 'order-2' : '' }}"
                        src="{{ auth()->user()->id === $message->sender_id ? asset('img/' . auth()->user()->photo . '.png') : asset('img/' . $receiverUser->photo . '.png') }}"
                        alt="message user image">

                    <div class=" h-auto {{ auth()->user()->id === $message->sender_id ? 'sender text-light' : 'receiver ' }} "
                        id="fulldiscussion">
                        {{ $message->bodyMessage }}

                        <div class="msg_footer">
                            <div class="date">
                                {{ $message->created_at->format('m: i a') }}
                            </div>
                            @if (auth()->user()->id === $message->sender_id)
                                <div class="read">
                                    @php
                                        if ($message->open === 0) {
                                            echo '<i class="fas fa-check text-light mr-2 ml-3"></i>';
                                            // dd('sfdfsdf');
                                        } else {
                                            echo '<i class="fas fa-check text-danger "></i><i class="fas fa-check text-danger "></i>';
                                        }
                                    @endphp


                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @else
        <div class="text-center mt-5 pt-5">


            <p class=" text-center text-body mt-0" style="font-size: 2.5rem ; font-weight:bold; ">
                select a friend to start chat 😁 😎

            <div wire:poll.1s class="alert col-5 mx-auto alert-success mt-5 h2">
                Current Time : {{ now() }}
            </div>
            </p>
        </div>
    @endif

</div>
