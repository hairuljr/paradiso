<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $name;
    public $role;
    public $permission = [];
    public $permissions;
    public $rolePermissions;

    protected $rules = [
        'name' => 'required',
        'permission' => 'required',
    ];

    public function save()
    {
        $this->validate();
        $this->role->update(['name' => $this->name]);
        $this->role->syncPermissions($this->permission);
        session()->flash('pesan', 'Data berhasil diubah');
        return redirect('roles');
    }

    public function mount($id)
    {
        $role = Role::findOrFail($id);
        $this->role = $role;
        $this->name = $role->name;
        $this->permission = $this->role->permissions->pluck('name')->toArray();
    }

    public function render()
    {
        $this->permissions = Permission::get();
        $this->rolePermissions = $this->role->permissions->pluck('name')->toArray();
        return view('livewire.roles.edit', ['permissions' => $this->permissions])->extends('template.app');
    }
}
