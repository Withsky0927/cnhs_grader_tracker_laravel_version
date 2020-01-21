"use strict";
function jobFairsModule() {
    //const graduateViewButton = document.querySelectorAll(".grad-view-button");


    const jobFairPaginationList = document.querySelector(
        "#jobfair-pagination-list"
    );

    const jobfairtabledata = document.querySelector("#jobfair-data");

    // page next and prev
    const paginateNext = document.querySelector("#paginate-next");
    const paginatePrev = document.querySelector("#paginate-prev");

    const jobFairForm = document.querySelector("#jobfair-form");
    let pageNextAndPrev = 1;
    jobFairForm.addEventListener(
        "submit",
        function(e) {
            e.preventDefault();
        },
        false
    );

    let jobfairAxiosOption = {
        url: "/admin/announcement/jobfair/pages",
        method: "get",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json;charset=UTF-8"
        }
    };

   
    
    // get the year - from 1950 to present
    const manipulateDate = (id) => {
        const year = document.querySelector(id);
        let allDate = "";
        let currentYear = 0;

        if (id === '#add_job_posted_year' || id === '#edit_job_posted_year') {
            currentYear = new Date().getFullYear();
        } else if (id === '#add_job_avail_year' || id === "#edit_job_avail_year") {
            currentYear = new Date().getFullYear() + 2;
        }
        for (
            let yearCompute = 2015;
            yearCompute <= currentYear;
            yearCompute++
        ) {
            let option = document.createElement("option");
            if (yearCompute === 2015) {
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
    };
    


    const viewJobFairPaginationData = () => {
        
        const viewJobFairButtton = document.querySelectorAll(".view-jobfair");
        const viewJobFairModal = document.querySelector("#jobfair-view-modal");
        const jobFairViewClose = document.querySelector("#jobfair-view-modal-close");
        const htmlClipped = document.querySelector("#clippedmodifier");

        const insertJobFairViewData = data => {
            console.log(data);
            const jobName = document.querySelector("#view_job_name");
            const jobStrand = document.querySelector("#view_job_strand");
            const jobCompany = document.querySelector("#view_job_company");
            const jobAddress = document.querySelector("#view_job_address");
            const jobDescription = document.querySelector("#view_job_description");
            const jobQualification = document.querySelector("#view_job_qual");
            const jobPosted = document.querySelector("#view_job_posted");
            const jobAvailability = document.querySelector("#view_job_avail");
            
            jobName.value = data.job;

            jobStrand.value = data.strand.toUpperCase();
            jobCompany.value = data.company;
            jobAddress.value = data.address;
            jobDescription.value = data.job_description;
            jobQualification.value = data.job_qualification;
            jobPosted.value = data.job_posted;
            jobAvailability.value = data.job_avail;

        };
        const removeViewModalContainer = () => {
            htmlClipped.classList.remove("is-clipped");
            viewJobFairModal.classList.remove("is-active");
        };
        const showViewModalContainer = () => {
            htmlClipped.classList.add("is-clipped");
            viewJobFairModal.classList.add("is-active");
            

            jobFairViewClose.addEventListener(
                "click",
                removeViewModalContainer,
                false
            );
        };
        const setViewModal = async e => {
            const jobfairViewID = e.target.getAttribute("id").toString();
            let reponseViewData = "";

            const getJobFairView = {
                url: `/admin/announcement/jobfair/view/job?id=${jobfairViewID}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                reponseViewData = await axios(getJobFairView);
                viewData = reponseViewData.data;
                
                insertJobFairViewData(viewData.view_jobfair);
                showViewModalContainer();
            } catch (error) {
                console.log(error);
            }
        };
        for (let i = 0, index = viewJobFairButtton.length; i < index; i++) {
            viewJobFairButtton[i].addEventListener("click", setViewModal, false);
        }
    
    };

    const addJobFairPaginationData = () => {
        
        const addJobFairButton = document.querySelector("#jobfair-add-button");
        const jobFairAddModal = document.querySelector("#jobfair-add-modal");
        const htmlClipped = document.querySelector("#clippedmodifier");
        const jobFairAddClose = document.querySelector("#add-jobfair-modal-close");
        const jobFairAddBtn = document.querySelector("#add-jobfair-buttton");
        

        const removeAddModalContainer = () => {
            htmlClipped.classList.remove("is-clipped");
            jobFairAddModal.classList.remove("is-active");
        };
        const showAddModalContainer = () => {
            htmlClipped.classList.add("is-clipped");
            jobFairAddModal.classList.add("is-active");
            

            jobFairAddClose.addEventListener(
                "click",
                removeAddModalContainer,
                false
            );
        };


        const insertDataIntoDatabase = async () => {
            const jobName = document.querySelector("#add_job_name");
            const jobStrand = document.querySelector("#add_job_strand");
            const jobCompany = document.querySelector("#add_job_company");
            const jobAddress = document.querySelector("#add_job_address");
            const jobDescription = document.querySelector("#add_job_desc");
            const jobQualification = document.querySelector("#add_job_qual");
            const jobPostedMonth = document.querySelector("#add_job_posted_month");
            const jobPostedDay = document.querySelector("#add_job_posted_day");
            const jobPostedYear = document.querySelector("#add_job_posted_year");

            const jobAvailMonth = document.querySelector("#add_job_avail_month");
            const jobAvailDay = document.querySelector("#add_job_avail_day");
            const jobAvailYear = document.querySelector("#add_job_avail_year");
            let resposponeAddData = "";

            const AddJobFairData = {
                url: `/admin/announcement/jobfair`,
                method: "post",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                },
                data:{
                    jobName: jobName.value,
                    jobStrand: jobStrand.value,
                    jobCompany: jobCompany.value,
                    jobAddress: jobAddress.value,
                    jobDescription: jobDescription.value,
                    jobQualification: jobQualification.value,
                    jobPosted: `${jobPostedYear.value}-${jobPostedMonth.value}-${jobPostedDay.value}`,
                    jobAvailability: `${jobAvailYear.value}-${jobAvailMonth.value}-${jobAvailDay.value}`
                }
            };

        

            if (!jobName.value || !jobStrand.value || !jobAddress.value 
                || !jobCompany.value || !jobDescription.value || !jobQualification.value
                || jobPostedDay.value === "Day" || jobAvailMonth.value === "Month" || jobAvailYear.value === "Year" 
                || jobAvailDay.value === "Day" || jobAvailMonth.value === "Month" || jobAvailYear.value === "Year"
                ) {
                alert("Incomplete Field or invalid Field! please Complete Required fields!");
            } else {

                try {
                    resposponeAddData = await axios(AddJobFairData);
                    console.log(resposponeAddData);
                    removeAddModalContainer();
                } catch(error) {
                    console.log(error);
                }
            }
        };  

        const setAddModal = () => {
            showAddModalContainer();

            jobFairAddBtn.addEventListener('click' , insertDataIntoDatabase , false);
        };


        addJobFairButton.addEventListener('click' , setAddModal , false);
    };

    const editJobFairPaginationData = () => {
        const editJobFairButton = document.querySelectorAll(".edit-jobfair");
        const jobFairEditmodal = document.querySelector("#jobfair-edit-modal");
        const jobFairEditClose = document.querySelector("#edit-jobfair-modal-close");
        const htmlClipped = document.querySelector("#clippedmodifier");
        const editConfirmBtn = document.querySelector("#edit-jobfair-buttton-update");
        const editCancelBtn = document.querySelector("#edit-jobfair-buttton-cancel");

        const jobName = document.querySelector("#edit_job_name");
        const jobStrand = document.querySelector("#edit_job_strand");
        const jobCompany = document.querySelector("#edit_job_company");
        const jobAddress = document.querySelector("#edit_job_address");
        const jobDescription = document.querySelector("#edit_job_desc");
        const jobQualification = document.querySelector("#edit_job_qual");
        const jobPostedMonth = document.querySelector("#edit_job_posted_month");
        const jobPostedDay = document.querySelector("#edit_job_posted_day");
        const jobPostedYear = document.querySelector("#edit_job_posted_year");
        const jobAvailMonth = document.querySelector("#edit_job_avail_month");
        const jobAvailDay = document.querySelector("#edit_job_avail_day");
        const jobAvailYear = document.querySelector("#edit_job_avail_year");


        const removeEditModal = () => {
            jobFairEditmodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
            jobName.value = "";
            jobStrand.value = "";
            jobCompany.value = "";
            jobAddress.value = "";
            jobDescription.value = "";
            jobQualification.value = "";
            jobPostedMonth.value = "";
            jobPostedDay.value = ""
            jobPostedYear.value = "";
            jobAvailMonth.value = "";
            jobAvailDay.value = "";
            jobAvailYear.value = "";

        };


        const populateDefaultValue = (responseData) => {
            console.log(responseData);
            const jobEditPostedData = responseData.job_posted.split("-");
            const jobEditAvailData = responseData.job_avail.split("-");

            jobName.value = responseData.job;
            jobStrand.value = responseData.strand;
            jobCompany.value = responseData.company;
            jobAddress.value = responseData.address;
            jobDescription.value = responseData.job_description;
            jobQualification.value = responseData.job_qualification;

            jobPostedMonth.value = jobEditPostedData[1];
            jobPostedDay.value = jobEditPostedData[2];
            jobPostedYear.value = jobEditPostedData[0];

            jobAvailMonth.value = jobEditAvailData[1];
            jobAvailDay.value = jobEditAvailData[2];
            jobAvailYear.value = jobEditAvailData[0];
        };

        const showEditModal = async (id) => {
            jobFairEditmodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");
            let responseData = "";
            
            const getJobFairView = {
                url: `/admin/announcement/jobfair/view/job?id=${id}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                responseData = await axios(getJobFairView);
                populateDefaultValue(responseData.data.view_jobfair);
            } catch (error) {
                console.log(error);
            }

            jobFairEditClose.addEventListener("click" , removeEditModal , false);
        };

        const setEditModal = event => {
            const editData = event.target.getAttribute("id").toString();
            showEditModal(editData);
        };

        

        for (let i = 0 , index = editJobFairButton.length ; i < index; i++) {
            editJobFairButton[i].addEventListener("click" , setEditModal , false);
        }
    };

    const removeJobFairPaginationData = () => {
        
        const removeJobFairButtton = document.querySelectorAll(".delete-jobfair");
        const jobFairDeletemodal = document.querySelector(
            "#jobfair-delete-modal"
        );
        const jobFairDeleteClose = document.querySelector(
            "#delete-jobfair-modal-close"
        );
        const jobFairModalConfirmBtn = document.querySelector("#delete-modal-button-confirm");
        const jobFairModalCancelBtn = document.querySelector("#delete-modal-button-cancel");
        const htmlClipped = document.querySelector("#clippedmodifier");

        const setDeleteModal = event => {
            const dataToBeDelete = event.target.getAttribute("id").toString();
            jobFairDeletemodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");
            jobFairDeleteClose.addEventListener("click", removeDeleteModal, false);


            const ConfirmDelete =  async () => {
                const responseData = "";
                const toBeDeleteModalData = {
                    url:`/admin/announcement/jobfair/delete/job/${dataToBeDelete}`,
                    method:"delete",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json;charset=UTF-8"
                    },
                };
                try {
                    responseData = await axios(toBeDeleteModalData);
                    alert("Data Sucessfully Deleted!"); 
                } catch(error) {
                    console.log(error.response);
                }
                jobFairDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
            };

            const cancelDelete = () => {
                jobFairDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
            };

            jobFairModalConfirmBtn.addEventListener("click" , ConfirmDelete , false);
            jobFairModalCancelBtn.addEventListener("click" , cancelDelete, false);
        };

        const removeDeleteModal = () => {
            jobFairDeletemodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        };

        for (let i = 0, index = removeJobFairButtton.length; i < index; i++) {
            removeJobFairButtton[i].addEventListener(
                "click",
                setDeleteModal,
                false
            );
        }
    };
    manipulateDate("#add_job_posted_year");
    manipulateDate("#add_job_avail_year");
    manipulateDate("#edit_job_posted_year");
    manipulateDate("#edit_job_avail_year");
    const removePrevAndNext = () => {
        paginateNext.style.visibility = "hidden";
        paginatePrev.style.visibility = "hidden";

        paginateNext.setAttribute("disabled", "");
        paginatePrev.setAttribute("disabled", "");
    };

    const addPrevAndNext = () => {
        const paginationNext = document.querySelectorAll(".pagination-next")[0];
        const paginationPrev = document.querySelectorAll(".pagination-prev")[0];

        paginationNext.setAttribute("id", "paginate-next");
        paginationPrev.setAttribute("id", "paginate-prev");
    };
    const loadPaginationPage = dataTotals => {
        let divquotient = Math.floor(dataTotals / 10);
        let remainder = dataTotals % 10;
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
        jobFairPaginationList.innerHTML = pageElement;
    };

    const loadSelectedPagination = () => {
        const paginationLink = document.querySelectorAll(".pagination-link");

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
                url: `/admin/announcement/jobfair/pages?page=${pageNextAndPrev}`,
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
                                    <td class="data-style has-text-centered is-size-7">${data[i].job}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].strand.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].company}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].address.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_decription.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_qualification.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_posted}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_avail}</td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-info edit-jobfair">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-danger delete-jobfair">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            jobfairtabledata.innerHTML = htmlData;

            fillEmptyTable();
            viewJobFairPaginationData();
            addJobFairPaginationData();
            editJobFairPaginationData();
            removeJobFairPaginationData();
        };

        for (let x = 0, index = paginationLink.length; x < index; x++) {
            paginationLink[x].addEventListener(
                "click",
                loadPagePerClick,
                false
            );
        }
    };
    const loadInitialPagination = async () => {
        const response = await axios(jobfairAxiosOption);
        const PaginationData = response.data.page_url;
        let datatotal = PaginationData.total;
        let perpage = PaginationData.per_page;
        let data = PaginationData.data;
        let htmlData = "";
        let dataCount = 1;

        const checkNextAndPrevNumber = () => {
            if (pageNextAndPrev <= 1) {
                paginatePrev.setAttribute("disabled", "");
                paginateNext.removeAttribute("disabled");
                pageNextAndPrev = 1;
            } else if (pageNextAndPrev > 1 && pageNextAndPrev < datatotal / 10) {
                paginatePrev.removeAttribute("disabled");
                paginateNext.removeAttribute("disabled");
            } else if (pageNextAndPrev >= datatotal / 10) {
             
                paginatePrev.removeAttribute("disabled");
                paginateNext.setAttribute("disabled", "");
                
                
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
            paginateNext.style.visibility = "visible";
            paginatePrev.style.visibility = "visible";
        };

        // initialize the first page
        checkNextAndPrevNumber();
        const fillEmptyTable = () => {
            if (jobfairtabledata.childElementCount < 10) {
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
                                        <td class="data-style has-text-centered">
                                            <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                        </td>
                                        <td class="data-style has-text-centered">
                                            <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                        </td>
                                        <td class="data-style has-text-centered">
                                            <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                        </td>
                                    </tr>
                                `;
                        jobfairtabledata.insertAdjacentHTML(
                            "beforeend",
                            emptyTd
                        );
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
                                    <td class="data-style has-text-centered is-size-7">${data[i].job}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].strand.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].company}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].address.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_description.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_qualification.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_posted}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_avail}</td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-info edit-jobfair">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-danger delete-jobfair">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            jobfairtabledata.innerHTML = htmlData;
            fillEmptyTable();
            viewJobFairPaginationData();
            addJobFairPaginationData();
            editJobFairPaginationData();
            removeJobFairPaginationData();
        };

        // load
        const loadPaginationPage = dataTotals => {
            let divquotient = Math.floor(dataTotals / 10);
            let remainder = dataTotals % 10;
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
            jobFairPaginationList.innerHTML = pageElement;
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
                    url: `/admin/announcement/jobfair/pages?page=${pageNextAndPrev}`,
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
                                        <td class="data-style has-text-centered is-size-7">${data[i].job}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].strand.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].company}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].address.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].job_description.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].job_qualification.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].job_posted}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[i].job_avail}</td>
                                        <td class="has-text-centered">
                                            <a id="${data[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${data[i].jobfair_id}" class="button is-small is-info edit-jobfair">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${data[i].jobfair_id}" class="button is-small is-danger delete-jobfair">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                jobfairtabledata.innerHTML = htmlData;

                fillEmptyTable();
                viewJobFairPaginationData();
                addJobFairPaginationData();
                editJobFairPaginationData();
                removeJobFairPaginationData();
            };

            for (let x = 0, index = paginationLink.length; x < index; x++) {
                paginationLink[x].addEventListener(
                    "click",
                    loadPagePerClick,
                    false
                );
            }
        };

        const loadJobFairNextPage = () => {
            const setNextPage = async e => {
                pageNextAndPrev += 1;
                checkNextAndPrevNumber();

                const setNextAxiosOpt = {
                    url: `/admin/announcement/jobfair/pages?page=${pageNextAndPrev}`,
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
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].job}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].strand.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].company}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].address.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].job_description.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].job_qualification.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].job_posted}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[i].job_avail}</td>
                                        <td class="has-text-centered">
                                            <a id="${nextData[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${nextData[i].jobfair_id}" class="button is-small is-info edit-jobfair">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${nextData[i].jobfair_id}" class="button is-small is-danger delete-jobfair">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                jobfairtabledata.innerHTML = htmlData;

                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewJobFairPaginationData();
                addJobFairPaginationData();
                editJobFairPaginationData();
                removeJobFairPaginationData();
            };

            paginateNext.addEventListener("click", setNextPage, false);
        };

        const loadJobFairPrevPage = () => {
            const setPrevPage = async e => {
                pageNextAndPrev -= 1;
                checkNextAndPrevNumber();

                const setPreviousAxiosOpt = {
                    url: `/admin/announcement/jobfair/pages?page=${pageNextAndPrev}`,
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
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].job}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].strand.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].company}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].address.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].job_description.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].job_qualification.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].job_posted}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[i].job_avail}</td>
                                        <td class="has-text-centered">
                                            <a id="${prevData[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${prevData[i].jobfair_id}" class="button is-small is-info edit-jobfair">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${prevData[i].jobfair_id}" class="button is-small is-danger delete-jobfair">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                jobfairtabledata.innerHTML = htmlData;
                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewJobFairPaginationData();
                addJobFairPaginationData();
                editJobFairPaginationData();
                removeJobFairPaginationData();
            };
            paginatePrev.addEventListener("click", setPrevPage, false);
        };
        loadFirstPagination();
        loadPaginationPage(datatotal);
        loadJobFairNextPage();
        loadJobFairPrevPage();
        loadSelectedPagination();
    };
    const fillOptionEmptyTable = selectTotal => {
        if (jobfairtabledata.childElementCount < 10) {
            let remainder = selectTotal % 10;
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
                                    <td class="data-style has-text-centered">
                                        <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td class="data-style has-text-centered">
                                        <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td class="data-style has-text-centered">
                                        <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                            `;
                    jobfairtabledata.insertAdjacentHTML("beforeend", emptyTd);
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
        removePrevAndNext();
    };
    const loadOptionPaginationPage = dataTotals => {
        let divquotient = Math.floor(dataTotals / 10);
        let remainder = dataTotals % 10;
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
        jobFairPaginationList.innerHTML = pageElement;
    };

    const loadOptionPagination = () => {
        const paginationOptionLink = document.querySelectorAll(
            ".pagination-link"
        );

        const removeOptionIsCurrentClass = () => {
            for (
                let i = 0, index = paginationOptionLink.length;
                i < index;
                i++
            ) {
                paginationOptionLink[i].classList.remove("is-current");
            }
        };

        const loadOptionPagePerClick = async event => {
            // revert and add current data
            pageNextAndPrev = parseInt(event.target.textContent);
            removeOptionIsCurrentClass();
            event.target.classList.add("is-current");
            let responseData = "";
            let pageData = "";
            let perPage = 0;
            let total = 0;

            const OptionperPageAxiosOption = {
                url: `/admin/announcement/jobfair/pages?page=${pageNextAndPrev}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            responseData = await axios(OptionperPageAxiosOption);
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
                                    <td class="data-style has-text-centered is-size-7">${data[i].job}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].strand.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].company}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].address.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_description.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_qualification.substring(0,10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_posted}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[i].job_avail}</td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-info edit-jobfair">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${data[i].jobfair_id}" class="button is-small is-danger delete-jobfair">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            jobfairtabledata.innerHTML = htmlData;

            fillOptionEmptyTable(selectTotal);
            viewJobFairPaginationData();
            addJobFairPaginationData();
            editJobFairPaginationData();
            removeJobFairPaginationData();
        };

        for (let x = 0, index = paginationOptionLink.length; x < index; x++) {
            paginationOptionLink[x].addEventListener(
                "click",
                loadOptionPagePerClick,
                false
            );
        }
    };

    const loadSearchPagination = () => {
        const jobfairSearch = document.querySelector("#jobfair-search");
        const jobfairSelected = document.querySelector(
            "#jobfair-search-selected"
        );

        const setSelectedValue = checkData => {
            let index = jobfairSelected.options.length;
            if (checkData.length > 0) {
                for (let i = 0; i < index; i++) {
                    jobfairSelected.options[i].removeAttribute("selected");
                    jobfairSelected.options[i].removeAttribute("disabled");
                }
                for (let i = 0; i < index; i++) {
                    jobfairSelected.options[i].setAttribute("disabled", "");
                }

                jobfairSelected.selectedIndex = 0;
            }
        };
        const setToDefault = () => {
            paginateNext.style.visibility = "visible";
            paginatePrev.style.visibility = "visible";

            for (let i = 0, index = jobfairSelected.length; i < index; i++) {
                jobfairSelected.options[i].removeAttribute("selected");
                jobfairSelected.options[i].removeAttribute("disabled");
            }

            paginateNext.removeAttribute("disabled");
            jobfairSelected.options[0].setAttribute("disabled", "");
            jobfairSelected.selectedIndex = 1;
        };

        const getJobFairSelected = async event => {
            let selected = event.target.value.toString();
            let selectedresponseData = "";
            let selectedPerPage = 0;
            let selectTotal = 0;
            let selectedTo = 0;
            let selectedData = "";
            let htmlData = "";
            let selectCount = 1;

            if (typeof selected !== "string") {
                selected = "";
            } else if (typeof selected === "string") {
                if (selected === "all") {
                    setToDefault();
                    loadInitialPagination();
                    return false;
                }
            }

            const AxiosOptionsSelected = {
                url: `/admin/announcement/jobfair/selected?select=${selected}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                selectedresponseData = await axios(AxiosOptionsSelected);
                console.log(selectedresponseData);
                selectedPerPage =
                    selectedresponseData.data.selected_strand.per_page;
                selectTotal = selectedresponseData.data.selected_strand.total;
                selectedData = selectedresponseData.data.selected_strand.data;
                selectedTo = selectedresponseData.data.selected_strand.to;

                if (selectedTo % 10 != 0) {
                    index = selectedTo % 10;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${selectCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].job}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].strand.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].company}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].address.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].job_description.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].job_qualification.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].job_posted}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[i].job_avail}</td>
                                        <td class="has-text-centered">
                                            <a id="${selectedData[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                        </td>
                                         <td class="has-text-centered">
                                            <a id="${selectedData[i].jobfair_id}" class="button is-small is-info edit-jobfair">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${selectedData[i].jobfair_id}" class="button is-small is-danger delete-jobfair">View</a>
                                        </td>
                                    </tr>`;
                    selectCount += 1;
                }
                jobfairtabledata.innerHTML = htmlData;

                fillOptionEmptyTable(selectTotal);
                viewJobFairPaginationData();
                addJobFairPaginationData();
                editJobFairPaginationData();
                removeJobFairPaginationData();
            } catch (error) {
                console.log(error);
            }
            loadOptionPaginationPage();
            loadOptionPagination();
        };

        const getJobFairSearch = async event => {
            let searchval = event.target.value;
            let searchresponseData = "";
            let searchPerPage = 0;
            let searchTo = 0;
            let searchTotal = 0;
            let searchData = "";
            let searchdataCount = 1;
            let htmlData = "";

            if (!searchval) {
                loadInitialPagination();
                setToDefault();
                return false;
            }
            if (searchval.length >= 0) {
                setSelectedValue(searchval);
            }
            const AxiosOptionsSearch = {
                url: `/admin/announcement/jobfair/search?val=${searchval}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                searchresponseData = await axios(AxiosOptionsSearch);
                searchPerPage = searchresponseData.data.search_data.per_page;
                searchTotal = searchresponseData.data.search_data.total;
                searchTo = searchresponseData.data.search_data.to;
                searchData = searchresponseData.data.search_data.data;

                let index = 10;
                if (searchTo % 10 != 0) {
                    index = searchTo % 10;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${searchdataCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].job}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].strand.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].company}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].address.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].job_description.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].job_qualification.substring(0,10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].job_posted}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[i].job_avail}</td>
                                        <td class="has-text-centered">
                                            <a id="${searchData[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${searchData[i].jobfair_id}" class="button is-small is-info edit-jobfair">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${searchData[i].jobfair_id}" class="button is-small is-success view-jobfair">View</a>
                                        </td>
                                    </tr>`;
                    searchdataCount += 1;
                }
                jobfairtabledata.innerHTML = htmlData;

                fillOptionEmptyTable(searchTotal);
                viewJobFairPaginationData();
                addJobFairPaginationData();
                editJobFairPaginationData();
                removeJobFairPaginationData();
            } catch (error) {
                console.log(error);
            }
            loadOptionPaginationPage();
            loadOptionPagination();
        };

        jobfairSelected.addEventListener("change", getJobFairSelected, false);
        jobfairSearch.addEventListener("keyup", getJobFairSearch, false);
    };

    loadInitialPagination();
    loadSearchPagination();

    function reloadPage  () {
        loadInitialPagination();
    };
}
jobFairsModule();
