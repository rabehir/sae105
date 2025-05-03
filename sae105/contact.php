<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Ma Boutique</title>
    <link rel="stylesheet" href="styles/style-contact.css">
</head>

<body>
<header>
    <h1>Contactez-nous</h1>
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
    <section>
        <h2 class="animate-title">Nous contacter</h2>
        <p>Vous avez des questions ou besoin d'aide ? N'hésitez pas à nous contacter en remplissant le formulaire ci-dessous. Nous nous engageons à vous répondre dans les plus brefs délais.</p>

        <form action="envoyer-message.php" method="post" class="contact-form">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required placeholder="Votre nom complet">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Votre adresse email">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" required placeholder="Votre message..."></textarea>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Ma boutique - Tous droits réservés.</p>
</footer>
</body>

</html>
