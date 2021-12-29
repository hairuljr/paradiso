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

        <li>
          <a href="#" class="has-arrow waves-effect">
            <i class="bx bx-archive"></i>
            <span key="t-ecommerce">Data Master</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li><a href="/bahanbaku" key="t-products">Bahan Baku</a></li>
            <li><a href="#" key="t-product-detail">Produk</a></li>
            <li><a href="#" key="t-orders">Jenis Produk</a></li>
          </ul>
        </li>

      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>
