<?php include("template/header.php"); 


if($userdata != [])
{
   header("location:index.php");

 }
?>


<div class="container-login">
    <div class="login-left">
    <img src="./img/Agenda_telefonica.png" alt="" srcset="">
    </div>

    <div class="login-right">
        <div class="container-login-left">
        <form action="process.php" method="post">
            <input type="hidden" name="type" value="login">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" placeholder="Digite seu login">
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Digite sua senha">
            </div>

            <div class="form-group">
                <button class="btn btn-info btn-lg">Acessar</button>
            </div>
        </form>

        <a href="register.php" class="btn btn-link">Registrar-se</a>
        </div>
        
    </div>
</div>
<?php include("template/footer.php");  ?>