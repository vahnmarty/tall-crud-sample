<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class ChangePassword extends Component
{
    public $isOpen = false;

    public $user_id, $password, $password_confirmation;

    public $user;

    protected $listeners = ['openChangePassword' => 'showModal'];

    protected $rules = [
        'password' => 'required|min:8|confirmed'
    ];

    public function render()
    {
        return view('livewire.users.change-password');
    }

    public function showModal($userId)
    {
        $this->isOpen = true;

        $this->user_id = $userId;
        $this->user = User::find($this->user_id);
    }

    public function save()
    {
        $this->validate();

        $this->user->update([
            'password' => bcrypt($this->password)
        ]);

        $this->reset();

        $this->emitUp('getUsers');
    }
    
}
