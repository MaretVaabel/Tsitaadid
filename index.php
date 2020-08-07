<?php
    include 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsitaadid</title>
    <link href="main.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var qCount = 2;
            $("button").click(function() {
                qCount = qCount + 2;
                $("#quotes").load("load-quotes.php", {
                    qNewCount: qCount
                });
            });
        });

    </script>
</head>

<body>
    <header>
        <section class="top">
            <div class="logo">
                <p class="title">Tsitaadipesa</p>
            </div>
        </section>

        <nav class="navbar">
            <label for="toggle">&#9776;</label>
            <input type="checkbox" id="toggle" />
            <div class="menu">
                <ul>
                    <li><a href="index.html" class="" id=""><strong>Avaleht</strong></a></li>
                    <li><a href="#" class="" id="">Motivatsioon</a></li>
                    <li><a href="#" class="" id="">Armastus</a></li>
                    <li><a href="#" class="" id="">Elu</a></li>
                    <li><a href="#" class="" id="">Perekond</a></li>
                    <li><a href="#" class="" id="">Inspiratsioon</a></li>
                    <li><a href="#" class="" id="">Huumor</a></li>
                </ul>
            </div>
            <div class="joon"></div>
        </nav>


    </header>

    <main>

        <div id="quotes">
            <img src="background.jpg" alt="https://pixabay.com/photos/background-background-view-of-nature-1606047/" />
            <!--andmebaasis võiks olla tabel, kus on id, tsitaat, autor ja teemad, mille alla //see tsitaat sobib.-->
            <div class="text">
            <?php
            $sql = "SELECT * FROM quotes LIMIT 1"; //quotes on andmebaasis oleva tabeli nimi
            $result = mysqli_query(@conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $id = mysqli_fetch_assoc($result)['id']; 
                //SIIA PEAB HAKKAMA SISSE LUGEMA ÜKS HAAVAL 
                //JÄRJEST SUUREMA ID NUMBRIGA
                //UUS TULEB PÄRAST SÜDAÖÖD
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p><q>";
                    echo $row['titaat'];
                    echo "</q><br><cite>";
                    echo $row['autor'];
                    echo "</cite></p>"
                }
            }else {
                echo "Tsitaate pole!";
            }
            ?>
            </div>
        </div>
    </main>
    <footer class="buttonPlace">
        <button id="btn">Näita varasemaid</button>
    </footer>
</body>

</html>
