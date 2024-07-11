document.addEventListener('DOMContentLoaded', function () {
    // Login Chart
    var loginCtx = document.getElementById('loginChart').getContext('2d');
    var loginLabels = JSON.parse(document.getElementById('loginChart').dataset.labels);
    var loginData = JSON.parse(document.getElementById('loginChart').dataset.data);

    var primaryColor = 'rgba(0, 123, 255, 0.5)';
    var primaryBorderColor = 'rgba(0, 123, 255, 1)';

    var loginChart = new Chart(loginCtx, {
        type: 'bar',
        data: {
            labels: loginLabels,
            datasets: [{
                label: 'Login Count',
                data: loginData,
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

    // Reminder Chart
    var reminderCtx = document.getElementById('reminderChart').getContext('2d');
    var reminderLabels = JSON.parse(document.getElementById('reminderChart').dataset.labels);
    var reminderData = JSON.parse(document.getElementById('reminderChart').dataset.data);

    var secondaryColor = 'rgba(40, 167, 69, 0.5)'; // Bootstrap success color with 0.5 opacity
    var secondaryBorderColor = 'rgba(40, 167, 69, 1)'; // Bootstrap success color solid

    var reminderChart = new Chart(reminderCtx, {
        type: 'bar',
        data: {
            labels: reminderLabels,
            datasets: [{
                label: 'Reminder Count',
                data: reminderData,
                backgroundColor: secondaryColor,
                borderColor: secondaryBorderColor,
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