var Apps = {
    init: function () {
        Apps.datatable();
        Apps.select2('.default-select2');
        Apps.summernote('.summernote');
        Apps.switchery('switchery-default');
    },

    datatable: function () {
        $('#data-table-default').DataTable({
            responsive: true
        });
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
