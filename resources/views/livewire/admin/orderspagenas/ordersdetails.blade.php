<section>
    <div class="row">
        <div class="mb-4 col-md-8">
            <div class="mb-4 card">
                <div class="py-3 card-header">
                    <h5 class="mb-0">Biling details</h5>
                </div>
                <div class="card-body">

                    <div class="mb-4 row">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="first_name" class="form-control" placeholder="Voornaam"
                                    wire:model='order_user_info->first_name' />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="last_name" class="form-control" placeholder="Achternaam"
                                    wire:model='order_user_info->last_name' />
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 form-outline">
                        <input type="text " name="country" class="form-control" placeholder="Land"
                            wire:model='order_user_info->country' />
                    </div>
                    <div class="mb-4 form-outline">
                        <input type="text" name="address" class="form-control" placeholder="Straat en huisnummer"
                            wire:model='order_user_info->address' />
                    </div>
                    <div class="mb-4 form-outline">
                        <input type="text" name="zip" class="form-control" placeholder="Postcode "
                            wire:model='order_user_info->zip' />
                    </div>

                    <div class="mb-4 form-outline">
                        <input type="text" name="city" class="form-control" placeholder="Plaats "
                            wire:model='order_user_info->city' />
                    </div>

                    <div class="mb-4 form-outline">
                        <input type="text" name="phone" class="form-control" placeholder="Telefoon "
                            wire:model='order_user_info->phone' />
                    </div>
                    <div class="mb-4 form-outline">
                        <input type="email" name="email" class="form-control" placeholder="E-mailadres"
                            wire:model='order_user_info->email' />
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>

        <div class="mb-4 col-md-4">
            <div class="mb-4 card">
                <div class="py-3 card-header">
                    <h5 class="mb-0">Subtotaal</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="px-0 list-group-item d-flex justify-content-between align-items-center">
                            Verzending
                            <span>Gratis</span>
                        </li>
                        <li
                            class="px-0 mb-3 border-0 list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Total </strong>
                                <strong>
                                    <p class="mb-0">(inclusief btw)</p>
                                </strong>
                            </div>
                            <span><strong>€ {{ number_format($order_user_info->total, 2, '.', ',') }}</strong></span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
