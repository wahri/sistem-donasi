<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="images/logo.png" class="logo img-fluid" alt="Kind Heart Charity">
            <span>
                {{-- Kind Heart Charity
                <small>Non-profit Organization</small> --}}
                Berbagi Makan
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#section_3">Donasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#section_4">Relawan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#section_6">Kontak</a>
                </li>

                @guest
                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="/login">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle custom-btn custom-border-btn btn" href=""
                            id="user-profile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="user-profile">
                            <li><a class="dropdown-item" href="/admin">Dashboard</a></li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
