<?php
/**
 * Created by PhpStorm.
 * User: LucasOlmedo
 * Date: 20/04/2016
 * Time: 10:53
 */
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Incluir dia da semana');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aula Semestral'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dia-semana-form">
    <div class="form-group">
        <h2>Incluir Dia da semana</h2>

        <form method='post' id='form' action="index.php?r=aulasemestral%2Fgrava-diasemana">

            <input type="hidden" name="grade_dia" id="grade_dia" />
            <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />


            <label for="select_dia">Selecione um dia da semana:</label>
            <select class="form-control" id="select_dia" name="diasemana">
                <option value="0" class="primeiro">Segunda</option>
                <option value="1">Terça</option>
                <option value="2">Quarta</option>
                <option value="3">Quinta</option>
                <option value="4">Sexta</option>
                <option value="5">Sábado</option>
            </select>
            <br>

            <input type="hidden" name="id_aulasemestral" value="<?= $id_aulasemestral ?>"/>

            <label for="input_hini">Horário Inicial</label>
            <select class="form-control" id="input_hini">
                <option value="07:30:00" class="primeiro">07:30:00</option>
                <option value="08:20:00">08:20:00</option>
                <option value="09:20:00">09:20:00</option>
                <option value="10:10:00">10:10:00</option>
                <option value="11:10:00">11:10:00</option>
                <option value="12:00:00">12:00:00</option>
                <option value="13:00:00">13:00:00</option>
                <option value="14:50:00">14:50:00</option>
                <option value="16:40:00">16:40:00</option>
                <option value="19:20:00">19:20:00</option>
                <option value="21:10:00">21:10:00</option>
            </select>
            <br>

            <label for="input_hfim">Horário Final</label>
            <select class="form-control" id="input_hfim">
                <option value="08:20:00" class="primeiro">08:20:00</option>
                <option value="09:10:00">09:10:00</option>
                <option value="10:10:00">10:10:00</option>
                <option value="11:00:00">11:00:00</option>
                <option value="12:00:00">12:00:00</option>
                <option value="12:50:00">12:50:00</option>
                <option value="14:40:00">14:40:00</option>
                <option value="16:30:00">16:30:00</option>
                <option value="18:20:00">18:20:00</option>
                <option value="21:00:00">21:00:00</option>
                <option value="22:50:00">22:50:00</option>
            </select>
            <br>
            <br>
            <button class="btn btn-default" type="button" id="btn-add-dia">
                <span class="glyphicon glyphicon-plus"></span> Adicionar dia da semana
            </button>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-hover table-striped" id="table-dia">
                <thead>
                <th>Dia da semana</th>
                <th>Horário Inicial</th>
                <th>Horário Final</th>
                <th>Opções</th>
                </thead>
                <tbody>

                </tbody>
            </table>
            <br>
            <button class="btn btn-primary" type="submit" id="btnSalvarArray">
                <span class="glyphicon glyphicon-ok"></span> Salvar
            </button>
        </form>
    </div>
</div>


<script src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery-1.9.0.js" type="text/javascript"></script>
<script>
    var diasemana = [];
    var grade_dia = [];
    var count = 0;
    $("#btn-add-dia").click(function () {

        var idDia = parseInt($("#select_dia").val());
        var dia = $("#select_dia").find("option:selected").text();
        var hora_ini = $("#input_hini").val();
        var hora_fim = $("#input_hfim").val();

        var conteudo = {
            dia: dia,
            quantidade: hora_ini,
            hora_fim: hora_fim
        };
        diasemana.push(conteudo);

        grade_dia[count] = idDia + "|" + hora_ini+ "|" + hora_fim;

        var
            html = "<tr id='linha-" + count + "'>";
        html += "<td>" + dia + "</td>";
        html += "<td>" + diasemana[count].quantidade + "</td>";
        html += "<td>" + diasemana[count].hora_fim + "</td>";
        html += "<td>";
        html += "<a href='#'>";
        html += "<span class='glyphicon glyphicon-trash' onclick='excluir(" + count + ")'></span>";
        html += "</a>";
        html += "</td>";
        html += "</tr>";
        html += "";
        $("#table-dia").append(html);
        $("#input_hini").val("");
        $("#input_hfim").val("");
        $("#select_dia").val("0");
        count++;
    });
    $("#btnSalvarArray").click(function () {
        $("#grade_dia").val(grade_dia);
        $("#form").submit();

    });

    function excluir(id) {
        if (confirm("Deseja realmente excluir?")) {
            $("#txt-" + id).fadeOut(0);
            $("#txt-" + id).remove();
            $("#linha-" + id).fadeOut(0);
            $("#linha-" + id).remove();

            grade_dia[id] = null;
        }
    }
</script>

