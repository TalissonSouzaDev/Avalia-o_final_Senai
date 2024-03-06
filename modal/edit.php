
  <!-- The Modal -->
  <div class="modal" id="editModal<?= $agendass['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $editagenda =  $agenda->GetId($agendass['id']);?>

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Atualizar contato <?= $editagenda['name']?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

   <form action="process.php" method="post">
   <input type="hidden" name="type" value="agenda_update">
   <input type="hidden" name="id" value="<?= $editagenda['id']?>">
       <!-- Modal body -->
       <div class="modal-body">

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="" class="form-control" value="<?= $editagenda['name']?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="" class="form-control" value="<?= $editagenda['email']?>">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="" class="form-control" value="<?= $editagenda['telefone']?>">
        </div>

        <div class="form-group">
            <label for="site">Site</label>
            <input type="url" name="site" id="" class="form-control" value="<?= $editagenda['site']?>">
        </div>

        <div class="form-group">
            <label for="description">Observação</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"><?= $editagenda['description']?></textarea>
        </div>

        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">Atualizar</button>
      </div>
   </form>

    </div>
  </div>
</div>