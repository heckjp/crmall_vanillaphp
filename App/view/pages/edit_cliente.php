<?php
use App\controller\ClienteController as cliente_ctrl;
$controller = new cliente_ctrl();
$breadcrumbs = 'Home > Editar > '.$id;
$cliente = $controller->get($id);
if($cliente->data_nascimento){
$cliente->data_nascimento = date('d/m/Y',strtotime($cliente->data_nascimento));
}

?>
<div class="breadcrumb">
	<span class="text-left"><?php echo $breadcrumbs; ?></span>
	<span class="text-right"><a href="<?php echo BASE_URL."/";?>">Voltar</a>
</div>
<div class="form col-12">
    <form method="POST" action="" id="form">
    <div class="row">
        <div class="form-group col-12 col-md-9">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $cliente->nome;?>" class="form-control" required />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="sexo">Sexo</label>
            <input type="text" name="sexo" id="sexo" value="<?php echo $cliente->sexo;?>"  class="form-control" required />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label for="data_nascimento">Data_nascimento</label>
            <input type="text" name="data_nascimento" id="data_nascimento"  value="<?php echo $cliente->data_nascimento;?>"  class="form-control" required />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" value="<?php echo $cliente->cep;?>"  minlength="8" maxlength="9"  class="form-control" />
        </div>
        <div class="col-12 col-md-3 text-center">
            <button  type="button" class="btn btn-primary m-auto p-auto" onclick="buscaCep(document.getElementById('cep').value)">Buscar CEP </button>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-9">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" value="<?php echo $cliente->endereco;?>"  class="form-control" />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="numero">numero</label>
            <input type="text" name="numero"  pattern="[0-9]+" id="numero" value="<?php echo $cliente->numero;?>"  class="form-control" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label for="complemento">Complemento</label>
            <input type="text" name="complemento" id="complemento" value="<?php echo $cliente->complemento;?>"  class="form-control" />
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" value="<?php echo $cliente->bairro;?>"  class="form-control"  />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-9">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" value="<?php echo $cliente->cidade;?>"  class="form-control" />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" minlength="2" maxlength="2" value="<?php echo $cliente->estado;?>"  class="form-control" />
        </div>
    </div>
    <div class="text-center">
    <button type="submit" class=" btn btn-primary">Cadastrar</button>
    </div>
    </form>
</div>
<div class="row mt-3">
<?php
if($_POST){
$return =$controller->save($id);
echo $return;
}
?>
</div>