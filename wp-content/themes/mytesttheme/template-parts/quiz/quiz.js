const clickButton = () => {
    const button = document.querySelector('.quiz_btn');
    const radio = document.querySelectorAll('.quiz_form-input');
    
    for (const item of radio) {
        item.addEventListener('click', (e)=>{
            button.click();
            setOutlineActiveQuizRadioInner();
        });
    }
}

clickButton();

const setCookie = () => {

    document.cookie = "isVote=True; path=/; max-age=30";
}

const disabledQuizForm = () => {
    const inputs = document.querySelectorAll('.quiz_form .quiz_form-input');
    for (const item of inputs) {
        item.disabled = true;
    }
}

const setOutlineActiveQuizRadioInner = () => {
    const activeQuizRadioInner = document.querySelector('.quiz_form-input:checked').parentNode;
    
    activeQuizRadioInner.style = "border: 1px solid #0B7572";
};
    
const updateQuizVoteCount = (response) => {
    const quizVoteCount = document.querySelector('.quiz_vote-count');
    let value = Number(response);
    value = value.toLocaleString();
    quizVoteCount.textContent = value;
}

const updateQuizForm = (response) => {
    updateQuizVoteCount(response);
    disabledQuizForm();
    setOutlineActiveQuizRadioInner();
}

jQuery(document).ready(function($) {
    const formRequest = (formData) => {
        var data = {
            action: 'get_quiz_vote',
            user_scope_work: formData
        };
        
        $.post( MyAjax.ajaxurl, data)
            .done(function(response) {
               updateQuizForm(response);
               setCookie();
            })
            .fail(function( xhr, status, error) {
                console.log( status );
                console.log( error );
            })
    }    
    
    const form = document.querySelector('.quiz_form');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const formData = new FormData(form);
        const formValue = formData.get('user_scope_work');

        formRequest(formValue);   
    })    
});





