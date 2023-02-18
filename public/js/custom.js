$(document).on('click', '.delete', function () {
    let url = $(this).data('url');
    let tableId = '#' + $(this).data('table');
    deleteConfirmation(url, tableId);
});

function deleteConfirmation(url, tableId) {
    window.swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.value) {
            window.swal.fire({
                title: "",
                text: "Please wait...",
                showConfirmButton: false,
                backdrop: true
            });
            window.axios.delete(url).then(response => {
                if (response.status === 200) {
                    window.swal.close();
                    $(tableId).DataTable().ajax.reload();
                    window.toast.fire({
                        icon: 'success',
                        title: response.data.message
                    });
                }
            }).catch(error => {
                window.swal.close();
                window.toast.fire({
                    icon: 'error',
                    title: error.response.data.message
                });
            });
        }
    });
}