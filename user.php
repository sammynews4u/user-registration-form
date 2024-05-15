<?php
class User {
    private $username;
    private $email;
    private $password;
    private $conn;

    public function
    __construct( $username, $email, $password, $conn) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn;
    }

    public function
    validateUsername () {
        if (!preg_match('/^[a-zA-Z0-9]{3,20}$/',$this->username)) {
            return false;
        }
        return true;
    }

    public function
    validateEmail () {
        if (!
        filter_var ($this->email, 
        FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public function
    validatePassword () {
        if (strlen ($this->password)
        < 8 || !preg_match ('/
    [a-zA-Z]/', $this->password)
    || !preg_match ('/[0-9]/', $this->password)) {
        return false;
    }
    return true;
    }

    public function createUser () {
        $query = "INSERT
        INTO users (username, email, password) VALUES
        (:username, :email, :password)";
        $stmt = 
        $this->conn->prepare ($query);

        $stmt->bindParam(':username',
        $this->username);
        $stmt->bindParam(':email',
        $this->email);
        $stmt->bindParam(':password',
        $this->password);
        $stmt->execute();
    }

    public function
    getUserByUsername($username) {
        $query = "SELET *
        FROM users WHERE username = :username";
        $stmt =
        $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch();
    }
    }