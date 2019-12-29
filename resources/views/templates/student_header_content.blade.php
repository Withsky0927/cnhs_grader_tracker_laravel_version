<nav class="navbar" id="navigationbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a role="button" class="navbar-burger burger burgercolor" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu navbarbutton">
        <div class="navbar-start">
            @if(session('user_role') == 'student')
            <a class="navbar-item is-size-7" href="{{url('/student/home')}}">HOME</a>
            @endif
        </div>
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <div class="navbar-link is-arrowless is-size-7" id="navbarprofile">
                    PROFILE
                </div>
                <div class="navbar-dropdown navbarhover is-radiusless is-right">
                    <a class="navbar-item is-size-7 is-uppercase no-underline">Role:{{session('user_role')}}</a>
                    <a class="navbar-item is-size-7 is-uppercase no-underline">Username:
                        {{session('login_username')}}</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('student/profile')}}">Edit Profile</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/logout')}}">Log out</a>
                </div>
            </div>
        </div>
    </div>
</nav>