import { } from "../css/custom.css";

function addWishlist(){
    console.log("adding new item"); 
}

function removeItem(){
    console.log("Item Remove wishlist")
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