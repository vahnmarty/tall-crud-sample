<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
class ManageUsers extends Component
{
    public $users = [];

    protected $listeners = ['getUsers'];

    public function render()
    {
        return view('livewire.users.manage-users');
    }

    public function mount()
    {
        $this->getUsers();
    }

    public function getUsers()
    {
        $this->users = User::latest()->get();
    }

    public function createUser()
    {
        $this->emit('openCreateUser');
    }

    public function editUser($userId)
    {
        $this->emit('openEditUser', $userId);
    }

    public function changePassword($userId)
    {
        $this->emit('openChangePassword', $userId);
    }

    public function deleteUser($userId)
    {
        User::destroy($userId);

        $this->getUsers();
    }

}
