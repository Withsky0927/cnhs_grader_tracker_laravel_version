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

    const graduateForm = document.querySelector("#graduate-form");
    let pageNextAndPrev = 1;
    graduateForm.addEventListener(
        "submit",
        function(e) {
            e.preventDefault();
        },
        false
    );

    let GraaduatesAxiosOption = {
        url: "/admin/graduates/pages",
        method: "get",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json;charset=UTF-8"
        }
    };
    const viewGradPaginationData = () => {
        const viewGradButtton = document.querySelectorAll(".view-grad");
        const graduatesModal = document.querySelector("#graduates-modal");
        const graduatesClose = document.querySelector("#graduates-modal-close");
        const htmlClipped = document.querySelector("#clippedmodifier");

        const insertStudentViewData = data => {
            const gradPic = document.querySelector("#graduate-pic");
            const gradLRN = document.querySelector("#graduate-lrn");
            const gradStrand = document.querySelector("#graduate-strand");
            const gradFirstname = document.querySelector("#graduate-firstname");
            const gradMiddlename = document.querySelector(
                "#graduate-middlename"
            );
            const gradLastname = document.querySelector("#graduate-lastname");
            const gradAddress = document.querySelector("#graduate-address");
            const gradBirthDay = document.querySelector("#graduate-birthday");
            const gradAge = document.querySelector("#graduate-age");
            const gradGender = document.querySelector("#graduate-gender");
            const gradCivilStatus = document.querySelector(
                "#graduate-civil-status"
            );
            const gradStatus = document.querySelector("#graduate-status");

            gradPic.src = data.profile_pic;
            gradPic.alt = `${data.firstname} ${data.middlename} ${data.lastname}`;
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
            viewGradButtton[i].addEventListener("click", setViewModal, false);
        }
    };

    const removeGradPaginationData = () => {
        const removeGradButtton = document.querySelectorAll(".delete-grad");
        const graduatesDeletemodal = document.querySelector(
            "#graduates-delete-modal"
        );
        const graduateDeleteClose = document.querySelector(
            "#graduates-delete-modal-close"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");

        const setDeleteModal = event => {
            const data = parseInt(event.target.getAttribute("id"));
            graduatesDeletemodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");
        };

        const removeDeleteModal = () => {
            graduatesDeletemodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        };

        for (let i = 0, index = removeGradButtton.length; i < index; i++) {
            removeGradButtton[i].addEventListener(
                "click",
                setDeleteModal,
                false
            );
        }
        graduateDeleteClose.addEventListener("click", removeDeleteModal, false);
    };

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
        gradPaginationList.innerHTML = pageElement;
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
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].lrn
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].strand
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].firstname
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].middlename
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].lastname
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].address.substring(0, 10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].birthday
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].age
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].gender
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].civil_status
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].status
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].lrn
                                        }" class="button is-small is-success view-grad">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].lrn
                                        }" class="button is-small is-danger delete-grad">Delete</a>
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
    const loadInitialPagination = async () => {
        const response = await axios(GraaduatesAxiosOption);
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
            } else if (
                pageNextAndPrev > 1 &&
                pageNextAndPrev < datatotal / 10
            ) {
                paginatePrev.removeAttribute("disabled");
                paginateNext.removeAttribute("disabled");
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
            paginateNext.style.visibility = "visible";
            paginatePrev.style.visibility = "visible";
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
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].lrn
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].strand
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].firstname
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].middlename
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].lastname
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].address.substring(0, 10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].birthday
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].age
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].gender
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].civil_status
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].status
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].lrn
                                        }" class="button is-small is-success view-grad">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].lrn
                                        }" class="button is-small is-danger delete-grad">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            gradtabledata.innerHTML = htmlData;
            fillEmptyTable();
            viewGradPaginationData();
            removeGradPaginationData();
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].lrn
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].strand
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].firstname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].middlename
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].lastname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${data[
                                            i
                                        ].address.substring(0, 10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].birthday
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].age
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].gender
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].civil_status
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].status
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].lrn
                                            }" class="button is-small is-success view-grad">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].lrn
                                            }" class="button is-small is-danger delete-grad">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                gradtabledata.innerHTML = htmlData;

                fillEmptyTable();
                viewGradPaginationData();
                removeGradPaginationData();
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].lrn
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].strand
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].firstname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].middlename
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].lastname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[
                                            i
                                        ].address.substring(0, 10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].birthday
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].age
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].gender
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].civil_status
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].status
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].lrn
                                            }" class="button is-small is-success view-grad">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].lrn
                                            }" class="button is-small is-danger delete-grad">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                gradtabledata.innerHTML = htmlData;

                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewGradPaginationData();
                removeGradPaginationData();
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].lrn
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].strand
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].firstname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].middlename
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].lastname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[
                                            i
                                        ].address.substring(0, 10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].birthday
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].age
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].gender
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].civil_status
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].status
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].lrn
                                            }" class="button is-small is-success view-grad">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].lrn
                                            }" class="button is-small is-danger delete-grad">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                gradtabledata.innerHTML = htmlData;
                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewGradPaginationData();
                removeGradPaginationData();
            };
            paginatePrev.addEventListener("click", setPrevPage, false);
        };
        loadFirstPagination();
        loadPaginationPage(datatotal);
        loadGradNextPage();
        loadGradPrevPage();
        loadSelectedPagination();
    };
    const fillOptionEmptyTable = selectTotal => {
        if (gradtabledata.childElementCount < 10) {
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
                                    <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                    <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                    <td class="data-style has-text-centered" style="color:transparent;">*</td>
                                    <td class="data-style has-text-centered">
                                        <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
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
        gradPaginationList.innerHTML = pageElement;
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
                url: `/admin/graduates/pages?page=${pageNextAndPrev}`,
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
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].lrn
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].strand
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].firstname
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].middlename
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].lastname
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].address.substring(0, 10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].birthday
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].age
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].gender
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].civil_status
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].status
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].lrn
                                        }" class="button is-small is-success view-grad">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].lrn
                                        }" class="button is-small is-danger delete-grad">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            gradtabledata.innerHTML = htmlData;

            fillOptionEmptyTable(selectTotal);
            viewGradPaginationData();
            removeGradPaginationData();
        };

        for (let x = 0, index = paginationLink.length; x < index; x++) {
            paginationLink[x].addEventListener(
                "click",
                loadOptionPagePerClick,
                false
            );
        }
    };

    const loadSearchPagination = () => {
        const graduateSearch = document.querySelector("#graduate-search");
        const graduateSelected = document.querySelector(
            "#graduate-search-selected"
        );

        const setSelectedValue = checkData => {
            let index = graduateSelected.options.length;
            if (checkData.length > 0) {
                for (let i = 0; i < index; i++) {
                    graduateSelected.options[i].removeAttribute("selected");
                    graduateSelected.options[i].removeAttribute("disabled");
                }
                for (let i = 0; i < index; i++) {
                    graduateSelected.options[i].setAttribute("disabled", "");
                }

                graduateSelected.selectedIndex = 0;
            }
        };
        const setToDefault = () => {
            paginateNext.style.visibility = "visible";
            paginatePrev.style.visibility = "visible";

            for (let i = 0, index = graduateSelected.length; i < index; i++) {
                graduateSelected.options[i].removeAttribute("selected");
                graduateSelected.options[i].removeAttribute("disabled");
            }

            paginateNext.removeAttribute("disabled");
            graduateSelected.options[0].setAttribute("disabled", "");
            graduateSelected.selectedIndex = 1;
        };

        const getgraduateSelected = async event => {
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
                url: `/admin/graduates/selected?select=${selected}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                selectedresponseData = await axios(AxiosOptionsSelected);
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].lrn
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].strand
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].firstname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].middlename
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].lastname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[
                                            i
                                        ].address.substring(0, 10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].birthday
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].age
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].gender
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].civil_status
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].status
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].lrn
                                            }" class="button is-small is-success view-grad">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].lrn
                                            }" class="button is-small is-danger delete-grad">Delete</a>
                                        </td>
                                    </tr>`;
                    selectCount += 1;
                }
                gradtabledata.innerHTML = htmlData;

                fillOptionEmptyTable(selectTotal);
                viewGradPaginationData();
                removeGradPaginationData();
            } catch (error) {
                console.log(error);
            }
            loadOptionPaginationPage();
            loadOptionPagination();
        };

        const getGraduateSearch = async event => {
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
                url: `/admin/graduates/search?val=${searchval}`,
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].lrn
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].strand
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].firstname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].middlename
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].lastname
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[
                                            i
                                        ].address.substring(0, 10)}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].birthday
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].age
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].gender
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].civil_status
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].status
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].lrn
                                            }" class="button is-small is-success view-grad">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].lrn
                                            }" class="button is-small is-danger delete-grad">Delete</a>
                                        </td>
                                    </tr>`;
                    searchdataCount += 1;
                }
                gradtabledata.innerHTML = htmlData;

                fillOptionEmptyTable(searchTotal);
                viewGradPaginationData();
                removeGradPaginationData();
            } catch (error) {
                console.log(error);
            }
            loadOptionPaginationPage();
            loadOptionPagination();
        };

        graduateSelected.addEventListener("change", getgraduateSelected, false);
        graduateSearch.addEventListener("keyup", getGraduateSearch, false);
    };

    loadInitialPagination();
    loadSearchPagination();
}
graduatesModule();
