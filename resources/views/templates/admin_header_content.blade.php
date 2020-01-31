{{-- list of all modal for use in admin--}}
@if (session('user_role') == 'superadmin')
{{-- for dashboard modals--}}

@if (Request::is('admin/announcement/jobfair'))
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
                                            <input required class="input" minlength="2" maxlength="30" id="add_job_name"
                                                type="text" placeholder="Job">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="add_job_strand">Strand:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select required id="add_job_strand">
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
                                            <input required class="input" minlength="2" maxlength="30"
                                                id="add_job_company" type="text" placeholder="Add Company name">
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
                                            <textarea required minlength="5" maxlength="500" class="textarea"
                                                id="add_job_address" placeholder="Add Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="add_job_desc">Job Description:</label>
                                        <div class="control">
                                            <textarea required class="textarea" minlength="10" maxlength="1024"
                                                id="add_job_desc" placeholder="Add Job Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label is-size-6" for="add_job_qual">Job Qualification:</label>
                                        <div class="control">
                                            <textarea required class="textarea" minlength="10" maxlength="1024"
                                                id="add_job_qual" placeholder="Add Job Qualification"></textarea>
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
                                            <select required id="add_job_posted_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="add_job_posted_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="add_job_posted_year">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label">Job Availability:</label>
                                        <div class="select">
                                            <select required id="add_job_avail_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="add_job_avail_day">
                                                <option disabled selected>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="add_job_avail_year">

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
                                            <input required class="input" minlength="2" maxlength="30"
                                                id="edit_job_name" type="text">
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
                                            <input required class="input" minlength="2" maxlength="30"
                                                id="edit_job_company" type="text">
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
                                            <textarea required minlength="5" maxlength="500" class="textarea"
                                                id="edit_job_address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="edit_job_desc">Job Description:</label>
                                        <div class="control">
                                            <textarea required class="textarea" minlength="10" maxlength="1024"
                                                id="edit_job_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label is-size-6" for="edit_job_qual">Job Qualification:</label>
                                        <div class="control">
                                            <textarea required class="textarea" minlength="10" maxlength="1024"
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
                                            <select required id="edit_job_posted_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="edit_job_posted_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="edit_job_posted_year">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label">Job Availability:</label>
                                        <div class="select">
                                            <select required id="edit_job_avail_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="edit_job_avail_day">
                                                <option disabled selected>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="edit_job_avail_year">

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
@elseif (Request::is('admin/announcement/examination'))
{{-- for examinations view modal--}}
<div class="modal is-radiusless animated fadeIn" id="examinations-view-modal">
    <div class="modal-background"></div>
    <div class="modal-content examinations-modal-content">
        <div class="container examinations-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_school_name">School:</label>
                                        <div class="control">
                                            <input class="input" disabled id="view_school_name" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_exam_date">Strand:</label>
                                        <div class="control">
                                            <input class="input" disabled id="view_exam_date">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="examinations-jobfair-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_exam_desc">Job Qualification:</label>
                                        <div class="control">
                                            <textarea class="textarea" disabled id="view_exam_desc"></textarea>
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
    <button class="modal-close is-large" id="examinations-view-modal-close" aria-label="close"></button>
