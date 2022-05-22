<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $name;
    public $email;
    public $username;
    public $role;
    public $roles;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email,' . $this->user->id,
            'username' => 'required|unique:users,username,' . $this->user->id,
        ]);
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
        ]);
        $role = Role::whereName($this->role)->first();
        $this->user->syncRoles($role->id);
        session()->flash('pesan', 'Data berhasil diubah');
        return redirect('users');
    }

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->user = $user;
        $this->name = $user->name;
        $this->role = $user->getRoleNames()->first();
        $this->email = $user->email;
        $this->username = $user->username;
    }

    public function render()
    {
        $this->roles = Role::get();
        return view('livewire.users.edit', ['roles' => $this->roles])->extends('template.app');
    }
}
