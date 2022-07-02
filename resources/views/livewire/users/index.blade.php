<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">DATA USERS</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{ route('users.create') }}" type="button" class="btn btn-success "><i
                                class="mdi mdi-plus me-1"></i> Add Data </a>
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

                    <div class="row mb-2">
                        <div class="col-sm-4">
                            @if (session('pesan'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('pesan') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('pesan1'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('pesan1') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('hapus'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('hapus') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Username</th>
                                    <th class="align-middle">Role</th>
                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $jk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jk->name }}</td>
                                        <td>{{ $jk->username }}</td>
                                        <td>{{ $jk->roles->first()->name??'-' }}</td>
                                        <td>
                                            <div class="d-flex gap-3 cursor">
                                                <a href="{{ route('users.edit', $jk->id) }}" class="text-success"><i
                                                        class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <a button class="text-danger"
                                                    wire:click="DetailData('{{ $jk->id }}')"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                        class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    {{-- MODAL DELETE --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin mengahapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" wire:click.prevent="delete()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
