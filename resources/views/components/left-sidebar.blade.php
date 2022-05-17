<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                @can('view dashboard')
                    <li>
                        <a href="{{ route('dashboard') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">Dashboard</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bx bx-archive"></i>
                        <span key="t-ecommerce">Data Masters</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
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
                @can('view cgs')
                    <li>
                        <a href="/cost" class="waves-effect">
                            <i class="bx bx-calendar"></i>
                            <span key="t-calendar">Cost Of Good Sold</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Transaksi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('view bahan-baku-masuk')
                            <li>
                                <a href="/bahanbakumasuk" key="t-products">Bahan Baku Masuk</a>
                            </li>
                        @endcan
                        @can('view bahan-baku-keluar')
                            <li>
                                <a href="/bahanbakukeluar" key="t-product-detail">Bahan Baku Keluar</a>
                            </li>
                        @endcan
                        @can('view penjualan')
                            <li><a href="/penjualan" key="t-orders">Penjualan</a></li>
                        @endcan
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('view laporan-bahan-baku-masuk')
                            <li>
                                <a href="/laporanbahanbakumasuk" key="t-products">Laporan Bahan Baku Masuk</a>
                            </li>
                        @endcan
                        @can('view laporan-penjualan')
                            <li>
                                <a href="/laporanpenjualan" key="t-product-detail">Laporan Penjualan</a>
                            </li>
                        @endcan
                        @can('view laporan-bahan-baku-keluar')
                            <li>
                                <a href="/laporanbahanbakukeluar" key="t-orders">Laporan Bahan Baku Keluar</a>
                            </li>
                        @endcan
                    </ul>
                </li>

                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
