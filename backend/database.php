<?php

class Database {
    private static $instance = null;
    private $connection;

    // Constructor is private to prevent external instantiation
    private function __construct() {
        $host = 'srv1299.hstgr.io';
        $dbname = 'u498377835_phpgram';
        $username = 'u498377835_phpgram';
        $password = 'Phpgram12345.';

        // Create the MySQL connection
        $this->connection = new mysqli($host, $username, $password, $dbname);

        // Check for connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Prevent cloning the singleton instance
    private function __clone() {}

    // Get the singleton instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Function to execute a query
    public function query($sql) {
        return $this->connection->query($sql);
    }

    // Escape strings to prevent SQL injection
    public function escape($string) {
        return $this->connection->real_escape_string($string);
    }

    // Close the connection
    public function close() {
        $this->connection->close();
    }
}

// Login function
function login($username, $password) {
    $db = Database::getInstance();

    // Escape user input
    $username = $db->escape($username);
    $password = $db->escape($password);

    // Query the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Return the first row of the result as an associative array
        return $result->fetch_assoc();
    } else {
        return null; // No match found
    }
}
function register($username, $password, $display_name, $bio, $pfp) {
    $db = Database::getInstance();

    $username = $db->escape($username);
    $password = $db->escape($password);
    $display_name = $db->escape($display_name);
    $bio = $db->escape($bio);
    $pfp = $db->escape($pfp);

    $sql = "INSERT INTO users (username, password, display_name, bio, pfp) VALUES ('$username', '$password', '$display_name', '$bio', '$pfp')";
    $db->query($sql);
}

?>
