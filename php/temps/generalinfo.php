<!-- 
    #######################################################
    FILENAME: generalInfo.php
    OVERVIEW: Displays relative user info, bin ifo, and
    next pick up date. 
    PURPOSE: User informative.
    #######################################################
-->
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
      <b>Your Address:</b> <br/>
      <?php echo $_SESSION["Address"]; ?><br/>
      <?php echo $_SESSION["City"]; ?>
      <?php echo $_SESSION["St"]; ?>
      <?php echo $_SESSION["Zip"]; ?><br/>
    <?php } ?><br/>
    <a href="users/settings.php">
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" href="users/settings.php">Profile</button>
    </a>
    &nbsp;
    <a href="users/billPay.php">
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" href="users/billPay.php" disabled>Bill Pay</button>
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
              <a class="btn btn-danger" id="logout_link" href="users/logout.php">Logout</a>
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
    <a href="#" title="Trash" data-toggle="popover" data-trigger="hover" data-html='true' data-content ="T95036121">
    <!-- php echo $binID1; -->
     <button type="button" class="">
      <img src="../images/tgrey.png" width="32px">
     </button>
    </a>
    <a href="#" title="Recycling" data-toggle="popover" data-trigger="hover" data-html='true' data-content ="R65059027">
    <!-- php echo $binID2;  -->
      <button type="button" class="">
        <img src="../images/tblue.png" width="30px">
      </button>
    </a>
    <a href="#" title="Greenwaste" data-toggle="popover" data-trigger="hover" data-html='true' data-content ="95G02442">
    <!-- php echo $binID3;-->
      <button type="button" class="">
       <img src="../images/tgreen.png" width="30px">
      </button>
    </a><br/>
    <span class="img_center">Hover for more <br>information </span>
   </div><!--.col-->
  </div><!--.row-->
<!--.BIN INFO-->

<!--NEXT PICK UP-->
<div class="row">
  <div class="twol" style="width:100%;">
  <div class="genHead" style="">
    <strong class ="swhite">NEXT PICK UP</strong>
  </div>
  <img src="../images/tblue.png" width="100px"><br>
  <!-- https://phppot.com/php/dates-and-time-in-php/ -->
<?php echo $_SESSION["NextPickup"]; ?>
  <br>
  </div>
 </div>
<!--.NEXT PICK UP-->
<!--RATIO-->
 <div class="row">
  <div class="onel" id= "yourratiobig">
  <div class="genHead" style="">
    <strong class ="swhite">YOUR RECYCLING</strong>
  </div>
  The amount of trash that<br> you recycled this week:
   <p class="img_center">
     <script>ratioInfo();</script>
     <b><?php echo $_SESSION["HouseCompare"]; ?>%</b><br>
   </p>
  </div><!--.onel-->
 </div><!--.row-->
<!--.RATIO-->
</div><!--.LEFT-->
