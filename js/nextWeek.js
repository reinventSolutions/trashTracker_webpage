$(document).ready(function(){
$('#nextWeek').click(function(){
var page = $(this).attr('href');
$('#chart_div').load('chart_div/nextWeek.php');
return false;
});
});