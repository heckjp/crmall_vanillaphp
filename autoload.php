<?php
// carregamento automático das classes na aplicação
spl_autoload_register(function($className) {
	include_once(BASE_PATH. $className . '.php');
});