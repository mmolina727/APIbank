<?php
require_once 'app/models/modelClient.php';
require_once 'app/views/apiView.php';

class ClientApiController{

    private $model;
    private $view;
    private $data;

    function __construct(){

        $this->model= new ModelClient();
        $this->view= new ApiView();
        $this->data= file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    function getClients($params= null){
        if(isset($_GET['page'])){
            if(is_numeric($_GET['page'])){
                $quantity= 5;
                $since= ($_GET['page']-1)*$quantity;
                $clients= $this->model->getByPage($since,$quantity);
                $this->view->response($clients);
                die;
            }
            else{
                $this->view->response("Variable is not a number",404);
                die;
            }
        }
        if(isset($_GET['sort'])){
            if(($_GET['sort']=='saldo')||($_GET['sort']=='id_cliente')||($_GET['sort']=='num_cuenta')||($_GET['sort']=='fecha_nacimiento')||($_GET['sort']=='ultimo_movimiento')||($_GET['sort']=='dni')||($_GET['sort']=='direccion')){
                $clients=$this->model->getAllByColumn($_GET['sort']);
                $this->view->response($clients);
                die;
            }
            else{
                $this->view->response("Error. Verify fields",404);
                die;
            }
        }
        if(isset($_GET['serch'])){
            $clients=$this->model->getAllByFilter($_GET['serch']);
            $this->view->response($clients);
            if($clients==[]){
                $this->view->response("Zero results",200);
            }
        }
        else{
            $clients= $this->model->getAll();
            $this->view->response($clients);
        }
    }

    function getClient($params= null){
        $id= $params[':ID']; 

        $client= $this->model->getClient($id);
        if($client){
            $this->view->response($client);
        }
        else{
            $this->view->response("Client not found",404);
        }
    }

    function addClient($params= null){
        $client= $this->getData();

        if(empty($client->nombre_apellido||$client->dni||$client->direccion||$client->fecha_nacimiento||$client->saldo||$client->ultimo_movimiento||$client->num_cuenta||$client->id_cuenta)){
            $this->view->response("Error. Verify fields",400);
        }
        else{
            $id= $this->model->addClient($client->nombre_apellido,$client->dni,$client->direccion,$client->fecha_nacimiento,$client->saldo,$client->ultimo_movimiento,$client->num_cuenta,$client->id_cuenta);
            $client= $this->model->getClient($id);
            $this->view->response("Client added",201);
        }
    }

}