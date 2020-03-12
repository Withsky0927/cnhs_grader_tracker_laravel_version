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
                                            <input class="input" readonly id="view_school_name" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_exam_date">Strand:</label>
                                        <div class="control">
                                            <input class="input" readonly id="view_exam_date">
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
                                            <textarea class="textarea" readonly id="view_exam_desc"></textarea>
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
                                                <select id="add_school_name">
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
                                            <textarea minlength="5" maxlength="500" class="textarea" id="add_exam_desc"
                                                placeholder="Add Examination Description"></textarea>
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
                                            <select id="add_exam_date_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="add_exam_date_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="add_exam_date_year">
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
                                            <textarea minlength="5" maxlength="500" class="textarea"
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
                                            <select id="edit_exam_date_month">
                                                <option selected disabled>Month</option>
                                                @for ($i = 0; $i < 13; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="edit_exam_date_day">
                                                <option selected disabled>Day</option>
                                                @for ($i = 0; $i < 32; $i++) @if($i> 0)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="select">
                                            <select id="edit_exam_date_year">
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