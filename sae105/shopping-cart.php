<?php
session_start(); // Démarre la session

// Vérifie si un produit a été supprimé
if (isset($_GET['remove'])) {
    $removeIndex = $_GET['remove'];
    // Supprime le produit du panier
    if (isset($_SESSION['cart'][$removeIndex])) {
        unset($_SESSION['cart'][$removeIndex]);
        // Réindexe le tableau pour éviter les trous
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - Boutique</title>
    <link rel="stylesheet" href="styles/style-shopping.css">
</head>

<body>
<header>
    <h1>Mon Panier</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="shop.php">Boutique</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="shopping-cart.php">Panier</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="cart">
        <h2 class="animate-title">Votre panier</h2>
        <div class="cart-items">
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $total = 0;
                // Parcours les produits dans le panier
                foreach ($_SESSION['cart'] as $index => $item) {
                    echo "
                    <div class='cart-item'>
                        <img src='{$item['image']}' alt='{$item['name']}'>
                        <div class='item-details'>
                            <h3>{$item['name']}</h3>
                            <p><strong>Prix :</strong> {$item['price']} €</p>
                            <p><strong>Quantité :</strong> {$item['quantity']}</p>
                            <a href='shopping-cart.php?remove=$index' class='remove-item'>Retirer</a>
                        </div>
                    </div>
                    ";
                    $total += $item['price'] * $item['quantity']; // Calcul du total avec quantité
                }
                echo "<div class='cart-summary'>
                        <p><strong>Total :</strong> $total €</p>
                        <a href='paiement.php' class='checkout-btn'>Procéder à la commande</a>
                    </div>";
            } else {
                echo "<p>Votre panier est vide.</p>";
            }
            ?>
        </div>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Ma boutique</p>
</footer>

<script src="scripts/cart.js"></script>
</body>

</html>
