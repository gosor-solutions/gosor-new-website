import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import EmblaCarousel from 'embla-carousel';
import Autoplay from 'embla-carousel-autoplay';

AOS.init({
    duration: 1000,
    once: true,
});

document.addEventListener('DOMContentLoaded', () => {
    // Hero stats count-up animation
    const counters = document.querySelectorAll('.count-up');
    const speed = 2000; // Animation duration in ms

    const animate = (counter) => {
        const target = +counter.getAttribute('data-target');
        const suffix = counter.getAttribute('data-suffix') || '';
        const startTime = performance.now();

        const updateCount = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / speed, 1);
            
            // Ease out quad
            const easedProgress = progress * (2 - progress);
            const value = Math.floor(easedProgress * target);

            counter.innerText = value + suffix;

            if (progress < 1) {
                requestAnimationFrame(updateCount);
            } else {
                counter.innerText = target + suffix;
            }
        };

        requestAnimationFrame(updateCount);
    };

    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animate(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    counters.forEach(counter => observer.observe(counter));

    const emblaNode = document.querySelector('#review-carousel .embla__viewport');
    if (emblaNode) {
        const prevBtn = document.querySelector('#review-carousel .embla__prev');
        const nextBtn = document.querySelector('#review-carousel .embla__next');
        
        const options = { loop: true };
        const plugins = [Autoplay({ delay: 4000, stopOnInteraction: false })];
        const emblaApi = EmblaCarousel(emblaNode, options, plugins);

        if (prevBtn) prevBtn.addEventListener('click', () => emblaApi.scrollPrev(), false);
        if (nextBtn) nextBtn.addEventListener('click', () => emblaApi.scrollNext(), false);
    }
});
