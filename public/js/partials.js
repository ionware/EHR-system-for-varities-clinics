$(document).ready(function(){

    $("#new").on("click", function(event){
        event.preventDefault();

        $("#list").children().removeClass("bg-cloud").addClass("bg-primary");
        $(this).children().removeClass("bg-primary").addClass("bg-cloud");

        $(".list").hide();
        $(".new").show();
    });


$("#list").on("click", function(event){
    event.preventDefault();

    $("#new").children().removeClass("bg-cloud").addClass("bg-primary");
    $(this).children().removeClass("bg-primary").addClass("bg-cloud");

    $(".new").hide();
    $(".list").show();
});

});
/**
 * Created by pythonleet on 1/21/17.
 */
