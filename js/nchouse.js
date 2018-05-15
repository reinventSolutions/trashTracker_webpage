/*
  OVERVIEW: JS scripts for normal comp
*/ 
ratioInfo();
function ratioInfo(){
var owner = "<?php echo $housecompare ?>";
var neighbor = "<?php echo $neighborcomparison?>";
var elem = document.createElement("img")
document.getElementById("yourratiobig").appendChild(elem).style.width = "25%";
if(owner < neighbor)
  elem.src = '../images/redhouse.png';
else
elem.src = '../images/greenhouse.png';
}
//THUMBS FUNCTION
thunbs();
function thumbs(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  var elem = document.createElement("img")
  document.getElementById("thumbupdown").appendChild(elem).style.width = "40%";
if(neighbor < owner)
 elem.src = '../images/thumb.png';
else
 elem.src = '../images/rthumbDown.png';
}
ttext1();
function ttext1(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  //var less = "less";
  //var more = "more";
  var elem = document.getElementById("tratio1");
if(neighbor < owner)
  elem.innerHTML = "<b>Nice job!</b>";
else
  elem.innerHTML = "<b>You can do better!</b>";
}
thumbsN();
function thumbsN(){
  var owner = <?php echo $housecompare ?>;
  var route = <?php echo $routeTotalAverage?>;
  var elem = document.createElement("img")
  document.getElementById("thumbs2").appendChild(elem).style.width = "40%";
if(route < owner)
 elem.src = '../images/thumb.png';
else
 elem.src = '../images/rthumbDown.png';
}
ttext2();
function ttext2(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  //var less = "less";
  //var more = "more";
  var elem = document.getElementById("tratio2");
if(neighbor < owner)        
  elem.innerHTML = "<b>Well done!</b>";
else
  elem.innerHTML = "<b>You have alot of neighbors!</b>";
}
thumbsC();
function thumbsC(){
  var owner = <?php echo $housecompare ?>;
  var city = <?php echo $cityTotalAverage?>;
  var elem = document.createElement("img")
  document.getElementById("thumbs3").appendChild(elem).style.width = "40%";
if(city < owner)
 elem.src = '../images/thumb.png';
else
 elem.src = '../images/rthumbDown.png';
}
ttext3();
function ttext3(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  //var less = "less";
  //var more = "more";
  var elem = document.getElementById("tratio3");
if(neighbor < owner)
  elem.innerHTML = "<b>Amazing!</b>";
else
  elem.innerHTML = "<b>It's okay, its the city!</b>";

}

//MAIN RATIO
nctext1();
function nctext1(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  //var less = "less";
  //var more = "more";
  var elem = document.getElementById("ncratio1");
if(neighbor < owner)
  elem.innerHTML = "<b>more</b>";
else
  elem.innerHTML = "<b>less</b>";
}
nctext2();
function nctext2(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  //var less = "less";
  //var more = "more";
  var elem = document.getElementById("ncratio2");
if(neighbor < owner)
   elem.innerHTML = "<b>less</b>";
else
   elem.innerHTML = "<b>more</b>";
}
mainRatio();
function mainRatio(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  var elem = document.createElement("img")
  document.getElementById("mr").appendChild(elem).style.width = "15%";
  document.getElementById("mr").style.aligncontent = "center";
if(owner < neighbor)
  elem.src = '../images/redhouse.png';

else
  elem.src = '../images/greenhouse.png';
}
switchImageN1();
function switchImageN1(){
  var owner = <?php echo $housecompare ?>;
  var neighbor = <?php echo $neighborcomparison?>;
  var elem = document.createElement("img")
  document.getElementById("orangegreenhouse1").appendChild(elem).style.width = "25%";
if(neighbor < owner)
  elem.src = '../images/redhouse.png';
else
  elem.src = '../images/greenhouse.png';
}
switchImageN2();
function switchImageN2(){
  var owner = "<?php echo $housecompare ?>";
  var neighbor = "<?php echo $neighborcomparison?>";
  var elem = document.createElement("img")
  document.getElementById("orangegreenhouse2").appendChild(elem).style.width = "25%";
if(neighbor < owner)
  elem.src = '../images/redhouse.png';
else
  elem.src = '../images/greenhouse.png';
}
switchImageN3();
function switchImageN3(){
  var owner = "<?php echo $housecompare ?>";
  var neighbor = "<?php echo $neighborcomparison?>";
  var elem = document.createElement("img")
  document.getElementById("orangegreenhouse3").appendChild(elem).style.width = "25%";
if(neighbor < owner)
  elem.src = '../images/redhouse.png';
else
  elem.src = '../images/greenhouse.png';
}
switchImageN4();
function switchImageN4(){
  var owner = "<?php echo $housecompare ?>";
  var neighbor = "<?php echo $neighborcomparison?>";
  var elem = document.createElement("img")
  document.getElementById("orangegreenhouse4").appendChild(elem).style.width = "25%";
if(neighbor < owner)
  elem.src = '../images/redhouse.png';
else
  elem.src = '../images/greenhouse.png';
}
switchImageN5();
function switchImageN5(){
  var owner = "<?php echo $housecompare ?>";
  var neighbor = "<?php echo $neighborcomparison?>";
  var elem = document.createElement("img")
  document.getElementById("orangegreenhouse5").appendChild(elem).style.width = "25%";
if(neighbor < owner)
  elem.src = '../images/redhouse.png';
else
  elem.src = '../images/greenhouse.png';
}