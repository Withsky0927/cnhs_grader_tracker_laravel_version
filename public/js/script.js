"use strict";
(() => {
    // "http://localhost:5000/register"
    // "submit"
    // event type submit
    // "post"
    // event handler "#registrationform"

    function forMultipartForm(method, url, eventhandler, eventType) {
        const ajaxRequest = new XMLHttpRequest();
        const data = document.querySelector(eventhandler);
        registrationform.addEventListener(
            eventType,
            function(e) {
                e.preventDefault();
                ajaxRequest.open(method, $url, true);
                ajaxRequest.send(new FormData(data));
            },
            false
        );
    }

    function forUrlEncodedConfirmationForm(
        method,
        url,
        eventhandler,
        eventType,
        data
    ) {
        const ajaxRequest = new XMLHttpRequest();
        let Data = data;
        registrationform.addEventListener(
            eventType,
            function(e) {
                e.preventDefault();
                ajaxRequest.open(method, $url, true);
                ajaxRequest.setRequestHeader(
                    "Content-Type",
                    "application/x-www-form-urlencoded"
                );
                ajaxRequest.send(`confirmation=${data}`);
            },
            false
        );
    }

    function RegistrationForm() {
        // compute birthday
        const getAge = function(dateString) {
            let today = new Date();
            let birthDate = new Date(dateString);
            let age = today.getFullYear() - birthDate.getFullYear();
            let m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age;
        };

        // get yyyymmdd
        const getBirthday = function() {
            const fullBday = document.querySelectorAll(".bday");
            const year = document.querySelector("#year");
            const month = document.querySelector("#month");
            const day = document.querySelector("#day");
            const age = document.querySelector("#age");

            const BirthdayValues = () => {
                const yearValue = year.options[year.selectedIndex].value;
                const monthValue = month.options[month.selectedIndex].value;
                const dayValue = day.options[day.selectedIndex].value;
                let Age = 0;

                if (
                    yearValue !== "" &&
                    yearValue !== "Year" &&
                    monthValue !== "" &&
                    monthValue !== "Month" &&
                    dayValue !== "" &&
                    dayValue !== "Day"
                ) {
                    const birthday = `${yearValue}/${monthValue}/${dayValue}`;
                    console.log(birthday);
                    Age = parseInt(getAge(birthday));
                } else {
                    return false;
                }
                age.value = Age + 0;
            };

            for (let i = 0, index = fullBday.length; i < index; i++) {
                fullBday[i].addEventListener("change", BirthdayValues, false);
            }
        };

        // get the year - from 1950 to present
        const CreateYear = function() {
            const year = document.querySelector("#year");
            let allDate = "";
            const currentYear = new Date().getFullYear();
            for (
                let yearCompute = 1949;
                yearCompute <= currentYear;
                yearCompute++
            ) {
                let option = document.createElement("option");
                if (yearCompute === 1949) {
                    option.setAttribute("selected", "");
                    option.setAttribute("disabled", "");
                    option.innerText = "Year";
                    allDate += option.outerHTML + "\n";
                } else {
                    option.setAttribute("value", yearCompute);
                    option.innerText = yearCompute;
                    allDate += option.outerHTML + "\n";
                }
            }
            year.innerHTML += allDate;
            getBirthday();
        };

        const checkForProfilePic = function() {
            const profilePic = document.querySelector("#profile_picture");
            let width = "";

            if (innerWidth in window && innerHeight in window) {
                width = window.innerWidth;
                if (width <= 1023) {
                    profilePic.classList.add("is-medium");
                    profilePic.classList.remove("is-small");
                    profilePic.classList.add("is-centered");
                } else if (width >= 1024) {
                    profilePic.classList.add("is-small");
                    profilePic.classList.remove("is-medium");
                    profilePic.classList.add("is-remove");
                }
            } else {
                if (
                    document.documentElement &&
                    (document.documentElement.clientWidth ||
                        document.documentElement.clientHeight)
                ) {
                    width = document.documentElement.clientWidth;
                    if (width <= 1023) {
                        profilePic.classList.add("is-medium");
                        profilePic.classList.remove("is-small");
                        profilePic.classList.add("is-centered");
                    } else if (width >= 1024) {
                        profilePic.classList.add("is-small");
                        profilePic.classList.remove("is-medium");
                        profilePic.classList.add("is-remove");
                    }
                } else {
                    if (
                        document.body &&
                        (document.body.clientWidth ||
                            document.body.clientHeight)
                    ) {
                        width = document.body.clientWidth;
                        if (width <= 1023) {
                            profilePic.classList.add("is-medium");
                            profilePic.classList.remove("is-small");
                            profilePic.classList.add("is-centered");
                        } else if (width >= 1024) {
                            profilePic.classList.add("is-small");
                            profilePic.classList.remove("is-medium");
                            profilePic.classList.add("is-remove");
                        }
                    }
                }
            }
        };

        const fileUploadName = function() {
            const fileInput = document.querySelectorAll("input[type=file]");
            const putFileName = function(e) {
                if (e.target.files.length > 0) {
                    const Filename = document.querySelectorAll(".file-name");
                    const profilePic = document.querySelectorAll(
                        ".profile-pic"
                    );
                    for (let j = 0, indexj = Filename.length; j < indexj; j++) {
                        Filename[j].innerText = e.target.files[j].name;
                    }
                }
            };

            for (let i = 0, index = fileInput.length; i < index; i++) {
                fileInput[i].addEventListener("change", putFileName, false);
            }
            window.addEventListener("resize", checkForProfilePic, false);
        };

        /*ajaxCall data */

        CreateYear();
        fileUploadName();
        //forMultipartForm("post", "http://localhost:5000/register", "#registrationform" , "submit");
    }

    const ConfirmationForm = () => {
        const ConfirmationButton = document.querySelector("#hidesubmitconfirm");
        const ConfirmationInput = document.querySelector("#confirmationinput");
        const checkConfirmationValue = function(event) {
            if (event.target.value.length === 6) {
                ConfirmationButton.click();
            }
        };
        if (ConfirmationInput) {
            ConfirmationInput.addEventListener(
                "keyup",
                checkConfirmationValue,
                false
            );
        }
    };

    const ForGotPasswordConfirmation = () => {
        const ConfirmationForgotInput = document.querySelector(
            "#forgotconfirmationinput"
        );
        const hidesubmitforgotconfirm = document.querySelector(
            "#hidesubmitforgotconfirm"
        );
        const checkForgotConfirmationValue = function(event) {
            if (event.target.value.length === 6) {
                alert("Hello World");
            }
        };
        if (ConfirmationForgotInput) {
            ConfirmationForgotInput.addEventListener(
                "keyup",
                checkForgotConfirmationValue,
                false
            );
        }
    };

    // check for pages

    if (document.querySelector("#registrationform")) {
        RegistrationForm();
    } else if (document.querySelectorAll(".resendForm")) {
        ConfirmationForm();
    } else if (document.querySelectorAll(".resendConfirmForm")) {
        ForGotPasswordConfirmation();
    }
})();