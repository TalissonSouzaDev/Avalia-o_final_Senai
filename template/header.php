<?php
ob_start();
session_start();
require_once('./connect.php');
// require_once('./models/Message.php');
require_once('./models/UserModel.php');
require_once('./models/AgendaModel.php');
$agenda = new AgendaModel($conn);


// $message = new Message();
// $flashmessage = $message->GetMessage();
// if(!empty($flashmessage['msg']))
// {
//     $message->ClearMessage();
// }

$userdao =  new UserModel($conn);
$userdata = $userdao->verifyToken(false);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Agenda Telefonica</title>
</head>
<body>
<?php if($userdata): ?>
<header>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Cadastrar</a>
        </li>
      </ul>
      <div class="d-flex">
        <h1 class="text-white"><?= $_SESSION['token']?></h1>
        
      </div>
    </div>
  </div>
</nav>

</header>
<?php endif; ?>

<main>
<?php if (!empty($flashmessage['msg'])) : ?>


<div class="alert <?php echo $flashmessage['type'];  ?> alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert">
    </button>

    <span class="text-dark">
    <?php echo @$flashmessage['msg']; ?>
    </span>
 
</div>
<?php endif; ?>



