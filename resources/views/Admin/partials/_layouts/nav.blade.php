<div class="nav-content d-flex">
    <!-- User Menu Start -->
    <div id="myProfileImage" class="user-container d-flex">
        <a href="{{ route('profile') }}" class="d-flex user ">
            @if (auth()->user()->image)
                <img class="profile" alt="profile" src="{{ asset(auth()->user()->image) }}" />
            @else
                <img class="profile" alt="profile" src="{{ asset('backend/img/profile/profile-6.webp') }}" />
            @endif
            <div class="name"></div>
        </a>
        <div class="dropdown-menu d-none">


        </div>
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">

        <li class="list-inline-item">
            <a href="{{ route('index') }}" target="__blank" title="Visit Website">
                <i class="fa-sharp fa-solid fa-globe" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true"
                aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                    <i data-acorn-icon="bell" data-acorn-size="18"></i>
                    <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                    <ul class="list-unstyled border-last-none">
                        {{-- <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="{{ asset('backend/Buyer/img/profile/profile-1.webp') }}"
                                class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">Joisse Kaycee just sent a new comment!</a>
                            </div>
                        </li>

                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="{{ asset('backend/Buyer/img/profile/profile-2.webp') }}"
                                class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">New order received! It is total $147,20.</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="{{ asset('backend/Buyer/img/profile/profile-3.webp') }}"
                                class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">3 items just added to wish list by a user!</a>
                            </div>
                        </li> --}}

                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ url()->current() == route('dashboard') ? 'active' : '' }}">
                    <i data-acorn-icon="shop" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}" class="{{ url()->current() == route('profile') ? 'active' : '' }}">
                    <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                    <span class="label">Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('educations.index') }}"
                    class="{{ url()->current() == route('educations.index') ? 'active' : '' }}">
                    <i data-acorn-icon="book-open" class="icon" data-acorn-size="18"></i>
                    <span class="label">Education</span>
                </a>

            </li>
            <li>
                <a href="{{ route('experiences.index') }}"
                    class="{{ url()->current() == route('experiences.index') ? 'active' : '' }}">
                    <i data-acorn-icon="office" class="icon" data-acorn-size="18"></i>
                    <span class="label">Experiences</span>
                </a>
            </li>
            <li>
                <a href="{{ route('skils.index') }}" class="{{ url()->current() == route('skils.index') ? 'active' : '' }}">
                    <i data-acorn-icon="keyboard" class="icon" data-acorn-size="18"></i>
                    <span class="label">Skils</span>
                </a>
            </li>
            <li>
                <a href="{{ route('portfolios.index') }}" class="{{ url()->current() == route('portfolios.index') ? 'active' : '' }}">
                    <i data-acorn-icon="file-chart" class="icon" data-acorn-size="18"></i>
                    <span class="label">My Projrcts</span>
                </a>
            </li>
            {{-- <li>
                <a href="#potfolio" class="@if (url()->current() == route('portfolios.create')) active @elseif(url()->current() == route('portfolios.index')) active @endif">
                    <i data-acorn-icon="cart" class="icon" data-acorn-size="18"></i>
                    <span class="label">My Projrcts</span>
                </a>
                <ul id="potfolio">
                    <li>
                        <a href="{{ route('portfolios.create') }}"
                            class="{{ url()->current() == route('portfolios.create') ? 'active' : '' }}">
                            <span class="label">Add</span>
                        </a>
                        <a href="{{ route('portfolios.index') }}"
                            class="{{ url()->current() == route('portfolios.index') ? 'active' : '' }}">
                            <span class="label">List</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li>
                <a href="{{ route('support') }}" class="{{ url()->current() == route('support') ? 'active' : '' }}">
                    <i data-acorn-icon="support" class="icon" data-acorn-size="18"></i>
                    <span class="label">Support</span>
                </a>

            </li> --}}
            <li>
                <a href="{{ route('logout') }}" class="">
                    <i data-acorn-icon="logout" class="icon" data-acorn-size="18"></i>
                    <span class="label">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
