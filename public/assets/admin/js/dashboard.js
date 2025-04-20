document.addEventListener('DOMContentLoaded', function() {
    // 1. Simulation de données pour le démo
    const recentActivities = [
        { id: 1, user: "Jean Dupont", action: "a reçu une recommandation", time: "Il y a 10 minutes" },
        { id: 2, user: "Marie Martin", action: "a réservé un hébergement", time: "Il y a 25 minutes" },
        { id: 3, user: "Pierre Lambert", action: "a consulté des recommandations", time: "Il y a 1 heure" },
        { id: 4, user: "Sophie Leroy", action: "a créé un compte", time: "Il y a 2 heures" }
    ];

    // 2. Remplir la liste d'activité récente
    const activityList = document.querySelector('.activity-list');
    
    if (activityList) {
        recentActivities.forEach(activity => {
            const activityItem = document.createElement('div');
            activityItem.className = 'activity-item';
            activityItem.innerHTML = `
                <strong>${activity.user}</strong> ${activity.action} <span class="activity-time">${activity.time}</span>
            `;
            activityList.appendChild(activityItem);
        });
    }

    // 3. Gestion des événements pour la sidebar - VERSION CORRIGÉE
    const navLinks = document.querySelectorAll('.sidebar nav a');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // On ne prévient PAS le comportement par défaut pour les liens externes
            if (!this.classList.contains('no-reload')) {
                // On gère juste la classe active
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                
                // La navigation normale se fera automatiquement
                return;
            }
            
            // Pour les liens avec classe no-reload (si vous voulez du SPA)
            e.preventDefault();
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            // Ici vous pourriez charger le contenu via AJAX
            console.log('Navigation SPA pour:', this.href);
        });
    });

    // 4. Chargement des statistiques (exemple)
    function loadStats() {
        // Exemple avec fetch API
        /*
        fetch('/api/stats')
            .then(response => response.json())
            .then(data => {
                document.querySelector('.stat-value').textContent = data.whatever;
            });
        */
    }

    // 5. Initialisation
    loadStats();
});