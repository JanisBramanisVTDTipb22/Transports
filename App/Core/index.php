<?php


auth();

$title = "Home Page";


$quizModel = new quizModel();
$quizzes = $quizModel->getAllQuizzes();

?>