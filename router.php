<?php
use App\controller\ClienteController as cliente_ctrl;
$req='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arr=explode("/",$req);
$lastParam = end($arr);
$id=null;
if(is_numeric($lastParam)){
    $id = $lastParam;
}


switch($req){
    case BASE_URL.'/':
        include_once(VIEW_PATH.'pages/home.php');
        break;
    case BASE_URL."/add":
        include_once(VIEW_PATH.'pages/add_cliente.php');
        break;
    case BASE_URL."/edit/".$id:
        include_once(VIEW_PATH.'pages/edit_cliente.php');
    break;

    case BASE_URL."/delete/".$id:
        $controller = new cliente_ctrl();
        $return = $controller->delete($id);
        return $return;
    break;
    default:
        include_once('404.php');

}
?>