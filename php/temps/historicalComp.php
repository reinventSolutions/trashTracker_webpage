<!--Historical Comparison-->
<div class="col" style="background-color:#FFFFFF; margin: 5px; height:auto;">
      <ul class="nav nav-tabs">
        <li class="nav-item">
         <input type = "button" id= "weeklyview" class="btn btn-sm btn" value = "Weekly View"/>
        </li>
        <li class="nav-item">
         <input type = "button" id= "monthlyview" class="btn btn-sm btn" value = "Monthly"/>
        </li>
        <li class="nav-item">
         <input type = "button" id= "yearlyview" class="btn btn-sm btn" value = "Yearly"/>
        </li>
      </ul>
	  <!-- Buttons for views -->
	  <div id = "weeklybuttons">
      <input type = "button" id = "prevweek" class="" value = "Prev Week"/>
      <span class="alignright">
      <input type = "button" id = "nextweek" class="" value = "Next Week"/>
      </span>
	  </div>
	  <div id = "monthlybuttons">
      <input type = "button" id = "prevmonth" class="btn btn-sm btn-success" value = "Prev Month"/>
      <span class="alignright">
      <input type = "button" id = "nextmonth" class="btn btn-sm btn-success" value = "Next Month"/>
      </span>
	  </div>
	  
	  <div id = "yearlybuttons">
      <input type = "button" id = "prevyear" class="btn btn-sm btn-success" value = "Prev Year"/>
      <span class="alignright">
      <input type = "button" id = "nextyear" class="btn btn-sm btn-success" value = "Next Year"/>
      </span>
	  </div>
	  <!-- end of buttons -->
	  <!-- Weekly/Monthly/Yearly graphs -->
    <div id="DData">

    </div>
	  <div id="chart_div" class="hcGraph" style="height:500px;">
        
    </div>
	  <div id="chart_div2" class="hcGraph" style="height:500px;">
        
    </div>
	  <div id="chart_div3" class="hcGraph" style="height:500px;">
        
    </div>
	  <!-- End of graph-->
	</div><!-- row -->
</div><!-- container -->

	