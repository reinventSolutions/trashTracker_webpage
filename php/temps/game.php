<div class="container" style="background-color:#b4b4b4;  margin-top: 10px; margin-bottom: 80px; 
                              height: auto; width: 100%; padding:10px; text-align:center;">  
                              <div class="hcHead" style="">   
   <strong class ="swhite">TRASH TRACKER GAME</strong><br/>
  </div>
  Drag and drop the trash items into the appropriate bins!
  <div class="gc" style="margin-left: auto; margin-right: auto; margin-bottom:0px; 
                          height:auto; padding-left:10%; ppadding-right: 10%; 
                          border-top-left-radius: 10px; border-top-right-radius: 10px;"><br/>
  <!--DRAGGABLE OBJECTS/ TRASH-->
  <div class = "gchild" ondrop = "drop001(event)">
    <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001a">
      <b>Cig</b></br>   
      <img src="../images/game/grey/cig.png" width="50px" id = "target001a">
    </div>
  </div>
  <div class = "gchild" ondrop = "drop002(event)">
   <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002a">
    <b>Aluminum</b></br>
    <img src="../images/game/blue/aluminum.png" width="50px" id = "target002a">
   </div>
  </div>
  <div class = "gchild" ondrop = "drop003(event)">
   <div ondragstart = "dragStart003(event)" draggable = "true" id = "target003">
    <b>Eggshell</b></br>
    <img src="../images/game/green/egg.png" width="50px" id = "target003">
   </div>
  </div>
  <div class = "gchild" ondrop = "drop001(event)">
   <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001b">
     <b>Mirror</b></br>
     <img src="../images/game/grey/mirror.png" width="50px" id = "target001b">
   </div>
  </div>
  <div class = "gchild" ondrop = "drop002(event)">
   <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002b">
     <b>Glass</b></br>
     <img src="../images/game/blue/glass.png" width="50px" id = "target002b">
   </div>
  </div>
  </div><!--.col -->
  <!--.TRASH CANS-->
  <div class="gc" style="margin-left: auto; margin-right: auto; margin-bottom:0x; 
                          height:auto; padding-left:10%; ppadding-right: 10%;">
  <div class = "box001" ondrop = "drop006(event)" ondragover = "allowDrop001(event)" id = "place001">
    <img src="../images/grey.png" width="75px"><br>
    <b>Trash</b>
  </div>
  <div class = "box001" ondrop = "drop007(event)" ondragover = "allowDrop002(event)" id = "place002">
    <img src="../images/blue.png" width="75px"><br/>
    <b>Recycle</b>
  </div>
  <div class = "box001" ondrop = "drop008(event)" ondragover = "allowDrop003(event)" id = "place003">
    <img src="../images/green.png" width="75px">
    <b>Greenwaste</b>
  </div>
  </div><!--.gc -->
  <!-- score -->
  <div class="gc" style="margin-left: auto; margin-right: auto; margin-bottom:0px; 
                          height:auto; padding-left:10%; ppadding-right: 10%;">
  <p>
    <strong class="alignleft">Score:</strong> 
    <text id = "score001">0</text>
 </div><!-- .gc -->
 <div class="gc" id="star" style="margin-left: auto; margin-right: auto; margin-bottom:10px; 
                          height:40px; padding-left:10%; ppadding-right: 10%; padding-bottom: 20px;
                          border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
  <text id = "wrng"></text><br>
  <p></p>
 </div><!-- .gc -->
 </div><!--.container-->

	<script>
    var b = 0;
    b++;
    function dragStart001(event){
      event.dataTransfer.setData("choice001", event.target.id);
    }
    function allowDrop001(event){
      event.preventDefault();
    }
    function dragStart002(event){
      event.dataTransfer.setData("choice002", event.target.id);
    }
    function allowDrop002(event){
      event.preventDefault();
    }
    function dragStart003(event){
      event.dataTransfer.setData("choice003", event.target.id);
    }
    function allowDrop003(event){
      event.preventDefault();
    }
    
    //WASTE
    function drop006(event){
     var data = event.dataTransfer.getData("choice001");  
     if(data === ""){
      wrng.innerHTML = 'wrong';
      //alert("wrong!");
     }
     else{    

    }
     event.target.appendChild(document.getElementById(data));
     score001.innerHTML = b++;
     var elem = document.createElement("img")
      document.getElementById("star").appendChild(elem).style.width = "5%";
      elem.src = '../images/game/starpoint.png';
     //place001.innerHTML = "1";
    }

    //RECYCLE
    function drop007(event){
      var data = event.dataTransfer.getData("choice002");
      if(data === ""){
        alert("wrong!");
      }
      else{    

      }
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      var elem = document.createElement("img")
      document.getElementById("star").appendChild(elem).style.width = "5%";
      elem.src = '../images/game/starpoint.png';
      //place002.innerHTML = "2";
    }

    //GREENWASTE
    function drop008(event){
      var data = event.dataTransfer.getData("choice003");
      if(data === ""){
        alert("wrong!");
      }
      else{    

      }
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      var elem = document.createElement("img")
      document.getElementById("star").appendChild(elem).style.width = "5%";
      elem.src = '../images/game/starpoint.png';
      //place003.innerHTML = "3";
    }
	</script>
