import './bootstrap';
import Alpine from 'alpinejs';

// Initialisation d'Alpine.js
window.Alpine = Alpine;

// Fonction pour gérer les menus déroulants mobiles
function setupMobileMenu() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
            mobileMenuButton.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });
    }
}

// Gestion des messages flash
function setupFlashMessages() {
    const flashMessages = document.querySelectorAll('.flash-message');
    
    flashMessages.forEach(message => {
        // Fermeture automatique après 5 secondes
        setTimeout(() => {
            message.style.transition = 'opacity 0.5s';
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 500);
        }, 5000);

        // Bouton de fermeture
        const closeButton = message.querySelector('.flash-close');
        if (closeButton) {
            closeButton.addEventListener('click', () => {
                message.style.transition = 'opacity 0.5s';
                message.style.opacity = '0';
                setTimeout(() => message.remove(), 500);
            });
        }
    });
}

// Animation au défilement
function setupScrollAnimations() {
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.classList.add('opacity-100', 'translate-y-0');
                element.classList.remove('opacity-0', 'translate-y-8');
            }
        });
    };

    // Désactiver l'animation si l'utilisateur a désactivé les animations
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    if (!prefersReducedMotion) {
        window.addEventListener('scroll', animateOnScroll);
        // Déclencher une première fois au chargement
        animateOnScroll();
    } else {
        // Si les animations sont désactivées, afficher tout de même le contenu
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            el.classList.add('opacity-100', 'translate-y-0');
            el.classList.remove('opacity-0', 'translate-y-8');
        });
    }
}

// Initialisation des composants au chargement du DOM
document.addEventListener('DOMContentLoaded', () => {
    setupMobileMenu();
    setupFlashMessages();
    setupScrollAnimations();
});

// Démarrer Alpine.js
Alpine.start();

// Exposer les fonctions pour une utilisation globale (si nécessaire)
window.setupMobileMenu = setupMobileMenu;
window.setupFlashMessages = setupFlashMessages;
window.setupScrollAnimations = setupScrollAnimations;
