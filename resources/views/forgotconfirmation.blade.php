@extends('layouts.main')
@section('title' , 'Password Reset')
@section('content')
<main class="columns is-mobile is-centered">
    <form id="confirmationForm"
        class="animated fadeIn column is-10-mobile is-6-tablet is-3-desktop is-3-widescreen is-2-fullhd"
        action="{{url('/forgotconfirmation')}}" autocomplete="off" method="POST">
        @csrf
        <section aria-label="brandname" class="field level">
            <h1 id="confirmationFormLogo" class="level-item">
                <img src="{{asset('img/logo.png')}}" alt="Cavite National high School Graduate Tracer System">
            </h1>
        </section>
        <section class="columns is-centered is-mobile is-multiline">
            <?php // for success notifications ?>
            @if(session('confirmation_code'))
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-success-container">
                <p class="has-text-centered has-text-white">{{session('confirmation_code')}}</p>
            </div>
            @endif
            @if(session('new_forgot_password_confirmation_code'))
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-success-container">
                <p class="has-text-centered has-text-white">{{session('new_forgot_password_confirmation_code')}}</p>
            </div>
            @endif
            {{--for validation errors --}}
            @if(session('invalid_forgotpassword_code'))
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-error-container">
                <p class="has-text-centered has-text-white">{{session('invalid_forgotpassword_code')}}</p>
            </div>
            @endif
            @if(count($errors) > 0 && $errors)
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-error-container">
                @foreach ($errors->all() as $error)
                <p class="has-text-centered has-text-white" id="outside-validation-errors">{{$error}}</p>
                @endforeach
            </div>
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
            <button type="submit" class="button is-normal is-size-7-desktop">RESEND</button>
        </section>
    </form>
</main>
@endsection