<?php

require_once 'models/Usuario.php';


class UsuarioDaoMysql implements UsuarioDAO{
    private $pdo;

    // injeção de depedencia
    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Usuario $u){

    } // creat
    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }

        return $array;
    } // Retorna uma lista com varios objetos da class obj
    public function findById($id){

    } // Estou procurando pelo ID
    public function update(Usuario $u){

    } //noosso update para manibular
    
    public function delete($id){

    } //Deleta por ID 

}
