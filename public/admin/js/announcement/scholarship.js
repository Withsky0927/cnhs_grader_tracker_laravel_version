function scholarshipsModule() {
    //const graduateViewButton = document.querySelectorAll(".grad-view-button");

    const scholarshipsPaginationList = document.querySelector(
        "#scholarships-pagination-list"
    );

    const scholarshipstabledata = document.querySelector("#scholarships-data");

    // page next and prev
    const paginateNext = document.querySelector("#paginate-next");
    const paginatePrev = document.querySelector("#paginate-prev");

    const scholarshipsForm = document.querySelector("#scholarships-form");
    let pageNextAndPrev = 1;

    scholarshipsForm.addEventListener(
        "submit",
        function(e) {
            e.preventDefault();
        },
        false
    );

    let scholarshipsAxiosOption = {
        url: "/admin/announcement/scholarship/pages",
        method: "get",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json;charset=UTF-8"
        }
    };

    function removeOptionPagination() {
        const paginationOptionLink = document.querySelectorAll(
            ".pagination-link"
        );

        for (let i = 0; i < paginationOptionLink.length; i++) {
            paginationOptionLink[i].style.visibility = "hidden";
        }
    }
    function viewScholarshipsPaginationData() {
        const viewScholarshipsButtton = document.querySelectorAll(
            ".view-scholarships"
        );
        const viewScholarshipsModal = document.querySelector(
            "#scholarships-view-modal"
        );
        const scholarshipsViewClose = document.querySelector(
            "#scholarships-view-modal-close"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");

        function insertScholarshipsViewData(data) {
            console.log(data);
            const school = document.querySelector("#view_scholarships_school");
            const schoolLink = document.querySelector(
                "#view_scholarships_link"
            );
            const grade = document.querySelector("#view_scholarships_grade");
            const scholarshipDescription = document.querySelector(
                "#view_scholarships_desc"
            );
            const scholarshipRequirements = document.querySelector(
                "#view_scholarships_req"
            );

            school.value = data.school_name;
            schoolLink.value = data.school_link;
            grade.value = data.grade;

            scholarshipDescription.value = data.scholarship_desc;
            scholarshipRequirements.value = data.scholarship_req;
        }
        function removeViewModalContainer() {
            htmlClipped.classList.remove("is-clipped");
            viewScholarshipsModal.classList.remove("is-active");
        }
        function showViewModalContainer() {
            htmlClipped.classList.add("is-clipped");
            viewScholarshipsModal.classList.add("is-active");

            scholarshipsViewClose.addEventListener(
                "click",
                removeViewModalContainer,
                false
            );
        }
        async function setViewModal(e) {
            const scholarshipsViewID = e.target.getAttribute("id").toString();

            const getScholarshipsView = {
                url: `/admin/announcement/scholarship/view/scholar?id=${scholarshipsViewID}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const reponseViewData = await axios(getScholarshipsView);
                viewData = reponseViewData.data;

                insertScholarshipsViewData(viewData.view_scholarships);
                showViewModalContainer();
            } catch (error) {
                console.log(error.response);
            }
        }
        for (
            let i = 0, index = viewScholarshipsButtton.length;
            i < index;
            i++
        ) {
            viewScholarshipsButtton[i].addEventListener(
                "click",
                setViewModal,
                false
            );
        }
    }

    function addScholarshipsPaginationData(event) {
        const addScholarshipsButton = document.querySelector(
            "#scholarships-add-button"
        );
        const scholarshipsAddModal = document.querySelector(
            "#scholarships-add-modal"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");
        const scholarshipsAddClose = document.querySelector(
            "#add-scholarships-modal-close"
        );
        const scholarshipsAddBtn = document.querySelector(
            "#add-scholarships-buttton"
        );
        const scholarshipsAddCancel = document.querySelector(
            "#add-scholarships-buttton-cancel"
        );
        const addErrorContainer = document.querySelector(
            "#add-error-container"
        );
        const addSuccessContainer = document.querySelector(
            "#add-success-container"
        );

        const school = document.querySelector("#add_scholarships_school");
        const schoolLink = document.querySelector("#add_scholarships_link");
        const grade = document.querySelector("#add_scholarships_grade");
        const scholarshipDescription = document.querySelector(
            "#add_scholarships_desc"
        );
        const scholarshipRequirements = document.querySelector(
            "#add_scholarships_req"
        );

        function showAddModalContainer() {
            htmlClipped.classList.add("is-clipped");
            scholarshipsAddModal.classList.add("is-active");

            school.selectedIndex = 0;
            schoolLink.value = "";
            grade.value = "";

            scholarshipDescription.value = "";
            scholarshipRequirements.value = "";

            scholarshipsAddClose.addEventListener(
                "click",
                removeAddModalContainer,
                false
            );
        }
        function removeAddModalContainer() {
            htmlClipped.classList.remove("is-clipped");
            scholarshipsAddModal.classList.remove("is-active");
            let errSiblings = addErrorContainer.previousSibling;
            let succSiblings = addSuccessContainer.previousSibling;

            while (errSiblings && errSiblings.nodeType !== 1) {
                errSiblings = errSiblings.previousSibling;
            }
            while (succSiblings && succSiblings.nodeType !== 1) {
                succSiblings = succSiblings.previousSibling;
            }
            if (errSiblings) {
                errSiblings.parentNode.removeChild(errSiblings);
            }
            if (succSiblings) {
                succSiblings.parentNode.removeChild(succSiblings);
            }
            addErrorContainer.style.display = "none";
            addSuccessContainer.style.display = "none";
        }

        async function insertDataIntoDatabase(event) {
            addSuccessContainer.style.display = "none";
            addErrorContainer.style.display = "none";
            addSuccessContainer.innerHTML = "";
            addErrorContainer.innerHTML = "";
            let errorsHtml = "";

            if (
                school.value === "School" ||
                !grade.value ||
                !scholarshipDescription.value ||
                !scholarshipRequirements.value
            ) {
                addErrorContainer.innerHTML =
                    '<p class="has-text-centered">Incomplete Field or invalid Field! please Complete Required fields!</p>';
                addErrorContainer.style.display = "block";
            }
            try {
                const responseAddData = await axios.post(
                    "/admin/announcement/scholarship",
                    {
                        school: school.value,
                        schoolLink: !schoolLink.value ? "*" : schoolLink.value,
                        grade: grade.value,
                        scholarshipDescription: scholarshipDescription.value,
                        scholarshipRequirements: scholarshipRequirements.value
                    }
                );

                if (responseAddData.data.errors) {
                    for (
                        let i = 0, index = responseAddData.data.errors.length;
                        i < index;
                        i++
                    ) {
                        errorsHtml += `<p class="has-text-left">${responseAddData.data.errors[i]}</p>`;
                    }
                    addErrorContainer.innerHTML = errorsHtml;
                    addErrorContainer.style.display = "block";
                } else if (!responseAddData.data.errors) {
                    addSuccessContainer.innerHTML =
                        '<p class="has-text-centered">Data Successfully Added!</p>';
                    addSuccessContainer.style.display = "block";
                    loadInitialPagination();
                }
            } catch (error) {
                console.log(error.response);
            }
        }

        scholarshipsAddBtn.addEventListener(
            "click",
            insertDataIntoDatabase,
            false
        );
        scholarshipsAddCancel.addEventListener(
            "click",
            removeAddModalContainer,
            false
        );
        addScholarshipsButton.addEventListener(
            "click",
            showAddModalContainer,
            false
        );
    }

    function editScholarshipsPaginationData() {
        const editScholarshipsButton = document.querySelectorAll(
            ".edit-scholarships"
        );
        const scholarshipsEditmodal = document.querySelector(
            "#scholarships-edit-modal"
        );
        const scholarshipsEditClose = document.querySelector(
            "#edit-scholarships-modal-close"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");
        const editConfirmBtn = document.querySelector(
            "#edit-scholarships-buttton-update"
        );
        const editCancelBtn = document.querySelector(
            "#edit-scholarships-buttton-cancel"
        );

        const school = document.querySelector("#edit_scholarships_school");
        const schoolLink = document.querySelector("#edit_scholarships_link");
        const grade = document.querySelector("#edit_scholarships_grade");
        const scholarshipDescription = document.querySelector(
            "#edit_scholarships_desc"
        );
        const scholarshipRequirements = document.querySelector(
            "#edit_scholarships_req"
        );

        const editErrorContainer = document.querySelector(
            "#edit-error-container"
        );
        const editSuccessContainer = document.querySelector(
            "#edit-success-container"
        );
        let scholarshipsId = "";
        let errorsHtml = "";

        function removeEditModal() {
            scholarshipsEditmodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
            school.selectedIndex = 0;
            schoolLink.value = "";
            grade.value = "";
            scholarshipDescription.value = "";
            scholarshipRequirements.value = "";
        }

        function removeEditModalContainer() {
            let errSiblings = editErrorContainer.previousSibling;
            let succSiblings = editSuccessContainer.previousSibling;

            while (errSiblings && errSiblings.nodeType !== 1) {
                errSiblings = errSiblings.previousSibling;
            }
            while (succSiblings && succSiblings.nodeType !== 1) {
                succSiblings = succSiblings.previousSibling;
            }
            if (errSiblings) {
                errSiblings.parentNode.removeChild(errSiblings);
            }
            if (succSiblings) {
                succSiblings.parentNode.removeChild(succSiblings);
            }
            editErrorContainer.style.display = "none";
            editSuccessContainer.style.display = "none";
            scholarshipsEditmodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        }

        async function updateModalData(event) {
            editErrorContainer.innerHTML = "";
            editSuccessContainer.innerHTML = "";
            if (
                school.value === "School" ||
                !grade.value ||
                !scholarshipDescription.value ||
                !scholarshipRequirements.value
            ) {
                editErrorContainer.innerHTML =
                    '<p class="has-text-centered">Incomplete Field or invalid Field! please Complete Required fields!</p>';
                editSuccessContainer.style.display = "block";
            } else {
                try {
                    const responseEditData = await axios.put(
                        `/admin/announcement/scholarship/edit/scholar/${scholarshipsId}`,
                        {
                            school: school.value,
                            schoolLink: !schoolLink.value
                                ? "*"
                                : schoolLink.value,
                            grade: grade.value,
                            scholarshipDescription:
                                scholarshipDescription.value,
                            scholarshipRequirements:
                                scholarshipRequirements.value
                        }
                    );
                    console.log(responseEditData);

                    if (responseEditData.data.errors) {
                        for (
                            let i = 0,
                                index = responseEditData.data.errors.length;
                            i < index;
                            i++
                        ) {
                            errorsHtml += `<p class="has-text-left">${responseEditData.data.errors[i]}</p>`;
                        }
                        editErrorContainer.innerHTML = errorsHtml;
                        editErrorContainer.style.display = "block";
                    } else if (!responseEditData.data.errors) {
                        editSuccessContainer.innerHTML =
                            '<p class="has-text-centered">Data Successfully Updated!</p>';
                        editSuccessContainer.style.display = "block";
                    }
                    loadInitialPagination();
                } catch (error) {
                    console.log(error.response);
                }
            }
        }

        function populateDefaultValue(responseData) {
            scholarshipsId = responseData.scholarship_id.toString();

            school.value = responseData.school_name;
            schoolLink.value = responseData.school_link;
            grade.value = responseData.grade;
            scholarshipDescription.value = responseData.scholarship_desc;
            scholarshipRequirements.value = responseData.scholarship_req;

            editCancelBtn.addEventListener(
                "click",
                removeEditModalContainer,
                false
            );
            editConfirmBtn.addEventListener("click", updateModalData, false);
        }

        async function showEditModal(id) {
            console.log(id);
            scholarshipsEditmodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");

            const getScholarshipsView = {
                url: `/admin/announcement/scholarship/view/scholar?id=${id}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const responseData = await axios(getScholarshipsView);
                populateDefaultValue(responseData.data.view_scholarships);
            } catch (error) {
                console.log(error);
            }

            scholarshipsEditClose.addEventListener(
                "click",
                removeEditModal,
                false
            );
        }

        function setEditModal(event) {
            const editData = event.target.getAttribute("id").toString();
            showEditModal(editData);
        }

        editScholarshipsButton;
        for (let i = 0, index = editScholarshipsButton.length; i < index; i++) {
            editScholarshipsButton[i].addEventListener(
                "click",
                setEditModal,
                false
            );
        }
    }

    function removeScholarshipsPaginationData() {
        const removeScholarshipsButtton = document.querySelectorAll(
            ".delete-scholarships"
        );
        const scholarshipsDeletemodal = document.querySelector(
            "#scholarships-delete-modal"
        );
        const scholarshipsDeleteClose = document.querySelector(
            "#delete-scholarships-modal-close"
        );
        const scholarshipsModalConfirmBtn = document.querySelector(
            "#delete-modal-button-confirm"
        );
        const scholarshipsModalCancelBtn = document.querySelector(
            "#delete-modal-button-cancel"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");

        function setDeleteModal(event) {
            const dataToBeDelete = event.target.getAttribute("id").toString();
            scholarshipsDeletemodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");
            scholarshipsDeleteClose.addEventListener(
                "click",
                removeDeleteModal,
                false
            );

            async function ConfirmDelete(e) {
                e.preventDefault();
                try {
                    const responseData = await axios.delete(
                        `/admin/announcement/scholarship/delete/scholar/${dataToBeDelete}`
                    );
                } catch (error) {
                    console.log(error.response);
                }
                scholarshipsDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
                loadInitialPagination();
            }

            function cancelDelete() {
                scholarshipsDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
            }

            scholarshipsModalConfirmBtn.addEventListener(
                "click",
                ConfirmDelete,
                false
            );
            scholarshipsModalCancelBtn.addEventListener(
                "click",
                cancelDelete,
                false
            );
        }

        function removeDeleteModal() {
            scholarshipsDeletemodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        }

        for (
            let i = 0, index = removeScholarshipsButtton.length;
            i < index;
            i++
        ) {
            removeScholarshipsButtton[i].addEventListener(
                "click",
                setDeleteModal,
                false
            );
        }
    }
    function removePrevAndNext() {
        paginateNext.style.visibility = "hidden";
        paginatePrev.style.visibility = "hidden";
    }

    function addPrevAndNext() {
        paginateNext.style.visibility = "visible";
        paginatePrev.style.visibility = "visible";
    }

    function loadSelectedPagination() {
        const paginationLink = document.querySelectorAll(".pagination-link");

        function removeIsCurrentClass() {
            for (let i = 0, index = paginationLink.length; i < index; i++) {
                paginationLink[i].classList.remove("is-current");
            }
        }

        async function loadPagePerClick(event) {
            // revert and add current data
            const pageNextAndPrev = parseInt(event.target.textContent);
            checkNextAndPrevNumber();
            removeIsCurrentClass();
            event.target.classList.add("is-current");

            let pagePerData = "";
            let perPage = 0;
            let total = 0;
            console.log(pageNextAndPrev);
            const perPageAxiosOption = {
                url: `/admin/announcement/scholarship/pages?page=${pageNextAndPrev}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            const responseData = await axios(perPageAxiosOption);
            PagePerdata = responseData.data.page_url;
            data = PagePerdata.data;
            total = PagePerdata.total;
            perPage = PagePerdata.per_page;
            htmlData = "";
            dataCount = 1;
            let index = 10;
            if (PagePerdata.to % 10 !== 0) {
                index = PagePerdata.to % 10;
                console.log(index);
            }

            for (let i = 0; i < index; i++) {
                htmlData += `<tr>
                                    <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].school_name.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].address.substring(0, 10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].grade
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].school_link
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].scholarship_id
                                        }" class="button is-small is-success view-scholarships">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].scholarship_id
                                        }" class="button is-small is-info edit-scholarships">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].scholarship_id
                                        }" class="button is-small is-danger delete-scholarships">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            scholarshipstabledata.innerHTML = htmlData;

            fillEmptyTable();
            viewScholarshipsPaginationData();
            addScholarshipsPaginationData();
            editScholarshipsPaginationData();
            removeScholarshipsPaginationData();
        }
        let index = 0;
        for (let x = 0, index = paginationLink.length; x < index; x++) {
            paginationLink[x].addEventListener(
                "click",
                loadPagePerClick,
                false
            );
        }
    }
    async function loadInitialPagination() {
        const response = await axios(scholarshipsAxiosOption);
        const PaginationData = response.data.page_url;
        let datatotal = PaginationData.total;
        let perpage = PaginationData.per_page;
        let data = PaginationData.data;
        let htmlData = "";
        let dataCount = 1;

        let dataTotalRemainder = datatotal % 10 >= 1 ? 1 : 0;
        let dataTotalWithRemainder = datatotal / 10 + dataTotalRemainder;
        function checkNextAndPrevNumber() {
            console.log(pageNextAndPrev);
            if (pageNextAndPrev <= 1) {
                paginatePrev.setAttribute("disabled", "");
                paginateNext.removeAttribute("disabled");
                pageNextAndPrev = 1;

                console.log("previous button is disable button");
            } else if (
                pageNextAndPrev > 1 &&
                pageNextAndPrev < Math.floor(dataTotalWithRemainder)
            ) {
                console.log(pageNextAndPrev);
                console.log("don't have a disable button");
                paginatePrev.removeAttribute("disabled");
                paginateNext.removeAttribute("disabled");
            } else if (pageNextAndPrev >= datatotal / 10) {
                console.log("next button is disable button");
                paginatePrev.removeAttribute("disabled");
                paginateNext.setAttribute("disabled", "");

                if (pageNextAndPrev === Math.floor(datatotal / 10)) {
                    pageNextAndPrev = Math.floor(datatotal / 10);
                } else if (
                    pageNextAndPrev > 1 &&
                    pageNextAndPrev > dataTotalWithRemainder
                ) {
                    pageNextAndPrev = pageNextAndPrev - 1;
                }
            }
        }

        // set style on next and previous page number box

        function SetPaginatePageOnNextPrev() {
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
        }

        // initialize the first page
        checkNextAndPrevNumber();
        function fillEmptyTable() {
            if (scholarshipstabledata.childElementCount < 10) {
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
                        scholarshipstabledata.insertAdjacentHTML(
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
            addPrevAndNext();
        }

        function loadFirstPagination() {
            for (let i = 0, index = PaginationData.to; i < index; i++) {
                htmlData += `<tr>
                                    <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].school_name.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].grade
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].school_link
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].scholarship_id
                                        }" class="button is-small is-success view-scholarships">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].scholarship_id
                                        }" class="button is-small is-info edit-scholarships">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].scholarship_id
                                        }" class="button is-small is-danger delete-scholarships">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            scholarshipstabledata.innerHTML = htmlData;
            fillEmptyTable();
            viewScholarshipsPaginationData();
            addScholarshipsPaginationData();
            editScholarshipsPaginationData();
            removeScholarshipsPaginationData();
        }

        // load
        function loadPaginationPage(dataTotals) {
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
            scholarshipsPaginationList.innerHTML = pageElement;
        }

        function loadSelectedPagination() {
            const paginationLink = document.querySelectorAll(
                ".pagination-link"
            );

            function removeIsCurrentClass() {
                for (let i = 0, index = paginationLink.length; i < index; i++) {
                    paginationLink[i].classList.remove("is-current");
                }
            }

            async function loadPagePerClick(event) {
                // revert and add current data
                pageNextAndPrev = parseInt(event.target.textContent);
                checkNextAndPrevNumber();
                removeIsCurrentClass();
                event.target.classList.add("is-current");

                let pagePerData = "";
                let perPage = 0;
                let total = 0;

                const perPageAxiosOption = {
                    url: `/admin/announcement/scholarship/pages?page=${pageNextAndPrev}`,
                    method: "get",
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json;charset=UTF-8"
                    }
                };

                const responseData = await axios(perPageAxiosOption);
                PagePerdata = responseData.data.page_url;
                data = PagePerdata.data;
                total = PagePerdata.total;
                perPage = PagePerdata.per_page;
                htmlData = "";
                dataCount = 1;
                let index = 10;
                if (PagePerdata.to % 10 != 0) {
                    index = PagePerdata.to % 10;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[
                                            i
                                        ].school_name.toUpperCase()}</td>
                        
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].grade
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].school_link
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].scholarship_id
                                            }" class="button is-small is-success view-scholarships">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].scholarship_id
                                            }" class="button is-small is-info edit-scholarships">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].scholarship_id
                                            }" class="button is-small is-danger delete-scholarships">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                scholarshipstabledata.innerHTML = htmlData;

                fillEmptyTable();
                viewScholarshipsPaginationData();
                addScholarshipsPaginationData();
                editScholarshipsPaginationData();
                removeScholarshipsPaginationData();
            }

            for (let x = 0, index = paginationLink.length; x < index; x++) {
                paginationLink[x].addEventListener(
                    "click",
                    loadPagePerClick,
                    false
                );
            }
        }

        function loadScholarshipsNextPage() {
            const setNextPage = async e => {
                pageNextAndPrev += 1;
                checkNextAndPrevNumber();

                const nextResponseData = await axios.get(
                    `/admin/announcement/scholarship/pages?page=${pageNextAndPrev}`
                );
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
                                        <td class="data-style has-text-centered is-size-7">${nextData[
                                            i
                                        ].school_name.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].grade
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].school_link
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].scholarship_id
                                            }" class="button is-small is-success view-scholarships">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].scholarship_id
                                            }" class="button is-small is-info edit-scholarships">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].scholarship_id
                                            }" class="button is-small is-danger delete-scholarships">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                scholarshipstabledata.innerHTML = htmlData;

                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewScholarshipsPaginationData();
                addScholarshipsPaginationData();
                editScholarshipsPaginationData();
                removeScholarshipsPaginationData();
            };
            paginateNext.addEventListener("click", setNextPage, false);
        }

        function loadScholarshipsPrevPage() {
            const setPrevPage = async e => {
                pageNextAndPrev -= 1;
                checkNextAndPrevNumber();

                const prevResponseData = await axios.get(
                    `/admin/announcement/scholarship/pages?page=${pageNextAndPrev}`
                );
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
                                        <td class="data-style has-text-centered is-size-7">${prevData[
                                            i
                                        ].school_name.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].grade
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].school_link
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].scholarship_id
                                            }" class="button is-small is-success view-scholarships">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].scholarship_id
                                            }" class="button is-small is-info edit-scholarships">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].scholarship_id
                                            }" class="button is-small is-danger delete-scholarships">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                scholarshipstabledata.innerHTML = htmlData;
                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewScholarshipsPaginationData();
                addScholarshipsPaginationData();
                editScholarshipsPaginationData();
                removeScholarshipsPaginationData();
            };
            paginatePrev.addEventListener("click", setPrevPage, false);
        }
        loadFirstPagination();
        loadPaginationPage(datatotal);
        loadScholarshipsNextPage();
        loadScholarshipsPrevPage();
        loadSelectedPagination();
    }
    function fillOptionEmptyTable() {
        const dataStyle = document.querySelectorAll(".data-style");
        for (let i = 0, index = dataStyle.length; i < index; i++) {
            dataStyle[i].style.color = "black";
            if (dataStyle[i].textContent === "*") {
                dataStyle[i].style.color = "#fff";
            }
        }
        removePrevAndNext();
    }

    function loadSearchPagination() {
        const scholarshipsSearch = document.querySelector(
            "#scholarships-search"
        );
        const scholarshipsSelected = document.querySelector(
            "#scholarships-search-selected"
        );

        function setSelectedValue(checkData) {
            let index = scholarshipsSelected.options.length;
            if (checkData.length > 0) {
                for (let i = 0; i < index; i++) {
                    scholarshipsSelected.options[i].removeAttribute("selected");
                    scholarshipsSelected.options[i].removeAttribute("disabled");
                }
                for (let i = 0; i < index; i++) {
                    scholarshipsSelected.options[i].setAttribute(
                        "disabled",
                        ""
                    );
                }

                scholarshipsSelected.selectedIndex = 0;
            }
        }
        function setToDefault() {
            for (
                let i = 0, index = scholarshipsSelected.length;
                i < index;
                i++
            ) {
                scholarshipsSelected.options[i].removeAttribute("selected");
                scholarshipsSelected.options[i].removeAttribute("disabled");
            }

            paginateNext.removeAttribute("disabled");
            scholarshipsSelected.options[0].setAttribute("disabled", "");
            scholarshipsSelected.selectedIndex = 1;
        }

        async function getScholarshipsSelected(event) {
            let selected = event.target.value.toString();

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

            try {
                const selectedresponseData = await axios.get(
                    `/admin/announcement/scholarship/selected?select=${selected}`
                );
                console.log(selectedresponseData);
                selectedPerPage =
                    selectedresponseData.data.selected_scholarships.per_page;
                selectTotal =
                    selectedresponseData.data.selected_scholarships.total;
                selectedData =
                    selectedresponseData.data.selected_scholarships.data;
                selectedTo = selectedresponseData.data.selected_scholarships.to;

                if (selectedTo % 500 != 0) {
                    index = selectedTo % 500;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${selectCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[
                                            i
                                        ].school_name.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].grade
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].school_link
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].scholarship_id
                                            }" class="button is-small is-success view-scholarships">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].scholarship_id
                                            }" class="button is-small is-info edit-scholarships">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].scholarship_id
                                            }" class="button is-small is-danger delete-scholarships">Delete</a>
                                        </td>
                                    </tr>`;
                    selectCount += 1;
                }
                scholarshipstabledata.innerHTML = htmlData;

                fillOptionEmptyTable();
                viewScholarshipsPaginationData();
                addScholarshipsPaginationData();
                editScholarshipsPaginationData();
                removeScholarshipsPaginationData();
            } catch (error) {
                console.log(error.response);
            }
            removeOptionPagination();
        }

        async function getScholarshipsSearch(event) {
            event.preventDefault();
            let searchval = encodeURIComponent(event.target.value);
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
            paginateNext.style.visibility = "visible";
            paginatePrev.style.visibility = "visible";

            try {
                searchresponseData = await axios.get(
                    `/admin/announcement/scholarship/search?val=${searchval}`
                );
                console.log(searchresponseData);
                searchPerPage = searchresponseData.data.search_data.per_page;
                searchTotal = searchresponseData.data.search_data.total;
                searchTo = searchresponseData.data.search_data.to;
                searchData = searchresponseData.data.search_data.data;

                let index = 500;
                if (searchTo % 500 != 0) {
                    index = searchTo % 500;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${searchdataCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[
                                            i
                                        ].school_name.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].grade
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].school_link
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].scholarship_id
                                            }" class="button is-small is-success view-scholarships">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].scholarship_id
                                            }" class="button is-small is-info edit-scholarships">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].scholarship_id
                                            }" class="button is-small is-danger delete-scholarships">Delete</a>
                                        </td>
                                    </tr>`;
                    searchdataCount += 1;
                }
                scholarshipstabledata.innerHTML = htmlData;

                fillOptionEmptyTable();
                viewScholarshipsPaginationData();
                addScholarshipsPaginationData();
                editScholarshipsPaginationData();
                removeScholarshipsPaginationData();
            } catch (error) {
                console.log(error.response);
            }
            removeOptionPagination();
        }

        scholarshipsSelected.addEventListener(
            "change",
            getScholarshipsSelected,
            false
        );
        scholarshipsSearch.addEventListener(
            "keyup",
            getScholarshipsSearch,
            false
        );
    }

    loadInitialPagination();
    loadSearchPagination();
}
scholarshipsModule();
