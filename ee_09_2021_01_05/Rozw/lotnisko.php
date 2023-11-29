<?php
$conn = mysqli_connect('localhost', 'root', "", "egzamin");
if (!$conn) {
    mysqli_connect_error($conn);
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <section id="baner1">
        <img src="zad5.png" alt="logo lotnisko">
    </section>
    <section id="baner2">
        <h1>Przyloty</h1>
    </section>
    <section id="baner3">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </section>
    <section id="glowna">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
            $query = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
            $result = mysqli_query($conn, $query);
            while ($row=mysqli_fetch_array($result)){
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </section>
    <section id="stopka1">
        <?php
        if (isset($_COOKIE['lot'])) {
            echo '<p style="font-style:italic;">';
            echo "Witaj ponownie na stronie lotniska";
            echo '</p>';
        } else {
            setcookie("lot", "val", time() + 7200);
            echo '<p style="font-weight:bold;">';
            echo "Dzień dobry! Strona lotniska używa ciasteczek";
            echo '</p>';
        }
        ?>
    </section>
    <section id="stopka2">
        Autor: 00000000000
    </section>
</body>

</html>