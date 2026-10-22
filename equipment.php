<?php
require 'db.php';
$stmt = $pdo->query('SELECT * FROM products ORDER BY id');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Equipment | DA Inspection</title>
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

    <section class="equipment">

        <h2>Our Equipment</h2>

        <p class="equipment-intro">We supply a range of specialist inspection equipment to support non-destructive testing and measurement.</p>

        <?php foreach ($products as $product): ?>
          <div class="product">
            <img src="Images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars ($product['alt_text'])?>">
            <h3><?= htmlspecialchars ($product["name"]) ?></h3>
            <p><?= htmlspecialchars ($product["description"]) ?></p>
          </div>
        <?php endforeach; ?>

    </section>

    <footer>
        <p>&copy; 2026 DA Inspection</p>
    </footer>

</body>

</html>
