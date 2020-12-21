$(document).ready(function() {
    $('.header').height($(window).height());
});
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})