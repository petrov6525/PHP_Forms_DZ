<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        label {
            margin-right: 1rem;
        }

        #error {
            color: red;
            display: none;
        }

        div {
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>
    <?php
    $count = 0;

    $score;

    if (isset($_POST)) {

        for ($i = 1; $i <= 10; $i++) {
            if (isset($_POST["checkbox_$i"])) {

                $answers = $_POST["checkbox_$i"];

                $correct = 0;
                foreach ($answers as $answer) {
                    if ($answer === "correct") {
                        $correct++;
                    }
                }
                if ($correct === count($answers)) {
                    $count++;
                }
            }
        }

        if (isset($_POST["score"])) {
            global $score;

            $score = $_POST["score"];
        }
    }



    $score += $count * 3;

    //echo $score;

    ?>


    <?php
    include "./random.php";
    $arr = GetRandArr();

    ?>


    <form action="finish.php" method="post">
        <?php
        echo "<input type='hidden' name='score' value=$score />";

        foreach ($arr as $i) {
            echo "<div id=$i>
                        <p>Question $i</p>
                        <label>Answer: <input type='text' name='answer_$i' required /></label>
                      </div>";
        }

        ?>

        <button>Finish</button>
    </form>

</body>

</html>