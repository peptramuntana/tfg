/*
    1.0 - Slider
    2.0 - TinyMCE
    3.0 - Create Form
    4.0 - Update Form
    5.0 - Delete Form
    6.0 - Hide Form
    7.0 - Show Form
    8.0 - Create Modal
    9.0 - Close Modal
*/

let stateCheck = setInterval(() => {
  if (document.readyState === 'complete') {
    // Slider
    slider();
    tiny();
    burgerMenu();
    clearInterval(stateCheck);
  }
}, 100);


// 1.0 - Slider
function slider() {
  let sliders = document.querySelectorAll('.swiper');
  if (sliders) {
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

// 2.0 - TinyMCE
function tiny() {
  let editable = document.querySelectorAll('.editable');
  let editableSmall = document.querySelectorAll('.editable-small');

  if (editable) {
    editable.forEach(element => {
      tinymce.init({
        selector: '.editable',
        plugins: 'lists advlist code link image',
        menubar: 'tools insert',
        height: '200px',
        width: '600px',
      });
    });
  }

  if (editableSmall) {
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

// 3.0 - Create Form
function createForm(e) {
  let confirmation = confirm("¿Estás seguro que quiéres crear este proyecto?");
  if (!confirmation) {
    e.preventDefault();
  }
}

// 4.0 - Update Form
function updateForm(e) {
  let confirmation = confirm("¿Estás seguro que quiéres actualizar este proyecto?");
  if (!confirmation) {
    e.preventDefault();
  }
}

// 5.0 - Delete Form
function deleteForm(e) {
  let confirmation = confirm("¿Estás seguro que quiéres borrar este proyecto?");
  if (!confirmation) {
    e.preventDefault();
  }
}

// 6.0 - Hide Form
function hideForm(e) {
  let confirmation = confirm("¿Estás seguro que quiéres ocultar este proyecto?");
  if (!confirmation) {
    e.preventDefault();
  }
}

// 7.0 - Show Form
function showForm(e) {
  let confirmation = confirm("¿Estás seguro que quiéres mostrar este proyecto?");
  if (!confirmation) {
    e.preventDefault();
  }
}

// 8.0 - Create Modal
function createModal(id, $content) {

  let modal = document.getElementById(id)
  if(!modal){
      // Crete the container if modal doesn't exist:
      let buildModal = document.createElement('div')
      buildModal.id = id

      // Create the container
      let containerModal = document.createElement('div')
      containerModal.classList.add('modal-container')

      // Create the header
      let headerModal = document.createElement('div')
      headerModal.classList.add('modal-header')

      // Create the body
      let bodyModal = document.createElement('div')
      bodyModal.classList.add('modal-body')

      // Crete the content
      let contentNode = $content
      if ( typeof contentNode === 'object' )
      {
          contentNode = $content.cloneNode(true)
          contentNode.id = contentNode.id + '-clone';
      }

      // Crete the closing
      let closeModal = document.createElement('div')
      closeModal.classList.add('close')
      closeModal.addEventListener('click', () => {
          closeModal(id)
      })

      // Add the closing to the header
      headerModal.append(closeModal)
      //Add content to the body
      bodyModal.append(contentNode)
      // Add Header and Body to the container
      containerModal.append(headerModal,bodyModal)
      // Add container to Modal
      buildModal.append(containerModal)

      document.getElementById('head_modal_controller').append(buildModal)

      return buildModal

  }
  return modal
}

// 9.0 - Close Modal
function closeModal(id) {
  let modal = document.querySelector(`#${id}`)
  // Show the content
  modal.classList.add('hide')
  setTimeout(
      () => {
          modal.classList.add('none')
          modal.classList.remove('hide')

          if(modal.classList.contains('autokill')){modal.remove()}
      }, 500
  )
}

// 10.0 Burger Menu
function burgerMenu() {
  let burger = document.querySelector('.burger');
  let menu = document.querySelector('#menu');

  console.log(menu);
  burger.addEventListener('click', () => {
    createModal('modal-menu', menu);
  });
}