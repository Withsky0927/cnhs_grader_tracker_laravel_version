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

function dashBoardModule() {
    // for all data that has been sent

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
                            fontColor: "black",
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
            GraduatesData = responseData.data;
            stem = GraduatesData.studentCounts.stem;
            abm = GraduatesData.studentCounts.abm;
            gas = GraduatesData.studentCounts.gas;
            tvl = GraduatesData.studentCounts.tvl;
            humss = GraduatesData.studentCounts.humss;
            artsScience = GraduatesData.studentCounts.arts_science;

            // get data in all graduates

            addGraduateChart(stem, abm, gas, tvl, humss, artsScience);
        } catch (error) {
            console.log(error);
        }
    };

    const getEmploymentStatusData = async () => {
        let EmploymentData;

        let waiting = 0;
        let employed = 0;
        let unemployed = 0;

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
            EmploymentData = responseData.data;

            //put data in place for graph usage
            waiting = EmploymentData.status.waiting;
            employed = EmploymentData.status.employed;
            unemployed = EmploymentData.status.unemployed;
        } catch (error) {
            console.log(error);
        }
    };

    const getUsersAccountsCountData = async () => {
        let userCount = 0;
        //const userElement = document.querySelector("#users-count");
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
            console.log(userCount.userscount);
        } catch (error) {
            console.log(error);
        }
        //userCount.innerText = userCount;
    };

    getGraduateGraphData();
    getEmploymentStatusData();
    getUsersAccountsCountData();
}

function gradutesModule() {}

function AccountsModule() {}

function checkIfPageExist() {
    if (window.location.pathname === "/admin/dashboard") {
        dashBoardModule();
    }
    // graduates module
    if (window.location.pathname === "/admin/graduates") {
        // gradutesModule();
    }

    // check if inside of accounts module
    if (window.location.pathname === "/admin/accounts/admin") {
    } else if (window.location.pathname === "/admin/accounts/student") {
    }
}

toggleBurger();
setcsrfToken();
checkIfPageExist();
