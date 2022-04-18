const manager_form = document.querySelector('.managers_title');

if(manager_form) {
    const manager_count = 6;

    for (let i = 1; i <= manager_count; i++) {
        let manager_img_css_selector = ".managers_admin_form .manager-" + String(i) + "_img";
        let manager_file_css_selector = ".managers_admin_form .manager-" + String(i) + "_img-btn-input";
        let manager_img = document.querySelector(manager_img_css_selector);
        let manager_file = document.querySelector(manager_file_css_selector);    
        manager_file.addEventListener('change', function () {
            manager_img.src = window.URL.createObjectURL(this.files[0]);
        });
    }

}