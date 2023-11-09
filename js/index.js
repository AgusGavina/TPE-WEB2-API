"use strict";

const URL = "api/Productos";

const main = document.querySelector("#main");

async function getAllProducts() {
    try {
        let response = await fetch(URL);
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
    main.classList.add("container-cards");
    main.innerHTML = "";
    for (const product of products) {
        main.innerHTML += `
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

getAllProducts();


function showProductsPage(){
    main.innerHTML = `
    <ul class="list-categorys">
        <li class="categorias-productos" id="0">Todos</li>
        <?php foreach ($categorys as $category) :
            if ($category->Category_id) : ?>
                <li class="categorias-productos" id="<?php echo $category->Category_id ?>"><?php echo $category->Category_name ?></li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
    `;
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