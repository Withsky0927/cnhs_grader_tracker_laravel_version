@extends('layouts.main')

@section('title' , 'Forgot Password')

@section('content')
<main class="columns is-mobile is-centered">
    <form id="forgotform"
        class="animated fadeInDownBig column is-10-mobile is-6-tablet is-3-desktop is-3-widescreen is-2-fullhd"
        action="{{url('/forgotpassword')}}" autocomplete="off" method="post">
        @csrf
        <section aria-label="brandname" class="field level">
            <h1 id="forgotpasswordlogo" class="level-item">
                <img src="{{asset('img/logo.png')}}" alt="Cavite National high School Graduate Tracer System">
            </h1>
        </section>
        <section class="field"></section>
        </section>
        <section class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input" maxlength="10" type="text" required placeholder="Username" name="username">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        </section>
        <section aria-label="forgot new password" class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input" maxlength="150" type="password" required placeholder="New Password"
                    name="new_password">
                <span class="icon is-small is-left">
                    <i class="fas fa-key"></i>
                </span>
            </div>
        </section>
        <section aria-label="forgot cofirm password" class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input" maxlength="150" type="password" required placeholder="Confirm Password"
                    name="confirm_old_password">
                <span class="icon is-small is-left">
                    <i class="fas fa-key"></i>
                </span>
            </div>
        </section>
        <section class="field level">
            <div class="control level-item">
                <button id="buttonoutside" type="submit" class="button is-normal is-link">CHANGE</button>
            </div>
        </section>
        <section class="field level">
            <a class="is-small level-item login-links" href="{{url('/')}}">Already have an Account?</a>
        </section>
    </form>
</main>
@endsection