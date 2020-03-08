{{-- for jobfairs view modal--}}
<div class="modal is-radiusless animated fadeIn" id="jobfair-view-modal">
    <div class="modal-background"></div>
    <div class="modal-content jobfair-modal-content">
        <div class="container jobfair-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_job_name">Job:</label>
                                        <div class="control">
                                            <input class="input" disabled id="view_job_name" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_job_strand">Strand:</label>
                                        <div class="control">
                                            <input class="input" disabled id="view_job_strand" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_job_company">Company:</label>
                                        <div class="control">
                                            <input class="input" disabled id="view_job_company" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Address:</label>
                                        <div class="control">
                                            <textarea class="textarea" disabled id="view_job_address"
                                                placeholder="Add Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_job_description">Job Description:</label>
                                        <div class="control">
                                            <textarea class="textarea" disabled id="view_job_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_job_qual">Job Qualification:</label>
                                        <div class="control">
                                            <textarea class="textarea" disabled id="view_job_qual"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column is-2-desktop">
                                    <div class="field">
                                        <label class="label" for="view_job_posted">Job Posted:</label>
                                        <div class="control">
                                            <input class="input" id="view_job_posted" disabled type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-2-desktop">
                                    <div class="field">
                                        <label class="label" for="view_job_avail">Job Availability:</label>
                                        <div class="control">
                                            <input class="input" id="view_job_avail" disabled type="text">
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
    <button class="modal-close is-large" id="jobfair-view-modal-close" aria-label="close"></button>
</div>{{-- end of jobfairs view modal --}}
{{-- for jobfairs add modal--}}
<div class="modal is-radiusless animated fadeIn" id="jobfair-add-modal">
    <div class="modal-background"></div>
    <div class="modal-content jobfair-modal-content">
        <div class="container jobfair-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 jobfair-error-container" id="add-error-container">

                </div>
                <div class="column is-7 jobfair-success-container is-su" id="add-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="add_job_name">Job:</label>
                                        <div class="control">
                                            <input class="input" minlength="2" maxlength="30" id="add_job_name"
                                                type="text" placeholder="Job">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="add_job_strand">Strand:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select id="add_job_strand">
                                                    <option disabled>strand</option>
                                                    @foreach($Strands as $strand)
                                                    <option value="{{$strand->strand_name}}">
                                                        {{($strand->strand_name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="add_job_company">Company:</label>
                                        <div class="control">
                                            <input class="input" minlength="2" maxlength="30" id="add_job_company"
                                                type="text" placeholder="Add Company name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="add_job_address">Address:</label>
                                        <div class="control">
                                            <textarea minlength="5" maxlength="500" class="textarea"
                                                id="add_job_address" placeholder="Add Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="add_job_desc">Job Description:</label>
                                        <div class="control">
                                            <textarea class="textarea" minlength="10" maxlength="1024" id="add_job_desc"
                                                placeholder="Add Job Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label is-size-6" for="add_job_qual">Job Qualification:</label>
                                        <div class="control">
                                            <textarea class="textarea" minlength="10" maxlength="1024" id="add_job_qual"
                                                placeholder="Add Job Qualification"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label">Job Posted:</label>
                                        <div class="select">
                                            <select id="add_job_posted_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="add_job_posted_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="add_job_posted_year">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label">Job Availability:</label>
                                        <div class="select">
                                            <select id="add_job_avail_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="add_job_avail_day">
                                                <option disabled selected>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="add_job_avail_year">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="fourth-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column is-4">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link is-small"
                                                id="add-jobfair-buttton">Add</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-small is-link is-light"
                                                id="add-jobfair-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="add-jobfair-modal-close" aria-label="close"></button>
</div>{{--end of jobfairs add modal--}}
{{-- for jobfairs edit modal --}}
<div class="modal is-radiusless animated fadeIn" id="jobfair-edit-modal">
    <div class="modal-background"></div>
    <div class="modal-content jobfair-modal-content">
        <div class="container jobfair-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 jobfair-error-container" id="edit-error-container">

                </div>
                <div class="column is-7 jobfair-success-container" id="edit-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
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
                                                    @foreach($Strands as $strand)
                                                    <option value="{{$strand->strand_name}}">
                                                        {{($strand->strand_name)}}</option>
                                                    @endforeach
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
                            id="second-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
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
                            id="third-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
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
                            id="fourth-jobfair-modal-column">
                            <div class="columns is-desktop jobfair-data-column">
                                <div class="column is-4">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link is-small"
                                                id="edit-jobfair-buttton-update">Update</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-small is-link is-light"
                                                id="edit-jobfair-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="edit-jobfair-modal-close" aria-label="close"></button>
</div>{{-- end of jobfairs edit modal --}}
{{-- for jobfairs delete modal --}}
<div class="modal is-radiusless animated fadeIn" id="jobfair-delete-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="delete-jobfair-grad-modal-content">
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
    <button class="modal-close is-large" id="delete-jobfair-modal-close" aria-label="close"></button>
</div>