<?php
namespace App\model;

class ClienteModel {
    private $db;
    private $table;

    public function __construct(){
        // instancia a classe do banco de dados
        $this->db=new Database();
        $this->table = 'clientes';
    }
    //consulta todos os clientes
    public function getClientes(){
        $clientes =$this->db->getAll($this->table);
        return $clientes;
    }
    //consutla os dados de um cliente para um determinado id
    public function getCliente($id){
        //seta condição de filtro para buscar pelo id (chave primária)
        $where = "id=$id";
        $cliente =$this->db->get($this->table,$where);
        return $cliente;
    }
    //adiciona novo cliente
    public function insertCliente($data){
        // chama a função de inserção do banco
        $ret = $this->db->insert($this->table,$data);
        return $ret;
    }
    //atualiza dados de um cliente
    public function updateCliente($data,$id){
        //passa condição de atualização do banco
        $where = "id=$id";
        //chama a função de edição do model
        $ret = $this->db->update($this->table,$data,$where);
        return $ret;
    }

    public function deleteCliente($id){
        $where = "id=$id";
        //chama a função de exclusão do model
        $ret = $this->db->delete($this->table,$where);
        return $ret;
    }
    
}
