let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () => {
    sideBar.classList.toggle('active');
}

document.querySelector('#close-side-bar').onclick = () => {
    sideBar.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
}

window.onscroll = () => {
    sideBar.classList.remove('active');
    searchForm.classList.remove('active');
};

document.querySelectorAll('.accordion-container .accordion').forEach(accordion => {
    accordion.onclick = () => {
        accordion.classList.toggle('active');
    }
});

var swiper = new Swiper(".home-slider", {
    loop: true,
    grabCursor: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".review-slider", {
    loop: true,
    grabCursor: true,
    spaceBetween: 20,
    breakpoints: {
        450: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});


let carts = document.querySelectorAll('.add-cart');

let products = [
    {
        name: "SmartPhone",
        tag: 'product-1',
        price: 100,
        inCart: 0
    },
    {
        name: "Camera",
        tag: 'product-2',
        price: 50,
        inCart: 0
    },
    {
        name: "Television",
        tag: 'product-3',
        price: 20,
        inCart: 0
    },
    {
        name: "Smartwatch",
        tag: 'product-4',
        price: 10,
        inCart: 0
    }
];

for (let i = 0; i < carts.length; i++) {
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i]);
    })
}

function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');

    if (productNumbers) {
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

function cartNumbers(product) {
    let productNumbers = localStorage.getItem('cartNumbers');

    productNumbers = parseInt(productNumbers);

    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}


function setItems(product) {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null) {
        if (cartItems[product.tag] == undefined) {
            cartItems = {
                ...cartItems,
                [product.tag]: product
            }
        }
        cartItems[product.tag].inCart += 1;
    } else {
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }
    }
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
    let cartCost = localStorage.getItem('totalCost');


    if (cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else {
        localStorage.setItem("totalCost", product.price);
    }

}

function displayCart() {
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    let boxContainer = document.querySelector(".box1");
    let cartCost = localStorage.getItem('totalCost');
    if (cartItems && boxContainer) {
        boxContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            boxContainer.innerHTML += `
            
            <div class="box box1">
            <i class="fas fa-times btn-danger"></i>
            <img src="images/${item.tag}.jpg">
                <div class="content">
                <h3>${item.name}</h3>
                <form action="">
                    <span>quantity : </span>
                    <input type="number" name="" value="1" id="">
                </form>
                <div class="price">${item.price},00</div>
            </div>
            <div class="price">
            $${item.inCart * item.price},00
            </div>
            </div>
          
            `
          
            
        });
        boxContainer.innerHTML += `
        
        <div class="cart-total">
        
        <h3> subtotal : $${cartCost},00 </h3>
      
        <a href="#" class="btn">proceed to checkout</a>
    </div>
    
        `
    }
}

onLoadCartNumbers();
displayCart();
