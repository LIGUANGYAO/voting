/*
Navicat MySQL Data Transfer

Source Server         : 116.129
Source Server Version : 50173
Source Host           : 192.168.116.130:3306
Source Database       : voting

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2016-11-04 14:06:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for vote_clientip
-- ----------------------------
DROP TABLE IF EXISTS `vote_clientip`;
CREATE TABLE `vote_clientip` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `ip` varchar(15) NOT NULL COMMENT '投票客户端ip',
  `date` varchar(10) NOT NULL COMMENT '投票时间',
  `userid` int(11) NOT NULL COMMENT '票选人id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vote_clientip
-- ----------------------------
INSERT INTO `vote_clientip` VALUES ('1', '127.0.0.1', '2015-09-30', '30');
INSERT INTO `vote_clientip` VALUES ('2', '127.0.0.1', '2015-09-30', '32');
INSERT INTO `vote_clientip` VALUES ('3', '127.0.0.1', '2015-10-08', '30');
INSERT INTO `vote_clientip` VALUES ('4', '127.0.0.1', '2015-10-09', '30');
INSERT INTO `vote_clientip` VALUES ('5', '127.0.0.1', '2015-10-09', '43');
INSERT INTO `vote_clientip` VALUES ('6', '127.0.0.1', '2015-10-09', '31');
INSERT INTO `vote_clientip` VALUES ('7', '127.0.0.1', '2015-10-09', '32');
INSERT INTO `vote_clientip` VALUES ('8', '127.0.0.1', '2015-10-09', '41');
INSERT INTO `vote_clientip` VALUES ('9', '192.168.116.1', '2016-06-04', '34');
INSERT INTO `vote_clientip` VALUES ('10', '192.168.116.1', '2016-06-10', '30');
INSERT INTO `vote_clientip` VALUES ('11', '192.168.116.1', '2016-06-10', '31');
INSERT INTO `vote_clientip` VALUES ('12', '192.168.116.1', '2016-06-10', '43');
INSERT INTO `vote_clientip` VALUES ('13', '192.168.116.1', '2016-06-10', '33');
INSERT INTO `vote_clientip` VALUES ('14', '192.168.116.1', '2016-07-13', '34');
INSERT INTO `vote_clientip` VALUES ('15', '192.168.116.1', '2016-07-13', '42');
INSERT INTO `vote_clientip` VALUES ('16', '192.168.116.1', '2016-07-13', '44');
INSERT INTO `vote_clientip` VALUES ('17', '192.168.116.1', '2016-07-13', '45');
INSERT INTO `vote_clientip` VALUES ('18', '192.168.116.1', '2016-07-13', '224');
INSERT INTO `vote_clientip` VALUES ('19', '192.168.116.1', '2016-07-13', '35');
INSERT INTO `vote_clientip` VALUES ('20', '192.168.116.1', '2016-08-21', '33');
INSERT INTO `vote_clientip` VALUES ('21', '192.168.116.1', '2016-10-17', '44');
INSERT INTO `vote_clientip` VALUES ('22', '192.168.116.1', '2016-10-17', '42');
INSERT INTO `vote_clientip` VALUES ('23', '192.168.116.1', '2016-10-17', '43');

-- ----------------------------
-- Table structure for vote_user
-- ----------------------------
DROP TABLE IF EXISTS `vote_user`;
CREATE TABLE `vote_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `real_name` varchar(100) NOT NULL COMMENT '姓名',
  `sex` int(4) NOT NULL COMMENT '性别  1为男，2为女',
  `college` varchar(100) NOT NULL COMMENT '学院',
  `class` varchar(100) NOT NULL COMMENT '班级',
  `school_year` varchar(100) NOT NULL COMMENT '入学年份',
  `photo` varchar(100) NOT NULL COMMENT '相册',
  `introduce` text NOT NULL COMMENT '自我介绍',
  `vote_count` int(11) NOT NULL DEFAULT '0' COMMENT '投票数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vote_user
-- ----------------------------
INSERT INTO `vote_user` VALUES ('30', '李娜', '2', '广西大学', '软件1102', '1442851200', '/Public/upload/images/20150923/12345654.jpg', '<p>哈哈哈！这是一个好的地方啊啊！的地方大幅度后恢复到后宏达复合的时候对方的回复大幅度覅</p><p>大富豪东方和对手到货发都发活动红豆房后的</p>', '25');
INSERT INTO `vote_user` VALUES ('31', '张娜', '2', '广西大学', '软件1101', '1443024000', '/Public/upload/images/20150923/12345654.jpg', '这是我的简介', '13');
INSERT INTO `vote_user` VALUES ('32', '王楠', '2', '机电大学', '机电1102', '1442851200', '/Public/upload/images/20150929/1443518306379.jpg', '&lt;a href=&quot;http://www.baidu.com&quot;&gt;百度一下&lt;/a&gt;', '34');
INSERT INTO `vote_user` VALUES ('33', '默亚', '2', '财经大学', '会计1104', '1442851200', '/Public/upload/images/20150923/123456545.jpg', '顶顶顶顶', '53');
INSERT INTO `vote_user` VALUES ('34', '小何A', '1', '南职大学', '工程1102', '1442937600', '/Public/upload/images/20161017/14767170553702.jpg', '<p>哈哈，大家好啊！这是我的自我介绍大大方方...</p>', '19');
INSERT INTO `vote_user` VALUES ('35', '魔乐', '1', '工业学院', '工程1101', '1442937600', '/Public/upload/images/20150923/14430156627037.jpg', '大家好，我是周杰伦..', '78');
INSERT INTO `vote_user` VALUES ('36', '谢霆锋', '1', '机电大学', '软件1101', '1442937600', '/Public/upload/images/20150923/1443017935763.jpg', '<blockquote>\r\n	大家好，我是谢霆锋..</blockquote>', '65');
INSERT INTO `vote_user` VALUES ('38', '马云', '1', '师范学院', '商务1104', '1442937600', '/Public/upload/images/20150923/14430186993556.jpg', '大家好，我是阿里巴巴创始人马云，，，', '102');
INSERT INTO `vote_user` VALUES ('40', '唐先生', '1', '机电大学', '软件1102', '1443024000', '/Public/upload/images/20150924/14430670271401.png', '嗨起来0..', '44');
INSERT INTO `vote_user` VALUES ('41', '阿欢', '1', '机电大学', '工程1102', '1443024000', '/Public/upload/images/20150924/14430708511270.jpg', '&lt;p&gt;\r\n	到山东省的散打到山顶到地方地方\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp; 订单对方答复\r\n&lt;/p&gt;', '53');
INSERT INTO `vote_user` VALUES ('42', '阿力', '1', '机电大学', '工程1102', '1443024000', '/Public/upload/images/20150923/14430156627037.jpg', '到山东省的散打到山顶', '26');
INSERT INTO `vote_user` VALUES ('43', '叶', '1', '机电大学', '工程1102', '1443024000', '/Public/upload/images/20150923/14430156627037.jpg', '到山东省的散打到山顶', '56');
INSERT INTO `vote_user` VALUES ('44', '严', '1', '机电大学', '工程1102', '1443024000', '/Public/upload/images/20150923/123456545.jpg', '到山东省的散打到山顶', '49');
INSERT INTO `vote_user` VALUES ('45', '南', '1', '机电大学', '工程1102', '1443024000', '/Public/upload/images/20150925/14431512728879.png', '到山东省的散打到山顶地方大声道', '62');
INSERT INTO `vote_user` VALUES ('46', '胡', '1', '机电大学', '工程1102', '1443024000', '/Public/upload/images/20150924/1443075861381.png', '到山东省的散打到山顶', '27');
INSERT INTO `vote_user` VALUES ('217', '霍建华', '1', '南至大学', '工程1102', '1443024000', '/Public/upload/images/20150924/1443075861381.png', '&lt;p&gt;\r\n	大家好啊！我是霍建华..............\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;img src=&quot;/Public/upload/image/20150930/20150930055753_68861.jpg&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;', '102');
INSERT INTO `vote_user` VALUES ('224', '小曼', '2', '南至大学', '工程1102', '1443110400', '/Public/upload/images/20150925/14431492459144.jpg', '大家好，我是小曼..', '3');
INSERT INTO `vote_user` VALUES ('225', '默默', '1', '机电大学', '软件1102', '1443542400', '/Public/upload/images/20150930/14435959079937.png', '&lt;p&gt;\r\n	大家好我是默默！请教了！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;', '1');
INSERT INTO `vote_user` VALUES ('226', '开始', '1', '南至大学', '工程1102', '1444320000', '/Public/upload/images/20151009/14443570144154.png', '大家好！我是开始！！', '0');
