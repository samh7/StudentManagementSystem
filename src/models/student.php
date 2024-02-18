<?php
class Student
{

    public $registration;
    public $uname;
    public $address;
    public $phone;
    public $email;
    public $phone_number;

    public function __construct(
        $registration,
        $uname,
        $address,
        $phone,
        $email,

    ) {
        $this->registration = $registration;
        $this->uname = $uname;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }

    function GetInsertSqlQuery()
    {
        return "INSERT INTO student(Username, Email, Address, PhoneNumber,Registration,PasswordHash)
        VALUES('$this->uname', '$this->email', '$this->address',  '$this->phone' , '$this->registration'";
    }
}
