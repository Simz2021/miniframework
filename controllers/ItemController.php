<?php
require_once __DIR__.'/../models/ItemModel.php';
class ItemController
{
    private $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    public function index()
    {
        // Logic to fetch items and render the view
        require_once __DIR__ . '/../views/index.php';
    }

    /*public function add()
    {
        // Logic to handle adding an item
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item = $_POST['item'] ?? '';
            $this->itemModel->addItem($item);
            // Redirect or return response
        }
    }*/
    public function test()
    {
        include __DIR__."/../views/test.php";
    }
    
    public function addItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemName = $_POST['item'];

            // Validate the input

            // Add the item to the database
            $itemId = $this->itemModel->addItem($itemName);

            if ($itemId) {
                // Item added successfully
                echo json_encode(['success' => true, 'message' => 'Item added successfully.', 'itemId' => $itemId]);
            } else {
                // Error adding item
                echo json_encode(['success' => false, 'message' => 'Error adding item.']);
            }
        }
    }

    public function delete()
    {
        // Logic to handle deleting an item
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemId = $_POST['delete'] ?? '';
            $this->itemModel->deleteItem($itemId);
            // Redirect or return response
        }
    }

    public function edit()
    {
        // Logic to handle editing an item
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemId = $_POST['editItemId'] ?? '';
            $newItemName = $_POST['newItemName'] ?? '';
            $this->itemModel->editItem($itemId, $newItemName);
            // Redirect or return response
        }
    }

    public function getItems() {
        $items = $this->itemModel->getItems();
        return json_encode($items);
      }
}
