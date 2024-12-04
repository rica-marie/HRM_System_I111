<?php
class AdminModel
{
    public $db = null;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', '_hrmsystem');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function validateAdmin($username, $password)
    {
        // Query to check if the admin credentials are correct
        $query = "SELECT * FROM admins WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Admin found, return some information or true
            $admin = $result->fetch_assoc();
            $stmt->close();     
            return $admin;    
        } else {
            $stmt->close();
            return false;   
        }
    }
}


?>