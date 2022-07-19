<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;
    public $email;
    public $username;
    public $role;
    protected $rules = [
        'name' => 'required',
        // 'email' => 'required|email:rfc,dns|unique:users,email',
        'username' => 'required|unique:users,username',
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong.',
        'username.required' => 'Username Produk tidak boleh kosong.',
        // 'jenis_produk_kode.required' => 'Jenis Produk tidak boleh kosong.',



    ];

    public function save()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => bcrypt('password')
        ]);
        $user->assignRole($this->role);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('users');
    }

    public function render()
    {
        $roles = Role::get();
        return view('livewire.users.create', compact('roles'))->extends('template.app');
    }
}
