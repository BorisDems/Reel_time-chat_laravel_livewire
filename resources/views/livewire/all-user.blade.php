<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <h1>All Users</h1>

    <ul class="list-group w-75 mx-auto mt-3 container-fluid mesUsers">
        @forelse ($users as $user)
            {{-- {{ dd($invite) }} --}}
            <li class="list-group-item mt-3 userlist list-group-item-action d-flex justify-content-between  mx-3 ">
                <span class="col-md-7">{{ $user->name }}</span>
                <button class="btn btn-light"><a href="{{ asset('img/' . $user->photo . '.png') }}">view photo
                    </a></button>
                {{-- {{ dd(auth()->user()->invitations) }} --}}
                <span wire:click='sendinvitation({{ $user->id }})' class="btn rounded-pill btn-primary"> +
                    Add
                </span>
            </li>

        @empty
            <div class="alert alert-warning h2">
                Please Share this App to Have more Users
            </div>
        @endforelse
    </ul>

    <div class="card-footer mt-2 d-flex justify-content-center ">
        <div class="pagination p-0">
            {{ $users->links() }}
        </div>
    </div>
</div>
