<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Navbar Brand -->
    <a class="navbar-brand" href="{{ url('/home') }}">
        <img src="{{ asset('images/SpiceMasterLogo.png') }}" width="40" height="40" class="d-inline-block align-top" alt="">
        {{ __('Homepage') }}
    </a>

    <!-- Navbar Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/questions') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.questions.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Question') }}</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/options') || request()->is('admin/options') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.options.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Option') }}</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/results') || request()->is('admin/results') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.results.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Result') }}</span></a>
            </li>

            <li class="nav-item {{ request()->is('admin/recipe') || request()->is('admin/recipe') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.recipe.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Recipes') }}</span></a>
            </li>

            <!-- Add other navbar items here -->
        </ul>

        <!-- Right-aligned Items -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>

                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>