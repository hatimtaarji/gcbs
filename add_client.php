<?php
$servername = "votre_nom_d_hôte";  // souvent 'localhost'
$username = "votre_nom_utilisateur_mysql";
$password = "votre_mot_de_passe_mysql";
$dbname = "gestion_clients";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $commercial = $_POST['commercial'];
    $city = $_POST['city'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bl_pdf"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Vérifiez si le fichier est un PDF réel
    if($fileType != "pdf") {
        echo "Désolé, seuls les fichiers PDF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifiez si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifiez la taille du fichier (par exemple, pas plus de 5MB)
    if ($_FILES["bl_pdf"]["size"] > 5000000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["bl_pdf"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO clients (name, phone, commercial, city, bl_pdf) VALUES ('$name', '$phone', '$commercial', '$city', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "Client et bon de livraison ajoutés avec succès";
            } else {
                echo "Erreur: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Désolé, une erreur est survenue lors du téléchargement de votre fichier.";
        }
    }
}

$conn->close();
?>
