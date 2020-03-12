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
                                            <input class="input" readonly id="view_scholarships_school" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="view_scholarships_grade">Grade:</label>
                                        <div class="control">
                                            <input class="input" type="text" readonly id="view_scholarships_grade">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label" for="view_scholarships_grade">Website Link:</label>
                                        <div class="control">
                                            <input class="input" type="text" readonly id="view_scholarships_link">
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
                                            <textarea class="textarea" readonly id="view_scholarships_desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="view_scholarships_req">Scholarship
                                            Requirements:</label>
                                        <div class="control">
                                            <textarea class="textarea" readonly id="view_scholarships_req"></textarea>
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
                                                <select id="add_scholarships_school">
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
                                            <textarea minlength="5" maxlength="1024" class="textarea"
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
                                            <textarea minlength="5" maxlength="1024" class="textarea"
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
                                            <textarea minlength="5" maxlength="500" class="textarea"
                                                id="edit_scholarships_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="edit_scholarships_req">Scholarship
                                            Requirements:</label>
                                        <div class="control">
                                            <textarea minlength="5" maxlength="500" class="textarea"
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
</div>{{-- end of scholarships edit modal --}}
{{-- for scholarships delete modal --}}
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