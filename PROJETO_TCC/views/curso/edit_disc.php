<?php
/**
 * Created by PhpStorm.
 * User: LucasOlmedo
 * Date: 20/04/2016
 * Time: 10:53
 */

$this->title = Yii::t('app', 'Alterar disciplina');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="curso-disciplina-form">
    <div class="form-group">
        <h2>Alterar disciplinas do curso #<?= $id_curso ?></h2>

        <form method='post' id='form' action="index.php?r=curso/altera-disciplinas">

            <label for="select_disc">Disciplina </label>

            <div id="array-disc"></div>
            <div id="array-exc"></div>

            <input type="hidden" name="id_curso" value="<?= $id_curso ?>"/>

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
            <button class="btn btn-success" type="button" id="btn-add-disc"><span class="glyphicon glyphicon-plus"></span> Adicionar disciplina</button>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-hover table-striped" id="table-disc">
                <thead>
                <th>Disciplina</th>
                <th>Quantidade de aulas</th>
                <th>Opções</th>
                </thead>
                <tbody>
                <?php
                foreach ($disciplinas as $row):
                    echo "<tr id='linha-" . $row['id_Disciplina'] . "'>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['qtde_aulas'] . "</td>";
                    echo "<td><a href='#' onclick='excluir(". $row['id_Disciplina'] . ")'><span class='glyphicon glyphicon-trash'></span></a></td>";
                    echo "</tr>";
                endforeach;
                ?>
                </tbody>
            </table>
            <br>
            <button class="btn btn-primary" type="submit" id="btnSalvarArray"><span class="glyphicon glyphicon-ok"></span> Salvar alteração</button>
        </form>
    </div>
</div>


<script src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery-1.9.0.js" type="text/javascript"></script>
<script>
    var disciplinas = new Array();
    var count = 0;
    $("#btn-add-disc").click(function () {
        var idDisc = parseInt($("#select_disc").val());
        var titulo = $("#select_disc").find("option:selected").text();
        var quantidade = $("#input_qtdeaulas").val();


        var conteudo = {
            id_disc: idDisc,
            titulo: titulo,
            quantidade: quantidade
        };
        disciplinas.push(conteudo);


        $("#array-disc").append("<input type='hidden' name='disciplinas[" + idDisc + "]' id='txt-" +
            idDisc + "' value='" + quantidade + "' />");

        var html = "<tr id='linha-" + idDisc + "'>";
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
            $("#array-exc").append("<input type='hidden' name='excluir[" + id + "]' value='" + id + "' id='exc-" + id + "' />");
            $("#txt-" + id).fadeOut(0);
            $("#txt-" + id).remove();
            $("#linha-" + id).fadeOut(0);
            $("#linha-" + id).remove();
        }
    }
</script>