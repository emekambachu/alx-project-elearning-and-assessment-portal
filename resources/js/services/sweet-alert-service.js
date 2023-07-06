let sweetAlertService = {
    showDialog(swal, mainMessage, subMessage){
        // Install sweetalert2 to use
        // Loading
        Swal.fire({
            title: 'Confirm you want to vote for this applicant, this process can not be undo',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Vote',

          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
              Swal.fire('Changes are not saved', '', 'info')
            }
          })
    },
    formLoading(swal, mainMessage, subMessage){
        // Install sweetalert2 to use
        // Loading
        swal.fire({
            title: mainMessage,
            html: subMessage,// add html attribute if you want or remove
            allowOutsideClick: false,
            showCancelButton: false,
            showConfirmButton: false,
            didOpen: () => {
                swal.showLoading();
            },
        });
    },

    formSuccess(swal, message, timer){
        swal.fire({
            position: 'center',
            icon: 'success',
            html: "<h6>"+message+"</h6>",
            showConfirmButton: true,
            timer: timer
        })
    },

    formError(swal, message, timer){
        swal.fire({
            icon: 'error',
            html: message,
            showConfirmButton: true,
            timer: timer
        });
    },

    formValidationError(swal, message, timer){
        swal.fire({
            icon: 'error',
            html: message,
            showConfirmButton: false,
            timer: timer
        });
    },

    formEmpty(form){
        Object.keys(form).forEach(function(key) {
            if(key === 'image'){
                form[key] = null;
            }else{
                form[key] = '';
            }
        });
    }

}

export default sweetAlertService;
