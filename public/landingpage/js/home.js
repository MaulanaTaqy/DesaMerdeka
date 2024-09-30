"use strict";
var endpoint = `${window.location.origin}/auth/logout`;
console.log(endpoint);

(function ($) {

    $(document).ready(function () {
        
    });

})(jQuery);

function logout() {
    Swal.fire({
        title: "Yakin ingin mengupdate status data ini?",
        text: "Anda bisa merubah status approval data ini kapanpun.",
        icon: "warning",
        showCancelButton  : true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor : "#d33",
        confirmButtonText : "Ya!"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url    : endpoint,
                type   : "POST",
                data: { 
                    "id": id,
                    "state": state,
                },
                dataType: "JSON",
                success: function(data) {
                    table.ajax.reload();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil diupdate',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
        }
    })
}