document.addEventListener("DOMContentLoaded", function () {
    // Función para cargar los productos cuando la página se carga
    loadProducts();
});

// Función para cargar los productos cuando la página se carga
function loadProducts() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../../../server/daos/Bringproducts.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);

            var container = document.querySelector('.flex-grow-1.p-3');
            container.innerHTML = ''; // Limpiar el contenedor antes de agregar productos

            products.forEach(function (product) {
                // Crear el contenedor principal de la tarjeta
                const card = document.createElement('div');
                card.classList.add('card');
               
                // Crear la imagen de la tarjeta
                const imgEl = document.createElement('img');
                imgEl.className = 'card-img-top';
                imgEl.src = `http://localhost/SistemaCatalogos/root/public/img/${product.img}`;
                imgEl.alt = 'Card image cap';

                // Crear el contenedor para el contenido de la tarjeta
                const contentDiv = document.createElement('div');
                contentDiv.className = 'card-body';

                // Crear el título de la tarjeta
                const h5El = document.createElement('h5');
                h5El.className = 'card-title';
                h5El.innerText = product.name;

                // Crear el párrafo de descripción de la tarjeta
                const pEl = document.createElement('p');
                pEl.className = 'card-text';
                pEl.innerText = product.description;

                // Crear el enlace con el nombre del producto
                const aEl = document.createElement('a');
                aEl.href = `../html/Vproduct.php?name=${encodeURIComponent(product.name)}`; // Pasar el nombre del producto por URL
                aEl.className = 'btn btn-primary';
                aEl.innerText = `${product.price} €`;

                // Añadir elementos al contenedor de contenido
                contentDiv.appendChild(h5El);
                contentDiv.appendChild(pEl);
                contentDiv.appendChild(aEl);

                // Añadir imagen y contenido al contenedor principal de la tarjeta
                card.appendChild(imgEl);
                card.appendChild(contentDiv);

                // Añadir la tarjeta al contenedor
                container.appendChild(card);
            });
        } else {
            console.log('Error al cargar los productos: ' + xhr.status);
        }
    };
    xhr.send();
}


