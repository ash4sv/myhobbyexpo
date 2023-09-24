var Apps = {
    init: function () {
        Apps.datatable();
        Apps.select2('.default-select2');
        /*Apps.summernote('.summernote');*/
        /*Apps.switchery('switchery-default');*/
    },

    datatable: function () {
        var options = {
            dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
            buttons: [
                /*{ extend: 'copy', className: 'btn-sm' },*/
                { extend: 'csv', className: 'btn-sm' },
                { extend: 'excel', className: 'btn-sm' },
                /*{ extend: 'pdf', className: 'btn-sm' },*/
                /*{ extend: 'print', className: 'btn-sm' }*/
            ],
            responsive: true,
            colReorder: true,
            keys: true,
            rowReorder: true,
            select: true,
            pageLength: 50
        };

        if ($(window).width() <= 767) {
            options.rowReorder = false;
            options.colReorder = false;
        }

        $('.data-table').DataTable(options);
    },

    deleteConfirm: function(removeID) {
        Swal.fire({
            icon: 'warning',
            title: 'Do you want to delete this?',
            text: '',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed === true) {
                document.getElementById(removeID).submit();
            }
        });
    },

    logoutConfirm: function(removeID) {
        Swal.fire({
            icon: 'warning',
            title: 'Do you confirm to logout?',
            text: '',
            showCancelButton: true,
            confirmButtonText: 'Yes, Log Out',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed === true) {
                document.getElementById(removeID).submit();
            }
        });
    },

    summernote: function (summernote) {
        $(summernote).summernote({
            /*placeholder: 'Hi, this is summernote. Please, write text here! Super simple WYSIWYG editor on Bootstrap',*/
            height: "300"
        });
    },

    select2: function (select2) {
        $(select2).select2();
    },

    switchery: function (switchery) {
        var elm = document.getElementById(switchery);
        var switchery = new Switchery(elm, {
            color: '#00acac'
        });
    }

}

$(document).ready(function () {
    Apps.init()
})
