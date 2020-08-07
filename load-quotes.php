 <!--andmebaasis võiks olla tabel, kus on id, tsitaat, autor ja teemad, mille alla //see tsitaat sobib.-->
 <?php
    include 'dbh.php';

    $qNewCount = $_POST['qNewCount'];

    $sql = "SELECT * FROM quotes LIMIT $qNewCount"; //quotes on andmebaasis oleva tabeli nimi
    $result = mysqli_query(@conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $id = mysqli_fetch_assoc($result)['id']; 
                //SIIA tuleb rohkem tsitaate sisse
                //JÄRJEST väiksema ID NUMBRIGA
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<p><q>";
                echo $row['titaat'];
                echo "</q><br><cite>"
                echo $row['autor'];
                echo "</cite></p>"
        }
    }else {
        echo "Tsitaate pole!";
    }
?>
