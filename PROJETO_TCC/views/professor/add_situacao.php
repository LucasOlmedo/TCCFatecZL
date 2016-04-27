<?php
/**
 * Created by PhpStorm.
 * User: LucasOlmedo
 * Date: 20/04/2016
 * Time: 10:53
 */


$this->title = Yii::t('app', 'Finalizar cadastro de professor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professor'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sit-prof-form">
    <div class="form-group">
        <h2>Situação do professor</h2>
        <label for="select_sit">Situação </label>
        <select class="form-control" id="select_sit">
            <?php
            foreach ($model_sit as $data):
                echo "<option value='" . $data->id_Situacao . "'>" . $data->nome . "</option>";
            endforeach;
            ?>
        </select>
        <br>
        <label for="input_data-ini">Data início da situação</label>
        <input type="date" class="form-control" id="input_data-ini">
        <br>
        <button class="btn btn-success" type="submit" id="btn-add-sit">+ Atrelar Situação</button>
        <br>
        <br>
        <br>
        <table class="table table-bordered table-hover table-striped" id="table-sit">
            <thead>
            <th>Situaçao</th>
            <th>Data referente</th>
            <th>Opções</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br>
        <button class="btn btn-success" type="submit" id="btnSalvarArray">Salvar</button>
    </div>
</div>


<script src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery-1.9.0.js" type="text/javascript"></script>
<script>
    var situacao = new Array();
    var count = 0;
    $("#btn-add-sit").click(function () {
        var idSit = parseInt($("#select_sit").val());
        var nomeSit = $("#select_sit").find("option:selected").text();
        var dataRef = $("#input_qtdeaulas").val();

        var conteudo = {
            id: idSit,
            nome: nomeSit,
            dataRef: dataRef
        };
        situacao.push(conteudo);

        var html = "<tr>";
        html +=         "<td>" + situacao[count].nome + "</td>";
        html +=         "<td>" + situacao[count].dataRef + "</td>";
        html +=         "<td>";
        html +=             "<a href='#'>";
        html +=                 "<span class='glyphicon glyphicon-trash'></span>";
        html +=             "</a>";
        html +=         "</td>";
        html +=    "</tr>";
        html += "";
        $("#table-sit").append(html);
        $("#input_data-ini").val("");
        count++;
    });
    $("#btnSalvarArray").click(function () {
        console.log("teste");
    });
</script>