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
                                <div class="column is-4">
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
                                <div class="column is-4">
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
                                                id="add-jobfair-buttton">Submit</button>
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
                                                id="edit_job_name" type="text" placeholder="Job">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-2">
                                    <div class="field">
                                        <label class="label" for="edit_job_strand">Strand:</label>
                                        <div class="control">
                                            <div class="select">
                                                <select required id="edit_job_strand">
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
                                <div class="column is-4">
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
                                <div class="column is-4">
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

@elseif (Request::is('admin/announcement/scholarship'))

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
                                    <div id="graduate-profile-pic">
                                        <img id="graduate-pic">
                                    </div>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">LRN:</span>
                                    <span id="graduate-lrn"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Strand:</span>
                                    <span id="graduate-strand"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Status:</span>
                                    <span id="graduate-status"></span>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="second-grad-modal-column">
                            <div class="columns is-desktop graduates-data-column">
                                <div class="column">
                                    <span class="graduate-modal-title">Firstname:</span>
                                    <span id="graduate-firstname"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Middlename:</span>
                                    <span id="graduate-middlename"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Lastname:</span>
                                    <span id="graduate-lastname"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Address:</span>
                                    <span id="graduate-address"></span>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd"
                            id="third-grad-modal-column">
                            <div class="columns is-desktop graduates-data-column">
                                <div class="column">
                                    <span class="graduate-modal-title">Birthday:</span>
                                    <span id="graduate-birthday"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Age:</span>
                                    <span id="graduate-age"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Gender:</span>
                                    <span id="graduate-gender"></span>
                                </div>
                                <div class="column">
                                    <span class="graduate-modal-title">Civil Status:</span>
                                    <span id="graduate-civil-status"></span>
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
<div class="modal is-radiusless animated fadeIn" id="graduates-delete-modal">
    <div class="modal-background"></div>
    <div class="modal-content" id="graduate-delete-grad-modal">

    </div>
    <button class="modal-close is-large" id="graduates-delete-modal-close" aria-label="close"></button>
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