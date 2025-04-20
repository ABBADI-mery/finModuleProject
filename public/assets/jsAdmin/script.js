// script.js
document.addEventListener('DOMContentLoaded', function() {
    // Données des clients pour l'année
    const clientsData = {
        janvier: 150,
        fevrier: 120,
        mars: 170,
        avril: 200,
        mai: 180,
        juin: 160,
        juillet: 220,
        aout: 210,
        septembre: 180,
        octobre: 190,
        novembre: 160,
        decembre: 250,
    };

    // Vérifiez si le document est chargé correctement
    console.log("DOM chargé et prêt.");

    // Récupérer le contexte du canvas pour Chart.js
    const ctx = document.getElementById('clientsChart').getContext('2d');
    console.log("Contexte du canvas récupéré :", ctx);

    // Créer un graphique avec Chart.js
    const clientsChart = new Chart(ctx, {
        type: 'bar', // Type de graphique (barres)
        data: {
            labels: Object.keys(clientsData), // Mois de l'année
            datasets: [{
                label: 'Total Clients',
                data: Object.values(clientsData), // Données des clients par mois
                backgroundColor: '#bde09d', // Couleur des barres
                borderColor: '#388e3c', // Couleur de la bordure des barres
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Mois'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Nombre de Clients'
                    },
                    beginAtZero: true // Commence à 0 pour l'axe Y
                }
            },
            plugins: {
                legend: {
                    display: false // Masquer la légende
                }
            }
        }
    });
});
