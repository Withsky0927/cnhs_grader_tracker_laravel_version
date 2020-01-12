@extends('layouts.admin')

@section('title' , 'Dashboard')
@section('content')
@include('templates.disabled_javascript')
<main class="columns is-centered is-multiline is-desktop" id="maincontainer">
    @if(session('user_role') == 'superadmin')
    @include("templates.admin_logo")
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="dashboard-content">
        <div class="columns is-centered is-multiline is-desktop" id="removemargin">
            <div class="column is-12-mobile is-12-tablet is-6-desktop is-6-widescreen is-6-fullhd dashboard-devider">
                <div class="columns is-multiline is-centered is-desktop" id="graphscontainer">
                    <div class="column is-11 graph">
                        <section class="container canvascontainer animated fadeIn">
                            <canvas id="graduatechart" class="canvasContent"></canvas>
                        </section>
                    </div>
                    <div class="column is-11 graph">
                        <section class="container canvascontainer animated fadeIn">
                            <canvas id="employmentchart" class="canvasContent"></canvas>
                        </section>
                    </div>
                </div>
            </div>
            <div class="column is-12-mobile is-12-tablet is-6-desktop is-6-widescreen is-6-fullhd dashboard-devider">
                <div class="columns is-multiline is-centered is-desktop">
                    <!-- for notification -->
                    <div class="column is-11">
                        <div class="columns is-multiline is-mobile">
                            <div
                                class="column is-6-mobile is-6-tablet is-4-desktop is-4-widescreen is-4-fullhd options">
                                <div class="container notificationcontainer animated fadeIn" id="usersnotification">
                                    <div class="notificationicon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="datacount">
                                        <span class="countnumber" id="userscount">0</span>
                                    </div>
                                    <div class="notificationtitle">
                                        <span class="titlenamenotif">Users</span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="column is-6-mobile is-6-tablet is-4-desktop is-4-widescreen is-4-fullhd options">
                                <div class="container notificationcontainer animated fadeIn" id="pendingnotification">
                                    <div class="notificationicon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="datacount">
                                        <span class="countnumber" id="pendingcount">0</span>
                                    </div>
                                    <div class="notificationtitle">
                                        <span class="titlenamenotif">Pending</span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="column is-6-mobile is-6-tablet is-4-desktop is-4-widescreen is-4-fullhd options">
                                <div class="container notificationcontainer animated fadeIn" id="notifycontainer">
                                    <div class="notificationicon">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="datacount">
                                        <span class="countnumber" id="notifycount">0</span>
                                    </div>
                                    <div class="notificationtitle">
                                        <span class="titlenamenotif">Notification</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- for notifications -->


                </div>
            </div>
        </div>
    </div>
    @endif
</main>
@endsection