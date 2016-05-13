<?php
/**
 * Created by PhpStorm.
 * User: LucasOlmedo
 * Date: 20/04/2016
 * Time: 10:53
 */

$this->title = Yii::t('app', 'Incluir disciplina');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="curso-disciplina-form">
    <div class="form-group">
        <h2>Incluir disciplinas</h2>

        <form method='post' id='form' action="index.php?r=curso/grava-disciplinas">

            <label for="input_ano">Ano letivo</label>
            <input type="text" class="form-control" id="input_ano" name="ano" value="<?php $ano?>">
            <br>

            <label for="select_per">Período do curso</label>
            <select class="form-control" id="select_per" name="periodo">
                <?php
                foreach ($model_per as $data):
                    echo "<option value='" . $data->id_Periodo . "'>" . $data->nome_periodo . "</option>";
                endforeach;
                ?>
            </select>
            <br>

            <div id="array-disc"></div>
            <div id="array-per"></div>

            <input type="hidden" name="id_curso" value="<?= $id_curso ?>"/>

            <label for="select_disc">Disciplina </label>
            <select class="form-control" id="select_disc">
                <?php
                foreach ($model_disc as $data):
                    echo "<option value='" . $data->id_Disciplina . "'>" . $data->nome . "</option>";
                endforeach;
                ?>
            </select>

            <div id="div-curso"></div>

            <br>
            <label for="input_qtdeaulas">Quantidade de aulas</label>
            <input type="text" class="form-control" id="input_qtdeaulas">
            <br>
            <button class="btn btn-default" type="button" id="btn-add-disc"><span
                    class="glyphicon glyphicon-plus"></span> Adicionar disciplina
            </button>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-hover table-striped" id="table-disc">
                <thead>
                <th>Ano Letivo</th>
                <th>Período</th>
                <th>Disciplina</th>
                <th>Quantidade de aulas</th>
                <th>Opções</th>
                </thead>
                <tbody>

                </tbody>
            </table>
            <br>
            <button class="btn btn-primary" type="submit" id="btnSalvarArray"><span
                    class="glyphicon glyphicon-ok"></span> Salvar
            </button>
        </form>
    </div>
</div>


<script src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery-1.9.0.js" type="text/javascript"></script>
<script>
    var disciplinas = [];
    var count = 0;
    $("#btn-add-disc").click(function () {
//        var idPer = parseInt(($("#select_per").val());
        var periodo = $("#select_per").find("option:selected").text();
        var idDisc = parseInt($("#select_disc").val());
        var titulo = $("#select_disc").find("option:selected").text();
        var quantidade = $("#input_qtdeaulas").val();
        var ano = $("#input_ano").val();


        var conteudo = {
            ano_letivo: ano,
//            id_per: idPer,
            per: periodo,
            id_disc: idDisc,
            titulo: titulo,
            quantidade: quantidade
        };
        disciplinas.push(conteudo);


        $("#array-disc").append("<input type='hidden' name='disciplinas[" + idDisc + "]' id='txt-" +
            idDisc + "' value='"+ quantidade + "' />");

//        $("#array-per").append("<input type='hidden' name='periodo[" + idPer + "]' id='txt-" +
//            idPer + "' value='" + periodo + "' />");

        var
        html = "<tr id='linha-" + idDisc + "'>";
        html += "<td>" + ano + "</td>";
        html += "<td>" + periodo + "</td>";
        html += "<td>" + disciplinas[count].titulo + "</td>";
        html += "<td>" + disciplinas[count].quantidade + "</td>";
        html += "<td>";
        html += "<a href='#'>";
        html += "<span class='glyphicon glyphicon-trash' onclick='excluir(" + idDisc + ")'></span>";
        html += "</a>";
        html += "</td>";
        html += "</tr>";
        html += "";
        $("#table-disc").append(html);
        $("#input_qtdeaulas").val("");
        count++;
    });
    $("#btnSalvarArray").click(function () {
        $("#form").submit();
    });

    function excluir(id) {
        if (confirm("Deseja realmente excluir?")) {
            $("#txt-" + id).fadeOut(0);
            $("#txt-" + id).remove();
            $("#linha-" + id).fadeOut(0);
            $("#linha-" + id).remove();
        }
    }
</script>