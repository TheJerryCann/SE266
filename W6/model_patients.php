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

    function deletePatient ($id){
        global $db;
        $results = [];
        $sql = "DELETE FROM patients WHERE id = :id";
        $stmt = $db->prepare("DELETE FROM patients WHERE id = :id");
        $binds = array(
            ":id" => $id
        );
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        return ($results);
    }

    function updatePatient ($id, $fname, $lname, $married, $bday){
        global $db;
        $results = [];
        $sql = "UPDATE patients SET fname = :f, lname = :l, married = :m, bday= :b WHERE id = :id";
        $stmt = $db->prepare("UPDATE patients SET fname = :f, lname = :l, married = :m, bday= :b WHERE id = :id");
        $binds = array(
            ":id" => $id,
            ":f" => $fname,
            ":l" => $lname,
            ":m" => $married,
            ":b" => $bday
        );
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        return ($results);
    }

    function searchPatients($fname, $lname, $married)
    {
        global $db;
        $results = [];
        $binds = array();
        
        $sql =  "SELECT * FROM  patients WHERE 0=0";
        if ($fname != "") {
            $sql .= " AND fname LIKE :fname";
            $binds['fname'] = '%'.$fname.'%';
        }

        if ($lname != "") {
            $sql .= " AND lname LIKE :lname";
            $binds['lname'] = '%'.$lname.'%';
        }
            
        if ($married != "") {
            $sql .= " AND married = :married";
            $binds['married'] = $married;
        }

        $stmt = $db->prepare($sql);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            $results = "No results";
        }

        return $results;
    }

?>