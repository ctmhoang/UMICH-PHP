<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Person
{
    private string $lastname = "";
    private string $firstname = "";
    private int $age = 0;
    const CLASS_NAME = 'Person';

    public function __construct(string $lastname, string $firstname, int $age)
    {
        echo "basic costructor <br>";
        $this->$lastname = $lastname;
        $this->$firstname = $firstname;
        $this->$age = $age;
    }

    public function greet()
    {
        return "Hello $this->firstname $this->lastname. Your age is $this->age";
    }

    public static function ahoy()
    {
        echo "AHOY";
    }

    function __destruct()
    {
        echo ('Destructed');
    }
}


class Curmudgeon extends Person
{
    private string $lang = "";

    function __construct(string $lastname, string $firstname, int $age, string $lang)
    {
        parent::__construct($lastname, $firstname, $age);
        $this->lang = $lang;
    }
    function bye()
    {
        if ($this->lang == 'fr') {
            echo 'Au revoir';
            return;
        }
        if ($this->lang == 'es') {
            echo 'Adios';
            return;
        }
        echo 'goodbye';
    }
}

$cam = new Person('Hoang', 'Cam', 21);
$cam->greet();
Person::ahoy();
echo (Person::CLASS_NAME);

$er = new Curmudgeon("Eric","William",67,'fr');
$er->bye();
