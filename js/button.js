/*
  #######################################################
  FILENAME: button.php
  OVERVIEW: JS/Jquery button handeling for historical 
  comparison. 
  PURPOSE: Button functionality for all graph views 
  #######################################################
*/
    $(document).ready(function(){
      var lower = 14;
      var upper = 19;
	  
	  var lower2 = 1;
      var upper2 = 17;
	
	//Next Week
    $("#nextweek").click(function(){
      lower = lower + 1;
      upper = upper + 1;
	  
	  if(upper <= 19){
		$("#chart_div").empty();
		$("#chart_div").fadeOut(250);
        $.post("graph2.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
		  $("#chart_div").fadeIn(1000);
          $("#DData").html(data, status);
        }); 
	  }
	  else{
		  lower = 14;
		  upper = 19;
	  }
    /*
    FUTURE USE: Used to make graph cycle around back to front
    /*
    if(upper > 17){
        lower = 2;
        upper = 7;
      }
	  $("#chart_div").empty();
	  $("#chart_div").fadeOut(250);
        $.post("graph2.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
		  $("#chart_div").fadeIn(1000);
          $("#DData").html(data, status);
        });
		*/
      });
	  
	  // Previous Week
      $("#prevweek").click(function(e){
      lower = lower - 1;
      upper = upper - 1;
       
	   if(lower >= 2){
		$("#chart_div").empty();
		$("#chart_div").fadeOut(250);
        $.post("graph2.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
		  $("#chart_div").fadeIn(1000);
          $("#DData").html(data, status);
        }); 
	  }
	  else{
		  lower = 2;
		  upper = 7;
	  }
	  
	  /*if (lower < 2){
        lower = 12;
        upper = 17;
      }
	  $("#chart_div").empty();
	  $("#chart_div").fadeOut(250);
        $.post("graph2.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
          $("#DData").html(data, status);
          $("#chart_div").fadeIn(1000);
        });
		*/
      });
	  //Next Month
    $("#nextmonth").click(function(){
      lower2 = lower2 + 4;
      upper2 = upper2 + 4;
	  
	  if(upper2 <= 21){
		$("#chart_div2").empty();
		$("#chart_div2").fadeOut(250);
        $.post("monthlyGraph2.php", {
          lowerValue2: lower2,
          upperValue2: upper2
        }, function(data, status){
		  $("#chart_div2").fadeIn(1000);
          $("#DData").html(data, status);
        }); 
	  }
	  else{
		  lower2 = 4;
		  upper2 = 20;
	  }
      });
	 //Prev Month
    $("#prevmonth").click(function(){
      lower2 = lower2 - 4;
      upper2 = upper2 - 4;
	  
	  if(lower2 >= 0){
		$("#chart_div2").empty();
		$("#chart_div2").fadeOut(250);
        $.post("monthlyGraph2.php", {
          lowerValue2: lower2,
          upperValue2: upper2
        }, function(data, status){
		  $("#chart_div2").fadeIn(1000);
          $("#DData").html(data, status);
        });		
	  }
	  else{
		  lower2 = 1;
		  upper2 = 17;
	  }
      });
	  //Weekly View
      $("#weeklyview").click(function(){
      $("#chart_div2").hide();//Monthly View
      $("#monthlybuttons").hide();
      $("#chart_div3").hide();//Yearly View
      $("#yearlybuttons").hide();
	  $("#DData").fadeOut();
      $("#chart_div").fadeIn(1000);//Weekly View
      $("#weeklybuttons").show();
    });
	  
	  //Monthly View
      $("#monthlyview").click(function(){
      $("#chart_div").hide();//Weekly View
      $("#weeklybuttons").hide();//hide buttons div
      $("#chart_div3").hide();//Yearly View
      $("#yearlybuttons").hide();
      $("#monthlybuttons").show();
	  $("#DData").fadeOut();
	  $("#chart_div2").fadeIn(1000);//Monthly View
      
        $.post("monthlyGraph.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
          $("#DData").html(data, status);
          $("#chart_div2").fadeIn(1000);
        });
      });
	  
	  //Yearly View
      $("#yearlyview").click(function(){
      $("#chart_div").hide();//Weekly View
      $("#weeklybuttons").hide();//hide buttons div
      $("#chart_div2").hide();//Yearly View
      $("#yearlybuttons").show();
      $("#monthlybuttons").hide();
	  $("#DData").fadeOut();
	  $("#chart_div3").fadeIn(1000);//Yearly View
      
        $.post("annualGraph.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
          $("#DData").html(data, status);
          $("#chart_div3").fadeIn(1000);
        });
      });
	  
    })