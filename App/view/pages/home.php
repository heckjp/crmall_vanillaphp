<?php 
use App\controller\ClienteController as cliente_ctrl;
$controller = new cliente_ctrl();
$clientes =$controller->getAll();
$breadcrumbs = "Home";
?>
<div id="crambs">
		<span><?php echo $breadcrumbs; ?></span>
	</div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary float-right" onclick="window.location.href='<?php echo BASE_URL.'/add';?>'">Cadastrar</button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 col-sm-12 table-responsive">
            <table class="table table-bordered table-striped">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
                <th>CEP</th>
                <th>Endereço</th>
                <th>Numero</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Action</th>
            </tr>
        <?php 
        if (is_object($clientes) && (count(get_object_vars($clientes)) != 0)){
            foreach($clientes as $cliente){
                echo "<tr>
                <td>{$cliente['id']}</td>
                <td>{$cliente['nome']}</td>
                <td>{$cliente['data_nascimento']}</td>
                <td>{$cliente['sexo']}</td>
                <td>{$cliente['cep']}</td>
                <td>{$cliente['endereco']}</td>
                <td>{$cliente['numero']}</td>
                <td>{$cliente['complemento']}</td>
                <td>{$cliente['bairro']}</td>
                <td>{$cliente['cidade']}</td>
                <td>{$cliente['estado']}</td>
                <td><a href=\"".BASE_URL."/edit/".$cliente['id']."\">editar</a>
                <a href=\"".BASE_URL."/delete/".$cliente['id']."\">excluir</a>
                </tr>";
            }
        } else {
            echo "<tr><td colspan=\"12\" class=\"text-center\">Nenhum registro encontrado</td></tr>";
        }
        ?>
        </table>
    </div>
</div>

