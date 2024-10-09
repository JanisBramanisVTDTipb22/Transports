<?php
auth();
require "../App/Core/Database.php";

class UserHistory {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getHistory($userId) {
        $query = "SELECT action, created_at FROM user_history WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

$userHistory = new UserHistory();
$userId = $_SESSION['user_id'];
$history = $userHistory->getHistory($userId);

require "../App/views/tasks/user.history.view.php";
?>
