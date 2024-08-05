<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion no-print" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center no-print" href="/">
        <div class="sidebar-brand-text mx-3">PT RAFFI ENERGI RAYA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'direktur')
    <li class="nav-item {{ request()->is('home') ? 'active' : '' }} no-print">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Master (Super Admin & Admin) -->
    @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin')
    <li class="nav-item no-print">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (auth()->user()->role === 'super_admin')
                <a class="collapse-item {{ request()->is('users') ? 'active' : '' }} no-print" href="/users">Data User</a>
                @endif
                <a class="collapse-item {{ request()->is('jenis-barang') ? 'active' : '' }} no-print" href="/jenis-barang">Data Kategori Barang</a>
                <a class="collapse-item {{ request()->is('data-barang') ? 'active' : '' }} no-print" href="/data_barang">Data Barang</a>
            </div>
        </div>
    </li>
    @endif

    <!-- Nav Item - Laporan (Super Admin & Admin & Direktur) -->
    @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'direktur')
    <li class="nav-item no-print">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'direktur')
                <a class="collapse-item {{ request()->is('laporan-data') ? 'active' : '' }}" href="/laporan_data">Laporan Penjualan</a>
                @endif
                @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'direktur')
                <a class="collapse-item {{ request()->is('laporan-pajak') ? 'active' : '' }}" href="/laporan_pajak">Laporan Pajak</a>
                @endif
            </div>
        </div>
    </li>
    @endif

    <!-- Nav Item - Data Transaksi (Super Admin & Admin & Direktur) -->
    @if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin')
    <li class="nav-item no-print">
        <a class="nav-link {{ request()->is('transaksi') ? 'active' : '' }}" href="/transaksi">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Transaksi</span>
        </a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline no-print">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
