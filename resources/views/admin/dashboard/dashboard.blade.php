@extends('layouts.admin')

@section('title' , 'Dashboard')
@section('content')
<main class="columns is-multiline is-desktop" id="maincontainer">
    @include("templates.admin_logo")
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="dashboard-content">
        <div class="columns is-multiline is-desktop" style="border:1px solid black" id="removemargin">
            <div class="column is-12-mobile is-12-tablet is-6-desktop is-6-widescreen is-6-fullhd dashboard-devider">
                <div class="columns is-multiline is-centered is-desktop" id="graphscontainer">
                    <div class="column is-11 graph">
                        <section class="container canvascontainer">
                            <canvas id="graduatechart" style="background-color:rgb(255, 255 , 255);"></canvas>
                        </section>
                    </div>
                    <div class="column is-11 graph">
                        <section class="container canvascontainer"></section>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-12-mobile is-12-tablet is-6-desktop is-6-widescreen is-6-fullhd dashboard-devider">
            <div class="columns is-multiline is-centered is-desktop">
                <div class="column is-11"></div>
            </div>
        </div>
    </div>
</main>
@endsection