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
        <label for="select_disc">Disciplina </label>
        <select class="form-control" id="select_disc">
            <?php
            foreach ($model_disc as $data):
                echo "<option value='" . $data->id_Disciplina . "'>" . $data->nome . "</option>";
            endforeach;
            ?>
        </select>
        <br>
        <label for="input_qtdeaulas">Quantidade de aulas</label>
        <input type="text" class="form-control" id="input_qtdeaulas">
        <br>
        <button class="btn btn-success" type="submit" id="btn-add-disc">+ Adicionar disciplina</button>
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

            </tbody>
        </table>
        <br>
        <button class="btn btn-success" type="submit" id="btnSalvarArray">Salvar</button>
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
            id: idDisc,
            titulo: titulo,
            quantidade: quantidade
        };
        disciplinas.push(conteudo);

        var html = "<tr>";
        html +=         "<td>" + disciplinas[count].titulo + "</td>";
        html +=         "<td>" + disciplinas[count].quantidade + "</td>";
        html +=         "<td>";
        html +=             "<a href='#'>";
        html +=                 "<span class='glyphicon glyphicon-trash'></span>";
        html +=             "</a>";
        html +=         "</td>";
        html +=    "</tr>";
        html += "";
        $("#table-disc").append(html);
        $("#input_qtdeaulas").val("");
        count++;
    });
    $("#btnSalvarArray").click(function () {
        console.log("teste");
    });
</script>