<!-- index.php -->
<?php 
/*     require_once __DIR__ . '../../controllers/ItemController.php';
    $listitems = new ItemController();
    $items = $listitems->getItems();
  
    // print_r(json_decode($items));

    echo "<br>";
    // Assuming the original array is stored in the variable $data
    $data = json_decode($items);
    /*$data = [
    '{"id":1',
    '"name":"Watch"',
    '"created_at":"2023-07-10 19:09:29"',
    '"updated_at":"2023-07-10 19:09:29"}',
    '{"id":2',
    '"name":"Hat"',
    '"created_at":"2023-07-10 19:10:10"',
    '"updated_at":"2023-07-10 19:10:10"}'
];
*/
// Clean up the array and convert to readable JSON
/* $cleanedData = [];
for ($i = 0; $i < count($data); $i += 4) {
    $record = [
        'id' => intval(trim($data[$i], '{"')),
        'name' => trim($data[$i + 1], '"'),
        'created_at' => trim($data[$i + 2], '"'),
        'updated_at' => trim($data[$i + 3], '"}')
    ];
    $cleanedData[] = $record;
}

$cleanedJson = json_encode($cleanedData, JSON_PRETTY_PRINT);
$cleanedJson = json_decode($cleanedJson);
//var_dump($cleanedJson);
//echo count($cleanedJson);
$cleanstr = [];
for ($i = 0; $i < count($cleanedJson); $i++) {
    $cleanstr[] = $cleanedJson[$i]; 
}
echo "<pre>";
print_r($cleanstr);
echo "</pre>"; */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
   
    <style>
ul {
    list-style: none;
    padding: 0;
  }

  li {
    display: flex;
    align-items: center;
  }

  li span {
    margin-right: 10px;
  }
  
  .item-name {
    font-weight: bold;
    font-size: 18px;
}

.delete-btn {
    background-color: #ff0000;
    color: #ffffff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.edit-btn {
    background-color: #00ff00;
    color: #ffffff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

    </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Item List</h1>

    <!-- Form to add an item -->
    <form id="item-form">
        <input type="text" id="item-input" placeholder="Enter item name" required>
        <button type="submit">Add Item</button>
    </form>

    <!-- List of items -->
    <ul id="item-list">
 
        <li>
           
            <form action="/item/delete" method="post">
                <input type="hidden" name="delete" value="<?= $item->id; ?>">
                <button type="submit">Delete</button>
            </form>
            <form action="/item/edit" method="post">
                <input type="hidden" name="editItemId" value="<?= $item->id; ?>">
                <input type="text" name="newItemName" value="<?= $item->name; ?>" required>
                <button type="submit">Save</button>
            </form>
        </li>

   
</ul>


    </ul>
    <script src="../public/js/script.js"></script>
</body>
</html>
