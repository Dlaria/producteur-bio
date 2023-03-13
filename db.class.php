<?php
   

class DB{
 
    private $host='localhost';
    private $username = 'root';
    private $password ='root';
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

    private $DB;
    public function __construct($DB){
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier']=array();
        }
        $this->DB = $DB;

        
        if(isset($_POST['panier']['quantite'])){
            $this->recalc();
        }
    }

    
    public function recalc(){
        $_SESSION['panier'] = $_POST['panier']['quantite'];
    }

    public function count(){
        return array_sum($_SESSION['panier']);
    }
    public function total(){
        $total = 0;
        $ids=array_keys($_SESSION['panier']);
                    if(empty($ids)){
                        $produits = array();
                    }else{
                    $produits =$this->DB->query('SELECT id, Prix FROM produit WHERE  id IN('.implode(',',$ids).')');
                    }
        foreach( $produits as $produit){
            $total += $produit->Prix * $_SESSION['panier'][$produit->id];
        }
        if ($total<40){
            $total = $total + 4;
        }
        return $total;
    }
    public function add($produit_id){
        if(isset ($_SESSION['panier'][$produit_id])){
            $_SESSION['panier'][$produit_id]++;
        }else{
        $_SESSION['panier'][$produit_id]= 1;
    }
}
    public function del($produit_id){
        unset($_SESSION['panier'][$produit_id]);
    }
}
?>