<x-admin>
    <style>
    </style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="mb-5">Geplaatste bestellingen</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <h4>Contact gegevens</h4>
                <p>Directrice: Anne Kuin</p>
                <p><strong>Bestel telefoonnummer: 06-91204657</strong></p>
                <p>Adres: Kruiswaal 16 1161 AM Zwanenburg</p>
                <p>E-mailadres: AnneKuin@kuinshop.com, info@kuinshop.com</p>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class=".col-md-6">
            <div class="order-card">
                <h3>Bestelling #4</h3>
                <p>Datum van bestelling: 2023-06-01</p>
                <p>Status: Completed</p>
            </div>
        </div>
    </div>
</x-admin>