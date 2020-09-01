<?php
$users = new Users($db);

// REGISTER USER

if (isset($_POST['register_user'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $firstname = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $student_number = filter_var($_POST['student_number'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $user_level = filter_var($_POST['user_level'], FILTER_SANITIZE_NUMBER_INT);
    

    // NAME VALIDATION
    if (empty($name)) {
        $users->set_errors('Entrez votre nom');
    }

    // FIRSTNAME VALIDATION
    if (empty($firstname)) {
        $users->set_errors('Entrez votre prénom');
    }

    // EMAIL VALIDATION
    if (empty($email)) {
        $users->set_errors('Entrez votre email');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $users->set_errors('Votre address email est pas valide');
    }

    // PASSWORD VALIDATION
    if (empty($password)) {
        $users->set_errors('Entrez un mot de passe');
    }
    if (strlen($password) < 6) {
        $users->set_errors('Votre mot de passe doit comporter un minimum de 6 caractères');
    }
    if ($password !== $password_confirmation) {
        $users->set_errors('Les mots de passe doivent correspondre');
    }

    if (empty($password_confirmation)) {
        $users->set_errors('Veuillez confirmer votre mot de passe');
    }

    // PHONE VALIDATION
    if (empty($phone)) {
        $users->set_errors('Veuillez entrer un numéro de téléphone');
    }

    

    //USER LEVEL
   
    if ((!filter_var($user_level, FILTER_VALIDATE_INT)) && ($user_level !== 1 || $user_level !== 2)) {
        $users->set_errors('Role de l\'utilisateur non valide');
    }

    if (empty($users->get_errors())) {
        $users
            ->set_name($name)
            ->set_firstname($firstname)
            ->set_email($email)
            ->set_phone($phone)
            ->set_student_number($student_number)
            ->set_password($password)
            ->set_user_level($user_level);
        $result =  $users->registerUser();

        if ($result == 0) {
            $users->set_errors('email ou numero etudiant déja utilisé');
        } else {
            header("location: $correctSlug");
        }

        // var_dump($result);
    }
}

//LOGIN USER

if (isset($_POST['login'])) {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // EMAIL VALIDATION
    if (empty($email)) {
        $users->set_errors('Entrez votre email');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $users->set_errors('Votre address email est pas valide');
    }

    // PASSWORD VALIDATION

    if (empty($password)) {
        $users->set_errors('Entrez un mot de passe');
    }
    
    if (empty($users->get_errors())) {
        $users
        ->set_email($email)
        ->set_password($password)
        ->logUser();
    }
}

// UPDATE USER

if (isset($_POST['update'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $student_number = filter_var($_POST['student_number'], FILTER_SANITIZE_STRING);
    $user_level = filter_var($_POST['user_level'], FILTER_SANITIZE_NUMBER_INT); 

    // NAME VALIDATION
    if (empty($name)) {
        $users->set_errors('Entrez votre nom');
    }

    // FIRSTNAME VALIDATION
    if (empty($firstname)) {
        $users->set_errors('Entrez votre prénom');
    }

    // EMAIL VALIDATION
    if (empty($email)) {
        $users->set_errors('Entrez votre email');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $users->set_errors('Votre address email est pas valide');
    }

    // PHONE VALIDATION
    if (empty($phone)) {
        $users->set_errors('Veuillez entrer un numéro de téléphone');
    }

    //USER LEVEL
   
    if ((!filter_var($user_level, FILTER_VALIDATE_INT)) && ($user_level !== 1 || $user_level !== 2)) {
        $users->set_errors('Role de l\'utilisateur non valide');
    }


    if (empty($users->get_errors())) {
        $users
            ->set_id($_SESSION['user_id'])
            ->set_name($name)
            ->set_firstname($firstname)
            ->set_email($email)
            ->set_phone($phone)
            ->set_student_number($student_number)
            ->set_user_level($user_level);
        $result = $users->updateUser();

        if ($result == 1) {
            $users->set_errors('Changement réussi');
        } 
    }
}

if (isset($_POST['updatePassword'])) {
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    
    // PASSWORD VALIDATION
    if (empty($password)) {
        $users->set_errors('Entrez un mot de passe');
    }
    if (strlen($password) < 6) {
        $users->set_errors('Votre mot de passe doit comporter un minimum de 6 caractères');
    }

    if ($password !== $password_confirmation) {
        $users->set_errors('Les mots de passe doivent correspondre');
    }

    if (empty($password_confirmation)) {
        $users->set_errors('Veuillez confirmer votre mot de passe');
    }

    if (empty($users->get_errors())) {
        $users
            ->set_id($_SESSION['user_id'])
            ->set_password($password);
        $result =  $users->updateUserPassword();
    
        if ($result == 0) {
            $users->set_errors('Modification non prise en compte');
        } else {
            $users->set_errors('Changement du mot de passe réussi');
        }
    }
}
