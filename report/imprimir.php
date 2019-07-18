<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
    <?php
    require_once ('functions.php');
    createTable($_GET['periodo']);
    ?>

    <?php
        date_default_timezone_set('America/Manaus');
        $dataPlan = '';
        $dataPlan .= '<table border = "1">';
        $dataPlan .= '<tr>';
        $dataPlan .= '<td colspan="8" align="center">Relatório de Saída de Equipamentos</td>';
        $dataPlan .= '<td colspan="3" align="center">Emitido em: ' . date("d/m/Y \à\s H:i:s") . '</td>';
        $dataPlan .= '</tr>';


        $dataPlan .= '<tr>';

        $dataPlan .= '<td align="center">Nome Completo</td>';
        $dataPlan .= '<td align="center">Empresa</td>';
        $dataPlan .= '<td align="center">Função</td>';
        $dataPlan .= '<td align="center">Setor</td>';
        $dataPlan .= '<td align="center">Telefone</td>';

        $dataPlan .= '<td align="center">Equipamento</td>';
        $dataPlan .= '<td align="center">Serial</td>';
        $dataPlan .= '<td align="center">Fabricante</td>';
        $dataPlan .= '<td align="center">Modelo</td>';

        $dataPlan .= '<td align="center">Dia</td>';
        $dataPlan .= '<td align="center">Hora</td>';

        $dataPlan .= '</tr>';

        foreach($linhas as $linha):
            $dataPlan .= '<tr>';
            $dataPlan .= '<td align="center">'.$linha['nome']." ".$linha['sobrenome'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['empresa'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['funcao'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['setor'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['telefone'].'</td>';

            $dataPlan .= '<td align="center">'.$linha['nome_eqp'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['serial_eqp'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['fabricante'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['modelo'].'</td>';

            $dataPlan .= '<td align="center">'.$linha['dia'].'</td>';
            $dataPlan .= '<td align="center">'.$linha['hora'].'</td>';
            $dataPlan .= '</tr>';
        endforeach;

        $dataPlan .= '</table>';

        if($_GET['periodo'] == "mensal") {
            $arquivo = 'Relatorio_Mes' . date("m/Y") . '.xls';
        }
        else if($_GET['periodo'] == "semanal") {
            $arquivo = 'Relatorio_Semana'. date("W") . '.xls';
        }
        else{
            $arquivo = 'Relatorio_Dia'. date("d/m") . '.xls';
        }


        header('Content-Type: application/x-msexcel');
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-Disposition: attachment;filename=\"{$arquivo}\"");
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        echo $dataPlan;
        exit;
    ?>
</html>
