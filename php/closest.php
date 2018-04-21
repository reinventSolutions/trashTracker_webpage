<?php include "routeavg.php"; ?>
<?php include "cityavg.php"; ?>
<script>
  $("#nav1").hide();//Closest
  $("#nav2").hide();//Neighborhood
  $("#nav3").hide();//City
</script>
<div class="hcHead" style="">   
   <strong class ="swhite">NORMAL COMPARISON</strong><br/>
</div>
  <div class="col-sm" style="background-color:#FFFFFF; margin: 5px;"><br/><!--thumbs-->
    <h4>How do you stack up?</h4>
    <p id > We calculated the percent of waste you recycled this month, and found that you recycled 
    <span id="tratio1">
      <script> ttext1();</script>
    </span> and sent 
    <span id="tratio2">
      <script> ttext2();</script>
    </span> landfill than your neightbors did. </p>
    <div class="thumbs" id="thumbupdown" onload="thumbs()" style="text-align: center;">
      <script> thumbs();</script>
    </div><!--.thumbs-->
   </div><!--.col-->
  <!--NORMAL COMP INFO--> 
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
        <?php echo $_SESSION["N1"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse2">
        <script> switchImageN2(); </script>
        <br>
        <?php echo $_SESSION["N2"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse3">
        <script> switchImageN3(); </script>
        <br>
        <?php echo $_SESSION["N3"]; ?>
      </div>
      <div class="mew" id="orangegreenhouse4">
        <script> switchImageN4(); </script>
        <br>
        <?php echo $_SESSION["N4"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse5">
        <script> switchImageN5(); </script>
        <br>
        <?php echo $_SESSION["N5"]; ?> 
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
