<?php include 'views/header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        main {
             display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .button-container {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a.button:hover {
            background: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e1f0ff;
        }

      td.actions {
    display: flex;          
    gap: 5px;               
}

td.actions a {
    flex: none;             
    padding: 6px 12px;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    font-size: 14px;
}


        td.actions a.edit {
            background-color: #f39c12;
        }

        td.actions a.edit:hover {
            background-color: #e67e22;
        }

        td.actions a.delete {
            background-color: #e74c3c;
        }

        td.actions a.delete:hover {
            background-color: #c0392b;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #777;
        }
    
    </style>
</head>
<body>
<main>
    <h1>Liste des contacts</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($contacts)): ?>
                <?php foreach ($contacts as $c): ?>
                    <tr>
                        <td><?= $c->getId() ?></td>
                        <td><?= $c->getNom() ?></td>
                        <td><?= $c->getPrenom() ?></td>
                        <td><?= $c->getEmail() ?></td>
                        <td><?= $c->getTelephone() ?></td>
                        <td class="actions">
                            <a href="index.php?action=edit&id=<?= $c->getId() ?>" class="edit">✏ Modifier</a>
                            <a href="index.php?action=delete&id=<?= $c->getId() ?>" class="delete" onclick="return confirm('Supprimer ce contact ?')">🗑 Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="no-data">Aucun contact trouvé</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="button-container">
        <a href="index.php?action=add" class="button">➕ Ajouter un contact</a>
    </div>
</main>

</body>
</html>

<?php include 'views/footer.php'; ?>
