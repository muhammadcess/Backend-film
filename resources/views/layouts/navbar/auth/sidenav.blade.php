<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; min-height:100vh;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Juragan Film</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/genre" class="nav-link {{ request()->is('genre*') ? 'active' : '' }}">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#dashboard"></use>
                </svg>
                Genre
            </a>
        </li>
        <li>
            <a href="/filem" class="nav-link {{ request()->is('filem*') ? 'active' : '' }}">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Film
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Pradana</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form></a>

            </li>

        </ul>
    </div>
</div>
