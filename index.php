<?php

if (isset($_POST['pmr'])){

$pmr = ($_POST['pmr'] == "") ? 0 : $_POST['pmr'];
$pmp = ($_POST['pmp'] == "") ? 0 : $_POST['pmp'];
$pme = ($_POST['pme'] == "") ? 0 : $_POST['pme'];
$qtdvenda = ($_POST['qtdvenda'] == "") ? 0 : $_POST['qtdvenda'];
$pvenda = ($_POST['pvenda'] == "") ? 0 : $_POST['pvenda'];
$inadimplencia = ($_POST['inadimplencia'] == "") ? 0 : $_POST['inadimplencia'];
$gasto = ($_POST['gasto'] == "") ? 0 : $_POST['gasto'];
$juros = ($_POST['juros'] == "") ? 0 : $_POST['juros'];
$vestimada = ($_POST['vestimada'] == "") ? 0 : $_POST['vestimada'];
$inadimplenciae = ($_POST['inadimplenciae'] == "") ? 0 : $_POST['inadimplenciae'];
$pmre = ($_POST['pmre'] == "") ? 0 : $_POST['pmre'];
$estoque = isset($_POST['estoque']) && $_POST['estoque'] !== "" ? $_POST['estoque'] : 0;


$totalvenda = ($qtdvenda * $pvenda);
$totalvendae = ($vestimada * $pvenda);
$pmrvalor = (($totalvenda/360) * $pmr);
$pmrvalore = (($totalvendae/360) * $pmre);
$totalpagamento = ($estoque * $gasto);
$pmpvalor = (($totalpagamento/360) * $pmp);
$vlrestoque = ($estoque * $gasto);
$co = ($pme + $pmr);
$cccdias = ($pme + $pmr - $pmp);
$pmevalor = (($vlrestoque/360) * $pme);
$cccvalor = ($pmevalor + $pmrvalor - $pmpvalor);
$cccvalornovo = ($pmevalor + $pmrvalore - $pmpvalor);
$margemcontr = ($pvenda - $gasto);
$varqtd = ($vestimada - $qtdvenda);
$al = ($varqtd * $margemcontr);
$investimentoa = (($qtdvenda * $gasto)/ (360/$pmr));
$investimentop = (($vestimada * $gasto)/ (360/$pmre));
$necinvestimento = ($investimentop - $investimentoa);
$cimdr = ($necinvestimento * ($juros/100));
$perdaatual = ($qtdvenda * $pvenda * ($inadimplencia/100));
$perdaproposta = ($vestimada * $pvenda * ($inadimplenciae/100));
$cpm = ($perdaproposta - $perdaatual);
$am = ($al - $cimdr - $cpm);
$jurosccc = (($cccvalornovo - $cccvalor) * ($juros/100));

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Capital de Giro</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card" style="width: 100%">
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="nome">Capital de Giro</label>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="materia">Prazo de Recebimento</label>
                        <input type="text" name="pmr" id="matepmrria" class="form-control" >
                    </div>

                    <div class="col-4">
                        <label for="altura">Prazo de Pagamento</label>
                        <input type="number" name="pmp" id="pmp" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Prazo de Estoque</label>
                        <input type="number" name="pme" id="pme" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Estoque</label>
                        <input type="number" name="estoque" id="estoque" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Quantidade de Venda</label>
                        <input type="number" name="qtdvenda" id="qtdvenda" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Preço de Venda</label>
                        <input type="number" name="pvenda" id="pvenda" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Inadimplencia</label>
                        <input type="number" name="inadimplencia" id="inadimplencia" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Gasto Produto</label>
                        <input type="number" name="gasto" id="gasto" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Taxa de Juros</label>
                        <input type="number" name="juros" id="juros" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Venda Estimada</label>
                        <input type="number" name="vestimada" id="vestimada" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Inadimplencia Estimada</label>
                        <input type="number" name="inadimplenciae" id="inadimplenciae" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="altura">Prazo de Recebimento Estimado</label>
                        <input type="number" name="pmre" id="pmre" class="form-control" >
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-danger mt-5">CALCULAR</button>
        </form>

        <?php
        if(isset($co)){
            ?>
        </div>
        <div class="alert alert-primary mt-5" role="alert">
            
            O Ciclo operacional é de: <?= $co ?> dias <br>

            O Ciclo de Conversão de caixa em dias é de:  <?= $cccdias ?> dias <br>

            O Prazo medio de recebimento em valor é de:  <?= number_format($pmrvalor, 2, ',', '.') ?> Reais <br>

            O Prazo medio de Pagamento em valor é de:  <?= number_format($pmpvalor, 2, ',', '.') ?> Reais <br>

            O Prazo medio de estoque em valor é de:  <?= number_format($pmevalor, 2, ',', '.') ?> Reais <br>

            O Ciclo de Conversão de caixa em Valor é de:  <?= number_format($cccvalor, 2, ',', '.') ?> Reais <br>

            O Novo Ciclo de Conversão de caixa em Valor é de:  <?= number_format($cccvalornovo, 2, ',', '.') ?> Reais <br>

            O novo Prazo medio de recebimento em valor é de:  <?= number_format($pmrvalore, 2, ',', '.') ?> Reais <br>

            O juros resultante da alteração do prazo de recebimento é de:  <?= number_format($jurosccc, 2, ',', '.') ?> Reais <br>

            O Adicional de Lucro é: <?= number_format($al, 2, ',', '.') ?> <br>

            O Custo de investimento Marginal em duplicatas a receber é de: <?= number_format($cimdr, 2, ',', '.') ?> <br>

            O Custo de perdas Marginal é de: <?= number_format($cpm, 2, ',', '.') ?> <br>

            A analise Marginal é de: <?= number_format($am, 2, ',', '.') ?> <br>

            Portanto, <?php if ($am < 0 ){
                echo('Não é um bom projeto.');
            }else {
                echo('É um bom projeto.');
            } ?>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>