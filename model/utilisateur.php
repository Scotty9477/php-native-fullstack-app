<?php
class User {
    private $id;
    private $username;
    private $email;
    private $role;

    function __construct($id, $username, $email, $role){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    // insert getter and a setter for the id property
    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    // insert getter and a setter for the username property
    function getUsername(){
        return $this->username;
    }

    function setUsername($username){
        $this->username = $username;
    }

    // insert getter and a setter for the email property

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }

    // insert getter and a setter for the role property

    function getRole(){
        return $this->role;
    }

    function setRole($role){
        $this->role = $role;
    }



    // insert a function that will return the user's information

    function getUserInfo(){
        return 'ID: ' . $this->id . ' Username: ' . $this->username . ' Email: ' . $this->email . ' Role: ' . $this->role;
    }         
}
?>