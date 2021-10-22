<script>
  //Importing Line class from the vue-chartjs wrapper
  //import { Line } from 'vue-chartjs'

  //Exporting this so it can be used in other components
  export default {
    extends: VueChartJs.Pie,
    data () {
      return {
        datacollection: {
          //Data to be represented on x-axis
          labels: ['VUEJS', 'ANGULAR', 'REAC'],
          datasets: [
            {
              label: 'Data One',
              backgroundColor: ['#1976d2', '#1976d2', '#1976d2'],
              pointBackgroundColor: 'white',
              borderWidth: 1,
              pointBorderColor: '#249EBF',
              //Data to be represented on y-axis
              data: [55, 100, 80]
            }
          ]
        },
        //Chart.js options that controls the appearance of the chart
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              },
              gridLines: {
                display: true
              }
            }],
            xAxes: [ {
              gridLines: {
                display: false
              }
            }]
          },
          legend: {
            display: true
          },
          responsive: true,
          maintainAspectRatio: false
        }
      }
    },
    mounted () {
      //renderChart function renders the chart with the datacollection and options object.
      this.renderChart(this.datacollection, this.options)
    }
  }
</script>