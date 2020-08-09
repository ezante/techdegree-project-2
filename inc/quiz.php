<?php

session_start();

include 'generate_questions.php';

$toast = null;
$showScore = false;

if (isset($_POST['reset'])) {
    session_unset();
}

$_SESSION['allQuestions'] ??= generateQuestions(10);
$_SESSION['answeredQuestions'] ??= [];
$_SESSION['correctQuestionsCount'] ??= 0;
$allQuestionsCount = count($_SESSION['allQuestions']);
$answeredQuestionsCount = count($_SESSION['answeredQuestions']);

if (isset($_POST['answer'])) {
    if ($_POST['answer'] == $_SESSION['allQuestions'][$_POST['index']]['correctAnswer']) {
        $_SESSION['correctQuestionsCount']++;
        $toast = 'Well done! Your answer is correct!';
    } else {
        $toast = 'Bummer! Your answer is incorrect!';
    }

    $_SESSION['answeredQuestions'][] = $_POST['index'];
    $answeredQuestionsCount++;
}

if ($answeredQuestionsCount < $allQuestionsCount) {
    do {
        $index = array_rand($_SESSION['allQuestions']);
    } while (in_array($index, $_SESSION['answeredQuestions']));

    $question = $_SESSION['allQuestions'][$index];

    $answers = [
        $question['correctAnswer'],
        $question['firstIncorrectAnswer'],
        $question['secondIncorrectAnswer'],
    ];
    shuffle($answers);
} else {
    $showScore = true;
}
