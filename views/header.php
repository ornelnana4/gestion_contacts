<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Contacts</title>
    <style>
        /* Styles généraux */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
        }

        /* Header */
        header {
            background-color: #3498db;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 12px 20px;
            font-size: 14px;
        }

        /* Formulaire et table container */
        main {
            padding: 40px 20px 80px; /* bottom padding pour footer */
            display: flex;
            justify-content: center;
        }

        form, table {
            background-color: #fff;
            width: 100%;
            max-width: 450px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            color: #555;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #3498db;
            outline: none;
        }

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

        .link-container {
            text-align: center;
            margin-top: 15px;
        }

        .button-back {
            display: inline-block;
            padding: 8px 15px;
            background-color: #95a5a6;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .button-back:hover {
            background-color: #7f8c8d;
        }

        /* Table list style */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td.actions a {
            margin-right: 5px;
            padding: 4px 8px;
            border-radius: 3px;
            color: white;
            text-decoration: none;
        }

        td.actions a.edit {
            background: #f39c12;
        }

        td.actions a.delete {
            background: #e74c3c;
        }

        a.button {
            display: inline-block;
            margin-bottom: 10px;
            padding: 8px 12px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        a.button:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <header>
        Gestion de Contacts
    </header>
    <main>
