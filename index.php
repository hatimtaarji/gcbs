<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Clients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="h.jpg" alt="Logo de votre entreprise" class="logo">
        <h1>Gestion de Clients</h1>
        <form id="clientForm" method="POST" action="add_client.php" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Nom" required>
            <input type="text" name="phone" placeholder="Téléphone" required>
            <input type="text" name="commercial" placeholder="Commercial" required>
            <input type="text" name="city" placeholder="Ville">
            <input type="file" name="bl_pdf" accept="application/pdf" required>
            <button type="submit">Ajouter Client</button>
        </form>
        <input type="text" id="searchBar" placeholder="Rechercher des clients...">
        <div id="searchResults"></div>
    </div>
    <script src="script.js"></script>
</body>
</html>
