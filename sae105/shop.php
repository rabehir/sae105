<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start(); // Démarre la session

// Ajouter un produit au panier
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Si le panier n'existe pas encore dans la session, le créer
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Vérifier si l'article est déjà dans le panier
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] == $product_name) {
            $item['quantity'] += 1; // Augmenter la quantité
            $found = true;
            break;
        }
    }

    // Si l'article n'est pas trouvé dans le panier, l'ajouter avec quantité 1
    if (!$found) {
        $_SESSION['cart'][] = [
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => 1
        ];
    }

    // Rediriger vers la même page avec un paramètre 'added'
    header('Location: shop.php?added=true');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - SAE105</title>
    <link rel="stylesheet" href="styles/style-shop.css">
    <script>
        // Fonction pour afficher et masquer le message de confirmation
        window.onload = function() {
            var message = document.getElementById('confirmation-message');
            if (message) {
                setTimeout(function() {
                    message.style.display = 'none';
                }, 3000); // Masquer après 3 secondes
            }
        };
    </script>
</head>

<body>
<header>
    <h1>Bienvenue dans la boutique</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li>
                <a href="shop.php">Boutique</a>
                <ul class="submenu">
                    <li><a href="shop.php?category=casques">Casques Audio</a></li>
                    <li><a href="shop.php?category=accessoires">Accessoires</a></li>
                    <li><a href="shop.php?category=peripheriques">Périphériques</a></li>
                </ul>
            </li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="shopping-cart.php">Panier</a></li>
        </ul>
    </nav>
</header>

<main>
    <section>
        <h2 class="animate-title">Nos produits</h2>
        <br>

        <?php if (isset($_GET['added']) && $_GET['added'] == 'true'): ?>
            <div id="confirmation-message" style="background-color: cadetblue; color: white; padding: 10px; margin-bottom: 20px;">
                L'article a été ajouté au panier !
            </div>
        <?php endif; ?>

        <div class="product-list">
            <?php
            // Définir la catégorie sélectionnée (ou toute la boutique si aucune catégorie n'est choisie)
            $category = isset($_GET['category']) ? $_GET['category'] : null;

            $defaultImage = "images/placeholder.jpg";
            $csvFile = fopen("products.csv", "r");

            if ($csvFile !== false) {
                fgetcsv($csvFile); // Skip header row

                while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
                    $nom = htmlspecialchars($data[0]);
                    $description = htmlspecialchars($data[1]);
                    $prix = htmlspecialchars($data[2]);
                    $image = htmlspecialchars($data[3]);
                    $product_category = strtolower($data[4]); // Catégorie du produit (assumé comme étant dans la 5e colonne)

                    if (!file_exists($image) || empty($image)) {
                        $image = $defaultImage;
                    }

                    // Si une catégorie est sélectionnée, on ne montre que les produits de cette catégorie
                    if ($category && $category !== $product_category) {
                        continue; // Passer au produit suivant
                    }

                    // Lien par défaut
                    $link = "#";

                    echo "
                    <div class='product'>
                        <a href='$link'>
                            <img src='$image' alt='$nom'>
                        </a>
                        <h3><a href='$link'>$nom</a></h3>
                        <p>$description</p>
                        <p><strong>Prix :</strong> $prix €</p>
                        <br>
                        <form method='POST' action=''>
                            <input type='hidden' name='product_name' value='$nom'>
                            <input type='hidden' name='product_price' value='$prix'>
                            <input type='hidden' name='product_image' value='$image'>
                            <button type='submit' name='add_to_cart'>Ajouter au panier</button>
                        </form>
                    </div>
                    <br>
                    <br>
                    ";
                }
                fclose($csvFile);
            } else {
                echo "<p>Erreur : Impossible de charger les produits.</p>";
            }
            ?>
        </div>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Ma boutique</p>
</footer>
</body>

</html>
