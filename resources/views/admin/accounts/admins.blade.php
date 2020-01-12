@extends('layouts.admin')

@section('title' , 'Admin Accounts')

@section('content')
<main class="columns is-centered is-multiline is-desktop" id="maincontainer">
    @include("templates.admin_logo")
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="accounts-content">
        <div class="columns is-centered is-mobile">
            <div class="column is-12-mobile is-12-tablet is-11-desktop is-11-widescreen is-11-fullhd">
                <div class="container is-fluid" id="accounts-container">

                </div>
            </div>
        </div>
    </div>
</main>
@endsection