
document.addEventListener('DOMContentLoaded', () => {
    // Observer générique
    const createObserver = (selector, className, threshold = 0.1) => {
        const elements = document.querySelectorAll(selector);

        if (elements.length > 0) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add(className);
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold });

            elements.forEach(el => observer.observe(el));
        }
    };

    // Animation des .work-item
    createObserver('.work-item', 'visible', 0.1);

    // Animation des skill-cards (avec direction)
    const skillCards = document.querySelectorAll('.skill-card');
    skillCards.forEach((card, index) => {
        card.classList.add(index < 2 ? 'from-left' : 'from-right');
    });
    createObserver('.skill-card', 'in-view');

    // Animation section About
    createObserver('.about-text-container', 'in-view');

    // Animation formulaire sans observer (animations directes)
    const leftElement = document.querySelector('.form-text-ctn');
    const rightElement = document.querySelector('.form__row--full');

    if (leftElement) leftElement.classList.add('animate-from-left');
    if (rightElement) rightElement.classList.add('animate-from-right');
});

// Effet scroll sur le header
window.addEventListener("scroll", () => {
    const header = document.querySelector("header");
    header.classList.toggle("scrolled", window.scrollY > 50);
});
