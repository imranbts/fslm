/**
 * Created by Salim on 10/26/2017.
 */


function submit_data(
    btn,
    header_,
    form_id,
    data_array,
    url,
    modal_id,
    web_url,
    resst_true,
    function_call,
    html_ref,
    notify,
    r_respon,
    async_status){

    if(btn != ''){

        $(btn).attr("disabled", true);
    }



    if(r_respon === undefined) {
        r_respon = false;
    }

    if(async_status === undefined) {
        async_status = false;
    }


    var response_data;

    if(form_id!=""){

        var myForm = document.getElementById(form_id);

        var validator = $(myForm).validate();

        if($(myForm).valid() == false){

            if(btn != ''){
                $(btn).removeAttr("disabled");
            }
            validator.focusInvalid();
            return;


        }

        var data = new FormData(myForm);
    }else{
        var  data = new FormData();
        $(data_array).each(function (i) {
            $tem_data = data_array[i].split("|");
            data.append($tem_data[0],$tem_data[1]);
        });

    }

    if ($('#loader-wrapper').length > 0) {
        // exists.

        $('#loader-wrapper').addClass("show_loader");
    }




    $.ajax({
        type: 'POST',
        headers: header_,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        url: url,
        data: data,
        async: async_status,
        success: function (response) {



            if ($('#loader-wrapper').length > 0) {
                // exists.

                $('#loader-wrapper').removeClass("show_loader");
            }

            if (response.status == true) {

                if(modal_id != ""){

                    $("#"+modal_id).modal();

                }

                if(notify==true){

                    /* $.notify({
                     //  title: "Welcome:",
                     type: 'success',
                     message: response.message
                     });*/

                    /* Lobibox.notify('success', {
                     //  title: 'Success title',
                     msg: response.message
                     });*/

                    suss_modal(response.message,web_url);


                }else{

                    if(web_url != ""){



                        window.location.href = web_url;

                    }

                }



                if(resst_true ==true){

                    myForm.reset();
                }



                if(function_call != ""){
                    window[function_call](response,html_ref);

                }

                if(r_respon == true){

                    response_data  = response;
                }




            } else {


                /* Lobibox.notify('error', {
                 title: 'Error',
                 msg: response.message
                 });*/

                error_modal(response.message);


            }





        }, error: function () {

        }


    });

    if(r_respon == true){

        if(btn != ''){

            $(btn).removeAttr("disabled");

        }
        return response_data;
    }
    if(btn != ''){
        $(btn).removeAttr("disabled");
    }

}

function error_modal(message_) {


    $.toast({
        heading: 'Error:',
        text: message_,
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'error',
        hideAfter: 3500

    });




}
function suss_modal(message_,href_) {

    $.toast({
        heading: 'Success',
        text: message_,
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'success',
        hideAfter: 3500,
        stack: 6
    });



}

