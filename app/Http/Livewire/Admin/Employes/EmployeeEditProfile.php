<?php

namespace App\Http\Livewire\Admin\Employes;

use App\Models\employee as medeweker;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class EmployeeEditProfile extends Component
{
    public $employee_id;

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

    public $employee_role_name;

    public $employee_role_id;

    public $roles;

    public $user_id;

    public function mount(Request $request)
    {

        if ($request->employee) {
            //dd($request->employee);

            $this->roles = role::where('id', '!=', 1)->get();
            $emploee = medeweker::where('id', '=', $request->employee)->first();
            //dd( $emploee);
            $this->employee_id = $request->employee;

            $user = User::where('id', '=', $emploee->user_id)->first();
            $this->user_id = $emploee->user_id;
            $this->firstname = $emploee->firstname;
            $this->lastname = $emploee->lastname;
            $this->city = $emploee->city;
            $this->address = $emploee->address;
            $this->zipcode = $emploee->zipcode;
            $this->housenumber = $emploee->housenumber;
            $this->phonenumber = $emploee->phonenumber;

            $this->name = $user->name;
            $this->email = $user->email;
            $this->employee_role_name = $user->role;
            $this->employee_role_id = role::where('name', '=', $user->role)->first()->id;
        }

    }

    public function edit()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'housenumber' => 'required',
            'phonenumber' => 'required',
            'name' => 'required',
            'email' => 'required',
        ], [
            'firstname.required' => 'Voornaam is verplicht',
            'lastname.required' => 'Achternaam is verplicht',
            'city.required' => 'Stad is verplicht',
            'address.required' => 'Adres is verplicht',
            'zipcode.required' => 'Postcode is verplicht',
            'housenumber.required' => 'Huisnummer is verplicht',
            'phonenumber.required' => 'Telefoonnummer is verplicht',
            'name.required' => 'Naam is verplicht',
            'email.required' => 'Email is verplicht',
        ]

        );

        if ($this->password == null) {

            $user = User::find($this->user_id)->update([
                'name' => $this->firstname.' '.$this->lastname,
                'email' => $this->email,
                'role' => $this->employee_role_id,
            ]);
        } else {
            $user = User::find($this->user_id)->update([
                'name' => $this->firstname.' '.$this->lastname,
                'email' => $this->email,
                'role' => $this->employee_role_id,
                'password' => bcrypt($this->password),
            ]);
        }
        // $user = User::find($this->user_id);

        // $user->name = $this->firstname . ' ' . $this->lastname;
        // $user->email = $this->email;
        // $user->role = $this->employee_role_id;

        // $user->update();
        $medewerker = medeweker::find($this->employee_id)->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'city' => $this->city,
            'address' => $this->address,
            'zipcode' => $this->zipcode,
            'housenumber' => $this->housenumber,
            'phonenumber' => $this->phonenumber,
        ]);

        return redirect()->route('employee.index');

    }

    public function changeEmployeeRole($id)
    {
        $this->employee_role_id = $id;

    }

    public function render()
    {

        return view('livewire.admin.employes.employee-edit-profile')->layout('components.admin');
        //  session()->flash('message', 'status changed to {$status} successfully.');

    }
}
