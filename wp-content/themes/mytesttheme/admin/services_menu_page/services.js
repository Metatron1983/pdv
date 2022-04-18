const services_head = document.querySelector('.services_main_title');

if(services_head){
    const services_img_1_btn = document.querySelector('#services_1_img_file');
    const services_img_1_inputarea = document.querySelector('.services_image_1_js');

    services_img_1_btn.addEventListener('change',function() {
        services_img_1_inputarea.src = window.URL.createObjectURL(this.files[0]);
    })

    const services_img_2_btn = document.querySelector('#services_2_img_file');
    const services_img_2_inputarea = document.querySelector('.services_image_2_js');

    services_img_2_btn.addEventListener('change',function() {
        services_img_2_inputarea.src = window.URL.createObjectURL(this.files[0]);
    })

    const services_img_3_btn = document.querySelector('#services_3_img_file');
    const services_img_3_inputarea = document.querySelector('.services_image_3_js');

    services_img_3_btn.addEventListener('change',function() {
        services_img_3_inputarea.src = window.URL.createObjectURL(this.files[0]);
    })
} 