<?php
ob_start();
@session_start();
//include('Message.php');
class AgendaModel implements IAgenda
{
    public $conn, $message;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
       // $this->message =  new Messagem();
    }


    public function ListAll($user_id)
    {
        $query = $this->conn->prepare("SELECT * FROM agendas WHERE user_id = :user_id");
        $query->bindParam(':user_id',$user_id);
        $query->execute();
        if($query->rowCount() > 0)
        {
            return $query->fetchAll();
        }
        return [];
        
    }
    public function GetId(int $id){
        $query = $this->conn->prepare("SELECT * FROM agendas WHERE id = :id");
        $query->bindParam(':id',$id);
        $query->execute();
        if($query->rowCount() > 0)
        {
            return $query->fetch();
        }
        return [];
        
    }
    public function create(array $data){

        try
        {
            $sql = "INSERT INTO agendas (name,email,telefone,site,description,user_id) VALUES (:name,:email,:telefone,:site,:description,:user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name",$data['name']);
        $stmt->bindParam(":email",$data['email']);
        $stmt->bindParam(":telefone",$data['telefone']);
        $stmt->bindParam(":site",$data['site']);
        $stmt->bindParam(":description",$data['description']);
        $stmt->bindParam(":user_id",$data['user_id']);
        $stmt->execute();
        //$this->message->SetMessage("Cadastro com sucesso","success");
        }
        catch(Exception $e)
        {
            //$this->message->SetMessage("error","danger");
        }
        
    }
    public function update(array $data){
        
    }
    public function delete(array $data){
        
    }
}




interface IAgenda
{
    public function ListAll($user_id);
    public function GetId(int $id);
    public function create(array $data);
    public function update(array $data);
    public function delete(array $data);

}
 
?>