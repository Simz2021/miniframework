<!-- index.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1>Item List</h1>

    <!-- Form to add an item -->
    <form action="/item/add" method="post">
        <input type="text" name="item" placeholder="Enter item name" required>
        <button type="submit">Add Item</button>
    </form>

    <!-- List of items -->
    <ul>
        <?php foreach ($items as $item) : ?>
            <li>
                <span><?= $item->name ?></span>
                <form action="/item/delete" method="post">
                    <input type="hidden" name="delete" value="<?= $item->id ?>">
                    <button type="submit">Delete</button>
                </form>
                <form action="/item/edit" method="post">
                    <input type="hidden" name="editItemId" value="<?= $item->id ?>">
                    <input type="text" name="newItemName" value="<?= $item->name ?>" required>
                    <button type="submit">Save</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <script src="../public/js/script.js"></script>
</body>
</html>
