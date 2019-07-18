<?php

require_once('../config.php');
require_once(DBAPI);

$funcionarios = null;
$funcionario = null;


/**
 *  Visualização de um Funcionario
 */
function viewf($cod = null) {
    global $funcionario;
    $funcionario = find('funcionarios', $cod);
}
