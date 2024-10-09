<?php
auth();

require "../App/Database.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure user_id and score are set
    if (!isset($_SESSION["user_id"]) || !isset($_SESSION["score"])) {
        echo "Error: User ID or score not found in session.";
        exit();
    }

    $user_id = $_SESSION["user_id"]; 
    $score = $_SESSION["score"];

    
    $db = new Database([
        'host' => 'localhost',
        'dbname' => 'quiz_group',
        'user' => 'root',
        'password' => 'root'
    ]);

    // Prepare SQL query
    $query = "INSERT INTO quiz_results (user_id, score, completed_at) VALUES (:user_id, :score, NOW())";
    $stmt = $db->prepare($query);

    // Execute and check for errors
    if ($stmt->execute(['user_id' => $user_id, 'score' => $score])) {
        unset($_SESSION['score']); // Clear the score from session
        header("Location: /leaderboard"); // Redirect to leaderboard
        exit();
    } else {
        // Show error message
        echo "Error recording score. SQL Error: " . implode(", ", $stmt->errorInfo());
    }
}
?>
