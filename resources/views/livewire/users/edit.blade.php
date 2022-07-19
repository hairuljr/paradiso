<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/users" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
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
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-5">
                                <input type="text" name="name" wire:model="name" class="form-control">
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                  
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-5">
                                <input type="text" name="username" wire:model="username" class="form-control">
                                @error('username')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Role</label>
                            <div class="col-md-5">
                                <select wire:model="role" class="form-select" aria-label="Pilih Role User">
                                    <option selected disabled>Pilih Role</option>
                                    @foreach ($roles as $jk)
                                        <option value="{{ $jk->name }}">
                                            {{ $jk->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
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
