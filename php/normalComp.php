<div class="col" style="background-color:#FFFFFF; margin: 5px;"><br/><!--thumbs-->
    <h4>How do you stack up?</h4>
    <p> We calculated the percent of waste you recycled this month, and found that you recycled more and 
        sent less landfill than your neightbors did. </p>
    <div class="thumbs" id="thumbupdown" onload="thumbs()" style="text-align: center;">
      <script> thumbs();</script>
      <p></p>
    </div><!--.thumbs-->
   </div><!--.col-->
  <!--NORMAL COMP INFO--> 
  <div class="col-sm-8" id ="yourratio" style="background-color:#FFFFFF; margin: 5;text-align: center;">
	<script>
	$(document).ready(function(){
		$("#closestInput").click(function(){
			$("#closest").show();
      $("nav1").show();
			$("#neighborhood").hide();
      $("#nav2").hide();
			$("#city").hide();
		});

		$("#neighborInput").click(function(){
      $("#neighborhood").show();
			$("#closest").hide();
			$("#city").hide();
		});

		$("#cityInput").click(function(){
			$("#closest").hide();
			$("#neighborhood").hide();
		});
	});
	</script>
	<ul class="nav nav-tabs">
      <li class="nav-item">
        <input type = "button" id = "closestInput" class="nav-item nav-link" value = "Closest"/>
      </li>
      <li class="nav-item">
        <input type = "button" id = "neighborInput" class="nav-item nav-link" value = "Neighborhood"/>
      </li>
      <li class="nav-item">
        <input type = "button" id = "cityInput" class="nav-item nav-link" value = "City"/>
      </li>
    </ul>
    <div ="nav1">
    <!--HOUSE SCRIPT-->
      <script>mainRatio();</script>
      <br/><strong>Your Ratio: </strong> 
        <?php echo $_SESSION["HouseCompare"]; ?>%
      <br>
      <p style="text-align:left">
        We calculated the percent of waste you recycled this month, and found that you recycled more and 
        sent less landfill than your neightbors did. 
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
     </div><!--.meow-->
    </div><!-- nav1 -->

    <div id="nav2">
      <strong>Neighborhood</strong>
    </div><!-- nav2 -->
     <!--.5 HOUSES-->
    </div><!--.col-sm 8-->
   </div><!--.row-->
  </div><!--.container-->
 </div><!--.row-->
</div><!--.LEFT-->