<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Search Engine</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .search-results { margin-top: 20px; }
        .search-results h3 { margin: 0; }
        .search-results p { margin: 5px 0 15px; }
    </style>
</head>
<body>
    <h1>Search Articles</h1>
    <form method="GET" action="search.php">
        <input type="text" name="query" placeholder="Enter search term..." required>
        <button type="submit">Search</button>
    </form>

    <div class="search-results">
        <?php if (isset($_GET['query'])): ?>
            <!-- Results will be displayed here -->
        <?php endif; ?>
    </div>
</body>
</html>
