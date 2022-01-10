<?php
header('Content-Type: text/html; charset=utf-8');
require_once './connect.php';
?>

<!DOCTYPE html>

<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Könyvkölcsönzés</title>
    </head>
    <body>
        <div class="container">
            <h1>Könyvkölcsönzés</h1>
            <form>
                <div>
                    <label for="id">Kölcsönző neve:</label>
                    <select name="id" id="id" onchange="showKolcsonzesek()">
                        <?php
                        $sql = "SELECT `ID`, `nev` FROM `kolcsonzo` WHERE 1;";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["ID"] . '">' . $row["nev"] . '</option>';
                        }
                        ?>

                    </select>
                </div>
                
            </form>
            <div id="kolcsonzesek">

            </div>
        </div>
        <script>
            function showKolcsonzesek() {
                var x = document.getElementById("id").value;
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function () {
                    document.getElementById("kolcsonzesek").innerHTML = this.responseText;
                };
                xhttp.open("GET", "kolcsonzesek.php?id="+x);
                xhttp.send();
            }
        </script>
    </body>
</html>
