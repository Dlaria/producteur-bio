<?php
   

class DB{
 
    private $host='localhost';
    private $username = 'root';
    private $password ='';
    private $database = 'prodbio';
    private $db;

    public function __construct($host=null, $username= null, $password=null, $database=null){
        //cela me permet si jai une nouvelle base de donnée d'insrer les valeurs directement sans reprendre la connection
        if ($host !=null) {
            $this->host=$host;
            $this->username=$username;
            $this->password=$password;
            $this->database=$database;
        }

        try{

        $this->db=new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username , $this->password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
 
        }catch(PDOException $e){
            die('impossible de se connecter a la base de donnée');
        }

    }
    public function query($sql , $data = array()){
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}


class panier{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier']=array();
        }
    }
    public function add($produit_id){
        $_SESSION['panier'][$produit_id]= 1;
    }
 
}
?>