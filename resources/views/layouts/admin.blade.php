<!DOCTYPE html>
<html lang="en" id="clippedmodifier">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bulma.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('jodit-3.3.8/build/jodit.min.css')}}" />


    <!--
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css"
        integrity="sha256-D9M5yrVDqFlla7nlELDaYZIpXfFWDytQtiV+TaH6F1I=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.3.1/jodit.min.css" />
    -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}" />

</head>

<body>
    @include('templates.disabled_javascript')
    @include('templates.admin_header_content')
    @yield('content')
    @include('templates.admin_scripts')
    {{-- for dashboard js --}}
    @if (Request::is('admin/dashboard'))
    @if (session('user_role') == 'superadmin')
    <script type="text/javascript" src="{{asset('admin/js/dashboard/1/dashboard.js')}}"></script>
    @elseif (session('user_role') == 'admin')
    <script type="text/javascript" src="{{asset('admin/js/dashboard/2/dashboard.js')}}"></script>
    @endif
    @endif
    {{-- for reports js --}}
    @if (Request::is('admin/reports'))
    @if (session('user_role') == 'superadmin')
    <script type="text/javascript" src="{{asset('admin/js/reports/1/reports.js')}}"></script>
    @elseif (session('user_role') == 'admin')
    <script type="text/javascript" src="{{asset('admin/js/reports/2/reports.js')}}"></script>
    @endif
    @endif
    {{-- for graduates js --}}
    @if (Request::is('admin/graduates'))
    @if (session('user_role') == 'superadmin' || session('user_role') == 'admin')
    <script type="text/javascript" src="{{asset('admin/js/graduates/graduates.js')}}"></script>
    @endif
    @endif
    {{-- for announcement js --}}
    @if (session('user_role') == 'superadmin')
    @if (Request::is('admin/announcement/examination'))
    <script type="text/javascript" src="{{asset('admin/js/announcement/examination.js')}}"></script>
    @elseif (Request::is('admin/announcement/jobfair'))
    <script type="text/javascript" src="{{asset('admin/js/announcement/jobfair.js')}}"></script>
    @elseif (Request::is('admin/announcement/scholarship'))
    <script type="text/javascript" src="{{asset('admin/js/announcement/scholarship.js')}}"></script>
    @elseif(Request::is('admin/announcement/alumni'))
    <script type="text/javascript" src="{{asset('admin/js/announcement/alumni.js')}}"></script>
    @endif
    @endif
    {{--for settings js --}}
    @if (session('user_role') == 'superadmin')
    @if (Request::is('admin/settings/backup'))
    <script type="text/javascript" src="{{asset('admin/settings/backup.js')}}"></script>
    @elseif (Request::is('admin/settings/variables'))
    <script type="text/javascript" src="{{asset('admin/settings/variable.js')}}"></script>
    @elseif (Request::is('admin/settings/audittrail'))
    <script type="text/javascript" src="{{asset('admin/js/settings/audittrail.js')}}"></script>
    @endif
    @endif
    {{-- for profileinfo js---}}
    @if (session('user_role') == 'superadmin' || session('user_role') == 'admin')
    <script type="text/javascript" src="{{asset('admin/js/profile/profileinfo.js')}}"></script>
    @endif
</body>

</html>