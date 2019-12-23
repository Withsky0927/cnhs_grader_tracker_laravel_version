@extends('layouts.main')

@section('title' , 'Cavite National high School Graduate Tracer System')

@section('content')
<main class="columns is-mobile is-centered">
    <form id="loginform"
        class="animated fadeInDownBig column is-10-mobile is-6-tablet is-3-desktop is-3-widescreen is-2-fullhd"
        action="{{url('/')}}" autocomplete="off" method="POST">
        <section aria-label="brandname" class="field level">
            <h1 id="loginlogo" class="level-item">
                <img src="{{asset('img/logo.png')}}" alt="Cavite National high School Graduate Tracer System">
            </h1>
        </section>
        <section>
            {{-- check if there no errors  in other middleware--}}
            @if(session('notification'))
            <p>{{session('notification')}}</p>
            @endif

            {{-- check if there are validations errors --}}
            @if ($errors != '')
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
            @endif
        </section>
        <section class="field">
            <h2 class="is-small">Please Login:</h2>
        </section>
        @csrf
        <section class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input has-text-centered has-text-centered" maxlength="50" type="text" required
                    placeholder="Username" name="username">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        </section>
        <section aria-label="loginpassword" class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input has-text-centered" maxlength="150" type="password" required placeholder="Password"
                    name="password">
                <span class="icon is-small is-left">
                    <i class="fas fa-key"></i>
                </span>
            </div>
        </section>
        <section aria-label="forgotpasswordlink" class="field">
            <a class="is-small login-links" href="{{url('/forgotpassword')}}">Forgot Password?</a>
        </section>
        <section class="field level">
            <div class="control level-item">
                <button id="buttonoutside" type="submit" class="button is-normal is-link">Login</button>
            </div>
        </section>
        <section class="field level">
            <a class="is-small level-item login-links" href="{{url('/register')}}">Create an Account?</a>
        </section>
    </form>
</main>
@endsection