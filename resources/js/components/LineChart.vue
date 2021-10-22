<script>
//Importing Line class from the vue-chartjs wrapper
//import { Line } from 'vue-chartjs'

//Exporting this so it can be used in other components
export default {
    extends: VueChartJs.Line,
    data() {
        return {
            datos: [],
            //Chart.js options that controls the appearance of the chart
            options: {
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true,
                            },
                            gridLines: {
                                display: true,
                            },
                        },
                    ],
                    xAxes: [
                        {
                            gridLines: {
                                display: false,
                            },
                        },
                    ],
                },
                legend: {
                    display: true,
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },
    mounted: async function (){

      await this.getApi();

      console.log('Termine ...');
        
    },
    methods: {
        getApi: async function () {
            axios
                .get("/api/get-datos-grafica")
                .then((response) => {
                    console.log(response);

                    let datacollection = {
                        //Data to be represented on x-axis
                        labels: [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December",
                        ],
                        datasets: [
                            {
                                label: "Data One",
                                backgroundColor: "#1976d2",
                                pointBackgroundColor: "white",
                                borderWidth: 1,
                                pointBorderColor: "#249EBF",
                                //Data to be represented on y-axis
                                data: response.data,
                            },
                        ],
                    };


                    //renderChart function renders the chart with the datacollection and options object.
                    this.renderChart(datacollection, this.options);
                })
                .catch(({ response }) => {
                    console.log(response);
                });
        },
    },
};
</script>