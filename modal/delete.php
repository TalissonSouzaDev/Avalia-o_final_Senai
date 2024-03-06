
  <!-- The Modal -->
  <div class="modal" id="deleteModal<?= $agendass['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Deseja excluir</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

   <form action="" method="post">
       <!-- Modal body -->
       <div class="modal-body">

     <ul>
      <?php $getagenda =  $agenda->GetId($agendass['id']);?>
        <li>Nome: <?= $getagenda['name']?></li>
        <li>E-mail: <?= $getagenda['email']?></li>
        <li>Telefone: <?= $getagenda['telefone']?></li>
        <li>Site: <a href="<?= $getagenda['site']?>" target="_blank" ><?= $getagenda['site']?></a></li>
        <li>Observação: <?= $getagenda['description']?></li>
     </ul>

        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Excluir</button>
      </div>
   </form>

    </div>
  </div>
</div>