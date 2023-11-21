{{-- @php
    dd($employees);
@endphp --}}
<div class="content">
    <div class="container-fluid">
        <x-message />
        <div class="row">
              <div class="row filter-row" >
                <div class="col-sm-6 col-md-3" style="height:45px">
                    <a class="btn btn-success" href="{{ route('employee.create') }}">Voeg een medewerker toe</a>
                </div>
                    <div class="col-sm-6 col-md-3">

                            <select class="form-control" style="height:45px" wire:model="searchrole" wire:change="changeSearchrole()">
                                <option value="Alle" selected >Alle</option>
                                <option value="admin" selected >Admin</option>
                                <option value="humanresources" >Human Resources</option>
                                <option value="employee" >Employee</option>
                            </select>

                    </div>
                    <div class="col-sm-6 col-md-3">
                        <x-search-input wire:model="searchTerm" />
                    </div>

                </div>
            <div class="col-lg-12">


                <div class="mb-2 d-flex justify-content-between">



                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0 table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        #
                                        <span wire:click="sortBy('employees.id')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">
                                        Voornaam
                                        <span wire:click="sortBy('firstname')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'firstname' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'firstname' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">Achternaam
                                        <span wire:click="sortBy('lastname')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'lastname' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'lastname' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">role
                                        <span wire:click="sortBy('rolename')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'rolename' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down {{ $sortColumnName === 'rolename' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col">Email
                                        <span wire:click="sortBy('email')" class="float-right text-sm" style="cursor: pointer;">
                                            <i class="bi bi-arrow-up {{ $sortColumnName === 'email' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                            <i class="bi bi-arrow-down{{ $sortColumnName === 'email' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                        </span>
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody wire:loading.class="text-muted">
                                @if ($employees->count() > 0)

                                @foreach  ($employees as $employee)
                                <tr>
                                    <td>
                                        {{ $employee->id }}
                                    </td>
                                    <td>
                                        {{ $employee->firstname }}
                                    </td>
                                    <td>{{ $employee->lastname }}</td>
                                      <td>
                                            <select class="form-control" wire:change="changeUserRole({{ $employee }}, $event.target.value)"  >
                                              @foreach ($roles as $role)
                                              <option value="{{ $role->id }}" {{ ($employee->rolename  ===  $role->name ) ? 'selected' : '' }}>{{ $role->name }}</option>

                                              @endforeach

                                            </select>
                                        </td>
                                    <td>
                                        {{ $employee->email }}
                                    </td>
                                    <td>

                                        <a class="btn btn-primary" href="{{ route('employee.edit', $employee->id) }}">Bijwerken / inzien</a>


                                        <button type="submit" wire:click='delete({{ $employee->id }})' class="btn btn-danger">Verwijderen</button>
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
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
