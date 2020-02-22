function examinationsModule() {
    /*
        new Jodit("#view_reports_description", {
            readonly: true,
            buttons:
                "|,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,paragraph,|,table,link,,align,undo,redo,\n,selectall,cut,copy,paste,|,hr"
        });
    
    */
    const examinationsPaginationList = document.querySelector(
        "#examinations-pagination-list"
    );

    const examinationstabledata = document.querySelector("#examinations-data");

    // page next and prev
    const paginateNext = document.querySelector("#paginate-next");
    const paginatePrev = document.querySelector("#paginate-prev");

    const examinationsForm = document.querySelector("#examinations-form");
    let pageNextAndPrev = 1;

    examinationsForm.addEventListener(
        "submit",
        function(e) {
            e.preventDefault();
        },
        false
    );

    let examinationsAxiosOption = {
        url: "/admin/announcement/examination/pages",
        method: "get",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json;charset=UTF-8"
        }
    };

    // get the year - from 1950 to present
    function manipulateDate(id) {
        const year = document.querySelector(id);
        let allDate = "";
        let currentYear = 0;

        if (id === "#add_exam_date_year" || id === "#edit_exam_date_year") {
            currentYear = new Date().getFullYear();
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
    }

    function removeOptionPagination() {
        const paginationOptionLink = document.querySelectorAll(
            ".pagination-link"
        );

        for (let i = 0; i < paginationOptionLink.length; i++) {
            paginationOptionLink[i].style.visibility = "hidden";
        }
    }
    function viewExaminationsPaginationData() {
        const viewExaminationsButtton = document.querySelectorAll(
            ".view-examinations"
        );
        const viewExaminationsModal = document.querySelector(
            "#examinations-view-modal"
        );
        const ExaminationsViewClose = document.querySelector(
            "#examinations-view-modal-close"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");
        //  "#view_exam_desc"
        const school = document.querySelector("#view_school_name");
        let examinationDescription = new Jodit("#view_exam_desc", {
            readonly: true,
            disablePlugins: "draganddrop,iframe,xpath",
            allowResizeY: false,
            buttons:
                "|,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,paragraph,|,link,|,align,undo,redo,\n,selectall,cut,copy,paste,|,hr"
        });
        const examinationDate = document.querySelector("#view_exam_date");

        function insertExaminationsViewData(data) {
            examinationDescription.value = data.exam_description;
            school.value = data.school.toUpperCase();
            examinationDate.value = data.examination_date;
        }
        function removeViewModalContainer() {
            htmlClipped.classList.remove("is-clipped");
            viewExaminationsModal.classList.remove("is-active");
        }
        function showViewModalContainer() {
            htmlClipped.classList.add("is-clipped");
            viewExaminationsModal.classList.add("is-active");

            ExaminationsViewClose.addEventListener(
                "click",
                removeViewModalContainer,
                false
            );
        }
        async function setViewModal(e) {
            const examinationsViewID = e.target.getAttribute("id").toString();

            const getExaminationsView = {
                url: `/admin/announcement/examination/view/exam?id=${examinationsViewID}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const reponseViewData = await axios(getExaminationsView);
                viewData = reponseViewData.data;

                insertExaminationsViewData(viewData.view_examinations);
                showViewModalContainer();
            } catch (error) {
                console.log(error);
            }
        }
        for (
            let i = 0, index = viewExaminationsButtton.length;
            i < index;
            i++
        ) {
            viewExaminationsButtton[i].addEventListener(
                "click",
                setViewModal,
                false
            );
        }
    }

    function addExamPaginationData(event) {
        const addExaminationsButton = document.querySelector(
            "#examinations-add-button"
        );
        const examinationsAddModal = document.querySelector(
            "#examinations-add-modal"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");
        const examinationsAddClose = document.querySelector(
            "#add-examinations-modal-close"
        );
        const examinationsAddBtn = document.querySelector(
            "#add-examinations-buttton"
        );
        const examinationsAddCancel = document.querySelector(
            "#add-examinations-buttton-cancel"
        );
        const addErrorContainer = document.querySelector(
            "#add-error-container"
        );
        const addSuccessContainer = document.querySelector(
            "#add-success-container"
        );

        const school = document.querySelector("#add_school_name");
        const examDescription = new Jodit("#add_exam_desc", {
            disablePlugins: "draganddrop,iframe,xpath",
            allowResizeY: false,
            buttons:
                "|,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,paragraph,|,link,|,align,undo,redo,\n,selectall,cut,copy,paste,|,hr"
        });
        const examDateMonth = document.querySelector("#add_exam_date_month");
        const examDateDay = document.querySelector("#add_exam_date_day");
        const examDateYear = document.querySelector("#add_exam_date_year");
        function removeAddModalContainer() {
            htmlClipped.classList.remove("is-clipped");
            examinationsAddModal.classList.remove("is-active");
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
        function showAddModalContainer() {
            htmlClipped.classList.add("is-clipped");
            examinationsAddModal.classList.add("is-active");

            school.selectedIndex = 0;
            examDescription.value = "";

            examDateMonth.selectedIndex = 0;
            examDateDay.selectedIndex = 0;
            examDateYear.selectedIndex = 0;

            examinationsAddClose.addEventListener(
                "click",
                removeAddModalContainer,
                false
            );
        }

        async function insertDataIntoDatabase(event) {
            addSuccessContainer.style.display = "none";
            addErrorContainer.style.display = "none";
            addSuccessContainer.innerHTML = "";
            addErrorContainer.innerHTML = "";
            let errorsHtml = "";

            if (
                !school.value ||
                !examDescription.value ||
                examDateDay.value === "Day" ||
                examDateMonth.value === "Month" ||
                examDateYear.value === "Year"
            ) {
                addErrorContainer.innerHTML =
                    '<p class="has-text-centered">Incomplete Field or invalid Field! please Complete Required fields!</p>';
                addErrorContainer.style.display = "block";
            }
            try {
                const responseAddData = await axios.post(
                    "/admin/announcement/examination",
                    {
                        school: school.value,
                        examDescription: examDescription.value,
                        examinationDate: `${examDateYear.value}-${examDateMonth.value}-${examDateDay.value}`
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
                console.log(error);
            }
        }

        examinationsAddBtn.addEventListener(
            "click",
            insertDataIntoDatabase,
            false
        );
        examinationsAddCancel.addEventListener(
            "click",
            removeAddModalContainer,
            false
        );
        addExaminationsButton.addEventListener(
            "click",
            showAddModalContainer,
            false
        );
    }

    function editExaminationsPaginationData() {
        const editExaminationsButton = document.querySelectorAll(
            ".edit-examinations"
        );
        const examinationsEditmodal = document.querySelector(
            "#examinations-edit-modal"
        );
        const examinationsEditClose = document.querySelector(
            "#edit-examinations-modal-close"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");
        const editConfirmBtn = document.querySelector(
            "#edit-examinations-buttton-update"
        );
        const editCancelBtn = document.querySelector(
            "#edit-examinations-buttton-cancel"
        );

        const school = document.querySelector("#edit_school_name");
        const examDescription = new Jodit("#edit_exam_desc", {
            disablePlugins: "draganddrop,iframe,xpath",
            allowResizeY: false,
            buttons:
                "|,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,paragraph,|,link,|,align,undo,redo,\n,selectall,cut,copy,paste,|,hr"
        });
        const examinationDate = document.querySelector(
            "#edit_examination_date"
        );

        const examDateMonth = document.querySelector("#edit_exam_date_month");
        const examDateDay = document.querySelector("#edit_exam_date_day");
        const examDateYear = document.querySelector("#edit_exam_date_year");

        const editErrorContainer = document.querySelector(
            "#edit-error-container"
        );
        const editSuccessContainer = document.querySelector(
            "#edit-success-container"
        );
        let examinationsId = "";
        let errorsHtml = "";

        function removeEditModal() {
            examinationsEditmodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
            school.value = "";
            examDescription.value = "";
            examDateMonth.selectedIndex = 0;
            examDateDay.selectedIndex = 0;
            examDateYear.selectedIndex = 0;
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
            examinationsEditmodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        }

        async function updateModalData(event) {
            editErrorContainer.style.display = "none";
            editSuccessContainer.style.display = "none";
            editErrorContainer.innerHTML = "";
            editSuccessContainer.innerHTML = "";

            if (
                !school.value == "school" ||
                !examDescription.value ||
                examDateDay.value === "Day" ||
                examDateMonth.value === "Month" ||
                examDateYear.value === "Year"
            ) {
                editErrorContainer.innerHTML =
                    '<p class="has-text-centered">Incomplete Field or invalid Field! please Complete Required fields!</p>';
                editSuccessContainer.style.display = "block";
            } else {
                try {
                    const responseEditData = await axios.put(
                        `/admin/announcement/examination/edit/exam/${examinationsId}`,
                        {
                            school: school.value,
                            examDescription: examDescription.value,
                            examinationDate: `${examDateYear.value}-${examDateMonth.value}-${examDateDay.value}`
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
            const ExamEditDateData = responseData.examination_date.split("-");
            examinationsId = responseData.exam_id.toString();
            console.log(responseData);
            school.value = responseData.school;
            examDescription.value = responseData.exam_description;
            examDateMonth.value = ExamEditDateData[1];
            examDateDay.value = ExamEditDateData[2];
            examDateYear.value = ExamEditDateData[0];

            editCancelBtn.addEventListener(
                "click",
                removeEditModalContainer,
                false
            );
            editConfirmBtn.addEventListener("click", updateModalData, false);
        }

        async function showEditModal(id) {
            examinationsEditmodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");

            const getExaminationsView = {
                url: `/admin/announcement/examination/view/exam?id=${id}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const responseData = await axios(getExaminationsView);
                populateDefaultValue(responseData.data.view_examinations);
            } catch (error) {
                console.log(error);
            }

            examinationsEditClose.addEventListener(
                "click",
                removeEditModal,
                false
            );
        }

        function setEditModal(event) {
            const editData = event.target.getAttribute("id").toString();
            console.log(editData);
            showEditModal(editData);
        }

        for (let i = 0, index = editExaminationsButton.length; i < index; i++) {
            editExaminationsButton[i].addEventListener(
                "click",
                setEditModal,
                false
            );
        }
    }

    function removeExaminationsPaginationData() {
        const removeExaminationsButtton = document.querySelectorAll(
            ".delete-examinations"
        );
        const examinationsDeletemodal = document.querySelector(
            "#examinations-delete-modal"
        );
        const examinationsDeleteClose = document.querySelector(
            "#delete-examinations-modal-close"
        );
        const examinationsModalConfirmBtn = document.querySelector(
            "#delete-modal-button-confirm"
        );
        const examinationsModalCancelBtn = document.querySelector(
            "#delete-modal-button-cancel"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");

        function setDeleteModal(event) {
            const dataToBeDelete = event.target.getAttribute("id").toString();
            examinationsDeletemodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");
            examinationsDeleteClose.addEventListener(
                "click",
                removeDeleteModal,
                false
            );

            async function ConfirmDelete(e) {
                e.preventDefault();
                try {
                    const responseData = await axios.delete(
                        `/admin/announcement/examination/delete/exam/${dataToBeDelete}`
                    );
                } catch (error) {
                    console.log(error);
                }
                examinationsDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
                loadInitialPagination();
            }

            function cancelDelete() {
                examinationsDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
            }

            examinationsModalConfirmBtn.addEventListener(
                "click",
                ConfirmDelete,
                false
            );
            examinationsModalCancelBtn.addEventListener(
                "click",
                cancelDelete,
                false
            );
        }

        function removeDeleteModal() {
            examinationsDeletemodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        }

        for (
            let i = 0, index = removeExaminationsButtton.length;
            i < index;
            i++
        ) {
            removeExaminationsButtton[i].addEventListener(
                "click",
                setDeleteModal,
                false
            );
        }
    }
    manipulateDate("#add_exam_date_year");
    manipulateDate("#edit_exam_date_year");

    function removePrevAndNext() {
        paginateNext.style.visibility = "hidden";
        paginatePrev.style.visibility = "hidden";

        //paginateNext.setAttribute("disabled", "");
        //paginatePrev.setAttribute("disabled", "");
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
                url: `/admin/announcement/examination/pages?page=${pageNextAndPrev}`,
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
                                    ].school.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].exam_description.substring(0, 10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].examination_date
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].exam_id
                                        }" class="button is-small is-success view-examinations">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].exam_id
                                        }" class="button is-small is-info edit-examinations">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].exam_id
                                        }" class="button is-small is-danger delete-examinations">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            examinationstabledata.innerHTML = htmlData;

            fillEmptyTable();
            viewExaminationsPaginationData();
            addExamPaginationData();
            editExaminationsPaginationData();
            removeExaminationsPaginationData();
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
        const response = await axios(examinationsAxiosOption);
        const PaginationData = response.data.page_url;
        let datatotal = PaginationData.total;
        let perpage = PaginationData.per_page;
        let data = PaginationData.data;
        let htmlData = "";
        let dataCount = 1;

        let dataTotalRemainder = datatotal % 10 >= 1 ? 1 : 0;
        let dataTotalWithRemainder = datatotal / 10 + dataTotalRemainder;
        function checkNextAndPrevNumber() {
            if (pageNextAndPrev <= 1) {
                paginatePrev.setAttribute("disabled", "");
                paginateNext.removeAttribute("disabled");
                pageNextAndPrev = 1;
            } else if (
                pageNextAndPrev > 1 &&
                pageNextAndPrev < Math.floor(dataTotalWithRemainder)
            ) {
                paginatePrev.removeAttribute("disabled");
                paginateNext.removeAttribute("disabled");
            } else if (pageNextAndPrev >= datatotal / 10) {
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
            if (examinationstabledata.childElementCount < 10) {
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
                        examinationstabledata.insertAdjacentHTML(
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
                                    ].school.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].exam_description.substring(0, 10)}...</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].examination_date
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].exam_id
                                        }" class="button is-small is-success view-examinations">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].exam_id
                                        }" class="button is-small is-info edit-examinations">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].exam_id
                                        }" class="button is-small is-danger delete-examinations">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            examinationstabledata.innerHTML = htmlData;
            fillEmptyTable();
            viewExaminationsPaginationData();
            addExamPaginationData();
            editExaminationsPaginationData();
            removeExaminationsPaginationData();
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
            examinationsPaginationList.innerHTML = pageElement;
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
                    url: `/admin/announcement/examination/pages?page=${pageNextAndPrev}`,
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
                                        ].school.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[
                                            i
                                        ].exam_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].examination_date
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].exam_id
                                            }" class="button is-small is-success view-examinations">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].exam_id
                                            }" class="button is-small is-info edit-examinations">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].exam_id
                                            }" class="button is-small is-danger delete-examinations">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                examinationstabledata.innerHTML = htmlData;

                fillEmptyTable();
                viewExaminationsPaginationData();
                addExamPaginationData();
                editExaminationsPaginationData();
                removeExaminationsPaginationData();
            }

            for (let x = 0, index = paginationLink.length; x < index; x++) {
                paginationLink[x].addEventListener(
                    "click",
                    loadPagePerClick,
                    false
                );
            }
        }

        function loadExaminationsNextPage() {
            async function setNextPage(e) {
                pageNextAndPrev = pageNextAndPrev + 1;
                checkNextAndPrevNumber();
                console.log(pageNextAndPrev);
                const setNextAxiosOpt = {
                    url: `/admin/announcement/examination/pages?page=${pageNextAndPrev}`,
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
                                        <td class="data-style has-text-centered is-size-7">${nextData[
                                            i
                                        ].school.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[
                                            i
                                        ].exam_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].examination_date
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].exam_id
                                            }" class="button is-small is-success view-examinations">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].exam_id
                                            }" class="button is-small is-info edit-examinations">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].exam_id
                                            }" class="button is-small is-danger delete-examinations">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                examinationstabledata.innerHTML = htmlData;

                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewExaminationsPaginationData();
                addExamPaginationData();
                editExaminationsPaginationData();
                removeExaminationsPaginationData();
            }

            paginateNext.addEventListener("click", setNextPage, false);
        }

        function loadExaminationsPrevPage() {
            async function setPrevPage(e) {
                pageNextAndPrev -= 1;
                checkNextAndPrevNumber();

                const setPreviousAxiosOpt = {
                    url: `/admin/announcement/examination/pages?page=${pageNextAndPrev}`,
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
                                        <td class="data-style has-text-centered is-size-7">${prevData[
                                            i
                                        ].school.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[
                                            i
                                        ].exam_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].examination_date
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].exam_id
                                            }" class="button is-small is-success view-examinations">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].exam_id
                                            }" class="button is-small is-info edit-examinations">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].exam_id
                                            }" class="button is-small is-danger delete-examinations">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                examinationstabledata.innerHTML = htmlData;
                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewExaminationsPaginationData();
                addExamPaginationData();
                editExaminationsPaginationData();
                removeExaminationsPaginationData();
            }
            paginatePrev.addEventListener("click", setPrevPage, false);
        }
        loadFirstPagination();
        loadPaginationPage(datatotal);
        loadExaminationsNextPage();
        loadExaminationsPrevPage();
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
        const examinationsSearch = document.querySelector(
            "#examinations-search"
        );
        const examinationsSelected = document.querySelector(
            "#examinations-search-selected"
        );

        function setSelectedValue(checkData) {
            let index = examinationsSelected.options.length;
            if (checkData.length > 0) {
                for (let i = 0; i < index; i++) {
                    examinationsSelected.options[i].removeAttribute("selected");
                    examinationsSelected.options[i].removeAttribute("disabled");
                }
                for (let i = 0; i < index; i++) {
                    examinationsSelected.options[i].setAttribute(
                        "disabled",
                        ""
                    );
                }

                examinationsSelected.selectedIndex = 0;
            }
        }
        function setToDefault() {
            for (
                let i = 0, index = examinationsSelected.length;
                i < index;
                i++
            ) {
                examinationsSelected.options[i].removeAttribute("selected");
                examinationsSelected.options[i].removeAttribute("disabled");
            }

            paginateNext.removeAttribute("disabled");
            examinationsSelected.options[0].setAttribute("disabled", "");
            examinationsSelected.selectedIndex = 1;
        }

        async function getExaminationsSelected(event) {
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
                removeOptionPagination();
                if (selected === "all") {
                    setToDefault();
                    loadInitialPagination();
                    return false;
                }
            }

            const AxiosOptionsSelected = {
                url: `/admin/announcement/examination/selected?select=${selected}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const selectedresponseData = await axios(AxiosOptionsSelected);
                console.log(selectedresponseData);
                selectedPerPage =
                    selectedresponseData.data.selected_school.per_page;
                selectTotal = selectedresponseData.data.selected_school.total;
                selectedData = selectedresponseData.data.selected_school.data;
                selectedTo = selectedresponseData.data.selected_school.to;

                if (selectedTo % 500 != 0) {
                    index = selectedTo % 500;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${selectCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[
                                            i
                                        ].school.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[
                                            i
                                        ].exam_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].examination_date
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].exam_id
                                            }" class="button is-small is-success view-examinations">View</a>
                                        </td>
                                         <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].exam_id
                                            }" class="button is-small is-info edit-examinations">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].exam_id
                                            }" class="button is-small is-danger delete-examinations">Delete</a>
                                        </td>
                                    </tr>`;
                    selectCount += 1;
                }
                examinationstabledata.innerHTML = htmlData;

                fillOptionEmptyTable();
                viewExaminationsPaginationData();
                addExamPaginationData();
                editExaminationsPaginationData();
                removeExaminationsPaginationData();
            } catch (error) {
                console.log(error);
            }
        }

        async function getExaminationsSearch(event) {
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
                removeOptionPagination();
            }

            const AxiosOptionsSearch = {
                url: `/admin/announcement/examination/search?val=${searchval}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                searchresponseData = await axios(AxiosOptionsSearch);
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
                                        ].school.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[
                                            i
                                        ].exam_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].examination_date
                                        }</td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].exam_id
                                            }" class="button is-small is-success view-examinations">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].exam_id
                                            }" class="button is-small is-info edit-examinations">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].exam_id
                                            }" class="button is-small is-danger delete-examinations">Delete</a>
                                        </td>
                                    </tr>`;
                    searchdataCount += 1;
                }
                examinationstabledata.innerHTML = htmlData;

                fillOptionEmptyTable();
                viewExaminationsPaginationData();
                addExamPaginationData();
                editExaminationsPaginationData();
                removeExaminationsPaginationData();
            } catch (error) {
                console.log(error);
            }
        }

        examinationsSelected.addEventListener(
            "change",
            getExaminationsSelected,
            false
        );
        examinationsSearch.addEventListener(
            "keyup",
            getExaminationsSearch,
            false
        );
    }

    loadInitialPagination();
    loadSearchPagination();
}
examinationsModule();
