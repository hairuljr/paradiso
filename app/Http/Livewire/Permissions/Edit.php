<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    public $name;
    public $permission;

    protected $rules = [
        'name' => 'required',
    ];

    public function save()
    {
        $this->validate();
        $this->permission->update(['name' => $this->name]);
        session()->flash('pesan', 'Data berhasil diubah');
        return redirect('permissions');
    }

    public function mount($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permission = $permission;
        $this->name = $permission->name;
    }

    public function render()
    {
        return view('livewire.permissions.edit')->extends('template.app');
    }
}
