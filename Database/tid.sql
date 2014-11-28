/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50144
 Source Host           : localhost
 Source Database       : tid

 Target Server Type    : MySQL
 Target Server Version : 50144
 File Encoding         : utf-8

 Date: 10/10/2013 08:54:45 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `auth_codes`
-- ----------------------------
DROP TABLE IF EXISTS `auth_codes`;
CREATE TABLE `auth_codes` (
  `code` varchar(40) NOT NULL,
  `client_id` varchar(20) NOT NULL,
  `redirect_uri` varchar(200) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expires` int(11) NOT NULL,
  `scope` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `auth_codes`
-- ----------------------------
BEGIN;
INSERT INTO `auth_codes` VALUES ('61a72b097ff3e9b55796f2ba121ba4e3', '111', 'redirect_uri', null, '1380218201', 'userinfo,userinfo'), ('b10dff400da55c56bd1ef061fc0ac96e', '111', 'redirect_uri', null, '1380218231', 'userinfo'), ('bbaa2aba78bdd0a493c09f1763dcffaa', '111', 'redirect_uri', null, '1380218392', 'userinfo'), ('b637a2cf64912087567e41a4f2acad0b', '111', 'redirect_uri', '5', '1380257251', 'userinfo,userinfo'), ('f29abfcfa76885d664a1ba09cc7e2e84', '112', 'redirect_uri', '5', '1380259078', 'userinfo'), ('0779afe5d5227777278329f867a23ae3', '112', 'redirect_uri', '5', '1380259243', 'userinfo'), ('fda23ffac547a8a80fbca350b76c81c9', '112', 'redirect_uri', '5', '1380259614', 'userinfo'), ('ee9e31406866116ca1e9ac59139aa3be', '112', 'http://test.tid.com/login.php', '5', '1380260414', 'userinfo'), ('9f9d3dccc889f7cd90311b1c32ae2095', '112', 'http://test.tid.com/login.php', '5', '1380260467', 'userinfo'), ('5e8d1dee378fffcc0aa444a02cdd4af8', '112', 'http://test.tid.com/login.php', '5', '1380261034', 'userinfo'), ('3a3917900d550bad74c7129b035efa4d', '112', 'http://test.tid.com/login.php', '5', '1380261476', 'userinfo'), ('e4e6355786c724933be5daa8bc7c6f1f', '112', 'http://test.tid.com/login.php', '5', '1380261721', 'userinfo'), ('06fc5b9dd5eb7ba77794104e8fdb8f4c', '112', 'http://test.tid.com/login.php', '5', '1380261725', 'userinfo'), ('594d5cdbcbc3b8ce49421031a8653ec7', '112', 'http://test.tid.com/login.php', '5', '1380261729', 'userinfo'), ('1d267cc875563080301d072172c04a61', '112', 'http://test.tid.com/login.php', '5', '1380276403', 'userinfo'), ('b234a9b677a6b70eeb406c765a3d5e05', '112', 'http://test.tid.com/login.php', '5', '1380276649', 'userinfo'), ('1050ef56ec5f2fe45b08fb1615ba101a', '112', 'http://test.tid.com/login.php', '5', '1380276991', 'userinfo'), ('18c55caf36e06030c64dadcdc224b1a7', '112', 'http://test.tid.com/login.php', '5', '1380277016', 'userinfo'), ('fe280ac4327522b20d0d7e714e78f892', '112', 'http://test.tid.com/login.php', '5', '1380277095', 'userinfo'), ('2e4e95475b4a2f773fdf1346276c7b16', '112', 'http://test.tid.com/login.php', '5', '1380277119', 'userinfo'), ('3c33b78901a58a67f7d030c4bfb14fc6', '112', 'http://test.tid.com/login.php', '5', '1380277197', 'userinfo'), ('5956e5976551f10e18cd462ea6fe2ab4', '112', 'http://test.tid.com/login.php', '5', '1380277226', 'userinfo'), ('de4e2a71cd426b235f799317e75434af', '112', 'http://test.tid.com/login.php', '5', '1380277474', 'userinfo'), ('b687dce162dfc59514f327d62c16d328', '112', 'http://test.tid.com/login.php', '5', '1380277582', 'userinfo'), ('ecd7edbeb14a2682578ba1a0fddc96df', '112', 'http://test.tid.com/login.php', '5', '1380278202', 'userinfo'), ('1586372a2c3135f248a0347350bd32dc', '112', 'http://test.tid.com/login.php', '5', '1380289640', 'userinfo'), ('c74d8de4bddb699f521085f2ce448634', '112', 'http://test.tid.com/login.php', '5', '1380289950', 'userinfo'), ('137f8959502124fbf147495a8aa4a4c7', '113', 'http://test2.tid.com/login.php', '5', '1380289964', 'userinfo'), ('9dbe8c86e34dd17807a27b440732a905', '112', 'http://test.tid.com/login.php', '5', '1380305451', 'userinfo'), ('9aa4c2c52f8188ada51638282020b28d', '112', 'http://test.tid.com/login.php', '5', '1380306857', 'userinfo'), ('1c5d605fb1838660289b818f228b509f', '112', 'http://test.tid.com/login.php', '5', '1380308105', 'userinfo'), ('afd44cd5731f8659e1c4e529a3dce5e3', '112', 'http://test.tid.com/login.php', '5', '1380308192', 'userinfo'), ('144dc4aa981ea05ee33f18526035dd79', '112', 'http://test.tid.com/login.php', '5', '1380308338', 'userinfo'), ('c21c74b1512b56b6277676d32dc332f5', '112', 'http://test.tid.com/login.php', '5', '1380308442', 'userinfo'), ('2db8d73c19566e6413ae08eb814022de', '112', 'http://test.tid.com/login.php', '5', '1380308537', 'userinfo'), ('abc87f2f599c2bf597786536298a71ec', '112', 'http://test.tid.com/login.php', '5', '1380308560', 'userinfo'), ('e083419b4339dd918ad59dfc48bd3927', '111', 'http://movie.tid.com/login.php', '5', '1380309214', 'userinfo'), ('23f5c02db421bc8ddc10e9e0e193b828', '111', 'http://movie.tid.com/login.php', '5', '1380309241', 'userinfo'), ('804758d3325698de7a040e25fd1d0e0d', '113', 'http://music.tid.com/login.php', '5', '1380309303', 'userinfo'), ('96d5f41528d76bc591febfe4c04019ca', '111', 'http://movie.tid.com/login.php', '5', '1380337678', 'userinfo'), ('6ae835064f5ca34658c175be580ed045', '111', 'http://movie.tid.com/login.php', '5', '1380339628', 'userinfo'), ('b65bb5fbd0472488fe628e32299557c5', '111', 'http://movie.tid.com/login.php', '5', '1380339653', 'userinfo'), ('019f40da87165aae8b308954ee0cdcc5', '114', 'http://game.tid.com/login.php', '5', '1380339667', 'userinfo'), ('f90f8f73601dd5cb0d83e497487c117f', '114', 'http://game.tid.com/login.php', '5', '1380339680', 'userinfo'), ('153962225e643d0608ade6c0da26755c', '114', 'http://game.tid.com/login.php', '5', '1380339692', 'userinfo');
COMMIT;

-- ----------------------------
--  Table structure for `authorization`
-- ----------------------------
DROP TABLE IF EXISTS `authorization`;
CREATE TABLE `authorization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `authorization`
-- ----------------------------
BEGIN;
INSERT INTO `authorization` VALUES ('20', '5', '111', 'userinfo', '2013-09-28 11:39:58'), ('19', '5', '113', 'userinfo', '2013-09-28 03:14:33');
COMMIT;

-- ----------------------------
--  Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `client_id` varchar(10) NOT NULL DEFAULT '',
  `client_secret` varchar(100) DEFAULT NULL,
  `redirect_uri` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `clients`
-- ----------------------------
BEGIN;
INSERT INTO `clients` VALUES ('111', 'sdf', 'http://movie.tid.com', 'Phim - Demo T-ID', 'Dịch vụ xem phim trực tuyến', '111.png', '0'), ('112', 'Game435346', 'http://game.tid.com', 'Trò chơi - Demo T-ID', 'Dịch vụ chơi game giải trí trực tuyến', '112.png', '0'), ('113', 'Music345345', 'http://music.tid.com', 'Âm nhạc - Demo T-ID', 'Demo 2', '113.png', '1'), ('114', 'abcd ', 'http://game.tid.com', 'TEst  sdf  sdf sdf', 'Demo test sdfsdf', '112.png', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tokens`
-- ----------------------------
DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `oauth_token` varchar(40) NOT NULL,
  `client_id` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expires` int(11) NOT NULL,
  `scope` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`oauth_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tokens`
-- ----------------------------
BEGIN;
INSERT INTO `tokens` VALUES ('c4b18bfe29bf2f3d0450358e6e71c561', '111', '5', '1380521928', 'userinfo'), ('1069018c581d13322bd720eeef7e6dc3', '111', null, '1380521962', 'userinfo'), ('769fbae5bca7d4bec79e13ef7ab67f04', '112', '5', '1380265046', 'userinfo'), ('c06d19957c4dcf5c1bd10fd377d3f8ef', '112', '5', '1380265292', 'userinfo'), ('02400be090bd678ce983aae7c6402eb2', '112', '5', '1380265296', 'userinfo'), ('9a955119cca14bc2e1ec359af9cdfc5e', '112', '5', '1380265299', 'userinfo'), ('41c433bcba8ae9c3f24bba879ccec199', '112', '5', '1380279973', 'userinfo'), ('27ec4161154e191c3499efc84833cc2f', '112', '5', '1380280219', 'userinfo'), ('5ce536047c7d1936b811ab8e78d2b9be', '112', '5', '1380280561', 'userinfo'), ('61157ba3595e715407ad76f0c367aa34', '112', '5', '1380280586', 'userinfo'), ('8a17ce8813aa85b7d3a7331e19fe5ac8', '112', '5', '1380280665', 'userinfo'), ('8cb3e06bdbb29eec11669f3eaa11b672', '112', '5', '1380280689', 'userinfo'), ('3cf4c846acc202da7969b03bc52a818d', '112', '5', '1380280767', 'userinfo'), ('b6653b4b7d83482989e6b76f61b305cd', '112', '5', '1380280796', 'userinfo'), ('c2560800cc1d5c9a14283dc00994000a', '112', '5', '1380281044', 'userinfo'), ('223afba022abe83435f8a6b75001082b', '112', '5', '1380281152', 'userinfo'), ('57be2e85cb1c0f77cd17ef3dced4f6fb', '112', '5', '1380281772', 'userinfo'), ('acdfb827d0292eb1df9480c4168978af', '112', '5', '1380293210', 'userinfo'), ('3bd8702d4217a91e1ae950f5be104a03', '112', '5', '1380293521', 'userinfo'), ('6ecd5ffcbcb887fa035417060c918f71', '113', '5', '1380293534', 'userinfo'), ('7bc6bb3a7aa08c1c1f08053a3bd6c1c7', '112', '5', '1380309021', 'userinfo'), ('dac25d2ff1e08888a217d06b5ff83ba8', '112', '5', '1380310427', 'userinfo'), ('4e414f0fa6d067028044c3b30766981f', '112', '5', '1380311675', 'userinfo'), ('dfa4ca574ac705448c5b941ceb128518', '112', '5', '1380311762', 'userinfo'), ('70b2431ee8b0c0d90d4110b2139f8c8d', '112', '5', '1380311908', 'userinfo'), ('5589b64a113faefa42c594d55a4e1d95', '112', '5', '1380312012', 'userinfo'), ('4990edfdc64d3fce937f1ca40611336e', '112', '5', '1380312107', 'userinfo'), ('a69cdfe4f36f81ed37ec2ff9c4b83681', '112', '5', '1380312131', 'userinfo'), ('72f05d1f909f113669c9a6959952375a', '111', '5', '1380312784', 'userinfo'), ('de25ace350f1468347c168a9e206482c', '111', '5', '1380312811', 'userinfo'), ('2ed1445d1fb4e62193e01975c1776e1c', '113', '5', '1380312873', 'userinfo'), ('a5df2103e86158eb75a9f5365589b32b', '111', '5', '1380341248', 'userinfo'), ('327d2b5c7c3c9da8beea93119cdb07f6', '111', '5', '1380343198', 'userinfo'), ('d5d1b0462bfdcced124bfb4a96018325', '111', '5', '1380343223', 'userinfo'), ('6fa6a9529a213946c2644ba01cc4046b', '114', '5', '1380343262', 'userinfo');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cmnd` varchar(20) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `isadmin` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `forgotcode` varchar(255) DEFAULT NULL,
  `forgotexpire` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'ẻ', 'tẻt', 'sdf', null, 'sdf', '2013-09-25', null, null, null, null, null, null, '1', null, null), ('2', 'sdfsdf@fsdfsdf.com', 'sdfsdf', 'sdfsdf', null, '7aa92563864f02bf415cac7f23d8b05e', '2009-03-02', '1', null, null, null, null, null, '1', null, null), ('4', 'sdfxsdf@fsdfsdf.com', 'sdfsdf', 'sdfsdsdf', null, '69daa83ef8446461a30c2b038e12d5f7', '2009-03-03', '1', null, null, null, '2013-09-26 01:41:47', null, '1', null, null), ('5', 'test@gmail.com', 'Tùng', 'Nguyễn Thanh', '1131.png', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '2010-01-23', '1', 'Nguyễn Thanh', '1243324', '4335345', '2013-09-26 02:49:42', '1', '1', '', '2013-09-26 15:03:29'), ('6', 'test2@gmail.com', 'Test', 'Test', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', '1993-04-21', '1', null, null, null, '2013-09-28 11:08:01', '0', '2', null, null), ('7', 'test3@gmail.com', 'Test`', 'Test', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', '1993-04-21', '1', null, null, null, '2013-09-28 11:09:28', '0', '2', null, null), ('8', 'test4@gmail.com', 'Test`', 'Test', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', '1993-04-21', '1', null, null, null, '2013-09-28 11:11:11', '0', '2', null, null), ('9', 'test5@gmail.com', 'sd fsdf', 'dsf sd', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', '2009-03-06', '1', null, null, null, '2013-09-28 11:12:24', '0', '2', null, null), ('10', 'test6@gmail.com', 'sdf sd', 'sdf', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', '2009-04-03', '1', null, null, null, '2013-09-28 11:13:32', '0', '2', null, null), ('11', 'test8@gmail.com', 'sdf sdf', 'df', null, '7125297ca47dac2ae7a36c244565717a84e89aae', '1990-02-05', '1', null, null, null, '2013-09-28 11:14:20', '0', '2', null, null), ('12', 'test234234@gmail.com', 'sdf sdf', 'sdfs df sd', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', '2007-06-02', '0', null, null, null, '2013-09-28 11:15:27', '0', '2', null, null), ('13', 'test234232434@gmail.comtest234232434@gmail.com', 'f sdf sd', 'fsd', null, '7c4a8d09ca3762af61e59520943dc26494f8941b', '2010-04-02', '1', null, null, null, '2013-09-28 11:16:54', '0', '2', '', null), ('14', 'sdfsdfdsf@gmail.com', 'sdfsdf', 'sdf', null, '93d07a21af5977840472e843abc11a771ddd3b93', '2009-03-02', '1', null, null, null, '2013-09-28 11:18:46', '0', '2', '', null), ('15', 'sdfsdfdsf@gmail.com', 'sdfsdf', 'sdf', null, '93d07a21af5977840472e843abc11a771ddd3b93', '2009-03-02', '1', null, null, null, '2013-09-28 11:18:46', '0', '2', '', null), ('16', 'abc@gmail.com', 'sdfsdf', 'fsdfsdf', null, 'c0d0a32c405c68cb538e3891a3e3bce98887f012', '2010-02-01', '1', null, null, null, '2013-09-28 11:26:29', '0', '2', '', null), ('17', 'abc@gmail.com', 'sdfsdf', 'fsdfsdf', null, 'c0d0a32c405c68cb538e3891a3e3bce98887f012', '2010-02-01', '1', null, null, null, '2013-09-28 11:26:29', '0', '2', '', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
