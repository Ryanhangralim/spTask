<?php 
namespace App\Models;

use App\Core\Database;


class BulletinModel
{
    private $tableName = 'bulletin';
    private $db;

    // init db
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBulletinMessage()
    {
        $this->db->query("SELECT * FROM " . $this->tableName . " ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function addBulletinMessage($bulletinData)
    {
        $query = "INSERT INTO " . $this->tableName . "(content) VALUES (:content)";

        $this->db->query($query);
        $this->db->bind('content', $bulletinData['content']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>