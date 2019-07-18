<?php
require_once('../config.php');
require_once(DBAPI);

$linhas = null;
$linha = null;

function createTable($periodo){
    global $linhas;
    if($periodo=="diario"){
        $linhas = createReportDay();
    }
    if($periodo=="mensal") {
        $linhas = createReportMo();
    }
    if($periodo=="semanal") {
        $linhas = createReportWeek();
    }
}

