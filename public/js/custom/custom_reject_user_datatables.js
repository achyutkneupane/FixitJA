"use strict";
// Class definition

var KTDatatableHtmlTableDemo = (function () {
    // Private functions

    // demo initializer
    var demo = function () {
        var datatable = $("#kt_datatable").KTDatatable({
            data: {
                saveState: {
                    cookie: false
                },
            },
            search: {
                input: $("#kt_datatable_search_query"),
                key: "generalSearch",
            },
            layout: {
                class: "datatable-bordered",
            },
            columns: [{
                    field: "ID",
                    type: "number",
                    width: 50,
                },
                {
                    field: "Name",
                    type: "string",
                    width: 180,
                    autoHide: false,
                },
                {
                    field: "Status",
                    title: "Status",
                    width: 80,
                    // callback function support for column rendering
                    template: function template(row) {
                        var status = {
                            new: {
                                title: "New",
                                class: " label label-info label-inline mr-2",
                            },
                            pending: {
                                title: "Pending",
                                class: " label label-info label-inline mr-2",
                            },
                            active: {
                                title: "Active",
                                class: " label-light-success",
                            },
                            suspended: {
                                title: "Suspended",
                                class: " label-light-warning",
                            },
                            blocked: {
                                title: "Blocked",
                                class: " label-light-danger",
                            },
                            deactivated: {
                                title: "Deactivated",
                                class: " label-light-danger",
                            },
                            deleted: {
                                title: "Deleted",
                                class: " label-light-danger",
                            },
                        };
                         return (
                            '<span class="label font-weight-bold label-lg' +
                            status[row.Status].class +
                            ' label-inline">' +
                            status[row.Status].title +
                            "</span>"
                        );
                    },
                },
                {
                    field: "Role",
                    title: "Role",
                    width: "90",
                    // callback function support for column rendering
                    template: function template(row) {
                        var status = {
                            admin: {
                                title: "Admin",
                                state: "success",
                            },
                            independent_contractor: {
                                title: "Independent Contractor",
                                state: "danger",
                            },
                            business: {
                                title: "Business",
                                state: "warning",
                            },
                            general_user: {
                                title: "User",
                                state: "info",
                            },
                        };
                        return (
                            '<span class="label label-' +
                            status[row.Role].state +
                            ' label-dot mr-2"></span><span class="font-weight-bold text-' +
                            status[row.Role].state +
                            '">' +
                            status[row.Role].title +
                            "</span>"
                        );
                    },
                },
                {
                    field: "Email",
                    type: "string",
                    width: 100,
                },
                {
                    field: "Phone",
                    type: "string",
                    width: 100,
                },
                {
                    field: "Address",
                    type: "string",
                    width: 100,
                },
        ],
    });
        $("#kt_datatable_search_status").on("change", function () {
            datatable.search($(this).val().toLowerCase(), "Status");
        });

        $("#kt_datatable_search_role").on("change", function () {
            datatable.search($(this).val().toLowerCase(), "Role");
        });

        $(
            "#kt_datatable_search_status, #kt_datatable_search_role"
        ).selectpicker();
    };

    return {
        // Public functions
        init: function () {
            // init dmeo
            demo();
        },
    };
})();

jQuery(document).ready(function () {
    KTDatatableHtmlTableDemo.init();
});
