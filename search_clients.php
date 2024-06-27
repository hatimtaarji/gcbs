<?php
$servername = "votre_nom_d_hôte";  // souvent 'localhost'
$username = "votre_nom_utilisateur_mysql";
$password = "votre_mot_de_passe_mysql";
$dbname = "gestion_clients";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];

$sql = "SELECT * FROM clients WHERE name LIKE '%$query%' OR phone LIKE '%$query%' OR commercial LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Nom:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Téléphone:</strong> " . $row["phone"] . "</p>";
        echo "<p><strong>Commercial:</strong> " . $row["commercial"] . "</p>";
        echo "<p><strong>Ville:</strong> " . $row["city"] . "</p>";
        if (!empty($row["bl_pdf"])) {
            echo "<p><strong>Bon de livraison:</strong> <a href='" . $row["bl_pdf"] . "' target='_blank'>Télécharger</a></p>";
        }
        echo "</div><hr>";
    }
} else {
    echo "Aucun client trouvé";
}

$conn->close();
?>
