<x-admin>
    <section>
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Biling details</h5>
                    </div>
                    <div class="card-body">
                        <form  action="/checkout/test/" method="POST">
                            @csrf
                            @method('POST')

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" name="first_name" class="form-control" placeholder="Voornaam"
                                            value="{{ auth()->user()->castomer->firstname }}" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" name="last_name" class="form-control" placeholder="Achternaam"
                                            value="{{ auth()->user()->castomer->lastname }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text " name="country" class="form-control" placeholder="Land"
                                    value="{{ auth()->user()->castomer->country }}" />
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" name="address" class="form-control" placeholder="Straat en huisnummer"
                                    value="{{ auth()->user()->castomer->address }}" />
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" name="zip" class="form-control" placeholder="Postcode "
                                    value="{{ auth()->user()->castomer->zipcode }}" />
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" name="city" class="form-control" placeholder="Plaats "
                                    value="{{ auth()->user()->castomer->city }}" />
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" name="phone" class="form-control" placeholder="Telefoon "
                                    value="{{ auth()->user()->castomer->phonenumber }}" />
                            </div>
                            <div class="form-outline mb-4">
                                <input type="email" name="email" class="form-control" placeholder="E-mailadres"
                                    value="{{ auth()->user()->email }}" />
                            </div>
                            <hr class="my-4" />

                            <button class="btn btn-primary btn-lg btn-block cartbutton primairy-button no-margin" type="submit">
                                Continue to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
</x-admin>
