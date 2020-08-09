<?php

function generateQuestions($quantity) {
    $questions = [];

    for ($i=0; $i < $quantity ; $i++) {
        do {
            $leftAdder = rand(0, 100);
            $rightAdder = rand(0, 100);
        } while (
            array_search(
                ['leftAdder' => $leftAdder,'rightAdder' => $rightAdder],
                $questions
            ) !== false
        );

        $correctAnswer = $leftAdder + $rightAdder;

        do {
            $firstIncorrectAnswer = $correctAnswer + rand(-10, 10);
            $secondIncorrectAnswer = $correctAnswer + rand(-10, 10);
        } while (
            $firstIncorrectAnswer === $secondIncorrectAnswer
            || $firstIncorrectAnswer === $correctAnswer
            || $secondIncorrectAnswer === $correctAnswer
        );

        $questions[] = [
            'leftAdder' => $leftAdder,
            'rightAdder' => $rightAdder,
            'correctAnswer' => $correctAnswer,
            'firstIncorrectAnswer' => $firstIncorrectAnswer,
            'secondIncorrectAnswer' => $secondIncorrectAnswer,
        ];
    }

    return $questions;
}
