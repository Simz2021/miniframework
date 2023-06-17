<?php 

require_once __DIR__.'/../models/ItemModel.php';

class HomeController
{
    public function index()
    {
        // Logic to handle the home page
        // You can fetch data from the database, process it, and pass it to the view
        $itemModel = new ItemModel();  // Create an instance of ItemModel
        $items = $itemModel->getItems();  // Call getItems() on the instance
        require_once __DIR__.'/../views/index.php';
        
    }
}
?>