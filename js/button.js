	  $(document).ready(function(){
      var lower = 12;
      var upper = 17;
	
	//Next Week
    $("#nextweek").click(function(){
      lower = lower + 1;
      upper = upper + 1;
      if(upper > 17){
        lower = 0;
        upper = 5;
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
      });
	  
	  // Previous Week
      $("#prevweek").click(function(e){
      lower = lower - 1;
      upper = upper - 1;
      if (lower < 0){
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
      });
	  
	  //Weekly View
      $("#weeklyview").click(function(){
      $("#chart_div2").hide();//Monthly View
      $("#monthlybuttons").hide();
      $("#chart_div3").hide();//Yearly View
      $("#yearlybuttons").fadeOut();
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
	  
    })