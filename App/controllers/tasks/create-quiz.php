<?php
ob_start(); // Start output buffering

isAdmin(); 

require "../App/views/tasks/create.quiz.view.php";
require_once "../App/Models/Quiz.php";

$quizModel = new quizModel();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['question_text'], $_POST['options'], $_POST['correct'])) {
    if (!isset($_SESSION['quiz_id'])) {
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $quizModel->createQuiz($title, $description);
        $_SESSION['quiz_id'] = $quizModel->getLastInsertId($title, $description);
    }

    $quizId = $_SESSION['quiz_id'];
    $questionText = htmlspecialchars($_POST['question_text']);
    $options = array_map('htmlspecialchars', $_POST['options']);
    $correctOptionIndex = $_POST['correct'] - 1;

    $quizModel->createQuestion($questionText, $quizId);
    $questionId = $quizModel->getLastQuestionId($quizId, $questionText);

    if (count($options) === 4) {
        $quizModel->createOption($correctOptionIndex, $options[0], $options[1], $options[2], $options[3], $questionId);
    }

  
    header("Location: /create");
    exit;
}


if (isset($_GET['finish'])) {
   
    unset($_SESSION['quiz_id']);
    header("Location: /");
    exit;
}

ob_end_flush(); // End output buffering and flush output
