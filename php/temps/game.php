<!-- 
    #######################################################
    FILENAME: game.php
    OVERVIEW: Displays Trash Tracker Game
    PURPOSE: Drag and drop game
    #######################################################
-->
<div id="ttGame" class="container" style="background-color:#b4b4b4;  margin-top: 10px; margin-bottom: 80px; 
                              height: auto; width: 100%; padding:10px; text-align:center;">  
  <div id="ttGame" class="hcHead" style="">   
   <strong class ="swhite">TRASH TRACKER GAME</strong><br/>
  </div>
  Drag and drop the trash items into the appropriate bins! 
  <div id="ttGame" class="gc" style="margin-left: auto; margin-right: auto; margin-bottom:0px; 
                          height:auto; padding-left:10%; ppadding-right: 10%; 
                          border-top-left-radius: 10px; border-top-right-radius: 10px;"><br/>
  <!--DRAGGABLE OBJECTS/ TRASH-->
  <div  class = "gchild" id="cig" ondrop = "drop001(event)">
    <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001a">
      <b>Cigarette</b></br>   
      <img src="../images/game/grey/cig.png" width="75px" id = "target001a">
    </div>
  </div>
  <div class = "gchild" id="aluminum" ondrop = "drop002(event)">
   <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002a">
    <b>Aluminum</b></br>
    <img src="../images/game/blue/aluminum.png" width="75px" id = "target002a">
   </div>
  </div>
  <div  class = "gchild" id="egg" ondrop = "drop003(event)">
   <div  ondragstart = "dragStart003(event)" draggable = "true" id = "target003">
    <b>Eggshell</b></br>
    <img src="../images/game/green/egg.png" width="75px" id = "target003">
   </div>
  </div>
  <div class = "gchild" id="mirror" ondrop = "drop001(event)">
   <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001b">
     <b>Mirror</b></br>
     <img src="../images/game/grey/mirror.png" width="75px" id = "target001b">
   </div>
  </div>
  <div class = "gchild" id="glass" ondrop = "drop002(event)">
   <div  ondragstart = "dragStart002(event)" draggable = "true" id = "target002b">
     <b>Glass</b></br>
     <img src="../images/game/blue/glass.png" width="75px" id = "target002b">
   </div>
  </div>
  </div><!--.col -->
  <!--.TRASH CANS-->
  <div class="gc" style="margin-left: auto; margin-right: auto; margin-bottom:0x; 
                          height:auto; padding-left:10%; ppadding-right: 10%;">
  <div class = "box001" ondrop = "drop006(event)" ondragover = "allowDrop001(event)" draggable ="false" id = "place001">
    <img src="../images/tgrey.png" width="100px"><br>
    <b>Trash</b>
  </div>
  <div class = "box001" ondrop = "drop007(event)" ondragover = "allowDrop002(event)" draggable ="false" id = "place002">
    <img src="../images/tblue.png" width="100px"><br/>
    <b>Recycle</b>
  </div>
  <div  class = "box001" ondrop = "drop008(event)" ondragover = "allowDrop003(event)" draggable ="false" id = "place003">
    <img src="../images/tgreen.png" width="100px">
    <b>Greenwaste</b>
  </div>
  </div><!--.gc -->
  <!-- score -->
  <div  class="gc" style="margin-left: auto; margin-right: auto; margin-bottom:0px; 
                          height:auto; padding-left:10%; ppadding-right: 10%;">
  <p>
    <strong class="alignleft">Score</strong> 
    <text id = "score001"> </text>
 </div><!-- .gc -->
 <div  class="gc" id="star" style="margin-left: auto; margin-right: auto; margin-bottom:10px; 
                          height:40px; padding-left:10%; ppadding-right: 10%; padding-bottom: 20px;
                          border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
  <text id = "wrng"></text><br>
  <p></p>
 </div><!-- .gc -->
 </div><!--.container-->

	<script>
    $('#cig').fadeIn('slow');
    //SCORE 
    //var b =  1;
    var current;

    //DRAG
    function dragStart001(event){
      current = event.target.id;
      event.dataTransfer.setData("choice001", event.target.id);
    }
    //DROP
    function allowDrop001(event){
      event.preventDefault();
      event.stopPropagation();
    }
    function dragStart002(event){
      current = event.target.id;
      event.dataTransfer.setData("choice002", event.target.id);
    }
    function allowDrop002(event){
      event.preventDefault();
      event.stopPropagation();
    }
    function dragStart003(event){
      current = event.target.id;
      event.dataTransfer.setData("choice003", event.target.id);
    }
    function allowDrop003(event){
      event.preventDefault();
      event.stopPropagation();
    }
    
    //WASTE
    function drop006(event){
      var data = event.dataTransfer.getData("choice001");  
      if(data === ""){
        //$('#'+current).remove();
        $('#'+current).hide();
        //score001.innerHTML = b--;
        alert ('INCORRECT');
        event.preventDefault();
        event.stopPropagation();

        var elem = document.createElement("img")
        document.getElementById("star").appendChild(elem).style.width = "5%";
        elem.src = '../images/game/badstarpoint.png';
      }
     else{
      event.target.appendChild(document.getElementById(data));
      //score001.innerHTML = b++;
      alert ('CORRECT');
      event.preventDefault();
      event.stopPropagation();

      var elem = document.createElement("img")
      document.getElementById("star").appendChild(elem).style.width = "5%";
      elem.src = '../images/game/starpoint.png';
      //place001.innerHTML = "1";    
    }
    loadNext();
    }

    //RECYCLE
    function drop007(event){
      var data = event.dataTransfer.getData("choice002");
      if(data === ""){
        $('#'+current).hide();
        //score001.innerHTML = b--;
        alert ('INCORRECT');
        event.preventDefault();
        event.stopPropagation();

        var elem = document.createElement("img")
        document.getElementById("star").appendChild(elem).style.width = "5%";
        elem.src = '../images/game/badstarpoint.png';      
      }
      else{    
        event.target.appendChild(document.getElementById(data));
        //score001.innerHTML = b++;
        alert ('CORRECT');
        event.preventDefault();
        event.stopPropagation();

        var elem = document.createElement("img")
        document.getElementById("star").appendChild(elem).style.width = "5%";
        elem.src = '../images/game/starpoint.png';
      }
      loadNext();
      //place002.innerHTML = "2";
    }

    //GREENWASTE
    function drop008(event){ 
      var data = event.dataTransfer.getData("choice003");
      if(data === ""){
        $('#'+current).hide();
        //score001.innerHTML = b--;
        alert ('INCORRECT');
        event.preventDefault();
        event.stopPropagation();

        var elem = document.createElement("img")
        document.getElementById("star").appendChild(elem).style.width = "5%";
        elem.src = '../images/game/badstarpoint.png';    
      }
      else{    
        event.target.appendChild(document.getElementById(data));
        //score001.innerHTML = b++;
        alert ('CORRECT');
        event.preventDefault();
        event.stopPropagation();

        var elem = document.createElement("img")
        document.getElementById("star").appendChild(elem).style.width = "5%";
        elem.src = '../images/game/starpoint.png';
      }
      //place003.innerHTML = "3";
      loadNext();
    }
    
    var trashCounter = 1;
    function loadNext(){
      if(trashCounter == 1){
        $('#aluminum').fadeIn('slow');
      }
      else if(trashCounter == 2){
        $('#egg').fadeIn('slow');
      }
      else if(trashCounter == 3){
        $('#mirror').fadeIn('slow');
      }
      else if(trashCounter == 4){
        $('#glass').fadeIn('slow');
      }
      else
        alert('Completed the Game');

      trashCounter++;
    }
	</script>
