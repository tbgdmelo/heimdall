<?php

require_once('../config.php');
require_once(DBAPI);

$relacoes = null;
$relacao = null;

/**
 *  Listagem das Permissoes
 */
function index() {
	global $relacoes;
	$relacoes = listPermission();
}
