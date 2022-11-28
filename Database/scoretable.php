<?php

class ScoreFunction extends SessionFunction {
    public function GetLeaderboard() {
        $Get_score_query = "SELECT * FROM `score` LIMIT 100;";
        $statement = $this->con->prepare($Get_score_query);
        $statement->execute();
        return $statement->fetchAll();
    }
}