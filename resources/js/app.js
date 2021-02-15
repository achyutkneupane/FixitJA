require("./bootstrap");

// custom select2
$("#kt_datatable_search_status").select2();
$("#kt_datatable_search_type").select2();

toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-center",
    preventDuplicates: false,
    onclick: null,
    showDuration: "500",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};
