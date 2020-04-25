{{-- for admins add modal--}}
<div class="modal is-radiusless animated fadeIn" id="admins-add-modal">
    <div class="modal-background"></div>
    <div class="modal-content admins-modal-content">
        <div class="container admins-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 admins-error-container" id="add-error-container">

                </div>
                <div class="column is-7 admins-success-container is-su" id="add-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <form method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                id="first-admins-modal-column">
                                <div class="columns is-desktop admins-data-column">
                                    <div class="column is-6">
                                        <div class="field">
                                            <label class="label is-size-7" for="new-admin-profile-pic">Profile
                                                Picture</label>
                                            <div id="file-js-example" class="file has-name">
                                                <label class="file-label">
                                                    <input class="file-input" type="file" accept="image/jpeg ,image/png"
                                                        id="new-admin-profile-pic">
                                                    <span class=" file-cta">
                                                        <span class="file-icon">
                                                            <i class="fas fa-upload"></i>
                                                        </span>
                                                        <span class="file-label">
                                                            Upload a Photo..
                                                        </span>
                                                    </span>
                                                    <span class="file-name" id="new-admin-profile">
                                                        No Photo uploaded
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label class="label" for="add_job_name">Username:</label>
                                            <div class="control">
                                                <input class="input" required minlength="2" maxlength="50"
                                                    name="username" type="text" placeholder="new Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                    id="second-admins-modal-column">
                                    <div class="columns is-desktop admins-data-column">
                                        <div class="column is-6">
                                            <div class="field">
                                                <label class="label" for="add_job_name">Email:</label>
                                                <div class="control">
                                                    <input class="input" required minlength="2" maxlength="30"
                                                        name="email" type="email" placeholder="new Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label class="label" for="add_job_name">Username:</label>
                                                <div class="control">
                                                    <input class="input" required minlength="2" maxlength="30"
                                                        name="phone" type="phone" placeholder="new Phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                    id="third-admins-modal-column">
                                    <div class="columns is-desktop admins-data-column">
                                        <div class="column is-4">
                                            <div class="field is-grouped">
                                                <div class="control">
                                                    <button class="button is-link is-small"
                                                        id="add-admins-buttton">Add</button>
                                                </div>
                                                <div class="control">
                                                    <button class="button is-small is-link is-light"
                                                        id="add-admins-buttton-cancel">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" id="add-admins-modal-close" aria-label="close"></button>
</div>{{--end of admins add modal--}}
{{-- for admins edit modal --}}
<div class="modal is-radiusless animated fadeIn" id="admins-edit-modal">
    <div class="modal-background"></div>
    <div class="modal-content admins-modal-content">
        <div class="container admins-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 admins-error-container" id="edit-error-container">

                </div>
                <div class="column is-7 admins-success-container" id="edit-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-admins-modal-column">
                            <div class="columns is-desktop admins-data-column">
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="edit_job_name">Job:</label>
                                        <div class="control">
                                            <input class="input" minlength="2" maxlength="30" id="edit_job_name"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="edit_job_strand">Strand:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select id="edit_job_strand">
                                                    <option disabled selected>strand</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="edit_job_company">Company:</label>
                                        <div class="control">
                                            <input class="input" minlength="2" maxlength="30" id="edit_job_company"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-admins-modal-column">
                            <div class="columns is-desktop admins-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="edit_job_address">Address:</label>
                                        <div class="control">
                                            <textarea minlength="5" maxlength="500" class="textarea"
                                                id="edit_job_address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="edit_job_desc">Job Description:</label>
                                        <div class="control">
                                            <textarea class="textarea" minlength="10" maxlength="1024"
                                                id="edit_job_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label is-size-6" for="edit_job_qual">Job Qualification:</label>
                                        <div class="control">
                                            <textarea class="textarea" minlength="10" maxlength="1024"
                                                id="edit_job_qual"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-admins-modal-column">
                            <div class="columns is-desktop admins-data-column">
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label" for="edit_job_posted_month">Job Posted:</label>
                                        <div class="select">
                                            <select id="edit_job_posted_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="edit_job_posted_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="edit_job_posted_year">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label">Job Availability:</label>
                                        <div class="select">
                                            <select id="edit_job_avail_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="edit_job_avail_day">
                                                <option disabled selected>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="edit_job_avail_year">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="fourth-admins-modal-column">
                            <div class="columns is-desktop admins-data-column">
                                <div class="column is-4">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link is-small"
                                                id="edit-admins-buttton-update">Update</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-small is-link is-light"
                                                id="edit-admins-buttton-cancel">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" id="edit-admins-modal-close" aria-label="close"></button>
</div>{{-- end of admins edit modal --}}
{{-- for admins delete modal --}}
<div class="modal is-radiusless animated fadeIn" id="admins-delete-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="delete-admins-grad-modal-content">
        <div class="columns is-mobile is-centered is-multiline">
            <div class="column is-12" id="delete-modal-text">
                <p class="delete-text-modal has-text-centered">Delete this Data? Deleting this data will be unrecovable!
                </p>
            </div>
            <div class="column is-12" id="delete-modal-buttons">
                <div class="columns is-desktop">
                    <div class="column is-6 has-text-centered">
                        <button class="button delete-modal-button is-danger"
                            id="delete-modal-button-confirm">Confirm</button>
                    </div>
                    <div class="column is-6 has-text-centered">
                        <button class="button delete-modal-button is-success has-text-centered"
                            id="delete-modal-button-cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" id="delete-admins-modal-close" aria-label="close"></button>
</div>