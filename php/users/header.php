<!-- 
    #######################################################
    FILENAME: header.php
    OVERVIEW: PHP page for Trash Tracker's index and related 
    header, "Welcome to Trash Tracker".
    PURPOSE: Header for entry of Trash Tracker.
    #######################################################
-->
<!-- HEADER -->
 <div class="row"></div>
 <div class="" id="id" style="background-color:#FFF"><!--container-fuild-->
    <div class="flexNavContainer" style="background-color:#FFF;">
      <img class="logoresize" src="../../images/trashtracker.png" width="250px" class="logo"> 
   </div>
   <div class="row"></div>
  <div class="flexNavContainer" style="background-color:#f8f9fa;"> 
    <div class="threel">
      <p class = "alignright">
      <a href="../account.php"> 
       <button type="button" class="btn btn-outline-secondary" href="../account.php">Return</button>
      </a>    
<!-- asfd 
      <a href="../users/logout.php"> 
       <button type="button" class="btn btn-outline-secondary"  onclick="../users/logout.php" href="">Logout</button>
      </a>
      --> 
      <a href="#" class="btn btn-outline-secondary" data-toggle="modal" data-target="#logoutModal">
        Logout
     </a>    
    </p>
  </div>
 </div>
 </div><!--container-fuild-->

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
          <form action="logout.php" method="post">
            <input type="hidden" name="" value="" />
            <!--LOGOUT-->
              <a id="logout_link" class="btn btn-danger" href="logout.php">Logout</a>
            <button type="button" class="btn" data-dismiss="modal">Cancel</button>
            <!--<button class="btn btn-default" data-dismiss="modal">Cancel</button>-->
          </form>
        </div>
      </div><!--END LOGOUT BODY-->
    </div>
  </div>
</div><!--END LOGOUT CONTAINER-->
