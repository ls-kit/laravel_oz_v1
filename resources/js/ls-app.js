import  "../css/custom.css";



require("noty/src/noty.scss");
require("noty/src/themes/mint.scss");
window.Noty = require('noty');

function addWishlist(){
    new Noty({
        type: 'success',
        layout: 'topRight',
        text: 'Added item to wishlist',
        timeout: 300
    }).show(); 
}

function removeItem(){
    new Noty({
        type: 'warning',
        layout: 'topRight',
        text: 'Remove from item to wishlist',
        timeout: 300
    }).show(); 
}

var wishbtn = document.querySelector(".ls_wishbtn");
wishbtn.addEventListener('click', function(){

    if(this.classList.contains('active')){
        removeItem();
        this.classList.remove('active');
    }else{
        this.classList.add('active');
        addWishlist();  
    }

    
})


//  use this file in theme.liquid.  https://laraoz.loc/js/ls-app.js