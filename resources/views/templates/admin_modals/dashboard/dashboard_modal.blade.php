{{-- for pending Account sub-Modal --}}
<div class="modal is-radiusless" id="view-account-pending-modal">
    <div class="modal-background">
    </div>
</div>

<div class="modal is-radiusless" id="approve-account-pending-modal">
    <div class="modal-background">

    </div>
</div>

<div class="modal is-radiusless" id="approve-account-pending-modal">
    <div class="modal-background">

    </div>
</div>


{{-- for pending Reports sub-modal --}}
<div class="modal is-radiusless" id="view-report-pending-modal">
    <div class="modal-background">

    </div>
</div>
<div class="modal is-radiusless" id="approve-report-pending-modal">
    <div class="modal-background">

    </div>
</div>
<div class="modal is-radiusless" id="approve-report-pending-modal">
    <div class="modal-backgroundd">

    </div>
</div>

<div class="modal is-radiusless" id="pendingmodal">
    <div class="modal-background"></div>

    {{-- for accounts modals--}}
    <div id="dashboard-pending-account-view-modal" class="animated fadeIn">
        <div class="columns is-multiline is-centered is-mobile">
            <div class="column is-12">
                <div class="columns is-multiline is-centered is-mobile">
                    <div class="column is-12">
                        <div class="columns is-multiline is-centered is-desktop">
                            <div class="column">
                                <div class="field">
                                    <div class="control">
                                        <img id="view-pending-profile-pic">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-lrn">LRN:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-lrn">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-strand">Strand:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-strand">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-status">Status:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-status">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="columns is-multiline is-centered is-desktop">
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-firstname">Firstname:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-firstname">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-middlename">Middlename:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-middlename">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-lastname">Lastname:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-pending-address">Address:</label>
                                    <div class="control">
                                        <textarea id="view-pending-address" class="textarea" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="columns is-multiline is-centered is-desktop">
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-bday">Birthday:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-bday">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-age">Age:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-age">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="view-pending-gender">Gender:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-gender">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label for="">Civil Status:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-civil-status">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="columns is-multiline is-desktop">
                            <div class="column is-3">
                                <div class="field">
                                    <label for="view-pending-username">Username:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-username">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label for="view-pending-role">Role:</label>
                                    <div class="control">
                                        <input type="text" class="input" disabled id="view-pending-role">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dashboard-pending-account-approve-modal" class="animated fadeIn">
        <div class="columns is-multiline is-centered is-mobile">
            <div class="column is-12">
                <div class="columns is-multiline is-centered is-desktop">
                    <div class="column is-12">
                        <h4>Approved this Pending Request? Approved Account can now access it`s Workspace!</h4>
                    </div>
                    <div class="column is-6 has-text-centered">
                        <button class="button is-normal">CONFIRM</button>
                    </div>
                    <div class="column is-6 has-text-centered">
                        <button class="button is-normal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dashboard-pending-account-disapprove-modal" class="animated fadeIn">
        <div class="columns is-multiline is-centered is-mobile">
            <div class="column is-12">
                <div class="columns is-multiline is-centered is-desktop">
                    <div class="columns is-multiline is-centered is-desktop">
                        <div class="column is-12">
                            <h4>Disapprove this Pending Request? Disapproved Account will be deleted and no longer
                                usable</h4>
                        </div>
                        <div class="column is-6 has-text-centered">
                            <button class="button is-normal">CONFIRM</button>
                        </div>
                        <div class="column is-6 has-text-centered">
                            <button class="button is-normal">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- for reports modals--}}
    <div id="dashboard-pending-report-view-modal" class="animated fadeIn">
        <div class="columns is-multiline is-centered is-mobile">
            <div class="column is-12">
                <div class="columns is-multiline is-centered is-mobile">
                    <div class="column is-12">
                        <div class="columns is-multiline is-centered is-desktop"></div>
                    </div>
                    <div class="column is-12">
                        <div class="columns is-multiline is-centered is-desktop"></div>
                    </div>
                    <div class="column is-12">
                        <div class="columns is-multiline is-centered is-desktop"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dashboard-pending-report-approve-modal" class="animated fadeIn">
        <div class="columns is-multiline is-centered is-mobile">
            <div class="column is-12">
                <div class="columns is-multiline is-centered is-desktop">

                </div>
            </div>
        </div>
    </div>

    <div id="dashboard-pending-report-disapprove-modal" class="animated fadeIn">
        <div class="columns is-multiline is-centered is-mobile">
            <div class="column is-12">
                <div class="columns is-multiline is-centered is-desktop">

                </div>
            </div>
        </div>
    </div>
    {{--end of modals --}}
    <div class="columns is-centered is-mobile">
        <div class="modal-card is-column is-10" id="pending-modal-card">
            <header class="modal-card-head modalheader">
                <p class="modal-card-title is-size-6 is-dark">Pending Approval</p>
                <button class="delete is-small" id="pending-close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <nav class="panel">
                    <div class="panel-tabs">
                        <a class="is-active modal-page-link dashboard-pending-data animated fadeIn">Accounts</a>
                        <a class="modal-page-link dashboard-pending-data animated fadeIn">Reports</a>
                    </div>
                    <a class="panel-block is-active columns is-mobile is-centered">
                        <div class="table-container column is-12">
                            <table class="table is-bordered is-hoverable is-fullwidth">

                                <!--
                                    <th class="has-text-centered is-size-7">#</th>
                                    <th class="has-text-centered is-size-7">USERNAME</th>
                                    <th class="has-text-centered is-size-7">ROLE</th>
                                    <th class="has-text-centered is-size-7">STATUS</th>
                                    <th colspan="3" class="has-text-centered is-size-7">OPTIONS</th>
                                -->

                                <!--
                                    <th class="has-text-centered is-size-7">#</th>
                                    <th class="has-text-centered is-size-7">REPORT TYPE</th>
                                    <th class="has-text-centered is-size-7">REPORT NAME</th>
                                    <th class="has-text-centered is-size-7">REPORT DESC.</th>
                                    <th class="has-text-centered is-size-7">UPLOADED BY</th>
                                    <th class="has-text-centered is-size-7">UPLOADED DATE</th>
                                    <th colspan="3" class="has-text-centered is-size-7">OPTIONS</th>
                                -->
                                <thead>
                                    <tr id="pending-dashboard-pagination-header">

                                    </tr>
                                </thead>
                                <tbody id="pending-dashboard-pagination-body">
                                </tbody>
                            </table>
                        </div>
                        <nav class="pagination is-small" role="navigation" aria-label="pagination">
                            <a class="pagination-previous" id="dashboard-pagination-prev" disabled>Previous</a>
                            <a class="pagination-next" id="dashboard-pagination-next" disabled>Next</a>
                            <ul class="pagination-list" id="dashboard-pending-page-numbers">
                                <!--
                                <li>
                                    <a class="pagination-link is-current is-danger">1</a>
                                </li>
                                <li>
                                    <a class="pagination-link">2</a>
                                </li>
                                <li>
                                    <a class="pagination-link">3</a>
                                </li>
                                -->
                            </ul>
                        </nav>
                    </a>
                </nav>
            </section>
        </div>
    </div>
</div>