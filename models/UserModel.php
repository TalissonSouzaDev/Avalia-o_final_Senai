<?php
ob_start();
@session_start();
include('Message.php');
class UserModel implements IUser
{

    public $conn, $message;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->message =  new Message();
    }
    public function Autenticate(string $login, string $password)
    {
        if ($login != "" && $password != "") {

           
            $user = $this->findByLogin($login);


            if ($user != []) {
                
                $password_verif =  password_verify($password, $user['password']);
                if ($password_verif) {
                    // retornando por front
                    $this->setTokenToSession($user['token']);
                } else {
                    // senha não conferir
                    $this->message->SetMessage("senha incorreta", "alert-info", "login.php");
                }
            } else {
                $this->message->SetMessage("login não cadastrado", "alert-info", "login.php");
            }
        } else {
            $user = [];
            return $user;
        }
    }
    public function register(string $name, string $login, string $password)
    {
        

        try {
            
            $token = $this->generateToken();
            $password_n =  $this->generatePassword($password);
            //$sql = "INSERT INTO users (name,login,password,token) VALUES (:name,:login:password,:token)";
            $stmt = $this->conn->prepare(
            "INSERT INTO users (name,login,password,token)
            VALUES (:name,:login,:password,:token)
           ");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":login", $login);
            $stmt->bindParam(":password", $password_n);
            $stmt->bindParam(":token", $token);
            $stmt->execute();

            $this->Autenticate($login,$password);
        } catch (Exception $e) {
           echo "error".$e;
        }
    }



    public function verifyToken($protected = false)
    {
        if(!empty($_SESSION['token']))
        {
            $token = $_SESSION['token'];
            $user = $this->findByToken($token);

            if($user)
            {
                return $user;
            }
            else if($protected)
            {
                header("location:login.php");
            }
          

        }
        else if($protected)
        {
            header("location:login.php");
        }

    }
    // gerador de token
    public function generateToken()
    {
        return bin2hex(random_bytes(50));
    }

    // gerador de senha
    public function generatePassword(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }



    public function setTokenToSession($token, $redirect = true)
    {
        $_SESSION['token'] = $token;

        if ($redirect) {
            $this->message->setMessage("Seja bem vindo", "alert-success", "index.php");
        }
    }



    public function findByLogin($login)
    {
        if ($login != "") {
            // preparando para consulta
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE login = :login");
            $stmt->bindParam(":login", $login);
            $stmt->execute();
            // fazendo contagem de linha caso seja maior que 1 é verdadeira
            if ($stmt->rowCount() > 0) {
                // chamando o objeto de array para data

                $user = $stmt->fetch();
                // retornando por front
                return $user;
            } else {
                $user = [];
                return $user;
            }
        } else {
            return false;
        }
    }


    public function findByToken($token)
    {
        if($token != "")
        {
            // preparando para consulta
          $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
          $stmt->bindParam(":token",$token);
          $stmt->execute();
          // fazendo contagem de linha caso seja maior que 1 é verdadeira
          if($stmt->rowCount() > 0)
          {
            // chamando o objeto de array para data
            $user = $stmt->fetch();
            // retornando por front
            return $user;

          }

          else {
            $user = [];
            return $user;
          }
    }

}

}




interface IUser
{
    public function Autenticate(string $login, string $password);
    public function register(string $name, string $login, string $password);
    public function verifyToken($protected = false);
    public function generateToken();
}
