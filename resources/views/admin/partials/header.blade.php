<header id="header">
    <nav id="navigation">
        <div class="main navigation">
            <a href="{{ route('admin.dashboard') }}" @navIsSelected('admin.dashboard')>
                <i class="home icon"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.users.list') }}" @navIsSelected('admin.users')>
                <i class="users icon"></i>
                <span>Users</span>
            </a>

            <a href="{{ route('admin.invoices.list') }}" @navIsSelected('admin.invoices')>
                <i class="file alternate outline icon"></i>
                <span>Invoices</span>
            </a>
        </div>

        <div class="visitor navigation">
            <a href="{{ route('logout') }}">
                <i class="logout icon"></i>
                <span>Logout</span>
            </a>
        </div>
    </nav>
</header>
