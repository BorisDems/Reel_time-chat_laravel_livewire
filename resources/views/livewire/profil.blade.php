<div class="fullProfil">

    <div class="container  myLive">
        <div class="row">
            <div class=" viewProfil border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold mt-3">{{ auth()->user()->name }}</span><span
                        class="">{{ auth()->user()->email }}</div>
            </div>
            <div class=" border-right info">
                <div class="p-3 py-5 position-relative">
                    <span class="close">close</span>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right h1">Profile Settings</h4>
                    </div>
                    <form wire:submit.prevent="update" action="" method="POST" class="profilform">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                    name="name" class="form-control" placeholder="first name"
                                    value="{{ auth()->user()->id !== null ? auth()->user()->name : old('name') }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                    name='email' class="form-control" placeholder="enter email"
                                    value="{{ auth()->user()->id !== null ? auth()->user()->email : old('email') }}">
                            </div>
                            <div class="py-3 col-md-12"><label class="labels">Email ID</label><input type="text"
                                    class="form-control" placeholder="Waiting for inspiration" value="" disabled>
                            </div>
                            <div class="col-md-12"><label class="labels">Education</label><input type="text"
                                    class="form-control" placeholder="Waiting for inspiration" value="" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-around">
                            <div class="mt-5 text-center"><button wire:click="delete({{ auth()->user()->id }})"
                                    class="btn btn-danger profile-button" type="button">delete Profil</button>
                            </div>
                            <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button"
                                    type="button">Save
                                    Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>
</div>
