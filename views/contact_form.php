<?php include 'views/header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact</title>
    <style>
        /* Style général de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style du message d'erreur */
        .error-message {
            max-width: 500px;
            height: 50px;
            margin: 0 auto 15px auto;
            padding: 10px;
            background-color: #e74c3c;
            color: white;
            text-align: center;
            border-radius: 5px;
        }

        /* Style du formulaire */
        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 15px;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #3498db;
            outline: none;
        }

        /* Bouton Ajouter */
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Lien Retour */
        a.button-back {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 12px;
            background-color: #95a5a6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        a.button-back:hover {
            background-color: #7f8c8d;
        }

        /* Centrer le lien sous le formulaire */
        .link-container {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php if (!empty($message)): ?>
        <div class="error-message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form action="index.php?action=add" method="POST">
        <h1>Ajouter un contact</h1>
        <label>Nom :
            <input type="text" name="nom" required>
        </label>
        <label>Prénom :
            <input type="text" name="prenom" required>
        </label>
        <label>Email :
            <input type="email" name="email" required>
        </label>
        <label>Téléphone :
            <input type="text" name="telephone">
        </label>
        <button type="submit">Ajouter</button>
    </form>

    <div class="link-container">
        <a href="index.php" class="button-back">← Retour à la liste</a>
    </div>
</body>
</html>
<?php include 'views/footer.php'; ?>
