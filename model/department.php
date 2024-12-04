<?php
class DepartmentModel
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', '_hrmsystem');
        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function addDepartment($deptId, $deptName)
{
    $query = "INSERT INTO department (deptName) VALUES (?)"; // Removed deptId from the query if it's auto-increment
    $stmt = $this->db->prepare($query);

    if (!$stmt) {
        die("SQL error: " . $this->db->error);
    }

    $stmt->bind_param('s', $deptName); // Bind only deptName

    return $stmt->execute(); // Execute the statement
}



// In department.php
public function getDepartments()
{
    $query = "SELECT * FROM department"; // Ensure this includes all necessary fields
    $result = $this->db->query($query);

    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}


    // Update department details
    public function updateDepartment($deptId, $newData)
    {
        $query = "UPDATE department SET deptName = ?, assignProject = ?, deptManager = ? WHERE deptId = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            die("SQL error: " . $this->db->error);
        }

        $stmt->bind_param('sssi', $newData['deptName'], $newData['assignProject'], $newData['deptManager'], $deptId);

        return $stmt->execute();
    }

    // Delete a department
    public function deleteDepartment($deptId)
    {
        $query = "DELETE FROM department WHERE deptId = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            die("SQL error: " . $this->db->error);
        }

        $stmt->bind_param('i', $deptId);

        return $stmt->execute();
    }

    // Assign a project to a department
    public function assignProject($deptId, $projectName)
    {
        $query = "UPDATE department SET assignProject = ? WHERE deptId = ?";
        $stmt = $this->db->prepare($query);
    
        if (!$stmt) {
            die("SQL error: " . $this->db->error);
        }
    
        $stmt->bind_param('si', $projectName, $deptId);
        return $stmt->execute();
    }
    


    // Assign a manager to a department
    public function assignManager($deptId, $managerName)
    {
        $query = "UPDATE department SET deptManager = ? WHERE deptId = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            die("SQL error: " . $this->db->error);
        }

        $stmt->bind_param('si', $managerName, $deptId);

        return $stmt->execute();
    }
}
?>
