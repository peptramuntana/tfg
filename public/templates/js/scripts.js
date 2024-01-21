/*
    1.0 - Sliders
    2.0 - TinyMCE
    3.0 - Create Form
    4.0 - Update Form
    5.0 - Delete Form
    6.0 - Hide Form
    7.0 - Show Form
    8.0 - Create Modal
    9.0 - Validate Form
    10.0 - Close Modal
    11.0 Burger Menu
    12.0 - Resize
    13.0 - Deploy Langs
    14.0 - Grid Services Counter
*/

const stateCheck = setInterval(() => {
  if (document.readyState === 'complete') {
    // Every 0.1s, check if the page is fully loaded and do this:
    tiny();
    homeSlider();
    projectsSliders();

    gridServicesCounter();
    resize();
    burgerMenu();
    deployLangs();

    // Stop checking when page loaded
    clearInterval(stateCheck);
  }
}, 100);

// 1.0 - Sliders
function projectsSliders() {
  const sliders = document.querySelectorAll('.projects-swiper');
  if (sliders) {
    sliders.forEach((slider) => {
      const swiper = new Swiper('.projects-swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        speed: 1000,
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

      });
    });
  }
}

function homeSlider() {
  const sliders = document.querySelectorAll('.home-swiper');
  if (sliders) {
    sliders.forEach((slider) => {
      const swiper = new Swiper('.home-swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        speed: 2000,
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
  const editable = document.querySelectorAll('.editable');
  const editableSmall = document.querySelectorAll('.editable-small');

  if (editable) {
    editable.forEach((element) => {
      tinymce.init({
        selector: '.editable',
        plugins: 'lists advlist code link image',
        menubar: 'tools insert',
        height: '200px',
        width: '600px',
        init_instance_callback(editor) {
          // Your custom event handler code here
          console.log(`Editor: ${editor.id} is now initialized.`);
        },
      });
    });
  }

  if (editableSmall) {
    editableSmall.forEach((element) => {
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
function createForm(e, form) {
  // Ask for confirmation
  const confirmation = confirm('¿Estás seguro que quiéres crear este proyecto?');
  if (!confirmation || !validateForm(form)) {
    // If not confirmed or form not valid, prevent default
    e.preventDefault();
  }
}

// 4.0 - Update Form
function updateForm(e, form) {
  // Ask for confirmation
  const confirmation = confirm('¿Estás seguro que quiéres actualizar este proyecto?');
  if (!confirmation || !validateForm(form)) {
    // If not confirmed or form not valid, prevent default
    e.preventDefault();
  }
}

// 5.0 - Delete Form
function deleteForm(e) {
  // Ask for confirmation
  const confirmation = confirm('¿Estás seguro que quiéres borrar este proyecto?');
  if (!confirmation) {
    // If not confirmed or form not valid, prevent default
    e.preventDefault();
  }
}

// 6.0 - Hide Form
function hideForm(e) {
  // Ask for confirmation
  const confirmation = confirm('¿Estás seguro que quiéres ocultar este proyecto?');
  if (!confirmation) {
    // If not confirmed or form not valid, prevent default
    e.preventDefault();
  }
}

// 7.0 - Show Form
function showForm(e) {
  // Ask for confirmation
  const confirmation = confirm('¿Estás seguro que quiéres mostrar este proyecto?');
  if (!confirmation) {
    // If not confirmed or form not valid, prevent default
    e.preventDefault();
  }
}

// 8.0 Validate Form
function validateForm(form) {
  // let projectTitleEditor = form.tinymce.get(projectTitle.id);
  // let projectContentEditor = form.tinymce.get(projectContent.id);
  // let projectTitleText = projectTitleEditor.getContent({ format: 'text' });
  // let projectContentText = projectContentEditor.getContent({ format: 'text' });

  // Select form fields and set Valid boolean to true
  const projectTitle = form.querySelector('#project_title');
  const projectContent = form.querySelector('#project_content');
  const images = form.querySelectorAll('.images');
  let isValid = true;

  if (projectTitle.value.length < 2 || projectTitle.value.length > 30) {
    alert('El título del proyecto ha de tener entre 2 y 30 caracteres.');
    projectTitle.focus();
    isValid = false;
  }

  // Validate project_content
  if (projectContent.value.length < 2 || projectContent.value.length > 60) {
    alert('La descripción del proyecto ha de tener entre 2 y 60 caracteres.');
    projectContent.focus();
    isValid = false;
  }

  // Validate each image fields
  images.forEach((image, index) => {
    // Select image fields
    const imageUrl = image.querySelector(`#image-url-${index + 1}`);
    const imageAlt = image.querySelector(`#image-alt-${index + 1}`);
    const imageTitle = image.querySelector(`#image-title-${index + 1}`);

    if (imageUrl.value.length < 2 || imageUrl.value.length > 60) {
      // Show alert if not pass validation and focus on field
      alert(`La URL de la imágen ${index + 1} ha de tener entre 2 y 60 caracteres.`);
      imageUrl.focus();
      isValid = false;
    }

    if (imageAlt.value.length < 2 || imageAlt.value.length > 60) {
      // Show alert if not pass validation and focus on field
      alert(`El ALT de la imágen ${index + 1} ha de tener entre 2 y 60 caracteres`);
      imageAlt.focus();
      isValid = false;
    }

    if (imageTitle.value.length < 2 || imageTitle.value.length > 60) {
      // Show alert if not pass validation and focus on field
      alert(`EL Title de la imágen ${index + 1} ha de tener entre 2 y 60 caracteres`);
      imageTitle.focus();
      isValid = false;
    }
  });

  // Return isValid boolean
  return isValid;
}

// 9.0 - Create Modal
function createModal(id, $content) {
  const modal = document.getElementById(id);
  if (!modal) {
    // Crete the container if modal doesn't exist:
    const buildModal = document.createElement('div');
    buildModal.id = id;

    // Create the container
    const containerModal = document.createElement('div');
    containerModal.classList.add('modal-container');

    // Create the header
    const headerModal = document.createElement('div');
    headerModal.classList.add('modal-header');

    // Create the body
    const bodyModal = document.createElement('div');
    bodyModal.classList.add('modal-body');

    // Crete the content
    let contentNode = $content;
    if (typeof contentNode === 'object') {
      // If content is an object (DOM), clone it
      contentNode = $content.cloneNode(true);
      contentNode.id += '-clone';
    }

    // Crete the closing button (X)
    const closeModal = document.createElement('div');
    closeModal.classList.add('close');
    closeModal.addEventListener('click', () => {
      toCloseModal(id);
    });

    // Add the closing to the header
    headerModal.append(closeModal);
    // Add content to the body
    bodyModal.append(contentNode);
    // Add Header and Body to the container
    containerModal.append(headerModal, bodyModal);
    // Add container to Modal
    buildModal.append(containerModal);

    document.getElementById('head_modal_controller').append(buildModal);

    // return the modal created
    return buildModal;
  }
  return modal;
}

// 10.0 - Close Modal
function toCloseModal(id) {
  const modal = document.querySelector(`#${id}`);
  // Show the content
  modal.classList.add('hide');
  setTimeout(() => {
    // Add classes to smooth the transition to create an animation
    modal.classList.add('none');
    modal.classList.remove('hide');
    modal.remove();
  }, 500);
}

// 11.0 Burger Menu
function burgerMenu() {
  // Select burger and menu
  const burger = document.querySelector('.burger');
  const menu = document.querySelector('#menu');
  if (burger) {
    // Add event listener to burger
    burger.addEventListener('click', () => {
      // Show menu creating a modal
      createModal('modal-menu', menu);
    });
  }
}

// 12.0 - Resize
function resize() {
  // Select headBar and resize
  const headBar = document.querySelector('.head-bar');
  if (headBar) {
    // Get headBar height if headBar exists
    const headBarHeight = headBar.offsetHeight;
  }
  const resize = document.querySelector('.resize');

  if (resize && headBar) {
    // If resize and headBar exists, set resize height to 100% minus headBar height
    resize.style.width = '100%';
    resize.style.height = 'calc(100%)';
    resize.style.maxHeight = `${parseFloat(document.documentElement.clientHeight)}px`;
  } else if (resize) {
    // If resize exists, set resize height to 100%
    resize.style.width = '100%';
    resize.style.height = '100%';
  }
}

// 13.0 - Deploy Langs
function deployLangs() {
  // Select langs
  const langs = document.querySelector('.head-bar .lang');

  if (langs) {
    // Add event listener to langs
    langs.addEventListener('click', () => {
      // Toggle display class to langs
      langs.classList.toggle('display');
    });
  }
}

// 14.0 - Grid Services Counter
function gridServicesCounter() {
  // Select servicesParent and services
  const servicesParent = document.querySelector('.grid-services');
  const services = document.querySelectorAll('.grid-services > div');
  if (services) {
    // If services exists, add class odd to last element if services length is odd
    if (!services.length % 2 === 0) {
      if (servicesParent) {
        servicesParent.lastElementChild.classList.add('odd');
      }
    }
  }
}
