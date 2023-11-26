<?php

    include(__DIR__ . '/db.php');

    function getPatients () {
        global $db;
        $results = [];
        $stmt = $db->prepare("SELECT id, fname, lname, married, bday FROM patients ORDER BY lname");

        if ( $stmt->execute() && $stmt->rowcount() > 0 ) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
        return($results);
    }

    function addPatient ($f, $l, $m, $b) {
        global $db;
        $stmt = $db->prepare("INSERT INTO patients SET fname = :fname, lname = :lname, married = :married, bday = :bday");
        $binds = array(
            ":fname" => $f,
            ":lname" => $l,
            ":married" => $m,
            ":bday" => $b
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        return ($results);
    }
    $patients = getPatients();

?>