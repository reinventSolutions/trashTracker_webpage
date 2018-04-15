	  $(document).ready(function(){
      var lower = 0;
      var upper = 5;
      $("#weeklyview").click(function(){
      $("#chart_div").show();//Weekly View
      $("#weeklybuttons").show();
      $("#chart_div2").hide();//Monthly View
      $("#monthlybuttons").hide();
      $("#chart_div3").hide();//Yearly View
      $("#yearlybuttons").hide();
    });
    $("#nextweek").click(function(e){
		  $("#DData").empty();
          $("#chart_div").empty();
      lower = lower +1;
      upper = upper +1;
      if(upper > 9){
        lower = 0;
        upper = 5;
      }
        $.post("graph2.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
		  $("#DData").empty();
          $("#chart_div").empty();
          $("#DData").html(data, status);
        });
      });
      $("#prevweek").click(function(e){
      lower = lower -1;
      upper = upper -1;
      if (lower < 0){
        lower = 4;
        upper = 9;
      }
        $.post("graph2.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
          $("#DData").empty();
          $("#chart_div").empty();
          $("#DData").html(data, status);
        });
      });
      $("#monthlyview").click(function(){
      $("#chart_div").hide();//Weekly View
      $("#weeklybuttons").hide();//hide buttons div
      $("#chart_div2").show();//Monthly View
      $("#monthlybuttons").show();
      $("#chart_div3").hide();//Yearly View
      $("#yearlybuttons").hide();
      
        $.post("monthlyGraph.php", {
          lowerValue: lower,
          upperValue: upper
        }, function(data, status){
          $("#DData").html(data, status);
        });
      });
    })