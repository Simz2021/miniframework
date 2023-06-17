<?php

class ItemModel
{
    private $db;

    public function __construct()
    {
        // Connect to the database
        $dsn = 'mysql:host=db;dbname=db_mvc';
        $username = 'lamp_docker';
        $password = 'password';
        $this->db = new PDO($dsn, $username, $password);
    }

    public function addItem($item)
    {
        $sql = 'INSERT INTO items (name) VALUES (?)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$item]);
    }

    public function deleteItem($itemId)
    {
        $sql = 'DELETE FROM items WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$itemId]);
    }

    public function editItem($itemId, $newItemName)
    {
        $sql = 'UPDATE items SET name = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$newItemName, $itemId]);
    }

    public function getItems()
    {
        $sql = 'SELECT * FROM items';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
