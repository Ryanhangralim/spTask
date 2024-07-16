<?php 

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
        $this->db->query("SELECT * FROM " . $this->tableName);
        return $this->db->resultSet();
    }

    public function addBulletinMessage($bulletinData)
    {
        $query = "INSERT INTO " . $this->tableName . " VALUES ('', :message, '')";

        $this->db->query($query);
        $this->db->bind('message', $bulletinData['message']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

?>