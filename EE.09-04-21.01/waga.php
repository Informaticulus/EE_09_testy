<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "egzamin";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Błąd połaczenia: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <section id="baner">
        <h2>Oblicz wskaźnik BMI</h2>
    </section>
    <section id="logo">
        <img src="wzor.png" alt="liczymy BMI">
    </section>
    <section id="lewy">
        <img src="rys1.png" alt="zrzuć kalorie!">
    </section>
    <section id="prawy">
        <h1>Podaj dane</h1>
        <form action="" method="post">
            Waga: <input type="number" name="waga" id=""><br>
            Wzrost [cm]: <input type="number" name="wzrost" id=""><br>
            <input type="submit" name="submit" value="Licz BMI i zapisz wynik">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            unset($_POST['submit']);
            $waga = intval($_POST['waga']);
            $wzrost = intval($_POST['wzrost']);
            if (empty($waga) || empty($waga)) {
                die();
            }
            echo "Twoja waga: " . $waga . "; Twój wzrost: " . $wzrost . "<br>";
            $wzrost = intval($wzrost) / 100;
            $bmi = intval($waga) / ($wzrost * $wzrost);
            echo "BMI wynosi: " . $bmi . "<br>";

            if ($bmi < 19) {
                $wynik = "1";
            } else if ($bmi < 26) {
                $wynik = "2";
            } else if ($bmi < 31) {
                $wynik = "3";
            } else if ($bmi >= 100) {
                $wynik = "4";
            }
            $data1 = date('Y-m-d');
            $query = "INSERT into wynik values(null, $wynik, '$data1', $bmi);";
            mysqli_query($conn, $query);
        }
        ?>
    </section>
    <section id="glowny">
        <table>
            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna sie od...</th>
            </tr>
            <?php
            $query = "SELECT id, informacja, wart_min FROM bmi;";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row[0] . '</td>' . '<td>' . $row[1] . '</td>' . '<td>' . $row[2] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </section>
    <section id="stopka">
        Autor: 00000000000 <a href="kw2.jpg">Wynik działania kwerendy 2</a>
    </section>
</body>
<?php
mysqli_close($conn);
?>

</html>