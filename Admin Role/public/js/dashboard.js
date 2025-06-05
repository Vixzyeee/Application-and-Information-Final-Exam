
// Chart untuk statistik
function createAreaChart(canvasId, color) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 100);
    gradient.addColorStop(0, color + '40');
    gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
    
    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['', '', '', '', '', ''],
            datasets: [{
                data: [5, 10, 5, 15, 10, 20],
                borderColor: color,
                backgroundColor: gradient,
                tension: 0.4,
                fill: true,
                pointRadius: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            },
            scales: {
                x: {
                    display: false
                },
                y: {
                    display: false
                }
            }
        }
    });
}

// Chart untuk aktivitas
function createActivityChart() {
    const ctx = document.getElementById('activityChart').getContext('2d');
    
    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [
                {
                    label: 'This month',
                    data: [10, 14, 12, 16],
                    borderColor: '#8B5CF6',
                    backgroundColor: 'transparent',
                    tension: 0.4,
                    pointRadius: 0
                },
                {
                    label: 'Last month',
                    data: [12, 8, 14, 11],
                    borderColor: '#F97316',
                    backgroundColor: 'transparent',
                    tension: 0.4,
                    pointRadius: 0
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        color: '#2B2C32'
                    },
                    ticks: {
                        color: '#EBEBEB'
                    }
                },
                y: {
                    min: 4,
                    max: 20,
                    ticks: {
                        stepSize: 2,
                        color: '#EBEBEB'
                    },
                    grid: {
                        color: '#2B2C32'
                    }
                }
            }
        }
    });
}

// Inisialisasi chart saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    createAreaChart('newStudentsChart', '#8B5CF6');
    createAreaChart('totalStudentsChart', '#8B5CF6');
    createAreaChart('newTeachersChart', '#8B5CF6');
    createAreaChart('totalTeachersChart', '#8B5CF6');
    createActivityChart();
});
