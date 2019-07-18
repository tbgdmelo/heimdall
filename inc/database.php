<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}


/** 
===================================================================================
                        FUNÇÕES PARA OS FUNCIONARIOS                                
===================================================================================
**/


/**
 *  Pesquisa um Registro do funcionario pelo cod
 */
function find( $table = null, $cod = null ) {
  
	$database = open_database();
	$found = null;

	try {
	  if ($cod) {
	    $sql = "SELECT * FROM " . $table . " WHERE cod = " . $cod;
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }
	    
	  } else {
	    
	    $sql = "SELECT * FROM " . $table;
	    $result = $database->query($sql);
	    
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
        
        /* Metodo alternativo
        $found = array();

        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
	    }
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

//Procurar todos os registro de uma tabela
function find_all( $table ) {	  
	return find($table);	
}

/**
*  Insere um registro no BD
*/
function save($table = null, $data = null) {

  $database = open_database();

  $columns = null;
  $values = null;

  //print_r($data);

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }

  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');
  
  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}

/**
 *  Atualiza um registro em uma tabela, por cod
 */
function update($table = null, $cod = 0, $data = null) {

  $database = open_database();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE cod=" . $cod . ";";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) { 

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}

/**
 *  Remove uma linha de uma tabela pelo cod do registro
 */
function remove( $table = null, $cod = null ) {

  $database = open_database();
	
  try {
    if ($cod) {

      $sql = "DELETE FROM " . $table . " WHERE cod = " . $cod;
      $result = $database->query($sql);

      if ($result = $database->query($sql)) {   	
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 

    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
}

/** 
===================================================================================
                        FUNÇÕES PARA OS EQUIPAMENTOS                                
===================================================================================
**/

/**
 *  Pesquisa um Registro do equipamento por id
 */
function find_eqp( $table = null, $id = null ) {
  
  $database = open_database();
  $found = null;

  try {
    if ($id) {
      $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
      
    } else {
      
      $sql = "SELECT * FROM " . $table;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  
  close_database($database);
  return $found;
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update_eqp($table = null, $id = 0, $data = null) {

  $database = open_database();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) { 

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove_eqp( $table = null, $id = null ) {

  $database = open_database();
  
  try {
    if ($id) {

      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);

      if ($result = $database->query($sql)) {     
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 

    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
}

/** 
===================================================================================
                        FUNÇÕES PARA AS PERMISSOES                                
===================================================================================
**/

function addPermission($id = null, $cod = null){
  $database = open_database();
  $sql = "INSERT INTO relacao (id_eqp, id_fun) VALUES (" . $id . "," . $cod .")";
  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}
/**
Lista informações dos funcionários e equipamentos de cada um
**/

function listPermission(){
  $database = open_database();
  $found = null;
  try {
    $sql ="
      SELECT funcionarios.nome AS func_nome, funcionarios.sobrenome AS func_sobnm, funcionarios.empresa AS func_emp, equipamentos.nome_eqp AS eqp_nome, equipamentos.serial_eqp AS eqp_serial, equipamentos.fabricante AS eqp_fab
      FROM equipamentos INNER JOIN funcionarios INNER JOIN relacao
      WHERE relacao.id_eqp = equipamentos.id AND relacao.id_fun = funcionarios.cod";

      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
      }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
  return $found;
}

/**
* BUSCA A LINHA NA TABELA QUE CONTEM A RELACAO DE FUNCIONARIO COM EQUIPAMENTOS QUE PODE SAIR
*/

function find_rel( $id_eqp = null) {
  
  $database = open_database();
  $found = null;

  //RESOLVER PROBLEMA DE BUSCA POR CAMPO SERIAL VAZIO

  try {
    if ($id_eqp) {
      $sql = "SELECT * FROM relacao WHERE id_eqp = " . $id_eqp;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
      else{
          header('location:../validation/index.php');
      }
    }
    else{ //CASO SEJA VAZIO, RETORNA TODOS OS REGISTROS DA TABELA - UTILIZADO APENAS PARA BUSCAR O ID DO FUNCIONARIO
        $sql = "SELECT * FROM relacao";
        $result = $database->query($sql);
        $found = $result->fetch_assoc();
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  
  close_database($database);
  return $found;
}

//REGISTRA A DATA E HORA DE SAÍDA DO EQUIPAMENTO
function register($id_eqp = null){
    $database = open_database();

    try{
        if($id_eqp){
            $sql2 = "SELECT * FROM relacao WHERE id_eqp = " . $id_eqp;
            $result = $database->query($sql2);
            if($result->num_rows > 0){   //VERIFICA SE EXISTE ALGUEM REPONSAVEL PELO EQUIPAMENTO

                $sql = "INSERT INTO saidas (id) VALUES(" . $id_eqp . ")" ;
                $result = $database->query($sql);
            }
            else{
                header('location:../validation/index.php');
            }
        }
        else{
            header('location:../validation/index.php');
        }
    }
    catch(Exception $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
}

/**
 * Busca dados do funcionario atraves do ID do equipamento
 */
function listFunc($id_fun = null){
    $database = open_database();
    try{
        if($id_fun){
            $sql = "SELECT * FROM funcionarios JOIN relacao WHERE relacao.id_eqp = {$id_fun} AND relacao.id_fun = funcionarios.cod";
            $result = $database->query($sql);
            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }
        }
    }
    catch (Exception $e){
        header('location:../validation/index.php'); //Falta Criar página de erro
    }
    return $found;
}

//Query com as informações de todas as saídas de equipamentos
function createReportDay(){
    $database = open_database();
    try {
         //Gera um relatório diário
             $sql = "SELECT *
                     FROM (SELECT DATE_FORMAT(data_saida, '%Y/%m/%d') AS dia,
                                   TIME_FORMAT(data_saida, '%H:%i:%s') AS hora,
                                   nome,
                                   sobrenome,
                                   empresa,
                                   setor,
                                   funcao,
                                   telefone,
                                   
                                   nome_eqp,
                                   serial_eqp,
                                   fabricante,
                                   modelo
                                   
                     FROM	
                         (SELECT id_eqp, id_fun, data_saida
                          FROM saidas JOIN relacao
                          WHERE saidas.id = relacao.id_eqp) AS saidajoinrelacao
                            
                          JOIN
                            
                          (SELECT *
                           FROM funcionarios JOIN equipamentos) AS funcionariosjoinequipamentos
                                
                           WHERE funcionariosjoinequipamentos.id = saidajoinrelacao.id_eqp) AS finalTable
                     WHERE finalTable.dia = CURRENT_DATE()";

              $result = $database->query($sql);
             if ($result->num_rows > 0) {
                    $found = $result->fetch_all(MYSQLI_ASSOC);
             }
    }
    catch (Exception $e){
        header('location:../validation/index.php'); //Criar página de erro
    }
    return $found;
}

//Query com as informações de todas as saídas de equipamentos MENSAL
function createReportMo(){
    $database = open_database();
    try {

            //Gera um relatório Mensal
                $sql = "SELECT *
                        FROM (SELECT DATE_FORMAT(data_saida, '%Y/%m/%d') AS dia,
                                   TIME_FORMAT(data_saida, '%H:%i:%s') AS hora,
                                   nome,
                                   sobrenome,
                                   empresa,
                                   setor,
                                   funcao,
                                   telefone,
                                   
                                   nome_eqp,
                                   serial_eqp,
                                   fabricante,
                                   modelo
                                   
                            FROM	
                            (SELECT id_eqp, id_fun, data_saida
                            FROM saidas JOIN relacao
                            WHERE saidas.id = relacao.id_eqp) AS saidajoinrelacao
                            
                            JOIN
                            
                            (SELECT *
                            FROM funcionarios JOIN equipamentos) AS funcionariosjoinequipamentos
                                
                        WHERE funcionariosjoinequipamentos.id = saidajoinrelacao.id_eqp) AS finalTable
                 WHERE DATE_FORMAT(finalTable.dia, '%m') = DATE_FORMAT(CURRENT_DATE(),'%m')";
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    catch (Exception $e){
        header('location:../validation/index.php'); //Criar página de erro
    }
    return $found;
}

//Query com as informações de todas as saídas de equipamentos SEMANAL
function createReportWeek(){
    $database = open_database();
    try {

        //Gera um relatório Semanal
        $sql = "SELECT *
                        FROM (SELECT DATE_FORMAT(data_saida, '%Y/%m/%d') AS dia,
                                   TIME_FORMAT(data_saida, '%H:%i:%s') AS hora,
                                   nome,
                                   sobrenome,
                                   empresa,
                                   setor,
                                   funcao,
                                   telefone,
                                   
                                   nome_eqp,
                                   serial_eqp,
                                   fabricante,
                                   modelo
                                   
                            FROM	
                                (SELECT id_eqp, id_fun, data_saida
                                FROM saidas JOIN relacao
                                WHERE saidas.id = relacao.id_eqp) AS saidajoinrelacao
                            
                                JOIN
                            
                                (SELECT *
                                FROM funcionarios JOIN equipamentos) AS funcionariosjoinequipamentos
                                
                            WHERE funcionariosjoinequipamentos.id = saidajoinrelacao.id_eqp) AS finalTable
                        WHERE WEEKOFYEAR(finalTable.dia) = WEEKOFYEAR(CURRENT_DATE())";
        $result = $database->query($sql);
        if ($result->num_rows > 0) {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    catch (Exception $e){
        header('location:../validation/index.php'); //Criar página de erro
    }
    return $found;
}