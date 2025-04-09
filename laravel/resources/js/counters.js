import { CountUp } from 'countup.js';

export function initCounters() {
    const counters = document.querySelectorAll('.counter');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const count = parseInt(target.dataset.count);
                
                new CountUp(target, count, {
                    duration: 10,
                    startVal: parseInt(target.textContent),
                    enableScrollSpy: true,
                    scrollSpyOnce: true
                }).start();
                
                observer.unobserve(target);
            }
        });
    }, observerOptions);

    counters.forEach(counter => observer.observe(counter));
}