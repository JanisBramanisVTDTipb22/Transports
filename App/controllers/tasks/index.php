<?php


auth();

$title = "Home Page";


require_once "../App/Models/Quiz.php";

$quizModel = new quizModel();
$quizzes = $quizModel->getAllQuizzes();

require "../App/views/tasks/index.view.php";
?>