</div>{{-- end of examinations view modal --}}
{{-- for examinations add modal--}}
<div class="modal is-radiusless animated fadeIn" id="examinations-add-modal">
    <div class="modal-background"></div>
    <div class="modal-content examinations-modal-content">
        <div class="container examinations-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 examinations-error-container" id="add-error-container">

                </div>
                <div class="column is-7 examinations-success-container is-su" id="add-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="add_school_name">School:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select required id="add_school_name">
                                                    <option selected selected>SCHOOL</option>
                                                    @if($examinationData)
                                                    @foreach($examinationData as $exam)
                                                    <option value="{{$exam->school_name}}">
                                                        {{strtoupper(($exam->school_name))}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="add_job_address">Exam Description:</label>
                                        <div class="control">
                                            <textarea required minlength="5" maxlength="500" class="textarea"
                                                id="add_exam_desc" placeholder="Add Examination Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label">Examination Date:</label>
                                        <div class="select">
                                            <select required id="add_exam_date_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="add_exam_date_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="add_exam_date_year">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="fourth-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column is-4">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link is-small"
                                                id="add-examinations-buttton">Add</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-small is-link is-light"
                                                id="add-examinations-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="add-examinations-modal-close" aria-label="close"></button>
</div>{{--end of examinations add modal--}}
{{-- for examinations edit modal --}}
<div class="modal is-radiusless animated fadeIn" id="examinations-edit-modal">
    <div class="modal-background"></div>
    <div class="modal-content examinations-modal-content">
        <div class="container examinations-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 examinations-error-container" id="edit-error-container">

                </div>
                <div class="column is-7 examinations-success-container" id="edit-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="edit_school_name">School:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select id="edit_school_name">
                                                    <option disabled selected>SCHOOL</option>
                                                    @if($examinationData)
                                                    @foreach($examinationData as $exam)
                                                    <option value="{{$exam->school_name}}">
                                                        {{strtoupper(($exam->school_name))}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="edit_exam_desc">Examination Desc:</label>
                                        <div class="control">
                                            <textarea required minlength="5" maxlength="500" class="textarea"
                                                id="edit_exam_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column is-5">
                                    <div class="field">
                                        <label class="label" for="edit_job_posted_month">Examination Date:</label>
                                        <div class="select">
                                            <select required id="edit_exam_date_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="edit_exam_date_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select required id="edit_exam_date_year">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="fourth-examinations-modal-column">
                            <div class="columns is-desktop examinations-data-column">
                                <div class="column is-4">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link is-small"
                                                id="edit-examinations-buttton-update">Update</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-small is-link is-light"
                                                id="edit-examinations-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="edit-examinations-modal-close" aria-label="close"></button>
</div>{{-- end of examinations edit modal --}}
{{-- for examinations delete modal --}}
<div class="modal is-radiusless animated fadeIn" id="examinations-delete-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="delete-examinations-modal-content">
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
    <button class="modal-close is-large" id="delete-examinations-modal-close" aria-label="close"></button>
</div>
@elseif (Request::is('admin/announcement/scholarship'))
{{-- for scholarship view modal--}}
<div class="modal is-radiusless animated fadeIn" id="scholarships-view-modal">
    <div class="modal-background"></div>
    <div class="modal-content scholarships-modal-content">
        <div class="container scholarships-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="view_scholarships_school">School:</label>
                                        <div class="control">
                                            <input class="input" disabled id="view_scholarships_school" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="view_scholarships_grade">Grade:</label>
                                        <div class="control">
                                            <input class="input" type="text" disabled id="view_scholarships_grade">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="view_scholarships_grade">Website Link:</label>
                                        <div class="control">
                                            <input class="input" type="text" disabled id="view_scholarships_link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_scholarships_desc">Scholarship
                                            Description:</label>
                                        <div class="control">
                                            <textarea class="textarea" disabled id="view_scholarships_desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="view_scholarships_req">Scholarship
                                            Requirements:</label>
                                        <div class="control">
                                            <textarea class="textarea" disabled id="view_scholarships_req"></textarea>
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
    <button class="modal-close is-large" id="scholarships-view-modal-close" aria-label="close"></button>
</div>{{-- end of scholarship  view modal --}}
{{-- for scholarship add modal--}}
<div class="modal is-radiusless animated fadeIn" id="scholarships-add-modal">
    <div class="modal-background"></div>
    <div class="modal-content scholarships-modal-content">
        <div class="container scholarships-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 scholarships-error-container" id="add-error-container">

                </div>
                <div class="column is-7 scholarships-success-container is-su" id="add-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="add_scholarships_school">School:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select required id="add_scholarships_school">
                                                    <option selected selected>SCHOOL</option>
                                                    @if($scholarshipData)
                                                    @foreach($scholarshipData as $school)
                                                    <option value="{{$school->school_name}}">
                                                        {{strtoupper(($school->school_name))}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="add_scholarships_grade">Grade:</label>
                                        <div class="control">
                                            <input class="input" type="text" minlength="" placeholder="add Grade"
                                                id="add_scholarships_grade">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="add_scholarships_link">Link</label>
                                        <div class="control">
                                            <input class="input" maxlength="30" type="text" placeholder="add Link"
                                                id="add_scholarships_link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="add_scholarships_desc">Scholarship
                                            Description:</label>
                                        <div class="control">
                                            <textarea required minlength="5" maxlength="1024" class="textarea"
                                                id="add_scholarships_desc"
                                                placeholder="Add Scholarship Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="add_scholarships_req">Scholarship
                                            Requirements:</label>
                                        <div class="control">
                                            <textarea required minlength="5" maxlength="1024" class="textarea"
                                                id="add_scholarships_req"
                                                placeholder="Add Scholarship Requirements"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column is-4">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link is-small"
                                                id="add-scholarships-buttton">Add</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-small is-link is-light"
                                                id="add-scholarships-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="add-scholarships-modal-close" aria-label="close"></button>
</div>{{--end of scholarship add modal--}}
{{-- for scholarship edit modal --}}
<div class="modal is-radiusless animated fadeIn" id="scholarships-edit-modal">
    <div class="modal-background"></div>
    <div class="modal-content scholarships-modal-content">
        <div class="container scholarships-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 scholarships-error-container" id="edit-error-container">

                </div>
                <div class="column is-7 scholarships-success-container" id="edit-success-container">

                </div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="edit_scholarships_school">School:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select id="edit_scholarships_school">
                                                    <option disabled selected>SCHOOL</option>
                                                    @if($scholarshipData)
                                                    @foreach($scholarshipData as $school)
                                                    <option value="{{$school->school_name}}">
                                                        {{strtoupper(($school->school_name))}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="edit_scholarships_grade">Grade:</label>
                                        <div class="control">
                                            <input class="input" minlength="2" maxlength="7" type="text"
                                                id="edit_scholarships_grade">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="edit_scholarships_link">Link</label>
                                        <div class="control">
                                            <input class="input" type="text" id="edit_scholarships_link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="edit_scholarships_desc">Scholarship
                                            Description:</label>
                                        <div class="control">
                                            <textarea required minlength="5" maxlength="500" class="textarea"
                                                id="edit_scholarships_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="edit_scholarships_req">Scholarship
                                            Requirements:</label>
                                        <div class="control">
                                            <textarea required minlength="5" maxlength="500" class="textarea"
                                                id="edit_scholarships_req"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-scholarships-modal-column">
                            <div class="columns is-desktop scholarships-data-column">
                                <div class="column is-4">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link is-small"
                                                id="edit-scholarships-buttton-update">Update</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-small is-link is-light"
                                                id="edit-scholarships-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="edit-scholarships-modal-close" aria-label="close"></button>
</div>{{-- end of examinations edit modal --}}
{{-- for examinations delete modal --}}
<div class="modal is-radiusless animated fadeIn" id="scholarships-delete-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="delete-scholarships-modal-content">
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
    <button class="modal-close is-large" id="delete-scholarships-modal-close" aria-label="close"></button>
</div>
@elseif (Request::is('admin/announcement/alumni'))

@endif


@if (Request::is('admin/dashboard'))
<div class="modal is-radiusless" id="pendingmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head modalheader">
            <p class="modal-card-title is-size-6 is-dark">Pending Approval</p>
            <button class="delete is-small" id="pending-close" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <nav class="panel">
                <p class="panel-tabs">
                    <a class="is-active modal-page-link">Accounts</a>
                    <a class="modal-page-link">Reports</a>
                    <a class="modal-page-link"></a>
                    <a class="modal-page-link">Sources</a>
                    <a class="modal-page-link">Forks</a>
                </p>
                <a class="panel-block is-active">
                    <div class="table-container">
                        <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th colspan="2" class="has-text-centered">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>superadmin</td>
                                    <td>superadmin</td>
                                    <td>Pending</td>
                                    <td><button class="button is-success is-small">Approve</button></td>
                                    <td><button class="button is-danger is-small">Discard</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav class="pagination is-small" role="navigation" aria-label="pagination">
                        <a class="pagination-previous" disabled>Previous</a>
                        <a class="pagination-next">Next page</a>
                        <ul class="pagination-list" id="accountsApprovalPagination">
                            <li>
                                <a class="pagination-link is-current is-danger" aria-label="Page 1"
                                    aria-current="page">1</a>
                            </li>
                            <li>
                                <a class="pagination-link" aria-label="Goto page 2">2</a>
                            </li>
                            <li>
                                <a class="pagination-link" aria-label="Goto page 3">3</a>
                            </li>
                        </ul>
                    </nav>
                </a>
            </nav>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-small is-danger">Save changes</button>
            <button class="button is-small">Cancel</button>
        </footer>
    </div>
</div>
@endif
{{-- for accounts modals --}}
@if (Request::is('admin/accounts/admin'))
@endif
@if (Request::is('admin/accounts/student'))
@endif
{{-- for settings modals --}}
@if (Request::is('admin/settings/variables'))
@endif
@if (Request::is('admin/settings/audittrail'))
@endif
@if (Request::is('admin/settings/backup'))
@endif
@endif{{-- end of superadmin scope--}}
{{-- end of admin modals --}}
@if(session('user_role') == 'superadmin' || session('user_role') == 'admin')
@if (Request::is('admin/graduates'))
<div class="modal is-radiusless animated fadeIn" id="graduates-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="graduate-modal-content">
        <div class="container" id="graduates-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-grad-modal-column">
                            <div class="columns is-desktop graduates-data-column">
                                <div class="column">
                                    <div class="field">
                                        <div id="graduate-profile-pic">
                                            <img id="graduate-pic">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-lrn" class="graduate-modal-title">LRN:</label>
                                        <div class="control">
                                            <input id="graduate-lrn" class="input" type="text" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-strand" class="graduate-modal-title">Strand:</label>
                                        <div class="control">
                                            <input id="graduate-strand" class="input" type="text" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-status" class="graduate-modal-title">Status:</label>
                                        <input id="graduate-status" type="text" class="input" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-grad-modal-column">
                            <div class="columns is-desktop graduates-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-firstname" class="graduate-modal-title">Firstname:</label>
                                        <input id="graduate-firstname" type="text" class="input" disabled />
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-middlename">Middlename:</label>
                                        <input type="text" id="graduate-middlename" class="input" disabled />
                                    </div>

                                </div>
                                <div class="column">
                                    <div class="field">
                                        <span for="graduate-lastname" class="graduate-modal-title">Lastname:</span>
                                        <input id="graduate-lastname" class="input" type="text" disabled />
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-address" class="graduate-modal-title">Address:</label>
                                        <input id="graduate-address" class="input" type="text" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-grad-modal-column">
                            <div class="columns is-desktop graduates-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-birthday" class="graduate-modal-title">Birthday:</label>
                                        <input id="graduate-birthday" class="input" type="text" disabled />
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-age" class="graduate-modal-title">Age:</label>
                                        <input id="graduate-age" class="input" type="text" disabled />
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-gender" class="graduate-modal-title">Gender:</label>
                                        <input id="graduate-gender" class="input" type="text" disabled />
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="graduate-civil-status" class="graduate-modal-title">Civil
                                            Status:</label>
                                        <input id="graduate-civil-status" class="input" type="text" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" id="graduates-modal-close" aria-label="close"></button>
</div>
@endif

@if (Request::is('/admin/reports'))
<div class="modal is-radiusless animated fadeIn" id="graduates-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="graduates-modal-content">

    </div>
    <button class="modal-close is-large" id="graduates-modal-close" aria-label="close"></button>
</div>
@endif
@endif

<nav class="navbar" id="navigationbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a role="button" class="navbar-burger burger burgercolor" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu navbarbutton">
        <div class="navbar-start">
            @if(session('user_role') == 'superadmin')
            <a class="navbar-item is-size-7" href="{{url('/admin/dashboard')}}">DASHBOARD</a>
            @endif
            @if(session('user_role') == 'admin')
            <a class="navbar-item is-size-7" href="{{url('/admin/home')}}">HOME</a>
            @endif
            <a class="navbar-item is-size-7" href="{{url('/admin/graduates')}}">GRADUATES</a>
            <a class="navbar-item is-size-7" href="{{url('/admin/reports')}}">REPORTS</a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless is-size-7">
                    ANNOUNCEMENT
                </a>
                <div class="navbar-dropdown is-radiusless navbarhover animated fadeIn">
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/announcement/jobfair')}}"> Job
                        Fair</a>
                    <a class="navbar-item is-size-7 is-uppercase"
                        href="{{url('/admin/announcement/scholarship')}}">Scholarship</a>
                    <a class="navbar-item is-size-7 is-uppercase"
                        href="{{url('/admin/announcement/examination')}}">Examination</a>
                    <a class="navbar-item is-size-7 is-uppercase"
                        href="{{url('/admin/announcement/alumni')}}">Alumni</a>
                </div>
            </div>
            @if(session('user_role') == 'superadmin')
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless is-size-7">
                    ACCOUNTS
                </a>
                <div class="navbar-dropdown is-radiusless navbarhover animated fadeIn">
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/accounts/admin')}}">Admin</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/accounts/student')}}">Student</a>
                </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless is-size-7">
                    SETTINGS
                </a>
                <div class="navbar-dropdown is-radiusless navbarhover animated fadeIn">
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/settings/audittrail')}}">Audit
                        Trail</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/settings/backup')}}">Backup</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/settings/variables')}}">System
                        Variables</a>
                </div>
            </div>
            @endif
        </div>
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <div class="navbar-link is-arrowless is-size-7" id="navbarprofile">
                    PROFILE
                </div>
                <div class="navbar-dropdown navbarhover is-radiusless is-right animated fadeIn">
                    <a class="navbar-item is-size-7 is-uppercase no-underline">Role:{{session('user_role')}}</a>
                    <a class="navbar-item is-size-7 is-uppercase no-underline">Username:
                        {{session('login_username')}}</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/admin/profile')}}">Edit Profile</a>
                    <a class="navbar-item is-size-7 is-uppercase" href="{{url('/logout')}}">Log out</a>
                </div>
            </div>
        </div>
    </div>
</nav>