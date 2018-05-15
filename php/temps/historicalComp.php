<!-- 
    #######################################################
    FILENAME: historicalComp.php
    OVERVIEW: Displays Weekly, Monthly, &Yearly View
    PURPOSE: Gets called in account.php 
    #######################################################
-->
<!--Historical Comparison-->
<div class="hcHead" style="">   
   <strong class ="swhite">HISTORICAL SELF-COMPARISON</strong><br/>
</div>
<div class="col" style="background-color:#FFFFFF; margin: 5px; height:auto;">
     <!-- <ul class="nav nav-tabs">
        <li class="nav-item">
         <input type = "button" id= "weeklyview" class="nav-item nav-link" value = "Weekly View"/>
        </li>
        <li class="nav-item">
         <input type = "button" id= "monthlyview" class="nav-item nav-link" value = "Monthly"/>
        </li>
        <li class="nav-item">
         <input type = "button" id= "yearlyview" class="nav-item nav-link" value = "Yearly"/>
        </li>
      </ul>-->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="weeklyview" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Weekly</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="monthlyview" data-toggle="tab" href="" role="tab" aria-controls="profile" aria-selected="false">Monthly</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="yearlyview" data-toggle="tab" href="" role="tab" aria-controls="contact" aria-selected="false">Yearly</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="home-tab"></div>
  <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="profile-tab"></div>
  <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="contact-tab"></div>
</div>
   
  
    <!-- Buttons for views -->
	  <div id = "weeklybuttons" style="padding-top: 10px;">
      <input type = "button" id = "prevweek" class="btn btn-outline-secondary" value = "Prev Week"/>
      <span class="alignright">
      <input type = "button" id = "nextweek" class="btn btn-outline-secondary" value = "Next Week"/>
      </span>
	  </div>
	  <div id = "monthlybuttons"  style="padding-top: 10px;">
      <input type = "button" id = "prevmonth" class="btn btn-outline-secondary" value = "Prev Month"/>
      <span class="alignright">
      <input type = "button" id = "nextmonth" class="btn btn-outline-secondary" value = "Next Month"/>
      </span>
	  </div>
	  <div id = "yearlybuttons"  style="padding-top: 10px;">
      <input type = "button" id = "prevyear" class="btn btn-outline-secondary" value = "Prev Year"/>
      <span class="alignright">
      <input type = "button" id = "nextyear" class="btn btn-outline-secondary" value = "Next Year"/>
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

	