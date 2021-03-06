<?php
namespace roger\user;
/**
 * File that contains the user class
 * @author Roger Puga
 * 23-11-2021
 */
class User {
    private $username;
    private $password;
    private $rol;
    private $name;
    private $surename;

    // constructor
    function __construct($username, $password, $rol, $name, $surename) {
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
        $this->name = $name;
        $this->surename = $surename;
    }

    // setters

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function setRole($rol) {
        $this->rol = $rol;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurename($surename) {
        $this->surename = $surename;
    }

    // getters

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->rol;
    }

    function getName(){
        return $this->name;
    }

    function getSurename(){
        return $this->surename;
    }

    function __toString()
    {
        return 
            $this->username . ";" . 
            $this->password . ";" . 
            $this->rol . ";" . 
            $this->name . ";" . 
            $this->surename;
    }

    /**
     * Method to compare two objects with username
     * @param $other
     * @return true if they are equal
     */
    function compareTo ($other):bool{
        if (is_string($other)){
            if ($this->getUsername() == $other){
                return true;
            }else{
                return false;
            }
        }else if ($other instanceof User){
            if ($other->getUsername() == $this->getUsername()){
                return true;
            }else{
                return false;
            }
        }

    }

    /**
     * Method to validate user
     * @param string $username
     * @param string $password
     * @return boolean true if user is valid
     */
    function validate (string $username, string $password):bool{
        if ($this->getUsername() == $username && $this->getPassword() == $password){
            return true;
        }else{
            return false;
        }
    }
}
