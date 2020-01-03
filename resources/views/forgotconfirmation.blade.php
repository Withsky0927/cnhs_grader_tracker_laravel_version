@extends('layouts.main')
@section('title' , 'Password Reset')
@section('content')
<main class="columns is-mobile is-centered">
    <form id="confirmationForm"
        class="animated fadeInDownBig column is-10-mobile is-6-tablet is-3-desktop is-3-widescreen is-2-fullhd"
        action="{{url('/forgotconfirmation')}}" autocomplete="off" method="POST">
        @csrf
        <section aria-label="brandname" class="field level">
            <h1 id="confirmationFormLogo" class="level-item">
                <img src="{{asset('img/logo.png')}}" alt="Cavite National high School Graduate Tracer System">
            </h1>
        </section>
        <section class="field">

            <?php // for middleware errors ?>
            @if(session('notification'))
            <p>{{session('notification')}}</p>
            @endif

            <?php // for validation errors ?>
            @if($errors)
            @foreach ($errors as $error)
            <p>{{$error}}</p>
            @endforeach
            @endif
        </section>
        <section class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input has-text-centered has-text-weight-bold" id="forgotconfirmationinput" maxlength="10"
                    type="number" minlength="6" required placeholder="Confirmation Code" name="forgotconfirm">
                <span class="icon is-small is-left">
                    <i class="fas fa-shield-alt"></i>
                </span>
            </div>
        </section>
        <section class="field level confirmationButton">
            <div class="control level-item">
                <button type="submit" id="hidesubmitforgotconfirm"
                    class="confirmationbuttonoutside button is-normal is-link is-size-7-desktop">RESEND</button>
            </div>
            <div class="control level-item">
                <a href="{{url('/forgotpassword')}}"
                    class="confirmationbuttonoutside button is-normal is-link is-size-7-desktop">CANCEL</a>
            </div>
        </section>
    </form>


    <form class="animated fadeInDownBig resendConfirmForm column" id="resend" action="{{url('/forgotresend')}}"
        autocomplete="off" method="POST">
        <section class="field">
            @csrf
            <button type="submit" class="button">RESEND</button>
        </section>
    </form>
</main>
@endsection