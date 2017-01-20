/*
* Functions Definition
* List of helpful reuseable functions
*/

function ajax(url, data, type){
    //Implements jQuery Ajax plugin to handle request

    var result = {};

    $.ajax({
        url: url,
        data: data,
        method: type,

        success: function(data){
            result.data = data;
        },
        error: function(){
            //do nothing;
        }

    });

    return console.log(result);
}

function featureGet(){
    //Calls function ajax with the current url

    var result = ajax(current_url, false, "GET");
    return result;
}

function featurePost(url, data){
    //Calls function Ajax with the current URL with a POST
    //We are interested onl

    var result = ajax(url, data, "POST");

    if(result && typeof result == 'Object'){

        if (result.status == 'success'){

            return result.data;

        } else {

            return "Not success in JSON";
        }
    } else {
        return result;
    }
}





//============================================================================//
//===============================MAIN=========================================//

var current_url = "/home/ajax/billing";

$("a[data-view-url]").click(function(event){

    event.preventDefault();
    $("a[data-view-url] li").removeClass('active');
    $(this).children('li').addClass('active');
    current_url = $(this).attr('data-view-url');


});

//Patient MRN select...
$("form#mrn-select").submit(function(event){

    event.preventDefault();

    //$("#screenlock").show();

    var serv_recv = featurePost("/home/select", $(this).serialize());
    alert(serv_recv);

})