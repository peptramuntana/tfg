/*
    1.0 - Slider
*/
let stateCheck = setInterval(() => {
    if (document.readyState === 'complete') {
        // Slider
        slider();
        clearInterval(stateCheck);
    }
}, 100);

function slider() {
    let sliders = document.querySelectorAll('.swiper');
    if(sliders) {
    sliders.forEach(slider => {
      const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

      });
    });
    }
}