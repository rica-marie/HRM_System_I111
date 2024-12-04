<?php
class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', '_hrmsystem');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function validateAdmin($username, $password)
    {
        $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        
        if (!$stmt) {
            die("SQL error: " . $this->db->error); // Debugging info
        }
    
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
    
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
    
}
?>
