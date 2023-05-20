<ul class="menu-inner py-1">
    <li class="menu-item">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>

    <!-- Apps & Pages -->
    {{-- <li class="menu-header fw-light mt-4">
        <span class="menu-header-text">Apps &amp; Pages</span>
    </li> --}}
    <li class="menu-item">
        <a href="{{ route('profil') }}" class="menu-link">
            <I class="menu-icon tf-icons mdi mdi-account"></I>
            <div data-i18n="Profil">Profil</div>
        </a>
    </li>
    @role('admin')
    <li class="menu-item">
        <a href="{{ route('user') }}" class="menu-link">
            <I class="menu-icon tf-icons mdi mdi-account-group"></I>
            <div data-i18n="Profil">Data User</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-database-arrow-down'></i>
            <div data-i18n="Invoice">Master Data</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('kavling') }}" class="menu-link">
                    <div data-i18n="List">Data Kavling</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('syarat-ketentuan') }}" class="menu-link">
                    <div data-i18n="Preview">Syarat dan Ketentuan</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('tata_tertib') }}" class="menu-link">
                    <div data-i18n="Preview">Tata Tertib</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('cara-booking') }}" class="menu-link">
                    <div data-i18n="Preview">Cara Booking</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="{{ route('list-pesanan-user') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
            <div data-i18n="Email">Pesanan User</div>
        </a>
    </li>
    @endrole

    @role('user')
    <li class="menu-item">
            <a href="{{ route('booking') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-cart-arrow-down"></i>
                <div data-i18n="booking">Booking</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('user-pesanan') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
                <div data-i18n="Email">Pesanan</div>
            </a>
        </li>
    @endrole



</ul>
