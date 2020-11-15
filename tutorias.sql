-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2020 at 10:37 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorias`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `perfil_slug` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id`, `user_id`, `nombres`, `apellidoM`, `apellidoP`, `perfil_slug`, `created_at`, `updated_at`) VALUES
(1, 6, 'Ingrid Asiria', 'Chagoya', 'Poot', 'IS.jpeg', '2020-11-07 18:18:58', '2020-11-08 00:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `alumno_monitor`
--

DROP TABLE IF EXISTS `alumno_monitor`;
CREATE TABLE IF NOT EXISTS `alumno_monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `perfil_slug` varchar(100) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `carrera_id` (`carrera_id`),
  KEY `tutor_id` (`tutor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumno_monitor`
--

INSERT INTO `alumno_monitor` (`id`, `user_id`, `nombres`, `apellidoM`, `apellidoP`, `descripcion`, `carrera_id`, `perfil_slug`, `tutor_id`, `activo`, `created_at`, `updated_at`) VALUES
(2, 3, 'Emmanuel Javier', 'Torres', 'Hernandez', NULL, 2, NULL, 1, 1, '2020-11-04 17:09:05', '2020-10-22 07:38:35'),
(3, 4, 'Ivan', 'Ramirez', 'Garduño', NULL, 5, NULL, 1, 1, '2020-11-04 17:09:10', '2020-10-20 08:04:47'),
(4, 5, 'Sebastian', 'Arteaga', 'Muciño', NULL, 1, NULL, 1, 1, '2020-11-06 00:07:11', '2020-11-06 06:07:11'),
(6, 10, 'Jose Jose', 'Perez', 'Perez', NULL, 2, NULL, 1, 0, '2020-11-04 17:14:20', '2020-11-04 21:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `alumno_tutorado`
--

DROP TABLE IF EXISTS `alumno_tutorado`;
CREATE TABLE IF NOT EXISTS `alumno_tutorado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `grupo` varchar(5) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `alumno_monitor_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `carrera_id` (`carrera_id`),
  KEY `alumno_monitor_id` (`alumno_monitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumno_tutorado`
--

INSERT INTO `alumno_tutorado` (`id`, `nombres`, `apellidos`, `descripcion`, `carrera_id`, `grupo`, `cuatrimestre`, `alumno_monitor_id`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Jorge David', 'Montejo Dzib', 'Juega muchos videojuegos.', 1, 'A', 1, 3, 1, '2020-11-06 00:07:27', '2020-11-06 06:07:27'),
(2, 'Cruz Antonio', 'Jimenez Tadeo', 'No presta atencion.', 3, 'B', 7, 2, 1, '2020-11-04 17:09:47', '2020-10-22 07:44:08'),
(3, 'Juan', 'Perez', 'No pone atencion', 2, 'B', 6, 2, 1, '2020-11-04 17:09:52', '2020-10-29 21:05:02'),
(4, 'Juanito', 'Ardon', 'Deficit de atencion.', 2, 'A', 5, 6, 1, '2020-11-04 17:09:56', '2020-11-04 21:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anuncios`
--

INSERT INTO `anuncios` (`id`, `titulo`, `descripcion`, `link`, `activo`, `created_at`, `updated_at`) VALUES
(3, 'Fecha limite para reportes grupales', 'La fecha limite para los reportes grupales este cuatrimestre es el dia 15 de Noviembre del 2020.', 'https://vuejsdevelopers.com/2017/05/15/vue-js-what-is-vuex/?utm_source=vjd-blog&utm_medium=newsletter&utm_campaign=vfc', 1, '2020-11-08 02:06:38', '2020-11-08 02:06:38'),
(4, 'Prueba', 'Prueba', 'https://google.com', 1, '2020-11-07 20:12:48', '2020-11-08 02:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id`, `carrera`, `created_at`, `updated_at`) VALUES
(1, 'Ingeniería en Software', '2020-10-10 02:32:50', '2020-10-10 02:32:50'),
(2, 'Ingeniería en Animación y Efectos Visuales', '2020-10-10 02:32:50', '2020-10-10 02:32:50'),
(3, 'Licenciatura en Nutrición', '2020-10-10 02:32:50', '2020-10-10 02:32:50'),
(4, 'Licenciatura en Administración de Empresas Turísticas', '2020-10-10 02:32:50', '2020-10-10 02:32:50'),
(5, 'Terapia física', '2020-10-10 02:32:50', '2020-10-10 02:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_psico`
--

DROP TABLE IF EXISTS `inf_psico`;
CREATE TABLE IF NOT EXISTS `inf_psico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `no_sesiones` int(11) DEFAULT NULL,
  `motivo` varchar(1000) DEFAULT NULL,
  `tecnicas` varchar(1000) DEFAULT NULL,
  `observaciones` varchar(2000) DEFAULT NULL,
  `conclusiones` varchar(1500) DEFAULT NULL,
  `psicologo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `carrera_id` (`carrera_id`),
  KEY `psicologo_id` (`psicologo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materia_tutorada`
--

DROP TABLE IF EXISTS `materia_tutorada`;
CREATE TABLE IF NOT EXISTS `materia_tutorada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) DEFAULT NULL,
  `alumno_tutorado_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `alumno_tutorado_id` (`alumno_tutorado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_10_13_222813_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 8),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 5),
(2, 'App\\User', 7),
(2, 'App\\User', 10),
(3, 'App\\User', 6),
(4, 'App\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psicologos`
--

DROP TABLE IF EXISTS `psicologos`;
CREATE TABLE IF NOT EXISTS `psicologos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `perfil_slug` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psicologos`
--

INSERT INTO `psicologos` (`id`, `user_id`, `nombres`, `apellidoM`, `apellidoP`, `descripcion`, `perfil_slug`, `activo`, `created_at`, `updated_at`) VALUES
(1, 9, 'Maria Juanita', 'Contreras', 'Contreras', 'Especialista en psicologia deportiva.', NULL, 1, '2020-11-04 17:08:43', '2020-11-03 07:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `reporte_final`
--

DROP TABLE IF EXISTS `reporte_final`;
CREATE TABLE IF NOT EXISTS `reporte_final` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_monitor_id` int(11) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `grupo` varchar(5) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `problematica_general` varchar(2000) DEFAULT NULL,
  `contenidos_tratados` varchar(1500) DEFAULT NULL,
  `asistentes_programados` varchar(3000) DEFAULT NULL,
  `asistentes_reales` varchar(3000) DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL,
  `observacion` varchar(1500) DEFAULT NULL,
  `sugerencias` varchar(1500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `alumno_monitor_id` (`alumno_monitor_id`),
  KEY `tutor_id` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reporte_sesion`
--

DROP TABLE IF EXISTS `reporte_sesion`;
CREATE TABLE IF NOT EXISTS `reporte_sesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_monitor_id` int(11) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `grupo` varchar(5) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `horario` datetime DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL,
  `problematicas` varchar(2000) DEFAULT NULL,
  `motivo` varchar(1500) DEFAULT NULL,
  `contenidos_tratar` varchar(1500) DEFAULT NULL,
  `contenidos_tratados` varchar(1500) DEFAULT NULL,
  `asistentes_programados` varchar(3000) DEFAULT NULL,
  `asistentes_reales` varchar(3000) DEFAULT NULL,
  `observaciones` varchar(1500) DEFAULT NULL,
  `fotografia` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `alumno_monitor_id` (`alumno_monitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Tutor', 'web', '2020-10-14 04:39:37', '2020-10-14 04:39:37'),
(2, 'Alumno_Monitor', 'web', '2020-10-16 03:03:32', '2020-10-16 03:03:32'),
(3, 'Admin', 'web', '2020-11-02 06:54:06', '2020-11-02 06:54:06'),
(4, 'Psicologo', 'web', '2020-11-03 06:56:08', '2020-11-03 06:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sol_apoyo`
--

DROP TABLE IF EXISTS `sol_apoyo`;
CREATE TABLE IF NOT EXISTS `sol_apoyo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` varchar(200) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `problematica` varchar(1000) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tutor_id` (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sol_enviada`
--

DROP TABLE IF EXISTS `sol_enviada`;
CREATE TABLE IF NOT EXISTS `sol_enviada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sol_apoyo_id` int(11) DEFAULT NULL,
  `psicologo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sol_apoyo_id` (`sol_apoyo_id`),
  KEY `psicologo_id` (`psicologo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tutores`
--

DROP TABLE IF EXISTS `tutores`;
CREATE TABLE IF NOT EXISTS `tutores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `horario` varchar(1000) DEFAULT NULL,
  `perfil_slug` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `carrera_id` (`carrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutores`
--

INSERT INTO `tutores` (`id`, `user_id`, `nombres`, `apellidoM`, `apellidoP`, `descripcion`, `carrera_id`, `horario`, `perfil_slug`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jahdiel kadir', 'Xiu', 'Castaneda', 'Joven y ATRACTIVO', 1, 'Lunes: 10am a 2pm\r\nMartes: 1pm - 3pm\r\nMiercoles: 10am - 11am', 'nutricion UPB.png', 1, '2020-11-04 17:11:05', '2020-11-04 21:12:10'),
(3, 8, 'Esdras Eliseo', 'Camaal', 'Chuc', 'Linuxero', 1, '9am-10am', NULL, 1, '2020-11-04 17:11:11', '2020-11-02 08:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `tutoria_grupal`
--

DROP TABLE IF EXISTS `tutoria_grupal`;
CREATE TABLE IF NOT EXISTS `tutoria_grupal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuatrimestre` int(11) DEFAULT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `grupo` varchar(5) DEFAULT NULL,
  `carrera_id` varchar(255) DEFAULT NULL,
  `dinamica` varchar(500) DEFAULT NULL,
  `observaciones` varchar(1500) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tutor_id` (`tutor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutoria_grupal`
--

INSERT INTO `tutoria_grupal` (`id`, `cuatrimestre`, `turno`, `grupo`, `carrera_id`, `dinamica`, `observaciones`, `fecha`, `tutor_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'Vespertino', 'B', '1', 'Ejercicios de programacion', 'padecen deficit de atencion', '2020-10-14 00:00:00', 1, '2020-11-07 18:27:14', '2020-11-08 00:27:14'),
(2, 4, '3', 'B', '3', 'programacion concurrente', 'Un buen grupo', '2020-11-02 00:00:00', 1, '2020-11-14 20:53:43', '2020-11-15 02:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `tutoria_individual`
--

DROP TABLE IF EXISTS `tutoria_individual`;
CREATE TABLE IF NOT EXISTS `tutoria_individual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` varchar(200) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `turno` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipo_tutoria` varchar(100) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `observaciones` varchar(1500) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `carrera_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tutor_id` (`tutor_id`),
  KEY `carrera_id` (`carrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutoria_individual`
--

INSERT INTO `tutoria_individual` (`id`, `alumno`, `cuatrimestre`, `turno`, `fecha`, `tipo_tutoria`, `duracion`, `observaciones`, `tutor_id`, `carrera_id`, `created_at`, `updated_at`) VALUES
(2, 'Ivan Ramirez', 4, 'Matutino', '2020-10-19 00:00:00', 'Academica', 30, 'deficit de atencio', 1, 1, '2020-11-14 20:39:39', '2020-10-22 07:51:19'),
(3, 'Jose Arena', 7, 'Matutino', '2020-10-20 00:00:00', 'Administrativa', 20, 'Fuma piedra.', 1, 1, '2020-11-14 20:39:44', '2020-10-22 07:50:10'),
(4, 'Cruz Tadeo', 6, 'Vespertino', '2020-11-02 00:00:00', 'Academica', 20, 'Problemas.', 1, 1, '2020-11-14 20:39:47', '2020-11-04 21:22:25'),
(5, 'Paco', 2, 'Matutino', '2020-11-12 00:00:00', 'Administrativa', 30, 'pruebas pruebas', 1, 5, '2020-11-14 20:58:36', '2020-11-15 02:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `estatus` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'Jahdiel Castaneda', 'jado99kc@gmail.com', '2020-10-10 01:52:19', '$2y$10$YEstmcqV/ME69Pn9WjPvnuKL3nQpu1qVE7TPnsGokxSDVh5ZalcJi', NULL, NULL, '2020-10-10 07:52:19', '2020-10-10 07:52:19'),
(3, 'Emmanuel', 'emmanuel@emmanuel.com', '2020-10-15 21:16:21', '$2y$10$zT7c6RfJz9b8kLHmsguKPu4BHrXgZmHUBxsPeRUbxPy.TA/QhPOCy', NULL, NULL, '2020-10-16 03:16:21', '2020-10-16 03:16:21'),
(4, 'ivan', 'ivan@ivan.com', '2020-10-17 01:41:13', '$2y$10$zUBaRYt1WiFZKwBauQSQeuDrHyHrHfciYesPrOMGhsrGK09hwTBWi', NULL, NULL, '2020-10-17 07:41:13', '2020-10-17 07:41:13'),
(5, 'Sebas', 'sebas@sebas.com', '2020-10-22 01:38:07', '$2y$10$XWSrYxaU/eH9FGNkmmdsN.ILsJqRtCgrXhNpslOMFHGa/VpN.WOGe', NULL, NULL, '2020-10-22 07:38:07', '2020-10-22 07:38:07'),
(6, 'Ingrid Asiria Poot Chagoya', 'ingrid.poot@upb.edu.mx', '2020-11-02 00:47:12', '$2y$10$VsRZNrXz5UkPSWeYrtjnfu4zmHUlgYjxfrVg6rq6en/1ku4dI7wZm', NULL, NULL, '2020-11-02 06:47:12', '2020-11-02 06:47:12'),
(8, 'Esdras Eliseo Chuc Camaal', 'esdras.chuc@upb.edu.mx', '2020-11-02 02:02:49', '$2y$10$JSvBNB0Y8iJrxMJRbtuTbemDGi3vM5..wcjmbx4EZAks8/GVMd6..', NULL, NULL, '2020-11-02 08:02:49', '2020-11-02 08:02:49'),
(9, 'Maria Juanita Contreras Contreras', 'mariacontreras@gmail.com', '2020-11-03 01:05:48', '$2y$10$XOQCfmRF6sqGRmPVHUlP9ueimO6j7F2VBVNfpwFcGSMGsD.AzpFiK', NULL, NULL, '2020-11-03 07:05:48', '2020-11-03 07:05:48'),
(10, 'JoseJose', 'josejose@gmail.com', '2020-11-04 15:14:10', '$2y$10$qkZPHLHT53ta676eYLZGKu2QBGGA.xHmZNSR7RN9F1tWLVA.BJ89C', NULL, NULL, '2020-11-04 21:14:10', '2020-11-04 21:14:10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `alumno_monitor`
--
ALTER TABLE `alumno_monitor`
  ADD CONSTRAINT `alumno_monitor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `alumno_monitor_ibfk_2` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `alumno_monitor_ibfk_3` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`);

--
-- Constraints for table `alumno_tutorado`
--
ALTER TABLE `alumno_tutorado`
  ADD CONSTRAINT `alumno_tutorado_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `alumno_tutorado_ibfk_2` FOREIGN KEY (`alumno_monitor_id`) REFERENCES `alumno_monitor` (`id`);

--
-- Constraints for table `inf_psico`
--
ALTER TABLE `inf_psico`
  ADD CONSTRAINT `inf_psico_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `inf_psico_ibfk_2` FOREIGN KEY (`psicologo_id`) REFERENCES `psicologos` (`id`);

--
-- Constraints for table `materia_tutorada`
--
ALTER TABLE `materia_tutorada`
  ADD CONSTRAINT `materia_tutorada_ibfk_1` FOREIGN KEY (`alumno_tutorado_id`) REFERENCES `alumno_tutorado` (`id`);

--
-- Constraints for table `psicologos`
--
ALTER TABLE `psicologos`
  ADD CONSTRAINT `psicologos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reporte_final`
--
ALTER TABLE `reporte_final`
  ADD CONSTRAINT `reporte_final_ibfk_1` FOREIGN KEY (`alumno_monitor_id`) REFERENCES `alumno_monitor` (`id`),
  ADD CONSTRAINT `reporte_final_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`);

--
-- Constraints for table `reporte_sesion`
--
ALTER TABLE `reporte_sesion`
  ADD CONSTRAINT `reporte_sesion_ibfk_1` FOREIGN KEY (`alumno_monitor_id`) REFERENCES `alumno_monitor` (`id`);

--
-- Constraints for table `sol_apoyo`
--
ALTER TABLE `sol_apoyo`
  ADD CONSTRAINT `sol_apoyo_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`);

--
-- Constraints for table `sol_enviada`
--
ALTER TABLE `sol_enviada`
  ADD CONSTRAINT `sol_enviada_ibfk_1` FOREIGN KEY (`sol_apoyo_id`) REFERENCES `sol_apoyo` (`id`),
  ADD CONSTRAINT `sol_enviada_ibfk_2` FOREIGN KEY (`psicologo_id`) REFERENCES `psicologos` (`id`);

--
-- Constraints for table `tutores`
--
ALTER TABLE `tutores`
  ADD CONSTRAINT `tutores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tutores_ibfk_2` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`);

--
-- Constraints for table `tutoria_grupal`
--
ALTER TABLE `tutoria_grupal`
  ADD CONSTRAINT `tutoria_grupal_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`);

--
-- Constraints for table `tutoria_individual`
--
ALTER TABLE `tutoria_individual`
  ADD CONSTRAINT `tutoria_individual_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutores` (`id`),
  ADD CONSTRAINT `tutoria_individual_ibfk_2` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
