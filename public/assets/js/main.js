// Attente que le DOM soit complètement chargé
document.addEventListener("DOMContentLoaded", () => {
  // Activation des icônes Lucide
  lucide.createIcons();

  // === Carrousel auto (atouts) ===
  const atoutsTrack = document.querySelector('.atouts-carousel');
  if (atoutsTrack) {
    const originalItems = [...atoutsTrack.children];
    originalItems.forEach(item => {
      const clone = item.cloneNode(true);
      clone.classList.add('clone');
      atoutsTrack.appendChild(clone);
    });
    atoutsTrack.style.animation = 'scroll-carousel 25s linear infinite';
  }

  // === Carrousel des centres d’intérêt (glissé) ===
  const interetsTrack = document.querySelector('.interets-carousel');
  if (interetsTrack) {
    interetsTrack.innerHTML += interetsTrack.innerHTML;
    lucide.createIcons();
  }

  const wrapper = document.querySelector('.interets-wrapper');
  let isDown = false, startX, scrollLeft;

  if (wrapper) {
    wrapper.addEventListener('mousedown', e => {
      isDown = true;
      wrapper.classList.add('dragging');
      startX = e.pageX - wrapper.offsetLeft;
      scrollLeft = wrapper.scrollLeft;
    });

    wrapper.addEventListener('mouseleave', () => {
      isDown = false;
      wrapper.classList.remove('dragging');
    });

    wrapper.addEventListener('mouseup', () => {
      isDown = false;
      wrapper.classList.remove('dragging');
    });

    wrapper.addEventListener('mousemove', e => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - wrapper.offsetLeft;
      const walk = (x - startX) * 2;
      wrapper.scrollLeft = scrollLeft - walk;
    });
  }

  // === Accordéon ===
  const accordionItems = document.querySelectorAll('.accordion-item');
  accordionItems.forEach(item => {
    const title = item.querySelector('.accordion-title');
    title.addEventListener('click', () => {
      item.classList.toggle('active');
    });
  });

  // === Carrousel manuel - Nos solutions ===
  const carouselContainer = document.querySelector('.carousel-container');
  const carouselTrack = document.querySelector('.carousel-track');
  const prevBtn = document.querySelector('.carousel-btn.prev');
  const nextBtn = document.querySelector('.carousel-btn.next');

  if (carouselContainer && carouselTrack && prevBtn && nextBtn) {
    const slideWidth = carouselContainer.offsetWidth;

    prevBtn.addEventListener('click', () => {
      carouselTrack.scrollBy({ left: -slideWidth, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
      carouselTrack.scrollBy({ left: slideWidth, behavior: 'smooth' });
    });
  }
});
