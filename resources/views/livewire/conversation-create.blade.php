<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <h1>friends</h1>
    <div class=" w-75  mt-3 container-fluid mesUsers">
        @foreach ($users as $user)
            {{-- {{ dd('  ./../../../public/img/' . $user->receiver->photo . '.png') }} --}}
            <div class="card text-center mx-4 my-2 " style="width: 10rem; background-color:rgb(184, 182, 182)">
                <img class="card-img-top" src="{{ asset('img/' . $user->receiver->photo . '.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text text-decoration-underline h5">
                        {{ $user->receiver->name === auth()->user()->name ? $user->sender->name : $user->receiver->name }}

                    </p>
                    <h5 class="card-title text-decoration-capitalize text-blue-800">{{ $user->receiver->rôle }}</h5>
                    <a wire:click.prevent="startchat({{ $user->receiver->id }})" href=""
                        class="btn btn-primary">Discuss</a>
                </div>
            </div>
            {{-- <li class="list-group-item mt-3  list-group-item-action d-flex justify-content-between mx-3 " id="userRole"
                class=>
                {{ $user->receiver->id }}
            </li> --}}
        @endforeach

    </div>



</div>
