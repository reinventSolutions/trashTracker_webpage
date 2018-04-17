	$("#chart_div2").hide();//Monthly View
	$("#chart_div3").hide();//Yearly View
	$("#monthlybuttons").hide();//Monthly buttons div
	$("#yearlybuttons").hide();//Yearly buttons div
	$("#chart_div").empty();
	$("#chart_div").fadeOut(250);
    $("#DData").load("graph1.php");
	$("#chart_div").fadeOut(1000);
	