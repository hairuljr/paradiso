<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>



    <link rel="shortcut icon" href="{{ asset('assets/skote/images/favicon.ico') }}">
    <link href="{{ asset('assets/skote/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/skote/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/skote/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/skote/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .cursor a {
            cursor: pointer;
        }

    </style>
    @livewireStyles




</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/skote/images/logo.svg') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/skote/images/logo-dark.png') }}" alt="" height="17">
                            </span>
                        </a>

                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/skote/images/logo-light.svg') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/skote/images/logo-light.png') }}" alt="" height="19">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('assets/skote/images/users/avatar-1') }}.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"
                                key="t-henry">{{ auth()->user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">Profil</span>
                            </a>
                            <a class="dropdown-item d-block" href="#">
                                <span class="badge bg-success float-end">3</span>
                                <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                                <span key="t-settings">Pengaturan</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="keluar dropdown-item text-danger" href=""><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout">Logout</span></a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="bx bx-cog bx-spin"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-dashboards">Dashboard</span>
                            </a>
                        </li>
                        @can('manage-role-permission')
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-archive"></i>
                                    <span key="t-ecommerce">Role & Permission</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/permissions" key="t-product-detail">Hak Akses</a></li>
                                    <li><a href="/roles" key="t-orders">Roles</a></li>
                                </ul>
                            </li>
                        @endcan
                        <li>
                            <a href="#" class="has-arrow waves-effect">
                                <i class="bx bx-archive"></i>
                                <span key="t-ecommerce">Data Master</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @can('view pengguna')
                                    <li><a href="/users" key="t-orders">Data User</a></li>
                                @endcan
                                @can('view jenis-produk')
                                    <li><a href="/jenisproduk" key="t-orders">Jenis Produk</a></li>
                                @endcan
                                @can('view produk')
                                    <li><a href="/produk" key="t-product-detail">Produk</a></li>
                                @endcan
                                @can('view bahan-baku')
                                    <li><a href="/bahanbaku" key="t-products">Bahan Baku</a></li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <a href="/cost" class="waves-effect">
                                <i class="bx bx-calendar"></i>
                                <span key="t-calendar">Cost Of Good Sold</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="has-arrow waves-effect">
                                <i class="bx bx-store"></i>
                                <span key="t-ecommerce">Transaksi</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/bahanbakumasuk" key="t-products">Bahan Baku Masuk</a></li>
                                <li><a href="/bahanbakukeluar" key="t-product-detail">Bahan Baku Keluar</a>
                                <li><a href="/penjualan" key="t-orders">Penjualan</a></li>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow waves-effect">
                            <i class="bx bx-store"></i>
                            <span key="t-ecommerce">Laporan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/laporanbahanbakumasuk" key="t-products">Laporan Bahan Baku Masuk</a></li>
                            <li><a href="/laporanpenjualan" key="t-product-detail">Laporan Penjualan</a>
                            <li><a href="/laporanbahanbakukeluar" key="t-orders">Laporan Bahan Baku Keluar</a></li>
                    </li>
                    </ul>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            {{-- <script>document.write(new Date().getFullYear())</script> © Skote. --}}
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>



        </div> <!-- end slimscroll-menu-->
    </div>
    @livewireScripts

    <script src="{{ asset('assets/skote/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/skote/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/skote/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/skote/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/skote/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/skote/libs/select2/js/select2.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/skote/js/app.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".keluar").on("click", function(e) {
                e.preventDefault();
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                Swal.fire({
                    title: 'Apakah anda yakin ingin keluar?',
                    text: "Sesi login anda akan berkahir.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    reverseButtons: true,
                    cancelButtonText: 'Tetap di laman Ini',
                    confirmButtonText: 'Ya, Keluar Sekarang'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.post("{{ route('logout') }}", {
                                _token: CSRF_TOKEN
                            })
                            .then((response) => {
                                if (response.status == 204) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Anda telah keluar, silahkan login kembali nanti.',
                                        showConfirmButton: false,
                                        timer: 3000
                                    })
                                    setTimeout(() => {
                                        window.location.reload()
                                    }, 2000);
                                }
                            }, (error) => {
                                console.log(error);
                            });
                    }
                })

            });
        })
    </script>

    <script>
        window.livewire.on('updateModal', () => {
            $('#updateModal').modal('hide');
        });
    </script>

    <script>
        window.livewire.on('deleteModal', () => {
            $('#deleteModal').modal('hide');
        });
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                $('#modal-item').modal('hide');
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#select1', function() {
                $('#modal-item1').modal('hide');
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {
                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }
            });
        });
    </script>





</body>

</html>
