<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="{{ asset('images/logo.png') }}" class="logo img-fluid">
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
                    <a class="nav-link" href="{{ route('donasiPage') }}">Donasi</a>
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
                        <a class="nav-link" href="" id="user-notification" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="social-icon-item bi-bell-fill"></i>
                            @if ($isNewNotifications)
                                <span
                                    class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light" aria-labelledby="user-notification">

                            @if (count($notifications) > 0)
                                @foreach ($notifications as $notification)
                                    <li>
                                        <a class="dropdown-item {{ $notification->isNew ? 'new-notif' : '' }}"
                                            href="{{ route('readNotification', $notification->id) }}">
                                            @if ($notification->isNew)
                                            <span
                                                class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle">
                                                <span class="visually-hidden">New alerts</span>
                                            </span>

                                            @endif
                                            <img class=""
                                                src="{{ asset('storage/' . $notification->donation->image) }}"
                                                alt="" style="height: 30px; width: 30px; object-fit: cover">
                                            <span class="ml-2">
                                                {{ $notification->message }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="ml-2">
                                            Tidak ada pesan baru
                                        </span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle custom-btn custom-border-btn btn" href=""
                            id="user-profile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="user-profile">

                            <li><a class="dropdown-item" href="/admin">Dashboard</a></li>

                            <li>
                                <a class="dropdown-item" href="{{ route('filament.auth.logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('filament.auth.logout') }}" method="POST">
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
