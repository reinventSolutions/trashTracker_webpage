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
      <!--GRAPH DIV-->
      <a href="prevWeek.php" id = "pastWeek"><i class="material-icons">arrow_back</i>Past Week</a>
      <span class="alignright">
        <a href="nextWeek.php" id = "nextWeek">Next Week<i class="material-icons">arrow_forward</i></a>
      </span>
      <!--GRAPH CHART-->
      <div id="chart_div" class="hcGraph" style="height:500px;">
        
      </div>
      <!--GRAPH CHART BUTTONS    
      <div id="btn-group">
      <button class="button button-blue" id="none">No Format</button>
      <button class="button button-blue" id="scientific">Scientific Notation</button>
      <button class="button button-blue" id="decimal">Decimal</button>
      <button class="button button-blue" id="short">Short</button>
      </div>-->
    </div><!--.col-sm-->
  </div><!--.row-->