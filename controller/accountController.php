<?php
include './model/account.php';


/*
*@method Créer un nouveau compte utilisateur
*@param PDO $bdd
*@return string
*/
function signUp(PDO $bdd):string{
    //Vérifier qu'on reçoit le formulaire
    if(isset($_POST['submitSignUp'])){
        //Vérifier les champs vide
        if(empty($_POST['lastname']) || empty($_POST['firstname']) || empty($_POST['email']) || empty($_POST['password'])){
            //Retourne le message d'erreur
            return "Veuillez remplir les champs !";
        }

        //Vérifier le format des données : ici l'email
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //Retourne le message d'erreur
            return "Email pas au bon format !";
        }

        //Nettoyer les données
        $lastname = sanitize($_POST['lastname']);
        $firstname = sanitize($_POST['firstname']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        //Hasher le mot de passe
        $password = password_hash($password, PASSWORD_BCRYPT);

        //Vérifier que l'utilisateur n'existe pas déjà en bdd
        if(!empty(getAccountByEmail($bdd, $email))){
            //Retourne le message d'erreur
            return "Cet email existe déjà !";
        }

        //J'enregistre mon utilisateur en bdd
        $account = [$firstname, $lastname, $email, $password];
        addAccount($bdd, $account);
    
        return "$firstname $lastname a été enregistré avec succès !";
    }
    return '';
}

function displayAccounts(PDO $bdd){
    //Récupération de la liste des utilisateurs
    $data = getAllAccount($bdd);

    $listUsers = "";
    foreach($data as $account){
        $listUsers = $listUsers."<li><h2>".$account['firstname'] ." ". $account['lastname']."</h2>      <p>".$account['email']."</p></li>";
    }
    return $listUsers;
}

function renderAccounts(PDO $bdd){
    $message = signUp($bdd);
    $messagelogin = login($bdd);
    $listUsers = displayAccounts($bdd);
    include "./vue/account.php";
}


function login(PDO $bdd): string {
    if (isset($_POST['submitlogin'])) {
        // Vérifier que les champs email et password existent et ne sont pas vides
        if (!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])) {
            return "Veuillez remplir tous les champs.";
        }

        // Vérifier le format de l'email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return "Email pas au bon format.";
        }

        // Nettoyer les données
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        // Récupérer l'utilisateur par email
        $user = getAccountByEmail($bdd, $email);
        // Vérifier que l'utilisateur existe
        if ($user === false) {
            return "Cet utilisateur n'existe pas.";
        }

        // Vérifier que le mot de passe haché existe dans la base de données avant de le comparer
        if (!isset($user['password']) || empty($user['password'])) {
            return "Erreur : impossible de vérifier le mot de passe.";
        }

        // Vérifier le mot de passe avec password_verify
        if (!password_verify($password, $user['password'])) {
            return "Mot de passe incorrect.";
        }

        // Démarrer une session et stocker les données utilisateur
        session_start();
        $_SESSION['user'] = $user;

        return "Connexion réussie. Bienvenue " . $user['firstname'] . " " . $user['lastname'];
    }
    return '';
}


/*
*@method Me connecter
*@param PDO $bdd
*@return string
*/
