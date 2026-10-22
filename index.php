<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM products WHERE featured = 1 ORDER BY id LIMIT 3');
$featured = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | DA Inspection</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>DA Inspection</h1>

        <nav>
            <a href="index.php">Home</a>
            <a href="equipment.php">Equipment</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
        </nav>
    </header>

    <section class="hero">
        <h2>Non-Destructive Testing Equipment</h2>

        <p>Professional equipment for inspection, testing and quality control.</p>

        <a href="equipment.php" class="button">View Equipment</a>
    </section>

    <section id="equipment">
        <h2>Featured products</h2>

        <div class="products">

<?php foreach ($featured as $product): ?>
    <div class="product">
      <?php if (!empty($product['badge'])): ?>
         <span class="badge"><?= htmlspecialchars($product['badge']) ?></span>
      <?php endif; ?>

<img src="Images/<?= htmlspecialchars ($product['image']) ?>" alt="<?= htmlspecialchars($product['alt_text']) ?>">
<h3><?= htmlspecialchars($product['name']) ?></h3>
<p><?= htmlspecialchars($product['description']) ?></p>

<p class="price">
    <?php if ($product['price'] !== null): ?>
        &pound;<?= number_format($product['price'], 2) ?>
        <?php else: ?>
            Price on request
        <?php endif; ?>
</p>

<a href="product.php?id=<?= (int) $product['id'] ?>">View Product</a>
        </div>
    <?php endforeach; ?>


        </div>
    </section>

    <section id="contact">
        <h2>Contact Us</h2>

        <p>Need help choosing the right equipment?</p>

        <p>
            Email:
            <a href="mailto:DAengineering@support.com">DAengineering@support.com</a>
        </p>

        <p>
            Phone:
            <a href="tel:0000000000">0000000000</a>
        </p>
    </section>

    <footer>
        <p>&copy; 2026 DA Inspection</p>
    </footer>

</body>

</html>
