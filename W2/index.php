<?php 

$patient = [
    'First Name' => document.querySelector('#fname').value,
    'Last Name' => '',
    'Married' => '',
    'Birth Date' => '',
    'Height' => '',
    'Weight' => ''
];
console.log($patient)

require 'index.view.php';

?>