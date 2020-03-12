/**
 *  File: profileinfo.js
 *  Author: George David Withmore
 *
 *  Description: This code will handle all the following functionality
 *      A. Showing and closing Profile information view and edit form.
 *      B. will get and edit exisiting data from login user account.
 */

"use strict";

(() => {
    const profileInfoModule = () => {
        const html = document.getElementsByTagName("html")[0];

        const profileLink = document.querySelector("#edit-profile-modal-link");
        /* dom manipulation variable for all modal */
        const mainProfileModal = document.querySelector("#profile-info-modal");
        const updateProfileModal = document.querySelector(
            "#profile-update-modal"
        );
        const discardProfileModal = document.querySelector(
            "#discard-profile-modal"
        );
        const confirmUpdateProfileModal = document.querySelector(
            "#confirm-profile-modal"
        );

        /* main profile info form field dom manipulation variables */
        const existEmail = document.querySelector("#show-profile-email");
        const existPhone = document.querySelector("#show-profile-number");
        const existProfilePic = document.querySelector("#show-profile-pic");
        const existUsername = document.querySelector("#show-profile-username");

        const updateEmail = document.querySelector("#update-profile-email");
        const updatePhone = document.querySelector("#update-profile-number");
        const updateprofilePic = document.querySelector("#update-profile-pic");
        const updateUsername = document.querySelector(
            "#update-profile-username"
        );

        const cancelProfileUpdateModal = document.querySelector(
            "#cancel-profile-update"
        );

        const updateProfileForm = document.querySelector(
            "#update-profile-form"
        );

        let responseData;
        let userID = "";

        const mainCloseBtnHandler = () => {
            html.classList.remove("is-clipped");
            mainProfileModal.classList.remove("is-active");
        };

        const submitUpdatedProfileData = event => {
            const confirmUpdateButton = document.querySelector(
                "#confirm-profile-update"
            );
            const cancelConfirmUpdateButton = document.querySelector(
                "#cancel-confirm-profile-update"
            );
            event.preventDefault();

            const sendProfileInfoToDatabase = async () => {
                try {
                    responseData = await axios.patch(
                        `/admin/profile/account/${userID}`,
                        new FormData(updateProfileForm)
                    );
                    console.log(responseData);
                } catch (error) {
                    console.log(error.response);
                    console.log(error);
                }
            };

            const cancelProfileDBSubmittion = () => {
                confirmUpdateProfileModal.classList.remove("is-active");
            };
            const checkIfFormHasValue = () => {
                if (
                    updateEmail.value ||
                    updateUsername.value ||
                    updateprofilePic.value ||
                    updatePhone.value
                ) {
                    return true;
                }
                return false;
            };
            const showConfirmModal = () => {
                confirmUpdateProfileModal.classList.add("is-active");
                if (checkIfFormHasValue()) {
                    discardProfileModal.style.zIndex = 70;
                    confirmUpdateProfileModal.style.zIndex = 80;

                    confirmUpdateButton.addEventListener(
                        "click",
                        sendProfileInfoToDatabase,
                        false
                    );
                    cancelConfirmUpdateButton.addEventListener(
                        "click",
                        cancelProfileDBSubmittion,
                        false
                    );
                }
            };
            showConfirmModal();
        };

        const confirmCancelBtnHandler = event => {
            const continueDiscardButton = document.querySelector(
                "#discard-profile-update"
            );
            const cancelDiscardButton = document.querySelector(
                "#cancel-discard-profile-update"
            );

            /* 
                once edit form has value on it add event listener
                whether you like to erased it or not
            */
            const showDiscardModal = () => {
                //
                discardProfileModal.style.zIndex = 80;
                confirmUpdateProfileModal.style.zIndex = 70;

                discardProfileModal.classList.add("is-active");
                continueDiscardButton.addEventListener(
                    "click",
                    () => {
                        updateEmail.value = "";
                        updateUsername.value = "";
                        updatePhone.value = "";
                        updateprofilePic.value = "";
                        discardProfileModal.classList.remove("is-active");
                    },
                    false
                );
                cancelDiscardButton.addEventListener(
                    "click",
                    () => {
                        discardProfileModal.classList.remove("is-active");
                    },
                    false
                );
                return false;
            };

            if (
                updateUsername.value ||
                updateEmail.value ||
                updatePhone.value ||
                updateprofilePic.value
            ) {
                showDiscardModal();
            } else if (
                updateUsername.value === "" &&
                updateEmail.value === "" &&
                updatePhone.value === "" &&
                !updateprofilePic.value
            ) {
                updateProfileModal.classList.remove("is-active");
            }
        };

        const updateProfileInfo = event => {
            // submit edited form through backend
            updateProfileForm.addEventListener(
                "submit",
                submitUpdatedProfileData,
                false
            );
            // remove form for editing profilename if cancel has been clicked
            cancelProfileUpdateModal.addEventListener(
                "click",
                confirmCancelBtnHandler,
                false
            );

            // show edit form modal
            updateProfileModal.classList.add("is-active");
        };

        const showProfileInfo = event => {
            userID = event.target.getAttribute("data-userid");
            console.log(userID);
            const updateProfileBtn = document.querySelector(
                "#update-profile-info-button"
            );
            const profileInfoCloseBtn = document.querySelector(
                "#main-profile-close-btn"
            );

            // populate profile inform form field with existing data
            const populateDefaultProfile = data => {
                existUsername.value = data.username;
                existEmail.value = data.email;
                existPhone.value = data.phone;
                existProfilePic.src = "sasas";
                existProfilePic.alt = "asasas";
                html.classList.add("is-clipped");
                mainProfileModal.classList.add("is-active");
            };

            // get old profile information data from from backend
            const fetchProfileInfoData = async id => {
                try {
                    responseData = await axios.get(
                        `/admin/profile/account?id=${id}`
                    );
                    // pass the data from  populateDefaultPRofile function for processing

                    populateDefaultProfile(responseData.data.profile_data[0]);
                } catch (error) {
                    console.log(error);
                }
            };

            // fetch profileinfo data
            fetchProfileInfoData(userID);

            // close profile information form when close button has been clicked
            profileInfoCloseBtn.addEventListener(
                "click",
                mainCloseBtnHandler,
                false
            );

            // call updateProfileInfo event handler when edit button has been clicked
            updateProfileBtn.addEventListener(
                "click",
                updateProfileInfo,
                false
            );
        };

        // call showProfile Info event handler when Edit Profile link has been clicked
        profileLink.addEventListener("click", showProfileInfo, false);
    };

    // initialize all profile information modal events and behavior
    profileInfoModule();
})();
