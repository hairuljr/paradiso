<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $name;
    protected $rules = [
        'name' => 'required',
    ];

    public function save()
    {
        $this->validate();
        Permission::create(['name' => $this->name]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('permissions');
    }

    public function render()
    {
        return view('livewire.permissions.create')->extends('template.app');
    }
}
