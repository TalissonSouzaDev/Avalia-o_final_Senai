<?php
ob_start();
session_start();
require_once('./connect.php');
require_once('./models/Message.php');
require_once('./models/UserModel.php');
require_once('./models/AgendaModel.php');
$agenda = new AgendaModel($conn);


 $message = new Message();
 $flashmessage = $message->GetMessage();
 if(!empty($flashmessage['msg']))
 {
     $message->ClearMessage();
 }

$userdao =  new UserModel($conn);
$userdata = $userdao->verifyToken(false);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Agenda Telefonica</title>
</head>
<body>
<?php if($userdata): ?>
<header>
<nav class="navbar navbar-expand-sm navbar-dark bg-person" style="background-color: #88bfc1;">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"><i class="fa-solid fa-tty"></i> Agenda telefônica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php"> <i class="fa-solid fa-house"></i> Home</a>
        </li>

         <!-- Dropdown -->
    <li class="nav-item dropdown" style="margin-left: 60em;">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <?= $userdata['name']?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="sair.php">Sair</a>
      </div>
    </li>
      </ul>
    </div>
  </div>
</nav>

</header>
<?php endif; ?>

<main>
<?php if (!empty($flashmessage['msg'])) : ?>


<div class="alert alert-ligth  ?> alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert">
    </button>

    <span class="text-dark">
    <?php echo @$flashmessage['msg']; ?>
    </span>
 
</div>
<?php endif; ?>



