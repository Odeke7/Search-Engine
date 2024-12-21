<?php
// Database connection
$host = 'localhost';
$db = 'search_engine';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Search query
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';
if ($searchQuery) {
    $sql = "SELECT title, content FROM articles 
            WHERE title LIKE :searchQuery OR content LIKE :searchQuery";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['searchQuery' => '%' . $searchQuery . '%']);
    $results = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h1>
    <div class="search-results">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $result): ?>
                <h3><?php echo htmlspecialchars($result['title']); ?></h3>
                <p><?php echo htmlspecialchars($result['content']); ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
    <a href="index.php">Back to Search</a>
</body>
</html>
