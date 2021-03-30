<?php
namespace App\controller;

use App\model\ClienteModel as Cliente;


class ClienteController{
    private $cliente;
    private $msg;
    private $data;

    public function __construct(){
        //instancia o model de Produtos
        $this->cliente = new Cliente();
        // pega os dados enviados por post na chamada da classe
        $this->data = $_POST;
    }

    //função que consutla todos os registros
    public function getAll(){
        $products = $this->cliente->getClientes();
        return (object) $products;
    }

    //função que faz a consulta de um produto pelo id
    public function get($id){
        $cliente = $this->cliente->getCliente($id);
        return (object) $cliente;
    }

    //função que grava produtos no banco de dados
    public function save($id=NULL){
        //varre o array de dados e remove valores nulos para gravação no banco
        foreach($this->data as $key=>$value){
            if(empty($value)){
                unset($this->data[$key]);
            }
        }
        //converte a data de nascimento para o padrão aceito no banco
        if (array_key_exists('data_nascimento',$this->data)){
           $this->data['data_nascimento'] = date('Y-m-d',strtotime(str_replace("/","-",$this->data['data_nascimento'])));
        }
        //remove pontos e traço do cep para armazenar no banco de dados
        if (array_key_exists('cep',$this->data)){
            $this->data['cep'] = trim(str_replace(".","",$this->data['cep']));
            $this->data['cep'] = trim(str_replace("-","",$this->data['cep']));
         }
    
        if(empty($id)){
             //caso não seja passado um id faz o cadastro de um novo registro
            $ret = $this->cliente->insertCliente($this->data);
            //configura a mensagem baseada no retorno do model
            $ret ? $this->msg='Cliente cadastrado com sucesso' : $this->msg='Erro ao cadastrar cliente';
        } else{
            //caso o id seja passado faz a atualização do registro com o id correspondente
            $ret = $this->cliente->updateCliente($this->data,$id);
            //configura a mensagem baseada no retorno do model
            $ret ? $this->msg='Cliente editado com sucesso' : $this->msg='Erro ao editar cliente';
        }
        //retorna a mensagem
        return $this->msg;
    }

    public function delete($id){
        $ret = $this->cliente->deleteCliente($id);
        //configura a mensagem baseada no retorno do model
        $ret ? $this->msg='Cliente excluído sucesso' : $this->msg='Erro ao excluir cliente';
    }


}

