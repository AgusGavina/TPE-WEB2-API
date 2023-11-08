"use strict";

const API_URL = "http://localhost/Facultad/TPE-WEB2-API/api";
const main = document.querySelector('#main');
const home = document.querySelector('#home').addEventListener('click', showHome);

function showHome(){
    main.classList = "";
    main.classList = "main-home";
    main.innerHTML = `
    <div class="home-info">
        <img src="img/decoracion/bebidas.jpg" alt="bebidas">
        <div>
            <h2>Dejá que el escabio llegue a vos</h2>
            <p>Cervezas vinos y licores a la puerta de tu casa cuanto antes</p>
        </div>
    </div>

    <div class="home-info">
        <img src="img/decoracion/whisky-y-vaso.jpg" alt="whisky y vaso">
        <div>
            <h2>Lo querés? Lo tenemos.</h2>
            <p>Tinto, hay. Whisky? Tenemos. Esa IPA explosiva que probaste en tu bar favorito? También. </p>
        </div>
    </div>

    <div class="home-info">
        <img src="img/decoracion/3-copas.jpg" alt="3 copas brindando">
        <div>
            <p>No te pierdas un momento especial porque te tocó ir a comprar.</p>
        </div>
    </div>
    `;
}

async function getAllProducts() {
    try {
        let url = API_URL + "/Productos"
        let response = await fetch(url);
        if(!response.ok){
            throw new Error('Recurso no existe');
        }
        let products = await response.json();
        showAllProducts(products);
    } 
    catch(e){
        console.log(e);
    }
}

function showAllProducts(products) {
    let div = document.querySelector("#container-cards");
    div.innerHTML = "";
    for (const product of products) {
        div.innerHTML += `
        <a href="${product.Category_id}/${product.Product_id}" class="no-style">
        <div class="card" categoryID="${product.Product_name}">
            <div class="card-header">
                ${product.Category_id}
            </div>
            <div class="card-img">
                <img src="img/productos/${product.Product_name}.png" alt="${product.Product_name} ${product.Milliliters}ml">
            </div>
            <div class="card-info">
                <div class="card-description">
                    <p class="card-productName">${product.Product_name}</p>
                </div>
            </div>
        </div>
        </a>
        `;
    }
}


async function insertProduct(e){
    e.preventDefault();

    let data = new FormData(fom);
    let product = {
        Product_name: data.get('Product_name'),
        Millileters: data.get('Milliliters'),
        Price: data.get('Price'),
        Cate
    }
}


function showAllProductsInfo(products) {
    let div = document.querySelector("#container-cards");
    div.innerHTML = "";
    for (const product of products) {
        div.innerHTML += `
        <div class="card" categoryID="${product.Product_name}">
            <div class="card-header">
                ${product.Category_id}
            </div>
            <div class="card-img">
                <img src="img/productos/${product.Product_name}.png" alt="${product.Product_name} ${product.Milliliters}ml">
            </div>
            <div class="card-info">
                <div class="card-description">
                    <p class="card-productName">${product.Product_name}</p>
                    <p class="card-milliliters">${product.Milliliters}ml</p>
                </div>
                <hr class="card-divider">
                <div class="card-footer">
                    <p class="card-price">$${product.Price}</p>
                </div>
            </div>
        </div>
        `;
    }
}