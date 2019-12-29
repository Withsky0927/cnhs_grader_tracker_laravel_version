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
            @if(session('user_role') == 'superadmin')
            <a class="navbar-item is-size-7" href="{{url('/admin/dashboard')}}">DASHBOARD</a>
            @endif
            @if(session('user_role') == 'admin')
            <a class="navbar-item is-size-7" href="{{url('/admin/home')}}">HOME</a>
            @endif
            <a class="navbar-item is-size-7" href="{{url('/admin/graduates')}}">GRADUATES</a>
            <a class="navbar-item is-size-7" href="{{url('/admin/reports')}}">REPORTS</a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless is-size-7">
                    ANNOUNCEMENT
                </a>
                <div class="navbar-dropdown is-radiusless navbarhover">
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/announcement/jobfair')}}"> Job
                        Fair</a>
                    <a class="navbar-item is-size-7 is-uppercase"
                        href="{{url('/admin/announcement/scholarship')}}">Scholarship</a>
                    <a class="navbar-item is-size-7 is-uppercase"
                        href="{{url('/admin/announcement/examination')}}">Examination</a>
                    <a class="navbar-item is-size-7 is-uppercase"
                        href="{{url('/admin/announcement/alumni')}}">Alumni</a>
                </div>
            </div>
            @if(session('user_role') == 'superadmin')
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless is-size-7">
                    ACCOUNTS
                </a>
                <div class="navbar-dropdown is-radiusless navbarhover">
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/accounts/admin')}}">Admin</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/accounts/student')}}">Student</a>
                </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless is-size-7">
                    SETTINGS
                </a>
                <div class="navbar-dropdown is-radiusless navbarhover">
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/settings/audittrail')}}">Audit
                        Trail</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/settings/backup')}}">Backup</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/settings/variables')}}">System
                        Variables</a>
                </div>
            </div>
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
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('admin/profile')}}">Edit Profile</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/logout')}}">Log out</a>
                </div>
            </div>
        </div>
    </div>
</nav>