<div class="sb-sidenav-menu">
    <div class="nav">
        @if(Auth::user()->role == 'admin')
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/dashboard">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                UMKM 
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/umkm">Data UMKM</a>
                    <a class="nav-link" href="/kategori-umkm">Kategori UMKM</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                Produk
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="/produk">
                        Data Produk
                    </a>
                    <a class="nav-link" href="/kategori-produk">
                        Kategori Produk
                    </a>
                </nav>
            </div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div>
                Tentang
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                Kontak
            </a>
            <a class="nav-link" href="/users">
                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                Users
            </a>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="/akun">
                <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                Akun Saya
            </a>
        @endif
        @if (Auth::user()->role == 'umkm')
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/dashboard/umkm">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Master Data</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Produk 
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/umkm/produk">Data Produk</a>
                    <a class="nav-link" href="/kategori-umkm">Tambah Produk</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                Kategori Produk
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="/produk">
                        Data Kategori
                    </a>
                    <a class="nav-link" href="/kategori-produk">
                        Tambah Kategori
                    </a>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Pengaturan</div>
            <a class="nav-link" href="/akun">
                <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                Akun Saya
            </a>
        @endif
    </div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">WMK UMKM UNY</div>
</div>