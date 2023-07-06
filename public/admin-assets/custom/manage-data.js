$(function(){

    let manageData = (route, id, method) => {

        $.ajax({
            type: method,
            url: route,
            data: {
                'id': id
            },
            dataType: "json",
            cache: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },

            beforeSend: function (){
                // Hide submit button
                $('.form_fields'+id).fadeOut(200);
                // Show spinner
                $(".loader"+id).html("<i class='fa fa-spinner fa-spin fa-3x text-success text-center'></i>");
            },

            success:function (Response){
                console.log(Response);

                if(Response.verified){
                    // Show submit button
                    $('.form_fields'+id).fadeIn(200);
                    // Hide spinner
                    $(".loader"+id).empty();
                    $("#notification"+id).empty();
                }

                if(Response.status === 1){
                    $("#status_modal"+id).html("Hide");
                    $("#status_btn"+id).html("Hide");
                    $("#notification"+id).html("<p class='bg-success text-white text-center p-1'>Visible</p>");
                }else{
                    $("#status_modal"+id).html("Show");
                    $("#status_btn"+id).html("Show");
                    $("#notification"+id).html("<p class='bg-danger text-white text-center p-1'>Hidden</p>");
                }

                if(Response.deleted){
                    // Remove spinner
                    $(".loader"+id).empty();
                    // Show submit button
                    $('.form_fields'+id).fadeIn(200);
                    // hide row
                    $('#row'+id).fadeOut(200);
                    $('.form_fields'+id).html("<p class='bg-danger text-white text-center p-1'>Deleted</p>");
                }
            },

        });
    }

    $('[data-manage]').click(function(e){

        e.preventDefault();
        let route = $(this).data('route');
        let id = $(this).attr('id');
        let method = $(this).attr('method');

        manageData(route, id, method);
    });

});
