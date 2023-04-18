<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $score;
        $count=0;

        if(isset($_POST)){
            if(isset($_POST["score"])){
                global $score;

                $score=$_POST["score"];
            }

            for($i=1;$i<=10;$i++){
                if(isset($_POST["answer_$i"])){
                    $answer=$_POST["answer_$i"];

                    if($answer==="Answer $i"){
                        $count++;
                    }
                }
            }
        }


        $score+=$count*5;



        


        echo "<h1>Congratulations! Your score is $score</h1>";
    ?>

        <form action="index.php">
            <button>Re-Take the Test</button>
        </form>


</body>
</html>