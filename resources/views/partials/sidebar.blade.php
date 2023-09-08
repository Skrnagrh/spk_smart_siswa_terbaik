<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark bg-primary" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading text-light">Core</div>
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-gauge"></i>
                    </div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading text-light">Interface</div>
                <a class="nav-link {{ Request::is('dashboard/alternatif*') ? 'active' : '' }}"
                    href="/dashboard/alternatif">
                    <div class="sb-nav-link-icon"><i class="fas fa-person"></i>
                    </div>
                    Alternatif
                </a>
                <a class="nav-link {{ Request::is('dashboard/kriteria*') ? 'active' : '' }}" href="/dashboard/kriteria">
                    <div class="sb-nav-link-icon"><i class="fas fa-database"></i>
                    </div>
                    Kriteria
                </a>
                <a class="nav-link {{ Request::is('dashboard/subkriteria*') ? 'active' : '' }}"
                    href="/dashboard/subkriteria">
                    <div class="sb-nav-link-icon"><i class="fas fa-database"></i>
                    </div>
                    Subkriteria
                </a>
                @if (Auth::user()->role == 'walikelas')
                <a class="nav-link {{ Request::is('dashboard/nilai-bobot*') ? 'active' : '' }}"
                    href="/dashboard/nilai-bobot">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                    </div>
                    Nilai Bobot
                </a>

                <div class="sb-sidenav-menu-heading text-light">Proses</div>
                <a class="nav-link {{ Request::is('dashboard/smart') ? 'active' : '' }}" href="/dashboard/smart">
                    <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i>
                    </div>
                    Perhitungan
                </a>
                @endif
                <a class="nav-link {{ Request::is('dashboard/smart/hasil') ? 'active' : '' }}"
                    href="/dashboard/smart/hasil">
                    <div class="sb-nav-link-icon"><i class="fas fa-award"></i>
                    </div>
                    Hasil Rangking
                </a>

                @if (Auth::user()->role == 'operator')
                <div class="sb-sidenav-menu-heading text-light">Data Petugas</div>
                <a class="nav-link {{ Request::is('datapengguna*') ? 'active' : '' }}" href="/datapengguna">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Data Petugas
                </a>
                @endif

            </div>
        </div>
    </nav>
</div>
