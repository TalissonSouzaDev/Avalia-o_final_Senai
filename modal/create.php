



  <!-- The Modal -->
<div class="modal" id="createModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Adiconar um contato</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

   <form action="process.php" method="post">
    <input type="hidden" name="type" value="agenda_create">
    <input type="hidden" name="user_id" value="<?= $userdata['id'] ?>">
       <!-- Modal body -->
       <div class="modal-body">

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="site">Site</label>
            <input type="url" name="site" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Observação</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Cadastrar</button>
      </div>
   </form>

    </div>
  </div>
</div>