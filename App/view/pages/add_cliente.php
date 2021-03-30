<?php
use App\controller\ClienteController as cliente_ctrl;
$controller = new cliente_ctrl();
$breadcrumbs = 'Home > Cadastrar';
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
            <input type="text" name="nome" id="nome" class="form-control" required />
        </div>
        <div class="col-12 col-md-3">
        <label for="sexo" class="mr-3">Sexo</label>
       <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="m">
  <label class="form-check-label" for="sexo">Masculino</label>
</div>
<div class="form-check form-check-inline">

  <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="f">
  <label class="form-check-label" for="inlineRadio2">Feminino</label>
</div>
</div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label for="data_nascimento">Data_nascimento</label>
            <input type="text" name="data_nascimento"  id="data_nascimento"  class="form-control" required />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep"  class="form-control" />
        </div>
        <div class="col-12 col-md-3 text-center">
            <button  type="button" class="btn btn-primary m-auto p-auto" onclick="buscaCep(document.getElementById('cep').value)">Buscar CEP </button>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-9">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco"  class="form-control" />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="numero">numero</label>
            <input type="number" name="numero" id="numero"  class="form-control" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label for="complemento">Complemento</label>
            <input type="text" name="complemento" id="complemento"  class="form-control" />
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro"  class="form-control"  />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-9">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade"  class="form-control" />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" minlength="2" maxlength="2"  class="form-control" />
        </div>
    </div>
    <div class="text-center">
    <button type="submit" class=" btn btn-primary" onclick="validaForm()">Cadastrar</button>
    </div>
    </form>
</div>
<div class="row mt-3">
<?php
if($_POST){
$return =$controller->save();
echo $return;
}

function buscaCep($cep){
 if(isset($cep)){
    $return = $controller->buscaCep($cep);
    return $return;
 }
}
?>
</div>