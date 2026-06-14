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
