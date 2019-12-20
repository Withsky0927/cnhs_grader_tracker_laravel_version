@extends('layouts.main')

@section('title', 'Registration form')

@section('content')
<main class="columns is-desktop is-mobile is-centered">
    <form autocomplete="off" id="registrationform" action="{{url('/register')}}" method="POST"
        enctype="multipart/form-data"
        class="animated fadeIn column is-10-mobile is-10-tablet is-8-desktop is-7-widescreen is-7-fullhd">
        @csrf
        <section aria-label="brandname" id="registerlogo"
            class="columns is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
            <div class="column">
                <div class="field level" id="">
                    <h1 class="level-item"><img src="{{asset('img/logo.png')}}"
                            alt="Cavite National high School Graduate Tracer System"></h1>
                </div>
            </div>
        </section>
        <section class="columns is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
            <div class="column">
                @if ($errors != '')
                @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
                @endif

                <!--check if user exists throw an error -->
                @if (session('userexist'))
                @foreach (session('userexist') as $error)
                <p>{{$error}}</p>
                @endforeach
                @endif

                @if ($data != '')
                @foreach ($data as $item)
                <p>{{$item}}</p>
                @endforeach
                @endif
            </div>
        </section>
        <!-- first field -->

        <section class="columns is-desktop">
            <div class="column">
                <div class="field">
                    <div class="file profile-pic is-small is-boxed has-name" id="profile_picture">
                        <label class="file-label">
                            <input class="file-input profile_pic_input" type="file" name="profile_pic"
                                accept=".jpg, .png">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Profile Picture...
                                </span>
                            </span>
                            <span class="file-name">
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="username">Username</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="50" type="text" id="username" required
                            placeholder="Username" name="username">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="password">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="150" type="password" id="password" required
                            placeholder="Password" name="password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-key"></i>
                        </span>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="password">Confirm Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="150" type="password" id="confirmPassword" required
                            placeholder="Confirm Password" name="confirmPassword">
                        <span class="icon is-small is-left">
                            <i class="fas fa-key"></i>
                        </span>
                    </div>

                </div>
            </div>
        </section>
        <section class="columns is-desktop">
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="lrn">LRN</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="20" type="number" id="lrn" required placeholder="LRN"
                            name="lrn">
                        <span class="icon is-small is-left">
                            <i class="fas fa-id-card"></i>
                        </span>
                    </div>

                </div>
            </div>

            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="strand">Strand</label>
                    <div class="control  has-icons-left">
                        <div class="select is-small">
                            <select required name="strand" id="strand" class="strand">
                                <option selected disabled>Strand</option>
                                <option value="STEM">STEM</option>
                                <option value="GAS">GAS</option>
                                <option value="ARTSSCIENCE">Arts and Science</option>
                            </select>
                        </div>
                        <div class="icon is-small is-left">
                            <i class="fas fa-route"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="email">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="100" type="email" id="email" required
                            placeholder="Email" name="email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="phone">Mobile</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="20" type="text" id="phone" required placeholder="Phone"
                            name="phone">
                        <span class="icon is-small is-left">
                            <i class="fas fa-mobile"></i>
                        </span>
                    </div>

                </div>
            </div>
        </section>




        <section class="columns is-desktop">
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="firstname">Firstname</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="30" type="text" id="firstname" required
                            placeholder="Firstname" name="firstname">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user-tag"></i>
                        </span>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="middlename">Middlename</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="30" type="text" id="middlename" required
                            placeholder="Middlename" name="middlename">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user-tag"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="lastname">Lastname</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="30" type="text" id="lastname" required
                            placeholder="Lastname" name="lastname">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user-tag"></i>
                        </span>
                    </div>

                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="address">Address</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="500" type="text" id="address" required
                            placeholder="Address" name="address">
                        <span class="icon is-small is-left">
                            <i class="fas fa-mobile"></i>
                        </span>
                    </div>

                </div>
            </div>
        </section>
        <section class="columns is-desktop">
            <div class="column is-2-desktop">
                <label for="" class="label is-size-7">Birthday</label>
            </div>
        </section>
        <section class="columns is-desktop">
            <div class="column is-3-desktop">
                <div class="columns is-mobile">
                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <div class="select is-small">
                                    <select required name="month" id="month" class="bday">
                                        <option selected disabled>Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <div class="select is-small">
                                    <select required name="day" id="day" class="bday">
                                        <option selected disabled>Day</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <div required class="select is-small">
                                    <select name="year" id="year" class="bday"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="columns is-desktop">
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="age">Age</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" readonly maxlength="3" type="text" id="age" required
                            placeholder="Age" name="age">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user-clock"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label is-size-7" for="gender">Gender</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="15" type="text" id="gender" required
                            placeholder="Gender" name="gender">
                        <span class="icon is-small is-left">
                            <i class="fas fa-venus-mars"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label for="civil_status" class="label is-size-7">Civil Status</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="20" type="text" id="civilStatus" required
                            placeholder="Civil Status" name="civilStatus">
                        <span class="icon is-small is-left">
                            <i class="fas fa-ring"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label for="employment_status" class="label is-size-7">Status</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" maxlength="20" type="text" id="status" required
                            placeholder="Status" name="status">
                        <span class="icon is-small is-left">
                            <i class="fas fa-ring"></i>
                        </span>
                    </div>

                </div>
            </div>
        </section>

        <section class="columns is-tablet">
            <div class="column">
                <div class="field">
                    <button type="submit" id="registrationbutton" class="is-shadow button is-primary">REGISTER</button>
                </div>
            </div>
        </section>
        <section class="columns is-tablet">
            <div class="column" id="link-centering">
                <a href="{{url('/')}}" class="register-links is-size-6">Already have an Account?</a>
            </div>
        </section>
    </form>
</main>
@endsection