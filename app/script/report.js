document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('loginChart').getContext('2d');

    // Retrieve the data
    var labels = JSON.parse(document.getElementById('loginChart').dataset.labels);
    var data = JSON.parse(document.getElementById('loginChart').dataset.data);

    // using Bootstrap colors
    var primaryColor = 'rgba(0, 123, 255, 0.5)'; 
    var primaryBorderColor = 'rgba(0, 123, 255, 1)';

    var loginChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels, // X-axis labels
            datasets: [{
                label: 'Login Count',
                data: data, // Y-axis data
                backgroundColor: primaryColor, 
                borderColor: primaryBorderColor, 
                borderWidth: 1 
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true 
                }
            }
        }
    });
});