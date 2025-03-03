<style>
    .nav-item.active .nav-link {
        position: relative;
        color: #f8f9fa;
    }

    .nav-item.active .nav-link::after {
        content: "";
        display: block;
        width: 100%;
        height: 2px;
        background: #f8f9fa;
        position: absolute;
        left: 0;
        bottom: 0px;
        transition: all 0.3s;
    }

    .zeyada-regular {
        font-family: "Zeyada", cursive;
        font-weight: 400;
        font-style: normal;
    }

    .bad-script-regular {
        font-family: "Bad Script", cursive;
        font-weight: 400;
        font-style: normal;
    }
</style>
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand zeyada-regular fs-2" href="/">Ryuuchi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex justify-content-center">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">Users</a>
                </li>
                <li class="nav-item {{ request()->routeIs('form') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('form') }}">Form</a>
                </li>
                <li class="nav-item {{ request()->routeIs('ai.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ai.index') }}">AI</a>
                </li>
                <li class="nav-item {{ request()->routeIs('tag.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tag.index') }}">Tag</a>
                </li>
                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
            </ul>
            <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" style="padding: 0.5rem 1rem;">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</nav>
