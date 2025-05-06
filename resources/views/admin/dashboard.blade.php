<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - FM Voyage</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <style>
        :root {
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 0%);
            --deep-saffron: #89ca06;
            --dark-orange: #7ab805;
            --gray-x-11-gray: hsl(0, 0%, 73%);
            --spanish-gray: hsl(0, 0%, 60%);
            --cultured: hsl(0, 0%, 93%);
            --rich-black-fogra-29: hsl(210, 26%, 7%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--white);
            color: var(--rich-black-fogra-29);
        }

        .dashboard-container {
            display: grid;
            grid-template-areas: 
                "header header"
                "sidebar main";
            grid-template-columns: 280px 1fr;
            grid-template-rows: auto 1fr;
            min-height: 100vh;
        }

        .dashboard-header {
            grid-area: header;
            background: var(--white);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--cultured);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

      

        .dashboard-header p {
            font-size: 1.8rem;
            color: var(--deep-saffron);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar {
            grid-area: sidebar;
            background: var(--rich-black-fogra-29);
            padding: 2rem 1rem;
            color: var(--white);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li {
            margin: 0.75rem 0;
        }

        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1.5rem;
            color: var(--gray-x-11-gray);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background: var(--deep-saffron);
            color: var(--black);
            transform: scale(1.02);
        }

        .main-content {
            grid-area: main;
            padding: 2rem;
            background: var(--cultured);
        }

        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: 10px;
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            font-size: 2rem;
            color: var(--dark-orange);
            padding: 0.75rem;
            background: var(--cultured);
            border-radius: 8px;
        }

        .stat-card h3 {
            font-size: 1rem;
            color: var(--spanish-gray);
            margin-bottom: 0.25rem;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--rich-black-fogra-29);
        }

        .charts-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: var(--white);
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .chart-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .chart-card h3 {
            font-size: 1.25rem;
            color: var(--rich-black-fogra-29);
            margin-bottom: 1rem;
            text-align: center;
        }

        .chart-card canvas {
            max-height: 250px;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-areas: 
                    "header"
                    "main";
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .charts-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <p>FM Voyage</p>
        </header>
        
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                    <li><a href=#><i class="fas fa-users"></i> Utilisateurs</a></li>
                    <li><a href="{{ route('assurances.index') }}"><i class="fas fa-shield-alt"></i> Assurances</a></li>
                    <li><a href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contacts</a></li>
                    <li><a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-check"></i> Réservations</a></li>
                </ul>
            </nav>
        </aside>
        
        <main class="main-content">
            <section class="stats-section">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <h3>Assurances</h3>
                        <p class="stat-value">{{ $stats['assurances'] }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h3>Utilisateurs</h3>
                        <p class="stat-value">{{ $stats['users'] }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div>
                        <h3>Réservations</h3>
                        <p class="stat-value">{{ $stats['reservations'] }}</p>
                    </div>
                </div>
            </section>

            <section class="charts-section">
                <div class="chart-card">
                    <h3>Répartition des assurances</h3>
                    <canvas id="assuranceChart"></canvas>
                </div>
                <div class="chart-card">
                    <h3>Utilisateurs par rôle</h3>
                    <canvas id="userChart"></canvas>
                </div>
                <div class="chart-card">
                    <h3>Réservations par mois</h3>
                    <canvas id="reservationChart"></canvas>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Passer les données PHP à JavaScript
        const assuranceData = @json($assuranceTypes);
        const userData = @json($userRoles);
        const reservationData = @json($reservationsByMonth);

        // Graphique pour les assurances (Doughnut)
        const assuranceCtx = document.getElementById('assuranceChart').getContext('2d');
        new Chart(assuranceCtx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(assuranceData),
                datasets: [{
                    data: Object.values(assuranceData),
                    backgroundColor: [
                        'hsl(210, 26%, 7%)', // --rich-black-fogra-29
                        'hsl(0, 0%, 93%)',  // --cultured
                        'hsl(74, 95%, 50%)', // --deep-saffron
                        'hsl(74, 95%, 40%)'  // --dark-orange
                    ],
                    borderColor: 'hsl(0, 0%, 100%)', // --white
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: 'hsl(210, 26%, 7%)' // --rich-black-fogra-29
                        }
                    }
                }
            }
        });

        // Graphique pour les utilisateurs (Bar)
        const userCtx = document.getElementById('userChart').getContext('2d');
        new Chart(userCtx, {
            type: 'bar',
            data: {
                labels: Object.keys(userData),
                datasets: [{
                    label: 'Nombre d’utilisateurs',
                    data: Object.values(userData),
                    backgroundColor: 'hsl(74, 95%, 50%)', // --deep-saffron
                    borderColor: 'hsl(74, 95%, 40%)',     // --dark-orange
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'hsl(210, 26%, 7%)' // --rich-black-fogra-29
                        },
                        grid: {
                            color: 'hsl(0, 0%, 93%)' // --cultured
                        }
                    },
                    x: {
                        ticks: {
                            color: 'hsl(210, 26%, 7%)' // --rich-black-fogra-29
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'hsl(210, 26%, 7%)' // --rich-black-fogra-29
                        }
                    }
                }
            }
        });

        // Graphique pour les réservations (Line)
        const reservationCtx = document.getElementById('reservationChart').getContext('2d');
        new Chart(reservationCtx, {
            type: 'line',
            data: {
                labels: Object.keys(reservationData),
                datasets: [{
                    label: 'Réservations',
                    data: Object.values(reservationData),
                    borderColor: 'hsl(74, 95%, 40%)', // --dark-orange
                    backgroundColor: 'hsl(74, 95%, 50%)', // --deep-saffron
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: 'hsl(210, 26%, 7%)', // --rich-black-fogra-29
                    pointBorderColor: 'hsl(0, 0%, 100%)', // --white
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'hsl(210, 26%, 7%)' // --rich-black-fogra-29
                        },
                        grid: {
                            color: 'hsl(0, 0%, 93%)' // --cultured
                        }
                    },
                    x: {
                        ticks: {
                            color: 'hsl(210, 26%, 7%)' // --rich-black-fogra-29
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'hsl(210, 26%, 7%)' // --rich-black-fogra-29
                        }
                    }
                }
            }
        });
    </script>

    <!-- Lien JS pour Laravel -->
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
</body>
</html>