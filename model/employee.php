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
 
}

?>