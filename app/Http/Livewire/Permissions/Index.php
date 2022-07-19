<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{

    use WithPagination;

    public $search;
    // public $page = 1;

    protected $updatesQueryString = [
        // ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $permission;
    public $name;

    protected $rules = [
        'name' => 'required|unique:permissions,name'
    ];
    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong.',



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
        $permissions = Permission::orderBy('id', 'DESC')->latest()->paginate(5);
        if ($this->search !== null) {
            $permissions = Permission::orderBy('id', 'DESC')->where('name', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(5);
        }

        return view('livewire.permissions.index', ['permissions' => $permissions])->extends('template.app');
    }
}
