<?php
require 'db.php';

$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute ([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    http_response_code(404);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $product ? htmlspecialchars($product['name']) : 'Product not found' ?> | DA Inspection</title>
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

<?php if ($product): ?>

    <section class="hero">
        <h2><?=htmlspecialchars($product['name'])?></h2>
        <p><?=htmlspecialchars($product['description']) ?></p>
    </section>

<main class = "product-detail">
    <img src="Images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['alt_text']) ?>">

    <div class="product-info">

    <?php if (!empty($product['badge'])): ?>
        <span class="badge"><?= htmlspecialchars($product['badge']) ?></span>
        <?php endif; ?>
</div>
</main>

<?php else: ?>

    <section class="hero">
        <h2>Product not available</h2>
        <p>We're sorry</p>
    </section>

<?php endif; ?>

<footer>
    <p>&copy; 2026 DA Inspection</p>
</footer>

</body>
</html>