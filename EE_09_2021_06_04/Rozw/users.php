<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <section id="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </section>
    <section id="lewy">
        <h4>Użytkownicy</h4>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "dane4");
        if (mysqli_connect_errno()) {
            echo "Błąd połączenia: " . mysqli_connect_error();
            exit();
        }
        $query = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $wiek = date("Y") - $row[3];
            echo $row[0] . " " . $row[1] . " " . $row[2] . " " . $wiek . " lat<br>";
        }
        mysqli_close($conn);
        ?>
        <a href="settings.html">Inne ustawienia</a>
    </section>
    <section id="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="" method="post">
            <input type="number" name="idOsoby" id="">
            <input type="submit" name="submit" value="ZOBACZ">
        </form>
        <hr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "dane4");
        if (mysqli_connect_errno()) {
            echo "Błąd połączenia: " . mysqli_connect_error();
            exit();
        }
        if (isset($_POST['submit'])){
            unset($_POST['submit']);
            $idOsoby=$_POST['idOsoby'];
        $query="SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby INNER JOIN hobby on osoby.Hobby_id=hobby.id where osoby.id='$idOsoby';";
        $result=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_array($result)){
            echo '<h2>'.$idOsoby.". ".$row[0].' '.$row[1].'</h2>';
            echo "<img src='$row[4]' alt='$idOsoby'>";
            echo '<p>Rok urodzenia: '.$row[2].'</p>';
            echo '<p>Opis: '.$row[3].'</p>';
            echo '<p>Hobby: '.$row[5].'</p>';
        }
        mysqli_close($conn);
        }
        ?>
    </section>
    <section id="stopka">
        Stronę wykonał: 00000000000
    </section>
</body>

</html>