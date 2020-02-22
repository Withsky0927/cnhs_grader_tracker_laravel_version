<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
    <script crossorigin="anonymous"
        src="https://polyfill.io/v3/polyfill.min.js?features=es2015%2Ces2016%2Ces2017%2Ces2018%2Ces5%2Ces6%2Ces7%2CDate.now%2CEvent%2CJSON%2CMap%2CPromise%2CPromise.prototype.finally%2CObject.keys%2CSymbol%2CXMLHttpRequest%2Catob%2Cconsole%2Cdocument%2Cdocument.getElementsByClassName%2ClocalStorage%2Clocation.origin%2Cfetch%2Cscreen.orientation%2Cnavigator.geolocation%2Cconsole.table%2C%7Ehtml5-elements%2Cdocument.querySelector%2Cconsole.timeEnd%2Cconsole.time%2Cconsole.log%2Cconsole.error%2Cconsole.group%2Cconsole.groupEnd%2Cconsole.exception">
    </script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bulma.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css"
        integrity="sha256-D9M5yrVDqFlla7nlELDaYZIpXfFWDytQtiV+TaH6F1I=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />
    -->

    <link rel="stylesheet" type="text/css" href="{{asset('student/css/style.css')}}" />
</head>

<body>
    @include('templates.disabled_javascript')
    @include('templates.student_header_content');
    @yield('content')
    @include('templates.student_footer_content')
    @include('templates.student_scripts')
</body>

</html>