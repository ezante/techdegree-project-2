<?php include 'inc/quiz.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Math Quiz: Addition</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <?php if (isset($toast)): ?>
                <p class="toast"><?= $toast ?></p>
            <?php endif; ?>

            <?php if ($showScore === false): ?>
                <p class="breadcrumbs">Question <?= $answeredQuestionsCount+1 ?> of <?= $allQuestionsCount ?></p>
                <p class="quiz">What is <?= $question['leftAdder'] ?> + <?= $question['rightAdder'] ?>?</p>
                <form action="index.php" method="post">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <?php foreach ($answers as $answer): ?>
                        <input type="submit" class="btn" name="answer" value="<?= $answer ?>">
                    <?php endforeach; ?>
                </form>
            <?php endif; ?>

            <?php if ($showScore === true): ?>
                <p class="message">Congratulations! You got <?= $_SESSION['correctQuestionsCount'] ?> of <?= $allQuestionsCount ?> correct!</p>
                <form action="index.php" method="post">
                    <input type="submit" class="btn" name="reset" value="Reset Quiz">
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
