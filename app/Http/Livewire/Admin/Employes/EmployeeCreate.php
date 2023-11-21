<?php

namespace App\Http\Livewire\Admin\Employes;

use App\Models\employee as medeweker;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EmployeeCreate extends Component
{
    public $data = [];

    public $firstname;

    public $lastname;

    public $city;

    public $address;

    public $zipcode;

    public $housenumber;

    public $phonenumber;

    public $name;

    public $email;

    public $password;

    public $employee_role_id;

    public $user_id;

    public $roles;

    public function mount()
    {
        $this->roles = role::where('id', '!=', 1)->get();
    }

    public function changeEmployeeRole($id)
    {
        $this->data['role'] = $id;

    }

    public function create()
    {

        $validator = Validator::make($this->data, [

            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'city' => 'required|alpha',
            'address' => 'required |alpha',
            'zipcode' => 'required',
            'housenumber' => 'required',
            'phonenumber' => 'required|numeric|digits_between:10,10',

        ], [
            'email.required' => 'Email is verplicht',
            'email.email' => 'Email is niet geldig',
            'password.required' => 'Wachtwoord is verplicht',
            'password.min' => 'Wachtwoord moet minimaal 8 karakters bevatten',
            'role.required' => 'Rol is verplicht',
            'firstname.required' => 'Voornaam is verplicht',
            'firstname.alpha' => 'Voornaam mag alleen letters bevatten',
            'lastname.required' => 'Achternaam is verplicht',
            'lastname.alpha' => 'Achternaam mag alleen letters bevatten',
            'city.required' => 'Stad is verplicht',
            'city.alpha' => 'Stad mag alleen letters bevatten',
            'address.required' => 'Adres is verplicht',
            'address.alpha' => 'Adres mag alleen letters bevatten',
            'zipcode.required' => 'Postcode is verplicht',
            'housenumber.required' => 'Huisnummer is verplicht',
            'phonenumber.required' => 'Telefoonnummer is verplicht',
            'phonenumber.numeric' => 'Telefoonnummer mag alleen cijfers bevatten',
            'phonenumber.digits_between' => 'Telefoonnummer moet 10 cijfers bevatten',

        ]

        )->validate();

        //dd($validator);

        $validator['password'] = Hash::make($validator['password']);
        $validator['name'] = $validator['firstname'].' '.$validator['lastname'];
        $user = User::create($validator);

        $validator['employee_number'] = $this->EmployeeEan8sum();

        $validator['user_id'] = $user->id;
        $employee = medeweker::create($validator);
        if ($employee && $user) {
            session()->flash('success', 'Medewerker is aangemaakt.');

            return redirect()->route('employee.index');
        } else {

            if ($user) {
                $user->delete();
            }
            if ($employee) {
                $employee->delete();
            }

            session()->flash('error', 'Medewerker is niet aangemaakt.');

            return redirect()->route('employee.create');
        }
    }

    public function EmployeeEan8sum()
    {
        // $ean8 = preg_replace('/\D/', '', $ean8);

        $prefix = '12';

        $ean8 = $prefix.mt_rand(10000, 99999);
        $digits = str_split($ean8);

        $odd = 0;
        $even = 0;
        $sum = 0;

        for ($i = count($digits) - 1; $i >= 0; $i--) {

            if ($i % 2 == 0) {
                $odd += $digits[$i];
            } else {
                $even += $digits[$i];
            }

        }
        $sum = $odd * 3 + $even * 1;
        $checksum = $ean8.(10 - ($sum % 10)) % 10;

        return $checksum;
    }

    public function render()
    {
        return view('livewire.admin.employes.employee-create')->layout('components.admin');
    }
}
