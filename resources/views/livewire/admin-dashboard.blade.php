<div>
    <div class=" position-relative" style="background-color: rgb(243, 243, 243)">
        <div class="row">

            <div class="col-5"></div>
            <div class=" col-md-12 d-flex justify-content-center align-items-center pt-3">
                <div class="mx-4 rounded ">
                    <select class="form-select bg-info" name="" id="">
                        <option value="">order by name</option>
                        <option value="">create at</option>
                        <option value="">signalisations</option>
                        <option value="">most chat</option>
                    </select>
                </div>


                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search a User Name"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-info">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body w-75 mx-auto pb-0 mb-0">
            <!-- Conversations are loaded here -->

            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
            @endif
            <table class="table ">
                <thead class="table-dark ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">image</th>
                        <th scope="col">Rôles</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="h5">
                    @forelse ($users as $user)
                        <tr>
                            <th class="py-3">{{ $user->id }}</th>
                            <td class="py-3">{{ $user->name }}</td>
                            <td class="py-3"> {{ $user->email }} </td>
                            <td class="py-3"> <a href="{{ asset('img/' . $user->photo . '.png') }}"> <img
                                        width="35px" src="{{ asset('img/' . $user->photo . '.png') }}" alt="phopt"
                                        class="rounded rouded-pill" title="click to view"> </a>
                            </td>
                            <td class="py-3">{{ $user->rôle }}</td>
                            <td class="py-3 text-center d-flex justify-content-center">
                                <a wire:click.prevent="destroy({{ $user->id }})" href=""
                                    title="permanently delete" class="mx-3">
                                    <button class="btn btn-danger">
                                        Delete</button>
                                    {{-- <i class="fa fa-address-book"></i> --}}
                                </a>
                                <a wire:click.prevent="edit({{ $user->id }})" href="" title="change role"
                                    class="mx-3">
                                    <button class="btn btn-success">
                                        Upgrade</button>
                                    {{-- <i class="fa fa-user"></i> --}}
                                </a>


                                <a wire:click.prevent="SoftDelete({{ $user->id }})" href=""
                                    title="soft delete" class="mx-3"> <button class="btn btn-warning">
                                        Block</button>
                                    {{-- <i class="fa fa-user"></i> --}}
                                </a>
                            </td>

                        </tr>
                    @empty
                        <p class="text-danger"> aucun utilisateur enregistré</p>
                    @endforelse
                </tbody>
            </table>


        </div>
        <div class="card-footer d-flex justify-content-center ">
            <div class="pagination p-0">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
