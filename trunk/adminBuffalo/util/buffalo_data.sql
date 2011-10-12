/*
MySQL Data Transfer
Source Host: localhost
Source Database: buffalo
Target Host: localhost
Target Database: buffalo
Date: 12/10/2011 12:54:40 a.m.
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for detalleproducto
-- ----------------------------
DROP TABLE IF EXISTS `detalleproducto`;
CREATE TABLE `detalleproducto` (
  `id_detalle_producto` int(11) NOT NULL auto_increment,
  `titulo` varchar(45) NOT NULL,
  `foto_detalle` varchar(45) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY  (`id_detalle_producto`),
  KEY `fk_DetalleProducto_MasterProducto` (`id_producto`),
  CONSTRAINT `fk_DetalleProducto_MasterProducto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for master
-- ----------------------------
DROP TABLE IF EXISTS `master`;
CREATE TABLE `master` (
  `id_master` int(11) NOT NULL auto_increment,
  `clase` varchar(45) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  PRIMARY KEY  (`id_master`),
  KEY `fk_Master_Vehiculo1` (`id_vehiculo`),
  CONSTRAINT `fk_Master_Vehiculo1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL auto_increment,
  `modelo` varchar(45) NOT NULL,
  `foto_principal` varchar(45) NOT NULL,
  `foto_zoom_1` varchar(45) NOT NULL,
  `foto_zoom_2` varchar(45) NOT NULL,
  `foto_zoom_3` varchar(45) default NULL,
  `foto_zoom_4` varchar(45) default NULL,
  `descripcion` varchar(255) NOT NULL,
  `ficha_tecnica` varchar(45) NOT NULL,
  `id_master` int(11) NOT NULL,
  PRIMARY KEY  (`id_producto`),
  KEY `fk_Producto_Master1` (`id_master`),
  CONSTRAINT `fk_Producto_Master1` FOREIGN KEY (`id_master`) REFERENCES `master` (`id_master`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `detalleproducto` VALUES ('1', 'TANQUE DE CARBONO', '', 'Mayor durabilidad de tanque, además con este material en el tanque se impide la emisión de particulas de metal que si se dan en los tanques convencionales acortando la vida del motor', '3'), ('2', 'PLANCHA DE ACERO PROTECTORA DE MOTOR', '', 'Proteccion al motor contra choques, piedras, etc en caminos de dificil acceso', '3'), ('3', 'SUSPENSION MONOSHOCK', '', 'Sistema de suspension que permite mayor estabilidad y suavidad al conducir', '3'), ('4', '', '', 'Estructura con chasis reforzado', '5'), ('5', '', '', 'Timon con rodaje conico', '5'), ('6', '', '', 'Diseño moderno', '5');
INSERT INTO `master` VALUES ('1', 'DE PASEO', '1'), ('2', 'DE TRABAJO', '1'), ('3', 'TODO TERRENO', '1'), ('4', 'PISTERAS', '1'), ('5', 'MODELO DE MOTOTAXI Y COLORES', '2'), ('6', 'DE CARGA', '3'), ('7', 'DE PASAJEROS', '3');
INSERT INTO `producto` VALUES ('1', 'B5', ' ', ' ', ' ', ' ', ' ', '', ' ', '1'), ('2', 'B3CH', '', ' ', ' ', ' ', ' ', '', ' ', '2'), ('3', 'B15', '', '', '', null, null, 'La B15, una motocicleta diseñada para todo terreno y superar todas las exigencias de su conductor tanto para la ciudad y el campo, su alta performance y resistencia hacen de la B15 unica y especial en su categoria', '', '1'), ('4', 'B12', '', '', '', null, null, '', '', '1'), ('5', 'BF300', '', '', '', null, null, 'El BF300 cuenta con una estructura reforzada, carenado con parabrisas panoramico, asientos mas confortables y un nuevo faro cuadrado que hace este vehiculo lider en su categoria, ademas de la calidad de su motor, que garantiza un uso eficiente.', '', '5'), ('6', 'BF500', '', '', '', null, null, '', '', '6'), ('7', 'BF600', '', '', '', null, null, '', '', '6'), ('8', 'BF500 PASAJEROS', '', '', '', null, null, '', '', '7');
INSERT INTO `vehiculo` VALUES ('1', 'Motocicletas'), ('2', 'Mototaxis'), ('3', 'Furgon');
