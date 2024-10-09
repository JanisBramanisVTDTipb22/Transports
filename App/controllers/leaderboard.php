<?php
auth();
require "../App/Core/Database.php"; // Include your Database class

class Leaderboard {
    private $db;

    public function __construct() {
        $this->db = new Database([
            'host' => 'localhost',
            'dbname' => 'quiz_group',
            'user' => 'root',
            'password' => 'root'
        ]);
    }

    public function getGlobalLeaderboard() {
        // Get total score for each user
        $query = "SELECT u.username, SUM(qr.score) AS total_score 
                  FROM users u
                  LEFT JOIN quiz_results qr ON u.user_id = qr.user_id   
                  GROUP BY u.user_id, u.username 
                  ORDER BY total_score DESC 
                  LIMIT 15";

        $stmt = $this->db->prepare($query);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch results
        } else {
            // Log error and return empty array
            return []; 
        }
    }
}

// Load the leaderboard view
$leaderboard = new Leaderboard();
$users = $leaderboard->getGlobalLeaderboard();
require "../App/views/tasks/leaderboard.view.php"; // Load view
?>
