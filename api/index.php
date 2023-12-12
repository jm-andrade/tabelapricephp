<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Table</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php include 'price.php'; ?>

    <div id="table-containter" class="containter">
        <h3>Tabela Price</h3>
        <table id="price-table">
            <tr>
                <th>Mês</th>
                <th>Prestação</th>
                <th>Juros</th>
                <th>Amortização</th>
                <th>Saldo Devedor</th>
            </tr>
            
            <!-- Construída dinamicamente -->

            <?php
                foreach ($price_table_data as $row) {
                    echo '<tr>';
                    foreach ($row as $data) {
                        echo "<td>$data</td>";
                    }
                    echo '</tr>';
            }
            ?>
            
        </table>
    </div>
    <div id="details-container">
        <h3>Dados Reais</h3>
        <ul>
        <?php
            $entrada = $existe_entrada ? 'Sim' : 'Não';
            $cf = calculateFinancingCoefficient($TAX, $NP);
            $cf_rouded = round($cf);
            $prest = round($PV*$cf);
            $tx_real = calculateInterestRate($NP,$PV,$PP,$existe_entrada) * 100;

                
    
            echo '<li id="li-parc">Parcelas: {$NP} </li>
            <li id="li-taxa">Taxa de juros: {$TAX}%</li>
            <li id="li-vf">Valor Financiado:  {$PV}</li>
            <li id="li-vv">Valor a voltar: {$PP}</li>
            <li id="li-mv">Meses a voltar:{$PB} </li>
            <li id="li-entrada">Entrada(?) : {$entrada}</li>
            <br>
            <li id="li-cf">Coeficiente de Financiamento: {$cf_rouded}</li>
            <li id="li-prest">Prestação: {$prest}</li>
            <li id="li-tr">Taxa real: {$tx_real}</li>
            <li id="li-vc">Valor corrigido: $ 0,00</li>';
            ?>
        </ul>
    </div>
   
  </body>
</html>