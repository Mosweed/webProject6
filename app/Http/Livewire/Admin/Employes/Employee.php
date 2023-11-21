<?php

namespace App\Http\Livewire\Admin\Employes;

use App\Models\employee as medeweker;
use App\Models\role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Employee extends Component
{
    use WithPagination;

    public $employeee;

    public $name;

    public $email;

    public $password;

    //public $role;
    public $employee_id;

    public $roles;

    public $sortColumnName = 'employees.id';

    public $sortDirection = 'asc';

    public $searchTerm = null;

    public $searchrole = null;

    protected $queryString = ['searchTerm' => ['except' => ''], 'searchrole' => ['except' => '']];

    public function sortBy($columnName)
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function updatedSearchTerm()
    {
        $this::resetPage();
    }

    public function changeSearchrole()
    {
        $this->resetPage();
    }

    public function changeUserRole(medeweker $employee, $role)
    {
        $user = User::find($employee->user_id);
        $user->update(['role' => $role]);
        session()->flash('success', 'status changed to {$status} successfully.');
    }

    public function delete($id)
    {
        if ($id) {
            $employeee = medeweker::where('id', $id)->first();
            $user = User::where('id', $employeee->user_id)->first();
            $employeee->delete();
            $user->delete();
            $this->emit('employeeDeleted');
        }
        session()->flash('success', 'status changed to {$status} successfully.');

    }

    public function render()
    {
        $this->roles = role::where('id', '!=', 1)->get();
        $employees = medeweker::query();
        $employees->join('users', 'users.id', '=', 'employees.user_id')
            ->join('roles', 'roles.id', '=', 'users.role');
        $employees->where('users.id', '!=', auth()->id());

        if ($this->searchrole != null) {
            if ($this->searchrole != 'Alle') {
                if ($this->searchTerm != null) {
                    $employees->where(function ($query) {
                        $query->where('firstname', 'like', '%'.$this->searchTerm.'%')
                            ->orWhere('lastname', 'like', '%'.$this->searchTerm.'%')
                            ->orWhere('employees.id', 'like', '%'.$this->searchTerm.'%')
                            ->orWhere('users.email', 'like', '%'.$this->searchTerm.'%');
                    });

                    $employees->where('roles.name', $this->searchrole);

                } else {
                    $employees->where('roles.name', $this->searchrole);
                }
            } else {
                if ($this->searchTerm != null) {
                    $employees->where(function ($query) {
                        $query->where('firstname', 'like', '%'.$this->searchTerm.'%')
                            ->orWhere('lastname', 'like', '%'.$this->searchTerm.'%')
                            ->orWhere('employees.id', 'like', '%'.$this->searchTerm.'%')
                            ->orWhere('users.email', 'like', '%'.$this->searchTerm.'%');
                    });
                } else {

                }

            }
        } else {
            if ($this->searchTerm != null) {
                $employees->where(function ($query) {
                    $query->where('firstname', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('lastname', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('employees.id', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('users.email', 'like', '%'.$this->searchTerm.'%');
                });
            }
        }

        $employees = $employees->select('employees.*', 'users.email', 'roles.name as rolename');

        $employees = $employees->orderBy($this->sortColumnName, $this->sortDirection)->paginate(5);

        return view('livewire.admin.employes.employee', compact('employees'))->layout('components.admin');
    }
}
