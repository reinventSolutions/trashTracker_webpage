<div class="container"><!--MAIN CONTAINER-->
  <div class="row">
  <!--LEFT--> 
  <div class="oneLeft" id="info">
  <div class="row"><!--.row-->
  <!--INFO
  <div class="genHead" style="">  header 
  PROFILE
  </div> .header   
  -->
  <div class="twol" style="">
  <div class="genHead" style="">   
    <strong class ="swhite">PROFILE</strong>
  </div>
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
    <a href="#" data-toggle="modal" data-target="#logoutModal"> 
          <button type="button" class="btn btn-outline-secondary">Logout</button>
     </a> 
   </div><!--.INFO-->
  </div><!--.row-->


 <!--LOGOUT MODAL -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <!--LOGOUT HEADER-->
      <div class="modal-header">
        <h4>Log Out<i class="fa fa-lock"></i></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="pull-left" aria-hidden="true">x</span>
        </button>
      </div>
      <!--LOGOUT BODY-->
      <div class="modal-body">
        <p class="logout_message">
          <i class="fa fa-question-circle"></i>Are you sure you want to logout? <br />
        </p>
        <!--LOGOUT BUTTON-->
        <div class="actionsBtns">
          <form action="users/logout.php" method="post">
            <input type="hidden" name="" value="" />
            <!--LOGOUT-->
            <button type="button" class="btn btn-danger">
              <a id="logout_link" class="link" href="users/logout.php">Logout</a>
            </button>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            <!--<button class="btn btn-default" data-dismiss="modal">Cancel</button>-->
          </form>
        </div>
      </div><!--END LOGOUT BODY-->
    </div>
  </div>
</div><!--END LOGOUT CONTAINER-->

   
<!--BIN INFO-->
<div class="row">
<div class="onel" style=""><!--BIN INFO-->
<div class="genHead" style="">   
  <strong class ="swhite">BIN INFO</strong><br/>
</div>
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
    <span class="img_center">Hover for more <br>information </span>
   </div><!--.col-->
  </div><!--.row-->
<!--.BIN INFO-->
<!--NEXT PICK UP-->
<div class="row">
  <div class="twol" style="">
  <div class="genHead" style="">   
    <strong class ="swhite">NEXT PICK UP</strong>
  </div>
  <img src="../images/recycle.png" width="100px"><br>
    <?php echo $_SESSION["NextPickup"]; ?> <br>
  </div>
 </div>
<!--.NEXT PICK UP-->
<!--RATIO-->
 <div class="row">
  <div class="onel" id= "yourratiobig">
  <div class="genHead" style="">   
    <strong class ="swhite">YOUR RATIO</strong>
  </div>
  <strong>Your recycling score is:</strong>
   <p class="img_center">
     <script>ratioInfo();</script>
     <?php echo $_SESSION["HouseCompare"]; ?>%<br>
   </p>
  </div><!--.onel-->
 </div><!--.row-->
<!--.RATIO-->
</div><!--.LEFT--> 