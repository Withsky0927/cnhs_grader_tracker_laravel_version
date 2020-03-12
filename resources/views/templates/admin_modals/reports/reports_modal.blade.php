{{-- for reports view modal--}}
<div class="modal is-radiusless animated fadeIn" id="reports-view-modal">
    <div class="modal-background"></div>
    <div class="modal-content reports-modal-content">
        <div class="container reports-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <div class="columns is-centered is-multiline is-desktop">
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="first-reports-modal-column">
                            <div class="columns is-desktop reports-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_reports_name">Report name:</label>
                                        <div class="control">
                                            <input class="input" readonly type="text" id="view_reports_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_reports_type">Report Type:</label>
                                        <div class="control">
                                            <input class="input" readonly type="text" id="view_reports_type">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_reports_uploaded_by">Uploaded By:</label>
                                        <div class="control">
                                            <input class="input" readonly type="text" id="view_reports_uploaded_by">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-reports-modal-column">
                            <div class="columns is-desktop reports-data-column">
                                <div class="column">
                                    <div class="field">
                                        <label class="label" for="view_reports_description">Reports
                                            Description:</label>
                                        <div class="control">
                                            <textarea readonly minlength="5" maxlength="1024" class="textarea"
                                                id="view_reports_description"></textarea>
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
    <button class="modal-close is-large" id="view-reports-modal-close" aria-label="close"></button>
</div>{{-- end of reports  view modal --}}
{{-- for reports add modal--}}
<div class="modal is-radiusless animated fadeIn" id="reports-add-modal">
    <div class="modal-background"></div>
    <div class="modal-content reports-modal-content">
        <div class="container reports-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 reports-error-container" id="add-error-container"></div>
                <div class="column is-7 reports-success-container" id="add-success-container"></div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <form action="/admin/reports" method="post" id="add-report-form" enctype="multipart/form-data"
                        autocomplete="off">
                        <div class="columns is-centered is-multiline is-desktop">
                            <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                id="first-reports-modal-column">
                                <div class="columns is-desktop reports-data-column">
                                    <div class="column is-3">
                                        <label class="label" for="Document">Report Document:</label>
                                        <div id="file-js-example" class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" id="Document" name="Document" type="file">
                                                <span class="file-cta">
                                                    <span class="file-icon">
                                                        <i class="fas fa-upload"></i>
                                                    </span>
                                                    <span class="file-label">
                                                        Upload
                                                    </span>
                                                </span>
                                                <span class="file-name">
                                                    No Document uploaded
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="column is-3">
                                        <div class="field">
                                            <label class="label" for="add_reports_name">Report name:</label>
                                            <div class="control">
                                                <input class="input" type="text" id="add_reports_name"
                                                    name="add_reports_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="add_reports_type">Report Type:</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select id="add_reports_type" name="add_reports_type">
                                                        <option disabled selected>Report Type</option>
                                                        @if(count($reportsData) > 0 && $reportsData)
                                                        @foreach($reportsData as $report)
                                                        <option value="{{$report->report_type}}">
                                                            {{strtoupper(($report->report_type))}}</option>
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
                                id="second-reports-modal-column">
                                <div class="columns is-desktop reports-data-column">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="add_reports_description">Reports
                                                Description:</label>
                                            <div class="control">
                                                <textarea minlength="5" maxlength="500" class="textarea"
                                                    id="add_reports_description"
                                                    name="add_reports_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                id="third-reports-modal-column">
                                <div class="columns is-desktop reports-data-column">
                                    <div class="column is-4">
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button class="button is-link is-small" id="add-reports-buttton"
                                                    type="submit">Submit</button>
                                            </div>
                                            <div class="control">
                                                <button class="button is-small is-link is-light"
                                                    id="add-reports-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="add-reports-modal-close" aria-label="close"></button>
</div>{{--end of reports add modal--}}
{{-- for reports edit modal --}}
@if(session('user_role') == 'superadmin')
<div class="modal is-radiusless animated fadeIn" id="reports-edit-modal">
    <div class="modal-background"></div>
    <div class="modal-content reports-modal-content">
        <div class="container reports-modal-container">
            <div class="columns is-centered is-multiline is-desktop">
                <div class="column is-7 reports-error-container" id="edit-error-container"></div>
                <div class="column is-7 reports-success-container" id="edit-success-container"></div>
                <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd">
                    <form action="/admin/reports/edit/report" autocomplete="off" id="edit-report-form" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="columns is-centered is-multiline is-desktop">

                            <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                id="first-reports-modal-column">
                                <div class="columns is-desktop reports-data-column">
                                    <div class="column">
                                        <label class="label" for="edit_reports_document">Report Document:</label>
                                        <div id="file-js-example" class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" name="edit_reports_document"
                                                    id="edit_reports_document" type="file">
                                                <span class="file-cta">
                                                    <span class="file-icon">
                                                        <i class="fas fa-upload"></i>
                                                    </span>
                                                    <span class="file-label">
                                                        Document
                                                    </span>
                                                </span>
                                                <span class="file-name" id="reports_edit_filename">
                                                    No Document uploaded
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="edit_reports_name">Report name:</label>
                                            <div class="control">
                                                <input class="input" type="text" name="edit_reports_name"
                                                    id="edit_reports_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="edit_reports_type">Report Type:</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select id="edit_reports_type" name="edit_reports_type">
                                                        <option disabled selected>Report Type</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                id="second-reports-modal-column">
                                <div class="columns is-desktop reports-data-column">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label" for="edit_reports_description">Reports
                                                Description:</label>
                                            <div class="control">
                                                <textarea minlength="5" maxlength="500" class="textarea"
                                                    id="edit_reports_description"
                                                    name="edit_reports_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                                id="third-reports-modal-column">
                                <div class="columns is-desktop reports-data-column">
                                    <div class="column is-4">
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button class="button is-link is-small" id="edit-reports-buttton-update"
                                                    type="submit">Update</button>
                                            </div>
                                            <div class="control">
                                                <button class="button is-small is-link is-light"
                                                    id="edit-reports-buttton-cancel">Cancel</button>
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
    <button class="modal-close is-large" id="edit-reports-modal-close" aria-label="close"></button>
</div>{{-- end of reports edit modal --}}
{{-- for reports delete modal --}}
<div class="modal is-radiusless animated fadeIn" id="reports-delete-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="delete-reports-modal-content">
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
    <button class="modal-close is-large" id="delete-reports-modal-close" aria-label="close"></button>
</div>
@endif