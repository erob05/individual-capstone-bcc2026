function toggleMenu() {
  document.getElementById('hamburger').classList.toggle('open');
  document.getElementById('nav').classList.toggle('open');
  document.getElementById('h1').classList.toggle('blur');
  document.getElementById('p').classList.toggle('blur');
  document.getElementById('main').classList.toggle('blur');
  document.getElementById('footer').classList.toggle('blur');
}
// Scrolling functionality
window.addEventListener('wheel', (e) => {
  e.preventDefault();
  const isScrollingDown = e.deltaY > 0;
  let p1 = document.getElementById('p1');
  let p2 = document.getElementById('p2');

  if (isScrollingDown == true) {
    p1.style.display = 'none';
    p2.style.display = 'block';
    p1.classList.remove('text-focus-in');
    p2.classList.add('swing-in-bottom-fwd');
    p1.classList.add('swing-in-top-bck');

  } else if (isScrollingDown == false) {
    p1.style.display = 'block';
    p2.style.display = 'none';
  }
}, { passive: false });

// Touch functionality
let touchStartY = 0;

window.addEventListener('touchstart', (e) => {
  touchStartY = e.touches[0].clientY;
});

window.addEventListener('touchend', (e) => {
  const touchEndY = e.changedTouches[0].clientY;
  const isScrollingDown = touchEndY < touchStartY;
  let p1 = document.getElementById('p1');
  let p2 = document.getElementById('p2');

  if (isScrollingDown) {
    p1.style.display = 'none';
    p2.style.display = 'block';
    p1.classList.remove('text-focus-in');
    p2.classList.add('swing-in-bottom-fwd');
    p1.classList.add('swing-in-top-bck');
  } else {
    p1.style.display = 'block';
    p2.style.display = 'none';
  }
});

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('p1').classList.add('text-focus-in');
});