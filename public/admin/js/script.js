function toggleBurger() {
    document.addEventListener("DOMContentLoaded", () => {
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(
            document.querySelectorAll(".navbar-burger"),
            0
        );

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {
            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener("click", () => {
                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle("is-active");
                    $target.classList.toggle("is-active");
                });
            });
        }
    });
}

function setcsrfToken() {
    if (window.axios) {
        window.axios.defaults.headers.common = {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    }
}

// Dashboard Module Javascript
function dashBoardModule() {
    // for all data that has been sent

    const getUsersAccountsCountData = async () => {
        let userCount = 0;
        const userCountElement = document.querySelector("#userscount");
        const axiosOptionsforUsersCount = {
            url: "/admin/dashboard/users",
            method: "get",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json;charset=UTF-8"
            }
        };
        try {
            let responseData = await axios(axiosOptionsforUsersCount);
            userCount = responseData.data;
            userCountElement.textContent = userCount.userscount;
        } catch (error) {
            console.log(error);
        }
        //userCount.innerText = userCount;
    };

    // add data in here
    const getPendingsCountData = () => {
        const pendingCount = document.querySelector("#pendingcount");
        const pendingNotification = document.querySelector(
            "#pendingnotification"
        );
        const clippedModifier = document.querySelector("#clippedmodifier");
        const pendingModal = document.querySelector("#pendingmodal");
        const closePendingModal = document.querySelector("#pending-close");

        const getPendingCount = async () => {
            const axiosOptonsForPendingCount = {
                url: "/admin/dashboard/pending",
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const result = await axios(axiosOptonsForPendingCount);
                const responseData = result.data.pending_count;
                if (!responseData) {
                    pendingCount.textContent = 0;
                } else if (responseData) {
                    pendingCount.textContent = responseData;
                }
            } catch (error) {
                console.log(error);
            }
        };

        // show Pending modal in here
        const showPendingModal = () => {
            clippedModifier.setAttribute("class", "is-clipped");
            pendingModal.classList.add("is-active");
            pendingModal.classList.add("animated");
            pendingModal.classList.add("fadeIn");
        };

        const removePendingModal = () => {
            clippedModifier.removeAttribute("class");
            pendingModal.classList.remove("is-active");
            pendingModal.classList.remove("fadeIn");
        };

        // all dataManipulation
        getPendingCount();

        // initialize all pending modal eventss
        pendingNotification.addEventListener("click", showPendingModal, false);
        closePendingModal.addEventListener("click", removePendingModal, false);
    };

    const getNotifyCountData = () => {
        const notifyCount = document.querySelector("#notifycount");
        notifyCount.textContent = 0;
    };

    const getGraduateGraphData = async () => {
        let GraduatesData;
        let abm = 0;
        let stem = 0;
        let tvl = 0;
        let humss = 0;
        let artsScience = 0;
        let gas = 0;

        // initialize Graduate Chart
        const addGraduateChart = (
            stemData,
            abmData,
            gasData,
            tvlData,
            humssData,
            artsScienceData
        ) => {
            let year = new Date();
            let previousYear = year.getFullYear() - 1;
            let currentYear = year.getFullYear();
            const graduatesCanvas = document
                .querySelector("#graduatechart")
                .getContext("2d");
            const graduatesChart = new Chart(graduatesCanvas, {
                type: "bar",
                data: {
                    labels: ["ABM", "GAS", "HUMSS", "ARTS", "TVL", "STEM"],
                    datasets: [
                        {
                            label: "",
                            data: [
                                abmData,
                                gasData,
                                humssData,
                                artsScienceData,
                                tvlData,
                                stemData
                            ],
                            backgroundColor: [
                                "rgb(255, 99, 132)",
                                "rgb(54, 162, 235)",
                                "rgb(255, 206, 86)",
                                "rgb(75, 192, 192)",
                                "rgb(153, 102, 255)",
                                "rgb(255, 159, 64)"
                            ],
                            borderColor: [
                                "rgba(255, 99, 132, 1)",
                                "rgba(54, 162, 235, 1)",
                                "rgba(255, 206, 86, 1)",
                                "rgba(75, 192, 192, 1)",
                                "rgba(153, 102, 255, 1)",
                                "rgba(255, 159, 64, 1)"
                            ],
                            borderWidth: 3
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }
                        ]
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: "#000",
                            defaultFontFamily:
                                "'Open Sans','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                            defaultFontSize: 3,
                            defaultFontStyle: "normal"
                        }
                    },
                    title: {
                        display: true,
                        text: `Graduates: ${previousYear} - ${currentYear}`,
                        position: "top"
                    }
                }
            });
        };

        const axiosOptonsForGraduates = {
            url: "/admin/dashboard/graduates",
            method: "get",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json;charset=UTF-8"
            }
        };

        try {
            let responseData = await axios(axiosOptonsForGraduates);
            const graduateChartCanvasStyle = document.querySelector(
                "#graduatechart"
            );
            const graduateCanvasContainer = document.querySelectorAll(
                ".canvascontainer"
            )[0];
            GraduatesData = responseData.data;
            stem = GraduatesData.studentCounts.stem;
            abm = GraduatesData.studentCounts.abm;
            gas = GraduatesData.studentCounts.gas;
            tvl = GraduatesData.studentCounts.tvl;
            humss = GraduatesData.studentCounts.humss;
            artsScience = GraduatesData.studentCounts.arts_science;

            // get data in all graduates

            addGraduateChart(stem, abm, gas, tvl, humss, artsScience);
            graduateChartCanvasStyle.style.backgroundColor = "#fff";
            graduateCanvasContainer.style.boxShadow = "0px 0px 2px #000";
        } catch (error) {
            console.log(error);
        }
    };

    const getEmploymentStatusData = async () => {
        let EmploymentData;

        let waiting = 0;
        let employed = 0;
        let unemployed = 0;

        const addEmploymentChart = (
            waitingData,
            employedData,
            unemployedData
        ) => {
            const employmentCanvas = document
                .querySelector("#employmentchart")
                .getContext("2d");

            const employmentChart = new Chart(employmentCanvas, {
                type: "pie",

                data: {
                    labels: ["Waiting", "Employed", "Unemployed"],
                    datasets: [
                        {
                            label: "",
                            data: [waitingData, employedData, unemployedData],
                            backgroundColor: [
                                "rgb(255, 99, 132)",
                                "rgb(54, 162, 235)",
                                "rgb(255, 206, 86)"
                            ],
                            borderColor: [
                                "rgba(255, 99, 132, 1)",
                                "rgba(54, 162, 235, 1)",
                                "rgba(255, 206, 86, 1)"
                            ],
                            borderWidth: 3,
                            borderColor: "#fff"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    cutoutPercentage: 0,
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: "#000",
                            defaultFontFamily:
                                "'Open Sans','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                            defaultFontSize: 3,
                            defaultFontStyle: "normal"
                        }
                    },
                    title: {
                        display: true,
                        text: `Employment Status`,
                        position: "top"
                    }
                }
            });
        };

        const axiosOptonsForEmployment = {
            url: "/admin/dashboard/status",
            method: "get",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json;charset=UTF-8"
            }
        };

        try {
            let responseData = await axios(axiosOptonsForEmployment);
            const employmentChartCanvasStyle = document.querySelector(
                "#employmentchart"
            );
            const employmentCanvasContainer = document.querySelectorAll(
                ".canvascontainer"
            )[1];
            EmploymentData = responseData.data;

            //put data in place for graph usage
            waiting = EmploymentData.status.waiting;
            employed = EmploymentData.status.employed;
            unemployed = EmploymentData.status.unemployed;

            addEmploymentChart(waiting, employed, unemployed);
            employmentChartCanvasStyle.style.backgroundColor = "#fff";
            employmentCanvasContainer.style.boxShadow = "0px 0px 2px #000";
        } catch (error) {
            console.log(error);
        }
    };

    getUsersAccountsCountData();
    getPendingsCountData();
    getNotifyCountData();
    getGraduateGraphData();
    getEmploymentStatusData();
}

