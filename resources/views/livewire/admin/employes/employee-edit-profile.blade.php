{{-- <style>
     .labels {
        font-size: 11px
    }
</style> --}}

<div class="container mt-5 mb-5 bg-white rounded">


    <div class="row">

        <x-message />
        <div class="col-md-3 border-right">
            <div class="p-3 py-5 text-center d-flex flex-column align-items-center">
                <img class="mt-5 rounded-circle" width="150px" src="{{ Avatar::create($name)->toBase64() }}">
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="mt-2 row">
                    <div class="col-md-6">
                        <h2  style="font-size: 11px">Voornaam</h2>
                        <input type="text" class="form-control" placeholder="Voornaam" wire:model='firstname' >
                        <span class="text-danger"> @error('firstname') {{ $message }}@enderror</span>
                    </div>
                    <div class="col-md-6">
                        <h2 style="font-size: 11px">Achternaam</h2>
                        <input type="text" class="form-control" wire:model='lastname'  placeholder="Achternaam">
                        <span class="text-danger"> @error('lastname') {{ $message }}@enderror</span>

                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Email</h2>
                        <input type="email" class="form-control" placeholder="Email " wire:model='email'>
                        <span class="text-danger"> @error('email') {{ $message }}@enderror</span>

                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Mobiel nummer</h2>
                        <input type="text"class="form-control" placeholder="Mobiel nummer" wire:model='phonenumber'>
                        <span class="text-danger"> @error('phonenumber') {{ $message }}@enderror</span>


                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Adres</h2>
                        <input type="text" class="form-control" placeholder="Adres" wire:model='address'>
                        <span class="text-danger"> @error('address') {{ $message }}@enderror</span>

                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Postcode</h2>
                        <input type="text" class="form-control" placeholder="Postcode" wire:model='zipcode'>
                        <span class="text-danger"> @error('zipcode') {{ $message }}@enderror</span>

                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Huisnummer</h2>
                        <input type="text"class="form-control" placeholder="Huisnummer" wire:model='housenumber'>
                        <span class="text-danger"> @error('housenumber') {{ $message }}@enderror</span>

                    </div>
                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Stad</h2>
                        <input type="text" class="form-control" placeholder="stad" wire:model='city' >
                        <span class="text-danger"> @error('city') {{ $message }}@enderror</span>

                    </div>

                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Role</h2>
                        <select class="form-control" wire:change="changeEmployeeRole( $event.target.value)" >
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ ($employee_role_name  ===  $role->name ) ? 'selected' : '' }}>{{ $role->name }}</option>

                            @endforeach

                          </select>
                    </div>


                    <div class="col-md-12">
                        <h2 style="font-size: 11px">Wachtwoord</h2>
                        <input type="password" class="form-control" placeholder="Wachtwoord" wire:model='password'>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-primary profile-button" wire:click="edit" >Save Profile</button>
                </div>
            </div>
        </div>

    </div>
</div>
