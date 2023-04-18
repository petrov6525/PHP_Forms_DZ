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

        #error{
            color:red;
            display: none;
        }

        div{
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>

        <?php
            include "./random.php";
            $arr=GetRandArr();

        ?>

    <form action="page2.php" method="post" onsubmit="return IsAllClick()">

        <?php
        foreach($arr as $i) {
            echo "<div id='$i'>
                        <p>Question $i</p>
                        <label><input type='radio' name='radio_$i' />Answer 1</label>
                        <label><input type='radio' name='radio_$i' />Answer 2</label>
                        <label><input type='radio' name='radio_$i' />Answer 3</label>
                        <label><input type='radio' name='radio_$i' value='correct' />Answer 4</label>
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

        const inputs=document.querySelectorAll("input[type='radio']");

        inputs.forEach(input=>{
            input.addEventListener("change",()=>{
                const error=document.getElementById("error");
                    error.style.display="none";
            })
        });

        function IsAllClick() {
            for (let i = 1; i <= 10; i++) {
                let inputs = document.querySelectorAll(`input[name="radio_${i}"]`);

                let isClick = false;

                inputs.forEach(input => {
                    if (input.checked) {
                        isClick = true;
                    }
                });



                if (!isClick) {
                    const error=document.getElementById("error");
                    error.style.display="block";
                    return false;
                }
            }


            return true;
        }
    </script>
</body>

</html>