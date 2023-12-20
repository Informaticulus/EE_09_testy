<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>

<body>
    <section id="baner1">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </section>
    <section id="baner2">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl" target="_blank">soki</a></li>
        </ol>
    </section>
    <section id="glowny">
        <?php
         $conn = mysqli_connect('localhost', 'root', '', 'dane2');
         $query="SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id BETWEEN 1 and 2;";
         $result=mysqli_query($conn,$query);
         while($row=mysqli_fetch_array($result)){
            echo '<div class="produkt">';
            echo "<img src='$row[4]' alt='warzywniak'>";
            echo '<h5>'.$row[0].'</h5>';
            echo '<p>opis: '.$row[2].'</p>';
            echo '<p>na stanie: '.$row[1].'</p>';
            echo '<h2>'.$row[3].' zł</h2>';
            echo '</div>';
         }
         mysqli_close($conn);
        ?>
    </section>
    <section id="stopka">
        <form action="" method="post">
            Nazwa <input type="text" name="nazwa" id="">Cena: <input type="text" name="cena" id=""><input type="submit" name="submit" value="Dodaj produkt">
        </form>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'dane2');
        if (isset($_POST['submit'])) {
            unset($_POST['submit']);
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];
            if (!empty($cena) && !empty($nazwa)) {
                $query = "INSERT INTO produkty VALUES(null, (SELECT id FROM rodzaje WHERE rodzaje.nazwa='owoce'), (SELECT id FROM producenci WHERE nazwa='warzywa-rolnik'), '$nazwa',10, null,'$cena','owoce.jpg');";
            }
            mysqli_query($conn, $query);
        }
        mysqli_close($conn);
        ?>
        Stronę wykonał: 00000000000
    </section>
</body>

</html>