/* for */
function graduatesModule() {
    const graduatesData = document.querySelector("#graduates-data");
    //const graduateViewButton = document.querySelectorAll(".grad-view-button");
    const gradPaginationList = document.querySelector(
        "#graduates-pagination-list"
    );

    const gradtabledata = document.querySelector("#graduates-data");

    // page next and prev
    const paginateNext = document.querySelector("#paginate-next");
    const paginatePrev = document.querySelector("#paginate-prev");

    let GraaduatesAxiosOption = {
        url: "/admin/graduates/pages",
        method: "get",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json;charset=UTF-8"
        }
    };

    const loadInitialPagination = async () => {
        const response = await axios(GraaduatesAxiosOption);
        const PaginationData = response.data.page_url;
        let datatotal = PaginationData.total;
        let perpage = PaginationData.per_page;
        let data = PaginationData.data;
        let htmlData = "";
        let dataCount = 1;
        let pageNextAndPrev = 1;

        const checkNextAndPrevNumber = () => {
            if (pageNextAndPrev <= 1) {
                paginatePrev.setAttribute("disabled", "");
                paginateNext.removeAttribute("disabled");
                pageNextAndPrev = 1;
            } else if (pageNextAndPrev >= datatotal / 10) {
                paginatePrev.removeAttribute("disabled");
                paginateNext.setAttribute("disabled", "true");
                if (pageNextAndPrev == datatotal / 10) {
                    pageNextAndPrev = datatotal / 10;
                } else if (
                    pageNextAndPrev >= 1 &&
                    pageNextAndPrev > datatotal % 10
                ) {
                    pageNextAndPrev = pageNextAndPrev - 1;
                }
            }
        };

        // set style on next and previous page number box

        const SetPaginatePageOnNextPrev = () => {
            const paginationsLink = document.querySelectorAll(
                ".pagination-link"
            );
            let paginationLinkIndex = 0;
            for (let i = 0, index = paginationsLink.length; i < index; i++) {
                paginationsLink[i].classList.remove("is-current");
            }

            if (pageNextAndPrev > 1) {
                paginationLinkIndex = pageNextAndPrev;
                paginationLinkIndex = paginationLinkIndex - 1;
            }

            paginationsLink[paginationLinkIndex].classList.add("is-current");
        };

        const viewGradPaginationData = () => {
            const viewGradButtton = document.querySelectorAll(".view-grad");
            const graduatesModal = document.querySelector("#graduates-modal");
            const graduatesClose = document.querySelector(
                "#graduates-modal-close"
            );
            const htmlClipped = document.querySelector("#clippedmodifier");

            const insertStudentViewData = data => {
                const gradLRN = document.querySelector("#graduate-lrn");
                const gradStrand = document.querySelector("#graduate-strand");
                const gradFirstname = document.querySelector(
                    "#graduate-firstname"
                );
                const gradMiddlename = document.querySelector(
                    "#graduate-middlename"
                );
                const gradLastname = document.querySelector(
                    "#graduate-lastname"
                );
                const gradAddress = document.querySelector("#graduate-address");
                const gradBirthDay = document.querySelector(
                    "#graduate-birthday"
                );
                const gradAge = document.querySelector("#graduate-age");
                const gradGender = document.querySelector("#graduate-gender");
                const gradCivilStatus = document.querySelector(
                    "#graduate-civil-status"
                );
                const gradStatus = document.querySelector("#graduate-status");

                gradLRN.textContent = data.lrn;
                gradStrand.textContent = data.strand;
                gradFirstname.textContent = data.firstname;
                gradMiddlename.textContent = data.middlename;
                gradLastname.textContent = data.lastname;
                gradAddress.textContent = data.address;
                gradBirthDay.textContent = data.birthday;
                gradAge.textContent = data.age;
                gradGender.textContent = data.gender;
                gradCivilStatus.textContent = data.civil_status;
                gradStatus.textContent = data.status;
            };
            const removeModalContainer = () => {
                graduatesModal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
            };
            const showModalContainer = () => {
                graduatesModal.classList.add("is-active");
                htmlClipped.classList.add("is-clipped");

                graduatesClose.addEventListener(
                    "click",
                    removeModalContainer,
                    false
                );
            };
            const setViewModal = async e => {
                const LRNView = parseInt(e.target.getAttribute("id"));

                let reponseViewData = "";

                const getStudentView = {
                    url: `/admin/graduates/view/student?lrn=${LRNView}`,
                    method: "get",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json;charset=UTF-8"
                    }
                };

                try {
                    reponseViewData = await axios(getStudentView);
                    viewData = reponseViewData.data;

                    insertStudentViewData(viewData.view_graduate);
                    showModalContainer();
                } catch (error) {
                    console.log(error);
                }
            };
            for (let i = 0, index = viewGradButtton.length; i < index; i++) {
                viewGradButtton[i].addEventListener(
                    "click",
                    setViewModal,
                    false
                );
            }
        };

        // initialize the first page
        checkNextAndPrevNumber();
        const fillEmptyTable = () => {
            if (gradtabledata.childElementCount < 10) {
                let remainder = datatotal % 10;
                let emptyTd = "";
                for (let j = 0; j <= 10; j++) {
                    if (remainder == 10) {
                        break;
                    } else if (remainder < 10) {
                        emptyTd = `
                                    <tr>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                        <td class="data-style has-text-centered">
                                            <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                        </td>
                                    </tr>
                                `;
                        gradtabledata.insertAdjacentHTML("beforeend", emptyTd);
                    }
                    remainder = remainder + 1;
                }
            }
            const dataStyle = document.querySelectorAll(".data-style");
            for (let i = 0, index = dataStyle.length; i < index; i++) {
                dataStyle[i].style.color = "black";
                if (dataStyle[i].textContent === "*") {
                    dataStyle[i].style.color = "#fff";
                }
            }
        };

        const loadFirstPagination = () => {
            for (let i = 0, index = PaginationData.to; i < index; i++) {
                htmlData += `<tr>
                                    <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].lrn}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].strand}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].firstname}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].middlename}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].lastname}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].address}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].birthday}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].age}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].gender}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].civil_status}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].status}</td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].lrn}" class="button is-small is-success view-grad">View</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            gradtabledata.innerHTML = htmlData;
            fillEmptyTable();
            viewGradPaginationData();
        };

        // load
        const loadPaginationPage = () => {
            let divquotient = Math.floor(datatotal / 10);
            let remainder = datatotal % 10;
            let count = divquotient;
            let pageElement = "";
            let pageCount = 1;
            if (remainder > 0) {
                count = count + 1;
            }

            for (let i = 0; i < count; i++) {
                if (i == 0) {
                    pageElement += `<li>
                                    <a class="pagination-link is-current">${pageCount}</a>
                                </li>`;
                } else if (i > 0) {
                    pageElement += `<li>
                                <a class="pagination-link">${pageCount}</a>
                            </li>`;
                }
                pageCount = pageCount + 1;
            }
            gradPaginationList.innerHTML = pageElement;
        };

        const loadSelectedPagination = () => {
            const paginationLink = document.querySelectorAll(
                ".pagination-link"
            );

            const removeIsCurrentClass = () => {
                for (let i = 0, index = paginationLink.length; i < index; i++) {
                    paginationLink[i].classList.remove("is-current");
                }
            };

            const loadPagePerClick = async event => {
                // revert and add current data
                pageNextAndPrev = parseInt(event.target.textContent);
                checkNextAndPrevNumber();
                removeIsCurrentClass();
                event.target.classList.add("is-current");

                let responseData = "";
                let pageData = "";
                let perPage = 0;
                let total = 0;

                const perPageAxiosOption = {
                    url: `/admin/graduates/pages?page=${pageNextAndPrev}`,
                    method: "get",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json;charset=UTF-8"
                    }
                };

                responseData = await axios(perPageAxiosOption);
                PagePerdata = responseData.data.page_url;
                data = PagePerdata.data;
                total = PagePerdata.total;
                pagePage = PagePerdata.per_page;
                htmlData = "";
                dataCount = 1;
                let index = 10;
                if (PagePerdata.to % 10 != 0) {
                    index = PagePerdata.to % 10;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].lrn}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].strand}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].firstname}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].middlename}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].lastname}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].address}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].birthday}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].age}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].gender}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].civil_status}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].status}</td>
                                        <td class="has-text-centered">
                                            <a id="${data[i].lrn}" class="button is-small is-success view-grad">View</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                gradtabledata.innerHTML = htmlData;

                fillEmptyTable();
                viewGradPaginationData();
            };

            for (let x = 0, index = paginationLink.length; x < index; x++) {
                paginationLink[x].addEventListener(
                    "click",
                    loadPagePerClick,
                    false
                );
            }
        };

        const loadGradNextPage = () => {
            const setNextPage = async e => {
                pageNextAndPrev += 1;
                checkNextAndPrevNumber();

                const setNextAxiosOpt = {
                    url: `/admin/graduates/pages?page=${pageNextAndPrev}`,
                    method: "get",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json;charset=UTF-8"
                    }
                };

                const nextResponseData = await axios(setNextAxiosOpt);
                const nextPageData = nextResponseData.data.page_url;
                const nextTotal = nextPageData.total;
                const nextPage = nextPageData.per_page;
                const nextTo = nextPageData.to;
                const nextData = nextPageData.data;

                htmlData = "";
                dataCount = 1;
                let index = 10;
                if (nextTo % 10 != 0) {
                    index = nextTo % 10;
                }
                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].lrn}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].strand}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].firstname}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].middlename}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].lastname}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].address}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].birthday}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].age}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].gender}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].civil_status}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].status}</td>
                                        <td class="has-text-centered">
                                            <a id="${nextData[i].lrn}" class="button is-small is-success view-grad">View</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                gradtabledata.innerHTML = htmlData;

                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewGradPaginationData();
            };

            paginateNext.addEventListener("click", setNextPage, false);
        };

        const loadGradPrevPage = () => {
            const setPrevPage = async e => {
                pageNextAndPrev -= 1;
                checkNextAndPrevNumber();

                const setPreviousAxiosOpt = {
                    url: `/admin/graduates/pages?page=${pageNextAndPrev}`,
                    method: "get",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json;charset=UTF-8"
                    }
                };

                const prevResponseData = await axios(setPreviousAxiosOpt);
                const prevPageData = prevResponseData.data.page_url;
                const prevTotal = prevPageData.total;
                const prevPage = prevPageData.per_page;
                const prevTo = prevPageData.to;
                const prevData = prevPageData.data;

                htmlData = "";
                dataCount = 1;

                let index = 10;
                if (prevTo % 10 != 0) {
                    index = prevTo % 10;
                }
                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].lrn}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].strand}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].firstname}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].middlename}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].lastname}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].address}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].birthday}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].age}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].gender}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].civil_status}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].status}</td>
                                        <td class="has-text-centered">
                                            <a id="${prevData[i].lrn}" class="button is-small is-success view-grad">View</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                gradtabledata.innerHTML = htmlData;
                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewGradPaginationData();
            };
            paginatePrev.addEventListener("click", setPrevPage, false);
        };

        const loadSearchPagination = () => {};

        loadFirstPagination();
        loadPaginationPage();
        loadGradNextPage();
        loadGradPrevPage();

        loadSearchPagination();
        loadSelectedPagination();
    };

    loadInitialPagination();
}

function AccountsModule() {}

function checkIfPageExist() {
    if (window.location.pathname === "/admin/dashboard") {
        dashBoardModule();
    }
    // graduates module
    if (window.location.pathname === "/admin/graduates") {
        graduatesModule();
    }

    // check if inside of accounts module
    if (window.location.pathname === "/admin/accounts/admin") {
    } else if (window.location.pathname === "/admin/accounts/student") {
    }
}

toggleBurger();
setcsrfToken();
checkIfPageExist();
