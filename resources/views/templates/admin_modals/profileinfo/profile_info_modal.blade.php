{{--  submodal for profileinfo --}}
<div class="modal animated fadeIn" id="discard-profile-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head profile-update-head">
            <p class="modal-card-title is-size-6">Discard Changes</p>
        </header>
        <section class="modal-card-body">
            <div class="columns is-multiline is-mobile">
                <div class="column is-12">
                    <p class="has-text-centered">Discard Changes? so the old information will remain the same.</p>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-small is-success is-size-7" id="discard-profile-update">Discard</button>
            <button class="button is-small is-size-7" id="cancel-discard-profile-update">Cancel</button>
        </footer>
    </div>
</div>
<div class="modal animated fadeIn" id="confirm-profile-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head profile-update-head">
            <p class="modal-card-title is-size-6">Confirm Changes</p>
        </header>
        <section class="modal-card-body">
            <div class="columns is-multiline is-mobile">
                <div class="column is-12">
                    <p class="has-text-centered">Confirm Changes? changes cannot be undone!</p>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-small is-success is-size-7" id="confirm-profile-update">Confirm</button>
            <button class="button is-small is-size-7" id="cancel-confirm-profile-update">Cancel</button>
        </footer>
    </div>
</div>

<div class="modal animated fadeIn" id="profile-update-modal">
    <div class="modal-background"></div>
    <div class="modal-card" id="profile-update-card">
        <header class="modal-card-head profile-update-head">
            <p class="modal-card-title is-size-6">Update Profile Information</p>
        </header>
        <form method="post" autocomplete="off" enctype="multipart/form-data" name="update-profile-form"
            id="update-profile-form">
            @method('PATCH')
            <section class="modal-card-body">
                <div class="columns is-multiline is-mobile">
                    <div class="column is-12">
                        <div class="columns is-multiline is-12 is-tablet">
                            <div class="column is-12" id="second-update-profile-column">
                                <div class="columns is-multiline is-tablet">
                                    <div class="column is-6">
                                        <div class="field">
                                            <label class="label is-size-7" for="update-profile-pic">Profile
                                                Picture</label>
                                            <div id="file-js-example" class="file has-name">
                                                <label class="file-label">
                                                    <input class="file-input" type="file"
                                                        accept=".jpg ,.png , .jpeg , .JPG , .JPEG"
                                                        id="update-profile-pic" name="profile_pic">
                                                    <span class="file-cta">
                                                        <span class="file-icon">
                                                            <i class="fas fa-upload"></i>
                                                        </span>
                                                        <span class="file-label">
                                                            Upload a Photo..
                                                        </span>
                                                    </span>
                                                    <span class="file-name">
                                                        No Photo uploaded
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label is-size-7"
                                                for="update-profile-username">Username</label>
                                            <div class="control">
                                                <div class="control has-icons-left has-icons-right">
                                                    <input class="input" maxlength="50" type="text"
                                                        id="update-profile-username" name="username">
                                                    <span class="icon is-small is-left">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12" id="third-update-profile-column">
                                <div class="columns is-multiline is-tablet">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label is-size-7" for="update-profile-email">Email</label>
                                            <div class="control">
                                                <div class="control has-icons-left has-icons-right">
                                                    <input class="input" maxlength="150" type="text"
                                                        id="update-profile-email" name="email">
                                                    <span class="icon is-small is-left">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <label class="label is-size-7" for="update-profile-number">Phone:</label>
                                            <div class="control">
                                                <div class="control has-icons-left has-icons-right">
                                                    <input class="input" type="text" id="update-profile-number"
                                                        name="phone">
                                                    <span class="icon is-small is-left">
                                                        <i class="fas fa-mobile"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button type="submit" class="button is-small is-success is-size-7">Confirm</button>
                <div class="button is-small is-size-7" id="cancel-profile-update">Cancel</div>
            </footer>
        </form>
    </div>
</div>

<div class="modal animated fadeIn" id="profile-info-modal">
    <div class="modal-background"></div>
    <div class="modal-card" id="profile-info-card">
        <header class="modal-card-head profile-update-head">
            <p class="modal-card-title is-size-6">Profile Information</p>
            <button class="delete is-small" id="main-profile-close-btn" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="columns is-multiline is-centered is-mobile">
                <div class="column is-12">
                    <div class="columns is-multiline is-12 is-tablet">
                        <div class="column is-12" id="first-show-profile-column">
                            <div class="columns is-narrow is-multiline is-tablet">
                                <div class="column is-12">
                                    <div class="field">
                                        <div class="control has-text-centered">
                                            <img id="show-profile-pic" width="120px" height="120px"
                                                style="border:1px solid black">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12" id="second-show-profile-column">
                            <div class="columns is-multiline is-tablet">
                                <div class="column">
                                    <div class="field">
                                        <label class="label is-size-7" for="show-profile-username">Username</label>
                                        <div class="control">
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input" readonly type="text" id="show-profile-username">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label is-size-7" for="show-profile-email">Email</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" readonly type="email" id="show-profile-email">
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12" id="third-show-profile-column">
                            <div class="columns is-multiline is-tablet">
                                <div class="column is-6">
                                    <div class="field">
                                        <label class="label is-size-7" for="show-profile-number">Phone</label>
                                        <div class="control">
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input" readonly type="text" id="show-profile-number">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-mobile"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-info is-small is-size-7" id="update-profile-info-button"
                data-userid="{{session('user_id')}}" data-role="{{session('user_role')}}">Edit</button>
        </footer>
    </div>
</div>