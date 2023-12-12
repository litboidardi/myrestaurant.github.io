<?php
namespace lib;

class database
{
    private $host = "localhost";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $dbName = "restaurant";
    private \PDO $connection;
    public function __construct(string $host = "", int $port = 3306, string $username = "", string $password = "", string $dbName = "")
    {
        if (!empty($host)) {
            $this->host = $host;
        }
        if (!empty($port)) {
            $this->port = $port;
        }
        if (!empty($username)) {
            $this->username = $username;
        }
        if (!empty($password)) {
            $this->password = $password;
        }
        if (!empty($dbName)) {
            $this->dbName = $dbName;
        }
        try {
            $this->connection = new \PDO("mysql:host=$this->host;
                port=$this->port;
                dbname=$this->dbName",
                $this->username,
                $this->password);

            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function insertReservation($name, $email, $phone, $people, $date, $time, $message)
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO reservations (name, email, phone, people, date, time, message)
                VALUES (:name, :email, :phone, :people, :date, :time, :message)
            ");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':people', $people);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':message', $message);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error inserting reservation: " . $e->getMessage();
        }
    }
    public function insertContact($name, $phone, $email, $message)
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO messages (name, phone, email, message)
                VALUES (:name, :phone, :email, :message)
            ");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error inserting reservation: " . $e->getMessage();
        }
    }
    public function insertComment($name, $email, $message)
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO comments (name, email, message)
                VALUES (:name, :email, :message)
            ");


            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error inserting comment: " . $e->getMessage();
        }
    }
    public function getComments()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM comments");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching comments: " . $e->getMessage();
            return [];
        }
    }
    public function getMessages()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM messages");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching comments: " . $e->getMessage();
            return [];
        }
    }
    public function getReservations()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reservations");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching comments: " . $e->getMessage();
            return [];
        }
    }
    public function registerAdmin($username, $password)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->connection->prepare("INSERT INTO admin (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            echo "Error registering user: " . $e->getMessage();
            return false;
        }
    }
    public function validateLogin($username, $password)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM admin WHERE username = :username LIMIT 1");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user) {
                // Use password_verify for password comparison
                if (password_verify($password, $user['password'])) {
                    return true;
                } else {
                    // Password verification failed
                    header("Location: ../2129_crispy_kitchen/index.php");
                   echo "Password verification failed.<br>";
                }
            } else {
                // User not found
                header("Location: ../2129_crispy_kitchen/index.php");
                echo "User not found.<br>";
            }

            return false;
        } catch (\PDOException $e) {
            echo "Error validating login: " . $e->getMessage();
            return false;
        }
    }
    public function getUserByUsername($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM admin WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            // Fetch the user as an associative array
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $user;
        } catch (\PDOException $e) {
            echo "Error fetching user by username: " . $e->getMessage();
            return null; // Return null in case of an error
        }
    }
}