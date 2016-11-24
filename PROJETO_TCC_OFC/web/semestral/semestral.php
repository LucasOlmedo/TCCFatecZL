<?php
  include 'helper.php';
  include '../validacaoUsuario.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Impressão Folha Semestral</title>
    <link rel="stylesheet" href="impressao.css">
    <script src="../js/jquery-1.9.0.js"></script>
    <script src="semestral.js"></script>
  </head>
  <body>

    <input id="mesAno" placeholder="ANO-MES" type="month" class="no-print" value="<?php echo date('Y') . '-' . date('m'); ?>">
      <input id="btnOk" type="button" value="Ok" class="no-print">
      <input id="btnImprimir" type="button" value="Imprimir" class="no-print">

  <?php echo "<input type='hidden' value='". $_GET['id'] . "' id='idProf'> "; ?>



    <img src="image.jpg" alt="Imagem CPS" class="img-header" />

    <div class="doc-txt-header">
      <p class="font-arial doc-txt-header--titulo">FATEC ZL - GRADE HORARIA</p>

      <span class="doc-txt-header--box doc-txt-header--box__padding" id="semestre-header"></span> <strong class="doc-txt-header--strong">SEMESTRE DE</strong> <span class="doc-txt-header--box doc-txt-header--box__padding" id="ano-header">XXXX</span>
      <span class="doc-txt-header--box">Válida a partir de <?php echo date('d/m/Y'); ?> </span>
    </div>


    <table class="parte-a">
      <tr>
        <td class="parte-titulo">A</td>
        <td class="font-arial parte-medium-font parte-nome">NOME</td>
        <td class="parte-strong parte-italic parte-txt-left parte-nome-value parte-medium-font"><?php echo strtoupper(getNomeProf($con)); ?></td>
        <td class="parte-less-font">CATEGORIA</td>
        <td class="parte-strong parte-italic parte-medium-font"><?php echo strtoupper(getCatProf($con)); ?></td>
      </tr>

      <tr>
        <td class="parte-no-show-right">     </td>
        <td class="font-arial parte-medium-font">REGIME</td>
        <td class="parte-less-font parte-externo"><span class="parte-externo__hora">[X]HORA-AULA</span>   [ ]RJI   <span class="parte-externo__jornada">[ ]JORNADA</span></td>
        <td class="parte-less-font">DEPTO/C. IMPL.</td>
        <td class="parte-less-font"><?php echo getCurProf($con); ?></td>
      </tr>

    </table>

    <table class="parte-b" id="pt-b">
      <tr>
        <td class="parte-titulo parte-b-titulo">B</td>
        <td class="parte-less-font parte-disciplina">DISCIPLINA</td>
        <td class="parte-less-font parte-curso">CURSO</td>

        <td class="parte-less-font parte-disciplina">DISCIPLINA</td>
        <td class="parte-less-font parte-curso">CURSO</td>

        <td class="parte-less-font parte-disciplina">DISCIPLINA</td>
        <td class="parte-less-font parte-curso">CURSO</td>

        <td class="parte-less-font parte-disciplina">DISCIPLINA</td>
        <td class="parte-less-font parte-curso">CURSO</td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-less-font text-branco">XXX</td>
        <td class="parte-less-font disc-f">    </td>

        <td class="parte-less-font curso-f">    </td>

        <td class="parte-less-font disc-f">    </td>
        <td class="parte-less-font curso-f">    </td>
        <td class="parte-less-font disc-f">    </td>
        <td class="parte-less-font curso-f">    </td>
        <td class="parte-less-font disc-f">    </td>
        <td class="parte-less-font curso-f">    </td>
      </tr>

      <tr>
        <td class="parte-less-font text-branco">XXX</td>
        <td class="parte-less-font disc-f">    </td>
        <td class="parte-less-font curso-f">    </td>
        <td class="parte-less-font disc-f">    </td>
        <td class="parte-less-font curso-f">    </td>
        <td class="parte-less-font disc-f">    </td>
        <td class="parte-less-font curso-f">    </td>
        <td class="parte-less-font disc-f">    </td>
        <td class="parte-less-font curso-f">    </td>
      </tr>
    </table>

    <table class="pula-linha">
      <tr>
        <td class="parte-less-font">Período</td>
        <td class="parte-less-font">HAE-RJI-JORNADA</td>
        <td class="parte-less-font">HORA-AULA</td>
        <td class="parte-less-font">SEGUNDA</td>
        <td class="parte-less-font">TERÇA</td>
        <td class="parte-less-font">QUARTA</td>
        <td class="parte-less-font">QUINTA</td>
        <td class="parte-less-font">SEXTA</td>
        <td class="parte-less-font">SÁBADO</td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">M</td>
        <td class="parte-less-font">08h-09h</td>
        <td class="parte-less-font">07h30min - 08h20min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">A</td>
        <td class="parte-less-font">09h-10h</td>
        <td class="parte-less-font">08h20min  - 09h10min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">N</td>
        <td class="parte-less-font">10h-11h</td>
        <td class="parte-less-font">09h20min  - 10h10min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">H</td>
        <td class="parte-less-font">11h-12h</td>
        <td class="parte-less-font">10h10min  - 11h00min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">Ã</td>
        <td class="parte-less-font">12h-13h</td>
        <td class="parte-less-font">11h10min - 12h00min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-less-font">   </td>
        <td class="parte-less-font">13h-14h</td>
        <td class="parte-less-font">12h00min - 12h50min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr class="linha-vazia">
        <td colspan="9">
        </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">T</td>
        <td class="parte-less-font">13h-14h</td>
        <td class="parte-less-font">13h00min - 13h50min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">A</td>
        <td class="parte-less-font">14h-15h</td>
        <td class="parte-less-font">13h50min - 14h40min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">R</td>
        <td class="parte-less-font">15h-16h</td>
        <td class="parte-less-font">14h50min - 15h40min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">D</td>
        <td class="parte-less-font">16h-17h</td>
        <td class="parte-less-font">15h40min - 16h30min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">E</td>
        <td class="parte-less-font">17h-18h</td>
        <td class="parte-less-font">16h40min - 17h30min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td>   </td>
        <td class="parte-less-font">18h-19h</td>
        <td class="parte-less-font">17h30min - 18h20min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr class="linha-vazia">
        <td colspan="9">

        </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">N</td>
        <td class="parte-less-font">18h-19h</td>
        <td class="parte-less-font">19h20min - 20h10min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">O</td>
        <td class="parte-less-font">19h-20h</td>
        <td class="parte-less-font">20h10min - 21h00min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">I</td>
        <td class="parte-less-font">20h-21h</td>
        <td class="parte-less-font">21h10min - 22h00min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="parte-bottom-none parte-medium-font font-arial">T</td>
        <td class="parte-less-font">21h-22h</td>
        <td class="parte-less-font">22h00min - 22h50min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>

      <tr>
        <td class="font-arial parte-medium-font">E</td>
        <td class="parte-less-font">21h-23h</td>
        <td class="parte-less-font">22h50min - 23h40min</td>
        <td class="parte-less-font seg">    </td>
        <td class="parte-less-font ter">    </td>
        <td class="parte-less-font qua">    </td>
        <td class="parte-less-font qui">    </td>
        <td class="parte-less-font sex">    </td>
        <td class="parte-less-font sab">    </td>
      </tr>
    </table>

    <table class="parte-c pula-linha">
      <tr>
        <td class="parte-titulo font-arial" id="parte-c-titulo">C</td>
        <td class="parte-medium-tit-font font-arial">HAE - RJI - JORNADA</td>
        <td class="parte-less-font parte-strong"><span class="parte-margin-bottom">NÚMERO</span> <br>Horas <br>Semanais</td>
      </tr>

      <tr class="parte-small-font">
        <td>1.</td>
        <td class="parte-externo">Diretor e Vice-Diretor da Faculdade</td>
        <td class="aula-ext-1">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>2.</td>
        <td class="parte-externo">Assessoria  ao CEETEPS</td>
        <td class="aula-ext-2">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>3.</td>
        <td class="parte-externo">HAE de Apoio a Direção da FATEC</td>
        <td class="aula-ext-3">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>4.</td>
        <td class="parte-externo">Chefia  de DEPARTAMENTO</td>
        <td class="aula-ext-4">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>5.</td>
        <td class="parte-externo">Responsab. por  Curso em Implantaçio</td>
        <td class="aula-ext-5">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>6.</td>
        <td class="parte-externo">Responsab. por  disciplina (2º a 6º feira)</td>
        <td class="aula-ext-6">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>7.</td>
        <td class="parte-externo">Coord. de oficinas e laboratórios</td>
        <td class="aula-ext-7">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>8.</td>
        <td class="parte-externo">HAE de Coordenação de Estágio</td>
        <td class="aula-ext-8">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>9.</td>
        <td class="parte-externo">HAE de Orientaçao de TCC</td>
        <td class="aula-ext-9">   -    </td>
      </tr>

      <tr class="parte-small-font">
        <td>10.</td>
        <td class="parte-externo">Outros (2º a 6º feira)</td>
        <td class="aula-ext-10">   -    </td>
      </tr>
    </table>

    <table class="parte-d-header pula-linha">
      <tr>
        <td class="parte-titulo">D</td>
        <td class="font-arial parte-medium-tit-font"> QUADRO RESUMO</td>
      </tr>
    </table>

    <table class="parte-d">
      <tr>
        <td>Atividades</td>
        <td>Qtd Semanal</td>
        <td>Qtd Mensal</td>
      </tr>

      <tr>
        <td>Hora Aula</td>
        <td id="ha"></td>
        <td id="ha-mensal"></td>
      </tr>

      <tr>
        <td>Hora Atividade</td>
        <td id="hativi"></td>
        <td id="hativi-mensal"></td>
      </tr>

      <tr>
        <td>H.A.E</td>
        <td id="hae"></td>
        <td id="hae-mensal"></td>
      </tr>

      <tr>
        <td>R.J.I.</td>
        <td id="rji"></td>
        <td id="rji-mensal"></td>
      </tr>

      <tr>
        <td>Jornada</td>
        <td id="jornada"></td>
        <td id="jornada-mensal"></td>
      </tr>

      <tr>
        <td>Total Geral</td>
        <td id="total-g-semanal"></td>
        <td id="total-g-mensal"></td>
      </tr>

    </table>

    <div class="clear-fix"> </div>

    <table  class="div-bordered pula-linha parte-externo" >
      <tr>
        <td>
             <p class="no-margin-tit font-arial parte-medium-tit-font">INSTRUÇÕES PARA PREENCHIMENTO DA GRADE HORÁRIA</p>
              <p class="no-margin parte-small-font">a) HORA-AULA: preencher com a sigal da disciplina e do curso, obedecendo aos horários de início e término de aulas indicados na coluna própria.</p>
              <p class="no-margin parte-small-font">b) Atividades desenvolvidas em HAE, em RJI e em Jornada: preencher com o número constante da relação de atividades do campo C, obedecidos aos horários de início e término indicados na coluna correspondente.</p>
              <p class="no-margin parte-small-font">c) No caso das atividades 8, 9 e 10 especificar, no campo OBSERVAÇÕES, abaixo, nome do grupo (para 8) ou do proeto (para 9) ou, ainda, a natureza da atividade (para 10).</p>
              <p class="no-margin parte-small-font">d) No quadro resumo (campo D) indicar a distribuição semanal e mensal das atividades, em qualquer regime.</p>
          </td>
      </tr>
    </table>

    <table  class="div-bordered-no-top pula-linha parte-externo" >
      <tr>
        <td><p class="no-margin-tit font-arial parte-medium-tit-font">LEMBRETES:</p>
          <p class="no-margin parte-small-font">a) Observe as exigências legais:: no máximo, 8 horas diárias de trabalho; intervalo de uma hora entre um expediente e outro e, no máximo, 6 horas em cada expediente no diurno e 5 horas no noturno (sem ultrapassar 8 horas por dia).</p>
          <p class="no-margin parte-small-font">b) Observer as normas em vigor quanto ao cumprimento de horas de RJI ou HAE em determinados períodos, limitação de horas, bem como exigências de exercício de atividades somentre entre segunda e sexta-feira.</p>
        </td>

      </tr>

    </table>

    <table class="font-arial parte-medium-tit-font" id="observacoes" style="text-align: left;"></table>

    <table class="parte-externo parte-medium-font pula-linha">
      <tr>
        <td class="no-show-right no-show-bottom down-margin">Proposta</td>
        <td class="no-show-bottom date-table">Data ___/___/XXXX</td>
        <td class="no-show-right no-show-bottom down-margin">De acordo</td>
        <td class="no-show-bottom date-table">Data ___/___/XXXX</td>
      </tr>

      <tr>
        <td class="no-show-right up-margin">Resp. p/ Disciplina</td>
        <td></td>
        <td class="no-show-right up-margin">Professor</td>
        <td></td>
      </tr>

      <tr>
        <td class="no-show-right no-show-bottom down-margin">Confere com Instrução</td>
        <td class="no-show-bottom date-table">Data ___/___/XXXX</td>
        <td class="no-show-right no-show-bottom down-margin">Servidor</td>
        <td class="no-show-bottom date-table">Data ___/___/XXXX</td>
      </tr>

      <tr>
        <td class="no-show-right up-margin">Aprovado</td>
        <td></td>
        <td class="no-show-right up-margin">Coordenador do Curso</td>
        <td></td>
      </tr>
    </table>

  </body>
</html>
