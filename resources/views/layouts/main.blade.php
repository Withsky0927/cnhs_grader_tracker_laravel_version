<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}" />
  <meta name="keyword"
    content="Cavite national high School, Graduate Tracer system, Graduate App, Graduate System, Graduation, Cavite High" />
  <meta name="description"
    content="Graduating Student at Cavite Senior High School? Always wanted to ease your Graduation process or see everything you wanted to know before/after your Graduation? Our new Graduate Tracer System is our answer for you!" />
  <meta property="og:type" content="website" />
  <meta property="og:title"
    content="Cavite National High School - Cavite National High School - Senior High School Graduate Tracer System" />
  <meta property="og:description"
    content="Graduating Student at Cavite Senior High School? Always wanted to ease your Graduation process or see everything you wanted to know before/after your Graduation? Our new Graduate Tracer System is our answer for you!" />
  <meta property="og:image" content="" />
  <meta property="og:url" content="" />
  <meta property="og:locale" content="en-PH" />
  <meta property="og:locale:alternate" content="en-US" />
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/bulma.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css"
        integrity="sha256-D9M5yrVDqFlla7nlELDaYZIpXfFWDytQtiV+TaH6F1I=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />
    -->

  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>

<body>
  @include('templates.disabled_javascript')
  @yield('content')
  @include('templates.scripts')
</body>

</html>