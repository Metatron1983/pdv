const feedback_section = document.querySelector(".feedback");


if(feedback_section) {
    const feedback_img = feedback_section.querySelector('.feedback_img');
    const feedback_btn = feedback_section.querySelector('.feedback_img-file');

    feedback_btn.addEventListener('change', function(){
        const objUrl = window.URL.createObjectURL(this.files[0]);
        feedback_img.src = objUrl;
    });
    





}