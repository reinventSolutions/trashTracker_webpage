$(document).ready(function(){
$('#nextWeek').click(function(){
var page = $(this).attr('href');
$('#graphdata').load('graphdata/graph2.php');
return false;
});