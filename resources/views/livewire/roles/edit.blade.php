<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Role</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/roles" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" wire:submit.prevent="save">
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Nama Role</label>
                            <div class="col-md-5">
                                <input type="text" name="name" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="permissions" class="form-label">Pilih Hak Akses</label>

                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                    <th scope="col" width="20%">Nama Akses</th>
                                </thead>
                                @foreach ($permissions as $ps)
                                    <tr>
                                        <td>
                                            <input type="checkbox" wire:model.defer="permission"
                                                value="{{ $ps->name }}"
                                                {{ in_array($ps->name, $rolePermissions) ? 'checked' : '' }}
                                                class='permission'>
                                        </td>
                                        <td>{{ $ps->name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-5">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
