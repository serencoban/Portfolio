document.documentElement.classList.remove('no-js');

const App = {
    init() {
        this.initStudies();
        this.initSkills();
        this.initWorkItems();
        this.initAboutSection();
        this.initForm();
        this.initHeaderScroll();
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

    initStudies() {
        const studyItems = document.querySelectorAll('.studies-timeline li');
        studyItems.forEach(el => el.classList.add('js-animate'));

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        studyItems.forEach(el => observer.observe(el));
    },

    initSkills() {
        const skillCards = document.querySelectorAll('.skill-card');
        skillCards.forEach((card, index) => {
            card.classList.add('js-animate');
            card.classList.add(index < 2 ? 'from-left' : 'from-right');
        });

        this.createObserver('.skill-card', 'in-view');
    },

    initWorkItems() {
        this.createObserver('.work-item', 'visible', 0.1);
    },

    initAboutSection() {
        this.createObserver('.about-text-container', 'in-view');
    },

    initForm() {
        const leftElement = document.querySelector('.form-text-ctn');
        const rightElement = document.querySelector('.form__row--full');

        if (leftElement) leftElement.classList.add('animate-from-left');
        if (rightElement) rightElement.classList.add('animate-from-right');
    },

    initHeaderScroll() {
        window.addEventListener("scroll", () => {
            const header = document.querySelector("header");
            header.classList.toggle("scrolled", window.scrollY > 50);
        });
    }
};

