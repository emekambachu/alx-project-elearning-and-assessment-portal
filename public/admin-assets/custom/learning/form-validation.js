$(function(){

    // get form ID
    $('.resources').change(function(e){

        let documentOne = $('#document_one').prop('files')[0];
        if(documentOne){

            let ao_ext = $('#document_one').val().split('.').pop().toLowerCase();
            if($.inArray(ao_ext, ['docx','doc','ppt','pptx','pdf','xlsx', 'xls']) === -1) {
                let validation_alert = "<p class='bg-danger p-2 text-center text-white'>" +
                    "Attachment must be docx, doc, xlsx or pdf</p>"
                $("#document-one-alert").html(validation_alert);
                return false;
            }else{
                $("#document-one-alert").empty();
            }

            if (documentOne.size > 20024000) {
                $("#document-one-alert").html("<p class='bg-danger p-2 text-center text-white'>" +
                    "file size must not be more than 20 mb</p>");
                return false;
            }else{
                $("#document-one-alert").empty();
            }

        }

        let documentTwo = $('#document_two').prop('files')[0];
        if(documentTwo){
            // validate document type
            let at_ext = $('#document_two').val().split('.').pop().toLowerCase();
            if($.inArray(at_ext, ['docx','doc','ppt','pptx','pdf','xlsx', 'xls']) === -1) {
                $("#document_two").html("<p class='bg-danger p-2 text-center text-white'>" +
                    "Attachment must be docx, doc, xlsx or pdf</p>");
                return false;
            }else{
                $("#document_two").empty();
            }

            // validate document size
            if(documentTwo.size > 20024000) {
                $("#document-two-alert").html("<p class='bg-danger p-2 text-center text-white'>" +
                    "file size must not be more than 20 mb</p>");
                return false;
            }else{
                $("#document-two-alert").empty();
            }
        }

    });

    // $('[data-assignment-form]').submit(function(e){
    //
    //     e.preventDefault();
    //
    //     // Get route on div form
    //     console.log($('[data-assignment-form]'));
    //
    //     let formId = $(this).attr('id');
    //     let route = $(this).data('route');
    //
    //     // get all form data and create an instance
    //     let formData = new FormData(this);
    //     formData.append('attachment_one', $('#attachment_one'+formId)[0].files[0]);
    //     formData.append('attachment_two', $('#attachment_two'+formId)[0].files[0]);
    //     formData.append('attachment_three', $('#attachment_three'+formId)[0].files[0]);
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: route,
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         cache: false,
    //         dataType: "json",
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    //         },
    //
    //         beforeSend: function(){
    //             // Hide submission forms
    //             $('#form-fields'+formId).empty();
    //             $('#assignment-submission-form'+formId).fadeOut(1000);
    //
    //             // Show spinner
    //             let loader = '<div class="text-center mg-b-20">' +
    //                 '<div class="spinner-border text-success" role="status">' +
    //                 '<span class="sr-only">Loading...</span>' +
    //                 '</div>' + '</div>'
    //             $('#alert'+formId).html(loader);
    //         },
    //
    //         success:function (Response){
    //             console.log(Response);
    //
    //             if(Response.success){
    //                 console.log("Assignment submitted");
    //
    //                 $('#form-fields'+formId).fadeOut(1000);
    //                 $('#delete-form'+formId).fadeIn(1000);
    //
    //                 $('#filename'+formId).html(Response.filename+'<br>');
    //
    //                 if(Response.filename_two){
    //                     $('#filename'+formId).append(Response.filename_two+'<br>');
    //                 }
    //
    //                 if(Response.filename_two){
    //                     $('#filename'+formId).append(Response.filename_three);
    //                 }
    //
    //
    //                 let alert = "<p class='bg-success p-2 text-center text-white'>" +
    //                     "Assignment Submitted</p>";
    //                 $('#alert'+formId).html(alert);
    //             }
    //
    //             if(Response.error){
    //                 console.log('#alert'+formId);
    //
    //                 let alert = "<p class='bg-danger p-2 text-center text-white'>" +
    //                     "Unable to submit</p>"
    //
    //                 $('#alert'+formId).html(alert);
    //             }
    //         },
    //
    //     });
    // });

    // $('[data-deletion-form]').submit(function(e){
    //     e.preventDefault();
    //     // Get route on div form
    //     console.log($('[data-deletion-form]'));
    //
    //     let formId = $(this).attr('id');
    //     let route = $(this).data('route');
    //
    //     $.ajax({
    //         type: 'DELETE',
    //         url: route,
    //         processData: false,
    //         contentType: false,
    //         cache: false,
    //         dataType: "json",
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    //         },
    //
    //         beforeSend: function(){
    //             // Hide submission field
    //             $('#form-fields'+formId).empty();
    //             $('#delete-form'+formId).fadeOut(1000);
    //
    //             // Show spinner
    //             let loader = '<div class="text-center mg-b-20">' +
    //                 '<div class="spinner-border text-success" role="status">' +
    //                 '<span class="sr-only">Loading...</span>' +
    //                 '</div>' + '</div>'
    //             $('#alert'+formId).html(loader);
    //         },
    //
    //         success:function (Response){
    //             console.log(Response);
    //
    //             if(Response.success){
    //                 console.log("Assignment Deleted");
    //
    //                 $('#form-fields'+formId).fadeOut(1000);
    //                 $('#assignment-submission-form'+formId).fadeIn(1000);
    //
    //                 let alert = "<p class='bg-success p-2 text-center text-white'>" +
    //                     Response.success+"</p>"
    //                 $('#alert'+formId).html(alert);
    //             }
    //
    //             if(Response.error){
    //                 console.log('#alert'+formId);
    //
    //                 $('#delete-form'+formId).fadeIn(1000);
    //
    //                 let alert = "<p class='bg-danger p-2 text-center text-white'>" +
    //                     "Unable to submit</p>"
    //
    //                 $('#alert'+formId).html(alert);
    //             }
    //         },
    //
    //     });
    // });

});
