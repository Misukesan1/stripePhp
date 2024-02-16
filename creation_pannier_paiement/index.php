<?php
require_once('src/Class/Cart.php');
$cart = new Cart;
$products = $cart->getAllOfProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="public/style/main.css">
    <title>gestion d'un pannier</title>
</head>

<body>

    <header id="Header">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <h1 class="text-center">Système de gestion d'un pannier avec Stripe PHP</h1>
            </div>
            <div class="col-md-2">

                <!-- icone pannier -->
                <iconify-icon id="CartIcon" icon="streamline:bag-dollar-solid" width="2.5rem" height="2.5rem"></iconify-icon>

            </div>
        </div>
    </header>

    <?php // var_dump($products) 
    ?>

    <!-- Information message payment echec -->
    <?php if ((isset($_GET['status']))&&($_GET['status'] == 'echec')): ?>
        <div id="informationMessage" class="alert alert-danger text-center mt-3" role="alert">
            Vous avez annulé votre commande <strong><?= $_GET['idCart'] ?></strong> ... 
            <!-- delete the payment in datatbase here -->
        </div>
    <?php endif ?>

    <!-- Button show cart -->
    <section id="Cart" class="d-flex justify-content-center mt-3">
        <button id="showCart" type="button" class="btn btn-outline-secondary">Voir le pannier</button>
    </section>

    <section id="Products">

        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php foreach ($products as $item) : ?>

                <!-- Product Card -->
                <div class="col d-flex justify-content-center">
                    <div class="card h-100 border-dark text-center">
                        <img src="public/pics/products/<?= $item['pic'] ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['name'] ?></h5>
                            <p class="card-text"><?= $item['desc'] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item price"><?= $item['price'] ?> €</li>
                            <li class="list-group-item d-flex justify-content-center align-items-center">
                                <input type="text" class="form-control" value="1">
                                <div class="quantity d-flex justify-content-center align-items-center">
                                    <p class="icon">-</p>
                                    <p class="icon">+</p>
                                </div>
                                <button class="btn btn-primary">Ajouter</button>
                            </li>
                        </ul>
                    </div>
                </div>

            <?php endforeach ?>

        </div>
                
    </section>
                
    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Votre pannier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form open -->
                    <form action="src/stripe_traitement/checkout.php" method="post">
                    <ul class="list-group list-group-flush">

                    <!-- List items in cart -->

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                    <button id="checkout-button" type="submit" class="btn btn-primary">Payer</button>

                    <!-- Form end -->
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="public/js/gestion_cart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>