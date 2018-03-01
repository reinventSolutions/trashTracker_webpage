/* https://jsfiddle.net/2f3kLtzq/5/

*/
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Weekly', 'Recycling', 'Trash', 'Greenwaste'],
    ['W1', 22, 44, 10],
    ['W2', 60, 60, 25],
    ['W3', 45, 80, 10],
    ['W4', 25, 45, 20]
  ]);

  var options = {
    chart: {
      title: 'Trash Tracker',
      subtitle: 'Weekly Trash View',
    },
    axes: {
        y: {
            all: {
                range: {
                    max: 100,
                    min: 0
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
    height: 300,
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