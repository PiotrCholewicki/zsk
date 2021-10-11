<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Wiek ziomeczków</title>
    </head>
    <body>
    <?php
        if(!isset($_POST['ile_typa']))
        {
        echo <<< COKOLWIEK
            <form method="POST">
                <input type="number" name="ile_typa" placeholder="ile typa wariacie?"><br><br>
                <input type="submit" value="git"><br><br>
            </form>
        COKOLWIEK;
        }
        if(isset($_POST['ile_typa']))
        {

            echo <<< new
                <form method="POST">
            new;
            for($x = 0; $x < $_POST['ile_typa']; $x++)
                {
                echo <<< new
                    <input type="number" name="wiek_typa$x" placeholder="ile typ ma lat?"><br><br>
                new;
                }
                echo <<< new
                    <input type="submit" name="wiek"><br><br>
                    </form>
                new;
        }
        if(isset($_POST['wiek']))
        {
            $suma = 0;
            $srednia = 0;
            $count = 0;
            foreach ($_POST as $key => $value)
            {
                if ($key != 'wiek')
                {
                    $suma+=$value;
                    $count++;
                }
            }
            $srednia = $suma / $count;
            echo $srednia;
        }
    ?>
    </body>
</html>
