<ul class="menu-inner py-1">
    <li class="menu-item">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>

    <!-- Apps & Pages -->
    <li class="menu-header fw-light mt-4">
        <span class="menu-header-text">Apps &amp; Pages</span>
    </li>
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
    @endrole

    @role('user')
    <li class="menu-item">
            <a href="{{ route('booking') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-cart-arrow-down"></i>
                <div data-i18n="Email">Booking</div>
            </a>
        </li>
    @endrole

    <li class="menu-item">
        <a href="app-email.html" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
            <div data-i18n="Email">Email</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-file-document-outline'></i>
            <div data-i18n="Invoice">Invoice</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="app-invoice-list.html" class="menu-link">
                    <div data-i18n="List">List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="app-invoice-preview.html" class="menu-link">
                    <div data-i18n="Preview">Preview</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="app-invoice-edit.html" class="menu-link">
                    <div data-i18n="Edit">Edit</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="app-invoice-add.html" class="menu-link">
                    <div data-i18n="Add">Add</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
