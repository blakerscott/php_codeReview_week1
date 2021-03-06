<?php
class Contact
{
    private $name;
    private $phoneNumber;
    private $address;

    function __construct($name, $phoneNumber, $address)
    {
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
    }

    function setName($new_name)
    {
        $this->name = $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function setPhoneNumber($new_phoneNumber)
    {
        $this->phoneNumber = $new_phoneNumber;
    }

    function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    function setAddress($new_address)
    {
        $this->address = $new_address;
    }

    function getAddress()
    {
        return $this->address;
    }

    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }
}
?>
