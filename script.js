// Recherche de joueurs
const searchInput = document.getElementById('searchPlayer');
if (searchInput) {
    searchInput.addEventListener('keyup', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const players = document.querySelectorAll('.player-card');
        
        players.forEach(player => {
            const playerName = player.getAttribute('data-name');
            if (playerName.includes(searchTerm)) {
                player.style.display = 'block';
            } else {
                player.style.display = 'none';
            }
        });
    });
}

// Animation au scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.feature-card, .player-card, .transfer-card, .stats-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s, transform 0.6s';
    observer.observe(el);
});

// Charger les top joueurs sur la page d'accueil
if (document.getElementById('topPlayers')) {
    fetch('get_top_players.php')
        .then(response => response.json())
        .then(players => {
            const container = document.getElementById('topPlayers');
            players.forEach(player => {
                const playerCard = `
                    <div class="player-card">
                        <div class="player-image">
                            <div class="player-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                        <div class="player-info">
                            <h3>${player.first_name} ${player.last_name}</h3>
                            <div class="player-details">
                                <span><i class="fas fa-futbol"></i> ${player.position}</span>
                                <span><i class="fas fa-building"></i> ${player.current_club}</span>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += playerCard;
            });
        });
}

// Effet de survol sur les cartes
document.querySelectorAll('.player-card, .feature-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});