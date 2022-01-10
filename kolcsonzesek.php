<?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
require_once './connect.php';
$sql = "SELECT konyvek.Szerzo , konyvek.Cím, konyvek.KiadasEve FROM kolcsonzes JOIN konyvek ON kolcsonzes.konyvID =konyvek.id WHERE kolcsonzes.kolcsonzoID =?;";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result != null && $result->num_rows > 0) {
    $data = '<h2>Kikölcsönzött könyvek:</h2>    
        <table>
                    <thead>
                            <th>Szerző</th>
                            <th>Cím</th>
                            <th>Kiadás éve</th>
                    </thead>
                    <tbody>';
    while ($row = $result->fetch_assoc()) {
        $data .= '<tr>
    <td>' . $row["Szerzo"] . '</td>
    <td>' . $row["Cím"] . '</td>
    <td>' . $row["KiadasEve"] . '</td>
    </tr>';
    }
    $data .= '</tbody>
                </table>';
    echo $data;
} else {
    echo 'Nincs kölcsönzése.';
}