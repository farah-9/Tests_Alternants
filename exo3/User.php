<?php

class User
{

    // private $id;
    private $firstName;
    private $lastname;
    private $mailAddress;
/* Deletion of the 'id' argument in the constructor as there are only 3 arguments declared in the 'index.php' file  */ 

    public function __construct( $firstname, $lastname, $mailAddress)
    {
        // $this->id           = $id;
        $this->firstname    = $firstname;
        $this->lastname     = $lastname;
        $this->mailAddress= $mailAddress;
    }
/* Deletion of the 'getId' function, as there is no 'id' argument in the constructor.  */
    // function getId() 
    // {
    //     return $this->id;
    // }

    function getFirstname()
    {
        return $this->firstname;
    }

    function getLastname()
    {
        return $this->lastname;
    }

    function getMailAddress()
    {
        return $this -> $mailAddress;
    }

    /* Add the 'getFullname()' feature, which lets me concatenate the user's first and last names to return the full name as a string. */
function getFullname()
{
    return $this->firstname . ' ' . $this->lastname;
}
}

