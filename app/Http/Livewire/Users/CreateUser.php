<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{
    public $isOpen = false;

    public $name, $email, $password, $password_confirmation;

    protected $listeners = ['openCreateUser' => 'showModal'];

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed'
    ];

    public function render()
    {
        return view('livewire.users.create-user');
    }

    public function showModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save()
    {
        $data = $this->validate();

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        $this->emitUp('getUsers');

        $this->closeModal();
    }
}
