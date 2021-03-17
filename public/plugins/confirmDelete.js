function confirmPureDelete(delete_url) {
    bootbox.confirm({
        message: "Are you sure you want to delete ?",
        buttons: {
            confirm: {
                label: "Yes",
                className: 'btn-success'
            },
            cancel: {
                label: "No",
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result === true) {
                var bootBoxDelete = $('#bootBoxDelete');
                bootBoxDelete.attr('action', delete_url);
                bootBoxDelete.submit();
            }
        }
    });
}
