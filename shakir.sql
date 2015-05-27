/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : shakir

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2015-04-25 12:23:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Status` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES ('1', 'Art', '');
INSERT INTO `tbl_category` VALUES ('2', 'Toy', '');

-- ----------------------------
-- Table structure for `tbl_challan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_challan`;
CREATE TABLE `tbl_challan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ChallanNo` varchar(100) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CustID` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ChallanNo` (`ChallanNo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_challan
-- ----------------------------
INSERT INTO `tbl_challan` VALUES ('5', '1001', '2015-04-18 00:00:00', 'Shakir Mengrani');
INSERT INTO `tbl_challan` VALUES ('6', '1002', '2015-04-18 00:00:00', 'Bilal Ashraf');

-- ----------------------------
-- Table structure for `tbl_customer`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Pwd` text NOT NULL,
  `EMail` varchar(200) NOT NULL,
  `Address` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UK_UserName` (`Username`),
  UNIQUE KEY `UK_EMail` (`EMail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_customer
-- ----------------------------
INSERT INTO `tbl_customer` VALUES ('1', 'Shakir Mengrani', 'shakirmengrani', '786', 'shakir_1304f@aptechgdn.com', 'asd');
INSERT INTO `tbl_customer` VALUES ('2', 'Hammad Mengrani', 'hammadmengrani', '778', 'hammad_1304f@gmail.com', 'asd');

-- ----------------------------
-- Table structure for `tbl_ditems`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ditems`;
CREATE TABLE `tbl_ditems` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ChNo` varchar(100) NOT NULL,
  `ItemCode` varchar(200) NOT NULL,
  `ItemName` varchar(200) NOT NULL,
  `Rate` float NOT NULL,
  `Qty` float NOT NULL,
  `Amount` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_ditems
-- ----------------------------
INSERT INTO `tbl_ditems` VALUES ('5', '1001', '1001', 'ABC', '200', '15', '3000');
INSERT INTO `tbl_ditems` VALUES ('6', '1001', '1002', 'ASD', '200', '14', '3001');
INSERT INTO `tbl_ditems` VALUES ('7', '1002', '1001', 'ABC', '200', '15', '3000');
INSERT INTO `tbl_ditems` VALUES ('8', '1002', '1003', 'ASDF', '2000', '1', '20000');

-- ----------------------------
-- Table structure for `tbl_order`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `OrderNo` varchar(255) NOT NULL,
  `CustId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Ocustid` (`CustId`),
  KEY `fk_OItemid` (`ItemId`),
  CONSTRAINT `fk_OItemid` FOREIGN KEY (`ItemId`) REFERENCES `tbl_product` (`ID`),
  CONSTRAINT `fk_Ocustid` FOREIGN KEY (`CustId`) REFERENCES `tbl_customer` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_order
-- ----------------------------
INSERT INTO `tbl_order` VALUES ('1', '2015-04-25 12:04:34', '1001', '1', '1', '100', '25', '1');

-- ----------------------------
-- Table structure for `tbl_product`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Cat_Id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `fk_cat_Id` (`Cat_Id`),
  CONSTRAINT `fk_cat_Id` FOREIGN KEY (`Cat_Id`) REFERENCES `tbl_category` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES ('1', 'ABC', '100', '1', '2015-04-24 11:51:58');
INSERT INTO `tbl_product` VALUES ('2', 'DEF', '200', '2', '2015-04-24 11:53:27');
