/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.16-MariaDB : Database - tcc_fateczl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tcc_fateczl` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tcc_fateczl`;

/*Table structure for table `aulasemestral` */

DROP TABLE IF EXISTS `aulasemestral`;

CREATE TABLE `aulasemestral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Curso` int(10) NOT NULL,
  `id_Periodo` int(10) NOT NULL,
  `id_Disciplina` int(10) NOT NULL,
  `id_Professor` int(10) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `grade_semestral` (`id_Curso`,`id_Periodo`,`id_Disciplina`,`turno`),
  KEY `turno` (`turno`),
  KEY `fk_prof123` (`id_Professor`),
  KEY `fk_per123` (`id_Periodo`),
  KEY `fk_disc123` (`id_Disciplina`),
  KEY `fk_curso` (`id_Curso`),
  CONSTRAINT `fk_curso123` FOREIGN KEY (`id_Curso`) REFERENCES `curso` (`id_Curso`),
  CONSTRAINT `fk_disc123` FOREIGN KEY (`id_Disciplina`) REFERENCES `disciplina` (`id_Disciplina`),
  CONSTRAINT `fk_per123` FOREIGN KEY (`id_Periodo`) REFERENCES `periodo` (`id_Periodo`) ON UPDATE CASCADE,
  CONSTRAINT `fk_prof123` FOREIGN KEY (`id_Professor`) REFERENCES `professor` (`id_Professor`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Table structure for table `curso` */

DROP TABLE IF EXISTS `curso`;

CREATE TABLE `curso` (
  `id_Curso` int(10) NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(40) NOT NULL,
  `abreviacao` varchar(7) NOT NULL,
  `carga_horaria` int(6) NOT NULL,
  PRIMARY KEY (`id_Curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `diasemana` */

DROP TABLE IF EXISTS `diasemana`;

CREATE TABLE `diasemana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Aulasemestral` int(11) NOT NULL,
  `dia_semana` tinyint(1) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `grade_semanal` (`id_Aulasemestral`,`dia_semana`,`horario_inicio`,`horario_fim`),
  CONSTRAINT `fk_aula` FOREIGN KEY (`id_Aulasemestral`) REFERENCES `aulasemestral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Table structure for table `disciplina` */

DROP TABLE IF EXISTS `disciplina`;

CREATE TABLE `disciplina` (
  `id_Disciplina` int(10) NOT NULL AUTO_INCREMENT,
  `nome_disc` varchar(40) NOT NULL,
  `abreviacao` varchar(10) NOT NULL,
  `externo` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_Disciplina`),
  KEY `externo` (`externo`),
  CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`externo`) REFERENCES `horariosexternos` (`id_Hae`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `grade_curso` */

DROP TABLE IF EXISTS `grade_curso`;

CREATE TABLE `grade_curso` (
  `id_Curso` int(10) NOT NULL,
  `id_Periodo` int(2) NOT NULL,
  `id_Disciplina` int(10) NOT NULL,
  `qtde_aulas` int(10) NOT NULL,
  PRIMARY KEY (`id_Curso`,`id_Periodo`,`id_Disciplina`),
  KEY `fk_disc` (`id_Disciplina`),
  KEY `fk_per` (`id_Periodo`),
  CONSTRAINT `fk_curso` FOREIGN KEY (`id_Curso`) REFERENCES `curso` (`id_Curso`),
  CONSTRAINT `fk_disc` FOREIGN KEY (`id_Disciplina`) REFERENCES `disciplina` (`id_Disciplina`),
  CONSTRAINT `fk_per` FOREIGN KEY (`id_Periodo`) REFERENCES `periodo` (`id_Periodo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `horariosexternos` */

DROP TABLE IF EXISTS `horariosexternos`;

CREATE TABLE `horariosexternos` (
  `id_Hae` int(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_Hae`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `periodo` */

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `id_Periodo` int(2) NOT NULL,
  `nome_periodo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `professor` */

DROP TABLE IF EXISTS `professor`;

CREATE TABLE `professor` (
  `id_Professor` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `graduacao` varchar(30) NOT NULL,
  `contrato` varchar(15) NOT NULL,
  `sede` varchar(30) NOT NULL,
  `inicio_cps` date NOT NULL,
  `inicio_fateczl` date NOT NULL,
  PRIMARY KEY (`id_Professor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `situacao` */

DROP TABLE IF EXISTS `situacao`;

CREATE TABLE `situacao` (
  `id_Situacao` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Situacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `situacao_professor` */

DROP TABLE IF EXISTS `situacao_professor`;

CREATE TABLE `situacao_professor` (
  `id_SitProf` int(10) NOT NULL AUTO_INCREMENT,
  `id_Professor` int(10) NOT NULL,
  `id_Situacao` int(10) NOT NULL,
  `data_sit` date NOT NULL,
  PRIMARY KEY (`id_SitProf`),
  KEY `fk_prof` (`id_Professor`),
  KEY `fk_sit` (`id_Situacao`),
  CONSTRAINT `fk_prof` FOREIGN KEY (`id_Professor`) REFERENCES `professor` (`id_Professor`),
  CONSTRAINT `fk_sit` FOREIGN KEY (`id_Situacao`) REFERENCES `situacao` (`id_Situacao`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(255) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `ID_CURSO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `USUARIO` (`USUARIO`),
  KEY `ID_CURSO` (`ID_CURSO`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_CURSO`) REFERENCES `curso` (`id_Curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
