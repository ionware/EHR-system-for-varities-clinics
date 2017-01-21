/*
* Functions Definition
* List of helpful reuseable functions
*/

function postAjax(url, data, type, DOMElement){
    //Implements jQuery Ajax plugin to handle request

    $.ajax({
        url: url,
        data: data,
        method: type,

        success: function(data, status, DOMElement){
            if(data.status == 'success'){
                DOMElement.text("");
                DOMElement.text(data.data);
                return true;
            }
        },
        error: function(){
            //do nothing;
        }

    });

    //@Plugin Ends
}

function featureGet(url, DOMElement){
    //Calls function ajax with the current url

    var self = DOMElement;

    $.get(url, function(data){
        DOMElement.html(data);
    })
}

function featurePost(url, data, DOMElement){
    //Calls function Ajax with the current URL with a POST
    //We are interested onl

    var self = DOMElement;

    $.ajax({
        url: url,
        data: data,
        method: "POST",

        success: function(serverReply){
            if(serverReply.status == 'success'){
                self.text(serverReply.data);
                return true;
            }
            self.text(serverReply.data);
        },
        error: function(){
            //do nothing;
        }

    });
}

function loader(bool){

    if(bool){
        $("#loader").show();
        return;
    }

    $("#loader").hide();

}





//============================================================================//
//===============================MAIN=========================================//

var current_url = "/home/ajax/billing";
$(document).ready(function(){
    featureGet("/home/ajax/billing", $("#information"));
});


$("a[data-view-url]").click(function(event){

    event.preventDefault();
    $("a[data-view-url] li").removeClass('active');
    $(this).children('li').addClass('active');
    current_url = $(this).attr('data-view-url');

    featureGet(current_url, $("#information"));


});

//Patient MRN select...
$("form#mrn-select").submit(function(event){

    event.preventDefault();
    $("#information").html("");

    featurePost("/home/select", $(this).serialize(), $("#p-name"));
    featureGet("/home/ajax/billing", $("#information"));



})