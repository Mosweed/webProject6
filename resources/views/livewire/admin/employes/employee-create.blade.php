<div class="container mt-5 mb-5 bg-white rounded">
    <div class="row">



        <x-message />

        <div class="col-md-12 ">
            <div class="p-3 py-5">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="mt-2 row">
                    <div class="col-md-6">
                        <h2 style="font-size: 11px">Voornaam</h2>
                        <input type="text" class="form-control" placeholder="Voornaam" wire:model='data.firstname'>
                        <span class="text-danger"> @error('firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <h2 style="font-size: 11px">Achternaam</h2>
                        <input type="text" class="form-control" wire:model='data.lastname' placeholder="Achternaam">
                        <span class="text-danger"> @error('lastname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Email</h2>
                        <input type="email" class="form-control" placeholder="Email " wire:model='data.email'>
                        <span class="text-danger"> @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Mobiel nummer</h2>
                        <input type="text"class="form-control" placeholder="Mobiel nummer"
                            wire:model='data.phonenumber'>
                        <span class="text-danger"> @error('phonenumber')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Adres</h2>
                        <input type="text" class="form-control" placeholder="Adres" wire:model='data.address'>
                        <span class="text-danger"> @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Postcode</h2>
                        <input type="text" class="form-control" placeholder="Postcode" wire:model='data.zipcode'>
                        <span class="text-danger"> @error('zipcode')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Huisnummer</h2>
                        <input type="text"class="form-control" placeholder="Huisnummer"
                            wire:model='data.housenumber'>
                        <span class="text-danger"> @error('housenumber')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Stad</h2>
                        <input type="text" class="form-control" placeholder="stad" wire:model='data.city'>
                        <span class="text-danger"> @error('city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Role</h2>
                        <select class="form-control" wire:change="changeEmployeeRole( $event.target.value)">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> @error('role')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Wachtwoord</h2>
                        <input type="password" class="form-control" placeholder="Wachtwoord" wire:model='data.password'>
                        <span class="text-danger"> @error('password')
                                {{ $message }}
                            @enderror
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-primary profile-button" wire:click="create">Save
                        Profile</button>
                </div>
            </div>
        </div>

    </div>
</div>
