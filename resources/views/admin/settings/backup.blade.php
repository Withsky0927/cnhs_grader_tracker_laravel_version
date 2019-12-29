@extends('layouts.admin')

@section('title' , 'Backup Database')
@section('content')
<main class="columns is-mobile" id="maincontent">
    @if(session('user_role') == 'superadmin')
    <nav class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
        <div class="columns is-mobile is-centered">
            <div class="column is-11-mobile is-11-tablet is-11-desktop is-11-widescreen is-11-fullhd"
                id="navbreadcrumbscontainer">
                <div class="container is-fluid" id="navbarbreadcrumbs">
                    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
                        <ul>
                            <li class="is-active">
                                <a href="#" aria-current="page">
                                    <span class="icon is-small">
                                        <i class="fas fa-cogs"></i>
                                    </span>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li class="is-active">
                                <a href="{{url('/admin/settings/backup')}}" aria-current="page">
                                    <span class="icon is-small">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span>Backup</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        @endif
    </nav>
</main>
@endsection