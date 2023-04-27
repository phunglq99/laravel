$(document).ready(function() {
    $('#displayList').on('change', function() {
        $('#searchForm').submit()
    } )

    var $alertSecond = $('.todo.alert');
    var timeoutAlert = setTimeout(function() {
        $alertSecond.removeClass('show').addClass('hide');
        setTimeout(function() {
            $alertSecond.hide();
        }, 1000);
    }, 2000);
})
