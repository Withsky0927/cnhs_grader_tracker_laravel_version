@extends('layouts.main')
@extends('title', 'Account Confirmation')
@section('content')
<main class="columns is-mobile is-centered">
    <form id="confirmationForm"
        class="animated fadeInDownBig column is-10-mobile is-6-tablet is-3-desktop is-3-widescreen is-2-fullhd"
        action="{{url('/confirm')}}" autocomplete="off" method="post">
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
                <input class="input" maxlength="10" type="password" required placeholder="Username" name="username">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        </section>
        <section class="field level">
            <div class="control level-item">
                <button id="buttonoutside" type="submit" class="button is-normal is-link">RESEND</button>
            </div>
            <div class="control level-item">
                <link id="buttonoutside" class="button is-normal is-link">CANCEL</button>
            </div>
        </section>
    </form>
</main>
@endsection