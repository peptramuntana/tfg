/*
    1.0 - Slider
*/
let stateCheck = setInterval(() => {
    if (document.readyState === 'complete') {
        // Slider
        slider();
        tiny();
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

function tiny() {
  let editable = document.querySelectorAll('.editable');
  let editableSmall = document.querySelectorAll('.editable-small');

  if(editable) {
    editable.forEach(element => {
      tinymce.init({
        selector: '.editable',
        plugins: 'lists advlist code link image',
        menubar:'tools insert',
        height: '200px',
        width: '600px',
      });
    });
  }

  if(editableSmall) {
    editableSmall.forEach(element => {
      tinymce.init({
        selector: '.editable-small',
        menubar: false,
        toolbar: false,
        height: '50px',
        width: '500px',
      });
    });
  }
}