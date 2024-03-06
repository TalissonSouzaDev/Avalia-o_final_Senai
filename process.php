<?php
include("./connect.php");
//include('./models/UserModel.php');
include('./models/AgendaModel.php');
//$user = new UserModel($conn);
$agenda = new AgendaModel($conn);
$type = filter_input(INPUT_POST, "type");

switch ($type) {
    case "login":
        
        $login = filter_input(INPUT_POST, "login");
        $password = filter_input(INPUT_POST, "password");
        $user->Autenticate($login,$password);
        break;
    case "register":
        $login = filter_input(INPUT_POST, "login");
        $password = filter_input(INPUT_POST, "Password");
        $name = filter_input(INPUT_POST, "name");
        $user->register($name,$login,$password);

        break;
    case "agenda_create":
     $data = [
        'name'=>filter_input(INPUT_POST, "name"),
        'email'=>filter_input(INPUT_POST, "email"),
        'telefone'=>filter_input(INPUT_POST, "telefone"),
        'site'=>filter_input(INPUT_POST, "site"),
        'description'=>filter_input(INPUT_POST, "description"),
        'user_id'=>filter_input(INPUT_POST, "user_id")
        
     ];
     $agenda->create($data);

        break;
    case "agenda_update":
        $data = [
            'name'=>filter_input(INPUT_POST, "name"),
            'email'=>filter_input(INPUT_POST, "email"),
            'telefone'=>filter_input(INPUT_POST, "telefone"),
            'site'=>filter_input(INPUT_POST, "site"),
            'description'=>filter_input(INPUT_POST, "description"),
            
         ];
        break;
}
