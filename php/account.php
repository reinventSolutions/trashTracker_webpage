<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Trash Tracker</title>
        <link rel="icon" href="../images/trashtracker.png"/>
        <!--BOOTSTRAP-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet" href="../css/stylesheet.css">
        <!--CSS MEDIA QUERY-->
        <link rel="stylesheet" href="../css/stylesheet2.css">
        <!-- ICONS https://material.io/icons/#ic_cloud-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--POPOVER
        https://www.w3schools.com/bootstrap4/bootstrap_popover.asp
        -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script type="text/javascript" src="../js/popover.js"></script>
        <!--GRAPH-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="../js/graph.js"></script>
</head>

<body style="background-color:#b4b4b4;"> <!--START OF BODY-->     
 <header style="margin-bottom:50px;"> <!--START OF HEADER-->
  <!--START OF NAV-->  
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#fff;">
      <a class="navbar-brand" href="#"></a>
      <img class="img" src="../images/trashtracker.png" width="40px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Users <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <span class="navbar-text">
            <a href="login.html"> 
                <button type="button" class="btn btn-outline-secondary">Logout</button>
              </a>        
            </span>
      </div>
  </nav><!--END OF NAV-->
</header><!--END OF HEADER-->

<div class="container" style="margin-bottom: 80px;">
  <div class="row">

    <!--LEFT--> 
    <div class="oneLeft" id="info" style="">
      <div class="row"><!--.row-->
        <div class="onel" style=""><!--LOGO-->
            <p>Welcome [name] <br/>
                Street <br/>
                <p class="img_center">

              </p>
            </p>              
        </div><!--LOGO-->
    </div><!--.row-->
      
    
    <div class="row">
    <div class="twol" style=""><!--BIN INFO-->
      <h6>Your bins</h6>
                <a href="#" title="Trash" data-toggle="popover" data-trigger="hover" data-content="BIN NUMBER">
                <button type="button" class="">
                    <img src="../images/grey.png" width="32px">
                </button>
            </a>
            <a href="#" title="Recycling" data-toggle="popover" data-trigger="hover" data-content="BIN NUMBER">
                <button type="button" class="">
                    <img src="../images/blue.png" width="30px">
                </button>
            </a>
            <a href="#" title="Greenwaste" data-toggle="popover" data-trigger="hover" data-content="BIN NUMBER">
                <button type="button" class="">

                  <img src="../images/green.png" width="30px">
                </button>
            </a>
        <h6 class="img_center">Click for more information</h6>
      </div><!--.col-->
     </div><!--.row-->

    <div class="row">
    <div class="threel" style="">
        <img src="../images/blue.png" width="100px"><br>
        NEXT PICK UP: <br>
        MM/DD/YY<br>
      </div>
  </div>

  </div><!--LEFT--> 

  <!--RIGHT--> 
  <div class="container" id="info" style="background-color:#f7f7f7;  width:800px; height:auto;">
    <div class="row">
      <!--Historical Comparison-->
        <div class="col" style="background-color:#FFFFFF; margin: 5px; height:auto;">
            <ul class="nav nav-tabs">
             <li class="nav-item">
              <a class="nav-link active" href="#">Weekly View</a>
             </li>
             <li class="nav-item">
              <a class="nav-link disabled" href="#">Monthly</a>
             </li>
             <li class="nav-item">
              <a class="nav-link disabled" href="#">Year View</a>
             </li>
            </ul>
            <p>
           <!--GRAPH DIV-->
           <a href=""><i class="material-icons">arrow_back</i>Past Week</a>
           <span class="alignright">
             <a href="">Next Week<i class="material-icons">arrow_forward</i></a>
           </span>
           <div id="chart_div" style="padding: 10px; width: 75%; height: 400px;"></div>

            <div id="btn-group">
              <button class="button button-blue" id="none">No Format</button>
              <button class="button button-blue" id="scientific">Scientific Notation</button>
              <button class="button button-blue" id="decimal">Decimal</button>
              <button class="button button-blue" id="short">Short</button>
            </div>

            <!---
             <p class="img_center">
            <a class="btn btn-sm btn-primary" href="" role="button">Recycling</a> &nbsp
            <a class="btn btn-sm btn-secondary" href="" role="button">Trash</a> &nbsp
            <a class="btn btn-sm btn-success" href="" role="button">Green Waste</a> &nbsp 
           </p>-->

         </div><!--.col-sm-->
         </div><!--.row-->
        
         <div class="row">
          <!--Normal Comparison-->
          <div class="col" style="background-color:#FFFFFF; margin: 5px;">
          <h4>How do you stack up?</h4>
          <div class="thumbs" id="thumbupdown" onload="loadImage()" style="text-align: center;">
            <script type="text/javascript">
              loadImage();
              function loadImage()
              {
                var elem = document.createElement("img")
                document.getElementById("thumbupdown").appendChild(elem).style.width = "50%";
                if(Math.random() < 0.5)
                elem.src = '../images/thumb.png';
                else
                elem.src = '../images/thumbDown.png';
                }



              </script>  
          </div>
          </div>

          <div class="col-sm-8" style="background-color:#FFFFFF; margin: 5px;">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Closest</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Neighborhood</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">City</a>
            </li>
          </ul>
          <p>
            We calculated the percent of waste you recycled this month, and found that you recycled more and sent less landfill than your neightbors did. 
          </p>
          </div><!--.col-sm 8-->
          </div><!--.row-->
             
   <!--RECYCLE GAME-->
   <div class="row">
        <div class="container">  
        <span class="img_center">
              <h3>Drag and drop each item into the correct bin for points!</h3>
          </span>
        </div>
       <div class="col-sm-6" style="background-color:#FFFFFF; margin: 5px; height:auto;">
        <p class="img_center" style="padding-top:25px;">
          <img src="../images/apple.png"><br><br>
          <img src="../images/grey.png" width="60px"> 
          <img src="../images/blue.png" width="60px"> 
          <img src="../images/green.png" width="60px">    
        </p>
        <br>
         <a href=""><i class="material-icons">arrow_back</i>Previous</a>
         <span class="alignright"><a href="">Next<i class="material-icons">arrow_forward</i></a></span>
        <br>  
       </div>
      <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; height:auto;">
          <p class="img_center" style="padding-top:25px;">
            <img src="../images/game/badge.png"><br><br>
          To date you've gotten 12 correct!<br>
            <img src="../images/game/stars.png" width="150px"><br><br>
          </p>
      </div>  
    
        
        </div><!--.row --> 
        </div><!--.container-->
     
   
     </div>
     </div>
   
   <footer><!--FOOTER CONTAINER-->
   <nav class="navbar fixed-bottom navbar-expand navbar-light bg-light"><!--START BOTTOM NAVBAR-->
             <a class="nav-link" href="http://trackingtrash.com/" target="blank">Contact Us</a> 
             |
             <a class="nav-link" href="">Privacy and Policy</a>
         </div>
     </nav><!--END BOTTOM NAVBAR-->
   </footer><!--.FOOTER-->
   
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>

<!--
    DENISE THUY VY NGUYEN
    2/1/2018
-->