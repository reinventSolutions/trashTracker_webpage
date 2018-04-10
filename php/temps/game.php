<div class="container" style="background-color:#b4b4b4;  margin-top: 10px; margin-bottom: 80px; 
                              width: 80%; padding:10px; text-align:center;">  
  <span class="img_center">
    <h3>Trash Tracker Game!</h3>
  </span>
  <div class="col" style="background-color:#FFF; margin-left: auto; margin-right: auto; margin-bottom:20px; 
                          height:310px; padding-left:20%; ppadding-right: 20%; text-align:center;"><br/>
  <!--DRAGGABLE OBJECTS/ TRASH-->
  <div class = "box002" ondrop = "drop001(event)">
    <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001a">
      <img src="../images/game/grey/cig.png" width="50px" id = "target001a">
    </div>
  </div>
  <div class = "box002" ondrop = "drop002(event)">
    <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002a">
    <img src="../images/game/blue/aluminum.png" width="50px" id = "target002a">
  </div>
  </div>
  <div class = "box002" ondrop = "drop003(event)">
    <div ondragstart = "dragStart003(event)" draggable = "true" id = "target003">
    <img src="../images/game/green/egg.png" width="50px" id = "target003">
    </div>
  </div>
  <div class = "box002" ondrop = "drop001(event)">
    <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001b">
      <img src="../images/game/grey/mirror.png" width="50px" id = "target001b">
    </div>
  </div>
  <div class = "box002" ondrop = "drop002(event)">
    <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002b">
      <img src="../images/game/blue/glass.png" width="50px" id = "target002b">
    </div>
  </div>
  <!--.DRAGGABLE OBJECTS/ TRASH-->
  <br></br><br></br>
  <!--TRASH CANS-->
  <div class = "box001" ondrop = "drop006(event)" ondragover = "allowDrop001(event)" id = "place001">
    <img src="../images/grey.png" width="75px">
  </div>
  <div class = "box001" ondrop = "drop007(event)" ondragover = "allowDrop002(event)" id = "place002">
    <img src="../images/blue.png" width="75px">
  </div>
  <div class = "box001" ondrop = "drop008(event)" ondragover = "allowDrop003(event)" id = "place003">
    <img src="../images/green.png" width="75px">
  </div>
  </div><!--.col -->     
  <div class ="row"></div>
  <!--.TRASH CANS-->
<div class="col" style="background-color:#FFF">
<p>
  <strong class="alignleft">Score:</strong> 
  <text id = "score001">0</text>
  <p id="game">
  
  </p>
</p>
</div><!--.col --> 
</div><!--.container-->
</div><!--.col -->     
</div><!--.row --> 
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
      alert("wrong!");
     }
     else{    
      alert('Correct');
     }
     event.target.appendChild(document.getElementById(data));
     score001.innerHTML = b++;
     //place001.innerHTML = "1";
    }

    //RECYCLE
    function drop007(event){
      var data = event.dataTransfer.getData("choice002");
      if(data === ""){
        alert("wrong!");
      }
      else{    
        alert('Correct');
      }
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      //place002.innerHTML = "2";
    }

    //GREENWASTE
    function drop008(event){
      var data = event.dataTransfer.getData("choice003");
      if(data === ""){
        alert("wrong!");
      }
      else{    
       alert('Correct');
      }
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      //place003.innerHTML = "3";
    }
	</script>
