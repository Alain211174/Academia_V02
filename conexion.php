<?php
class Conexion {
    /*private $host = "localhost";
    private $db_name = "4667274_academia";
    private $username = "root";
    private $password = ":1O+Dy*(/)4MP_f/b%";*/
    private $host = "localhost";
    private $db_name = "academia";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
}
?>