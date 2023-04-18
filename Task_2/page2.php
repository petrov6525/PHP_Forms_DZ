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


    if (isset($_POST)) {

        for ($i = 1; $i <= 10; $i++) {
            if (isset($_POST["radio_$i"])) {
                if ($_POST["radio_$i"] === "correct") {
                    $count++;
                }
            }
        }
    }

    $score = $count;
    ?>

    <?php
    include "./random.php";
    $arr = GetRandArr();

    ?>



    <form action="page3.php" method="post" onsubmit="return IsAllClick()">
        <?php
        echo "<input type='hidden' name='score' value=$score />";
        foreach ($arr as $i) {
            echo "<div id='$i'>
                <p>Question $i</p>
                <label><input type='checkbox' name='checkbox_$i" . "[]" . "' />Answer 1</label>
                <label><input type='checkbox' name='checkbox_$i" . "[]" . "' />Answer 2</label>
                <label><input type='checkbox' name='checkbox_$i" . "[]" . "' value='correct'  />Answer 3</label>
                <label><input type='checkbox' name='checkbox_$i" . "[]" . "' value='correct' />Answer 4</label>
              </div>";
        }
        ?>
        <br>
        <div id="error">
            Дайте відповіді на всі питання!
        </div>
        <button>Next</button>


    </form>



    <script>
        const inputs = document.querySelectorAll("input[type='checkbox']");

        inputs.forEach(input => {
            input.addEventListener("change", () => {
                const error = document.getElementById("error");
                error.style.display = "none";
            })
        });




        function IsAllClick() {
            for (let i = 1; i <= 10; i++) {
                let inputs = document.querySelectorAll(`input[name="checkbox_${i}[]"]`);

                let isClick = false;

                inputs.forEach(input => {
                    if (input.checked) {
                        isClick = true;
                    }
                });



                if (!isClick) {
                    const error = document.getElementById("error");
                    error.style.display = "block";
                    return false;
                }
            }


            return true;
        }
    </script>

</body>

</html>