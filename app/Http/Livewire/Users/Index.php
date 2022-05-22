<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $email;
    public $username;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email:rfc,dns|unique:users,email',
        'username' => 'required|unique:users,username',
    ];

    public function ClearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->username = '';
    }


    public function DetailData($id)
    {
        $user = User::findOrFail($id);
        $this->user = $user;
    }

    public function delete()
    {
        $this->user->delete();
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }


    public function render()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('livewire.users.index', ['users' => $users])->extends('template.app');
    }
}
