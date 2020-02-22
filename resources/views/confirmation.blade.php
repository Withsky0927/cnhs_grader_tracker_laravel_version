@extends('layouts.main')
@section('title', 'New Account Confirmation')
@section('content')
<main class="columns is-mobile is-centered">
    <form id="confirmationForm"
        class="animated fadeIn column is-10-mobile is-6-tablet is-3-desktop is-3-widescreen is-2-fullhd"
        action="{{url('/confirmation')}}" autocomplete="off" method="post">
        @csrf
        <section aria-label="brandname" class="field level">
            <h1 id="confirmationFormLogo" class="level-item">
                <img src="{{asset('img/logo.png')}}" alt="Cavite National high School Graduate Tracer System">
            </h1>
        </section>
        <section class="is-columns is-multiline is-centered is-multiline">
            @if(session('new_confirmation_code'))
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-success-container">
                <p class="has-text-centered has-text-white">{{session('new_confirmation_code')}}</p>
            </div>
            @endif

            @if(count($errors) > 0 && $errors)
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-errors-container">
                @foreach ($errors->all() as $item)
                <p class="has-text-centered" id="outside-validation-errors">{{$item}}</p>
                @endforeach
            </div>
            @endif
        </section>
        <section class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input has-text-centered has-text-weight-bold" id="confirmationinput" maxlength="10"
                    type="number" minlength="6" required placeholder="Confirmation Code" name="confirmation">
                <span class="icon is-small is-left">
                    <i class="fas fa-shield-alt"></i>
                </span>
            </div>
        </section>
        <section class="field level confirmationButton">
            <div class="control level-item">
                <button type="submit" id="hidesubmitconfirm"
                    class="confirmationbuttonoutside button is-normal is-link is-size-7-desktop">SUBMIT</button>
            </div>
            <div class="control level-item">
                <a href="{{url('/')}}"
                    class="confirmationbuttonoutside button is-normal is-link is-size-7-desktop">CANCEL</a>
            </div>
        </section>
    </form>


    <form class="animated fadeInDownBig resendForm column" id="resend" action="{{url('/resend')}}" autocomplete="off"
        method="POST">
        <section class="field">
            @csrf
            <button type="submit" class="button">RESEND</button>
        </section>
    </form>

</main>
@endsection