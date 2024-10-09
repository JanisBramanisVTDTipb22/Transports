<?php
auth();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../App/Models/Quiz.php";
    $quizModel = new quizModel();

    $quiz_id = $_POST['quiz_id'];
    $questions = $quizModel->getAllQuizQuestions($quiz_id);  

    $correctAnswersCount = 0;  
    $totalQuestions = count($questions);  
    $results = [];  

   
    foreach ($questions as $question) {
        $question_id = $question['question_id'];
        $correct_answer = $quizModel->quizCorrect($question_id)['is_correct'] + 1;

        if (isset($_POST['question_' . $question_id])) {
            $user_answer = $_POST['question_' . $question_id];

            if ($user_answer == $correct_answer) {
                $results[] = [
                    'question' => $question['text'],
                    'user_answer' => $user_answer,
                    'correct_answer' => $correct_answer,
                    'is_correct' => true,
                ];
                $correctAnswersCount++;  
            } else {
                $results[] = [
                    'question' => $question['text'],
                    'user_answer' => $user_answer,
                    'correct_answer' => $correct_answer,
                    'is_correct' => false,
                ];
            }
        } else {
            
            $results[] = [
                'question' => $question['text'],
                'user_answer' => null,
                'correct_answer' => $correct_answer,
                'is_correct' => false,
            ];
        }
    }

    
    $score = "{$correctAnswersCount}/{$totalQuestions}";
    require "../App/views/tasks/submit.quiz.view.php";
}
?>
