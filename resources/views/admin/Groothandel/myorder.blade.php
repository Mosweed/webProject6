<x-admin>
    <x-message />
    <div class="container mt-3 mt-md-5">

        <div class="mb-4 card w-100">
            <div class="py-3 card-header">
            </div>
            <div class="col-12">
                <div class="mb-5 list-group">
                    @foreach ($orderItems as $orderItem)
                        <div class="p-3 list-group-item bg-snow" style="position: relative;">
                            <div class="row w-100 no-gutters">
                                <div class="col-6 col-md">
                                    <h6 class="mb-0 text-charcoal w-100">Bestelling Nummer</h6>
                                    <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">#{{ $orderItem->id }}</p>
                                </div>

                                <div class="col-6 col-md">
                                    <h6 class="mb-0 text-charcoal w-100">Product id</h6>
                                    <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">{{ $orderItem->Product_id }}</p>
                                </div>
                                <div class="col-6 col-md">
                                    <h6 class="mb-0 text-charcoal w-100">Hoeveelheid</h6>
                                    <p class="mb-0 mb-2 text-pebble w-100 mb-md-0">{{ $orderItem->Quantity }}</p>
                                </div>
                                {{-- TODO: pass id and catId args to route. --}}
                                <div class="col-6 col-md">
                                    <h6 class="mb-0 text-charcoal w-100">Categorie</h6>
                                    <form action="{{ route('myorders.import') }}" method="POST">
                                        @csrf
                                        <select name="category" class="form-select">
                                            <option value="">Selecteer Categorie</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{ $orderItem->id }}">
                                        <input type="hidden" name="categoryId" value="1">
                                        <button type="submit"
                                            style="{{ $orderItem->imported == 1 ? 'pointer-events: none; background-color: #dbdbdb; color: gray; border: unset;' : '' }}"
                                            class="float-left mt-2 p-2 text-decoration-none btn-info">Importeer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-admin>

<script></script>
