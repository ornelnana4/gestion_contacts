<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= isset($contact) ? 'Modifier' : 'Ajouter' ?> un contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background: white;
            padding: 20px;
            max-width: 400px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            border-radius: 6px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #3498db;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button-back {
    display: inline-block;
    margin-top: 15px;
    padding: 8px 12px;
    background: #95a5a6;  /* gris clair */
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.3s;
}

.button-back:hover {
    background: #7f8c8d;  /* gris plus foncé au survol */
}

        button:hover {
            background: #2980b9;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: #555;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1><?= isset($contact) ? 'Modifier' : 'Ajouter' ?> un contact</h1>
    <form action="index.php?action=<?= isset($contact) ? 'edit&id='.$contact->getId() : 'add' ?>" method="POST">
        <label>Nom : <input type="text" name="nom" value="<?= $contact->getNom() ?? '' ?>" required></label>
        <label>Prénom : <input type="text" name="prenom" value="<?= $contact->getPrenom() ?? '' ?>" required></label>
        <label>Email : <input type="email" name="email" value="<?= $contact->getEmail() ?? '' ?>"></label>
        <label>Téléphone : <input type="text" name="telephone" value="<?= $contact->getTelephone() ?? '' ?>"></label>
        <button type="submit"><?= isset($contact) ? 'Enregistrer' : 'Ajouter' ?></button>
    </form>
<a href="index.php" class="button-back">← Retour à la liste</a>
</body>
</html>
