<!-- 
    #######################################################
    FILENAME: closest.php
    OVERVIEW: Displays Normal Comparison
    PURPOSE: Closest neighbors, neighborhood, and city 
    comparison.
    #######################################################
-->
<!-- CONTENT FOR NORM COMP -->
<?php include "routeavg.php"; ?>
<?php include "cityavg.php"; ?>

<!-- NC DIVS -->
<script>
  $("#nav1").hide();//Closest
  $("#nav2").hide();//Neighborhood
  $("#nav3").hide();//City
</script>
<div class="hcHead" style="">   
   <strong class ="swhite">COMPARISON WITH OTHERS</strong><br/>
</div>
<!-- THUMBS -->
<div class="col" id="thumbs" style="background-color:#FFFFFF; margin: 5px; text-align: center;">
<div id="thumb1" style="background-color:#FFFFFF;">
  <!--thumbs-->
  <h4>How do you stack up?</h4>
    <div class="thumbs" id="thumbupdown" onload="thumbs()" style="">
      <script>thumbs();</script>
      <br>
      <span id="tratio1">
      <script> ttext1();</script>
    </span> 
    </div><!--.thumbs-->
  </div><!--.col-->

  <div class="col" id="thumb2" style="background-color:#FFFFFF;">
  <!--thumbs-->
  <b>How do you stack up with all <br> those in your neighborhood?</b>
    <div class="thumbs" id="thumbs2" onload="thumbsN()" style="">
      <script> thumbsN();</script>
      <br>
      <span id="tratio2">
      <script> ttext2();</script>
      </span> 
    </div><!--.thumbs-->
  </div><!--.col-->
  
  <div class="col" id="thumb3" style="background-color:#FFFFFF;">
  <!--thumbs-->
  <h6>How do you stack up in the city?</h6>
    <div class="thumbs" id="thumbs3" onload="thumbs()" style="">
      <script> thumbsC();</script>
      <br>
      <span id="tratio3">
      <script> ttext3();</script>    
      </span> 
    </div><!--.thumbs-->
  </div><!--.col-->
  </div>

<div class="col-sm-8" id ="yourratio" style="background-color:#FFFFFF; margin: 5px;text-align: center;">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="closestInput" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Closest</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="neighborInput" data-toggle="tab" href="" role="tab" aria-controls="profile" aria-selected="false">Neighborhood</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="cityInput" data-toggle="tab" href="" role="tab" aria-controls="contact" aria-selected="false">City</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="home-tab"></div>
    <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="profile-tab"></div>
    <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="contact-tab"></div>
  </div>
    <!--HOUSE SCRIPT-->
    <br/>
    <span id="mr">
      <script>mainRatio();</script>
    </span> 	
      <br/><strong>Your Ratio: </strong> 
        <?php echo $_SESSION["HouseCompare"]; ?>%
      <br>
	  <div id = "nav1">
      <p style="text-align:left">
        We calculated the percent of waste you recycled this week, and found that you recycled 
        <span id="ncratio1">
          <script> nctext1();</script>
        </span>  and sent 
        <span id="ncratio2">
          <script> nctext2();</script>
        </span>  landfill than your neightbors did. 
      </p>
      <p class="img_center">
        <strong>Neighborhood Average: </strong> 
        <?php echo $_SESSION["NCompare"]; ?>%
      </p>
      <!--5 HOUSES-->
      <div class="meow">
       <div class="mew" id="orangegreenhouse1">
        <script> switchImageN1(); </script>
        <br>
        <?php echo $_SESSION["N1add"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse2">
        <script> switchImageN2(); </script>
        <br>
        <?php echo $_SESSION["N2add"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse3">
        <script> switchImageN3(); </script>
        <br>
        <?php echo $_SESSION["N3add"]; ?>
      </div>
      <div class="mew" id="orangegreenhouse4">
        <script> switchImageN4(); </script>
        <br>
        <?php echo $_SESSION["N4add"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse5">
        <script> switchImageN5(); </script>
        <br>
        <?php echo $_SESSION["N5add"]; ?> 
      </div>
     </div>
	 
	 </div> <!-- NAV1 DIV END-->
	  <div id = "nav2">
      <p style="text-align:left">
		We calculated the percentage of waste for those on the same route as you for the week, and here is the average for those on the same route.
      </p>
      <p class="img_center">
        <strong>Route Average: </strong> 
        <?php echo $_SESSION["routeAverage"]; ?>%
		<br>
		<strong>Number of others on the same Route: </strong>
        <?php echo $_SESSION["houseCount"]; ?>
      </p>
      <!--ALL HOUSES ON SAME ROUTE-->
	 </div>

	 <div id = "nav3">
	   <p style="text-align:left">
		We calculated the percentage of waste for those in the same city as you for the week, and here is the average for those in the same city.
      </p>
      <p class="img_center">
        <strong>City Average: </strong> 
        <?php echo $_SESSION["cityAverage"]; ?>%
		<br>
		<strong>Number of others in the same City: </strong>
        <?php echo $_SESSION["cityCount"]; ?>
      </p>
      <!--ALL HOUSES ON SAME ROUTE-->
	 </div>

      </div><!--.row-->
  </div><!--.container-->
 </div><!--.row-->
