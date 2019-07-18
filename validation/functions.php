<?php

require_once('../config.php');
require_once(DBAPI);

$codigo = null;
$codigos = null;
$funcionariof = null;
$funcionarioff = null;
$responsavel = null;

/**
* Buscar a relacao funcionario x equipamento
*/
function findLine($id_eqp = null){
    global $codigos;
    $codigos = find_rel($id_eqp);
}

function findLineF($id_fun = null){
    global $funcionariof;
    $funcionariof = find_rel($id_fun);
}

/**
 * Busca o funcionario responsavel pelo equipamento
 */
function findFuncc($id_eqp = null){
    global $responsavel;
    $responsavel = listFunc($id_eqp);
}

/**
* Registra a data e hora da saída de um equipamento
*/
function registerExit($id_eqp){
    register($id_eqp);
}