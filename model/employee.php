<?php
class EmployeeModel
{
    public $db = null;

    function __construct()
    {
        try {
            $this->db = new mysqli('localhost', 'root', '', '_hrmsystem');
        } catch (mysqli_sql_exception $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getEmployees()
    {
        $query = "SELECT username, name, password, DOB, deptId, accountActive FROM employee"; // Ensure table name is correct
        $result = $this->db->query($query);
        
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC); // Fetch all results as an associative array
        } else {
            return []; // Return an empty array if no results found
        }   
    }

    


    
}

    


?>
