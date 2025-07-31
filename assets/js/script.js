function scrollNavbar(direction) {
  const container = document.getElementById('navbarScroll');
  const scrollAmount = 200;

  container.scrollBy({
    left: direction === 'left' ? -scrollAmount : scrollAmount,
    behavior: 'smooth'
  });

  updateScrollButtons();
}

function updateScrollButtons() {
  const scrollContainer = document.getElementById('navbarScroll');
  const scrollLeftBtn = document.querySelector('.scroll-left');
  const scrollRightBtn = document.querySelector('.scroll-right');

  const scrollLeft = scrollContainer.scrollLeft;
  const scrollWidth = scrollContainer.scrollWidth;
  const clientWidth = scrollContainer.clientWidth;
  const maxScrollLeft = scrollWidth - clientWidth;

  // Scroll edilecek alan yoksa iki oku da gizle
  if (scrollWidth <= clientWidth + 1) {
    scrollLeftBtn.style.display = 'none';
    scrollRightBtn.style.display = 'none';
    return;
  }

  // Sol ok sadece sola kayma varsa
  scrollLeftBtn.style.display = scrollLeft > 5 ? 'inline-block' : 'none';

  // Sağ ok sadece sağa kayılacak alan varsa
  scrollRightBtn.style.display = scrollLeft < maxScrollLeft - 5 ? 'inline-block' : 'none';
}

document.addEventListener('DOMContentLoaded', () => {
  updateScrollButtons();

  const scrollContainer = document.getElementById('navbarScroll');
  scrollContainer.addEventListener('scroll', updateScrollButtons);
});

window.addEventListener('resize', updateScrollButtons);
