function reportsModule() {
    //const graduateViewButton = document.querySelectorAll(".grad-view-button");

    const reportsPaginationList = document.querySelector(
        "#reports-pagination-list"
    );

    const reportstabledata = document.querySelector("#reports-data");

    // page next and prev
    const paginateNext = document.querySelector("#paginate-next");
    const paginatePrev = document.querySelector("#paginate-prev");

    const reportsForm = document.querySelector("#reports-form");

    const fileName = document.querySelectorAll(".file-name");
    let pageNextAndPrev = 1;

    reportsForm.addEventListener(
        "submit",
        function(e) {
            e.preventDefault();
        },
        false
    );

    let reportsAxiosOption = {
        url: "/admin/reports/pages",
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
    function downloadReportPaginationData() {
        const downloadReportButton = document.querySelectorAll(
            ".download-reports"
        );

        function downloadReport(documentData) {
            const data = atob(documentData.data.document[0].report_document);
            const fileName = documentData.data.document[0].report_document_name;
            const mimeType = documentData.data.document[0].report_mime;
            console.log(fileName);
            let arrayBytes = new Uint8Array(data.length);

            const dataLength = data.length;
            for (let i = 0; i < dataLength; i++) {
                arrayBytes[i] = data.charCodeAt(i);
            }

            const url = window.URL.createObjectURL(
                new File([arrayBytes], fileName, { type: mimeType })
            );
            const downloadLink = document.createElement("a");
            downloadLink.setAttribute("id", "download-link");
            downloadLink.style.color = "transparent";
            downloadLink.href = url;
            document.body.appendChild(downloadLink);
            downloadLink.click();

            const downLink = document.querySelector("#download-link");
            downloadLink.remove();
            window.URL.revokeObjectURL(url);
            return false;
        }

        async function downloadDocument(event) {
            const reportID = event.target.getAttribute("id").toString();
            const getDocumentDownload = {
                url: `/admin/reports/download/report?id=${reportID}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const responseData = await axios(getDocumentDownload);
                //console.log(responseData);
                downloadReport(responseData);
            } catch (error) {
                console.log(error.response);
            }
        }

        for (let i = 0, index = downloadReportButton.length; i < index; i++) {
            downloadReportButton[i].addEventListener(
                "click",
                downloadDocument,
                false
            );
        }
    }
    function viewReportsPaginationData() {
        const viewReportsButtton = document.querySelectorAll(".view-reports");
        const viewReportsModal = document.querySelector("#reports-view-modal");
        const reportsViewClose = document.querySelector(
            "#view-reports-modal-close"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");
        const reportsName = document.querySelector("#view_reports_name");
        const reportsType = document.querySelector("#view_reports_type");
        const reportsDescription = new Jodit("#view_reports_description", {
            readonly: true,
            disablePlugins: "draganddrop,iframe,xpath",
            allowResizeY: false,
            height: "100%",
            buttons:
                "|,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,paragraph,|,link,|,align,undo,redo,\n,selectall,cut,copy,paste,|,hr"
        });
        const reportsUploadedBy = document.querySelector(
            "#view_reports_uploaded_by"
        );

        function insertReportsViewData(data) {
            reportsName.value = data[0].report_name;
            reportsType.value = data[0].report_type;
            reportsDescription.value = data[0].report_description;
            reportsUploadedBy.value = data[0].uploaded_by;
        }
        function removeViewModalContainer() {
            htmlClipped.classList.remove("is-clipped");
            viewReportsModal.classList.remove("is-active");
        }
        function showViewModalContainer() {
            htmlClipped.classList.add("is-clipped");
            viewReportsModal.classList.add("is-active");

            reportsViewClose.addEventListener(
                "click",
                removeViewModalContainer,
                false
            );
        }
        async function setViewModal(e) {
            const reportsViewID = e.target.getAttribute("id").toString();

            const getReportsView = {
                url: `/admin/reports/view/report?id=${reportsViewID}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const reponseViewData = await axios(getReportsView);
                viewData = reponseViewData.data;

                insertReportsViewData(viewData.view_reports.data);
                showViewModalContainer();
            } catch (error) {
                console.log(error.response);
            }
        }
        for (let i = 0, index = viewReportsButtton.length; i < index; i++) {
            viewReportsButtton[i].addEventListener(
                "click",
                setViewModal,
                false
            );
        }
    }

    function addReportsPaginationData(event) {
        const addReportForm = document.querySelector("#add-report-form");
        const addReportsButton = document.querySelector("#reports-add-button");
        const reportsAddModal = document.querySelector("#reports-add-modal");
        const htmlClipped = document.querySelector("#clippedmodifier");
        const reportsAddClose = document.querySelector(
            "#add-reports-modal-close"
        );
        const reportsAddBtn = document.querySelector("#add-reports-buttton");
        const reportsAddCancel = document.querySelector(
            "#add-reports-buttton-cancel"
        );
        const addErrorContainer = document.querySelector(
            "#add-error-container"
        );
        const addSuccessContainer = document.querySelector(
            "#add-success-container"
        );

        const reportsName = document.querySelector("#add_reports_name");
        const reportsType = document.querySelector("#add_reports_type");
        let reportsDescription = new Jodit("#add_reports_description", {
            disablePlugins: "draganddrop,iframe,xpath",
            allowResizeY: false,
            height: "100%",
            buttons:
                "|,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,paragraph,|,link,|,align,undo,redo,\n,selectall,cut,copy,paste,|,hr"
        });
        const reportsDocument = document.querySelector("#Document");

        function showAddModalContainer() {
            htmlClipped.classList.add("is-clipped");
            reportsAddModal.classList.add("is-active");

            reportsName.value = "";
            reportsType.selectedIndex = 0;
            reportsDescription.value = "";
            reportsDescription.value = "";
            reportsDocument.value = "";

            fileName[0].textContent = "No Document Uploaded";

            reportsAddClose.addEventListener(
                "click",
                removeAddModalContainer,
                false
            );
        }
        function removeAddModalContainer() {
            htmlClipped.classList.remove("is-clipped");
            reportsAddModal.classList.remove("is-active");
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
            event.preventDefault();
            addSuccessContainer.style.display = "none";
            addErrorContainer.style.display = "none";
            addSuccessContainer.innerHTML = "";
            addErrorContainer.innerHTML = "";
            let errorsHtml = "";

            if (
                !reportsName.value ||
                !reportsType.value ||
                !reportsDescription.value ||
                reportsDocument.value === ""
            ) {
                addErrorContainer.innerHTML =
                    '<p class="has-text-centered">Incomplete Field or invalid Field! please Complete Required fields!</p>';
                addErrorContainer.style.display = "block";
            } else {
                try {
                    const responseAddData = await axios.post(
                        "/admin/reports",
                        new FormData(addReportForm)
                    );
                    console.log(responseAddData);
                    if (responseAddData.data.errors) {
                        for (
                            let i = 0,
                                index = responseAddData.data.errors.length;
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
        }

        addReportForm.addEventListener("submit", insertDataIntoDatabase, false);
        reportsAddCancel.addEventListener(
            "click",
            removeAddModalContainer,
            false
        );
        addReportsButton.addEventListener(
            "click",
            showAddModalContainer,
            false
        );
    }

    function editReportsPaginationData() {
        const editReportForm = document.querySelector("#edit-report-form");
        const editReportsButton = document.querySelectorAll(".edit-reports");
        const editReportsFileName = document.querySelector(
            "reports_edit_filename"
        );
        const reportsEditmodal = document.querySelector("#reports-edit-modal");
        const reportsEditClose = document.querySelector(
            "#edit-reports-modal-close"
        );

        const htmlClipped = document.querySelector("#clippedmodifier");
        const editConfirmBtn = document.querySelector(
            "#edit-reports-buttton-update"
        );
        const editCancelBtn = document.querySelector(
            "#edit-reports-buttton-cancel"
        );

        const reportsName = document.querySelector("#edit_reports_name");
        const reportsType = document.querySelector("#edit_reports_type");
        let reportsDescription = new Jodit("#edit_reports_description", {
            disablePlugins: "draganddrop,iframe,xpath",
            allowResizeY: false,
            height: "100%",
            buttons:
                "|,bold,strikethrough,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,|,font,fontsize,paragraph,|,link,|,align,undo,redo,\n,selectall,cut,copy,paste,|,hr"
        });
        const reportsDocument = document.querySelector(
            "#edit_reports_document"
        );

        const editErrorContainer = document.querySelector(
            "#edit-error-container"
        );
        const editSuccessContainer = document.querySelector(
            "#edit-success-container"
        );
        let reportId = "";
        let errorsHtml = "";

        function removeEditModal() {
            reportsEditmodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
            reportsName.value = "";
            reportsType.selectedIndex = 0;
            reportsDescription.value = "";
        }

        function removeEditModalContainer(event) {
            event.preventDefault();
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
            reportsEditmodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        }

        async function updateModalData(event) {
            editErrorContainer.innerHTML = "";
            editSuccessContainer.innerHTML = "";
            editErrorContainer.style.display = "none";
            editSuccessContainer.style.display = "none";
            event.preventDefault();
            if (
                !reportsName.value ||
                !reportsType.value === "" ||
                !reportsDescription.value
            ) {
                editErrorContainer.innerHTML =
                    '<p class="has-text-centered">Incomplete Field or invalid Field! please Complete Required fields!</p>';
                editSuccessContainer.style.display = "block";
            } else {
                try {
                    const responseEditData = await axios.patch(
                        `/admin/reports/edit/report/${reportId}`,
                        new FormData(editReportForm)
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
                    //console.log(error.response);
                }
            }
        }

        function populateDefaultValue(responseData) {
            reportId = responseData[0].report_id;
            reportsName.value = responseData[0].report_name;
            //reportsType.value = responseData.report_type;
            reportsDescription = reportsDescription.value =
                responseData[0].report_description;
            reportsDocument.value = responseData[0].address;
            editReportsFileName.textContent =
                responseData[1].report_document_name;
        }

        async function showEditModal(id) {
            reportsEditmodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");

            const getReportsView = {
                url: `/admin/reports/view/report?id=${id}`,
                method: "get",
                headers: {
                    Accept: "application/json",
                    "Content-Type": "application/json;charset=UTF-8"
                }
            };

            try {
                const responseData = await axios(getReportsView);
                console.log(responseData);
                populateDefaultValue(responseData.data.view_reports.data);
            } catch (error) {
                console.log(error);
            }

            editReportForm.addEventListener("submit", updateModalData, false);
            editCancelBtn.addEventListener(
                "click",
                removeEditModalContainer,
                false
            );
            reportsEditClose.addEventListener("click", removeEditModal, false);
        }

        function setEditModal(event) {
            const editData = event.target.getAttribute("id").toString();
            showEditModal(editData);
        }

        for (let i = 0, index = editReportsButton.length; i < index; i++) {
            editReportsButton[i].addEventListener("click", setEditModal, false);
        }
    }

    function removeReportsPaginationData() {
        const removeReportsButtton = document.querySelectorAll(
            ".delete-reports"
        );
        const reportsDeletemodal = document.querySelector(
            "#reports-delete-modal"
        );
        const reportsDeleteClose = document.querySelector(
            "#delete-reports-modal-close"
        );
        const reportsModalConfirmBtn = document.querySelector(
            "#delete-modal-button-confirm"
        );
        const reportsModalCancelBtn = document.querySelector(
            "#delete-modal-button-cancel"
        );
        const htmlClipped = document.querySelector("#clippedmodifier");

        function setDeleteModal(event) {
            const dataToBeDelete = event.target.getAttribute("id").toString();
            reportsDeletemodal.classList.add("is-active");
            htmlClipped.classList.add("is-clipped");
            reportsDeleteClose.addEventListener(
                "click",
                removeDeleteModal,
                false
            );

            async function ConfirmDelete(e) {
                e.preventDefault();
                try {
                    const responseData = await axios.delete(
                        `/admin/reports/delete/report/${dataToBeDelete}`
                    );
                } catch (error) {
                    console.log(error);
                }
                reportsDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
                loadInitialPagination();
            }

            function cancelDelete() {
                reportsDeletemodal.classList.remove("is-active");
                htmlClipped.classList.remove("is-clipped");
            }

            reportsModalConfirmBtn.addEventListener(
                "click",
                ConfirmDelete,
                false
            );
            reportsModalCancelBtn.addEventListener(
                "click",
                cancelDelete,
                false
            );
        }

        function removeDeleteModal() {
            reportsDeletemodal.classList.remove("is-active");
            htmlClipped.classList.remove("is-clipped");
        }

        for (let i = 0, index = removeReportsButtton.length; i < index; i++) {
            removeReportsButtton[i].addEventListener(
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
            //console.log(pageNextAndPrev);
            const perPageAxiosOption = {
                url: `/admin/reports/pages?page=${pageNextAndPrev}`,
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
                //console.log(index);
            }

            for (let i = 0; i < index; i++) {
                htmlData += `<tr>
                                    <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].report_name
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].report_type.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].report_description
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].uploaded_by
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].uploaded_date
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        !data[i].updated_date
                                            ? "*"
                                            : data[i].updated_date
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-primary download-reports">Download</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-success view-reports">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-info edit-reports">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-danger delete-reports">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            reportstabledata.innerHTML = htmlData;

            fillEmptyTable();
            viewReportsPaginationData();
            addReportsPaginationData();
            editReportsPaginationData();
            removeReportsPaginationData();
            downloadReportPaginationData();
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
        const response = await axios(reportsAxiosOption);
        const PaginationData = response.data.page_url;
        let datatotal = PaginationData.total;
        let perpage = PaginationData.per_page;
        let data = PaginationData.data;
        let htmlData = "";
        let dataCount = 1;

        let dataTotalRemainder = datatotal % 10 >= 1 ? 1 : 0;
        let dataTotalWithRemainder = datatotal / 10 + dataTotalRemainder;

        function checkNextAndPrevNumber() {
            //console.log(pageNextAndPrev);

            if (pageNextAndPrev <= 1) {
                paginatePrev.setAttribute("disabled", "");
                paginateNext.removeAttribute("disabled");
                pageNextAndPrev = 1;
            } else if (
                pageNextAndPrev > 1 &&
                pageNextAndPrev < Math.floor(dataTotalWithRemainder)
            ) {
                //console.log(pageNextAndPrev);
                //console.log("don't have a disable button");
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
            if (reportstabledata.childElementCount < 10) {
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
                                        <td class="data-style has-text-centered">
                                            <a class="button is-small" style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                        </td>
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
                        reportstabledata.insertAdjacentHTML(
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
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].report_name
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].report_type.toUpperCase()}</td>
                                    <td class="data-style has-text-centered is-size-7">${data[
                                        i
                                    ].report_description.substring(
                                        0,
                                        10
                                    )}...</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].uploaded_by
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        data[i].uploaded_date
                                    }</td>
                                    <td class="data-style has-text-centered is-size-7">${
                                        !data[i].updated_date
                                            ? "*"
                                            : data[i].updated_date
                                    }</td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-primary download-reports">Download</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-success view-reports">View</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-info edit-reports">Edit</a>
                                    </td>
                                    <td class="has-text-centered">
                                        <a id="${
                                            data[i].report_id
                                        }" class="button is-small is-danger delete-reports">Delete</a>
                                    </td>
                                </tr>`;
                dataCount += 1;
            }
            reportstabledata.innerHTML = htmlData;
            fillEmptyTable();
            viewReportsPaginationData();
            addReportsPaginationData();
            editReportsPaginationData();
            removeReportsPaginationData();
            downloadReportPaginationData();
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
            reportsPaginationList.innerHTML = pageElement;
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
                    url: `/admin/reports/pages?page=${pageNextAndPrev}`,
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].report_name
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${data[
                                            i
                                        ].report_type.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${data[
                                            i
                                        ].report_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].uploaded_by
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            data[i].uploaded_date
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            !data[i].updated_date
                                                ? "*"
                                                : data[i].updated_date
                                        }</td>
                                         <td class="has-text-centered">
                                            <a id="${
                                                data[i].report_id
                                            }" class="button is-small is-primary download-reports">Download</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].report_id
                                            }" class="button is-small is-success view-reports">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].report_id
                                            }" class="button is-small is-info edit-reports">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                data[i].report_id
                                            }" class="button is-small is-danger delete-reports">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                reportstabledata.innerHTML = htmlData;

                fillEmptyTable();

                viewReportsPaginationData();
                addReportsPaginationData();
                editReportsPaginationData();
                removeReportsPaginationData();
                downloadReportPaginationData();
            }

            for (let x = 0, index = paginationLink.length; x < index; x++) {
                paginationLink[x].addEventListener(
                    "click",
                    loadPagePerClick,
                    false
                );
            }
        }

        function loadReportsNextPage() {
            const setNextPage = async e => {
                pageNextAndPrev += 1;
                checkNextAndPrevNumber();

                const nextResponseData = await axios.get(
                    `/admin/reports/pages?page=${pageNextAndPrev}`
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].report_name
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[
                                            i
                                        ].report_type.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${nextData[
                                            i
                                        ].report_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].uploaded_by
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            nextData[i].uploaded_date
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            !nextData[i].updated_date
                                                ? "*"
                                                : nextData[i].updated_date
                                        }</td>
                                         <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].report_id
                                            }" class="button is-small is-primary download-reports">Download</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].report_id
                                            }" class="button is-small is-success view-reports">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].report_id
                                            }" class="button is-small is-info edit-reports">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                nextData[i].report_id
                                            }" class="button is-small is-danger delete-reports">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                reportstabledata.innerHTML = htmlData;

                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewReportsPaginationData();
                addReportsPaginationData();
                editReportsPaginationData();
                removeReportsPaginationData();
                downloadReportPaginationData();
            };
            paginateNext.addEventListener("click", setNextPage, false);
        }

        function loadReportsPrevPage() {
            const setPrevPage = async e => {
                pageNextAndPrev -= 1;
                checkNextAndPrevNumber();

                const prevResponseData = await axios.get(
                    `/admin/reports/pages?page=${pageNextAndPrev}`
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
                prevData;
                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${dataCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].report_name
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[
                                            i
                                        ].report_type.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${prevData[
                                            i
                                        ].report_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].uploaded_by
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            prevData[i].uploaded_date
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            !prevData[i].updated_date
                                                ? "*"
                                                : prevData[i].updated_date
                                        }</td
                                         <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].report_id
                                            }" class="button is-small is-primary download-reports">Download</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].report_id
                                            }" class="button is-small is-success view-reports">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].report_id
                                            }" class="button is-small is-info edit-reports">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                prevData[i].report_id
                                            }" class="button is-small is-danger delete-reports">Delete</a>
                                        </td>
                                    </tr>`;
                    dataCount += 1;
                }
                reportstabledata.innerHTML = htmlData;
                fillEmptyTable();
                SetPaginatePageOnNextPrev();
                viewReportsPaginationData();
                addReportsPaginationData();
                editReportsPaginationData();
                removeReportsPaginationData();
                downloadReportPaginationData();
            };
            paginatePrev.addEventListener("click", setPrevPage, false);
        }
        loadFirstPagination();
        loadPaginationPage(datatotal);
        loadReportsNextPage();
        loadReportsPrevPage();
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
        const reportsSearch = document.querySelector("#reports-search");
        const reportsSelected = document.querySelector(
            "#reports-search-selected"
        );

        function setSelectedValue(checkData) {
            let index = reportsSelected.options.length;
            if (checkData.length > 0) {
                for (let i = 0; i < index; i++) {
                    reportsSelected.options[i].removeAttribute("selected");
                    reportsSelected.options[i].removeAttribute("disabled");
                }
                for (let i = 0; i < index; i++) {
                    reportsSelected.options[i].setAttribute("disabled", "");
                }

                reportsSelected.selectedIndex = 0;
            }
        }
        function setToDefault() {
            for (let i = 0, index = reportsSelected.length; i < index; i++) {
                reportsSelected.options[i].removeAttribute("selected");
                reportsSelected.options[i].removeAttribute("disabled");
            }

            paginateNext.removeAttribute("disabled");
            reportsSelected.options[0].setAttribute("disabled", "");
            reportsSelected.selectedIndex = 1;
        }

        async function getReportsSelected(event) {
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
                    `/admin/reports/selected?select=${selected}`
                );
                console.log(selectedresponseData);
                selectedPerPage =
                    selectedresponseData.data.selected_reports.per_page;
                selectTotal = selectedresponseData.data.selected_reports.total;
                selectedData = selectedresponseData.data.selected_reports.data;
                selectedTo = selectedresponseData.data.selected_reports.to;

                if (selectedTo % 500 != 0) {
                    index = selectedTo % 500;
                }

                for (let i = 0; i < index; i++) {
                    htmlData += `<tr>
                                        <td class="data-style has-text-centered is-size-7">${selectCount}</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].report_name
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[
                                            i
                                        ].report_type.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${selectedData[
                                            i
                                        ].report_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].uploaded_by
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            selectedData[i].uploaded_date
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            !selectedData[i].updated_date
                                                ? "*"
                                                : selectedData[i].updated_date
                                        }</td>
                                         <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].report_id
                                            }" class="button is-small is-primary download-reports">Download</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].report_id
                                            }" class="button is-small is-success view-reports">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].report_id
                                            }" class="button is-small is-info edit-reports">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                selectedData[i].report_id
                                            }" class="button is-small is-danger delete-reports">Delete</a>
                                        </td>
                                    </tr>`;
                    selectCount += 1;
                }
                reportstabledata.innerHTML = htmlData;

                fillOptionEmptyTable();
                viewReportsPaginationData();
                addReportsPaginationData();
                editReportsPaginationData();
                removeReportsPaginationData();
                downloadReportPaginationData();
            } catch (error) {
                console.log(error.reponse);
            }
            removeOptionPagination();
        }

        async function getReportsSearch(event) {
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
                    `/admin/reports/search?val=${searchval}`
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
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].report_name
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[
                                            i
                                        ].report_type.toUpperCase()}</td>
                                        <td class="data-style has-text-centered is-size-7">${searchData[
                                            i
                                        ].report_description.substring(
                                            0,
                                            10
                                        )}...</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].uploaded_by
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            searchData[i].uploaded_date
                                        }</td>
                                        <td class="data-style has-text-centered is-size-7">${
                                            !searchData[i].updated_date
                                                ? "*"
                                                : searchData[i].updated_date
                                        }</td>
                                         <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].report_id
                                            }" class="button is-small is-primary download-reports">Download</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].report_id
                                            }" class="button is-small is-success view-reports">View</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].report_id
                                            }" class="button is-small is-info edit-reports">Edit</a>
                                        </td>
                                        <td class="has-text-centered">
                                            <a id="${
                                                searchData[i].report_id
                                            }" class="button is-small is-danger delete-reports">Delete</a>
                                        </td>
                                    </tr>`;
                    searchdataCount += 1;
                }
                reportstabledata.innerHTML = htmlData;

                fillOptionEmptyTable();
                viewReportsPaginationData();
                addReportsPaginationData();
                editReportsPaginationData();
                removeReportsPaginationData();
                downloadReportPaginationData();
            } catch (error) {
                console.log(error.response);
            }
            removeOptionPagination();
        }

        reportsSelected.addEventListener("change", getReportsSelected, false);
        reportsSearch.addEventListener("keyup", getReportsSearch, false);
    }

    loadInitialPagination();
    loadSearchPagination();
}
reportsModule();
