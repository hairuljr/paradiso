<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;
    public $allPermit = [];
    public $permission = [];
    protected $rules = [
        'name' => 'required',
        'permission' => 'required',
    ];
    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong.',



    ];
    public function save()
    {
        if ($this->allPermit) {
            $this->permission = Permission::get()->pluck('name');
        }
        $this->validate();
        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->permission);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('roles');
    }

    public function render()
    {
        $permissions = Permission::get();
        return view('livewire.roles.create', compact('permissions'))->extends('template.app');
    }
}
