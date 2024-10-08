<header class="header" id="navbar-collapse-toggle">
    <!-- Fixed Navigation Starts -->
    <ul class="icon-menu d-none d-lg-block revealator-slideup revealator-once revealator-delay1">
        <li class="icon-box {{ (url()->current()== route('index')) ? 'active' : '' }}">
            <i class="fa fa-home"></i>
            <a href="{{route('index')}}">
                <h2>Home</h2>
            </a>
        </li>
        <li class="icon-box {{ (url()->current()== route('about')) ? 'active' : '' }}">
            <i class="fa fa-user"></i>
            <a href="{{route('about')}}">
                <h2>About</h2>
            </a>
        </li>
        <li class="icon-box {{ (url()->current()== route('portfolio')) ? 'active' : '' }}" >
            <i class="fa fa-briefcase"></i>
            <a href="{{route('portfolio')}}">
                <h2>Projects</h2>
            </a>
        </li>
        <li class="icon-box  {{ (url()->current()== route('contact')) ? 'active' : '' }}">
            <i class="fa fa-envelope-open"></i>
            <a href="{{route('contact')}}">
                <h2>Contact</h2>
            </a>
        </li>
      
    </ul>
    <!-- Fixed Navigation Ends -->
    <!-- Mobile Menu Starts -->
    <nav role="navigation" class="d-block d-lg-none">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul class="list-unstyled" id="menu">
                <li class="{{ (url()->current()== route('index')) ? 'active' : '' }}"><a href="{{route('index')}}"><i class="fa fa-home"></i><span>Home</span></a></li>
                <li class="{{ (url()->current()== route('about')) ? 'active' : '' }}"><a href="{{route('about')}}"><i class="fa fa-user"></i><span>About</span></a></li>
                <li class="{{ (url()->current()== route('portfolio')) ? 'active' : '' }}"><a href="{{route('portfolio')}}"><i class="fa fa-folder-open"></i><span>Portfolio</span></a></li>
                <li class="{{ (url()->current()== route('contact')) ? 'active' : '' }}"><a href="{{route('contact')}}"><i class="fa fa-envelope-open"></i><span>Contact</span></a></li>
            </ul>
        </div>
    </nav>
    <!-- Mobile Menu Ends -->
</header>