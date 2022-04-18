const advantages = document.querySelector('.advantages-admin_title');


if (advantages) {
    const advantagesBannerImageInput = document.querySelector('.advantages-admin_banner-image-input');
    const advantagesBannerImageArea = document.querySelector('.advantages-admin_banner-image');
    
    advantagesBannerImageInput.addEventListener('change', function() {
        advantagesBannerImageArea.src = window.URL.createObjectURL(this.files[0]);
    });

    const advantagesImageTabletInput = document.querySelector('.advantages-admin_banner-image-tiblet-input');
    const advantagesBannerImageTabletArea = document.querySelector('.advantages-admin_banner-image_tablet');
    
    advantagesImageTabletInput.addEventListener('change', function() {
        advantagesBannerImageTabletArea.src = window.URL.createObjectURL(this.files[0]);
    });


    const advantage_1_image = document.querySelector('.advantages-admin-advantage-1_image-input');
    const advantage_1_ImageArea = document.querySelector('.advantages-admin-advantage-1_image');
    
    advantage_1_image.addEventListener('change', function() {
        advantage_1_ImageArea.src = window.URL.createObjectURL(this.files[0]);
    });

    const advantage_2_image = document.querySelector('.advantages-admin-advantage-2_image-input');
    const advantage_2_ImageArea = document.querySelector('.advantages-admin-advantage-2_image');
    
    advantage_2_image.addEventListener('change', function() {
        advantage_2_ImageArea.src = window.URL.createObjectURL(this.files[0]);
    });
    
    const advantage_3_image = document.querySelector('.advantages-admin-advantage-3_image-input');
    const advantage_3_ImageArea = document.querySelector('.advantages-admin-advantage-3_image');
    
    advantage_3_image.addEventListener('change', function() {
        advantage_3_ImageArea.src = window.URL.createObjectURL(this.files[0]);
    });
    
    const advantage_4_image = document.querySelector('.advantages-admin-advantage-4_image-input');
    const advantage_4_ImageArea = document.querySelector('.advantages-admin-advantage-4_image');
    
    advantage_4_image.addEventListener('change', function() {
        advantage_4_ImageArea.src = window.URL.createObjectURL(this.files[0]);
    });
    
}