<?php
 include("template/header.php");  
 if($userdata != [])
{
    $userdao->verifyToken(false);

 }
 else{
    $userdao->verifyToken(true);
 }
 ?>
<div class="container">
  <h2>Agenda Telefônica <i class="fa-solid fa-tty"></i></h2>
  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fa-solid fa-plus"></i></a>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
      </tr>
    </thead>
    <tbody>
      <?php
    
      $agendas = $agenda->ListAll($userdata["id"]);

      foreach($agendas as $agendass):
      
      ?>
      <tr>
        <td><?=$agendass['name']?></td>
        <td><?=$agendass['email']?></td>
        <td><?=$agendass['telefone']?></td>
        <td>
            <?php $id = 1; ?>
            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?=$agendass['id']?>"><i class="fa-solid fa-pencil"></i></a>
            <?php include("modal/edit.php");  ?>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$agendass['id']?>"><i class="fa-solid fa-xmark"></i></a>
            <?php include("modal/delete.php");  ?>
            
        </td>
      </tr>
    </tbody>
    <?php endforeach; ?>
  </table>
</div>
<?php include("modal/create.php");  ?>
<?php include("template/footer.php");  ?>