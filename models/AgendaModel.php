<?php
ob_start();
@session_start();
require_once('Message.php');
class AgendaModel implements IAgenda
{
    protected  $conn, $message;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->message = new Message();
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
        $this->message->SetMessage("criado com sucesso","success");
        }
        catch(Exception $e)
        {
            $this->message->SetMessage("error","danger");
        }
        
    }
    public function update(array $data){

        try{
            $sql = "UPDATE agendas SET name= :name,email= :email, telefone= :telefone, site= :site,description= :description WHERE id= :id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name",$data['name']);
            $stmt->bindParam(":email",$data['email']);
            $stmt->bindParam(":telefone",$data['telefone']);
            $stmt->bindParam(":site",$data['site']);
            $stmt->bindParam(":description",$data['description']);
            $stmt->bindParam(":id",$data['id']);
            $stmt->execute();
            $this->message->SetMessage("atualizado com sucesso","success");
        }
        catch(Exception $e)
        {
            $this->message->SetMessage("error","danger");
        }
        
    }
    public function delete(int $id)
    {

        try
        { 
            $agendaid = $this->GetId($id);
            $stmt = $this->conn->prepare("DELETE FROM agendas WHERE id = :id ");
            $stmt->bindParam(":id",$agendaid['id']);
            $stmt->execute();
            $this->message->SetMessage("deletado com sucesso","success");
        }
       
        catch(Exception $e)
        {
            $this->message->SetMessage("error","danger");
        }
        
      
    }
}




interface IAgenda
{
    public function ListAll($user_id);
    public function GetId(int $id);
    public function create(array $data);
    public function update(array $data);
    public function delete(int $id);

}
 
?>