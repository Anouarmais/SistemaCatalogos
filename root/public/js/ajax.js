document.addEventListener("DOMContentLoaded", function () {
    loadProducts();

    const bolsaBtn = document.querySelector('.bolsa');
    const carrito = document.querySelector('.carrito');

    bolsaBtn.addEventListener('click', function () {
        if (carrito.style.display === 'none' || carrito.style.display === '') {
            carrito.style.display = 'block';
        } else {
            carrito.style.display = 'none';
        }
    });
});

function loadProducts() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../../../server/daos/Bringproducts.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);

            var container = document.querySelector('.flex-grow-1.p-3');
            container.innerHTML = ''; 
            products.forEach(function (product) {
                
                const card = document.createElement('div');
                card.classList.add('card');

                
                const imgEl = document.createElement('img');
                imgEl.className = 'card-img-top';
                imgEl.src = `http://localhost/SistemaCatalogos/root/public/img/${product.img}`;
                imgEl.alt = 'Card image cap';

                
                const contentDiv = document.createElement('div');
                contentDiv.className = 'card-body';

                
                const h5El = document.createElement('h5');
                h5El.className = 'card-title';
                h5El.innerText = product.name;

                
                const pEl = document.createElement('p');
                pEl.className = 'card-text';
                pEl.innerText = product.description;

                
                const aEl = document.createElement('a');
                aEl.href = `../html/Vproduct.php?name=${encodeURIComponent(product.name)}`; 
                aEl.className = 'btn btn-primary';
                aEl.innerText = `${product.price} €`;

                
                contentDiv.appendChild(h5El);
                contentDiv.appendChild(pEl);
                contentDiv.appendChild(aEl);

                
                card.appendChild(imgEl);
                card.appendChild(contentDiv);

                
                container.appendChild(card);
            });
        } else {
            console.log('Error al cargar los productos: ' + xhr.status);
        }
    };
    xhr.send();
}
