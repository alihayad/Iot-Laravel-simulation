
    window.onload =()=>{
      
     
      let dateHover=[];
      var ctx = document.getElementById('ModuleGraph').getContext('2d');
      var ModuleGraph = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"].reverse(),//reverse it inorder to view the values by last 1 minute and 2 and 10
        datasets: [{
          label: 'Measured Values for the past 10 minutes',
          data: [],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              // Get the data value and adding date to it
              var value = data.datasets[0].data[tooltipItem.index];
              
              return `${value} Date : ${dateHover[tooltipItem.index]}`;
            }
          }
        }
      }
    });

    const loadDashboardData = () =>{
      //this axios request geth the data of a module by id from a specific function that get all the datawe need to show in the page
        axios.get(`/modules/${id}/dashboard/data`).then(response => {
        let timePassed = response.data.timePassed;
        let count = response.data.count;
        let measueredValues = response.data.measueredValues;
        let dates = response.data.dates.reverse();

        document.getElementById("current-value").innerHTML = measueredValues.at(0)?measueredValues.at(0):0;//get the lates measured value by the module
        document.getElementById("operatingTime").innerHTML = timePassed;
        document.getElementById("dataSent").innerHTML = count;

        dateHover = dates;

        ModuleGraph.data.datasets[0].data = measueredValues.reverse(); //setting the data for the graph line

        ModuleGraph.update(); 

        }).catch(error => {
            alert("An error occured");
        });
      }//end function

    loadDashboardData();//calling the function on the load of the page to show values
    
    setInterval(() => {
        loadDashboardData();//calling the function to refresh the values because we are adding data every minute
}, 5000); // time in ms 60000ms equal to 1 minute

;//end load
}