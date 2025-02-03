<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des comptes</title>
    <style>
        /* Applique un style sticky au header */
        header {
            position: sticky;
            top: 0;
            background-color: #333;
            color: white;
            padding: 10px 0;
            z-index: 1000;
            width: 100%;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        main {
            padding-top: 60px;
            padding-bottom: 60px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="myAccount.php">Mon compte</a></li>
                <li><a href="deco.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>