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

    const getPendingsCountData = () => {
        const pendingCount = document.querySelector("#pendingcount");
        const pendingNotification = document.querySelector(
            "#pendingnotification"
        );
        const clippedModifier = document.querySelector("#clippedmodifier");
        const pendingModal = document.querySelector("#pendingmodal");
        const closePendingModal = document.querySelector("#pending-close");
        const pendingDataLink = document.querySelectorAll(
            ".dashboard-pending-data"
        );

        const PendingTableHeader = document.querySelector(
            "#pending-dashboard-pagination-header"
        );
        const paginationTableBody = document.querySelector(
            "#pending-dashboard-pagination-body"
        );

        const paginatePrev = document.querySelector(
            "#dashboard-pagination-prev"
        );
        const paginateNext = document.querySelector(
            "#dashboard-pagination-next"
        );

        let PageandNext = 1;

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

        const showPendingModal = () => {
            clippedModifier.setAttribute("class", "is-clipped");
            pendingModal.classList.add("is-active");
            pendingModal.classList.add("animated");
            pendingModal.classList.add("fadeIn");
        };

        // show Pending modal in here
        const removePendingModal = () => {
            clippedModifier.removeAttribute("class");
            pendingModal.classList.remove("is-active");
            pendingModal.classList.remove("fadeIn");
        };

        const viewPendingAccountDetailModal = () => {
            const viewPendingAccount = document.querySelectorAll(
                ".view-pending-account"
            );
            const approveIndex = viewPendingAccount.length;
            const vieModal = document.querySelector(
                "#dashboard-pending-account-view-modal"
            );

            const showViewPendingModal = () => {
                vieModal.style.display = "block";
            };

            for (let i = 0; i < approveIndex; i++) {
                viewPendingAccount[i].addEventListener(
                    "click",
                    showViewPendingModal,
                    false
                );
            }
        };

        const approveAccountModal = () => {
            let approveID;
            const approvePendingAccount = document.querySelectorAll(
                ".approve-pending-account"
            );
            const approveIndex = approvePendingAccount.length;

            const confirmAccountApproval = async () => {};

            const cancelAccountApproval = () => {};

            const showApprovedModal = async event => {
                approveID = event.target.getAttribute("id").toString();
            };

            for (let i = 0; i < approveIndex; i++) {
                approvePendingAccount[i].addEventListener(
                    "click",
                    showApprovedModal,
                    false
                );
            }
        };

        const disapproveAccountModal = () => {
            let disapproveID;
            const disapprovePendingAccount = document.querySelectorAll(
                ".approve-pending-account"
            );
            const disapproveIndex = disapprovePendingAccount.length;

            const confirmAccountDisapproval = async () => {};

            const cancelAccountDisapproval = () => {};

            const showdisApprovedModal = async event => {
                disapproveID = event.target.getAttribute("id").toString();
            };

            for (let i = 0; i < disapproveIndex; i++) {
                disapprovePendingAccount[i].addEventListener(
                    "click",
                    showdisApprovedModal,
                    false
                );
            }
        };

        const viewPendingReportDetailModal = () => {};

        const approveReportModal = () => {};

        const disapproveReportModal = () => {};

        const setNextAndPrevPage = async (data, id) => {};

        const fillAccountEmptyTable = paginateCount => {
            let occupiedTableRow = "";
            let index = 0;
            let accountEmptyTD = "";
            if (paginationTableBody.childElementCount <= 10) {
                occupiedTableRow = +paginationTableBody.childElementCount;
                index = paginateCount - occupiedTableRow;
                for (let i = 0; i < index; i++) {
                    accountEmptyTD = `
                        <tr>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered"><button
                                    class="button is-small pending-button">*</button></td>
                            <td class="has-text-centered"><button
                                    class="button is-small pending-button">*</button></td>
                            <td class="has-text-centered"><button
                                    class="button is-small pending-button">*</button></td>
                        </tr>
                    `;
                }
                paginationTableBody.insertAdjacentHTML(
                    "beforeend",
                    accountEmptyTD
                );
            }
        };

        const fillReportEmptyTable = paginateCount => {
            let occupiedTableRow = "";
            let index = 0;
            let accountEmptyTD = "";
            if (paginationTableBody.childElementCount <= 10) {
                occupiedTableRow = +paginationTableBody.childElementCount;
                index = paginateCount - occupiedTableRow;
                for (let i = 0; i < index; i++) {
                    accountEmptyTD = `
                        <tr>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered">*</td>
                            <td class="has-text-centered"><button
                                    class="button is-small pending-button">*</button></td>
                            <td class="has-text-centered"><button
                                    class="button is-small pending-button">*</button></td>
                            <td class="has-text-centered"><button
                                    class="button is-small pending-button">*</button></td>
                        </tr>
                    `;
                }
                paginationTableBody.insertAdjacentHTML(
                    "beforeend",
                    accountEmptyTD
                );
            }
        };

        const loadAccountBody = async () => {
            let acctLinkPerpage;
            let acctLinktotal;
            let acctLinkData;
            let accLinkTo;

            try {
                responseData = await axios.get(
                    "/admin/dashboard/pending/accounts"
                );
            } catch (error) {
                console.log(error.response);
            }

            fillAccountEmptyTable(acctLinkPerpage);
            viewPendingAccountDetailModal();
            approveAccountModal();
            disapproveAccountModal();
        };

        const loadReportBody = async () => {
            try {
            } catch (error) {
                console.log(error.response);
            }

            //! fillup pending report table and add modals for it
            fillReportEmptyTable();
            viewPendingReportDetailModal();
            approveReportModal();
            disapproveReportModal();
        };

        // load pending data if account link has been clicked
        const loadClickAccountsLinkData = () => {
            const tableHeader = `
            <th class="has-text-centered is-size-7">#</th>
            <th class="has-text-centered is-size-7">USERNAME</th>
            <th class="has-text-centered is-size-7">ROLE</th>
            <th class="has-text-centered is-size-7">STATUS</th>
            <th colspan="3" class="has-text-centered is-size-7">OPTIONS</th>
        `;

            PendingTableHeader.innerHTML = tableHeader;

            //! table account body in here
            loadAccountBody();
        };

        // load pending data if account link has been clicked
        const loadClickReportsLinkData = () => {
            const tableHeader = `
            <th class="has-text-centered is-size-7">#</th>
            <th class="has-text-centered is-size-7">REPORT NAME</th>
            <th class="has-text-centered is-size-7">REPORT TYPE</th>
            <th class="has-text-centered is-size-7">UPLOADED BY</th>
            <th colspan="3" class="has-text-centered is-size-7">OPTIONS</th>
            `;

            PendingTableHeader.innerHTML = tableHeader;

            // table account body in here
            loadReportBody();
        };

        const loadClickAccountsLink = () => {
            pendingDataLink[0].classList.add("is-active");
            pendingDataLink[1].classList.remove("is-active");

            // load Account table header and body data
            loadClickAccountsLinkData();
        };

        // load pending data if account link has been clicke
        const loadClickReportsLink = () => {
            pendingDataLink[0].classList.remove("is-active");
            pendingDataLink[1].classList.add("is-active");

            // load Account table header and body data
            loadClickReportsLinkData();
        };

        // load account data as first to load
        const initialAccountsPaginationPagesTableData = pendingAccounts => {
            console.log(pendingAccounts);
            const total = pendingAccounts.total;
            const perPage = pendingAccounts.per_page;
            const to = pendingAccounts.to;

            const remainder = total % perPage;
            let count = 1;
            let data = "";
            const pendingIndex =
                total % perPage > 1
                    ? Math.floor(total / 10) + remainder
                    : Math.floor(total / perPage);

            if (total > 0 && total <= 10) {
                for (let i = 0; i < total; i++) {
                    data = +`
                        <td class="has-text-centered">${count}</td>
                        <td class="has-text-centered">${pendingAccounts.data[i].username}</td>
                        <td class="has-text-centered">${pendingAccounts.data[i].role}</td>
                        <td class="has-text-centered">${pendingAccounts.data[i].status}</td>
                        <td class="has-text-centered">${pendingAccounts.data[i].account_status}</td>
                        <td class="has-text-centered">
                            <button 
                                id="${pendingAccounts.data[i].account_id}" 
                                class="has-text-centered is-small is-small is-success has-text-white view-pending-account">
                                View
                            </button>
                        </td>
                        <td class="has-text-centered">
                            <button 
                                id="${pendingAccounts.data[i].account_id}"
                                class="has-text-centered is-small is-small is-info has-text-white approve-pending-account">
                                Approve
                            </button>
                        </td>
                        <td class="has-text-centered">
                            <button 
                                id="${pendingAccounts.data[i].account_id}"
                                class="has-text-centered is-small is-small is-danger has-text-white disapprove-pending-account">
                                Disapprove
                            </button>
                        </td>
                    `;
                }
                paginationTableBody.innerHTML = data;
                fillAccountEmptyTable(perPage);
                viewPendingAccountDetailModal();
                approveAccountModal();
                disapproveAccountModal();
            }
        };

        const initializeAccountsPaginationData = () => {
            const defaultTableHeader = `
                <th class="has-text-centered is-size-7">#</th>
                <th class="has-text-centered is-size-7">USERNAME</th>
                <th class="has-text-centered is-size-7">ROLE</th>
                <th class="has-text-centered is-size-7">STATUS</th>
                <th colspan="3" class="has-text-centered is-size-7">OPTIONS</th>
            `;

            PendingTableHeader.innerHTML = defaultTableHeader;

            let emptyData = "";
            for (let i = 0; i < 10; i++) {
                emptyData += ` <tr>
                    <td class="has-text-centered has-text-white">*</td>
                    <td class="has-text-centered has-text-white">*</td>
                    <td class="has-text-centered has-text-white">*</td>
                    <td class="has-text-centered has-text-white">*</td>
                    <td class="has-text-centered"><button
                            class="button is-small pending-button has-text-white">*</button></td>
                    <td class="has-text-centered"><button
                            class="button is-small pending-button has-text-white">*</button></td>
                    <td class="has-text-centered"><button
                            class="button is-small pending-button has-text-white">*</button></td>
                </tr>`;
            }
            paginationTableBody.innerHTML = emptyData;
            const loadPaginationData = async () => {
                try {
                    const paginationData = await axios.get(
                        "/admin/dashboard/pending/accounts"
                    );
                    initialAccountsPaginationPagesTableData(
                        paginationData.data.pending_accounts
                    );
                } catch (error) {
                    console.log(error);
                }
            };
            loadPaginationData();
        };

        /* initial pagination data and modals whether accounts or reports link has been clicked */
        const clickedPaginationsData = event => {
            const selectedValue = event.target.textContent.toString();
            if (selectedValue === "Accounts") loadClickAccountsLink();
            else if (selectedValue === "Reports") loadClickReportsLink();
            else console.log("invalid value");
        };

        // initialize all pending modal events
        pendingNotification.addEventListener("click", showPendingModal, false);
        closePendingModal.addEventListener("click", removePendingModal, false);
        getPendingCount();

        window.document.addEventListener(
            "DOMContentLoaded",
            initializeAccountsPaginationData,
            false
        );
        for (let i = 0, index = pendingDataLink.length; i < index; i++) {
            pendingDataLink[i].addEventListener(
                "click",
                clickedPaginationsData,
                false
            );
        }
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
            console.log(responseData);
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

            // if there are no data put zero
            if (!stem) stem = 0;
            if (!abm) abm = 0;
            if (!gas) gas = 0;
            if (!tvl) tvl = 0;
            if (!humss) humss = 0;
            if (!artsScience) artsScience = 0;

            addGraduateChart(stem, abm, gas, tvl, humss, artsScience);
            graduateChartCanvasStyle.style.backgroundColor = "#fff";
            graduateCanvasContainer.style.boxShadow = "0px 0px 2px #000";
        } catch (error) {
            console.log(error.response);
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
            url: "/admin/dashboard/employment/status",
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
            waiting = EmploymentData.employment_status.waiting;
            employed = EmploymentData.employment_status.employed;
            unemployed = EmploymentData.employment_status.unemployed;

            if (!waiting) waiting = 0;
            if (!employed) employed = 0;
            if (!unemployed) unemployed = 0;

            addEmploymentChart(waiting, employed, unemployed);
            employmentChartCanvasStyle.style.backgroundColor = "#fff";
            employmentCanvasContainer.style.boxShadow = "0px 0px 2px #000";
        } catch (error) {
            console.log(error.response);
        }
    };

    const getDeploymentStatusData = async () => {
        let DeploymentData;

        let rightEmployed = 0;
        let unEmployed = 0;
        let underEmployed = 0;

        const addDeploymentChart = (rightData, underData, unemployData) => {
            const deploymentCanvas = document
                .querySelector("#deploymentchart")
                .getContext("2d");

            const employmentChart = new Chart(deploymentCanvas, {
                type: "doughnut",

                data: {
                    labels: ["Right employed", "Under employed", "Unemployed"],
                    datasets: [
                        {
                            label: "",
                            data: [rightData, underData, unemployData],
                            backgroundColor: [
                                "rgb(186, 220, 88)",
                                "rgb(255, 107, 129)",
                                "rgb(112, 161, 255)"
                            ],
                            borderColor: [
                                "rgba(186, 220, 88 ,1)",
                                "rgba(255, 107, 129, 1)",
                                "rgba(112, 161, 255,1)"
                            ],
                            borderWidth: 3,
                            borderColor: "#fff"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    cutoutPercentage: 50,
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
                        text: `Deployment Status`,
                        position: "top"
                    }
                }
            });
        };

        const axiosOptonsForDeployment = {
            url: "/admin/dashboard/deployment/status",
            method: "get",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json;charset=UTF-8"
            }
        };

        try {
            let responseData = await axios(axiosOptonsForDeployment);
            const deploymentChartCanvasStyle = document.querySelector(
                "#deploymentchart"
            );
            const deploymentCanvasContainer = document.querySelectorAll(
                ".canvascontainer"
            )[2];
            DeploymentData = responseData.data;

            //put data in place for graph usage
            rightEmployed = DeploymentData.deployment_status.rightemployed;
            underEmployed = DeploymentData.deployment_status.underemployed;
            unEmployed = DeploymentData.deployment_status.unemployed;

            if (!rightEmployed) rightEmployed = 2;
            if (!underEmployed) underEmployed = 4;
            if (!unEmployed) unEmployed = 5;

            addDeploymentChart(rightEmployed, underEmployed, unEmployed);
            deploymentChartCanvasStyle.style.backgroundColor = "#fff";
            deploymentCanvasContainer.style.boxShadow = "0px 0px 2px #000";
        } catch (error) {
            console.log(error.response);
        }
    };

    getUsersAccountsCountData();
    getPendingsCountData();
    getNotifyCountData();
    getGraduateGraphData();
    getEmploymentStatusData();
    getDeploymentStatusData();
}
dashBoardModule();
