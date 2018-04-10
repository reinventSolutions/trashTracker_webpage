$(document).ready(function(){
$('#prevWeek').click(function(){
var page = $(this).attr('href');
$('#chart_div').load('chart_div/prevWeek.php');
return false;
});
});