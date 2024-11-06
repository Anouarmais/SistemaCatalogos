document.addEventListener("DOMContentLoaded", function () {
    // Función para cargar los productos cuando la página se carga
    loadProducts();
});

function loadProducts() {
    var xhr = new XMLHttpRequest();
    // Ajusta la ruta según tu estructura de directorios
    xhr.open("GET", "../../../server/daos/Bringproducts.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);

            var container = document.querySelector('.flex-grow-1.p-3');
            container.innerHTML = '';

            products.forEach(function (product) {
                var card = document.createElement('div');
                card.classList.add('card');
                card.style.width = '18rem';
                card.innerHTML = `
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="http://localhost/SistemaCatalogos/root/public/img/${product.img}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.description}</p>
                        <a href="#" class="btn btn-primary">${product.price} €</a>
                    </div>
                </div>

                `;
                container.appendChild(card);
            });
        } else {
            console.log('Error al cargar los productos: ' + xhr.status);
        }
    };
    xhr.send();
}
