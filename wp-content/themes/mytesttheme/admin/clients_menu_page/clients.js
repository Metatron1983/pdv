const clients_head = document.querySelector('.clients-admin_main-title');

if(clients_head){
    const clientsCart1LogoInput = document.querySelector('#clients-cart-1_logo-img-input-id');
    const clientsCart1LogoImg = document.querySelector('.clients-cart-1_logo-img');

    clientsCart1LogoInput.addEventListener('change',function() {
        clientsCart1LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })
    
    const clientsCart2LogoInput = document.querySelector('#clients_cart_2_logo-btn-input-id');
    const clientsCart2LogoImg = document.querySelector('.clients-cart-2_logo-img');

    clientsCart2LogoInput.addEventListener('change',function() {
        clientsCart2LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })

    const clientsCart3LogoInput = document.querySelector('#clients_cart_3_logo-btn-input-id');
    const clientsCart3LogoImg = document.querySelector('.clients-cart-3_logo-img');

    clientsCart3LogoInput.addEventListener('change',function() {
        clientsCart3LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })

    const clientsCart4LogoInput = document.querySelector('#clients_cart_4_logo-btn-input-id');
    const clientsCart4LogoImg = document.querySelector('.clients-cart-4_logo-img');

    clientsCart4LogoInput.addEventListener('change',function() {
        clientsCart4LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })

    const clientsCart5LogoInput = document.querySelector('#clients_cart_5_logo-btn-input-id');
    const clientsCart5LogoImg = document.querySelector('.clients-cart-5_logo-img');

    clientsCart5LogoInput.addEventListener('change',function() {
        clientsCart5LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })

    const clientsCart6LogoInput = document.querySelector('#clients_cart_6_logo-btn-input-id');
    const clientsCart6LogoImg = document.querySelector('.clients-cart-6_logo-img');

    clientsCart6LogoInput.addEventListener('change',function() {
        clientsCart6LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })

    const clientsCart7LogoInput = document.querySelector('#clients_cart_7_logo-btn-input-id');
    const clientsCart7LogoImg = document.querySelector('.clients-cart-7_logo-img');

    clientsCart7LogoInput.addEventListener('change',function() {
        clientsCart7LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })

    const clientsCart8LogoInput = document.querySelector('#clients_cart_8_logo-btn-input-id');
    const clientsCart8LogoImg = document.querySelector('.clients-cart-8_logo-img');

    clientsCart8LogoInput.addEventListener('change',function() {
        clientsCart8LogoImg.src = window.URL.createObjectURL(this.files[0]);
    })


} 