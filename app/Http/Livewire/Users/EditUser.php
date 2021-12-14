<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class EditUser extends Component
{
    use WithFileUploads;

    public $isOpen = false;

    public $user_id, $name, $email;

    protected $user;

    public $photo;

    protected $listeners = ['openEditUser' => 'showModal'];

    public function render()
    {
        return view('livewire.users.edit-user');
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
        ];
    }

    public function showModal($userId)
    {
        $this->isOpen = true;

        $this->openUser($userId);
    }

    public function openUser($userId)
    {
        $this->user_id = $userId;

        $user = User::find($this->user_id);
        
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        $data = $this->validate();

        $user = User::find($this->user_id);

        $user->update($data);

        $this->reset();

        $this->emitUp('getUsers');

        $this->emit('sweetalert2', [
            'title' => 'User Updated successfully!',
            'message' => '',
            'type' => 'success'
        ]);
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);

        $path =  $this->photo->store('photos', 'public');

        $user = User::find($this->user_id);

        $user->update([
            'photo' => $path
        ]);

        $this->emitUp('getUsers');
    }
}
