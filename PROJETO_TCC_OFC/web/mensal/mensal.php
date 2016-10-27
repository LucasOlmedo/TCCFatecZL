<?php
    include 'helper.php';
    include '../validacaoUsuario.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Impressão Folha de Ponto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="mensal.css">
	<script src="mensal.js"></script>
</head>
<body>
<div class="content">
	<input id="mesAno" placeholder="ANO-MES" type="month" class="no-print" value="<?php echo date('Y') . '-' . date('m'); ?>">
	<input id="btnOk" type="button" value="Ok" class="no-print">
  <input id="btnImprimir" type="button" value="Imprimir" class="no-print">
	<header>
		<img src="foto-header.jpg" class="img img-header">
	</header>

	<?php echo "<input type='hidden' value='". $_GET['id'] . "' id='idProf'> "; ?>
	<section class="dados-prof">
		<table class="table table-dados font-arial" width="900px">
			<tr>
				<td colspan="2" class="font-less">FATEC ZONA LESTE</td>
				<td colspan="2" class="font-less">CIDADE: SÃO PAULO</td>
				<td class="font-less">Cod: 111</td>
			</tr>
			<tr>
				<td rowspan="2" colspan="2">PROF. <span class="nome-prof"><?=getNomeProf(); ?><span></td>
				<td class="text-branco font-less">huahuahuahuahuahua</td>
				<td class="font-less">Regime Jurídico: CLT</td>
				<td class="font-less">Professor de Ensino Superior</td>
			</tr>
			<tr>
				<td colspan="2" class="font-less">COMP. CURRICULAR(ES):  VIDE GRADE HORARIA</td>
				<td class="font-less">Hora-Aula semanal: </td>
			</tr>
			<tr>
				<td class="font-less">HORA ATIVIDADE: <span id="hae-ativ"></span> </td>
				<td colspan="3" class="font-less">HAE (Projeto/orientação): <span id="hae-prof"></span></td>
				<td class="font-less">HAE (Coordenação): <span id="hae-coord"></span> </td>
			</tr>
		</table>

	</section>

	<section class="grade-horaria">
		<h2 class="text-center font-calibri font-title">GRADE HORÁRIA</h2>
		<table class="table table-grade text-center font-calibri" width="900px">
			<tr>
				<td class="text-branco sem-top-left sem-bottom">A</td>
				<td colspan="6" class="text-negrito font-less" style="border-right: 2px solid black;border-left: 2px solid black;border-top: 2px solid black">MANHÃ</td>
				<td colspan="6" class="text-negrito font-less" style="border-right: 2px solid black;border-left: 2px solid black;border-top: 2px solid black">TARDE</td>
				<td colspan="6" class="text-negrito font-less" style="border-right: 2px solid black;border-left: 2px solid black;border-top: 2px solid black">NOITE</td>
			</tr>

			<tr>
				<td class="text-branco sem-top-left">A</td>
				<td colspan="6" class="font-less" style="border-left: 2px solid black;border-right: 2px solid black;">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
				<td colspan="6" class="font-less" style="border-left: 2px solid black;border-right: 2px solid black;">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
				<td colspan="6" class="font-less" style="border-left: 2px solid black;border-right: 2px solid black;">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
			</tr>

			<tr>
				<td class="text-branco" style="border-right: 2px solid black;border-left: 2px solid black;border-top: 2px solid black">A</td>
				<td class="text-negrito font-less">1°</td>
				<td class="text-negrito font-less">2°</td>
				<td class="text-negrito font-less">3°</td>
				<td class="text-negrito font-less">4°</td>
				<td class="text-negrito font-less">5°</td>
				<td class="text-negrito font-less" style="border-right: 2px solid black";>6°</td>
				<td class="text-negrito font-less">1°</td>
				<td class="text-negrito font-less">2°</td>
				<td class="text-negrito font-less">3°</td>
				<td class="text-negrito font-less">4°</td>
				<td class="text-negrito font-less">5°</td>
				<td class="text-negrito font-less" style="border-right: 2px solid black;">6°</td>
				<td class="text-negrito font-less">1°</td>
				<td class="text-negrito font-less">2°</td>
				<td class="text-negrito font-less">3°</td>
				<td class="text-negrito font-less" style="border-right: 2px solid black;">4°</td>
			</tr>

			<tr class="aula">
				<td class="text-negrito" style="border-right: 2px solid black; border-left: 2px solid black">S</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
			</tr>

			<tr class="aula">
				<td class="text-negrito" style="border-right: 2px solid black; border-left: 2px solid black">T</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
			</tr>

			<tr class="aula">
				<td class="text-negrito" style="border-right: 2px solid black; border-left: 2px solid black">Q</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
			</tr>

			<tr class="aula">
				<td class="text-negrito" style="border-right: 2px solid black; border-left: 2px solid black">Q</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
			</tr>

			<tr class="aula">
				<td class="text-negrito" style="border-right: 2px solid black; border-left: 2px solid black">S</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black;">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black;">0123456789123</td>
			</tr>

			<tr class="aula">
				<td class="text-negrito" style="border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black">S</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black; border-bottom: 2px solid black">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-bottom: 2px solid black">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black; border-bottom: 2px solid black">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black; border-bottom: 2px solid black">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-bottom: 2px solid black">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black; border-bottom: 2px solid black">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-left: 2px solid black; border-bottom: 2px solid black">0123456789123</td>
				<td colspan="2" class="text-branco table-element font-less" style="border-right: 2px solid black; border-bottom: 2px solid black">0123456789123</td>
			</tr>
		</table>
	</section>

	<section class="folha-frequencia">

		<h2 class="text-center font-calibri font-medium">FOLHA DE FREQUÊNCIA – <span id="text-data">XX/XXXX</span></h2>
		<table class="table table-frequencia font-calibri text-center text-negrito font-less-medium border-grosso" width="900px">
			<tr>
				<td class="border-bottom"></td>
				<td colspan="7" class="font-title border-bottom border-right border-left">MANHÃ</td>
				<td colspan="7" class="font-title border-bottom border-right border-left">TARDE</td>
				<td colspan="5" class="font-title border-bottom border-right border-left">NOITE</td>
			</tr>
			<tr>
				<td>Dia</td>
				<td>Assinatura</td>
				<td>1°</td>
				<td>2°</td>
				<td>3°</td>
				<td>4°</td>
				<td>5°</td>
				<td class="border-right">6°</td>
				<td>Assinatura</td>
				<td>1°</td>
				<td>2°</td>
				<td>3°</td>
				<td>4°</td>
				<td>5°</td>
				<td class="border-right">6°</td>
				<td>Assinatura</td>
				<td>1°</td>
				<td>2°</td>
				<td>3°</td>
				<td>4°</td>
			</tr>
			<!-- Preencher com Javascript as datas e os dias que sao domingo -->
			<tbody id="table-frequencia"></tbody>
		</table>
	</section>

	<section class="reposicoes font-calibri font-less-medium text-center">
		Reposição de Aulas (R) / Reposição por Claro Docente (RCD) / Substituição (S)

		<table class="table table-reposicoes text-left" width="900px">
			<tr>
				<td colspan="8">Hora Aula em Subst.:</td>
				<td colspan="8">Hora Aula Reposição:</td>
				<td colspan="8">Hora Aula Claro Docente:</td>
				<td colspan="8">Total Mensal</td>
			</tr>

			<tr>
				<td colspan="23">Dias Previstos para Reposição/Substituição/Claro Docente</td>
				<td colspan="9">Motivo:</td>
			</tr>
			<tr>
				<td colspan="23" class="text-branco">A</td>
				<td colspan="9" class="text-branco">A</td>
			</tr>

		</table>

	</section>
	<br>

	<section class="ampliacoes">
		<table class="table table-ampliacoes font-arial font-less-min text-center" width="900px">
			<tr>
				<td colspan="3" class="sem-top-left"></td>
				<td>CÓDIGO</td>
				<td>CHS</td>
				<td>CÓDIGO</td>
				<td>CHS</td>
				<td>CÓDIGO</td>
				<td>CHS</td>
				<td>CÓDIGO</td>
				<td>CHS</td>
			</tr>

			<tr>
				<td colspan="3">Ampliação de Carga Horária</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>

		<br>

		<table class="table table-legenda font-arial font-less-min" width="900px">

			<tr>
				<td rowspan="4" colspan="2">LEGENDA</td>
				<td>FA – FALTA AULA</td>
				<td>FM – FALTA MÉDICA</td>
				<td>CRT – Conv. Reunião/ Treinamento</td>
				<td>S - SUBSTITUIÇÃO</td>
			</tr>

			<tr>
				<td>FD – FALTA DIA</td>
				<td>LM - LICENÇA MÉDICA</td>
				<td>CPE – Conv. Participar em Eventos</td>
				<td>RCD – REPOS POR CLARO DOCENTE</td>
			</tr>

			<tr>
				<td>R – REPOS DE AULAS</td>
				<td>AN – ADICIONAL NOTURNO</td>
				<td>FAA – FALTA AUX  ALIMEN/</td>
				<td>FR – FALTA REUNIÃO</td>
			</tr>

			<tr>
				<td colspan="4">PL – FALTA PREVISTA EM LEI – ESPECIFICAR SE É CONVOCAÇÃO PARA JÚRI, JUSTIÇA ELEITORAL, ETC.</td>
			</tr>

			<tr>
				<td colspan="2">Ocorrência Folha de Pagamento</td>
				<td colspan="4">Ocorrência Contagem de Tempo (OPTATIVO)</td>
			</tr>
		</table>

		<table class="table table-resumo font-arial font-less-min not-top-table" width="900px">
			<tr>
				<td colspan="2" class="text-center">Resumo Mensal</td>
				<td>EVENTO</td>
				<td>MÊS</td>
				<td>ACUMULADO ANO</td>
			</tr>

			<tr>
				<td>Total - hora aula = </td>
				<td>Desconto = </td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>R = </td>
				<td>FA = </td>
				<td>FA</td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>RCD = </td>
				<td>FD = </td>
				<td>FD</td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>S = </td>
				<td>FR = </td>
				<td>FALTA MÉDICA</td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td>A N = </td>
				<td>FAA = </td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</section>

	<section class="assinaturas font-arial font-less">
		<p>  De acordo,</p>
		<p class="first-assin"> _________________________________ <br> <span class="txt-assinaturas-1">Assinatura do (a) Professor</span></p>
		<p class="second-assin"> _________________________________ <br> <span class="txt-assinaturas-2">Carimbo e Assinatura do Coordenador<span></p>
	</section>

  <!-- Para quebrar a página -->
  <div style="page-break-after: always"></div>

	<section class="alteracoes">
		<p class="font-arial text-center font-more" id="txt-alteracoes">Alterações de Carga Horária</p>
		<table class="table table-alteracoes font-calibri text-center text-negrito" width="900px">
			<tr>
				<td class="text-branco sem-top-left sem-bottom">A</td>
				<td colspan="6" class="font-less border-top border-right border-left border-bottom">A partir de: __/__/____</td>
				<td colspan="6" class="font-less border-top border-right border-left border-bottom">A partir de: __/__/____</td>
				<td colspan="6" class="font-less border-top border-right border-left border-bottom">A partir de: __/__/____</td>
			</tr>
			<tr>
				<td class="text-branco  sem-top-left sem-bottom">A</td>
				<td colspan="6" class="font-less border-right border-left">MANHÃ</td>
				<td colspan="6" class="font-less border-right border-left">TARDE</td>
				<td colspan="6" class="font-less border-right border-left">NOITE</td>
			</tr>

			<tr>
				<td class="text-branco  sem-top-left">A</td>
				<td colspan="6" class="text-no-negrito font-less border-right border-left">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
				<td colspan="6" class="text-no-negrito font-less border-right border-left">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
				<td colspan="6" class="text-no-negrito font-less border-right border-left">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
			</tr>

			<tr>
				<td class="text-branco border-right border-left border-top" >A</td>
				<td class="font-less">1°</td>
				<td class="font-less">2°</td>
				<td class="font-less">3°</td>
				<td class="font-less">4°</td>
				<td class="font-less">5°</td>
				<td class="font-less border-right">6°</td>
				<td class="font-less">1°</td>
				<td class="font-less">2°</td>
				<td class="font-less">3°</td>
				<td class="font-less">4°</td>
				<td class="font-less">5°</td>
				<td class="font-less border-right">6°</td>
				<td class="font-less">1°</td>
				<td class="font-less">2°</td>
				<td class="font-less">3°</td>
				<td class="font-less border-right">4°</td>
			</tr>

			<tr>
				<td class="border-right border-left">S</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">T</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">Q</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">Q</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">S</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left border-bottom">S</td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-right border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-right border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-right border-bottom"></td>
			</tr>
		</table>

		<table class="table table-alteracoes font-calibri text-center text-negrito margem-top" width="900px">
			<tr>
				<td class="text-branco sem-top-left sem-bottom">A</td>
				<td colspan="6" class="font-less border-top border-right border-left border-bottom">A partir de: __/__/____</td>
				<td colspan="6" class="font-less border-top border-right border-left border-bottom">A partir de: __/__/____</td>
				<td colspan="6" class="font-less border-top border-right border-left border-bottom">A partir de: __/__/____</td>
			</tr>
			<tr>
				<td class="text-branco  sem-top-left sem-bottom">A</td>
				<td colspan="6" class="font-less border-right border-left">MANHÃ</td>
				<td colspan="6" class="font-less border-right border-left">TARDE</td>
				<td colspan="6" class="font-less border-right border-left">NOITE</td>
			</tr>

			<tr>
				<td class="text-branco  sem-top-left">A</td>
				<td colspan="6" class="text-no-negrito font-less border-right border-left">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
				<td colspan="6" class="text-no-negrito font-less border-right border-left">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
				<td colspan="6" class="text-no-negrito font-less border-right border-left">Tempo de aula <span class="text-sublinhado">50</span> min.</td>
			</tr>

			<tr>
				<td class="text-branco border-right border-left border-top" >A</td>
				<td class="font-less">1°</td>
				<td class="font-less">2°</td>
				<td class="font-less">3°</td>
				<td class="font-less">4°</td>
				<td class="font-less">5°</td>
				<td class="font-less border-right">6°</td>
				<td class="font-less">1°</td>
				<td class="font-less">2°</td>
				<td class="font-less">3°</td>
				<td class="font-less">4°</td>
				<td class="font-less">5°</td>
				<td class="font-less border-right">6°</td>
				<td class="font-less">1°</td>
				<td class="font-less">2°</td>
				<td class="font-less">3°</td>
				<td class="font-less border-right">4°</td>
			</tr>

			<tr>
				<td class="border-right border-left">S</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">T</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">Q</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">Q</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left">S</td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
				<td colspan="2"></td>
				<td colspan="2" class="border-right"></td>
			</tr>

			<tr>
				<td class="border-right border-left border-bottom">S</td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-right border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-right border-bottom"></td>
				<td colspan="2" class="border-bottom"></td>
				<td colspan="2" class="border-right border-bottom"></td>
			</tr>
		</table>

		<table class="table table-alteracoes-down font-arial margem-top" width="900px">
			<tr>
				<td colspan="4" class="text-negrito">ALTERAÇÃO DE CARGA NO DECORRER DO MÊS A PARTIR DE __/__/____</td>
			</tr>
			<tr>
				<td>Carga Horária Semanal:</td>
				<td>Hora Atividade:</td>
				<td>HAE- Coord</td>
				<td>Hae- Projetos</td>
			</tr>
		</table>
	</section>

	<section class="observacoes">
		<table class="table table-observacoes margem-top font-arial text-center text-negrito font-more-less" width="900px">
			<tr>
				<td>Observações</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
			<tr>
				<td class="text-branco">A</td>
			</tr>
		</table>
	</section>
</div>
</body>
</html>
