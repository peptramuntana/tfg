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
    let slider = document.getElementById('slider');
    if (slider) {
        console.log("in slider")
        let keenSlider = new KeenSlider(
            '#slider',
            {
              loop: true,
              created: () => {
                console.log('created')
              },
            },
            [
              // add plugins here
            ]
          )
    }
}