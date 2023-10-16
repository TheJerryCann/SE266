<?php 

class Patient{
    private $fname;
    private $lname;
    private $married;
    private $bday;
    private $height;
    private $weight;

    public function __construct($p){
        $this->fname = $p;
    }
}
$patient = [
    'First Name' => '',
    'Last Name' => '',
    ''
]


require 'index.view.php';

?>