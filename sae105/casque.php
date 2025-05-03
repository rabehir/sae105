<?php
error_reporting(0);
ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casque - Boutique SAE105</title>
    <link rel="stylesheet" href="styles/style-casque.css">
</head>

<body>
<header>
    <h1>Nos produits</h1>
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
    <section class="product-detail">
        <div class="product-container">
            <div class="product-image">
                <img src="images/casque.jpg" alt="Casque Audio Haut de Gamme">
            </div>
            <div class="product-info">
                <h2>Casque Audio Haut de Gamme</h2>
                <p>
                    Découvrez une expérience sonore exceptionnelle avec notre casque audio haut de gamme.
                    Conçu pour offrir une qualité sonore inégalée, ce casque est parfait pour les audiophiles
                    et les amateurs de musique.
                </p>
                <ul>
                    <li><strong>Marque :</strong> Premium Sound</li>
                    <li><strong>Type :</strong> Casque circum-aural</li>
                    <li><strong>Connexion :</strong> Bluetooth 5.0 et filaire</li>
                    <li><strong>Autonomie :</strong> Jusqu'à 30 heures</li>
                    <li><strong>Prix :</strong> 149,99 €</li>
                </ul>
                <button class="add-to-cart">Ajouter au panier</button>
            </div>
        </div>
    </section>
    
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Ma boutique</p>
</footer>
</body>

</html>
