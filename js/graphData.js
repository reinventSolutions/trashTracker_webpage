$('#graphdata').onload(function(){
var page = $(this).attr('div');
$('#chart_div').load('chart_div/graph.php');
});