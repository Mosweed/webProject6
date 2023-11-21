<x-header>
<style>
    body {
        background-color: #F7F7F7;
    }

    .centered-row {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }


    .products-info {
        color: #8E98A0;
        font-size: 0.9rem;
    }

    /* .double-div {
        width: 2rem;
        position: relative;
    } */

    .section-title {
        color: #0B121A;
        font-weight: bold;
        font-size: 2rem;
    }

    .section-title3 {
        color: #0B121A;
        font-size: 1.7rem;
        font-weight: bold;
    }

    .section-title2 {
        color: #0B121A;
        font-size: 1rem;
        font-weight: bold;
    }

    .section-title4 {
        color: #0B121A;
        font-size: 1.4em;
        font-weight: bold;
    }

    .section-title5 {
        color: #0B121A;
        font-size: .9em;
        margin-bottom: 0;
    }

    .data-subtitle {
        color: #0B121A;
        font-size: 1rem;
        font-weight: bold;
    }

    .card {
        background-color: white;
        border: none;
        padding: 1rem;
        border-radius: 12px;
    }
</style>





<main>
    <div class="container">

        <div class="row">

            <div class="row">
                <div class="col-md-12">
                    <p class="section-title">Order History</p>
                    <br>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1 col-2 offset-md-1">
                                        <div class="section-title4">
                                            <i class="far fa-check-square fa-lg"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <p class="mb-0 section-title4"> {{ $Order->status }} </p>
                                    </div>
                                    <div class="col-md-12 offset-md-2 offset-2">
                                        <p class="section-title5"> Order Number </p>
                                        <p class="data-subtitle">
                                            {{ $Order->id }}
                                        </p>
                                        <br>
                                    </div>
                                    @if ($Order->status == 'Afgeleverd')
                                        <div class="col-md-12 offset-md-2 offset-2">
                                            <p class="section-title5">Afgeleverd op </p>
                                            <p class="data-subtitle">
                                                {{ $Order->delivery_date }}
                                            </p>
                                            <br>
                                        </div>
                                    @else
                                        <div class="col-md-12 offset-md-2 offset-2">
                                            <p class="section-title5"> Verwachte leverdatum </p>
                                            <p class="data-subtitle">
                                                {{ $Order->expected_delivery_date }}
                                            </p>
                                            <br>
                                        </div>
                                    @endif

                                    <div class="col-md-12 offset-md-2 offset-2">
                                        <p class="section-title5"> Totaal </p>
                                        <p class="data-subtitle">
                                            € {{ number_format($Order->total, 2, '.', ',') }}
                                        </p>
                                        <br>
                                    </div>

                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="center_row">
                                    <div class="col-md-12">
                                        <p class="section-title5">Producten </p>
                                        <br>
                                    </div>
                                </div>
                                @foreach ($order_items as $order_item)
                                    <div class="mb-1 row" style="">
                                        <div class="col-md-3 ">

                                            <img style="hight: 100px; width: 100px " src="{{ $order_item->image }}" />

                                        </div>
                                        <div class="col-md-3 ">
                                            <p class="products-info"> {{ $order_item->name }} </p>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="products-info"> {{ $order_item->quantity }} X
                                                    @if ($order_item->discount_percentage != 0)
                                                        {{ ($order_item->selling_price * $order_item->discount_percentage) / 100 }}
                                                    @else
                                                        {{ $order_item->selling_price }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <p class="data-subtitle">  € {{ number_format($order_item->price , 2, '.', ',') }}  </p>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-header>
