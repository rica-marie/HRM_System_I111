<?php
class EmployeeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', '_hrmsystem');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // public function validateEmployee($username, $password)
    // {
    //     $query = "SELECT * FROM employee WHERE username = ? AND password = ?";
    //     $stmt = $this->db->prepare($query);
        
    //     if (!$stmt) {
    //         die("SQL error: " . $this->db->error); // Debugging info
    //     }
    
    //     $stmt->bind_param('ss', $username, $password);
    //     $stmt->execute();
    
    //     $result = $stmt->get_result();
    //     return $result->num_rows > 0;
    // }

    public function validateEmployee($username, $password)
    {
        $query = "SELECT * FROM employee WHERE username = ? AND password = ? AND accountActive = 1";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            die("SQL error: " . $this->db->error);
        }

        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function signUpEmployee($username, $name,  $password,$dob)
    {
      
        
        // Insert query with a date format for DOB
        $query = "INSERT INTO employee (username, name, password, dob, accountActive) 
                  VALUES (?, ?, ?, ?, 0)"; // accountActive is set to 1 (active by default)
        $stmt = $this->db->prepare($query);
        
        if (!$stmt) {
            die("SQL error: " . $this->db->error);
        }
        
        // Bind parameters
        $stmt->bind_param('ssss', $username,$name, $password,  $dob);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    
    public function getAllEmployees()
    {
        $query = "SELECT username, name, password, DOB, deptId, accountActive FROM employee";
        $result = $this->db->query($query);
        
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC); // Fetch all results as an associative array
        } else {
            return false; // Return false if there's an error
        }
    }

 
}
?>
