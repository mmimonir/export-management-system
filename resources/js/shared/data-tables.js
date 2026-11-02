import $ from "jquery";

const exportOptions = {
    columns: ".exportable",
    modifier: {
        order: "applied",
        page: "all",
        search: "applied",
    },
    format: {
        body(data) {
            const cell = document.createElement("div");
            cell.innerHTML = data;
            return cell.textContent.trim();
        },
    },
};

export function initializeExportDataTable({
    selector,
    title,
    priorities,
    filters = [],
}) {
    const tableElement = document.querySelector(selector);
    const table = $(tableElement).DataTable({
        autoWidth: false,
        columnDefs: [
            {
                className: "all dtr-control",
                responsivePriority: 1,
                targets: priorities.detail,
            },
            {
                orderable: false,
                responsivePriority: priorities.actionsPriority ?? 2,
                searchable: false,
                targets: priorities.actions,
            },
            ...(priorities.hidden ?? []).map((column) => ({
                orderable: false,
                targets: column,
                visible: false,
            })),
            ...priorities.columns.map(({ column, priority }) => ({
                responsivePriority: priority,
                targets: column,
            })),
        ],
        dom: '<"dt-toolbar"<"dt-toolbar-length"l><"dt-toolbar-buttons"B><"dt-toolbar-search"f>>rt<"row align-items-center g-2 mt-2"<"col-12 col-md-5"i><"col-12 col-md-7"p>>',
        language: {
            emptyTable: "No records found.",
            zeroRecords: "No matching records found.",
        },
        lengthMenu: [10, 25, 50, 100],
        order: [[0, "desc"]],
        pageLength: 10,
        responsive: {
            details: {
                target: priorities.detail,
                type: "column",
            },
        },
        buttons: [
            {
                extend: "excelHtml5",
                className: "btn btn-sm btn-outline-secondary dt-export-btn",
                exportOptions,
                title,
            },
            {
                extend: "pdfHtml5",
                className: "btn btn-sm btn-outline-secondary dt-export-btn",
                exportOptions,
                orientation: "landscape",
                pageSize: "A4",
                title,
            },
            {
                extend: "print",
                className: "btn btn-sm btn-outline-secondary dt-export-btn",
                exportOptions,
                title,
            },
        ],
    });

    filters.forEach((filter) => {
        if (filter.type === "range") {
            const inputs = Array.from(document.querySelectorAll(filter.selector));
            const applyRange = () => table.draw();
            inputs.forEach((input) => input.addEventListener("input", applyRange));

            $.fn.dataTable.ext.search.push((settings, data, dataIndex) => {
                if (settings.nTable !== tableElement) return true;

                const priceCell = settings.aoData[dataIndex]?.anCells?.[filter.column];
                const value = Number.parseFloat(
                    priceCell?.getAttribute("data-order") ?? data[filter.column],
                );
                const minimum = Number.parseFloat(inputs[0].value);
                const maximum = Number.parseFloat(inputs[1].value);

                if (Number.isNaN(value)) return !inputs[0].value && !inputs[1].value;
                return (Number.isNaN(minimum) || value >= minimum)
                    && (Number.isNaN(maximum) || value <= maximum);
            });
        } else {
            const element = document.querySelector(filter.selector);
            element.addEventListener("change", () => {
                const search = element.value
                    ? `^${$.fn.dataTable.util.escapeRegex(element.value)}$`
                    : "";
                table.column(filter.column).search(search, true, false).draw();
            });
        }
    });

    return table;
}

window.initializeExportDataTable = initializeExportDataTable;
