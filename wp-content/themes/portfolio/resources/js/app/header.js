const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, {
    threshold: 0.2
});

document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.work-item');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.1
    });

    items.forEach(item => observer.observe(item));
});

document.querySelectorAll('.studies-timeline li').forEach(li => {
    observer.observe(li);
});

window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    if (window.scrollY > 50) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const skillCards = document.querySelectorAll('.skill-card');

    skillCards.forEach((card, index) => {
        if (index < 2) {
            card.classList.add('from-left');
        } else {
            card.classList.add('from-right');
        }
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');

            }
        });
    }, { threshold: 0.1 });

    skillCards.forEach(card => {
        observer.observe(card);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const aboutSection = document.querySelector('.about-text-container');

    if (aboutSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');

                }
            });
        }, { threshold: 0.1 });

        observer.observe(aboutSection);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const leftElement = document.querySelector('.form-text-ctn');
    const rightElement = document.querySelector('.form__row--full');

    if (leftElement) {
        leftElement.classList.add('animate-from-left');
    }

    if (rightElement) {
        rightElement.classList.add('animate-from-right');
    }
});