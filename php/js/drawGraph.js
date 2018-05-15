google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var graph ="<?php echo $data; ?>";

  var options = {
    chart: {
      title: 'Trash Tracker',
      subtitle: 'Weekly Trash View',
    },
    axes: {
        y: {
            all: {
                range: {
                    y: 100,
                    y:75,
                    y:50,
                    y:25,
                    y: 0
                }
            }
        }
    },
    bars: 'vertical',
    vAxis: {
        title: 'Total weight in pounds',
        format: 'decimal',
        minValue: 0,
      },
    colors: ['#0066ff', '#808080', '#7aac3b']
  };

  var chart = new google.charts.Bar(document.getElementById('chart_div'));
  chart.draw(data, google.charts.Bar.convertOptions(options));
  var btns = document.getElementById('btn-group');
  btns.onclick = function (e) {
    if (e.target.tagName === 'BUTTON') {
      options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  }
}
