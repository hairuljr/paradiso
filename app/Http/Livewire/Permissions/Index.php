<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public $permission;
    public $name;

    protected $rules = [
        'name' => 'required|unique:permissions,name'
    ];

    public function ClearForm()
    {
        $this->name = '';
    }


    public function DetailData($id)
    {
        $permit = Permission::findOrFail($id);
        $this->permission = $permit;
    }

    public function delete()
    {
        $this->permission->delete();
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }


    public function render()
    {
        $permissions = Permission::orderBy('id', 'DESC')->get();
        return view('livewire.permissions.index', ['permissions' => $permissions])->extends('template.app');
    }
}
