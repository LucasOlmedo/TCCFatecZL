<?php
/* @var $this yii\web\View */
$this->title = 'FATEC Zona Leste - Sistema Gerenciador';
?>
<div class="site-index">
        <div class="page-header" align="center">
            <h1>
                <a href="index.php">
                    <img src="images/fatec_zona_leste.png" height="100" width="240"/>
                </a>
                <br>
                <small>Sistema gerenciador de atividades relacionadas à coordenação.</small>
            </h1>
        </div>
    <div class="page-header">
        <h1>
            <small>Principais funcionalidades:</small>
        </h1>
    </div>
    <style type="text/css">
        .caption {
            margin-top: -100px;
            opacity: 0.0;
            background: #FFF;
            transition: opacity 0.4s ease-out;
        }
        .thumbnail:hover .caption {
            height: auto;
            opacity: 0.99;
            margin-top: -100px;
            /*transition: height 0.2s, opacity 0.2s ease-in;*/
        }
    </style>
    <div class="body-content">
        <div class="row">
            <div class="col-sm-6 col-md-4" id="teste">
                <div class="thumbnail">
                    <img src="images/cursos.jpg" alt="" class="img-responsive"/>
                    <div class="caption">
                        <h4>Cursos</h4>
                        <p>
                            <a href="index.php?r=curso/index" class="btn btn-primary" role="button">Ver Cursos</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="images/disciplinas.jpg" alt="" class="img-responsive"/>
                    <div class="caption">
                        <h4>Disciplinas</h4>
                        <p>
                            <a href="index.php?r=disciplina/index" class="btn btn-primary" role="button">Ver
                                Disciplinas</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="images/professores.jpg" alt="" class="img-responsive"/>
                    <div class="caption">
                        <h4>Professores</h4>
                        <p>
                            <a href="index.php?r=professor/index" class="btn btn-primary" role="button">Ver
                                Professores</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="images/aula-semestral.jpg" alt="" class="img-responsive"/>
                    <div class="caption">
                        <h4>Aula semestral</h4>
                        <p>
                            <a href="index.php?r=aula-semestral/index" class="btn btn-primary" role="button">Ver
                                Aulas</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="images/grade-horaria.jpg" alt="" class="img-responsive"/>
                    <div class="caption">
                        <h4>Grade horária</h4>
                        <p>
                            <a href="/gradehoraria.php" target="_blank" class="btn btn-primary" role="button">Ver Grade</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
