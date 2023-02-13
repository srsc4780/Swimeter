<header id="header">
    <nav id="navigation">
        <div class="main navigation">
            <a href="{{ route('home') }}" @navIsSelected('home')>
                <i class="home icon"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('meters.list') }}" @navIsSelected('meters')>
                <i class="dashboard icon"></i>
                <span>Consumptions</span>
            </a>

            <a href="{{ route('billing.list') }}" @navIsSelected('billing')>
                <i class="money icon"></i>
                <span>Billing</span>
            </a>
        </div>

        <div class="visitor navigation">
            <a href="{{ route('account.info') }}">
                <i class="user icon"></i>
                <span>Account</span>
            </a>

            <a href="{{ route('logout') }}">
                <i class="logout icon"></i>
                <span>Logout</span>
            </a>
        </div>
    </nav>
</header>
