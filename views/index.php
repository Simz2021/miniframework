<!-- index.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
    <script src="../public/js/script.js"></script>
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
    <ul id="item-list"></ul>


    </ul>

</body>
</html>
