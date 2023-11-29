<?php
$conn = mysqli_connect("localhost", "root", "", "prognoza");

if (mysqli_connect_errno()) {
    echo "Błąd połączenia: " . mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <section id="banerlewy">
        <img src="logo.png" alt="meteo">
    </section>
    <section id="banersrodkowy">
        <h1>Prognoza dla Wrocławia</h1>
    </section>
    <section id="banerprawy">
        <p>maj, 2019 r.</p>
    </section>
    <section id="glowny">
        <table>
            <tr>
                <th>DATA</th>
                <th>TEMPERATURA W NOCY</th>
                <th>TEMPERATURA W DZIEŃ</th>
                <th>OPADY [mm/h]
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php
            $query = "SELECT * FROM pogoda WHERE miasta_id=1 ORDER BY data_prognozy ASC;";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>'.$row[2].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td>'.$row[5].'</td>';
                echo '<td>'.$row[6].'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </section>
    <section id="lewy">
        <img src="obraz.jpg" alt="Polska, Wrocław">
    </section>
    <section id="prawy">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </section>
</body>

</html>