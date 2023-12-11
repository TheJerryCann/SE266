<?php

    include(__DIR__ . '/db.php');

    function getGames () {
        global $db;
        $results = [];
        $stmt = $db->prepare("SELECT id, title, publisher, releaseDate, totalAchievements, earnedAchievements, rating FROM games ORDER BY Title");

        if ( $stmt->execute() && $stmt->rowcount() > 0 ) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
        return($results);
    }

    function addGame ($t, $p, $rd, $ta, $ea, $r) {
        global $db;
        $stmt = $db->prepare("INSERT INTO games SET title = :title, publisher = :publisher, releaseDate = :releaseDate, totalAchievements = :totalAchievements, earnedAchievements = :earnedAchievements, rating = :rating");
        $binds = array(
            ":title" => $t,
            ":publisher" => $p,
            ":releaseDate" => $rd,
            ":totalAchievements" => $ta,
            ":earnedAchievements" => $ea,
            ":rating" => $r
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        return ($results);
    }
    $games = getGames();

    function deleteGame ($id){
        global $db;
        $results = [];
        $sql = "DELETE FROM games WHERE id = :id";
        $stmt = $db->prepare("DELETE FROM games WHERE id = :id");
        $binds = array(
            ":id" => $id
        );
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        return ($results);
    }

    function updateGame ($id, $title, $publisher, $releaseDate, $totalAchievements, $earnedAchievements, $rating){
        global $db;
        $results = [];
        $sql = "UPDATE games SET title = :t, publisher = :p, releaseDate = :rd, totalAchievements = :ta, earnedAchievements = :ea, rating = :r WHERE id = :id";
        $stmt = $db->prepare("UPDATE games SET title = :t, publisher = :p, releaseDate = :rd, totalAchievements = :ta, earnedAchievements = :ea, rating = :r WHERE id = :id");
        $binds = array(
            ":id" => $id,
            ":t" => $title,
            ":p" => $publisher,
            ":rd" => $releaseDate,
            ":ta" => $totalAchievements,
            ":ea" => $earnedAchievements,
            ":r" => $rating
        );
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        return ($results);
    }

    function searchGames($title, $publisher, $rating)
    {
        global $db;
        $results = [];
        $binds = array();
        
        $sql =  "SELECT * FROM  games WHERE 0=0";
        if ($title != "") {
            $sql .= " AND title LIKE :title";
            $binds['title'] = '%'.$title.'%';
        }

        if ($publisher != "") {
            $sql .= " AND publisher LIKE :publisher";
            $binds['publisher'] = '%'.$publisher.'%';
        }
            
        if ($rating != "") {
            $sql .= " AND rating = :rating";
            $binds['rating'] = $rating;
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