<?php
    require_once "../config/config.php";


public function delete_equipment($itemID)
{
    global $conn;

    // Check if the item exists before deleting
    $checkItem = $conn->prepare('SELECT * FROM item WHERE id = ?');
    $checkItem->execute(array($itemID));
    $itemExists = $checkItem->rowCount();

    if ($itemExists > 0) {
        // Delete the item from the item table
        $deleteItem = $conn->prepare('DELETE FROM item WHERE id = ?');
        $deleteItem->execute(array($itemID));

        // Delete the item from the item_stock table
        $deleteStock = $conn->prepare('DELETE FROM item_stock WHERE item_id = ?');
        $deleteStock->execute(array($itemID));

        // Add a history log for the deletion
        session_start();
        $h_desc = 'delete Item with ID ' . $itemID;
        $h_tbl = 'equipment';
        $sessionid = $_SESSION['admin_id'];
        $sessiontype = $_SESSION['admin_type'];

        $history = $conn->prepare('INSERT INTO history_logs(description, table_name, user_id, user_type) VALUES(?,?,?,?)');
        $history->execute(array($h_desc, $h_tbl, $sessionid, $sessiontype));
        $historycount = $history->rowCount();

        return $historycount;
    } else {
        // Item does not exist
        return 0;
    }
}

// Usage example
// Assuming $itemID contains the ID of the item you want to delete
// Call the function like this:
// delete_equipment($itemID);
