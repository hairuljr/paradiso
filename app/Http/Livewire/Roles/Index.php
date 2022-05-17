<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $role;
    public $name;
    public $permission;

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'permission' => 'required',
    ];

    public function ClearForm()
    {
        $this->name = '';
        $this->permission = '';
    }


    public function DetailData($id)
    {
        $role = Role::findOrFail($id);
        $this->role = $role;
    }

    public function delete()
    {
        $this->role->delete();
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }


    public function render()
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('livewire.roles.index', ['roles' => $roles])->extends('template.app');
    }
}
