<?php

class ModelClient{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_banco;charset=utf8', 'root', '');
    }

    function getAll(){
        $sentencia = $this->db->prepare( "SELECT * from cliente ORDER BY nombre_apellido");
        $sentencia->execute();
        $clients= $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $clients; 
    }

    function getClient($id){
        $sentencia= $this->db->prepare('SELECT * from cliente where id_cliente= ?');
        $sentencia->execute([$id]);
        $client= $sentencia->fetch(PDO::FETCH_ASSOC);
        return $client;
    }

    function addClient($nombre_apellido, $dni, $direccion, $fecha_nacimiento, $saldo, $ultimo_movimiento, $num_cuenta, $id_cuenta){
        $sentencia = $this->db->prepare('INSERT INTO cliente(nombre_apellido, dni, direccion, fecha_nacimiento, saldo, ultimo_movimiento, num_cuenta, id_cuenta) VALUES(?,?,?,?,?,?,?,?)');
        $sentencia->execute([$nombre_apellido, $dni, $direccion, $fecha_nacimiento, $saldo, $ultimo_movimiento, $num_cuenta, $id_cuenta]);
    }

    function getByPage($since,$quantity){
        $sentencia = $this->db->prepare("SELECT * from cliente LIMIT $since,$quantity");
        $sentencia->execute([]);
        $clients= $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $clients;
    }

    function getAllByColumn($column){
        $sentencia = $this->db->prepare("SELECT * from cliente ORDER BY ".$column);
        $sentencia->execute([]);
        $clients= $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $clients;
    }

    function getAllByFilter($serch){
        $sentencia = $this->db->prepare("SELECT * from cliente WHERE nombre_apellido= ?");
        $sentencia->execute([$serch]);
        $clients= $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $clients;
    }

    function delete($id){
        $sentencia = $this->db->prepare('DELETE FROM cliente WHERE id_cliente = ?');
        $sentencia-> execute([$id]);
    }
    
    function updateClient($nombre_apellido, $dni, $direccion, $fecha_nacimiento,$saldo,$ultimo_movimiento, $num_cuenta,$id_cliente){
        $sentencia = $this->db->prepare("UPDATE  cliente SET nombre_apellido = ? , dni= ? , direccion= ? , fecha_nacimiento = ? ,saldo=?,ultimo_movimiento=?, num_cuenta = ? WHERE id_cliente = ?;");
        $sentencia->execute([$nombre_apellido, $dni, $direccion, $fecha_nacimiento,$saldo,$ultimo_movimiento, $num_cuenta, $id_cliente]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}    