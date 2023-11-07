<?php
$conn = mysqli_connect("localhost", "root", "", "firma");
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
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <section id="lewy">
        <h1>Akta Pracownicze</h1>
        <?php
        $query = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id=2;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        ?>
        <p>
            <?php
            echo '<h3>dane</h3>';
            echo '<p>' . $row[0] . ' ' . $row[1] . '</p>';
            echo '<hr>';
            echo '<h3>adres</h3>';
            echo '<p>' . $row[2] . '</p>';
            echo '<p>' . $row[3] . '</p>';
            echo '<hr>';
            if ($row[4] == 1) {
                echo '<p>RODO: podpisano</p>';
            } else {
                echo '<p>RODO: niepodpisano</p>';
            }
            if ($row[5] == 1) {
                echo '<p>Badania: aktualne</p>';
            } else {
                echo '<p>Badania: nieaktualne</p>';
            }
            ?>
            <hr>
            <h3>Dokumenty pracownika</h3>
            <a href="cv.txt">Pobierz</a>
        </p>
        <h1>Liczba zatrudnionych pracowników</h1>
        <?php
         $query = "SELECT count(*) FROM pracownicy;";
         $result = mysqli_query($conn, $query);
         $row = mysqli_fetch_array($result);
         echo '<p>'.$row[0].'</p>';
        ?>
    </section>
    <section id="prawy">
        <?php
        $query = "SELECT id, imie, nazwisko FROM pracownicy WHERE id=2;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $obraz=$row[0].".jpg";
        echo '<img src='."$obraz"." alt='pracownik'>";
        echo '<h3>'.$row[1].' '.$row[2].'</h3>';

        $query = "SELECT pracownicy.id, nazwa, opis FROM pracownicy INNER JOIN stanowiska ON stanowiska.id=pracownicy.stanowiska_id where pracownicy.id=2;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        echo '<h4>'.$row[1].'</h4>';
        echo '<h5>'.$row[2].'</h5>';
        ?>
    </section>
    <section id="stopka">
        Autorem aplikacji jest: 00000000000
        <ul>
            <li>skontaktuj się</li>
            <li>poznaj naszą firmę</li>
        </ul>
    </section>
</body>

</html>