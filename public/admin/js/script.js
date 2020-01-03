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
                    labels: [
                        "ABM",
                        "GAS",
                        "HUMSS",
                        "ARTS & SCIENCE",
                        "TVL",
                        "STEM"
                    ],
                    datasets: [
                        {
                            label: `Graduates: ${previousYear} - ${currentYear}`,
                            data: [
                                abmData,
                                gasData,
                                humssData,
                                artsScienceData,
                                tvlData,
                                stemData
                            ],
                            backgroundColor: []
                        }
                    ]
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

        let responseData = await axios(axiosOptonsForGraduates);
        GraduatesData = responseData.data;
        console.log(GraduatesData);

        // put data in place for graph usage
        stem = GraduatesData.stem;
        abm = GraduatesData.abm;
        gas = GraduatesData.gas;
        tvl = GraduatesData.tvl;
        humss = GraduatesData.humss;
        artsScience = GraduatesData.arts_and_science;

        // get data in all graduates
        addGraduateChart(stem, abm, gas, tvl, humss, artsScience);
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

        let responseData = await axios(axiosOptonsForEmployment);
        EmploymentData = responseData.status;

        //put data in place for graph usage
        waiting = EmploymentData.waiting;
        employed = EmploymentData.employed;
        unemployed = EmploymentData.unemployed;
    };

    setTimeout(function() {
        getGraduateGraphData();
        getEmploymentStatusData();
    }, 1000);
}

function gradutesModule() {}

function AccountsModule() {}

function checkIfPageExist() {
    if (window.location.pathname === "admin/dashboard") {
        //dashBoardModule();
    }

    // graduates module
    if (window.location.pathname === "admin/graduates") {
        gradutesModule();
    }

    // check if inside of accounts module
    if (window.location.pathname === "admin/accounts/admin") {
    } else if (window.location.pathname === "admin/accounts/student") {
    }
}

toggleBurger();
setcsrfToken();
checkIfPageExist();
