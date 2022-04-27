import axios from "axios";
import  "../css/custom.css";



require("noty/src/noty.scss");
require("noty/src/themes/mint.scss");

window.Noty = require('noty');
window.axios = require('axios');

const appDomain = "https://laraoz.loc";

function addWishlist(customer, product_id){
    
    axios.post(appDomain + '/api/addToWishlist', {customer_id: customer, product_id: product_id})
    .then(response => {
        console.log("response", response);
    })
    .catch(error=> {
        console.log("ERROR", error);
    })
    
    // new Noty({
    //     type: 'success',
    //     layout: 'topRight',
    //     text: 'Added item to wishlist',
    //     timeout: 300
    // }).show(); 
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
        var customer = this.dataset.customer;
        var id = this.dataset.product;
        // console.log('this:', this.dataset.product);
        addWishlist(customer, id);  
    }

    
})


//  use this file in theme.liquid.  https://laraoz.loc/js/ls-app.js