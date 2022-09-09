<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    {{-- <i class="far fa-bell"></i> --}}
    {{-- {{ dd(auth()->user()->id) }} --}}
    {{-- {{ dd(auth()->user()->invitationsrecu->where('validated', 'processing')) }} --}}

    <div class="position relative mt-2">
        <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
            class="text-dark bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-4 py-2.5 text-center inline-flex items-center dark:bg-gray-100 dark:hover:bg-gray-200"
            type="button">Notifs <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg></button>
        <span
            class="badge bg-success navbar-badge position-absolute top-0 right-0 -translate-y-1">{{ auth()->user()->invitationsrecu->where('validated', 'processing')->count() }}
        </span>
        <!-- Dropdown menu -->
        <div id="dropdownDivider"
            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
            data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 463px);">
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                @if (auth()->user()->invitationsrecu &&
                    auth()->user()->invitationsrecu->count() > 0)
                    @foreach (auth()->user()->invitationsrecu as $item)
                        @if ($item->validated === 'accepted')
                            <p class="text-center">no friendly request found</p>
                        @else
                            <ul class="pl-0">
                                <li class="dropdown-item d-flex justify-content-between align-items-center text-info">

                                    <div>
                                        <i class="fas fa-envelope"></i><span class="text-muted text-sm  ml-2"><span
                                                class="text-primary">{{ $item->sender->name }}</span> send a
                                            freind
                                            request</span>
                                    </div>
                                    <form wire:click="accepteInvitationRequest({{ $item->id }})"
                                        wire:submit.prevent='accepteInvitation' action="" method="POST">
                                        @csrf
                                        <button type="submit">
                                            <a href="" class=""><span
                                                    class="float-right text-muted text-sm"><i
                                                        class="fas fa-check text-primary"></i></span></a>
                                        </button>


                                    </form>
                                    <form wire:click="accepteInvitationRequest({{ $item->id }})"
                                        wire:submit.prevent='declineInvitation' action="" method="POST">
                                        @csrf
                                        <button type="submit">
                                            <a href="" class=""><span
                                                    class="float-right text-muted text-sm"><i
                                                        class="fas fa-trash-alt text-danger"></i></span></a>
                                        </button>


                                    </form>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                @else
                @endif

            </div>
            <div class="py-1">
                <a href="#"
                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated
                    link</a>
            </div>
        </div>
    </div>
</div>
