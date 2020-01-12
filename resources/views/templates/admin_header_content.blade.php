{{-- list of all modal for use in admin--}}
@if (session('user_role') == 'superadmin')
{{-- for dashboard modals--}}
@if (Request::is('admin/dashboard'))
<div class="modal is-radiusless" id="pendingmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head modalheader">
            <p class="modal-card-title is-size-6 is-dark">Pending Approval</p>
            <button class="delete is-small" id="pending-close" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <nav class="panel">
                <p class="panel-tabs">
                    <a class="is-active modal-page-link">Accounts</a>
                    <a class="modal-page-link">Reports</a>
                    <a class="modal-page-link"></a>
                    <a class="modal-page-link">Sources</a>
                    <a class="modal-page-link">Forks</a>
                </p>
                <a class="panel-block is-active">
                    <div class="table-container">
                        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th colspan="2" class="has-text-centered">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>superadmin</td>
                                    <td>superadmin</td>
                                    <td>Pending</td>
                                    <td><button class="button is-success is-small">Approve</button></td>
                                    <td><button class="button is-danger is-small">Discard</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav class="pagination is-small" role="navigation" aria-label="pagination">
                        <a class="pagination-previous" disabled>Previous</a>
                        <a class="pagination-next">Next page</a>
                        <ul class="pagination-list" id="accountsApprovalPagination">
                            <li>
                                <a class="pagination-link is-current is-danger" aria-label="Page 1"
                                    aria-current="page">1</a>
                            </li>
                            <li>
                                <a class="pagination-link" aria-label="Goto page 2">2</a>
                            </li>
                            <li>
                                <a class="pagination-link" aria-label="Goto page 3">3</a>
                            </li>
                        </ul>
                    </nav>
                </a>
            </nav>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-small is-danger">Save changes</button>
            <button class="button is-small">Cancel</button>
        </footer>
    </div>
</div>
@endif
{{-- for accounts modals --}}
@if (Request::is('admin/accounts/admin'))
@endif
@if (Request::is('admin/accounts/student'))
@endif
{{-- for settings modals --}}
@if (Request::is('admin/settings/variables'))
@endif
@if (Request::is('admin/settings/audittrail'))
@endif
@if (Request::is('admin/settings/backup'))
@endif
@endif{{-- end of superadmin scope--}}



@if(session('user_role') == 'superadmin' || session('user_role') == 'admin')
@if (Request::is('admin/graduates'))
<div class="modal is-radiusless animated fadeIn" id="graduates-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="graduate-modal-content">
        <div class="container" id="graduates-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-grad-modal-column">
                            <div class="columns is-desktop">
                                <div class="column">
                                    <div id="graduate-profile-pic">
                                        <img id="graduate-profile-pic">
                                    </div>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">LRN:</span>
                                    <span id="graduate-lrn"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Strand:</span>
                                    <span id="graduate-strand"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Status:</span>
                                    <span id="graduate-status"></span>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-grad-modal-column">
                            <div class="columns is-desktop">
                                <div class="column">
                                    <span class="graduate-modal-title">Firstname:</span>
                                    <span id="graduate-firstname"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Middlename:</span>
                                    <span id="graduate-middlename"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Lastname:</span>
                                    <span id="graduate-lastname"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Address:</span>
                                    <span id="graduate-address"></span>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-grad-modal-column">
                            <div class="columns is-desktop">
                                <div class="column">
                                    <span class="graduate-modal-title">Birthday:</span>
                                    <span id="graduate-birthday"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Age:</span>
                                    <span id="graduate-age"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Gender:</span>
                                    <span id="graduate-gender"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Civil Status:</span>
                                    <span id="graduate-civil-status"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        
    -->
    <button class="modal-close is-large" id="graduates-modal-close" aria-label="close"></button>
</div>
@endif

@if (Request::is('/admin/reports'))
<div class="modal is-radiusless animated fadeIn" id="graduates-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="graduates-modal-content">
        s
    </div>
    <button class="modal-close is-large" id="graduates-modal-close" aria-label="close"></button>
</div>
@endif
@endif

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
                <div class="navbar-dropdown is-radiusless navbarhover animated fadeIn">
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
                <div class="navbar-dropdown is-radiusless navbarhover animated fadeIn">
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/accounts/admin')}}">Admin</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/accounts/student')}}">Student</a>
                </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless is-size-7">
                    SETTINGS
                </a>
                <div class="navbar-dropdown is-radiusless navbarhover animated fadeIn">
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
                <div class="navbar-dropdown navbarhover is-radiusless is-right animated fadeIn">
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