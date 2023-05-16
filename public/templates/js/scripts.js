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

let stateCheck = setInterval(() => {
  if (document.readyState === 'complete') {
    // Slider
    tiny();
    homeSlider();
    projectsSliders();

    gridServicesCounter();
    resize();
    burgerMenu();
    deployLangs();
    clearInterval(stateCheck);
  }
}, 100);


// 1.0 - Sliders
function projectsSliders() {
  let sliders = document.querySelectorAll('.projects-swiper');
  if (sliders) {
    sliders.forEach(slider => {
      const swiper = new Swiper('.projects-swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
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
  let sliders = document.querySelectorAll('.home-swiper');
  if (sliders) {
    sliders.forEach(slider => {
      const swiper = new Swiper('.home-swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
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
          init_instance_callback: function (editor) {
    // Your custom event handler code here
    console.log('Editor: ' + editor.id + ' is now initialized.');
  }
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
function createForm(e, form) {
  let confirmation = confirm("¿Estás seguro que quiéres crear este proyecto?");
  if (!confirmation || !validateForm(form)) {
    e.preventDefault();
  }
}

// 4.0 - Update Form
function updateForm(e, form) {
  let confirmation = confirm("¿Estás seguro que quiéres actualizar este proyecto?");
  if (!confirmation || !validateForm(form)) {
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

// 8.0 Validate Form
function validateForm(form) {
  // let projectTitleEditor = form.tinymce.get(projectTitle.id);
  // let projectContentEditor = form.tinymce.get(projectContent.id);
  // let projectTitleText = projectTitleEditor.getContent({ format: 'text' });
  // let projectContentText = projectContentEditor.getContent({ format: 'text' });
  // console.log(projectTitle)
  // console.log(projectContent)
  // console.log(projectTitleEditor)
  // console.log(projectContentEditor)
  // console.log(projectTitleText)
  // console.log(projectContentText)
  // console.log("validateForm");
  // console.log("projectTitleText.length: " + projectTitleText.length);
  // console.log("projectContentText.length: " + projectContentText.length);
  // alert("isValid before title validation:" + isValid);

  // Validate project_title

  let projectTitle = form.querySelector('#project_title');
  let projectContent = form.querySelector('#project_content');

  let images = form.querySelectorAll('.images');
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

  // Validate image fields
  images.forEach((image, index) => {
    let imageUrl = image.querySelector(`#image-url-${index + 1}`);
    let imageAlt = image.querySelector(`#image-alt-${index + 1}`);
    let imageTitle = image.querySelector(`#image-title-${index + 1}`);

    if (imageUrl.value.length < 2 || imageUrl.value.length > 60) {
      alert(`La URL de la imágen ${index + 1} ha de tener entre 2 y 60 caracteres.`);
      imageUrl.focus();
      isValid = false;
    }

    if (imageAlt.value.length < 2 || imageAlt.value.length > 60) {
      alert(`El ALT de la imágen ${index + 1} ha de tener entre 2 y 60 caracteres`);
      imageAlt.focus();
      isValid = false;
    }

    if (imageTitle.value.length < 2 || imageTitle.value.length > 60) {
      alert(`EL Title de la imágen ${index + 1} ha de tener entre 2 y 60 caracteres`);
      imageTitle.focus();
      isValid = false;
    }
  });

  return isValid;
}

// 9.0 - Create Modal
function createModal(id, $content) {

  let modal = document.getElementById(id)
  if (!modal) {
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
    if (typeof contentNode === 'object') {
      contentNode = $content.cloneNode(true)
      contentNode.id = contentNode.id + '-clone';
    }

    // Crete the closing
    let closeModal = document.createElement('div')
    closeModal.classList.add('close')
    closeModal.addEventListener('click', () => {
      toCloseModal(id)
    })

    // Add the closing to the header
    headerModal.append(closeModal)
    //Add content to the body
    bodyModal.append(contentNode)
    // Add Header and Body to the container
    containerModal.append(headerModal, bodyModal)
    // Add container to Modal
    buildModal.append(containerModal)

    document.getElementById('head_modal_controller').append(buildModal)

    return buildModal

  }
  return modal
}

// 10.0 - Close Modal
function toCloseModal(id) {
  let modal = document.querySelector(`#${id}`)
  // Show the content
  modal.classList.add('hide')
  setTimeout(
    () => {
      modal.classList.add('none')
      modal.classList.remove('hide')
      modal.remove()
    }, 500
  )
}

// 11.0 Burger Menu
function burgerMenu() {
  let burger = document.querySelector('.burger');
  let menu = document.querySelector('#menu');
  if(burger) {
    burger.addEventListener('click', () => {
      createModal('modal-menu', menu);
    });
  }
}

// 12.0 - Resize
function resize() {
  let headBar = document.querySelector('.head-bar');
  if(headBar) {
    let headBarHeight = headBar.offsetHeight;
  }
  let resize = document.querySelector('.resize');
  if (resize && headBar) {
    resize.style.width = '100%';
    resize.style.height = `calc(100%)`;
    resize.style.maxHeight = `${parseFloat(document.documentElement.clientHeight)}px`;
    // resize.style.height = `${parseFloat(document.documentElement.clientHeight)}px`;
  } else if (resize) {
    resize.style.width = '100%';
    resize.style.height = '100%';
  }

}

// 13.0 - Deploy Langs
function deployLangs() {
  let langs = document.querySelector('.head-bar .lang');

  if (langs) {
    langs.addEventListener('click', () => {
      langs.classList.toggle('display');
    });
  }
}

// 14.0 - Grid Services Counter
function gridServicesCounter() {
  let servicesParent = document.querySelector('.grid-services');
  let services = document.querySelectorAll('.grid-services > div');
  if(services) {
    if(!services.length % 2 === 0) {
      if(servicesParent) {
        servicesParent.lastElementChild.classList.add('odd');
      }
  }
}
}