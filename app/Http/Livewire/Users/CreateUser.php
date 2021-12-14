<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $isOpen = false;

    public $name, $email, $password, $password_confirmation;

    public $photo;

    protected $listeners = ['openCreateUser' => 'showModal'];

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
        'photo' => 'nullable|image|max:1024'
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
        $this->validate();

        $image_path = $this->photo ? $this->photo->store('photos', 'public') : null;

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'email_verified_at' => now(),
            'photo' => $image_path
        ]);

        $this->emitUp('getUsers');

        $this->reset();

        $this->emit('sweetalert2', [
            'title' => 'New User created',
            'message' => '',
            'type' => 'success'
        ]);
    }
}
