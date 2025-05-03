<?php
session_start(); // Démarre la session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Redirection après le paiement
    header("Location: confirmation.php");
    exit(); // Arrête l'exécution après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <link rel="stylesheet" href="styles/style-paiement.css">
</head>
<body>
<header>
    <h1>Paiement</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="shop.php">Boutique</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <!-- Flèche en haut à gauche -->
    <a href="shop.php" class="back-arrow">&#8592; Retour au panier</a>
</header>
<main>
    <section class="payment">
        <h2>Procéder au paiement</h2>
        <form method="post" action="paiement.php">
            <label for="name">Nom sur la carte :</label>
            <input type="text" id="name" name="name" required>

            <label for="card-number">Numéro de carte :</label>
            <input type="text" id="card-number" name="card-number" required>

            <label for="expiry-date">Date d'expiration :</label>
            <input type="month" id="expiry-date" name="expiry-date" required>

            <label for="cvv">CVV :</label>
            <input type="text" id="cvv" name="cvv" required>

            <button type="submit" class="pay-btn">Payer</button>
        </form>
    </section>
</main>
<footer>
    <p>&copy; <?php echo date('Y'); ?> Ma boutique</p>
</footer>
</body>
</html>
