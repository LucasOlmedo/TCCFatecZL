<?php
/**
 * Created by PhpStorm.
 * User: LucasOlmedo
 * Date: 20/04/2016
 * Time: 10:53
 */


$this->title = Yii::t('app', 'Situaçao do professor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professor'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="/js/funcConvertData.js"></script>
<div class="sit-prof-form">
    <div class="form-group">
        <h2>Situação do professor #<?= $id_professor ?></h2>

        <form method='post' id='form' action="index.php?r=professor/altera-situacao">
            <div id="array-exc"></div>
            <div id="array-sit"></div>
            <input type="hidden" name="id_professor" value="<?= $id_professor; ?>" />
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
            <input value="<?php echo date('Y').'-'. date('m') .'-'. date('d'); ?>" type="date" class="form-control" id="input_data-ini">
            <br>
            <button class="btn btn-default" type="button" id="btn-add-sit"><span
                    class="glyphicon glyphicon-plus"></span> Atrelar Situação
            </button>
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
                <?php
                $i = 0;
                foreach ($situacao as $row):
                    $i++;
                    $dataFormt = explode('-', $row['data_sit']);
                    $dataFinal = $dataFormt[2].'/'.$dataFormt[1].'/'.$dataFormt[0];
                    echo "<tr id='linha-" . $row['id_Situacao'] . "'>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $dataFinal . "</td>";
                    echo "<td><a href='#' onclick='excluir_sit(" .$row['id_Situacao']. ",".$i.")'><span class='glyphicon glyphicon-trash'></span></a></td>";
                    echo "</tr>";
                endforeach;
                ?>
                </tbody>
            </table>
            <br>
            <button class="btn btn-primary" type="submit" id="btnSalvarArray"><span
                    class="glyphicon glyphicon-ok"></span> Salvar alterações
            </button>
        </form>
    </div>
</div>


<script src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery-1.9.0.js" type="text/javascript"></script>
<script>
    var situacao = new Array();
    var count = 0;
    $("#btn-add-sit").click(function () {
        var idSit = parseInt($("#select_sit").val());
        var nomeSit = $("#select_sit").find("option:selected").text();
        var dataRef = $("#input_data-ini").val();

        var conteudo = {
            id: idSit,
            nome: nomeSit,
            dataRef: dataRef
        };
        situacao.push(conteudo);

        $("#array-sit").append("<input type='hidden' name='situacao[" + idSit + "]' id='txt-" +
            idSit + "' value='" + dataRef + "' />");

        var html = "<tr id='linha-" + idSit + "'>";
        html += "<td>" + situacao[count].nome + "</td>";
        html += "<td>" + converterData(situacao[count].dataRef) + "</td>";
        html += "<td>";
        html += "<a href='#'>";
        html += "<span class='glyphicon glyphicon-trash' onclick='excluir_sit(" +idSit+","+document.getElementsByTagName('tr').length+")'></span>";
        html += "</a>";
        html += "</td>";
        html += "</tr>";
        html += "";
        $("#table-sit").append(html);
        $("#input_data-ini").val("<?php echo date('Y').'-'. date('m') .'-'. date('d'); ?>");
        count++;
    });

    function excluir_sit(id,linha) {
        if (confirm("Deseja realmente excluir?")) {
            $("#array-exc").append("<input type='hidden' name='excluir[" + id + "]' value='" + id + "' id='exc-" + id + "' />");
            $("tr")[linha].remove();
        }
    }

    $("#btnSalvarArray").click(function () {
        $("#form").submit();
    });
</script>