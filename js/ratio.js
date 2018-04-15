        //GENERAL INFO YOUR RATIO 
        function ratioInfo(){
        var owner = "<?php echo $housecompare ?>";
        var neighbor = "<?php echo $neighborcomparison?>";
        var elem = document.createElement("img")
        document.getElementById("yourratiobig").appendChild(elem).style.width = "50%";
        if(owner < neighbor)
          elem.src = '../images/orangehouse.png';
        else
        elem.src = '../images/greenhouse.png';
        }
        //THUMBS FUNCTION
        function thumbs(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("thumbupdown").appendChild(elem).style.width = "50%";
        if(neighbor < owner)
         elem.src = '../images/thumb.png';
        else
         elem.src = '../images/thumbDown.png';
        }
        //MAIN RATIO 
        function mainRatio(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("yourratio").appendChild(elem).style.width = "15%";
          document.getElementById("yourratio").style.aligncontent = "center";
        if(owner < neighbor)
          elem.src = '../images/orangehouse.png';

        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN1(){
          var owner = <?php echo $housecompare ?>; 
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse1").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN2(){
          var owner = "<?php echo $housecompare ?>"; 
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse2").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN3(){
          var owner = "<?php echo $housecompare ?>"; 
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse3").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN4(){
          var owner = "<?php echo $housecompare ?>"; 
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse4").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN5(){
          var owner = "<?php echo $housecompare ?>"; 
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse5").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }