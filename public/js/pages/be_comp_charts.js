/*
 *  Document   : be_comp_charts.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Charts Page
 */

// Full Calendar, for more examples you can check out http://fullcalendar.io/
class pageCompCharts {
    /*
    * Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
    *
    */
    static initChartsChartJS() {
        // Set Global Chart.js configuration
        Chart.defaults.global.defaultFontColor = '#999';
        Chart.defaults.global.defaultFontStyle = '600';
        Chart.defaults.scale.gridLines.color = "rgba(0,0,0,.05)";
        Chart.defaults.scale.gridLines.zeroLineColor = "rgba(0,0,0,.1)";
        Chart.defaults.scale.ticks.beginAtZero = true;
        Chart.defaults.global.elements.line.borderWidth = 2;
        Chart.defaults.global.elements.point.radius = 4;
        Chart.defaults.global.elements.point.hoverRadius = 6;
        Chart.defaults.global.tooltips.cornerRadius = 3;
        Chart.defaults.global.legend.labels.boxWidth = 15;

        // Get Chart Containers
        let chartLinesCon = jQuery('.js-chartjs-lines');

        // Set Chart and Chart Data variables
        let chartLines;
        let chartLinesBarsRadarData;

        // Lines/Bar/Radar Chart Data
        chartLinesBarsRadarData = {
            labels: labels,
            datasets: [
                {
                    label: 'Water Level (ml)',
                    fill: true,
                    backgroundColor: 'rgba(220,220,220,.3)',
                    borderColor: 'rgba(220,220,220,1)',
                    pointBackgroundColor: 'rgba(0,0,220,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(220,220,220,1)',
                    data: data
                }
            ]
        };

        // Init Charts
        if (chartLinesCon.length) {
            chartLines = new Chart(chartLinesCon, {type: 'line', data: chartLinesBarsRadarData});
        }
    }

    /*
    * Randomize Easy Pie Chart values
    *
    */
    static initRandomEasyPieChart() {
        jQuery('.js-pie-randomize').on('click', (e) => {
            jQuery(e.currentTarget)
                .parents('.block')
                .find('.pie-chart')
                .each((index, element) => jQuery(element).data('easyPieChart').update(Math.floor((Math.random() * 100) + 1)));
        });
    }

    /*
    * Init functionality
    *
    */
    static init() {
        this.initChartsChartJS();
        this.initRandomEasyPieChart();
    }
}

// Initialize when page loads
jQuery(() => {
    pageCompCharts.init();
});
