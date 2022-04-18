const main_banner_heading = document.querySelector('.main-banner_heading');

if (main_banner_heading) {
    const main_banner_change_img_input = document.querySelector('.main_banner_image_input');
    const main_banner_change_img = document.querySelector('.main_banner_image');
    
    
    main_banner_change_img_input.addEventListener('change', function(){
        const fileList = this.files;
        main_banner_change_img.src = window.URL.createObjectURL(fileList[0]);
        
    })
    
    const main_banner_change_img_tablet_input = document.querySelector('.main_banner_image_tablet_input');
    const main_banner_change_img_tablet = document.querySelector('.main_banner_image--tablet');
    
    main_banner_change_img_tablet_input.addEventListener('change', function(){
        const fileList = this.files;
        main_banner_change_img_tablet.src = window.URL.createObjectURL(fileList[0]);
        
    });
    
    const main_banner_change_img_mobile_input = document.querySelector('.main_banner_image_mobile_input');
    const main_banner_change_img_mobile = document.querySelector('.main_banner_image--mobile');
    
    main_banner_change_img_mobile_input.addEventListener('change', function(){
        const fileList = this.files;
        main_banner_change_img_mobile.src = window.URL.createObjectURL(fileList[0]);
        
    });
}