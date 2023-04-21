var $alertSecond = $('.todo.alert');
var timeoutAlert = setTimeout(function() {
    $alertSecond.removeClass('show').addClass('hide');
    setTimeout(function() {
        $alertSecond.hide();
    }, 1000);
}, 2000);

$(document).ready(function() {
    $('#displayList').on('change', function() {
        $('#searchForm').submit()
    } )
})

$(window).load(function(){
    $(".col-3 input").val("");
    
    $(".input-effect input").focusout(function(){
        if($(this).val() != ""){
            $(this).addClass("has-content");
        }else{
            $(this).removeClass("has-content");
        }
    })
});