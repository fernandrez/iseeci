-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Set 08, 2014 alle 11:02
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hormigon`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'es', 'Operaciones'),
(2, 'es', 'Checklists de Arranque'),
(3, 'es', 'Ver'),
(4, 'es', 'Check de Arranque'),
(5, 'es', 'Id'),
(6, 'es', 'Planta|Plantas'),
(7, 'es', 'Encargado|Encargados'),
(8, 'es', 'Fecha Hora'),
(9, 'es', 'Fecha Hora Hecho'),
(10, 'es', 'Check de Operaciones'),
(11, 'es', 'Revisión de nivel de inventario de aditivos'),
(12, 'es', 'Revisión de cantidad de agregados'),
(13, 'es', 'Encender command alkon estación manual'),
(14, 'es', 'Prender caja de control de alkon'),
(15, 'es', 'Encender impresora fiscal'),
(16, 'es', 'Encender computadora'),
(17, 'es', 'Inicializar sistema command batch'),
(18, 'es', 'Revisión de programación del día'),
(19, 'es', 'Revisión de horario de entrada de operadores'),
(20, 'es', 'Observaciones'),
(21, 'es', 'Check de Planta'),
(22, 'es', 'Revisar que las bandas transportadoras estén sin material '),
(23, 'es', 'Verificar que las compuertas de agregados y cemento estén cerrados '),
(24, 'es', 'Caja de breakers encendida'),
(25, 'es', 'Validar que no haya fugas de aire'),
(26, 'es', 'Revisión de nivel de aceite en los compresores '),
(27, 'es', 'Encender compresores'),
(28, 'es', 'Revisión de nivel de aceite y combustible en el blower de cemento '),
(29, 'es', 'Revisión de rolos de tracción'),
(30, 'es', 'Revisión de las correas del motor de la banda transportadora'),
(31, 'es', 'Revisión de la chumacera y pistones de la electroválvula de las compuertas de agregados y cemento'),
(32, 'es', 'Revisión del motor sin fin'),
(33, 'es', 'Revisión de la tolva receptora de material'),
(34, 'es', 'Verificar estado de vibradores de cemento y agregados'),
(35, 'es', 'Verificar mangas de cemento y agregados'),
(36, 'es', 'Revisión de bombas de agua'),
(37, 'es', 'Revisión de nivel de cemento'),
(38, 'es', 'Ver'),
(39, 'es', 'Checklist de Arranque'),
(41, 'es', 'Administrar Checklists de Arranque'),
(42, 'es', 'Puedes usar operadores de comparación(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>o <b>=</b>) al principio de los valores de busqueda para especificar la comparacióna uilizar'),
(43, 'es', 'Selecciona Planta'),
(44, 'es', 'Selecciona Usuario'),
(45, 'es', 'Programar Checklist'),
(47, 'es', 'Calendario de Checklists de Arranque'),
(48, 'es', 'Septiembre'),
(49, 'es', 'Dom'),
(50, 'es', 'Lun'),
(51, 'es', 'Mar'),
(52, 'es', 'Mie'),
(53, 'es', 'Jue'),
(54, 'es', 'Vie'),
(55, 'es', 'Sab'),
(56, 'es', 'Programación en Lote'),
(57, 'es', 'Admnistrar Checklists'),
(62, 'es', 'Programar'),
(86, 'es', 'Diligenciar'),
(87, 'es', 'Diligenciar Checklist de Arranque #'),
(88, 'es', 'Checks Operaciones'),
(89, 'es', 'Siguiente'),
(90, 'es', 'Rutina Diaria del Operador'),
(92, 'es', 'Mantenimiento de Planta'),
(93, 'es', 'Mantenimiento de Flota'),
(95, 'es', '{username} cambió {clase}[{pk}]'),
(96, 'es', 'Checks Planta'),
(97, 'es', 'Terminar'),
(116, 'es', 'Diligenciar Checklists'),
(117, 'es', 'Borrar Checklist'),
(118, 'es', 'Calendario de Checklists'),
(120, 'es', 'Búsqueda Avanzada'),
(121, 'es', 'id'),
(122, 'es', 'Código'),
(123, 'es', 'Nombre'),
(124, 'es', 'Fecha Hora'),
(126, 'es', 'Crear Checklist de Arranque'),
(127, 'es', 'Ver Checklist'),
(128, 'es', 'Programaci??n en Lote'),
(140, 'es', 'Código de Verificación'),
(141, 'es', 'ProgramaciÃ³n en lote'),
(143, 'es', 'Lista de Plantas'),
(144, 'es', 'Crear Planta'),
(145, 'es', 'Editar Planta'),
(146, 'es', 'Borrar Planta'),
(147, 'es', 'Administrar Plantas'),
(148, 'es', 'No estás autorizado a realizar esta acción.'),
(149, 'es', 'Login'),
(150, 'es', 'Login'),
(151, 'es', 'Por favor ingresa tus credenciales en el siguiente formulario'),
(152, 'es', 'Por favor ingresa tus credenciales en el siguiente formulario'),
(153, 'es', 'Campos con <span class="required">*</span> son requeridos.'),
(154, 'es', 'Campos con <span class="required">*</span> son requeridos.'),
(155, 'es', 'Recordarme'),
(156, 'es', 'Recordarme'),
(157, 'es', 'Username o Email'),
(158, 'es', 'Username o Email'),
(159, 'es', 'Contraseña'),
(160, 'es', 'Contraseña'),
(161, 'es', 'Registrar'),
(162, 'es', 'Registrar'),
(163, 'es', 'Olvidaste la contraseña?'),
(164, 'es', 'Olvidaste la contraseña?'),
(165, 'es', 'Username incorrecto (longitud entre 3 y 30 caracteres).'),
(166, 'es', 'Username incorrecto (longitud entre 3 y 30 caracteres).'),
(167, 'es', 'Contraseña Incorrecta (mínimo 4 símbolos).'),
(168, 'es', 'Contraseña Incorrecta (mínimo 4 símbolos).'),
(169, 'es', 'Este Username ya existe.'),
(170, 'es', 'Este Username ya existe.'),
(171, 'es', 'Este Email ya existe.'),
(172, 'es', 'Este Email ya existe.'),
(173, 'es', 'Símbolos incorrectos (a-z0-9).'),
(174, 'es', 'Símbolos incorrectos (a-z0-9).'),
(176, 'es', '{username} creó {clase}[{pk}]'),
(177, 'es', '{username} cambió {clase}[{pk}]'),
(178, 'es', 'Diligenciar Checklist'),
(198, 'es', 'Rutinas Diarias de Operador'),
(199, 'es', 'Diligenciar Checklist'),
(229, 'es', 'Sin Máquinas'),
(230, 'es', 'Máquina'),
(231, 'es', 'Operador'),
(232, 'es', 'Revisado'),
(233, 'es', 'Fecha Hora Hecho'),
(234, 'es', 'Limpieza de parabrisas'),
(235, 'es', 'Verificar el funcionamiento de los parabrisas'),
(236, 'es', 'Quitarle la presión al tanque de agua'),
(237, 'es', 'Revisión de la dirección'),
(238, 'es', 'Revisión de los niveles del aceite del motor'),
(239, 'es', 'Revisión de los niveles del aceite del hidráulico'),
(240, 'es', 'Revisión de los niveles de coolant'),
(241, 'es', 'Cargar combustible'),
(242, 'es', 'Revisión de alarma de retroceso'),
(243, 'es', 'Revisión de luces'),
(244, 'es', 'Revisión de llantas'),
(245, 'es', 'Revisión del reloj de slump'),
(246, 'es', 'Revisión de la seguridad de las galas'),
(247, 'es', 'Extintor vigente'),
(248, 'es', 'Documentación completa del vehículo'),
(249, 'es', 'Tarjeta de pesas y dimensiones'),
(250, 'es', 'Triángulo de seguridad'),
(251, 'es', 'Limpieza del vehículo y la tolva'),
(252, 'es', 'Drenar tanques de aire'),
(253, 'es', 'Llenar tanque de agua'),
(256, 'es', 'Rutinas Diarias de Operadores'),
(258, 'es', 'Administrar'),
(259, 'es', 'Diligenciar'),
(260, 'es', 'Crear'),
(261, 'es', 'Órdenes de Trabajo'),
(262, 'es', 'Lista de Rutinas de Operadores'),
(263, 'es', 'Crear Rutina de Operador'),
(264, 'es', 'Administrar Rutinas de Operador'),
(265, 'es', 'Rutinas de Operadores');

-- --------------------------------------------------------

--
-- Struttura della tabella `sourcemessage`
--

CREATE TABLE IF NOT EXISTS `sourcemessage` (
`id` int(11) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=313 ;

--
-- Dump dei dati per la tabella `sourcemessage`
--

INSERT INTO `sourcemessage` (`id`, `category`, `message`) VALUES
(1, 'ops', 'operaciones'),
(2, 'ops', 'checklists de arranque'),
(3, 'ops', 'view'),
(4, 'ops', 'check de arranque'),
(5, 'ops', 'id'),
(6, 'ops', 'planta'),
(7, 'ops', 'encargado'),
(8, 'ops', 'fecha hora'),
(9, 'ops', 'fecha hora done'),
(10, 'ops', 'check operaciones'),
(11, 'ops', 'revision de nivel de inventario  de aditivos'),
(12, 'ops', 'revision de cantidad de agregados'),
(13, 'ops', 'encender command alkon estacion manual'),
(14, 'ops', 'prender caja de control de alkon'),
(15, 'ops', 'encender impresora fiscal'),
(16, 'ops', 'encender computadora'),
(17, 'ops', 'inicializar sistema command batch'),
(18, 'ops', 'revision de programacion del dia'),
(19, 'ops', 'revision de horario de entrada de operadores'),
(20, 'ops', 'observaciones'),
(21, 'ops', 'check planta'),
(22, 'ops', 'revisar que las bandas transportadoras esten sin material '),
(23, 'ops', 'verificar que las compuertas de agregados y cemento esten cerrados '),
(24, 'ops', 'caja de breakers encendida'),
(25, 'ops', 'validar que no haya fugas de aire'),
(26, 'ops', 'revision de nivel de aceite en los compresores '),
(27, 'ops', 'encender compresores'),
(28, 'ops', 'revision de nivel de aceite y combustible en el blower de cemento '),
(29, 'ops', 'revision de rolos de traccion'),
(30, 'ops', 'revision de las correas del motor de la banda transportadora'),
(31, 'ops', 'revision de la chumacera y pistones de la electrovalvula de las compuertas de agregados y cemento'),
(32, 'ops', 'revision del motor sin fin'),
(33, 'ops', 'revision de la tolva receptora de material'),
(34, 'ops', 'verificar estado de vibradores de cemento y agregados'),
(35, 'ops', 'verificar mangas de cemento y agregados'),
(36, 'ops', 'revision de bombas de agua'),
(37, 'ops', 'revision de nivel de cemento'),
(38, 'ops', 'ver'),
(39, 'ops', 'checklist de arranque'),
(41, 'ops', 'administrar checklists de arranque'),
(42, 'ops', 'puedes usar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>\no <b>=</b>) al principio de los valores de busqueda para especificar la comparacion a uilizar'),
(43, 'base', 'selecciona planta'),
(44, 'app', 'selecciona usuario'),
(45, 'ops', 'programar checklist'),
(47, 'ops', 'calendario de checklists de arranque'),
(48, 'ecalendarview', 'september'),
(49, 'ecalendarview', 'sun'),
(50, 'ecalendarview', 'mon'),
(51, 'ecalendarview', 'tue'),
(52, 'ecalendarview', 'wed'),
(53, 'ecalendarview', 'thu'),
(54, 'ecalendarview', 'fri'),
(55, 'ecalendarview', 'sat'),
(56, 'ops', 'programación en lote'),
(57, 'ops', 'admnistrar checklists'),
(62, 'ops', 'programar'),
(86, 'ops', 'update'),
(87, 'ops', 'diligenciar checklist de arranque #'),
(88, 'ops', 'checks operaciones'),
(89, 'ops', 'siguiente'),
(90, 'ops', 'rutina diaria del operador'),
(92, 'ops', 'mantenimiento de planta'),
(93, 'ops', 'mantenimiento de flota'),
(95, 'app', '{username} cambió {clase}[{pk}]'),
(96, 'ops', 'checks planta'),
(97, 'ops', 'terminar'),
(116, 'ops', 'diligenciar checklists'),
(117, 'ops', 'borrar checklist'),
(118, 'ops', 'calendario de checklists'),
(120, 'ops', 'busqueda avanzada'),
(121, 'app', 'id'),
(122, 'app', 'codigo'),
(123, 'app', 'nombre'),
(124, 'app', 'fecha hora'),
(126, 'ops', 'crear checklist de arranque'),
(127, 'ops', 'ver checklist'),
(140, 'ops', 'verification code'),
(141, 'ops', 'programacion en lote'),
(143, 'base', 'lista de plantas'),
(144, 'base', 'crear planta'),
(145, 'base', 'editar planta'),
(146, 'base', 'borrar planta'),
(147, 'base', 'administrar plantas'),
(148, 'rightsmodule.core', 'you are not authorized to perform this action.'),
(149, 'usermodule', 'login'),
(150, 'usermodule.user', 'login'),
(151, 'usermodule', 'please fill out the following form with your login credentials:'),
(152, 'usermodule.user', 'please fill out the following form with your login credentials:'),
(153, 'usermodule', 'fields with <span class="required">*</span> are required.'),
(154, 'usermodule.user', 'fields with <span class="required">*</span> are required.'),
(155, 'usermodule', 'remember me next time'),
(156, 'usermodule.user', 'remember me next time'),
(157, 'usermodule', 'username or email'),
(158, 'usermodule.user', 'username or email'),
(159, 'usermodule', 'password'),
(160, 'usermodule.user', 'password'),
(161, 'usermodule', 'register'),
(162, 'usermodule.user', 'register'),
(163, 'usermodule', 'lost password?'),
(164, 'usermodule.user', 'lost password?'),
(165, 'usermodule', 'incorrect username (length between 3 and 30 characters).'),
(166, 'usermodule.user', 'incorrect username (length between 3 and 30 characters).'),
(167, 'usermodule', 'incorrect password (minimal length 4 symbols).'),
(168, 'usermodule.user', 'incorrect password (minimal length 4 symbols).'),
(169, 'usermodule', 'this user''s name already exists.'),
(170, 'usermodule.user', 'this user''s name already exists.'),
(171, 'usermodule', 'this user''s email address already exists.'),
(172, 'usermodule.user', 'this user''s email address already exists.'),
(173, 'usermodule', 'incorrect symbols (a-z0-9).'),
(174, 'usermodule.user', 'incorrect symbols (a-z0-9).'),
(176, 'app', '{username} creo {clase}[{pk}]'),
(177, 'app', '{username} cambio {clase}[{pk}]'),
(198, 'ops', 'Rutinas Diarias de Operador'),
(199, 'ops', 'Diligenciar Checklist'),
(229, 'base', 'Sin Máquinas'),
(230, 'ops', 'maquina'),
(231, 'ops', 'operador'),
(232, 'ops', 'revisado'),
(233, 'ops', 'fecha hora hecho'),
(234, 'ops', 'limpieza de parabrisas'),
(235, 'ops', 'verificar el funcionamiento de los parabrisas'),
(236, 'ops', 'quitarle la presión al tanque de agua'),
(237, 'ops', 'revisión de la dirección'),
(238, 'ops', 'revisión de los niveles del aceite del motor'),
(239, 'ops', 'revisión de los niveles del aceite del hidráulico'),
(240, 'ops', 'revisión de los niveles de coolant'),
(241, 'ops', 'cargar combustible'),
(242, 'ops', 'revisión de alarma de retroceso'),
(243, 'ops', 'revisión de luces'),
(244, 'ops', 'revision de lantas'),
(245, 'ops', 'revisión del reloj de slump'),
(246, 'ops', 'revisión de la seguridad de las galas'),
(247, 'ops', 'extintor vigente'),
(248, 'ops', 'documentación completa del vehículo'),
(249, 'ops', 'tarjeta de pesas y dimensiones'),
(250, 'ops', 'triángulo de seguridad'),
(251, 'ops', 'limpieza del vehículo y la tolva'),
(252, 'ops', 'drenar tanques de aire'),
(253, 'ops', 'llenar tanque de agua'),
(256, 'ops', 'Rutinas Diarias de Operadores'),
(258, 'ops', 'Administrar'),
(259, 'ops', 'Diligenciar'),
(260, 'ops', 'Crear'),
(261, 'ops', 'Órdenes de Trabajo'),
(262, 'ops', 'Lista de RutinaDiariaOperador'),
(263, 'ops', 'Crear RutinaDiariaOperador'),
(264, 'ops', 'Administrar RutinaDiariaOperador'),
(265, 'ops', 'Rutinas de Operadores'),
(266, 'ops', 'Programar Rutina'),
(267, 'base', 'Selecciona Máquina'),
(268, 'ops', ' para '),
(269, 'ops', 'Ver RutinaDiariaOperador'),
(270, 'ops', 'Diligenciar RutinaDiariaOperador'),
(271, 'ops', 'Editar RutinaDiariaOperador'),
(272, 'ops', 'Borrar RutinaDiariaOperador'),
(273, 'ops', 'Checks de Rutina'),
(274, 'UserModule', 'Users'),
(275, 'UserModule.user', 'Users'),
(276, 'UserModule', 'List User'),
(277, 'UserModule.user', 'List User'),
(278, 'UserModule', 'View User'),
(279, 'UserModule.user', 'View User'),
(280, 'UserModule', 'Id'),
(281, 'UserModule.user', 'Id'),
(282, 'UserModule', 'username'),
(283, 'UserModule.user', 'username'),
(284, 'UserModule', 'Retype Password'),
(285, 'UserModule.user', 'Retype Password'),
(286, 'UserModule', 'E-mail'),
(287, 'UserModule.user', 'E-mail'),
(288, 'UserModule', 'Verification Code'),
(289, 'UserModule.user', 'Verification Code'),
(290, 'UserModule', 'activation key'),
(291, 'UserModule.user', 'activation key'),
(292, 'UserModule', 'Registration date'),
(293, 'UserModule.user', 'Registration date'),
(294, 'UserModule', 'Last visit'),
(295, 'UserModule.user', 'Last visit'),
(296, 'UserModule', 'Superuser'),
(297, 'UserModule.user', 'Superuser'),
(298, 'UserModule', 'Status'),
(299, 'UserModule.user', 'Status'),
(300, 'UserModule', 'Asistente administrativo '),
(301, 'UserModule.user', 'Asistente administrativo '),
(302, 'UserModule', 'Asistente operativo'),
(303, 'UserModule.user', 'Asistente operativo'),
(304, 'UserModule', 'Administrador'),
(305, 'UserModule.user', 'Administrador'),
(306, 'ops', 'Sólo se permite programar una rutina por día para cada máquina'),
(307, 'ops', 'View RutinaDiariaOperador'),
(308, 'ops', 'Marcar Revisado'),
(309, 'ops', 'Generar OT''s de Averiado'),
(310, 'ops', 'Generar OT''s de Mantenimiento'),
(311, 'ops', 'Generar OT''s de Averiado y Mantenimiento'),
(312, 'ops', 'Generar OT''s de ambos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`,`language`);

--
-- Indexes for table `sourcemessage`
--
ALTER TABLE `sourcemessage`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sourcemessage`
--
ALTER TABLE `sourcemessage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=313;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
