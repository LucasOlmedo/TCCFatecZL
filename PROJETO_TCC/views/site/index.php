<?php

/* @var $this yii\web\View */

$this->title = 'FATEC Zona Leste - Sistema Gerenciador';
?>
<div class="site-index">

    <div class="jumbotron">
        <div class="page-header">
            <h1>Fatec Zona Leste</h1>

            <p class="lead">Sistema gerenciador de atividades relacionadas à coordenação.</p>
        </div>
    </div>

    <div class="page-header">
        <h1>
            <small>Principais funcionalidades</small>
        </h1>
    </div>
    <style type="text/css">

        .caption {
            margin-top: -90px;
            opacity: 0;
            visibility: hidden;
            background: #FFF;
            transition: margin-top 0.2s ease-out;
        }

        .thumbnail:hover .caption {
            opacity: 0.8;
            visibility: visible;
            margin-top: -100px;
            transition: opacity 0.3s, margin-top 0.3s ease-in;
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
                            <a href="index.php?r=curso/index" class="btn btn-default" role="button">Ver Cursos</a>
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
                            <a href="index.php?r=disciplina/index" class="btn btn-default" role="button">Ver
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
                            <a href="index.php?r=professor/index" class="btn btn-default" role="button">Ver
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
                            <a href="index.php?r=aula-semestral/index" class="btn btn-default" role="button">Ver
                                Aulas</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="images/relatorios.jpg" alt="" class="img-responsive"/>

                    <div class="caption">
                        <h4>Relatórios</h4>

                        <p>
                            <a href="#" class="btn btn-default" role="button">Ver Relatórios</a>
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
                            <a href="#" class="btn btn-default" role="button">Ver Grade</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
