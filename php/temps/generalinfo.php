<div class="container"><!--MAIN CONTAINER-->
  <div class="row">
  <!--LEFT--> 
  <div class="oneLeft" id="info">
  <div class="row"><!--.row-->
  <!--INFO-->
   <div class="onel" style="">
    <?php 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){?>
      <p> Welcome 
        <span class="name"><?php echo $_SESSION["name"]; ?></span>
      </br>
      <strong>Your Address:</strong> <br/>
      <?php echo $_SESSION["Address"]; ?><br/>
      <?php echo $_SESSION["City"]; ?>
      <?php echo $_SESSION["St"]; ?>
      <?php echo $_SESSION["Zip"]; ?><br/>
    <?php } ?><br/>
    <a href="users/settings.php"> 
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" href="users/settings.php">Profile</button>
    </a>    
    &nbsp;	
    <a href="users/logout.php"> 
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" onclick="users/logout.php" href="">Logout</button>
    </a>     
   </div><!--.INFO-->
  </div><!--.row-->
<!--BIN INFO-->
<div class="row">
<div class="twol" style=""><!--BIN INFO-->
  <strong>Your Bins:</strong><br/>
    <a href="#" title="Trash" data-toggle="popover" data-trigger="hover" data-html='true' data-content =<?php echo $binID1; ?>
      <button type="button" class="">
       <img src="../images/grey.png" width="32px">
      </button>
    </a>
    <a href="#" title="Recycling" data-toggle="popover" data-trigger="hover" data-html='true' data-content =<?php echo $binID2; ?>
      <button type="button" class="">
       <img src="../images/blue.png" width="30px">
      </button>
      </a>
    <a href="#" title="Greenwaste" data-toggle="popover" data-trigger="hover" data-html='true' data-content =<?php echo $binID3; ?>
      <button type="button" class="">
       <img src="../images/green.png" width="30px">
      </button>
    </a><br/>
    <span class="img_center">Hover for more information </span>
   </div><!--.col-->
  </div><!--.row-->
<!--.BIN INFO-->
<!--NEXT PICK UP-->
<div class="row">
  <div class="onel" style="">
  <img src="../images/recycle.png" width="100px"><br>
    <strong>Next Pick Up:</strong> <br>
    <?php echo $_SESSION["NextPickup"]; ?> <br>
  </div>
 </div>
<!--.NEXT PICK UP-->
<!--RATIO-->
 <div class="row">
  <div class="onel" id= "yourratiobig">
   <p class="img_center">
     <script>ratioInfo();</script>
     <strong>Your Ratio:</strong> <br>    
     <?php echo $_SESSION["HouseCompare"]; ?>%<br>
   </p>
  </div><!--.onel-->
 </div><!--.row-->
<!--.RATIO-->
</div><!--.LEFT--> 