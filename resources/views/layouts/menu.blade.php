<style>
    .nav-link.dropdown-toggle::after {
        display: none !important;
        /* Hide the caret */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
    <div class="container">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <!-- Staff & Manager -->
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('task.*')) active @endif" href="{{ route('task.index') }}">Task List</a>
                </li>

                <!-- Staff -->
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('history.*')) active @endif" href="{{ route('history.index') }}">History</a>
                </li>

                <!-- Manager -->
                <li class="nav-item @if (Route::is('approval.*')) active @endif">
                    <a class="nav-link" href="{{ route('approval.index') }}">Approvals</a>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle @if (Route::is('notification.*')) active @endif" href="#" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownNotification">
                    <li><a class="dropdown-item" href="#">Notification 1</a></li>
                    <li><a class="dropdown-item" href="#">Notification 2</a></li>
                    <li><a class="dropdown-item" href="#">Notification 3</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('notification.index') }}">Show All</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle @if (Route::is('profile.*') || Route::is('password.*')) active @endif" href="#" id="navbarDropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownProfile">
                    <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('password.index') }}">Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
