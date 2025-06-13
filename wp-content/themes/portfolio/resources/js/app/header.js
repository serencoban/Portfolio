document.documentElement.classList.remove('no-js');
document.documentElement.classList.add('js');

const App = {
    init() {
        this.initAboutSection();
        this.initWorkItems();
        this.initStudies();
        this.initSkills(); // 👈 nouvelle méthode
    },

    createObserver(selector, className, threshold = 0.2) {
        const elements = document.querySelectorAll(selector);
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add(className);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold });

        elements.forEach(el => observer.observe(el));
    },

    initAboutSection() {
        this.createObserver('.about-text-container', 'in-view');
    },

    initWorkItems() {
        this.createObserver('.work-item', 'in-view');
    },

    initStudies() {
        this.createObserver('.studies-timeline li', 'in-view');
    },

    initSkills() {
        const skillCards = document.querySelectorAll('.skill-card');

        skillCards.forEach((card, index) => {
            // On ajoute une classe directionnelle en fonction de la position
            if (index < 2) {
                card.classList.add('from-left');
            } else {
                card.classList.add('from-right');
            }
        });

        this.createObserver('.skill-card', 'in-view', 0.2);
    }
};

document.addEventListener('DOMContentLoaded', () => App.init());
