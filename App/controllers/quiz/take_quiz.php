<?php
auth();
require_once "../App/Models/Quiz.php";
$quizModel = new quizModel();


$quiz_id = $_POST['quiz_id'] ?? 1;  


$questions = $quizModel->getAllQuizQuestions($quiz_id); 


$quizData = [];


foreach ($questions as $question) {
    $question_id = $question['question_id'];
    $options = $quizModel->quizOptions($question_id);
    
    $quizData[] = [
        'question' => $question,
        'options' => $options,
    ];
}

$title = "Quiz";
require "../App/views/tasks/take.quiz.view.php";
?>
