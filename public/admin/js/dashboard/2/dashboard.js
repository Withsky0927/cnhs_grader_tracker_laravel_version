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
dashBoardModule();
