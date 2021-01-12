<?php
class Platillo
{
    private $platillo;
    private $dbh;
 
    public function __construct()
    {
        $this->platillo = array();
        $this->dbh = new PDO('mysql:host=localhost;dbname=scarpapos', "scarpapos", "1c999b218");
    }
 
    private function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
 
    public function lista_platillos()
    {
        self::set_names();
        $sql="select nombre, precio from chef where disponible = 1";
        foreach ($this->dbh->query($sql) as $res)
        {
            $this->platillo[]=$res;
        }
        return $this->platillo;
        $this->dbh=null;
    }
}
?>