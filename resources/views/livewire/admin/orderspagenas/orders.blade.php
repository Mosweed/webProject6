
<div class="content">
    <div class="container-fluid">
        <x-message />
        <div class="row">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3" >

                    <select class="form-control" style="height: 45px" wire:model="status" wire:change="changeonstatus()">
                        <option value="Alle" selected >Alle</option>
                        <option value="Inbehandeling" >Inbehandeling</option>
                        <option value="Betaald" >Betaald</option>
                        <option value="Afgeleverd" >Afgeleverd</option>
                        <option value="Retour" >Retour</option>
                        <option value="Gedeeltelijk verzonden" >Gedeeltelijk verzonden</option>
                    </select>

                </div>
                <div class="col-sm-6 col-md-3">
                    <x-search-input wire:model="searchTerm" />
                </div>

            </div>
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0 table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Bestelling
                                        <span wire:click="sortBy('id')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        Datum
                                        <span wire:click="sortBy('date')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'date' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'date' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">Verkoopgesgeschiedenis
                                        <span wire:click="sortBy('drawer_id')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'drawer_id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'drawer_id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">status
                                        <span wire:click="sortBy('status')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'status' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'status' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">Totaal
                                        <span wire:click="sortBy('total')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'total' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down{{ $sortColumnName === 'total' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody wire:loading.class="text-muted">
                                @if ($orders->count() > 0)

                                @foreach  ($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                    <td>{{ $order->date }}</td>
                                    @if ($order->drawer_id == 0)
                                        <td>website</td>
                                    @else
                                        <td>Kassa{{ $order->drawer_id }}</td>
                                    @endif

                                      <td>
                                            <select class="form-control" wire:change="changeOrderstatus({{ $order }}, $event.target.value)">
                                                <option value="Inbehandeling" {{ ($order->status === 'Inbehandeling') ? 'selected' : '' }}>Inbehandeling</option>
                                                <option value="Betaald" {{ ($order->status === 'Betaald') ? 'selected' : '' }}>Betaald</option>
                                                <option value="Afgeleverd" {{ ($order->status === 'Afgeleverd') ? 'selected' : '' }}>Afgeleverd</option>
                                                <option value="Retour" {{ ($order->status === 'Retour') ? 'selected' : '' }}>Retour</option>
                                                <option value="Gedeeltelijk verzonden" {{ ($order->status === 'Gedeeltelijk verzonden') ? 'selected' : '' }}>Gedeeltelijk verzonden</option>

                                            </select>
                                        </td>
                                    <td>
                                        {{ $order->total }}
                                    </td>
                                    <td>
                                        <a href="{{ route('orderdetails.admin', $order)  }}" class="btn btn-info">Bekijk de bestelling</a>
                                        <a href="{{ route('order_generate-pdf', $order)  }}" target="_blank" class="btn btn-primary">Factuur</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="text-center">
                                    <td colspan="5">
                                        <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                                        <p class="mt-2">No results found</p>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
