/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : rbi_bs

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-12-10 15:54:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dic_area
-- ----------------------------
DROP TABLE IF EXISTS `dic_area`;
CREATE TABLE `dic_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` varchar(255) DEFAULT NULL,
  `workshopId` varchar(255) DEFAULT NULL,
  `areaId` varchar(255) DEFAULT NULL,
  `areaName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_area
-- ----------------------------
INSERT INTO `dic_area` VALUES ('102', '中石化燃料油总公司', '青岛分公司', '罐区一', null);
INSERT INTO `dic_area` VALUES ('103', '中石化燃料油总公司', '江苏分公司', '罐区一', null);
INSERT INTO `dic_area` VALUES ('104', '中石化燃料油总公司', '秦皇岛分公司', '罐区一', null);
INSERT INTO `dic_area` VALUES ('105', '中石化燃料油总公司', '湛江分公司', '罐区一', null);
INSERT INTO `dic_area` VALUES ('106', '中石化燃料油总公司', '高富分公司', '罐区一', null);
INSERT INTO `dic_area` VALUES ('107', '中石化燃料油总公司', '温州分公司', '罐区一', null);
INSERT INTO `dic_area` VALUES ('108', '中石化燃料油总公司', '宁波分公司', '罐区一', null);

-- ----------------------------
-- Table structure for dic_assistcheckevaluate
-- ----------------------------
DROP TABLE IF EXISTS `dic_assistcheckevaluate`;
CREATE TABLE `dic_assistcheckevaluate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_assistcheckevaluate
-- ----------------------------
INSERT INTO `dic_assistcheckevaluate` VALUES ('1', '储罐基础检验及评价', '储罐基础检验及评价');
INSERT INTO `dic_assistcheckevaluate` VALUES ('2', '密封系统检测及评价', '密封系统检测及评价');
INSERT INTO `dic_assistcheckevaluate` VALUES ('3', '阴极保护检测及评价', '阴极保护检测及评价');
INSERT INTO `dic_assistcheckevaluate` VALUES ('4', '罐体防腐涂层检测及评价', '罐体防腐涂层检测及评价');
INSERT INTO `dic_assistcheckevaluate` VALUES ('5', '呼吸阀检测及评价', '呼吸阀检测及评价');
INSERT INTO `dic_assistcheckevaluate` VALUES ('6', '防雷防静电设施检测及评价', '防雷防静电设施检测及评价');
INSERT INTO `dic_assistcheckevaluate` VALUES ('7', '液位计的检验及评价', '液位计的检验及评价');
INSERT INTO `dic_assistcheckevaluate` VALUES ('8', '测温仪表的检验及评价', '测温仪表的检验及评价');

-- ----------------------------
-- Table structure for dic_assistcheckevaluate_content
-- ----------------------------
DROP TABLE IF EXISTS `dic_assistcheckevaluate_content`;
CREATE TABLE `dic_assistcheckevaluate_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assistCheckEvaluateKey` varchar(100) DEFAULT NULL,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_assistcheckevaluate_content
-- ----------------------------
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('1', '储罐基础检验及评价', '底板有无凹凸变形、空鼓、罐壁有无沉降、内外两侧大角焊缝和与罐体相连接的角焊缝有无裂纹、浮顶运行有无异常', '底板有无凹凸变形、空鼓、罐壁有无沉降、内外两侧大角焊缝和与罐体相连接的角焊缝有无裂纹、浮顶运行有无异常');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('2', '储罐基础检验及评价', '储罐基础牢固，无不均匀下沉；基础无裂缝、倾斜；罐基础周围排水通畅', '储罐基础牢固，无不均匀下沉；基础无裂缝、倾斜；罐基础周围排水通畅');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('3', '储罐基础检验及评价', '罐底沉降的测量与评定，历史检查的测量记录有无问题', '罐底沉降的测量与评定，历史检查的测量记录有无问题');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('4', '密封系统检测及评价', '人孔、排污孔等处是否有泄漏', '人孔、排污孔等处是否有泄漏');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('5', '密封系统检测及评价', '与储罐连接的第一道法兰密封处是否有泄漏，如有应立即安排处理', '与储罐连接的第一道法兰密封处是否有泄漏，如有应立即安排处理');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('6', '密封系统检测及评价', '(内浮顶罐)透气窗、透光孔等部件周围的防腐情况', '(内浮顶罐)透气窗、透光孔等部件周围的防腐情况');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('7', '密封系统检测及评价', '(外浮顶罐)盛装介质是否发生变化。如发生变化则应重点检查橡胶板、橡胶带是否适用于新介质', '(外浮顶罐)盛装介质是否发生变化。如发生变化则应重点检查橡胶板、橡胶带是否适用于新介质');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('8', '密封系统检测及评价', '(外浮顶罐)检查挡雨板的使用情况，是否存在变形、缺少和搭接不好等情况', '(外浮顶罐)检查挡雨板的使用情况，是否存在变形、缺少和搭接不好等情况');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('9', '密封系统检测及评价', '(外浮顶罐)检查罐壁是否有摩擦痕迹、是否有毛刺、尖角、焊瘤等尖锐突起部位', '(外浮顶罐)检查罐壁是否有摩擦痕迹、是否有毛刺、尖角、焊瘤等尖锐突起部位');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('10', '密封系统检测及评价', '(外浮顶罐)打开挡雨板检查橡胶袋或橡胶板的使用情况，表面是否存在老化、变形、破裂；是否存在与介质发生反应或溶胀情况', '(外浮顶罐)打开挡雨板检查橡胶袋或橡胶板的使用情况，表面是否存在老化、变形、破裂；是否存在与介质发生反应或溶胀情况');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('11', '密封系统检测及评价', '(囊式密封)橡胶袋表面，是否有麻坑、破损、鼓胀、被介质浸溶等情况存在', '(囊式密封)橡胶袋表面，是否有麻坑、破损、鼓胀、被介质浸溶等情况存在');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('12', '密封系统检测及评价', '(囊式密封)橡胶袋的接头处是否粘接牢靠，无渗漏情况', '(囊式密封)橡胶袋的接头处是否粘接牢靠，无渗漏情况');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('13', '密封系统检测及评价', '(囊式密封)填充物的弹性程度，填充物是否存在变形失弹的情况', '(囊式密封)填充物的弹性程度，填充物是否存在变形失弹的情况');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('14', '密封系统检测及评价', '(囊式密封)橡胶袋和罐壁之间的贴合情况，要求橡胶袋与罐壁贴合严密，无可见缝隙', '(囊式密封)橡胶袋和罐壁之间的贴合情况，要求橡胶袋与罐壁贴合严密，无可见缝隙');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('15', '密封系统检测及评价', '(橡胶板密封)橡胶密封板本身不得存在堆积和褶皱等情况', '(橡胶板密封)橡胶密封板本身不得存在堆积和褶皱等情况');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('16', '密封系统检测及评价', '(橡胶板密封)橡胶板应紧贴罐壁，与罐壁的接触长度不得小于罐体圆周长的90%，最大的不接触间隙不得超过6mm', '(橡胶板密封)橡胶板应紧贴罐壁，与罐壁的接触长度不得小于罐体圆周长的90%，最大的不接触间隙不得超过6mm');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('17', '密封系统检测及评价', '检查浮盘上液位计、防转装置等开孔部位的密封情况，是否存在泄漏', '检查浮盘上液位计、防转装置等开孔部位的密封情况，是否存在泄漏');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('18', '阴极保护检测及评价', '检查储罐内牺牲阳极块的溶解情况，阳极与储罐的接触点是否完好，阳极是否均匀布设', '检查储罐内牺牲阳极块的溶解情况，阳极与储罐的接触点是否完好，阳极是否均匀布设');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('19', '阴极保护检测及评价', '阳极块的下表面与罐底板内表面的距离宜为50～70mm', '阳极块的下表面与罐底板内表面的距离宜为50～70mm');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('20', '阴极保护检测及评价', '在沉积水出口部位应适当增加阳极块的数量', '在沉积水出口部位应适当增加阳极块的数量');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('21', '阴极保护检测及评价', '测其保护电位、电流密度：罐底板内表面电流密度不得低于10mA/m2；其中，有防腐涂层的钢表面保护电流密度范围应为10～30mA/m2；无防腐涂层的钢表面保护电流密度范围应为30～150mA/m2', '测其保护电位、电流密度：罐底板内表面电流密度不得低于10mA/m2；其中，有防腐涂层的钢表面保护电流密度范围应为10～30mA/m2；无防腐涂层的钢表面保护电流密度范围应为30～150mA/m2');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('22', '罐体防腐涂层检测及评价', '建罐时间、防腐层、保温层种类等技术资料是否齐全', '建罐时间、防腐层、保温层种类等技术资料是否齐全');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('23', '罐体防腐涂层检测及评价', '历年运行工况、历年维修和故障处理资料是否齐全', '历年运行工况、历年维修和故障处理资料是否齐全');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('24', '罐体防腐涂层检测及评价', '检测涂层干膜厚度，是否能达到设计厚度', '检测涂层干膜厚度，是否能达到设计厚度');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('25', '呼吸阀检测及评价', '核查呼吸阀的产品型号、操作压力等级、制造日期、产品合格证、安装日期、竣工验收文件等原始资料', '核查呼吸阀的产品型号、操作压力等级、制造日期、产品合格证、安装日期、竣工验收文件等原始资料');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('26', '呼吸阀检测及评价', '运行周期内的在线检查记录和历次定期检验报告是否有问题，如有，是否已整改', '运行周期内的在线检查记录和历次定期检验报告是否有问题，如有，是否已整改');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('27', '防雷防静电设施检测及评价', '接闪器（包括避雷针、避雷带、避雷网）本体发生断裂、变形及严重锈蚀', '接闪器（包括避雷针、避雷带、避雷网）本体发生断裂、变形及严重锈蚀');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('28', '防雷防静电设施检测及评价', '接地装置（包括接地体、接地线）和引下线发生断裂、变形、损伤、脱焊、锈蚀、松动、遗失', '接地装置（包括接地体、接地线）和引下线发生断裂、变形、损伤、脱焊、锈蚀、松动、遗失');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('29', '防雷防静电设施检测及评价', '跨接线发生断裂、损伤、脱焊、锈蚀、松动、遗失', '跨接线发生断裂、损伤、脱焊、锈蚀、松动、遗失');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('30', '液位计的检验及评价', '是否超过规定的检修期限', '是否超过规定的检修期限');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('31', '液位计的检验及评价', '玻璃板(管)是否有裂纹、破碎', '玻璃板(管)是否有裂纹、破碎');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('32', '液位计的检验及评价', '阀件是否固死', '阀件是否固死');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('33', '液位计的检验及评价', '是否出现假液位', '是否出现假液位');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('34', '液位计的检验及评价', '液位计指示是否模糊不清', '液位计指示是否模糊不清');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('35', '液位计的检验及评价', '液位计选型是否合适', '液位计选型是否合适');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('36', '液位计的检验及评价', '防止泄漏的保护装置是否损坏', '防止泄漏的保护装置是否损坏');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('37', '测温仪表的检验及评价', '是否进行定期校验和检修', '是否进行定期校验和检修');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('38', '测温仪表的检验及评价', '量程与其检测温度范围是否匹配', '量程与其检测温度范围是否匹配');
INSERT INTO `dic_assistcheckevaluate_content` VALUES ('39', '测温仪表的检验及评价', '温度仪表及其二次仪表外观是否完好，有无损坏', '温度仪表及其二次仪表外观是否完好，有无损坏');

-- ----------------------------
-- Table structure for dic_attachtype
-- ----------------------------
DROP TABLE IF EXISTS `dic_attachtype`;
CREATE TABLE `dic_attachtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_attachtype
-- ----------------------------
INSERT INTO `dic_attachtype` VALUES ('4', '土建及钢结构', '土建及钢结构');
INSERT INTO `dic_attachtype` VALUES ('5', '罐体本体及附件', '罐体本体及附件');
INSERT INTO `dic_attachtype` VALUES ('6', '管路系统', '管路系统');
INSERT INTO `dic_attachtype` VALUES ('7', '储罐防腐', '储罐防腐');
INSERT INTO `dic_attachtype` VALUES ('8', '电气', '电气');
INSERT INTO `dic_attachtype` VALUES ('9', '仪表', '仪表');
INSERT INTO `dic_attachtype` VALUES ('10', '油罐防雷防静电接地', '油罐防雷防静电接地');
INSERT INTO `dic_attachtype` VALUES ('11', '检修及施工作业管理', '检修及施工作业管理');
INSERT INTO `dic_attachtype` VALUES ('12', '机泵', '机泵');
INSERT INTO `dic_attachtype` VALUES ('13', '消防设施管理', '消防设施管理');
INSERT INTO `dic_attachtype` VALUES ('14', '气体检测管理', '气体检测管理');
INSERT INTO `dic_attachtype` VALUES ('15', '火灾报警设施', '火灾报警设施');
INSERT INTO `dic_attachtype` VALUES ('16', '应急管理', '应急管理');
INSERT INTO `dic_attachtype` VALUES ('17', '环保三级防控', '环保三级防控');
INSERT INTO `dic_attachtype` VALUES ('18', '安全教育', '安全教育');
INSERT INTO `dic_attachtype` VALUES ('19', '工艺技术管理', '工艺技术管理');
INSERT INTO `dic_attachtype` VALUES ('20', '生产运行和巡检操作', '生产运行和巡检操作');
INSERT INTO `dic_attachtype` VALUES ('21', '查承包商监管和“五关”管理措施落实情况', '查承包商监管和“五关”管理措施落实情况');
INSERT INTO `dic_attachtype` VALUES ('22', '设备抢修、危险作业', '设备抢修、危险作业');

-- ----------------------------
-- Table structure for dic_attachtype_content
-- ----------------------------
DROP TABLE IF EXISTS `dic_attachtype_content`;
CREATE TABLE `dic_attachtype_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachTypeKey` varchar(100) DEFAULT NULL,
  `key` varchar(300) DEFAULT NULL,
  `value` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_attachtype_content
-- ----------------------------
INSERT INTO `dic_attachtype_content` VALUES ('23', '土建及钢结构', '围堰是否符合规范要求，不存在漏洞、破损，防火涂料无脱落，保持完整。', '围堰是否符合规范要求，不存在漏洞、破损，防火涂料无脱落，保持完整。');
INSERT INTO `dic_attachtype_content` VALUES ('24', '土建及钢结构', '储罐基础牢固，无不均匀下沉；基础无裂缝、倾斜；罐基础周围排水通畅。', '储罐基础牢固，无不均匀下沉；基础无裂缝、倾斜；罐基础周围排水通畅。');
INSERT INTO `dic_attachtype_content` VALUES ('25', '土建及钢结构', '定点测厚每年应对储罐顶、壁做一次测厚检查。罐壁下部宜设置沉降观测件，每年定期监测储罐基础沉降情况。储存易燃、易爆、有毒介质，每年至少进行一次沉降观测。', '定点测厚每年应对储罐顶、壁做一次测厚检查。罐壁下部宜设置沉降观测件，每年定期监测储罐基础沉降情况。储存易燃、易爆、有毒介质，每年至少进行一次沉降观测。');
INSERT INTO `dic_attachtype_content` VALUES ('26', '土建及钢结构', '管支架的各种管座（包括固定、滑动、导向支座及桥架）设置合理，无沉降、倾斜或斜拉件变形；管线支架无锈蚀、变形或损坏；管托无腐蚀，工作正常。', '管支架的各种管座（包括固定、滑动、导向支座及桥架）设置合理，无沉降、倾斜或斜拉件变形；管线支架无锈蚀、变形或损坏；管托无腐蚀，工作正常。');
INSERT INTO `dic_attachtype_content` VALUES ('27', '土建及钢结构', '罐区地面保持平整，无下沉、塌陷、无积水、无破损、无杂草。', '罐区地面保持平整，无下沉、塌陷、无积水、无破损、无杂草。');
INSERT INTO `dic_attachtype_content` VALUES ('28', '土建及钢结构', '隔堤高度宜按低于防火堤高度0.2m设置', '隔堤高度宜按低于防火堤高度0.2m设置');
INSERT INTO `dic_attachtype_content` VALUES ('29', '土建及钢结构', '罐容大于或等于20000m³的储罐每年春秋2次进行基础沉降观测并归档，罐容小于20000m³的储罐根据情况决定是否检修基础沉降观测', '罐容大于或等于20000m³的储罐每年春秋2次进行基础沉降观测并归档，罐容小于20000m³的储罐根据情况决定是否检修基础沉降观测');
INSERT INTO `dic_attachtype_content` VALUES ('30', '罐体本体及附件', '检查罐顶和罐壁是否变形，有无严重的缺陷、鼓包、折皱，罐壁、浮舱、罐底有无泄漏现象；罐底与罐壁连接部位要重点排查', '检查罐顶和罐壁是否变形，有无严重的缺陷、鼓包、折皱，罐壁、浮舱、罐底有无泄漏现象；罐底与罐壁连接部位要重点排查');
INSERT INTO `dic_attachtype_content` VALUES ('31', '罐体本体及附件', '对罐壁焊缝进行宏观检查，特别注意罐壁与罐底间的角焊缝和底层壁板的纵、横焊缝以及进出口接管与罐体的连接焊缝有无渗漏和裂纹；', '对罐壁焊缝进行宏观检查，特别注意罐壁与罐底间的角焊缝和底层壁板的纵、横焊缝以及进出口接管与罐体的连接焊缝有无渗漏和裂纹；');
INSERT INTO `dic_attachtype_content` VALUES ('32', '罐体本体及附件', '检查进出口阀门、人孔、脱水阀等处的紧固件、密封件是否牢靠；', '检查进出口阀门、人孔、脱水阀等处的紧固件、密封件是否牢靠；');
INSERT INTO `dic_attachtype_content` VALUES ('33', '罐体本体及附件', '检查罐体外部防腐层有无脱落，保温（冷）层及防水檐是否完好，若发现保温（冷）层破损严重时应检查罐壁腐蚀情况；', '检查罐体外部防腐层有无脱落，保温（冷）层及防水檐是否完好，若发现保温（冷）层破损严重时应检查罐壁腐蚀情况；');
INSERT INTO `dic_attachtype_content` VALUES ('34', '罐体本体及附件', '远红外火焰探测器及光纤光栅系统有无误报。', '远红外火焰探测器及光纤光栅系统有无误报。');
INSERT INTO `dic_attachtype_content` VALUES ('35', '罐体本体及附件', '转动浮梯及导轨转动是否灵活。', '转动浮梯及导轨转动是否灵活。');
INSERT INTO `dic_attachtype_content` VALUES ('36', '罐体本体及附件', '罐顶通气孔、等电位连接是否完好；', '罐顶通气孔、等电位连接是否完好；');
INSERT INTO `dic_attachtype_content` VALUES ('37', '罐体本体及附件', '测量孔:每月检查不少于1次，检查盖与座之间密封是否严密、硬化，导尺槽磨损情况，螺帽活动情况。 保养重点：密封胶垫的换新每3年1次，对蝶形螺母及压紧螺栓各活动连接处经常加油润滑。', '测量孔:每月检查不少于1次，检查盖与座之间密封是否严密、硬化，导尺槽磨损情况，螺帽活动情况。 保养重点：密封胶垫的换新每3年1次，对蝶形螺母及压紧螺栓各活动连接处经常加油润滑。');
INSERT INTO `dic_attachtype_content` VALUES ('38', '罐体本体及附件', '机械呼吸阀：每月检查不少于2次，气温低于O℃时每周不少于1次。检查阀盘和阀座接触面是否良好，阀杆上下灵活情况，阀壳网罩是否完好，有无冰冻，压盖衬垫是否严密。保养重点：清除阀盘上灰尘、水珠，螺栓加油，必', '机械呼吸阀：每月检查不少于2次，气温低于O℃时每周不少于1次。检查阀盘和阀座接触面是否良好，阀杆上下灵活情况，阀壳网罩是否完好，有无冰冻，压盖衬垫是否严密。保养重点：清除阀盘上灰尘、水珠，螺栓加油，必');
INSERT INTO `dic_attachtype_content` VALUES ('39', '罐体本体及附件', '液压安全阀：每季度检查1次。从外观检查保护网是否完好，有无雀窝，测量液面高度。保养重点：清洁保护网，添加封液，每年秋末应放出封液，清洁阀壳内部1次，必要时更换封液。  ', '液压安全阀：每季度检查1次。从外观检查保护网是否完好，有无雀窝，测量液面高度。保养重点：清洁保护网，添加封液，每年秋末应放出封液，清洁阀壳内部1次，必要时更换封液。  ');
INSERT INTO `dic_attachtype_content` VALUES ('40', '罐体本体及附件', '阻火器：每季度检查1次。检查阻火网或波纹片有无破损，是否清洁畅通，有无水气冰冻，垫片是否严密。 ', '阻火器：每季度检查1次。检查阻火网或波纹片有无破损，是否清洁畅通，有无水气冰冻，垫片是否严密。 ');
INSERT INTO `dic_attachtype_content` VALUES ('41', '罐体本体及附件', '每年定期检查防雷和静电接地设施，并测量静电接地电阻，要求其值不大于10Ω。对内浮顶罐还要检查防静电连接导线连接情况是否完好', '每年定期检查防雷和静电接地设施，并测量静电接地电阻，要求其值不大于10Ω。对内浮顶罐还要检查防静电连接导线连接情况是否完好');
INSERT INTO `dic_attachtype_content` VALUES ('42', '罐体本体及附件', '设置有阴极保护设施的储罐, 每月应对各测量点保护电位进行测试，对保护效果进行评价。', '设置有阴极保护设施的储罐, 每月应对各测量点保护电位进行测试，对保护效果进行评价。');
INSERT INTO `dic_attachtype_content` VALUES ('43', '罐体本体及附件', '储罐应实行定点测厚制度，储罐壁（沿盘梯）及下两圈板、罐顶每年测厚1 次并将数据归档管理，按确定储罐固定的测厚点检测并在罐体作好标志，技术档案及测厚报告内容应包括测厚点布置图及编号。', '储罐应实行定点测厚制度，储罐壁（沿盘梯）及下两圈板、罐顶每年测厚1 次并将数据归档管理，按确定储罐固定的测厚点检测并在罐体作好标志，技术档案及测厚报告内容应包括测厚点布置图及编号。');
INSERT INTO `dic_attachtype_content` VALUES ('44', '罐体本体及附件', '可采用先进检测技术，如罐底声发射检测、罐壁超声波自动检测、罐顶超声波面测厚等技术，进行在役全面检测，再结合储罐RBI等技术对石油储罐进行安全评估。根据检测评价结果确定储罐更换。', '可采用先进检测技术，如罐底声发射检测、罐壁超声波自动检测、罐顶超声波面测厚等技术，进行在役全面检测，再结合储罐RBI等技术对石油储罐进行安全评估。根据检测评价结果确定储罐更换。');
INSERT INTO `dic_attachtype_content` VALUES ('45', '罐体本体及附件', '呼吸阀、阻火器安装正确，满足设计规范；阀盘与阀座接触面良好；阀杆上下运动灵活，无卡阻；阀壳网罩严密；呼吸通道无堵塞现象； 阀体完好，附件齐全；阻火器防火网或波形散热片清洁畅通。', '呼吸阀、阻火器安装正确，满足设计规范；阀盘与阀座接触面良好；阀杆上下运动灵活，无卡阻；阀壳网罩严密；呼吸通道无堵塞现象； 阀体完好，附件齐全；阻火器防火网或波形散热片清洁畅通。');
INSERT INTO `dic_attachtype_content` VALUES ('46', '罐体本体及附件', '量油孔应采用能避免碰撞产生火花的有色金属材料，如采用防锈铝或碳钢内衬铝等制造。密封严密不漏气，磨损无超标。', '量油孔应采用能避免碰撞产生火花的有色金属材料，如采用防锈铝或碳钢内衬铝等制造。密封严密不漏气，磨损无超标。');
INSERT INTO `dic_attachtype_content` VALUES ('47', '罐体本体及附件', '人孔、透光孔完好；旋梯、扶手、栏杆、平台间隙适当，无锈蚀、损坏、脱落；防滑踏步牢固；行走部位有护栏。', '人孔、透光孔完好；旋梯、扶手、栏杆、平台间隙适当，无锈蚀、损坏、脱落；防滑踏步牢固；行走部位有护栏。');
INSERT INTO `dic_attachtype_content` VALUES ('48', '罐体本体及附件', '油水分离器性能良好，排水无带油现象。', '油水分离器性能良好，排水无带油现象。');
INSERT INTO `dic_attachtype_content` VALUES ('49', '罐体本体及附件', '设有蒸汽加热器的储罐应采取防止液体超温的措施，加热器阀门无漏气。', '设有蒸汽加热器的储罐应采取防止液体超温的措施，加热器阀门无漏气。');
INSERT INTO `dic_attachtype_content` VALUES ('50', '罐体本体及附件', '结合清罐和全面检查，应对储罐正常生产状态下无法更换的罐根第一道法兰的垫片进行更换，垫片应选用耐温、阻燃的材料，且与储存介质相适应。', '结合清罐和全面检查，应对储罐正常生产状态下无法更换的罐根第一道法兰的垫片进行更换，垫片应选用耐温、阻燃的材料，且与储存介质相适应。');
INSERT INTO `dic_attachtype_content` VALUES ('51', '罐体本体及附件', '含硫油品储罐罐体要有防控硫化氢技术要求，应对硫化氢含量进行监测，内壁应采取防腐措施。', '含硫油品储罐罐体要有防控硫化氢技术要求，应对硫化氢含量进行监测，内壁应采取防腐措施。');
INSERT INTO `dic_attachtype_content` VALUES ('52', '罐体本体及附件', '浮顶在全行程上应能无阻碍地正常运行，在升降和静止状态应处于水平漂浮状态；浮顶上的所有金属件均应互相电气连通，并通过罐壁与罐外部接地件相连，各部位导电性良好；支柱、导向装置等穿过浮顶部位密封良好。', '浮顶在全行程上应能无阻碍地正常运行，在升降和静止状态应处于水平漂浮状态；浮顶上的所有金属件均应互相电气连通，并通过罐壁与罐外部接地件相连，各部位导电性良好；支柱、导向装置等穿过浮顶部位密封良好。');
INSERT INTO `dic_attachtype_content` VALUES ('53', '罐体本体及附件', '浮顶上排液设施投用正常；浮顶上装设的自动通气阀应在浮顶处于支撑状态时自动开启；当浮顶处于漂浮状态时自动关闭，并应密封良好；浮顶的浮力元件均满足气密性要求。', '浮顶上排液设施投用正常；浮顶上装设的自动通气阀应在浮顶处于支撑状态时自动开启；当浮顶处于漂浮状态时自动关闭，并应密封良好；浮顶的浮力元件均满足气密性要求。');
INSERT INTO `dic_attachtype_content` VALUES ('54', '罐体本体及附件', '查作业场所照明设施完好情况；查应急照明设施完好情况', '查作业场所照明设施完好情况；查应急照明设施完好情况');
INSERT INTO `dic_attachtype_content` VALUES ('55', '罐体本体及附件', '现场实际标定3个以上气体检测报警器，确认准确性和完好性；查历史报警信息的处置记录及程序是否合规；查现场温度计、液位计等附件的完好情况。', '现场实际标定3个以上气体检测报警器，确认准确性和完好性；查历史报警信息的处置记录及程序是否合规；查现场温度计、液位计等附件的完好情况。');
INSERT INTO `dic_attachtype_content` VALUES ('56', '管路系统', '管路无锈蚀，漆层及保温层符合要求并保护完好；管路与周围建（构）筑物之间的距离符合规范要求；管路无明显扭曲、位移、变形。', '管路无锈蚀，漆层及保温层符合要求并保护完好；管路与周围建（构）筑物之间的距离符合规范要求；管路无明显扭曲、位移、变形。');
INSERT INTO `dic_attachtype_content` VALUES ('57', '管路系统', '管路与管件的连接处及焊缝处无渗漏，尤其是在夏季温度高时应加强巡检；管路外表面无裂纹、缩孔、夹渣、折叠、皱皮等缺陷；管线和管托接合部需重点检查应力、腐蚀和磨损情况。', '管路与管件的连接处及焊缝处无渗漏，尤其是在夏季温度高时应加强巡检；管路外表面无裂纹、缩孔、夹渣、折叠、皱皮等缺陷；管线和管托接合部需重点检查应力、腐蚀和磨损情况。');
INSERT INTO `dic_attachtype_content` VALUES ('58', '管路系统', '法兰连接安装符合要求，法兰盘面与管线中心线垂直，同组法兰不准加双垫，螺栓、螺母齐整、紧固、满扣。', '法兰连接安装符合要求，法兰盘面与管线中心线垂直，同组法兰不准加双垫，螺栓、螺母齐整、紧固、满扣。');
INSERT INTO `dic_attachtype_content` VALUES ('59', '管路系统', '阀门运行正常，阀杆动密封处及法兰垫片静密封处无渗漏；阀门严密性正常，按规定试验压力打压不渗漏。', '阀门运行正常，阀杆动密封处及法兰垫片静密封处无渗漏；阀门严密性正常，按规定试验压力打压不渗漏。');
INSERT INTO `dic_attachtype_content` VALUES ('60', '管路系统', '阀体无损伤及渗漏现象；阀门启闭灵活、开度指示正确。', '阀体无损伤及渗漏现象；阀门启闭灵活、开度指示正确。');
INSERT INTO `dic_attachtype_content` VALUES ('61', '管路系统', '阀杆无弯曲、阀杆与填料压盖配合合适无锈蚀，螺纹无缺陷，垫片、填料、螺栓完好，螺栓裸露部分应无锈蚀。', '阀杆无弯曲、阀杆与填料压盖配合合适无锈蚀，螺纹无缺陷，垫片、填料、螺栓完好，螺栓裸露部分应无锈蚀。');
INSERT INTO `dic_attachtype_content` VALUES ('62', '管路系统', '阀门各部件齐全、良好，无泄漏；安装正确，位置适当，禁止倒装，尤其是单向阀、截止阀、安全阀的安装。', '阀门各部件齐全、良好，无泄漏；安装正确，位置适当，禁止倒装，尤其是单向阀、截止阀、安全阀的安装。');
INSERT INTO `dic_attachtype_content` VALUES ('63', '管路系统', '补偿器安装正确，位置适当，强度满足要求；补偿器外观质量良好，无扭曲、变形、挤压、破裂等现象。', '补偿器安装正确，位置适当，强度满足要求；补偿器外观质量良好，无扭曲、变形、挤压、破裂等现象。');
INSERT INTO `dic_attachtype_content` VALUES ('64', '管路系统', '管线接地装置应符合要求（接地电阻≤100Ω）。', '管线接地装置应符合要求（接地电阻≤100Ω）。');
INSERT INTO `dic_attachtype_content` VALUES ('65', '管路系统', '常压罐与进出物料管线应采用挠性连接。', '常压罐与进出物料管线应采用挠性连接。');
INSERT INTO `dic_attachtype_content` VALUES ('66', '管路系统', '对工艺管线因施工临时安装的导淋、排空、吹扫管、注水管等小节管进行全面排查，论证后及时拆除。', '对工艺管线因施工临时安装的导淋、排空、吹扫管、注水管等小节管进行全面排查，论证后及时拆除。');
INSERT INTO `dic_attachtype_content` VALUES ('67', '储罐防腐', '对于有硫腐蚀倾向的常压金属储罐，必须进行涂料防腐或氮气封闭隔离等措施。', '对于有硫腐蚀倾向的常压金属储罐，必须进行涂料防腐或氮气封闭隔离等措施。');
INSERT INTO `dic_attachtype_content` VALUES ('68', '储罐防腐', '罐内防腐底漆宜采用无机富锌或环氧导静电类涂料，面漆宜采用环氧或聚氨脂类耐热耐油性导静电涂料，底板及底板上一圈壁板涂层干膜厚度不宜小于350μm，其余部位涂层厚度不宜小于250μm。', '罐内防腐底漆宜采用无机富锌或环氧导静电类涂料，面漆宜采用环氧或聚氨脂类耐热耐油性导静电涂料，底板及底板上一圈壁板涂层干膜厚度不宜小于350μm，其余部位涂层厚度不宜小于250μm。');
INSERT INTO `dic_attachtype_content` VALUES ('69', '储罐防腐', '含硫污水罐内防腐宜采用环氧类重防腐涂料，涂层干膜厚度不宜小于300μm。', '含硫污水罐内防腐宜采用环氧类重防腐涂料，涂层干膜厚度不宜小于300μm。');
INSERT INTO `dic_attachtype_content` VALUES ('70', '储罐防腐', '罐外防腐涂料底漆可采用富锌类或环氧类涂料，面漆宜选用丙烯酸-聚氨脂类、氟碳类等耐水耐候性涂料或耐候性热反射隔热防腐蚀复合涂层。对于聚氨脂类、氟碳类涂料总涂层干膜厚度不宜小于200μm，热反射隔热涂层类', '罐外防腐涂料底漆可采用富锌类或环氧类涂料，面漆宜选用丙烯酸-聚氨脂类、氟碳类等耐水耐候性涂料或耐候性热反射隔热防腐蚀复合涂层。对于聚氨脂类、氟碳类涂料总涂层干膜厚度不宜小于200μm，热反射隔热涂层类');
INSERT INTO `dic_attachtype_content` VALUES ('71', '储罐防腐', '对于原油罐等含水相腐蚀介质，且温度小于80℃的罐体内部，要增加阴极保护措施。罐内底板的防腐涂料应采用耐油非导静电防腐涂料。', '对于原油罐等含水相腐蚀介质，且温度小于80℃的罐体内部，要增加阴极保护措施。罐内底板的防腐涂料应采用耐油非导静电防腐涂料。');
INSERT INTO `dic_attachtype_content` VALUES ('72', '储罐防腐', '含硫腐蚀介质等储罐，应该考虑油罐内壁喷涂防止产生硫化亚铁的高效涂料；正在使用中的还没有喷涂涂料的储罐，应该倒罐轮换进行打磨喷涂高效涂料，隔绝油品中硫对金属材料的腐蚀，防止硫化亚铁的产生。', '含硫腐蚀介质等储罐，应该考虑油罐内壁喷涂防止产生硫化亚铁的高效涂料；正在使用中的还没有喷涂涂料的储罐，应该倒罐轮换进行打磨喷涂高效涂料，隔绝油品中硫对金属材料的腐蚀，防止硫化亚铁的产生。');
INSERT INTO `dic_attachtype_content` VALUES ('73', '储罐防腐', '储罐罐底边缘板应采取有效的防水防腐措施，防水材料应具有良好的防腐蚀性能、耐候性及弹性。', '储罐罐底边缘板应采取有效的防水防腐措施，防水材料应具有良好的防腐蚀性能、耐候性及弹性。');
INSERT INTO `dic_attachtype_content` VALUES ('74', '储罐防腐', '采用先进有效的防止含H2S球罐应力腐蚀开裂（SSCC）的防腐蚀技术，即喷涂ZARE合金涂层和特殊的封闭处理阻止和抑制储罐的硫化氢应力腐蚀开裂。', '采用先进有效的防止含H2S球罐应力腐蚀开裂（SSCC）的防腐蚀技术，即喷涂ZARE合金涂层和特殊的封闭处理阻止和抑制储罐的硫化氢应力腐蚀开裂。');
INSERT INTO `dic_attachtype_content` VALUES ('75', '储罐防腐', '罐内防腐及新建储罐外防腐表面处理应采用磨料喷射处理，内防腐表面至少达到Sa2.5级；对外表面腐蚀较严重的油罐进行外防腐时，外表面宜采用磨料喷射处理至少达到Sa2.0级。', '罐内防腐及新建储罐外防腐表面处理应采用磨料喷射处理，内防腐表面至少达到Sa2.5级；对外表面腐蚀较严重的油罐进行外防腐时，外表面宜采用磨料喷射处理至少达到Sa2.0级。');
INSERT INTO `dic_attachtype_content` VALUES ('76', '储罐防腐', '防腐工程施工必须在罐体检验、储罐充水试验完成后进行。', '防腐工程施工必须在罐体检验、储罐充水试验完成后进行。');
INSERT INTO `dic_attachtype_content` VALUES ('77', '储罐防腐', '应编制具体的涂料配套方案，明确每道涂层用量、厚度要求等。', '应编制具体的涂料配套方案，明确每道涂层用量、厚度要求等。');
INSERT INTO `dic_attachtype_content` VALUES ('78', '储罐防腐', '刷涂达不到质量要求时应采用喷涂方式，喷涂时钢铁表面温度应高出现场露点温度3℃，且不宜高于50℃。', '刷涂达不到质量要求时应采用喷涂方式，喷涂时钢铁表面温度应高出现场露点温度3℃，且不宜高于50℃。');
INSERT INTO `dic_attachtype_content` VALUES ('79', '储罐防腐', '表面处理采用喷砂除锈时，磨料应按照规范选用，不应采用河砂及海砂。涂层不能有砂粒、验收时可用10倍放大镜检查漆膜。', '表面处理采用喷砂除锈时，磨料应按照规范选用，不应采用河砂及海砂。涂层不能有砂粒、验收时可用10倍放大镜检查漆膜。');
INSERT INTO `dic_attachtype_content` VALUES ('80', '储罐防腐', '涂料施工应按照相关工程程序检查合格后方可进行下一道工序，每道涂层应有测厚及检查记录。验收时应用涂层测厚仪对涂层厚度测定。', '涂料施工应按照相关工程程序检查合格后方可进行下一道工序，每道涂层应有测厚及检查记录。验收时应用涂层测厚仪对涂层厚度测定。');
INSERT INTO `dic_attachtype_content` VALUES ('81', '储罐防腐', '施工单位应选用专业的施工队伍，有足够的施工经验并做到人员相对稳定施工机具完备。', '施工单位应选用专业的施工队伍，有足够的施工经验并做到人员相对稳定施工机具完备。');
INSERT INTO `dic_attachtype_content` VALUES ('82', '电气', '罐区生产用电实现双电源供电，必要时应配备应急发电机。', '罐区生产用电实现双电源供电，必要时应配备应急发电机。');
INSERT INTO `dic_attachtype_content` VALUES ('83', '电气', '罐区检修临时用电作业必须办理相关票证，接电线路符合三相五线制，电缆无接头、裸漏，不能有乱挂、乱甩现象，防爆动力箱内开关必须有漏电保护，用电设备必须符合防爆要求。', '罐区检修临时用电作业必须办理相关票证，接电线路符合三相五线制，电缆无接头、裸漏，不能有乱挂、乱甩现象，防爆动力箱内开关必须有漏电保护，用电设备必须符合防爆要求。');
INSERT INTO `dic_attachtype_content` VALUES ('84', '电气', '防爆电气设备及其周围环境应保持清洁，无防碍设备安全运行的杂物。', '防爆电气设备及其周围环境应保持清洁，无防碍设备安全运行的杂物。');
INSERT INTO `dic_attachtype_content` VALUES ('85', '电气', '防爆电气设备固定牢固、可靠，设备外壳完整，无裂纹及明显的腐蚀现象，螺丝及垫圈齐全，无松动。进线设备密封完好，接线无松动、脱落现象，多余的进线口必须密封符合防爆要求。', '防爆电气设备固定牢固、可靠，设备外壳完整，无裂纹及明显的腐蚀现象，螺丝及垫圈齐全，无松动。进线设备密封完好，接线无松动、脱落现象，多余的进线口必须密封符合防爆要求。');
INSERT INTO `dic_attachtype_content` VALUES ('86', '电气', '防爆电气设备运行平稳，运行参数（电流、电压等）正常，表计定期校验合格。', '防爆电气设备运行平稳，运行参数（电流、电压等）正常，表计定期校验合格。');
INSERT INTO `dic_attachtype_content` VALUES ('87', '电气', '防爆电气设备接零、接地和重复接地符合要求；接地连接可靠，接地体设置符合规定要求，无锈蚀，接地电阻合格。', '防爆电气设备接零、接地和重复接地符合要求；接地连接可靠，接地体设置符合规定要求，无锈蚀，接地电阻合格。');
INSERT INTO `dic_attachtype_content` VALUES ('88', '仪表', '仪表及安装配线符合防爆要求。', '仪表及安装配线符合防爆要求。');
INSERT INTO `dic_attachtype_content` VALUES ('89', '仪表', '仪表校验在设计范围，校验合格做好记录。', '仪表校验在设计范围，校验合格做好记录。');
INSERT INTO `dic_attachtype_content` VALUES ('90', '仪表', '控制电缆、仪表信号电缆铺设是否整齐，电缆沟、桥架盖板是否齐全、平整，沟内不积水，不存油污，无杂物。', '控制电缆、仪表信号电缆铺设是否整齐，电缆沟、桥架盖板是否齐全、平整，沟内不积水，不存油污，无杂物。');
INSERT INTO `dic_attachtype_content` VALUES ('91', '仪表', '现场仪表阀门、手轮齐全无缺、干净无油垢，没有脏、松、缺、锈现象。', '现场仪表阀门、手轮齐全无缺、干净无油垢，没有脏、松、缺、锈现象。');
INSERT INTO `dic_attachtype_content` VALUES ('92', '仪表', '仪表温度计、液位计、压力、流量等一次仪表指示正确，校验标签及标示齐全。', '仪表温度计、液位计、压力、流量等一次仪表指示正确，校验标签及标示齐全。');
INSERT INTO `dic_attachtype_content` VALUES ('93', '仪表', '建立罐区可燃气体检测报警器台账、平面布置图。', '建立罐区可燃气体检测报警器台账、平面布置图。');
INSERT INTO `dic_attachtype_content` VALUES ('94', '仪表', '每周对可燃气体检测报警器巡检一次，并有记录，内容包括：（1）报警器是否故障，显示是否清晰、完好。（2）24V电源工作是否正常。（3）防雨罩是否完好。（4）变送器防爆密封件和固定是否完好。', '每周对可燃气体检测报警器巡检一次，并有记录，内容包括：（1）报警器是否故障，显示是否清晰、完好。（2）24V电源工作是否正常。（3）防雨罩是否完好。（4）变送器防爆密封件和固定是否完好。');
INSERT INTO `dic_attachtype_content` VALUES ('95', '仪表', '每六个月对可燃气体检测报警器校验一次。', '每六个月对可燃气体检测报警器校验一次。');
INSERT INTO `dic_attachtype_content` VALUES ('96', '仪表', '仪表供电要求冗余配置。', '仪表供电要求冗余配置。');
INSERT INTO `dic_attachtype_content` VALUES ('97', '仪表', 'UPS电源连续供电时间不应少于8小时，应每季度测试一次，并有记录。', 'UPS电源连续供电时间不应少于8小时，应每季度测试一次，并有记录。');
INSERT INTO `dic_attachtype_content` VALUES ('98', '仪表', 'UPS电源应每季度测试一次，并有记录。', 'UPS电源应每季度测试一次，并有记录。');
INSERT INTO `dic_attachtype_content` VALUES ('99', '油罐防雷防静电接地', '油罐周边接地应符合要求（每30米一处，且不少于两处）。', '油罐周边接地应符合要求（每30米一处，且不少于两处）。');
INSERT INTO `dic_attachtype_content` VALUES ('100', '油罐防雷防静电接地', '接地线连接牢固，无损伤、断裂现象。', '接地线连接牢固，无损伤、断裂现象。');
INSERT INTO `dic_attachtype_content` VALUES ('101', '油罐防雷防静电接地', '浮盘和罐体跨接线完好，每年春秋两季应进行测试并要有记录。', '浮盘和罐体跨接线完好，每年春秋两季应进行测试并要有记录。');
INSERT INTO `dic_attachtype_content` VALUES ('102', '油罐防雷防静电接地', '浮盘和罐体的等电位装置，每年春秋两季应进行测试并要有记录。', '浮盘和罐体的等电位装置，每年春秋两季应进行测试并要有记录。');
INSERT INTO `dic_attachtype_content` VALUES ('103', '油罐防雷防静电接地', '油罐接地极设置应符合规定，连接正确（每罐防雷接地极至少两组，且接地电阻≤10Ω，与变配电间相连的油罐要求接地电阻≤4Ω）。', '油罐接地极设置应符合规定，连接正确（每罐防雷接地极至少两组，且接地电阻≤10Ω，与变配电间相连的油罐要求接地电阻≤4Ω）。');
INSERT INTO `dic_attachtype_content` VALUES ('104', '油罐防雷防静电接地', '可燃液体储罐的温度、液位等测量装置应采用铠装电缆或钢管配线，电缆外皮或配线钢管与罐体应作电气连接。', '可燃液体储罐的温度、液位等测量装置应采用铠装电缆或钢管配线，电缆外皮或配线钢管与罐体应作电气连接。');
INSERT INTO `dic_attachtype_content` VALUES ('105', '油罐防雷防静电接地', '防雷防静电检测应每年进行两次。检测单位要具备防雷防静电检测资质，并出具检测报告，由使用单位进行存档保存。', '防雷防静电检测应每年进行两次。检测单位要具备防雷防静电检测资质，并出具检测报告，由使用单位进行存档保存。');
INSERT INTO `dic_attachtype_content` VALUES ('106', '检修及施工作业管理', '罐区应配备防爆工机具，日常检维修作业必须使用防爆工具。', '罐区应配备防爆工机具，日常检维修作业必须使用防爆工具。');
INSERT INTO `dic_attachtype_content` VALUES ('107', '检修及施工作业管理', '罐体及重要附件的施工方案应包括施工组织、工艺及技术措施、质量控制、检查验收标准、安全措施等内容。施工方案和图纸需经审定后方可下发执行，施工单位应严格按最终审核意见组织施工。', '罐体及重要附件的施工方案应包括施工组织、工艺及技术措施、质量控制、检查验收标准、安全措施等内容。施工方案和图纸需经审定后方可下发执行，施工单位应严格按最终审核意见组织施工。');
INSERT INTO `dic_attachtype_content` VALUES ('108', '检修及施工作业管理', '应明确浮顶、密封、中央排水管等重要附件安装要求，安装时供货厂家应到现场指导安装。组装式浮顶安装完毕后应进行充水试验，并检验密封性能。', '应明确浮顶、密封、中央排水管等重要附件安装要求，安装时供货厂家应到现场指导安装。组装式浮顶安装完毕后应进行充水试验，并检验密封性能。');
INSERT INTO `dic_attachtype_content` VALUES ('109', '检修及施工作业管理', '清罐检查应重点检查以下内容：罐体腐蚀状况。对罐内壁、底板及内防腐涂层进行全面评估，并彻底清除罐内杂物；浮顶密封及边缘橡胶密封。不能满足要求的应及时进行检修、更换。', '清罐检查应重点检查以下内容：罐体腐蚀状况。对罐内壁、底板及内防腐涂层进行全面评估，并彻底清除罐内杂物；浮顶密封及边缘橡胶密封。不能满足要求的应及时进行检修、更换。');
INSERT INTO `dic_attachtype_content` VALUES ('110', '检修及施工作业管理', '对可能存在硫化亚铁的储罐，在清罐过程中要有针对防止硫化亚铁自燃的措施。', '对可能存在硫化亚铁的储罐，在清罐过程中要有针对防止硫化亚铁自燃的措施。');
INSERT INTO `dic_attachtype_content` VALUES ('111', '检修及施工作业管理', '需进罐检查或在罐体动火的检修项目，在检修前施工单位和使用部门，应做好防火安全措施和防中毒、窒息措施。', '需进罐检查或在罐体动火的检修项目，在检修前施工单位和使用部门，应做好防火安全措施和防中毒、窒息措施。');
INSERT INTO `dic_attachtype_content` VALUES ('112', '检修及施工作业管理', '常压金属储罐应根据运行情况定期检修。检修内容包括罐体清理、罐体及附件的检查、校验、修理，罐壁、罐顶、罐底板的检验检测项目等。储罐的检修周期一般为2～6年。', '常压金属储罐应根据运行情况定期检修。检修内容包括罐体清理、罐体及附件的检查、校验、修理，罐壁、罐顶、罐底板的检验检测项目等。储罐的检修周期一般为2～6年。');
INSERT INTO `dic_attachtype_content` VALUES ('113', '检修及施工作业管理', '常压金属储罐设备的全面检验一般应委托特种设备检验检测机构实施，从事常压金属储罐设备全面检验的特种设备检验检测机构和检验人员，应当具备相应的检验资质。', '常压金属储罐设备的全面检验一般应委托特种设备检验检测机构实施，从事常压金属储罐设备全面检验的特种设备检验检测机构和检验人员，应当具备相应的检验资质。');
INSERT INTO `dic_attachtype_content` VALUES ('114', '检修及施工作业管理', '常压金属储罐设备停用超过两年，经重新全面检验合格后才能使用。', '常压金属储罐设备停用超过两年，经重新全面检验合格后才能使用。');
INSERT INTO `dic_attachtype_content` VALUES ('115', '机泵', '机泵检修应编制检修操作卡。', '机泵检修应编制检修操作卡。');
INSERT INTO `dic_attachtype_content` VALUES ('116', '机泵', '应建立机泵运行台账。', '应建立机泵运行台账。');
INSERT INTO `dic_attachtype_content` VALUES ('117', '机泵', '机泵润滑油更换要有记录、润滑油卡片应一泵一卡。', '机泵润滑油更换要有记录、润滑油卡片应一泵一卡。');
INSERT INTO `dic_attachtype_content` VALUES ('118', '消防设施管理', '定期检查消火栓、消防井，设施应完好，每年春秋两季应对消火栓进行试用，保证开启灵活自如。消防栓每月检查一次，填写检查记录，存在问题的挂牌标识，及时维修。', '定期检查消火栓、消防井，设施应完好，每年春秋两季应对消火栓进行试用，保证开启灵活自如。消防栓每月检查一次，填写检查记录，存在问题的挂牌标识，及时维修。');
INSERT INTO `dic_attachtype_content` VALUES ('119', '消防设施管理', '消火栓箱内应按要求配备消防水带、消防水枪或消防泡沫枪等，并有明显标志和编号。', '消火栓箱内应按要求配备消防水带、消防水枪或消防泡沫枪等，并有明显标志和编号。');
INSERT INTO `dic_attachtype_content` VALUES ('120', '消防设施管理', '消防喷淋系统每月试验一次(冬季防冻防凝期间除外），确保系统完好。', '消防喷淋系统每月试验一次(冬季防冻防凝期间除外），确保系统完好。');
INSERT INTO `dic_attachtype_content` VALUES ('121', '消防设施管理', '灭火器每月检查不少于一次，填写检查记录。干粉灭火器有效期10年，使用5年后要进行检修，以后每2年检修一次。', '灭火器每月检查不少于一次，填写检查记录。干粉灭火器有效期10年，使用5年后要进行检修，以后每2年检修一次。');
INSERT INTO `dic_attachtype_content` VALUES ('122', '消防设施管理', '消防系统管线应完好无泄漏，阀门、法兰、垫片压力等级应满足稳高压系统使用要求，避免应急使用时增压不足的隐患。每年春秋两季对稳高压系统进行压力测试，管网末端压力要达到0.7—1.2MPa，保压60分钟，并做好记录。', '消防系统管线应完好无泄漏，阀门、法兰、垫片压力等级应满足稳高压系统使用要求，避免应急使用时增压不足的隐患。每年春秋两季对稳高压系统进行压力测试，管网末端压力要达到0.7—1.2MPa，保压60分钟，并做好记录。');
INSERT INTO `dic_attachtype_content` VALUES ('123', '气体检测管理', '固定式可燃气体、有毒有害检测仪表设置部位、数量、安装高度符合要求，定期检查、鉴定，确保完好，气体浓度超标报警有处理记录，台帐记录齐全。', '固定式可燃气体、有毒有害检测仪表设置部位、数量、安装高度符合要求，定期检查、鉴定，确保完好，气体浓度超标报警有处理记录，台帐记录齐全。');
INSERT INTO `dic_attachtype_content` VALUES ('124', '气体检测管理', '便携式可燃气体、有毒有害气体检测仪定期鉴定，保证完好。配备数量满足检测需要，使用人员经过培训。', '便携式可燃气体、有毒有害气体检测仪定期鉴定，保证完好。配备数量满足检测需要，使用人员经过培训。');
INSERT INTO `dic_attachtype_content` VALUES ('125', '气体检测管理', '涉及硫化氢等高度危险性介质的场所，员工从事操作、现场采样、异常检查和事故处置时必须佩戴正压空气呼吸器；进行巡检时员工必须携带相应有毒气体监测仪和自吸过滤式防毒面具；检测仪器报警时应立即佩戴自吸过滤式防毒面具并撤离。', '涉及硫化氢等高度危险性介质的场所，员工从事操作、现场采样、异常检查和事故处置时必须佩戴正压空气呼吸器；进行巡检时员工必须携带相应有毒气体监测仪和自吸过滤式防毒面具；检测仪器报警时应立即佩戴自吸过滤式防毒面具并撤离。');
INSERT INTO `dic_attachtype_content` VALUES ('126', '气体检测管理', '个人气体防护用品和应急气防用品配备严格执行板块标准《炼化企业气体防护用品管理指导意见》，对使用情况定期检查，留有记录。', '个人气体防护用品和应急气防用品配备严格执行板块标准《炼化企业气体防护用品管理指导意见》，对使用情况定期检查，留有记录。');
INSERT INTO `dic_attachtype_content` VALUES ('127', '火灾报警设施', '单位应建立火灾报警系统技术档案，有操作规程和岗位规章制度，火灾报警控制系统时刻处于正常工作状态，报警有处理记录。要定期进行联动测试，留有记录。', '单位应建立火灾报警系统技术档案，有操作规程和岗位规章制度，火灾报警控制系统时刻处于正常工作状态，报警有处理记录。要定期进行联动测试，留有记录。');
INSERT INTO `dic_attachtype_content` VALUES ('128', '火灾报警设施', '火灾报警系统的操作和维护人员应经专业培训，取得消防监督机构颁发的操作证，应掌握火灾报警系统的工作原理和操作规程，熟悉火灾报警装置的报警部位和各监护场所的具体位置。', '火灾报警系统的操作和维护人员应经专业培训，取得消防监督机构颁发的操作证，应掌握火灾报警系统的工作原理和操作规程，熟悉火灾报警装置的报警部位和各监护场所的具体位置。');
INSERT INTO `dic_attachtype_content` VALUES ('129', '火灾报警设施', '储罐区应设置工业视频监控系统，显示画面监控要落实岗位责任制，岗位人员要实时进行监控，发现问题及时处理，并做好记录。', '储罐区应设置工业视频监控系统，显示画面监控要落实岗位责任制，岗位人员要实时进行监控，发现问题及时处理，并做好记录。');
INSERT INTO `dic_attachtype_content` VALUES ('130', '火灾报警设施', '各类安全仪表故障能得到及时处理，管理、维护责任明晰。', '各类安全仪表故障能得到及时处理，管理、维护责任明晰。');
INSERT INTO `dic_attachtype_content` VALUES ('131', '应急管理', '储罐区预案的编制严格执行《炼化企业车间级应急预案编制指导意见》和《炼化企业车间级应急预案编制指南》（油炼化〔2011〕第11号文件），覆盖全面，分级管理。专项处置预案具体化、针对性要强，确保可操作性。泄漏处置预案要分部位编制，如储罐根部管线第一道法兰、罐体其他部位泄漏点等。联动预案要结合应急资源调动、周边环境等因素，明确各级应急响应职责，制定应急响应措施。\"', '储罐区预案的编制严格执行《炼化企业车间级应急预案编制指导意见》和《炼化企业车间级应急预案编制指南》（油炼化〔2011〕第11号文件），覆盖全面，分级管理。专项处置预案具体化、针对性要强，确保可操作性。泄漏处置预案要分部位编制，如储罐根部管线第一道法兰、罐体其他部位泄漏点等。联动预案要结合应急资源调动、周边环境等因素，明确各级应急响应职责，制定应急响应措施。\"');
INSERT INTO `dic_attachtype_content` VALUES ('132', '应急管理', '定期组织应急演练，全员参与，尤其各级管理人员要参加演练，对演练中出现的问题必须落实整改，并及时修订应急预案。', '定期组织应急演练，全员参与，尤其各级管理人员要参加演练，对演练中出现的问题必须落实整改，并及时修订应急预案。');
INSERT INTO `dic_attachtype_content` VALUES ('133', '应急管理', '储罐区应急预案要明确应急物资种类、数量、存储等相关内容，应急物资存放要便于随时取用。', '储罐区应急预案要明确应急物资种类、数量、存储等相关内容，应急物资存放要便于随时取用。');
INSERT INTO `dic_attachtype_content` VALUES ('134', '应急管理', '储罐区应急物资配备应符合Q/SY136-2012标准要求。', '储罐区应急物资配备应符合Q/SY136-2012标准要求。');
INSERT INTO `dic_attachtype_content` VALUES ('135', '环保三级防控', '罐区雨排阀应保持常闭状态，排水明沟、地漏、下水畅通。', '罐区雨排阀应保持常闭状态，排水明沟、地漏、下水畅通。');
INSERT INTO `dic_attachtype_content` VALUES ('136', '环保三级防控', '罐区操作规程要明确外排水阀开启要求，有排水系统工艺流程图。', '罐区操作规程要明确外排水阀开启要求，有排水系统工艺流程图。');
INSERT INTO `dic_attachtype_content` VALUES ('137', '环保三级防控', '外排水阀开启操作要有操作记录。', '外排水阀开启操作要有操作记录。');
INSERT INTO `dic_attachtype_content` VALUES ('138', '安全教育', '对上级通报和本企业的储运罐区事故、事件组织全员学习，举一反三，识别岗位存在的各类风险，查找隐患，及时整改。', '对上级通报和本企业的储运罐区事故、事件组织全员学习，举一反三，识别岗位存在的各类风险，查找隐患，及时整改。');
INSERT INTO `dic_attachtype_content` VALUES ('139', '安全教育', '对暂时不能整改的隐患组织评价，制定风险消减措施，分级管理，实时更新隐患台帐。', '对暂时不能整改的隐患组织评价，制定风险消减措施，分级管理，实时更新隐患台帐。');
INSERT INTO `dic_attachtype_content` VALUES ('140', '安全教育', '对隐患及风险消减措施要组织员工培训，并对培训效果进行验证', '对隐患及风险消减措施要组织员工培训，并对培训效果进行验证');
INSERT INTO `dic_attachtype_content` VALUES ('141', '工艺技术管理', '是否建立外浮顶罐液面以上气相空间可燃气体和氧气含量定期检测分析台账。', '是否建立外浮顶罐液面以上气相空间可燃气体和氧气含量定期检测分析台账。');
INSERT INTO `dic_attachtype_content` VALUES ('142', '工艺技术管理', '是否建立定期进行人工检尺，与油罐液位计进行对比校验，并做好记录，台账。', '是否建立定期进行人工检尺，与油罐液位计进行对比校验，并做好记录，台账。');
INSERT INTO `dic_attachtype_content` VALUES ('143', '工艺技术管理', '现场工艺管道介质、走向标识清楚，标识位置设置合理。', '现场工艺管道介质、走向标识清楚，标识位置设置合理。');
INSERT INTO `dic_attachtype_content` VALUES ('144', '工艺技术管理', '油罐高低液位控制应符合<<石油储备库设计规范>>GB50737-2011规定。', '油罐高低液位控制应符合<<石油储备库设计规范>>GB50737-2011规定。');
INSERT INTO `dic_attachtype_content` VALUES ('145', '工艺技术管理', '单项操作卡是否包括：收油、付油、倒罐、检尺、油罐加热、机泵开停、搅拌器开停等。', '单项操作卡是否包括：收油、付油、倒罐、检尺、油罐加热、机泵开停、搅拌器开停等。');
INSERT INTO `dic_attachtype_content` VALUES ('146', '生产运行和巡检操作', '是否建立岗位巡检制度、劳动纪律、工艺纪律、岗位交接班等生产制度。', '是否建立岗位巡检制度、劳动纪律、工艺纪律、岗位交接班等生产制度。');
INSERT INTO `dic_attachtype_content` VALUES ('147', '生产运行和巡检操作', '是否建立介质互窜点台账，采取可靠的隔离措施，防止物料互窜，如盲板隔断、两阀一导淋或上锁挂签。 ', '是否建立介质互窜点台账，采取可靠的隔离措施，防止物料互窜，如盲板隔断、两阀一导淋或上锁挂签。 ');
INSERT INTO `dic_attachtype_content` VALUES ('148', '生产运行和巡检操作', '应建立盲肠死角台账并挂牌管理，采取有效措施进行控制。', '应建立盲肠死角台账并挂牌管理，采取有效措施进行控制。');
INSERT INTO `dic_attachtype_content` VALUES ('149', '生产运行和巡检操作', '对涉及硫化氢等高度危险性介质的场所，员工从事操作、现场采样、异常检查和事故处置时必须佩戴正压空气呼吸器并确定监护人；进行巡检时员工必须携带相应有毒气体监测仪和自吸过滤式防毒面具；', '对涉及硫化氢等高度危险性介质的场所，员工从事操作、现场采样、异常检查和事故处置时必须佩戴正压空气呼吸器并确定监护人；进行巡检时员工必须携带相应有毒气体监测仪和自吸过滤式防毒面具；');
INSERT INTO `dic_attachtype_content` VALUES ('150', '生产运行和巡检操作', '巡检路线设置应覆盖全部区域，不留死角。巡检路线上积水、障碍物应及时清理，照明、踏步、扶梯应完好。', '巡检路线设置应覆盖全部区域，不留死角。巡检路线上积水、障碍物应及时清理，照明、踏步、扶梯应完好。');
INSERT INTO `dic_attachtype_content` VALUES ('151', '生产运行和巡检操作', '查巡检管理制度落实情况；查各生产部巡检情况、巡检记录、值班记录；查生产部电子巡检漏检情况，巡检管理考核情况；查岗位交接班记录、交接班会情况。', '查巡检管理制度落实情况；查各生产部巡检情况、巡检记录、值班记录；查生产部电子巡检漏检情况，巡检管理考核情况；查岗位交接班记录、交接班会情况。');
INSERT INTO `dic_attachtype_content` VALUES ('152', '查承包商监管和“五关”管理措施落实情况', '是否有承包商考核管理相关制度；是否对承包商进行考核；是否对承包商进行检查、评价；', '是否有承包商考核管理相关制度；是否对承包商进行考核；是否对承包商进行检查、评价；');
INSERT INTO `dic_attachtype_content` VALUES ('153', '查承包商监管和“五关”管理措施落实情况', '查施工企业是否取得政府或行业主管部门颁发的安全资格证书，安全生产许可证是否在有效期内；', '查施工企业是否取得政府或行业主管部门颁发的安全资格证书，安全生产许可证是否在有效期内；');
INSERT INTO `dic_attachtype_content` VALUES ('154', '查承包商监管和“五关”管理措施落实情况', '施工企业负责人、安全管理人员是否经过安全培训，是否取得上岗安全资格证书，现场是否建立完善安全组织机构；入场人员是否进行安全教育考试；', '施工企业负责人、安全管理人员是否经过安全培训，是否取得上岗安全资格证书，现场是否建立完善安全组织机构；入场人员是否进行安全教育考试；');
INSERT INTO `dic_attachtype_content` VALUES ('155', '查承包商监管和“五关”管理措施落实情况', '施工前是否向全体参加施工的人员进行安全技术交底；', '施工前是否向全体参加施工的人员进行安全技术交底；');
INSERT INTO `dic_attachtype_content` VALUES ('156', '查承包商监管和“五关”管理措施落实情况', '承包商是否签订服务合同、HSE合同，是否按合同组织工程施工，分包商是否符合合同要求', '承包商是否签订服务合同、HSE合同，是否按合同组织工程施工，分包商是否符合合同要求');
INSERT INTO `dic_attachtype_content` VALUES ('157', '设备抢修、危险作业', '查有无施工及安全方案；方案是否按要求审批；施工监护人员是否满足要求；监护措施是否落实；劳动防护是否符合要求；票证是否齐全；工器具是否完好；是否对能量进行上锁挂签隔离；查特种作业人员资质；', '查有无施工及安全方案；方案是否按要求审批；施工监护人员是否满足要求；监护措施是否落实；劳动防护是否符合要求；票证是否齐全；工器具是否完好；是否对能量进行上锁挂签隔离；查特种作业人员资质；');

-- ----------------------------
-- Table structure for dic_bottomrainability
-- ----------------------------
DROP TABLE IF EXISTS `dic_bottomrainability`;
CREATE TABLE `dic_bottomrainability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_bottomrainability
-- ----------------------------
INSERT INTO `dic_bottomrainability` VALUES ('7', '平时三分之一以上的底板浸在水中', '平时三分之一以上的底板浸在水中');
INSERT INTO `dic_bottomrainability` VALUES ('8', '暴雨时底部有积水', '暴雨时底部有积水');
INSERT INTO `dic_bottomrainability` VALUES ('9', '暴雨时也无积水', '暴雨时也无积水');

-- ----------------------------
-- Table structure for dic_bottomtype
-- ----------------------------
DROP TABLE IF EXISTS `dic_bottomtype`;
CREATE TABLE `dic_bottomtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_bottomtype
-- ----------------------------
INSERT INTO `dic_bottomtype` VALUES ('7', '单底板', '单底板');
INSERT INTO `dic_bottomtype` VALUES ('8', '双底板', '双底板');

-- ----------------------------
-- Table structure for dic_checkresult
-- ----------------------------
DROP TABLE IF EXISTS `dic_checkresult`;
CREATE TABLE `dic_checkresult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_checkresult
-- ----------------------------
INSERT INTO `dic_checkresult` VALUES ('7', '验收通过', '验收通过');
INSERT INTO `dic_checkresult` VALUES ('8', '验收不通过', '验收不通过');

-- ----------------------------
-- Table structure for dic_classify
-- ----------------------------
DROP TABLE IF EXISTS `dic_classify`;
CREATE TABLE `dic_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classifyId` varchar(100) DEFAULT NULL,
  `classifyValue` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_classify
-- ----------------------------
INSERT INTO `dic_classify` VALUES ('1', '储罐信息', '储罐信息');
INSERT INTO `dic_classify` VALUES ('2', '设备信息', '设备信息');
INSERT INTO `dic_classify` VALUES ('3', '检验维修', '检验维修');
INSERT INTO `dic_classify` VALUES ('4', '附件相关', '附件相关');

-- ----------------------------
-- Table structure for dic_content
-- ----------------------------
DROP TABLE IF EXISTS `dic_content`;
CREATE TABLE `dic_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `key` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=887 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_content
-- ----------------------------
INSERT INTO `dic_content` VALUES ('139', '2', '高盐土', '高盐土', '备注1\n');
INSERT INTO `dic_content` VALUES ('149', '2', '碎石', '碎石', null);
INSERT INTO `dic_content` VALUES ('233', '1', '无', '无', '你好');
INSERT INTO `dic_content` VALUES ('235', '1', '有（安装维修按照标准）', '有（安装维修按照标准）', null);
INSERT INTO `dic_content` VALUES ('244', '2', '建筑用砂', '建筑用砂', null);
INSERT INTO `dic_content` VALUES ('397', '1', '有（安装维修未按照标准）', '有（安装维修未按照标准）', null);
INSERT INTO `dic_content` VALUES ('398', '2', '自然土', '自然土', null);
INSERT INTO `dic_content` VALUES ('399', '2', '沥青砂', '沥青砂', null);
INSERT INTO `dic_content` VALUES ('400', '2', '水泥', '水泥', null);
INSERT INTO `dic_content` VALUES ('402', '2', '油砂', '油砂', null);
INSERT INTO `dic_content` VALUES ('403', '3', '平时三分之一以上的底板浸在水中', '平时三分之一以上的底板浸在水中', null);
INSERT INTO `dic_content` VALUES ('404', '3', '暴雨时底部有积水', '暴雨时底部有积水', null);
INSERT INTO `dic_content` VALUES ('405', '3', '暴雨时也无积水', '暴雨时也无积水', null);
INSERT INTO `dic_content` VALUES ('406', '4', '单底板', '单底板', null);
INSERT INTO `dic_content` VALUES ('407', '4', '双底板', '双底板', null);
INSERT INTO `dic_content` VALUES ('408', '5', '验收通过', '验收通过', null);
INSERT INTO `dic_content` VALUES ('409', '5', '验收不通过', '验收不通过', null);
INSERT INTO `dic_content` VALUES ('412', '6', '清洗单位1', '清洗单位1', null);
INSERT INTO `dic_content` VALUES ('413', '6', '清洗单位2', '清洗单位2', null);
INSERT INTO `dic_content` VALUES ('414', '6', '清洗单位3', '清洗单位3', null);
INSERT INTO `dic_content` VALUES ('415', '7', '施工单位1', '施工单位1', null);
INSERT INTO `dic_content` VALUES ('416', '7', '施工单位2', '施工单位2', null);
INSERT INTO `dic_content` VALUES ('417', '7', '施工单位3', '施工单位3', null);
INSERT INTO `dic_content` VALUES ('418', '8', '施工类别1', '施工类别1', null);
INSERT INTO `dic_content` VALUES ('420', '8', '施工类别2', '施工类别2', null);
INSERT INTO `dic_content` VALUES ('422', '8', '施工类别3', '施工类别3', null);
INSERT INTO `dic_content` VALUES ('423', '9', '测量', '测量', null);
INSERT INTO `dic_content` VALUES ('424', '9', '专家', '专家', null);
INSERT INTO `dic_content` VALUES ('425', '9', '理论', '理论', null);
INSERT INTO `dic_content` VALUES ('426', '10', '双浮盘外浮顶罐', '双浮盘外浮顶罐', '');
INSERT INTO `dic_content` VALUES ('427', '10', '内浮顶罐', '内浮顶罐', null);
INSERT INTO `dic_content` VALUES ('428', '11', '热带/海上', '热带/海上', null);
INSERT INTO `dic_content` VALUES ('429', '11', '温带/温和', '温带/温和', null);
INSERT INTO `dic_content` VALUES ('430', '11', '干旱/沙漠', '干旱/沙漠', null);
INSERT INTO `dic_content` VALUES ('431', '12', '合金', '合金', null);
INSERT INTO `dic_content` VALUES ('432', '12', '搪玻璃', '搪玻璃', null);
INSERT INTO `dic_content` VALUES ('433', '12', '有机涂层', '有机涂层', null);
INSERT INTO `dic_content` VALUES ('434', '12', '耐火砖', '耐火砖', null);
INSERT INTO `dic_content` VALUES ('435', '12', '陶瓷纤维', '陶瓷纤维', null);
INSERT INTO `dic_content` VALUES ('436', '13', '无', '无', null);
INSERT INTO `dic_content` VALUES ('437', '13', '标准', '标准', null);
INSERT INTO `dic_content` VALUES ('438', '14', 'Q235-AF', 'Q235-AF', '');
INSERT INTO `dic_content` VALUES ('439', '14', 'Q235-A', 'Q235-A', null);
INSERT INTO `dic_content` VALUES ('440', '14', 'Q235-B', 'Q235-B', null);
INSERT INTO `dic_content` VALUES ('441', '14', 'Q235-C', 'Q235-C', null);
INSERT INTO `dic_content` VALUES ('442', '14', 'Q245R', 'Q245R', null);
INSERT INTO `dic_content` VALUES ('443', '14', 'Q345-B', 'Q345-B', null);
INSERT INTO `dic_content` VALUES ('444', '14', 'Q345-C', 'Q345-C', null);
INSERT INTO `dic_content` VALUES ('445', '14', 'Q345-R', 'Q345-R', null);
INSERT INTO `dic_content` VALUES ('446', '14', '16MnDR', '16MnDR', null);
INSERT INTO `dic_content` VALUES ('447', '14', '15MnNbR', '15MnNbR', null);
INSERT INTO `dic_content` VALUES ('448', '14', '12MnNiVR', '12MnNiVR', null);
INSERT INTO `dic_content` VALUES ('449', '14', '07MnNiCrMoVDR', '07MnNiCrMoVDR', null);
INSERT INTO `dic_content` VALUES ('450', '14', '0Cr13', '0Cr13', null);
INSERT INTO `dic_content` VALUES ('451', '14', '0Cr18Ni9', '0Cr18Ni9', null);
INSERT INTO `dic_content` VALUES ('452', '14', '0Cr18Ni10Ti', '0Cr18Ni10Ti', null);
INSERT INTO `dic_content` VALUES ('453', '14', '0Cr17Ni12Mo2', '0Cr17Ni12Mo2', null);
INSERT INTO `dic_content` VALUES ('454', '14', '00Cr19Ni10', '00Cr19Ni10', null);
INSERT INTO `dic_content` VALUES ('455', '14', '00Cr17Ni14Mo2', '00Cr17Ni14Mo2', null);
INSERT INTO `dic_content` VALUES ('456', '14', '00CR18Ni5Mo3Si2', '00CR18Ni5Mo3Si2', null);
INSERT INTO `dic_content` VALUES ('457', '15', 'A', 'A', null);
INSERT INTO `dic_content` VALUES ('458', '15', 'B', 'B', null);
INSERT INTO `dic_content` VALUES ('459', '15', '无', '无', null);
INSERT INTO `dic_content` VALUES ('460', '16', 'C0~C16', 'C0~C16', null);
INSERT INTO `dic_content` VALUES ('461', '17', 'C17+', 'C17+', null);
INSERT INTO `dic_content` VALUES ('462', '17', '甲B类', '甲B类', null);
INSERT INTO `dic_content` VALUES ('463', '17', '乙A类', '乙A类', null);
INSERT INTO `dic_content` VALUES ('464', '17', '乙B类', '乙B类', null);
INSERT INTO `dic_content` VALUES ('465', '17', '丙A类', '丙A类', null);
INSERT INTO `dic_content` VALUES ('466', '17', '丙B类', '丙B类', null);
INSERT INTO `dic_content` VALUES ('467', '18', '无易燃性', '无易燃性', null);
INSERT INTO `dic_content` VALUES ('468', '18', '无毒性', '无毒性', null);
INSERT INTO `dic_content` VALUES ('469', '18', '轻度毒性', '轻度毒性', null);
INSERT INTO `dic_content` VALUES ('470', '18', '中度毒性', '中度毒性', null);
INSERT INTO `dic_content` VALUES ('471', '18', '高度毒性', '高度毒性', null);
INSERT INTO `dic_content` VALUES ('472', '18', '极度毒性', '极度毒性', null);
INSERT INTO `dic_content` VALUES ('473', '19', '立式拱顶罐', '立式拱顶罐', '');
INSERT INTO `dic_content` VALUES ('474', '19', '立式外浮顶罐', '立式外浮顶罐', '');
INSERT INTO `dic_content` VALUES ('475', '19', '立式内浮顶罐', '立式内浮顶罐', '');
INSERT INTO `dic_content` VALUES ('477', '20', '常压储罐', '常压储罐', null);
INSERT INTO `dic_content` VALUES ('478', '21', '高', '高', null);
INSERT INTO `dic_content` VALUES ('479', '21', '中', '中', null);
INSERT INTO `dic_content` VALUES ('480', '21', '低', '低', null);
INSERT INTO `dic_content` VALUES ('481', '22', '机械密封', '机械密封', null);
INSERT INTO `dic_content` VALUES ('482', '22', '软密封', '软密封', null);
INSERT INTO `dic_content` VALUES ('483', '23', '重质原油', '重质原油', '');
INSERT INTO `dic_content` VALUES ('484', '23', '重污油', '重污油', '');
INSERT INTO `dic_content` VALUES ('485', '23', '原油', '原油', '');
INSERT INTO `dic_content` VALUES ('486', '24', '无沉降检验', '无沉降检验', null);
INSERT INTO `dic_content` VALUES ('487', '24', '沉降符合API653标准', '沉降符合API653标准', null);
INSERT INTO `dic_content` VALUES ('488', '24', '沉降超出API653标准', '沉降超出API653标准', null);
INSERT INTO `dic_content` VALUES ('489', '25', '内部检查', '内部检查', '');
INSERT INTO `dic_content` VALUES ('490', '25', '外部检查', '外部检查', '');
INSERT INTO `dic_content` VALUES ('492', '26', '开罐检验', '开罐检验', '');
INSERT INTO `dic_content` VALUES ('493', '26', '在线检验', '在线检验', '');
INSERT INTO `dic_content` VALUES ('495', '27', '外浮顶', '外浮顶', null);
INSERT INTO `dic_content` VALUES ('496', '27', '内浮顶', '内浮顶', null);
INSERT INTO `dic_content` VALUES ('497', '27', '拱顶', '拱顶', null);
INSERT INTO `dic_content` VALUES ('498', '27', '锥顶', '锥顶', null);
INSERT INTO `dic_content` VALUES ('499', '27', '报废', '报废', null);
INSERT INTO `dic_content` VALUES ('500', '27', '其他', '其他', null);
INSERT INTO `dic_content` VALUES ('501', '29', '在用', '在用', null);
INSERT INTO `dic_content` VALUES ('502', '29', '非在用', '非在用', null);
INSERT INTO `dic_content` VALUES ('503', '30', '焊接', '焊接', null);
INSERT INTO `dic_content` VALUES ('504', '30', '铆接', '铆接', null);
INSERT INTO `dic_content` VALUES ('505', '35', '好', '好', null);
INSERT INTO `dic_content` VALUES ('506', '35', '良好', '良好', null);
INSERT INTO `dic_content` VALUES ('507', '35', '差', '差', null);
INSERT INTO `dic_content` VALUES ('508', '31', '是', '是', null);
INSERT INTO `dic_content` VALUES ('509', '31', '否', '否', null);
INSERT INTO `dic_content` VALUES ('510', '32', '全面腐蚀', '全面腐蚀', null);
INSERT INTO `dic_content` VALUES ('511', '32', '应力腐蚀开裂', '应力腐蚀开裂', null);
INSERT INTO `dic_content` VALUES ('512', '32', '点腐蚀', '点腐蚀', null);
INSERT INTO `dic_content` VALUES ('513', '32', '晶间腐蚀', '晶间腐蚀', null);
INSERT INTO `dic_content` VALUES ('518', '33', '表面式加热器', '表面式加热器', null);
INSERT INTO `dic_content` VALUES ('519', '33', '混合式加热器', '混合式加热器', null);
INSERT INTO `dic_content` VALUES ('520', '34', '牺牲阳极法', '牺牲阳极法', null);
INSERT INTO `dic_content` VALUES ('521', '43', '检查阴极保护装置电路连接是否牢固可靠，导线是否完好； 配电盘上熔断器是否完好；电流数值是否正常', '检查阴极保护装置电路连接是否牢固可靠，导线是否完好； 配电盘上熔断器是否完好；电流数值是否正常', '');
INSERT INTO `dic_content` VALUES ('523', '37', '罐顶有无变形', '罐顶有无变形', '');
INSERT INTO `dic_content` VALUES ('524', '37', '罐壁有无变形', '罐壁有无变形', '');
INSERT INTO `dic_content` VALUES ('525', '37', '罐体底部角焊缝完好情况', '罐体底部角焊缝完好情况', '');
INSERT INTO `dic_content` VALUES ('526', '37', '罐体基础及散水坡完好情况', '罐体基础及散水坡完好情况', '');
INSERT INTO `dic_content` VALUES ('527', '37', '防火堤及隔堤完好情况', '防火堤及隔堤完好情况', '');
INSERT INTO `dic_content` VALUES ('528', '37', '呼吸阀等安全附件运行及检查情况', '呼吸阀等安全附件运行及检查情况', '');
INSERT INTO `dic_content` VALUES ('529', '37', '液位、温度测量系统运行及完好情况', '液位、温度测量系统运行及完好情况', '');
INSERT INTO `dic_content` VALUES ('530', '37', '罐体内涂层、外油漆完好情况', '罐体内涂层、外油漆完好情况', '');
INSERT INTO `dic_content` VALUES ('531', '37', '罐体保温完好情况', '罐体保温完好情况', '');
INSERT INTO `dic_content` VALUES ('532', '37', '外加电流阴极保护设施完好情况', '外加电流阴极保护设施完好情况', '');
INSERT INTO `dic_content` VALUES ('533', '37', '消防设施运行及完好情况', '消防设施运行及完好情况', '');
INSERT INTO `dic_content` VALUES ('534', '37', '浮顶罐福鼎/浮舱密封性能完好情况', '浮顶罐福鼎/浮舱密封性能完好情况', '');
INSERT INTO `dic_content` VALUES ('535', '37', '浮顶罐转动浮梯、导向装置完好情况', '浮顶罐转动浮梯、导向装置完好情况', '');
INSERT INTO `dic_content` VALUES ('536', '37', '顶罐浮顶排水装置完好情况', '顶罐浮顶排水装置完好情况', '');
INSERT INTO `dic_content` VALUES ('537', '37', '浮顶罐灌顶(罐壁)通气孔等完好情况', '浮顶罐灌顶(罐壁)通气孔等完好情况', '');
INSERT INTO `dic_content` VALUES ('538', '38', '检验单位1', '检验单位1', '');
INSERT INTO `dic_content` VALUES ('539', '38', '检验单位2', '检验单位2', '');
INSERT INTO `dic_content` VALUES ('540', '38', '检验单位3', '检验单位3', '');
INSERT INTO `dic_content` VALUES ('541', '39', '高度有效', '高度有效', '');
INSERT INTO `dic_content` VALUES ('542', '39', '中高度有效', '中高度有效', '');
INSERT INTO `dic_content` VALUES ('543', '39', '中度有效', '中度有效', '');
INSERT INTO `dic_content` VALUES ('544', '39', '低度有效', '低度有效', '');
INSERT INTO `dic_content` VALUES ('546', '39', '无效', '无效', '');
INSERT INTO `dic_content` VALUES ('547', '40', '储罐及附属设施操作液位、压力、温度是否符合工艺指标要求。', '储罐及附属设施操作液位、压力、温度是否符合工艺指标要求。', '');
INSERT INTO `dic_content` VALUES ('548', '40', '储罐区各人孔、法兰、阀门是否有跑、冒、滴、漏现象;储罐有无变形和泄漏.', '储罐区各人孔、法兰、阀门是否有跑、冒、滴、漏现象;储罐有无变形和泄漏.', '');
INSERT INTO `dic_content` VALUES ('549', '40', '储罐相关的管线、阀门是否完好、开关状态是否符合运行工艺要求；现场启用阀门有无泄漏，启闭是否灵活、开度指示是否正确;管路与管件的连接处及焊逢处是否渗漏.', '储罐相关的管线、阀门是否完好、开关状态是否符合运行工艺要求；现场启用阀门有无泄漏，启闭是否灵活、开度指示是否正确;管路与管件的连接处及焊逢处是否渗漏.', '');
INSERT INTO `dic_content` VALUES ('550', '40', '储罐区内基础、围堰、排污等设施能否正常使用。', '储罐区内基础、围堰、排污等设施能否正常使用。', '');
INSERT INTO `dic_content` VALUES ('551', '40', '浮顶罐浮盘是否有积液。', '浮顶罐浮盘是否有积液。', '');
INSERT INTO `dic_content` VALUES ('552', '40', '浮顶罐浮顶排水装置是否正常，有无泄漏、排水有无带油。', '浮顶罐浮顶排水装置是否正常，有无泄漏、排水有无带油。', '');
INSERT INTO `dic_content` VALUES ('553', '40', '储罐基础是否牢固，有无裂缝、倾斜，散水坡有无损坏', '储罐基础是否牢固，有无裂缝、倾斜，散水坡有无损坏', '');
INSERT INTO `dic_content` VALUES ('554', '40', '检查雨污分流雨排阀门是否关闭', '检查雨污分流雨排阀门是否关闭', '');
INSERT INTO `dic_content` VALUES ('555', '40', '检查管线是否有明显扭曲、位移、变形', '检查管线是否有明显扭曲、位移、变形', '');
INSERT INTO `dic_content` VALUES ('556', '40', '罐区内明沟盖板是否齐全，阀井盖是否完整', '罐区内明沟盖板是否齐全，阀井盖是否完整', '');
INSERT INTO `dic_content` VALUES ('557', '40', '储罐进油速率是否符合工艺指标', '储罐进油速率是否符合工艺指标', '');
INSERT INTO `dic_content` VALUES ('558', '40', '设有脱水系统的储罐，脱水系统开关是否正常', '设有脱水系统的储罐，脱水系统开关是否正常', '');
INSERT INTO `dic_content` VALUES ('559', '40', '罐区内机泵运转良好，温度、压力、振动是否正常，有无泄漏情况及备用机泵是否备用；备用机泵是否按规定盘车', '罐区内机泵运转良好，温度、压力、振动是否正常，有无泄漏情况及备用机泵是否备用；备用机泵是否按规定盘车', '');
INSERT INTO `dic_content` VALUES ('560', '40', '检查管线伴热是否正常', '检查管线伴热是否正常', '');
INSERT INTO `dic_content` VALUES ('561', '40', '现场巡检和消防通道是否清洁畅通。', '现场巡检和消防通道是否清洁畅通。', '');
INSERT INTO `dic_content` VALUES ('562', '40', '储罐区内有无违章现象。', '储罐区内有无违章现象。', '');
INSERT INTO `dic_content` VALUES ('563', '40', '夜间照明是否完好。', '夜间照明是否完好。', '');
INSERT INTO `dic_content` VALUES ('564', '40', '各类检测、报警、监控设施有无异常。', '各类检测、报警、监控设施有无异常。', '');
INSERT INTO `dic_content` VALUES ('565', '40', '气防应急设施及装备是否完好。', '气防应急设施及装备是否完好。', '');
INSERT INTO `dic_content` VALUES ('566', '40', '现场有无乱排乱放现象。', '现场有无乱排乱放现象。', '');
INSERT INTO `dic_content` VALUES ('567', '40', '检查罐区外雨水出口阀门是否关闭。', '检查罐区外雨水出口阀门是否关闭。', '');
INSERT INTO `dic_content` VALUES ('568', '41', '外浮顶罐和内浮顶罐正常操作时，其最低液面是否符合工艺指标。', '外浮顶罐和内浮顶罐正常操作时，其最低液面是否符合工艺指标。', '');
INSERT INTO `dic_content` VALUES ('569', '41', '储罐进油速率是否符合工艺指标。', '储罐进油速率是否符合工艺指标。', '');
INSERT INTO `dic_content` VALUES ('570', '41', '与储罐相关的阀门是否完好、开关状态是否符合运行工艺的要求。', '与储罐相关的阀门是否完好、开关状态是否符合运行工艺的要求。', '');
INSERT INTO `dic_content` VALUES ('571', '41', '管线是否按照要求进行放空', '管线是否按照要求进行放空', '');
INSERT INTO `dic_content` VALUES ('572', '41', '检查储罐的液位、压力、温度是否正常，符合工艺卡片要求。 温度计、液位计一、二次表完好。', '检查储罐的液位、压力、温度是否正常，符合工艺卡片要求。 温度计、液位计一、二次表完好。', '');
INSERT INTO `dic_content` VALUES ('573', '41', '检查罐区盲板标示是否清楚。', '检查罐区盲板标示是否清楚。', '');
INSERT INTO `dic_content` VALUES ('574', '41', '检查加热器完好情况，排水有无带油现象。', '检查加热器完好情况，排水有无带油现象。', '');
INSERT INTO `dic_content` VALUES ('575', '41', '检查自动切水器运行是否正常； 检查储罐脱水是否符合要求。', '检查自动切水器运行是否正常； 检查储罐脱水是否符合要求。', '');
INSERT INTO `dic_content` VALUES ('576', '41', '检查隔油池污水排放是否正常', '检查隔油池污水排放是否正常', '');
INSERT INTO `dic_content` VALUES ('577', '41', '检查雨污分流设施完好情况。', '检查雨污分流设施完好情况。', '');
INSERT INTO `dic_content` VALUES ('578', '41', '检查报表、记录填写是否规范、真实。', '检查报表、记录填写是否规范、真实。', '');
INSERT INTO `dic_content` VALUES ('579', '41', '工艺管线上的压力表、温度计、热电偶、压力表、流量计及其变送器是否齐全，符合要求。', '工艺管线上的压力表、温度计、热电偶、压力表、流量计及其变送器是否齐全，符合要求。', '');
INSERT INTO `dic_content` VALUES ('580', '41', '冬季检查设备、管线防冻防凝落实情况。', '冬季检查设备、管线防冻防凝落实情况。', '');
INSERT INTO `dic_content` VALUES ('581', '42', '储罐基础是否牢固； 有无不均匀下沉； 有无裂缝、倾斜； 散水坡有无损坏。', '储罐基础是否牢固； 有无不均匀下沉； 有无裂缝、倾斜； 散水坡有无损坏。', '');
INSERT INTO `dic_content` VALUES ('582', '42', '罐体发生泄漏、鼓包、凹陷等异常现象； 罐体外壁有无锈蚀现象； 防腐层是否完好、油漆有无脱落； 油罐保温是否完好。', '罐体发生泄漏、鼓包、凹陷等异常现象； 罐体外壁有无锈蚀现象； 防腐层是否完好、油漆有无脱落； 油罐保温是否完好。', '');
INSERT INTO `dic_content` VALUES ('583', '42', '检查罐区内基础、围堰、排污等设施是否完好，有无损坏。', '检查罐区内基础、围堰、排污等设施是否完好，有无损坏。', '');
INSERT INTO `dic_content` VALUES ('584', '42', '浮顶、内浮顶罐的浮盘是否完好； 转动扶梯有无错位、脱轨。', '浮顶、内浮顶罐的浮盘是否完好； 转动扶梯有无错位、脱轨。', '');
INSERT INTO `dic_content` VALUES ('585', '42', '浮顶罐浮顶排水装置是否正常，有无泄漏、排水有无带油。', '浮顶罐浮顶排水装置是否正常，有无泄漏、排水有无带油。', '');
INSERT INTO `dic_content` VALUES ('586', '42', '浮顶罐浮盘是否有积液； 浮船上的油污、氧化铁等杂物是否定期清扫。', '浮顶罐浮盘是否有积液； 浮船上的油污、氧化铁等杂物是否定期清扫。', '');
INSERT INTO `dic_content` VALUES ('588', '42', '检查与储罐相关的阀门是否完好、开关状态是否符合运行工艺的要求； 检查阀门是否渗漏； 阀体有无损伤及渗漏现象； 阀门启闭是否灵活、开度指示是否正确； 阀杆有无弯曲、锈蚀，阀杆与填料压盖配合是否合适，螺纹有无缺陷； 垫片、填料、螺栓是否完好； 阀门各部件是否齐全、良好； 气动阀油杯内润滑油液位符合要求。', '检查与储罐相关的阀门是否完好、开关状态是否符合运行工艺的要求； 检查阀门是否渗漏； 阀体有无损伤及渗漏现象； 阀门启闭是否灵活、开度指示是否正确； 阀杆有无弯曲、锈蚀，阀杆与填料压盖配合是否合适，螺纹有无缺陷； 垫片、填料、螺栓是否完好； 阀门各部件是否齐全、良好； 气动阀油杯内润滑油液位符合要求。', '');
INSERT INTO `dic_content` VALUES ('589', '42', '检查呼吸阀安装是否正确； 阀盘与阀座接触面是否良好； 阀杆上下运动是否灵活，有无卡阻； 阀壳网罩是否严密； 压盖衬垫是否严密； 呼吸通道有无堵塞现象； 阀体是否完好，附件是否齐全。', '检查呼吸阀安装是否正确； 阀盘与阀座接触面是否良好； 阀杆上下运动是否灵活，有无卡阻； 阀壳网罩是否严密； 压盖衬垫是否严密； 呼吸通道有无堵塞现象； 阀体是否完好，附件是否齐全。', '');
INSERT INTO `dic_content` VALUES ('590', '42', '检查阻火器产品是否合格，安装是否正确； 防火网或波形散热片是否清洁畅通； 垫片是否完整，有无漏气', '检查阻火器产品是否合格，安装是否正确； 防火网或波形散热片是否清洁畅通； 垫片是否完整，有无漏气', '');
INSERT INTO `dic_content` VALUES ('591', '42', '检查测量孔外接地端子是否完好； 密封是否严密不漏气，导尺相磨损是否严重； 在检尺取样后是否将量油孔盖盖严', '检查测量孔外接地端子是否完好； 密封是否严密不漏气，导尺相磨损是否严重； 在检尺取样后是否将量油孔盖盖严', '');
INSERT INTO `dic_content` VALUES ('592', '42', '检查人孔、透光孔密封是否完好，是否漏油、漏气', '检查人孔、透光孔密封是否完好，是否漏油、漏气', '');
INSERT INTO `dic_content` VALUES ('593', '42', '检查防滑踏步、旋梯、旋梯栏杆扶手、罐顶平台和检尺平台栏杆扶手是否牢固，冬季要有防滑措施。', '检查防滑踏步、旋梯、旋梯栏杆扶手、罐顶平台和检尺平台栏杆扶手是否牢固，冬季要有防滑措施。', '');
INSERT INTO `dic_content` VALUES ('594', '42', '检查防火堤有无损坏； 管线穿墙是否用非燃烧材料封实。', '检查防火堤有无损坏； 管线穿墙是否用非燃烧材料封实。', '');
INSERT INTO `dic_content` VALUES ('595', '42', '检查防雷防静电接地线连接是否牢固，有无损伤、断裂现象； 各部跨接是否完好。', '检查防雷防静电接地线连接是否牢固，有无损伤、断裂现象； 各部跨接是否完好。', '');
INSERT INTO `dic_content` VALUES ('596', '42', '检查自动化仪表与油罐连接孔是否漏气、漏油； 仪表及安装配线是否符合防爆要求； 检测仪表是否完好。', '检查自动化仪表与油罐连接孔是否漏气、漏油； 仪表及安装配线是否符合防爆要求； 检测仪表是否完好。', '');
INSERT INTO `dic_content` VALUES ('597', '42', '检查油罐呼吸管路外表有无明显锈蚀； 支架是否完好； 各部连接是否紧密，法兰垫片是否完好，有无漏气现象； 管道式呼吸阀控制压力是否正确。', '检查油罐呼吸管路外表有无明显锈蚀； 支架是否完好； 各部连接是否紧密，法兰垫片是否完好，有无漏气现象； 管道式呼吸阀控制压力是否正确。', '');
INSERT INTO `dic_content` VALUES ('598', '42', '检查管路是否有明显扭曲、位移、变形； 管路与管件的连接处及焊逢处是否渗漏； 管路外表面是否有裂纹、缩孔、夹渣、折叠、皱皮等缺陷； 法兰连接安装是否符合要求； 管线保温是否完好。', '检查管路是否有明显扭曲、位移、变形； 管路与管件的连接处及焊逢处是否渗漏； 管路外表面是否有裂纹、缩孔、夹渣、折叠、皱皮等缺陷； 法兰连接安装是否符合要求； 管线保温是否完好。', '');
INSERT INTO `dic_content` VALUES ('599', '42', '检查管座架是否起作用，有无沉降、倾斜或变形； 管线支架是否锈蚀、变形或损坏； 管托是否腐蚀、工作是否正常', '检查管座架是否起作用，有无沉降、倾斜或变形； 管线支架是否锈蚀、变形或损坏； 管托是否腐蚀、工作是否正常', '');
INSERT INTO `dic_content` VALUES ('600', '42', '检查补偿器外观质量是否良好，有无扭曲、变形、挤压、破裂等现象', '检查补偿器外观质量是否良好，有无扭曲、变形、挤压、破裂等现象', '');
INSERT INTO `dic_content` VALUES ('601', '42', '检查过滤线外观质量是否良好； 附属件是否齐全、完好，是否严密； 过滤网是否完好', '检查过滤线外观质量是否良好； 附属件是否齐全、完好，是否严密； 过滤网是否完好', '');
INSERT INTO `dic_content` VALUES ('602', '42', '检查接地跨接每个法兰连接处是否有跨接； 跨接是否符合要求（每对法兰处跨接不少于两处，且连接可靠，接触良好）； 间接跨接是否符合要求（管间净距小于10cm，每50m跨接地一次，且连接可靠，接触良好）； 管线接地装置是否符合要求（接地电阻≤100Ω）', '检查接地跨接每个法兰连接处是否有跨接； 跨接是否符合要求（每对法兰处跨接不少于两处，且连接可靠，接触良好）； 间接跨接是否符合要求（管间净距小于10cm，每50m跨接地一次，且连接可靠，接触良好）； 管线接地装置是否符合要求（接地电阻≤100Ω）', '');
INSERT INTO `dic_content` VALUES ('603', '42', '检查管沟内是否整洁，完好（无积水、无污物，盖板完整）； 阀井盖是否完整并上锁； 管沟、阀井内是否有油气（可燃气体浓度在爆炸下限的5%以下，有油气味，应检查是否由于管线、阀门等渗漏引起）', '检查管沟内是否整洁，完好（无积水、无污物，盖板完整）； 阀井盖是否完整并上锁； 管沟、阀井内是否有油气（可燃气体浓度在爆炸下限的5%以下，有油气味，应检查是否由于管线、阀门等渗漏引起）', '');
INSERT INTO `dic_content` VALUES ('604', '42', '检查罐区专用机泵盘车标记、运行情况是否符合要求', '检查罐区专用机泵盘车标记、运行情况是否符合要求', '');
INSERT INTO `dic_content` VALUES ('605', '42', '检查罐区内杂草是否清理干净。', '检查罐区内杂草是否清理干净。', '');
INSERT INTO `dic_content` VALUES ('606', '43', '检查牺牲阳极保护装置管对地、阳极对地、阳极对管电位差是否正常（实测、查记录）； 保护电位、阳极组输出电流、阳极接地电阻及埋设点地壤电阻率是否正常', '检查牺牲阳极保护装置管对地、阳极对地、阳极对管电位差是否正常（实测、查记录）； 保护电位、阳极组输出电流、阳极接地电阻及埋设点地壤电阻率是否正常', '');
INSERT INTO `dic_content` VALUES ('607', '43', '检查电气仪表是否正常。', '检查电气仪表是否正常。', '');
INSERT INTO `dic_content` VALUES ('608', '43', '电缆沟通入变电所、控制室的墙洞处是否填实、密封。', '电缆沟通入变电所、控制室的墙洞处是否填实、密封。', '');
INSERT INTO `dic_content` VALUES ('609', '43', '储罐区监控设施、高低液位报警仪、固定式可燃、有毒气体报警仪及火灾报警仪运行是否正常', '储罐区监控设施、高低液位报警仪、固定式可燃、有毒气体报警仪及火灾报警仪运行是否正常', '');
INSERT INTO `dic_content` VALUES ('610', '43', '防爆电气设备的多余电缆引入口是否采用适于相关防爆型式的封堵元件进行封堵。', '防爆电气设备的多余电缆引入口是否采用适于相关防爆型式的封堵元件进行封堵。', '');
INSERT INTO `dic_content` VALUES ('611', '44', '检查罐区喷淋设施是否正常。', '检查罐区喷淋设施是否正常。', '');
INSERT INTO `dic_content` VALUES ('612', '44', '检查照明系统是否齐全、好用；', '检查照明系统是否齐全、好用；', '');
INSERT INTO `dic_content` VALUES ('613', '44', '检查罐区所设稳高压消防给水系统，压力是否符合要求。', '检查罐区所设稳高压消防给水系统，压力是否符合要求。', '');
INSERT INTO `dic_content` VALUES ('614', '44', '检查罐区泡沫系统是否正常，罐区外泡沫线接头是否完好。', '检查罐区泡沫系统是否正常，罐区外泡沫线接头是否完好。', '');
INSERT INTO `dic_content` VALUES ('615', '44', '检查罐区内井盖是否齐全。', '检查罐区内井盖是否齐全。', '');
INSERT INTO `dic_content` VALUES ('616', '44', '检查罐区内是否按要求配备一定数量灭火器； 灭火器是否在有效期内。', '检查罐区内是否按要求配备一定数量灭火器； 灭火器是否在有效期内。', '');
INSERT INTO `dic_content` VALUES ('617', '44', '现场安全警示标语标志是否齐全、完好。', '现场安全警示标语标志是否齐全、完好。', '');
INSERT INTO `dic_content` VALUES ('618', '44', '储罐的上罐扶梯入口处需设消除人体静电装置。', '储罐的上罐扶梯入口处需设消除人体静电装置。', '');
INSERT INTO `dic_content` VALUES ('619', '44', '检查罐区内施工作业票证是否齐全，防护措施落实是否到位。', '检查罐区内施工作业票证是否齐全，防护措施落实是否到位。', '');
INSERT INTO `dic_content` VALUES ('620', '44', '生产作业区是否有应急预案，所有有毒有害岗位、报警器点、安全喷淋、气防用具柜、应急电话点等是否都设醒目标示牌，并在厂区内易于观测的地点设置风向标，进入生产作业区作业人员是否熟悉其作业区内报警器，急救电话等所在地位置和使用方法。', '生产作业区是否有应急预案，所有有毒有害岗位、报警器点、安全喷淋、气防用具柜、应急电话点等是否都设醒目标示牌，并在厂区内易于观测的地点设置风向标，进入生产作业区作业人员是否熟悉其作业区内报警器，急救电话等所在地位置和使用方法。', '');
INSERT INTO `dic_content` VALUES ('621', '45', '储罐改造、变更储存介质或储存介质运行工况发生变化时是否进行了风险辨识，是否符合规范并办理相关手续，是否及时对操作规程进行了相应修订。', '储罐改造、变更储存介质或储存介质运行工况发生变化时是否进行了风险辨识，是否符合规范并办理相关手续，是否及时对操作规程进行了相应修订。', '');
INSERT INTO `dic_content` VALUES ('622', '45', '储罐收发油速度是否符合相关要求。', '储罐收发油速度是否符合相关要求。', '');
INSERT INTO `dic_content` VALUES ('623', '45', '罐区巡检频次及路线是否设置合理，站点是否全面，有无盲区。', '罐区巡检频次及路线是否设置合理，站点是否全面，有无盲区。', '');
INSERT INTO `dic_content` VALUES ('624', '45', '罐区现场工艺管线标示是否清晰、完整，各物料来源、去向是否明晰。', '罐区现场工艺管线标示是否清晰、完整，各物料来源、去向是否明晰。', '');
INSERT INTO `dic_content` VALUES ('625', '45', '各类工艺台账是否齐全、完好。', '各类工艺台账是否齐全、完好。', '');
INSERT INTO `dic_content` VALUES ('626', '46', '全面检查罐顶和罐壁是否变形', '全面检查罐顶和罐壁是否变形', '');
INSERT INTO `dic_content` VALUES ('627', '46', '有无严重的凹陷、鼓包、析褶及渗漏穿孔；', '有无严重的凹陷、鼓包、析褶及渗漏穿孔；', '');
INSERT INTO `dic_content` VALUES ('628', '46', '对有保温的储罐，罐体无明显损坏.保温层无渗漏痕迹时，可不拆除保温层进行检查。', '对有保温的储罐，罐体无明显损坏.保温层无渗漏痕迹时，可不拆除保温层进行检查。', '');
INSERT INTO `dic_content` VALUES ('629', '46', '每年对储罐顶、壁进行一次测厚检查。罐壁下部二圈板的每块板沿竖向至少测2点，其他圈板的测点可沿盘梯选择，每圈板至少选择1个测点。测厚点宜固定，设有测量标志并编号。有保温的储罐，其测点处保温应做成活动块便于拆装。', '每年对储罐顶、壁进行一次测厚检查。罐壁下部二圈板的每块板沿竖向至少测2点，其他圈板的测点可沿盘梯选择，每圈板至少选择1个测点。测厚点宜固定，设有测量标志并编号。有保温的储罐，其测点处保温应做成活动块便于拆装。', '');
INSERT INTO `dic_content` VALUES ('630', '46', '检查进出口阀门、人孔、清扫孔等处的紧固件是否牢靠。', '检查进出口阀门、人孔、清扫孔等处的紧固件是否牢靠。', '');
INSERT INTO `dic_content` VALUES ('631', '46', '消防泡沫管是否有油气排出，端盖是否完好;', '消防泡沫管是否有油气排出，端盖是否完好;', '');
INSERT INTO `dic_content` VALUES ('632', '46', '储罐盘梯、平台、抗风圈、栏杆、踏步板的腐蚀程度', '储罐盘梯、平台、抗风圈、栏杆、踏步板的腐蚀程度', '');
INSERT INTO `dic_content` VALUES ('633', '46', '储罐照明设施的完好程度。', '储罐照明设施的完好程度。', '');
INSERT INTO `dic_content` VALUES ('634', '46', '用5-10倍放大镜观察罐体焊缝，尤其要重点检查壁板与边缘板之间角焊缝及下部二圈壁板的纵、环焊缝及T形焊缝:注意检查进出口接管与罐体的联接焊缝有无渗漏和裂纹。若边续板已做防水处理，没有异常可不检查角焊缝。', '用5-10倍放大镜观察罐体焊缝，尤其要重点检查壁板与边缘板之间角焊缝及下部二圈壁板的纵、环焊缝及T形焊缝:注意检查进出口接管与罐体的联接焊缝有无渗漏和裂纹。若边续板已做防水处理，没有异常可不检查角焊缝。', '');
INSERT INTO `dic_content` VALUES ('635', '46', '转动扶梯、导向装置是否灵活好用;', '转动扶梯、导向装置是否灵活好用;', '');
INSERT INTO `dic_content` VALUES ('636', '46', '密封系统、浮顶排水装置、量油孔、导向管有无异常。', '密封系统、浮顶排水装置、量油孔、导向管有无异常。', '');
INSERT INTO `dic_content` VALUES ('637', '46', '检查罐体外部防腐层有无脱落、起皮等缺陷；保温(冷)及防水檐是否完好； 若发现保温（冷)层破损严重，应检查罐壁的腐蚀程度。', '检查罐体外部防腐层有无脱落、起皮等缺陷；保温(冷)及防水檐是否完好； 若发现保温（冷)层破损严重，应检查罐壁的腐蚀程度。', '');
INSERT INTO `dic_content` VALUES ('639', '46', '检查储罐基础有无下沉；', '检查储罐基础有无下沉；', '');
INSERT INTO `dic_content` VALUES ('640', '46', '每年在四月对储罐的接地设施进行测试，接地设施的接地电阻不能大于10欧。 对内浮顶罐要做好防静电连接导线的检查，确保连接良好。', '每年在四月对储罐的接地设施进行测试，接地设施的接地电阻不能大于10欧。 对内浮顶罐要做好防静电连接导线的检查，确保连接良好。', '');
INSERT INTO `dic_content` VALUES ('641', '46', '检查防火堤有无缺口、塌陷、裂缝；', '检查防火堤有无缺口、塌陷、裂缝；', '');
INSERT INTO `dic_content` VALUES ('642', '46', '管线穿墙是否用非燃烧材料封实；', '管线穿墙是否用非燃烧材料封实；', '');
INSERT INTO `dic_content` VALUES ('643', '46', '隔油阀门是否完好、是否在常闭状态；', '隔油阀门是否完好、是否在常闭状态；', '');
INSERT INTO `dic_content` VALUES ('644', '46', '防火堤内是否有油污污染的表土等。', '防火堤内是否有油污污染的表土等。', '');
INSERT INTO `dic_content` VALUES ('645', '46', '设置有外加电流阴极保护设施的储罐，每年需做一次IR降试、土壤电阻率测试、杂散电流测试，正确评估储罐阴极保护的效果，阴极保护资料单独设档。', '设置有外加电流阴极保护设施的储罐，每年需做一次IR降试、土壤电阻率测试、杂散电流测试，正确评估储罐阴极保护的效果，阴极保护资料单独设档。', '');
INSERT INTO `dic_content` VALUES ('646', '46', '检查量油孔密封槽是否装有耐油橡胶圈或用铅、铝软金属制造的专用垫片。', '检查量油孔密封槽是否装有耐油橡胶圈或用铅、铝软金属制造的专用垫片。', '');
INSERT INTO `dic_content` VALUES ('647', '46', '各类设备台账是否齐全、完好。', '各类设备台账是否齐全、完好。', '');
INSERT INTO `dic_content` VALUES ('648', '46', '阻火器每三个月检查一次，检查阻火芯件是否阻塞、变形、腐蚀。', '阻火器每三个月检查一次，检查阻火芯件是否阻塞、变形、腐蚀。', '');
INSERT INTO `dic_content` VALUES ('649', '47', '检查消防通道是否符合规范要求', '检查消防通道是否符合规范要求', '');
INSERT INTO `dic_content` VALUES ('650', '47', '检查喷淋设施、消防泡沫系统是否齐全、完好；', '检查喷淋设施、消防泡沫系统是否齐全、完好；', '');
INSERT INTO `dic_content` VALUES ('651', '47', '是否配置人体消静电设施；', '是否配置人体消静电设施；', '');
INSERT INTO `dic_content` VALUES ('652', '47', '罐区半固定式泡沫管线接口要引到防火堤外；', '罐区半固定式泡沫管线接口要引到防火堤外；', '');
INSERT INTO `dic_content` VALUES ('653', '47', '罐区内要配置一定数量的手提式、推车式小型灭火器材。', '罐区内要配置一定数量的手提式、推车式小型灭火器材。', '');
INSERT INTO `dic_content` VALUES ('654', '47', '储罐区监控设施、固定式可燃、有毒气体报警仪及火灾报警仪运行是否正常', '储罐区监控设施、固定式可燃、有毒气体报警仪及火灾报警仪运行是否正常', '');
INSERT INTO `dic_content` VALUES ('655', '47', '检查岗位员工对应急处置程序和要点的掌握情况。', '检查岗位员工对应急处置程序和要点的掌握情况。', '');
INSERT INTO `dic_content` VALUES ('656', '47', '检查对消防喷淋管网及喷头内的杂物是否进行了清理', '检查对消防喷淋管网及喷头内的杂物是否进行了清理', '');
INSERT INTO `dic_content` VALUES ('657', '48', '可燃液体的储罐是否设液位计和高液位报警器。', '可燃液体的储罐是否设液位计和高液位报警器。', '');
INSERT INTO `dic_content` VALUES ('658', '48', '液化烃的储罐应是否设温度计。', '液化烃的储罐应是否设温度计。', '');
INSERT INTO `dic_content` VALUES ('659', '48', '液化烃的储罐是否应设压力表。', '液化烃的储罐是否应设压力表。', '');
INSERT INTO `dic_content` VALUES ('660', '48', '储罐放水管是否设双阀。', '储罐放水管是否设双阀。', '');
INSERT INTO `dic_content` VALUES ('661', '48', '可燃液体的储罐必要时是否设自动联锁切断进料设施；频繁操作的油罐是否设自动联锁切断进油装置。', '可燃液体的储罐必要时是否设自动联锁切断进料设施；频繁操作的油罐是否设自动联锁切断进油装置。', '');
INSERT INTO `dic_content` VALUES ('662', '48', '储罐物料进出口管道靠近罐跟处是否设一个总切断阀。', '储罐物料进出口管道靠近罐跟处是否设一个总切断阀。', '');
INSERT INTO `dic_content` VALUES ('663', '48', '储罐的进料管是否从罐体下部接入；若必须从上部接入，宜延伸至距罐底200mm处。', '储罐的进料管是否从罐体下部接入；若必须从上部接入，宜延伸至距罐底200mm处。', '');
INSERT INTO `dic_content` VALUES ('664', '48', '油罐是否装设进出油接合管、排污孔、放水阀、人孔、采光孔、量油孔和通气管等基本附件。', '油罐是否装设进出油接合管、排污孔、放水阀、人孔、采光孔、量油孔和通气管等基本附件。', '');
INSERT INTO `dic_content` VALUES ('665', '48', '可燃气体、液化烃和可燃液体的金属管道除需要采用法兰连接外，是否都采用焊接连接。', '可燃气体、液化烃和可燃液体的金属管道除需要采用法兰连接外，是否都采用焊接连接。', '');
INSERT INTO `dic_content` VALUES ('666', '48', '储存温度高于100℃的丙B类液体储罐是否设专用扫线罐。', '储存温度高于100℃的丙B类液体储罐是否设专用扫线罐。', '');
INSERT INTO `dic_content` VALUES ('667', '48', '设有蒸汽加热器的储罐是否采取防止液体超温的措施。', '设有蒸汽加热器的储罐是否采取防止液体超温的措施。', '');
INSERT INTO `dic_content` VALUES ('668', '49', '甲B、乙类液体的固定顶罐是否设阻火器和呼吸阀；对于采用氮气或其他气体气封的甲B、乙类液体的储罐是否设置事故泄压设备。', '甲B、乙类液体的固定顶罐是否设阻火器和呼吸阀；对于采用氮气或其他气体气封的甲B、乙类液体的储罐是否设置事故泄压设备。', '');
INSERT INTO `dic_content` VALUES ('669', '49', '储存甲、乙类油品的固定顶油罐和地上卧式油罐的通气管上是否装设呼吸阀。', '储存甲、乙类油品的固定顶油罐和地上卧式油罐的通气管上是否装设呼吸阀。', '');
INSERT INTO `dic_content` VALUES ('670', '49', '下列油罐的通气管上是否装设阻火器：（1）储存甲、乙、丙A类油品的固定顶罐；（2）储存甲、乙类油品的卧式油罐；（3）储存丙A类油品的地上卧式油罐。', '下列油罐的通气管上是否装设阻火器：（1）储存甲、乙、丙A类油品的固定顶罐；（2）储存甲、乙类油品的卧式油罐；（3）储存丙A类油品的地上卧式油罐。', '');
INSERT INTO `dic_content` VALUES ('671', '49', '储罐的进出口管道是否采用柔性连接。', '储罐的进出口管道是否采用柔性连接。', '');
INSERT INTO `dic_content` VALUES ('672', '49', '地上油罐是否设梯子和栏杆。高度大于5米的立式油罐，是否采用盘梯或斜梯。拱顶油罐灌顶上经常走人的地方，是否设防滑踏步。', '地上油罐是否设梯子和栏杆。高度大于5米的立式油罐，是否采用盘梯或斜梯。拱顶油罐灌顶上经常走人的地方，是否设防滑踏步。', '');
INSERT INTO `dic_content` VALUES ('673', '49', '梯子和栏杆是否符合“固定式钢梯及平台安全要求 第3部分：工业防护栏杆及钢平台”的规定。　', '梯子和栏杆是否符合“固定式钢梯及平台安全要求 第3部分：工业防护栏杆及钢平台”的规定。　', '');
INSERT INTO `dic_content` VALUES ('674', '49', '可燃气体、液化烃、可燃液体的钢罐是否设防雷接地，并应符合下列规定：（1）甲B、乙类可燃液体地上固定顶罐，当顶板厚度小于4mm时是否装设避雷针、线，其保护范围应包括整个储罐；（2）丙类液体储罐是否设防感应雷接地；（3）压力储罐是否作接地。', '可燃气体、液化烃、可燃液体的钢罐是否设防雷接地，并应符合下列规定：（1）甲B、乙类可燃液体地上固定顶罐，当顶板厚度小于4mm时是否装设避雷针、线，其保护范围应包括整个储罐；（2）丙类液体储罐是否设防感应雷接地；（3）压力储罐是否作接地。', '');
INSERT INTO `dic_content` VALUES ('675', '49', '钢制油罐是否做防雷接地，接地点是否不少于2处；接地接地电阻是否不大于10Ω。', '钢制油罐是否做防雷接地，接地点是否不少于2处；接地接地电阻是否不大于10Ω。', '');
INSERT INTO `dic_content` VALUES ('676', '49', '覆土油罐的罐体及罐室的金属构件以及呼吸阀、量油孔等金属附件，是否做电气连接并接地，接地电阻是否不大于10Ω。', '覆土油罐的罐体及罐室的金属构件以及呼吸阀、量油孔等金属附件，是否做电气连接并接地，接地电阻是否不大于10Ω。', '');
INSERT INTO `dic_content` VALUES ('677', '49', '爆炸危险区域内的输油（油气）管道，是否采取下列防雷措施：（1）输油（油气）管道的法兰连接处是否跨接。（2）平行敷设于地上或管沟的金属管道，其净距小于100mm时，应用金属线跨接，跨接点的间距是否不大于30m。管道交叉点净距小于100mm时，其交叉点是否用金属线跨接。', '爆炸危险区域内的输油（油气）管道，是否采取下列防雷措施：（1）输油（油气）管道的法兰连接处是否跨接。（2）平行敷设于地上或管沟的金属管道，其净距小于100mm时，应用金属线跨接，跨接点的间距是否不大于30m。管道交叉点净距小于100mm时，其交叉点是否用金属线跨接。', '');
INSERT INTO `dic_content` VALUES ('678', '49', '可燃液体储罐的温度、液位等测量装置是否采用铠装电缆或钢管配线，电缆外皮或配线钢管与罐体应作电气连接。', '可燃液体储罐的温度、液位等测量装置是否采用铠装电缆或钢管配线，电缆外皮或配线钢管与罐体应作电气连接。', '');
INSERT INTO `dic_content` VALUES ('679', '49', '装于地上钢油罐上的信息系统的配线电缆是否采用屏蔽电缆。电缆穿钢管配线时，其钢管上下2处是否与罐体做电气连接并接地。', '装于地上钢油罐上的信息系统的配线电缆是否采用屏蔽电缆。电缆穿钢管配线时，其钢管上下2处是否与罐体做电气连接并接地。', '');
INSERT INTO `dic_content` VALUES ('680', '49', '储罐的上罐扶梯入口处、装卸作业区内操作平台的扶梯入口处，是否设消除人体静电装置。', '储罐的上罐扶梯入口处、装卸作业区内操作平台的扶梯入口处，是否设消除人体静电装置。', '');
INSERT INTO `dic_content` VALUES ('681', '49', '对爆炸、火灾危险场所内可能产生静电危险的设备和管道，是否都采取静电接地措施。', '对爆炸、火灾危险场所内可能产生静电危险的设备和管道，是否都采取静电接地措施。', '');
INSERT INTO `dic_content` VALUES ('682', '49', '储存甲、乙、丙A类油品的钢油罐，是否采取防静电措施；', '储存甲、乙、丙A类油品的钢油罐，是否采取防静电措施；', '');
INSERT INTO `dic_content` VALUES ('683', '49', '甲、乙、丙A类油品的汽车油罐车或油桶罐装设施，是否设置与油罐车或油桶跨接的防静电接地装置。', '甲、乙、丙A类油品的汽车油罐车或油桶罐装设施，是否设置与油罐车或油桶跨接的防静电接地装置。', '');
INSERT INTO `dic_content` VALUES ('684', '49', '地上或管沟敷设的输油管道的始端、末端、分支处以及直线段每隔200～300米处，是否设置防静电和防感应雷的接地装置。', '地上或管沟敷设的输油管道的始端、末端、分支处以及直线段每隔200～300米处，是否设置防静电和防感应雷的接地装置。', '');
INSERT INTO `dic_content` VALUES ('685', '49', '油品装卸场所用于跨接的防静电接地装置，是否采用能检测接地状况的防静电接地仪器。', '油品装卸场所用于跨接的防静电接地装置，是否采用能检测接地状况的防静电接地仪器。', '');
INSERT INTO `dic_content` VALUES ('686', '49', '移动式的接地连接线，是否采用绝缘附套导线，通过防爆开关，将接地装置与油品装卸设施相连。', '移动式的接地连接线，是否采用绝缘附套导线，通过防爆开关，将接地装置与油品装卸设施相连。', '');
INSERT INTO `dic_content` VALUES ('687', '49', '防静电接地装置的接地电阻，是否不大于100Ω。', '防静电接地装置的接地电阻，是否不大于100Ω。', '');
INSERT INTO `dic_content` VALUES ('688', '49', '装置内的电缆沟是否有防止可燃气体积聚或含有可燃液体的污水进入沟内的措施。电缆沟通入变配电所、控制室的墙洞处，是否填实、密封。', '装置内的电缆沟是否有防止可燃气体积聚或含有可燃液体的污水进入沟内的措施。电缆沟通入变配电所、控制室的墙洞处，是否填实、密封。', '');
INSERT INTO `dic_content` VALUES ('689', '49', '可燃液体储罐的温度、液位等测量装置是否采用铠装电缆或钢管配线，电缆外皮或配线钢管与罐体应作电气连接。', '可燃液体储罐的温度、液位等测量装置是否采用铠装电缆或钢管配线，电缆外皮或配线钢管与罐体应作电气连接。', '');
INSERT INTO `dic_content` VALUES ('690', '49', '石油库电缆是否没有与输油管道、热力管道同沟敷设。', '石油库电缆是否没有与输油管道、热力管道同沟敷设。', '');
INSERT INTO `dic_content` VALUES ('691', '50', '甲、乙、丙类液体储罐区，液化石油气储罐区，可燃、助燃气体储罐区，可燃材料堆垛，是否与装卸区、辅助生产区及办公区分开布置。', '甲、乙、丙类液体储罐区，液化石油气储罐区，可燃、助燃气体储罐区，可燃材料堆垛，是否与装卸区、辅助生产区及办公区分开布置。', '');
INSERT INTO `dic_content` VALUES ('692', '50', '可燃液体储罐（地上式）是否成组布置，并应符合下列规定：（1）在同一罐组内，应布置火灾危险性类别相同或相近的储罐； ', '可燃液体储罐（地上式）是否成组布置，并应符合下列规定：（1）在同一罐组内，应布置火灾危险性类别相同或相近的储罐； ', '');
INSERT INTO `dic_content` VALUES ('693', '50', '甲类厂房、甲类库房，可燃材料堆垛，甲、乙、类液体储罐，液化石油气储罐，可燃、助燃气体储罐与架空电力线的最近水平距离是否不小于电杆（塔）高度的1.5倍，丙类液体储罐与架空电力线的最近水平距离是否不小于电杆（塔）高度的1.2倍。', '甲类厂房、甲类库房，可燃材料堆垛，甲、乙、类液体储罐，液化石油气储罐，可燃、助燃气体储罐与架空电力线的最近水平距离是否不小于电杆（塔）高度的1.5倍，丙类液体储罐与架空电力线的最近水平距离是否不小于电杆（塔）高度的1.2倍。', '');
INSERT INTO `dic_content` VALUES ('694', '50', '甲、乙、丙类液体储罐（区），乙、丙液体桶状堆垛与建筑物的防火间距，是否不小于表4.2.1的规定。', '甲、乙、丙类液体储罐（区），乙、丙液体桶状堆垛与建筑物的防火间距，是否不小于表4.2.1的规定。', '');
INSERT INTO `dic_content` VALUES ('695', '50', '甲、乙、丙类液体储罐之间的防火间距是否不小于表4.2.2的规定。', '甲、乙、丙类液体储罐之间的防火间距是否不小于表4.2.2的规定。', '');
INSERT INTO `dic_content` VALUES ('696', '50', '甲、乙、丙类液体的地上式、半地下式储罐或储罐组，其四周是否设置不燃烧体防火堤。防火堤的设置是否符合下列规定：①防火堤内的储罐布置不宜超过2排，单罐容量小于等于1000立方米且闪点大于120℃的液体储罐不宜超过4排；②防火堤内侧基脚线至立式储罐外壁的水平距离不应小于罐壁高度的一半。防火堤内侧基脚线至卧式储罐的水平距离不应小于3.0米；③ 沸溢性液体地上式、半地下式储罐，每个储罐应设置一个防火堤或防火', '甲、乙、丙类液体的地上式、半地下式储罐或储罐组，其四周是否设置不燃烧体防火堤。防火堤的设置是否符合下列规定：①防火堤内的储罐布置不宜超过2排，单罐容量小于等于1000立方米且闪点大于120℃的液体储罐不宜超过4排；②防火堤内侧基脚线至立式储罐外壁的水平距离不应小于罐壁高度的一半。防火堤内侧基脚线至卧式储罐的水平距离不应小于3.0米；③ 沸溢性液体地上式、半地下式储罐，每个储罐应设置一个防火堤或防火', '');
INSERT INTO `dic_content` VALUES ('697', '50', '防火堤的有效容量是否不小于其中最大的储罐容量。对于浮顶罐，防火堤的有效容量是否为其中最大储罐容量的一半。', '防火堤的有效容量是否不小于其中最大的储罐容量。对于浮顶罐，防火堤的有效容量是否为其中最大储罐容量的一半。', '');
INSERT INTO `dic_content` VALUES ('698', '50', '立式油罐防火堤的计算高度是否保证堤内有效容积需要。 防火堤的实高应比计算高度高出0.2m。防火堤的实高不应低于1m（以防火堤内侧设计地坪计），且不宜高于2.2m（以防火堤外侧道路路面计）。卧式油罐的防火堤实高不应低于0.5m（以防火堤内侧设计地坪计）。', '立式油罐防火堤的计算高度是否保证堤内有效容积需要。 防火堤的实高应比计算高度高出0.2m。防火堤的实高不应低于1m（以防火堤内侧设计地坪计），且不宜高于2.2m（以防火堤外侧道路路面计）。卧式油罐的防火堤实高不应低于0.5m（以防火堤内侧设计地坪计）。', '');
INSERT INTO `dic_content` VALUES ('699', '50', '防火堤上是否有洞。管道穿越防火堤处是否采用非燃烧材料严密填实。在雨水沟穿越防火堤处，是否采取排水阻油措施。', '防火堤上是否有洞。管道穿越防火堤处是否采用非燃烧材料严密填实。在雨水沟穿越防火堤处，是否采取排水阻油措施。', '');
INSERT INTO `dic_content` VALUES ('700', '50', '含油污水的排水管道在防火堤的出口处是否设置水封设施，雨水排水管是否设置阀门等封闭、隔离装置。', '含油污水的排水管道在防火堤的出口处是否设置水封设施，雨水排水管是否设置阀门等封闭、隔离装置。', '');
INSERT INTO `dic_content` VALUES ('701', '50', '油罐组防火堤的人行踏步是否不少于两处，且应处于不同的方位上。防火堤内侧高度大于等于1.5米时，是否在两个人行踏步或坡道之间增设踏步或逃逸爬梯。隔堤、隔墙是否设置人行踏步或坡道', '油罐组防火堤的人行踏步是否不少于两处，且应处于不同的方位上。防火堤内侧高度大于等于1.5米时，是否在两个人行踏步或坡道之间增设踏步或逃逸爬梯。隔堤、隔墙是否设置人行踏步或坡道', '');
INSERT INTO `dic_content` VALUES ('702', '50', '事故存液池的设置是否符合下列规定：（1）设有事故储存液池的罐组是否设导流管（沟），使溢漏液体能顺利的流出罐组并自流入存液池内；（2）事故存液池距防火堤的距离是否不小于7M；（3）事故存液池和导流沟距明火地点是否不小于30米；（4）事故存液池是否有排水设施。', '事故存液池的设置是否符合下列规定：（1）设有事故储存液池的罐组是否设导流管（沟），使溢漏液体能顺利的流出罐组并自流入存液池内；（2）事故存液池距防火堤的距离是否不小于7M；（3）事故存液池和导流沟距明火地点是否不小于30米；（4）事故存液池是否有排水设施。', '');
INSERT INTO `dic_content` VALUES ('703', '50', '储罐区及装卸作业区是否设置可燃气体检测报警仪。', '储罐区及装卸作业区是否设置可燃气体检测报警仪。', '');
INSERT INTO `dic_content` VALUES ('704', '50', '可燃气体检测器的有效覆盖水平平面半径，室内是否为7.5m；室外是否为15m。在有效覆盖面积内，是否设一台检测器。', '可燃气体检测器的有效覆盖水平平面半径，室内是否为7.5m；室外是否为15m。在有效覆盖面积内，是否设一台检测器。', '');
INSERT INTO `dic_content` VALUES ('705', '50', '检测比空气重的可燃气体检测器，其安装高度是否距地坪0.3~0.6m；检测比空气轻的可燃气体检测器，其安装高度是否高出释放源0.5~2m。', '检测比空气重的可燃气体检测器，其安装高度是否距地坪0.3~0.6m；检测比空气轻的可燃气体检测器，其安装高度是否高出释放源0.5~2m。', '');
INSERT INTO `dic_content` VALUES ('706', '50', '可燃气体检测报警仪是否定期检测', '可燃气体检测报警仪是否定期检测', '');
INSERT INTO `dic_content` VALUES ('707', '50', '储罐区的消火栓是否在其四周道路边设置，消火栓的间距是否不超过60m。', '储罐区的消火栓是否在其四周道路边设置，消火栓的间距是否不超过60m。', '');
INSERT INTO `dic_content` VALUES ('708', '50', '可燃气体、液化烃和可燃液体的地上罐组是否按防火堤内面积每400m2配置一个手提式灭火器，但每个储罐配置的数量是否不超过3个。', '可燃气体、液化烃和可燃液体的地上罐组是否按防火堤内面积每400m2配置一个手提式灭火器，但每个储罐配置的数量是否不超过3个。', '');
INSERT INTO `dic_content` VALUES ('709', '50', '可燃气体、液化烃和可燃液体的铁路装卸栈台是否沿栈台每12m处上下分别设置两个干粉型灭火器。', '可燃气体、液化烃和可燃液体的铁路装卸栈台是否沿栈台每12m处上下分别设置两个干粉型灭火器。', '');
INSERT INTO `dic_content` VALUES ('710', '50', '可燃液体地上立式储罐是否设固定或移动式消防冷却水系统；控制阀是否设在防火堤外，并距被保护罐壁不小于15m。控制阀后及储罐上设置的消防冷却水管道是否采用镀锌钢管。', '可燃液体地上立式储罐是否设固定或移动式消防冷却水系统；控制阀是否设在防火堤外，并距被保护罐壁不小于15m。控制阀后及储罐上设置的消防冷却水管道是否采用镀锌钢管。', '');
INSERT INTO `dic_content` VALUES ('711', '52', '检查区域1', '检查区域1', '');
INSERT INTO `dic_content` VALUES ('712', '52', '检查区域2', '检查区域2', '');
INSERT INTO `dic_content` VALUES ('713', '52', '检查区域3', '检查区域3', '');
INSERT INTO `dic_content` VALUES ('714', '53', '管线进口', '管线进口', '');
INSERT INTO `dic_content` VALUES ('715', '53', '管线出口', '管线出口', '');
INSERT INTO `dic_content` VALUES ('716', '53', '排污口', '排污口', '');
INSERT INTO `dic_content` VALUES ('717', '53', '清扫口', '清扫口', '');
INSERT INTO `dic_content` VALUES ('718', '53', '人孔', '人孔', '');
INSERT INTO `dic_content` VALUES ('719', '53', '搅拌器', '搅拌器', '');
INSERT INTO `dic_content` VALUES ('720', '53', '取样器', '取样器', '');
INSERT INTO `dic_content` VALUES ('721', '53', '罐壁通气孔', '罐壁通气孔', '');
INSERT INTO `dic_content` VALUES ('722', '53', '双金属温度计', '双金属温度计', '');
INSERT INTO `dic_content` VALUES ('723', '53', '盘梯', '盘梯', '');
INSERT INTO `dic_content` VALUES ('724', '53', '罐体保温', '罐体保温', '');
INSERT INTO `dic_content` VALUES ('725', '53', '罐体防腐层', '罐体防腐层', '');
INSERT INTO `dic_content` VALUES ('726', '53', '罐体卫生', '罐体卫生', '');
INSERT INTO `dic_content` VALUES ('727', '54', '平台、栏杆', '平台、栏杆', '');
INSERT INTO `dic_content` VALUES ('728', '54', '呼吸阀', '呼吸阀', '');
INSERT INTO `dic_content` VALUES ('729', '54', '阻火器', '阻火器', '');
INSERT INTO `dic_content` VALUES ('730', '54', '光孔', '光孔', '');
INSERT INTO `dic_content` VALUES ('731', '54', '机械浮标', '机械浮标', '');
INSERT INTO `dic_content` VALUES ('732', '54', '罐顶通气管', '罐顶通气管', '');
INSERT INTO `dic_content` VALUES ('733', '54', '量油孔', '量油孔', '');
INSERT INTO `dic_content` VALUES ('734', '54', '罐顶防腐层', '罐顶防腐层', '');
INSERT INTO `dic_content` VALUES ('735', '54', '内浮盘卫生', '内浮盘卫生', '');
INSERT INTO `dic_content` VALUES ('736', '54', '内服盘接地线', '内服盘接地线', '');
INSERT INTO `dic_content` VALUES ('737', '54', '内浮盘钢丝绳', '内浮盘钢丝绳', '');
INSERT INTO `dic_content` VALUES ('738', '54', '雷达液位计', '雷达液位计', '');
INSERT INTO `dic_content` VALUES ('739', '54', '罐内有毒有害气体含量', '罐内有毒有害气体含量', 'O2:   ;H2S:   ;CO:   ;LEL:   ;');
INSERT INTO `dic_content` VALUES ('740', '54', '罐顶卫生', '罐顶卫生', '');
INSERT INTO `dic_content` VALUES ('741', '55', '进口集合管', '进口集合管', '');
INSERT INTO `dic_content` VALUES ('742', '55', '出口集合管', '出口集合管', '');
INSERT INTO `dic_content` VALUES ('743', '55', '蒸汽线', '蒸汽线', '');
INSERT INTO `dic_content` VALUES ('744', '55', '消防管', '消防管', '');
INSERT INTO `dic_content` VALUES ('745', '56', '机油（是否乳化、够量）', '机油（是否乳化、够量）', '');
INSERT INTO `dic_content` VALUES ('746', '56', '联轴器胶圈', '联轴器胶圈', '');
INSERT INTO `dic_content` VALUES ('747', '57', '现场可燃、有毒检测仪', '现场可燃、有毒检测仪', '');
INSERT INTO `dic_content` VALUES ('748', '57', '罐底静电接地线', '罐底静电接地线', '');
INSERT INTO `dic_content` VALUES ('749', '58', '管线进口', '管线进口', '');
INSERT INTO `dic_content` VALUES ('750', '58', '管线出口', '管线出口', '');
INSERT INTO `dic_content` VALUES ('751', '58', '排污口', '排污口', '');
INSERT INTO `dic_content` VALUES ('752', '58', '清扫口', '清扫口', '');
INSERT INTO `dic_content` VALUES ('753', '58', '人孔', '人孔', '');
INSERT INTO `dic_content` VALUES ('754', '58', '搅拌器', '搅拌器', '');
INSERT INTO `dic_content` VALUES ('755', '58', '取样器', '取样器', '');
INSERT INTO `dic_content` VALUES ('756', '58', '双金属温度计', '双金属温度计', '');
INSERT INTO `dic_content` VALUES ('757', '58', '盘梯', '盘梯', '');
INSERT INTO `dic_content` VALUES ('758', '58', '罐体保温', '罐体保温', '');
INSERT INTO `dic_content` VALUES ('759', '58', '罐体卫生', '罐体卫生', '');
INSERT INTO `dic_content` VALUES ('760', '59', '平台、栏杆', '平台、栏杆', '');
INSERT INTO `dic_content` VALUES ('761', '59', '呼吸阀', '呼吸阀', '');
INSERT INTO `dic_content` VALUES ('762', '59', '阻火器', '阻火器', '');
INSERT INTO `dic_content` VALUES ('763', '59', '光孔', '光孔', '');
INSERT INTO `dic_content` VALUES ('764', '59', '机械浮标', '机械浮标', '');
INSERT INTO `dic_content` VALUES ('765', '59', '雷达液位计', '雷达液位计', '');
INSERT INTO `dic_content` VALUES ('766', '59', '量油孔', '量油孔', '');
INSERT INTO `dic_content` VALUES ('767', '59', '罐顶防腐层', '罐顶防腐层', '');
INSERT INTO `dic_content` VALUES ('768', '59', '罐顶卫生', '罐顶卫生', '');
INSERT INTO `dic_content` VALUES ('769', '61', '进口集合管', '进口集合管', '');
INSERT INTO `dic_content` VALUES ('770', '61', '出口集合管', '出口集合管', '');
INSERT INTO `dic_content` VALUES ('771', '61', '蒸汽线', '蒸汽线', '');
INSERT INTO `dic_content` VALUES ('772', '61', '消防管', '消防管', '');
INSERT INTO `dic_content` VALUES ('773', '62', '机油（是否乳化、够量）', '机油（是否乳化、够量）', '');
INSERT INTO `dic_content` VALUES ('774', '62', '联轴器胶圈', '联轴器胶圈', '');
INSERT INTO `dic_content` VALUES ('775', '63', '现场可燃、有毒检测仪', '现场可燃、有毒检测仪', '');
INSERT INTO `dic_content` VALUES ('776', '63', '罐底静电接地线', '罐底静电接地线', '');
INSERT INTO `dic_content` VALUES ('777', '64', '管线进口', '管线进口', '');
INSERT INTO `dic_content` VALUES ('778', '64', '管线出口', '管线出口', '');
INSERT INTO `dic_content` VALUES ('779', '64', '排污口', '排污口', '');
INSERT INTO `dic_content` VALUES ('780', '64', '清扫口', '清扫口', '');
INSERT INTO `dic_content` VALUES ('781', '64', '人孔', '人孔', '');
INSERT INTO `dic_content` VALUES ('782', '64', '搅拌器', '搅拌器', '');
INSERT INTO `dic_content` VALUES ('783', '64', '双金属温度计', '双金属温度计', '');
INSERT INTO `dic_content` VALUES ('784', '64', '热电阻', '热电阻', '');
INSERT INTO `dic_content` VALUES ('785', '64', '盘梯', '盘梯', '');
INSERT INTO `dic_content` VALUES ('786', '64', '罐体保温', '罐体保温', '');
INSERT INTO `dic_content` VALUES ('787', '64', '静电接地', '静电接地', '');
INSERT INTO `dic_content` VALUES ('788', '64', '罐体卫生', '罐体卫生', '');
INSERT INTO `dic_content` VALUES ('789', '65', '平台、栏杆', '平台、栏杆', '');
INSERT INTO `dic_content` VALUES ('790', '65', '光孔', '光孔', '');
INSERT INTO `dic_content` VALUES ('791', '65', '机械浮标', '机械浮标', '');
INSERT INTO `dic_content` VALUES ('792', '65', '雷达液位计', '雷达液位计', '');
INSERT INTO `dic_content` VALUES ('793', '65', '量油孔', '量油孔', '');
INSERT INTO `dic_content` VALUES ('794', '65', '高位报警器', '高位报警器', '');
INSERT INTO `dic_content` VALUES ('795', '66', '进口集合管', '进口集合管', '');
INSERT INTO `dic_content` VALUES ('796', '66', '出口集合管', '出口集合管', '');
INSERT INTO `dic_content` VALUES ('797', '66', '蒸汽线', '蒸汽线', '');
INSERT INTO `dic_content` VALUES ('798', '67', '船舱', '船舱', '');
INSERT INTO `dic_content` VALUES ('799', '67', '浮盘各部分', '浮盘各部分', '');
INSERT INTO `dic_content` VALUES ('800', '67', '浮盘导向装置', '浮盘导向装置', '');
INSERT INTO `dic_content` VALUES ('801', '67', '浮盘导轮轴铜套加黄油', '浮盘导轮轴铜套加黄油', '');
INSERT INTO `dic_content` VALUES ('802', '67', '浮船密封装置', '浮船密封装置', '');
INSERT INTO `dic_content` VALUES ('803', '67', '中央集水管及进出口阀门', '中央集水管及进出口阀门', '');
INSERT INTO `dic_content` VALUES ('804', '67', '自动透气阀', '自动透气阀', '');
INSERT INTO `dic_content` VALUES ('805', '67', '浮顶支柱', '浮顶支柱', '');
INSERT INTO `dic_content` VALUES ('806', '67', '紧急排水口', '紧急排水口', '');
INSERT INTO `dic_content` VALUES ('807', '67', '中央排水坑、排水阀', '中央排水坑、排水阀', '');
INSERT INTO `dic_content` VALUES ('808', '67', '浮盘卫生', '浮盘卫生', '');
INSERT INTO `dic_content` VALUES ('809', '67', '浮盘挡圈透水孔', '浮盘挡圈透水孔', '');
INSERT INTO `dic_content` VALUES ('810', '67', '密封挡雨板', '密封挡雨板', '');
INSERT INTO `dic_content` VALUES ('811', '67', '浮梯滑行', '浮梯滑行', '');
INSERT INTO `dic_content` VALUES ('812', '67', '浮盘接地线', '浮盘接地线', '');
INSERT INTO `dic_content` VALUES ('813', '67', '浮船（尤其是集水坑内）', '浮船（尤其是集水坑内）', '');
INSERT INTO `dic_content` VALUES ('814', '68', '二次密封外点1处气体含量', '二次密封外点1处气体含量', 'O2:   ;H2S:   ;CO:   ;LEL:   ;');
INSERT INTO `dic_content` VALUES ('815', '68', '二次密封外点2处气体含量', '二次密封外点2处气体含量', 'O2:   ;H2S:   ;CO:   ;LEL:   ;');
INSERT INTO `dic_content` VALUES ('816', '68', '二次密封外点3处气体含量', '二次密封外点3处气体含量', 'O2:   ;H2S:   ;CO:   ;LEL:   ;');
INSERT INTO `dic_content` VALUES ('817', '68', '二次密封外点4处气体含量', '二次密封外点4处气体含量', 'O2:   ;H2S:   ;CO:   ;LEL:   ;');
INSERT INTO `dic_content` VALUES ('818', '68', '二次密封外点5处气体含量', '二次密封外点5处气体含量', 'O2:   ;H2S:   ;CO:   ;LEL:   ;');
INSERT INTO `dic_content` VALUES ('819', '68', '二次密封外点6处气体含量', '二次密封外点6处气体含量', 'O2:   ;H2S:   ;CO:   ;LEL:   ;\n');
INSERT INTO `dic_content` VALUES ('820', '68', '现场可燃、有毒检测仪', '现场可燃、有毒检测仪', '\n');
INSERT INTO `dic_content` VALUES ('821', '69', '机油(是否乳化、够量）', '机油(是否乳化、够量）', '');
INSERT INTO `dic_content` VALUES ('822', '69', '连轴器胶圈', '连轴器胶圈', '');
INSERT INTO `dic_content` VALUES ('823', '70', '罐底静电接地线', '罐底静电接地线', '');
INSERT INTO `dic_content` VALUES ('824', '71', '污油井', '污油井', '');
INSERT INTO `dic_content` VALUES ('825', '72', '符合要求', '符合要求', '');
INSERT INTO `dic_content` VALUES ('826', '72', '不符合要求', '不符合要求', '');
INSERT INTO `dic_content` VALUES ('827', '72', '不适用', '不适用', '');
INSERT INTO `dic_content` VALUES ('828', '73', '维修单位1', '维修单位1', '');
INSERT INTO `dic_content` VALUES ('830', '73', '维修单位2', '维修单位2', '');
INSERT INTO `dic_content` VALUES ('831', '73', '维修单位3', '维修单位3', '');
INSERT INTO `dic_content` VALUES ('832', '74', '基础为水泥或沥青', '0', '');
INSERT INTO `dic_content` VALUES ('833', '74', '基础设有RPB', '1', '');
INSERT INTO `dic_content` VALUES ('834', '74', '基础没有RPB', '2', '');
INSERT INTO `dic_content` VALUES ('835', '75', '已记录的沉降超过了建造标准', '1', '');
INSERT INTO `dic_content` VALUES ('836', '75', '已记录了的沉降符合建造标准', '2', '');
INSERT INTO `dic_content` VALUES ('837', '75', '未做沉降评价', '3', '');
INSERT INTO `dic_content` VALUES ('838', '75', '混凝土基础，无沉降', '4', '');
INSERT INTO `dic_content` VALUES ('839', '76', '固溶退火', '1', '');
INSERT INTO `dic_content` VALUES ('840', '76', '焊前稳定处理', '2', '');
INSERT INTO `dic_content` VALUES ('841', '76', '焊后热处理', '3', '');
INSERT INTO `dic_content` VALUES ('842', '77', '平均水平', '2', '');
INSERT INTO `dic_content` VALUES ('843', '77', '低于平均水平', '1', '');
INSERT INTO `dic_content` VALUES ('844', '77', '高于平均水平', '3', '');
INSERT INTO `dic_content` VALUES ('845', '78', '贫胺', '贫胺', '');
INSERT INTO `dic_content` VALUES ('846', '78', 'MEA', 'MEA', '');
INSERT INTO `dic_content` VALUES ('847', '78', 'DIPA', 'DIPA', '');
INSERT INTO `dic_content` VALUES ('848', '78', 'DEA', 'DEA', '');
INSERT INTO `dic_content` VALUES ('849', '10', '拱顶罐', '拱顶罐', '');
INSERT INTO `dic_content` VALUES ('850', '10', '立式内浮顶罐', '立式内浮顶罐', '');
INSERT INTO `dic_content` VALUES ('851', '10', '立式外浮顶罐', '立式外浮顶罐', '');
INSERT INTO `dic_content` VALUES ('852', '10', '立式拱顶罐', '立式拱顶罐', '');
INSERT INTO `dic_content` VALUES ('853', '23', '石脑油', '石脑油', '');
INSERT INTO `dic_content` VALUES ('854', '23', '重柴油', '重柴油', '');
INSERT INTO `dic_content` VALUES ('855', '23', '常一线', '常一线', '');
INSERT INTO `dic_content` VALUES ('856', '23', '减四线', '减四线', '');
INSERT INTO `dic_content` VALUES ('857', '23', '0#车用柴油', '0#车用柴油', '');
INSERT INTO `dic_content` VALUES ('858', '23', '减三线', '减三线', '');
INSERT INTO `dic_content` VALUES ('859', '23', '减四线', '减四线', '');
INSERT INTO `dic_content` VALUES ('860', '23', '95#车用汽油', '95#车用汽油', '');
INSERT INTO `dic_content` VALUES ('861', '23', '污水', '污水', '');
INSERT INTO `dic_content` VALUES ('862', '23', '污油', '污油', '');
INSERT INTO `dic_content` VALUES ('864', '23', '蜡油', '蜡油', '');
INSERT INTO `dic_content` VALUES ('865', '23', '减压渣油', '减压渣油', '');
INSERT INTO `dic_content` VALUES ('866', '23', '油浆', '油浆', '');
INSERT INTO `dic_content` VALUES ('867', '23', '90#沥青', '90#沥青', '');
INSERT INTO `dic_content` VALUES ('868', '23', '沥青', '沥青', '');
INSERT INTO `dic_content` VALUES ('869', '23', '70#沥青', '70#沥青', '');
INSERT INTO `dic_content` VALUES ('870', '23', '轻柴油', '轻柴油', '');
INSERT INTO `dic_content` VALUES ('871', '23', '轻柴油', '轻柴油', '');
INSERT INTO `dic_content` VALUES ('872', '23', '三线油', '三线油', '');
INSERT INTO `dic_content` VALUES ('873', '23', '玛瑙油', '玛瑙油', '');
INSERT INTO `dic_content` VALUES ('874', '23', '减一线', '减一线', '');
INSERT INTO `dic_content` VALUES ('875', '23', '波斯坎', '波斯坎', '');
INSERT INTO `dic_content` VALUES ('876', '23', '-10#车用柴油', '-10#车用柴油', '');
INSERT INTO `dic_content` VALUES ('877', '23', '溶剂油', '溶剂油', '');
INSERT INTO `dic_content` VALUES ('878', '23', '燃料油', '燃料油', '');
INSERT INTO `dic_content` VALUES ('879', '23', '基质沥青', '基质沥青', '');
INSERT INTO `dic_content` VALUES ('880', '23', '改性沥青', '改性沥青', '');
INSERT INTO `dic_content` VALUES ('882', '23', '净化风', '净化风', '');
INSERT INTO `dic_content` VALUES ('883', '23', '渣油', '渣油', '');
INSERT INTO `dic_content` VALUES ('884', '14', '16MnR', '16MnR', '');
INSERT INTO `dic_content` VALUES ('885', '14', '20R', '20R', '');
INSERT INTO `dic_content` VALUES ('886', '19', '双浮盘外浮顶罐', '双浮盘外浮顶罐', '');

-- ----------------------------
-- Table structure for dic_factory
-- ----------------------------
DROP TABLE IF EXISTS `dic_factory`;
CREATE TABLE `dic_factory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` varchar(255) DEFAULT NULL,
  `factoryName` varchar(255) DEFAULT NULL,
  `remark` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_factory
-- ----------------------------
INSERT INTO `dic_factory` VALUES ('20', '中石化燃料油总公司', '中石化燃料油总公司', null);

-- ----------------------------
-- Table structure for dic_runrecordcheckitem
-- ----------------------------
DROP TABLE IF EXISTS `dic_runrecordcheckitem`;
CREATE TABLE `dic_runrecordcheckitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_runrecordcheckitem
-- ----------------------------
INSERT INTO `dic_runrecordcheckitem` VALUES ('7', '罐基础及防火堤', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('8', '防雷防静电设施', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('9', '罐区排水系统', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('10', '泡沫发生器等消防设施', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('11', '自动火灾报警设施', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('12', '盘梯护栏', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('13', '量油孔', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('14', '排污孔', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('15', '人孔', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('16', '照明孔', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('17', '总阀', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('18', '大拉杆补偿器或金属软管', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('19', '液位计', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('20', '取样器', '通用附件设施检查结果');
INSERT INTO `dic_runrecordcheckitem` VALUES ('21', '呼吸阀', '拱顶罐桁架罐项目');
INSERT INTO `dic_runrecordcheckitem` VALUES ('22', '液压安全阀', '拱顶罐桁架罐项目');
INSERT INTO `dic_runrecordcheckitem` VALUES ('23', '通气阀', '拱顶罐桁架罐项目');
INSERT INTO `dic_runrecordcheckitem` VALUES ('24', '阻火器', '拱顶罐桁架罐项目');
INSERT INTO `dic_runrecordcheckitem` VALUES ('25', '氮封保护系统', '拱顶罐桁架罐项目');

-- ----------------------------
-- Table structure for dic_sealtype
-- ----------------------------
DROP TABLE IF EXISTS `dic_sealtype`;
CREATE TABLE `dic_sealtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_sealtype
-- ----------------------------
INSERT INTO `dic_sealtype` VALUES ('4', '机械密封', '机械密封');
INSERT INTO `dic_sealtype` VALUES ('5', '软密封', '软密封');

-- ----------------------------
-- Table structure for dic_testbasicsettle_bottom
-- ----------------------------
DROP TABLE IF EXISTS `dic_testbasicsettle_bottom`;
CREATE TABLE `dic_testbasicsettle_bottom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_testbasicsettle_bottom
-- ----------------------------
INSERT INTO `dic_testbasicsettle_bottom` VALUES ('1', '无沉降检验', '无沉降检验');
INSERT INTO `dic_testbasicsettle_bottom` VALUES ('2', '沉降符合API653标准', '沉降符合API653标准');
INSERT INTO `dic_testbasicsettle_bottom` VALUES ('3', '沉降超出API653标准', '沉降超出API653标准');

-- ----------------------------
-- Table structure for dic_type
-- ----------------------------
DROP TABLE IF EXISTS `dic_type`;
CREATE TABLE `dic_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '字典类型',
  `type` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_type
-- ----------------------------
INSERT INTO `dic_type` VALUES ('1', '4', '底部阴极保护', '底部阴极保护', null);
INSERT INTO `dic_type` VALUES ('2', '1', '储罐基础下面土壤类型', '储罐基础下面土壤类型', '');
INSERT INTO `dic_type` VALUES ('3', '1', '雨水排放能力', '雨水排放能力', null);
INSERT INTO `dic_type` VALUES ('4', '1', '底板类型', '底板类型', null);
INSERT INTO `dic_type` VALUES ('5', '3', '验收结果', '验收结果', null);
INSERT INTO `dic_type` VALUES ('6', '3', '清洗单位', '清洗单位', null);
INSERT INTO `dic_type` VALUES ('7', '3', '施工单位', '施工单位', null);
INSERT INTO `dic_type` VALUES ('8', '3', '施工类别', '施工类别', null);
INSERT INTO `dic_type` VALUES ('9', '1', '腐蚀速率类型', '腐蚀速率类型', null);
INSERT INTO `dic_type` VALUES ('10', '2', 'ERP设备分类', 'ERP设备分类', null);
INSERT INTO `dic_type` VALUES ('11', '2', '地理环境', '地理环境', null);
INSERT INTO `dic_type` VALUES ('12', '1', '衬里类型', '衬里类型', null);
INSERT INTO `dic_type` VALUES ('13', '3', '维修设计依据', '维修设计依据', null);
INSERT INTO `dic_type` VALUES ('14', '1', '材质类型', '材质类型', null);
INSERT INTO `dic_type` VALUES ('15', '2', '计量管理类别', '计量管理类别', null);
INSERT INTO `dic_type` VALUES ('16', '1', '介质碳原子数', '介质碳原子数', null);
INSERT INTO `dic_type` VALUES ('17', '1', '介质火灾危险性', '介质火灾危险性', null);
INSERT INTO `dic_type` VALUES ('18', '1', '介质毒性', '介质毒性', null);
INSERT INTO `dic_type` VALUES ('19', '1', '油罐类型', '油罐类型', null);
INSERT INTO `dic_type` VALUES ('20', '1', '储罐类型', '储罐类型', null);
INSERT INTO `dic_type` VALUES ('21', '2', '质量', '质量', null);
INSERT INTO `dic_type` VALUES ('22', '1', '密封形式', '密封形式', null);
INSERT INTO `dic_type` VALUES ('23', '1', '储存介质', '储存介质', '');
INSERT INTO `dic_type` VALUES ('24', '3', '储罐基础沉降', '储罐基础沉降', null);
INSERT INTO `dic_type` VALUES ('25', '3', '检验类型', '检验类型', null);
INSERT INTO `dic_type` VALUES ('26', '3', '底板检验类型', '底板检验类型', null);
INSERT INTO `dic_type` VALUES ('27', '1', '罐顶型式', '罐顶型式', null);
INSERT INTO `dic_type` VALUES ('28', '3', '报废类别', '报废类别', null);
INSERT INTO `dic_type` VALUES ('29', '3', '使用状态', '使用状态', null);
INSERT INTO `dic_type` VALUES ('30', '1', '连接型式', '连接型式', null);
INSERT INTO `dic_type` VALUES ('31', '3', '是否', '是否', null);
INSERT INTO `dic_type` VALUES ('32', '1', '腐蚀类型', '腐蚀类型', null);
INSERT INTO `dic_type` VALUES ('33', '4', '加热器型式', '加热器型式', null);
INSERT INTO `dic_type` VALUES ('34', '4', '阴极保护方法', '阴极保护方法', null);
INSERT INTO `dic_type` VALUES ('35', '3', '技术状况', '技术状况', null);
INSERT INTO `dic_type` VALUES ('36', '1', '密封系统', '密封系统', '浮顶密封、工艺密封等');
INSERT INTO `dic_type` VALUES ('37', '3', '检验检查项目', '检验检查项目', '检验结果项目');
INSERT INTO `dic_type` VALUES ('38', '3', '检验单位', '检验单位', '');
INSERT INTO `dic_type` VALUES ('39', '3', '检验有效性', '检验有效性', '');
INSERT INTO `dic_type` VALUES ('40', '3', '日常维护管理（日检查表）', '日常维护管理（日检查表）', '');
INSERT INTO `dic_type` VALUES ('41', '3', '日常维护管理（月检查表工艺）', '日常维护管理（月检查表工艺）', '');
INSERT INTO `dic_type` VALUES ('42', '3', '日常维护管理（月检查表设备）', '日常维护管理（月检查表设备）', '');
INSERT INTO `dic_type` VALUES ('43', '3', '日常维护管理（月检查表电气）', '日常维护管理（月检查表电气）', '');
INSERT INTO `dic_type` VALUES ('44', '3', '日常维护管理（月检查表安全）', '日常维护管理（月检查表安全）', '');
INSERT INTO `dic_type` VALUES ('45', '3', '日常维护管理（年检查表工艺）', '日常维护管理（年检查表工艺）', '');
INSERT INTO `dic_type` VALUES ('46', '3', '日常维护管理（年检查表设备）', '日常维护管理（年检查表设备）', '');
INSERT INTO `dic_type` VALUES ('47', '3', '日常维护管理（年检查表安全）', '日常维护管理（年检查表安全）', '');
INSERT INTO `dic_type` VALUES ('48', '3', '日常维护管理（常规检查表工艺）', '日常维护管理（常规检查表工艺）', '');
INSERT INTO `dic_type` VALUES ('49', '3', '日常维护管理（常规检查表设备）', '日常维护管理（常规检查表设备）', '');
INSERT INTO `dic_type` VALUES ('50', '3', '日常维护管理（常规检查表安全）', '日常维护管理（常规检查表安全）', '');
INSERT INTO `dic_type` VALUES ('52', '3', '检查区域', '检查区域', '');
INSERT INTO `dic_type` VALUES ('53', '3', '内浮顶油罐设备检查（罐体）', '内浮顶油罐设备检查（罐体）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。内浮盘油罐每月必须打开光孔检查1次浮盘情况。			\n');
INSERT INTO `dic_type` VALUES ('54', '3', '内浮顶油罐设备检查（罐顶部分）', '内浮顶油罐设备检查（罐顶部分）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。内浮盘油罐每月必须打开光孔检查1次浮盘情况。			\n');
INSERT INTO `dic_type` VALUES ('55', '3', '内浮顶油罐设备检查（管线、集合管）', '内浮顶油罐设备检查（管线、集合管）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。内浮盘油罐每月必须打开光孔检查1次浮盘情况。			\n');
INSERT INTO `dic_type` VALUES ('56', '3', '内浮顶油罐设备检查（搅拌机）', '内浮顶油罐设备检查（搅拌机）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。内浮盘油罐每月必须打开光孔检查1次浮盘情况。			\n');
INSERT INTO `dic_type` VALUES ('57', '3', '内浮顶油罐设备检查（静电接地）', '内浮顶油罐设备检查（静电接地）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。内浮盘油罐每月必须打开光孔检查1次浮盘情况。			\n');
INSERT INTO `dic_type` VALUES ('58', '3', '拱顶罐设备检查（罐体）', '拱顶罐设备检查（罐体）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('59', '3', '拱顶罐设备检查（罐顶部分）', '拱顶罐设备检查（罐顶部分）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('61', '3', '拱顶罐设备检查（管线、集合管）', '拱顶罐设备检查（管线、集合管）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('62', '3', '拱顶罐设备检查（搅拌机）', '拱顶罐设备检查（搅拌机）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('63', '3', '拱顶罐设备检查（静电接地）', '拱顶罐设备检查（静电接地）', '备注：油罐详细检查每月1次，呼吸阀每季检查1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('64', '3', '外浮顶罐设备检查（罐体）', '外浮顶罐设备检查（罐体）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('65', '3', '外浮顶罐设备检查（罐顶部分）', '外浮顶罐设备检查（罐顶部分）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('66', '3', '外浮顶罐设备检查（管线、集合管）', '外浮顶罐设备检查（管线、集合管）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('67', '3', '外浮顶罐设备检查（浮盘）', '外浮顶罐设备检查（浮盘）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('68', '3', '外浮顶罐设备检查（气体检测）', '外浮顶罐设备检查（气体检测）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('69', '3', '外浮顶罐设备检查（搅拌机）', '外浮顶罐设备检查（搅拌机）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('70', '3', '外浮顶罐设备检查（静电接地）', '外浮顶罐设备检查（静电接地）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('71', '3', '外浮顶罐设备检查（其他）', '外浮顶罐设备检查（其他）', '备注：油罐详细检查每月1次，呼吸阀每季清理1次，由所在班组区域负责检查。			\n');
INSERT INTO `dic_type` VALUES ('72', '3', '运行记录管理检查结果', '运行记录管理检查结果', '');
INSERT INTO `dic_type` VALUES ('73', '3', '维修单位', '维修单位', '');
INSERT INTO `dic_type` VALUES ('74', '1', '基础形式', '基础形式', '');
INSERT INTO `dic_type` VALUES ('75', '1', '储罐基础沉降评价', '储罐基础沉降评价', '');
INSERT INTO `dic_type` VALUES ('76', '1', '热历史', '热历史', '');
INSERT INTO `dic_type` VALUES ('77', '1', '管道复杂度', '管道复杂度', '');
INSERT INTO `dic_type` VALUES ('78', '1', '设备周围环境含有物', '设备周围环境含有物', '');

-- ----------------------------
-- Table structure for dic_workshop
-- ----------------------------
DROP TABLE IF EXISTS `dic_workshop`;
CREATE TABLE `dic_workshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` varchar(255) DEFAULT NULL,
  `workshopId` varchar(255) DEFAULT NULL,
  `workshopName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dic_workshop
-- ----------------------------
INSERT INTO `dic_workshop` VALUES ('63', '中石化燃料油总公司', '青岛分公司', null);
INSERT INTO `dic_workshop` VALUES ('64', '中石化燃料油总公司', '江苏分公司', null);
INSERT INTO `dic_workshop` VALUES ('65', '中石化燃料油总公司', '秦皇岛分公司', null);
INSERT INTO `dic_workshop` VALUES ('66', '中石化燃料油总公司', '湛江分公司', null);
INSERT INTO `dic_workshop` VALUES ('67', '中石化燃料油总公司', '高富分公司', null);
INSERT INTO `dic_workshop` VALUES ('68', '中石化燃料油总公司', '温州分公司', null);
INSERT INTO `dic_workshop` VALUES ('69', '中石化燃料油总公司', '宁波分公司', null);

-- ----------------------------
-- Table structure for tb_access
-- ----------------------------
DROP TABLE IF EXISTS `tb_access`;
CREATE TABLE `tb_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`,`node_id`),
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_access
-- ----------------------------
INSERT INTO `tb_access` VALUES ('5', '80', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('5', '79', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('5', '78', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('5', '77', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('5', '76', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('5', '23', '2', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('5', '15', '2', 'Visualization');
INSERT INTO `tb_access` VALUES ('5', '92', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '91', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '55', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '54', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '32', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '31', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '29', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '26', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '120', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('1', '119', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('1', '118', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('1', '117', '2', 'Schedule');
INSERT INTO `tb_access` VALUES ('1', '107', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '106', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '105', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '104', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '103', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '102', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '101', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '99', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '100', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '98', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '97', '2', 'RunRecord');
INSERT INTO `tb_access` VALUES ('1', '90', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('1', '89', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('1', '87', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('1', '84', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('1', '85', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '27', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '16', '2', 'Manage');
INSERT INTO `tb_access` VALUES ('5', '95', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '94', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '93', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '73', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '72', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '71', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '86', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('1', '83', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('1', '25', '2', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('1', '24', '2', 'AttachmentEvaluation');
INSERT INTO `tb_access` VALUES ('1', '82', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '81', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '80', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '79', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '78', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '77', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '76', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '23', '2', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('1', '15', '2', 'Visualization');
INSERT INTO `tb_access` VALUES ('1', '92', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '91', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '75', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('2', '106', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('2', '104', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('2', '103', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('2', '102', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('2', '101', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('2', '97', '2', 'RunRecord');
INSERT INTO `tb_access` VALUES ('2', '89', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('2', '87', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('2', '86', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('2', '25', '2', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('2', '81', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('2', '80', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('2', '79', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('2', '23', '2', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('2', '15', '2', 'Visualization');
INSERT INTO `tb_access` VALUES ('2', '92', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('2', '91', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('2', '54', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('2', '32', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('2', '31', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('2', '16', '2', 'Manage');
INSERT INTO `tb_access` VALUES ('2', '95', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('2', '93', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('2', '73', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('2', '72', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('2', '71', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('2', '17', '2', 'Inspect');
INSERT INTO `tb_access` VALUES ('2', '109', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('2', '66', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '106', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('3', '105', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('3', '104', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('3', '103', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('3', '102', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('3', '101', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('3', '97', '2', 'RunRecord');
INSERT INTO `tb_access` VALUES ('3', '90', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('3', '89', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('3', '87', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('3', '86', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('3', '25', '2', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('3', '24', '2', 'AttachmentEvaluation');
INSERT INTO `tb_access` VALUES ('3', '82', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('3', '81', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('3', '80', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('3', '79', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('3', '23', '2', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('3', '15', '2', 'Visualization');
INSERT INTO `tb_access` VALUES ('3', '92', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('3', '91', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('3', '75', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('3', '54', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('3', '32', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('3', '31', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('3', '16', '2', 'Manage');
INSERT INTO `tb_access` VALUES ('3', '95', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('3', '93', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('3', '74', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('3', '73', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('3', '72', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('3', '71', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('3', '17', '2', 'Inspect');
INSERT INTO `tb_access` VALUES ('3', '109', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '108', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '67', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '66', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '65', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '64', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '18', '2', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('3', '115', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('3', '111', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('3', '60', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('3', '53', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('2', '65', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('2', '64', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('2', '18', '2', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('2', '115', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('2', '111', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '55', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '54', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '32', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '31', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '29', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '27', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '26', '3', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '16', '2', 'Manage');
INSERT INTO `tb_access` VALUES ('1', '95', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '94', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '93', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '74', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '73', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '72', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '71', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '70', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '69', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '68', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '17', '2', 'Inspect');
INSERT INTO `tb_access` VALUES ('1', '110', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '109', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '108', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '67', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '66', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '65', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '64', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '63', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '62', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '61', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '18', '2', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('1', '115', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '114', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '111', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '60', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '53', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '52', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '51', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '49', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '48', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '47', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '20', '2', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('1', '116', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '113', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '112', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '59', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '46', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '45', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '44', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '43', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '42', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '41', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('1', '21', '2', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '70', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '69', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '68', '3', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '17', '2', 'Inspect');
INSERT INTO `tb_access` VALUES ('5', '110', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '109', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '108', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '66', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '65', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '64', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '63', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '62', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '61', '3', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '18', '2', 'DailyManagement');
INSERT INTO `tb_access` VALUES ('5', '115', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '114', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '111', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '53', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '52', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '51', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '49', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '48', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '47', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '20', '2', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('5', '116', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '113', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '112', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '46', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '45', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '44', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '43', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '42', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '41', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '21', '2', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('5', '40', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('5', '39', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('5', '38', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('5', '37', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('5', '36', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('5', '30', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('5', '22', '2', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('5', '1', '1', 'Home');
INSERT INTO `tb_access` VALUES ('2', '53', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('2', '52', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('2', '51', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('2', '20', '2', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('2', '116', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('2', '112', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('2', '46', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('2', '45', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('2', '44', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('2', '21', '2', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('2', '40', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '58', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '40', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '39', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '38', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '37', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('3', '52', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('3', '51', '3', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('3', '20', '2', 'InspectRecord');
INSERT INTO `tb_access` VALUES ('3', '116', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('3', '112', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('3', '59', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('3', '46', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('3', '45', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('3', '44', '3', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('3', '21', '2', 'MaintenanceRecord');
INSERT INTO `tb_access` VALUES ('3', '58', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('3', '40', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('3', '39', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '36', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '30', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '22', '2', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('1', '1', '1', 'Home');
INSERT INTO `tb_access` VALUES ('1', '121', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('1', '122', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('1', '124', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('3', '30', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('3', '22', '2', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('3', '1', '1', 'Home');
INSERT INTO `tb_access` VALUES ('5', '81', '3', 'RiskStatistics');
INSERT INTO `tb_access` VALUES ('5', '24', '2', 'AttachmentEvaluation');
INSERT INTO `tb_access` VALUES ('5', '25', '2', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '83', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '84', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '85', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '86', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '87', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '89', '3', 'AlertRecordManage');
INSERT INTO `tb_access` VALUES ('5', '97', '2', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '98', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '99', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '100', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '101', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '102', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '103', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '104', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '106', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '107', '3', 'RunRecord');
INSERT INTO `tb_access` VALUES ('5', '117', '2', 'Schedule');
INSERT INTO `tb_access` VALUES ('5', '118', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('5', '119', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('5', '120', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('5', '121', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('5', '122', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('3', '117', '2', 'Schedule');
INSERT INTO `tb_access` VALUES ('3', '121', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('3', '122', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('3', '124', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('2', '39', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('2', '30', '3', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('2', '22', '2', 'RiskCalculation');
INSERT INTO `tb_access` VALUES ('2', '1', '1', 'Home');
INSERT INTO `tb_access` VALUES ('2', '117', '2', 'Schedule');
INSERT INTO `tb_access` VALUES ('2', '121', '3', 'Schedule');
INSERT INTO `tb_access` VALUES ('2', '122', '3', 'Schedule');

-- ----------------------------
-- Table structure for tb_assistcheckevaluatedetailrecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_assistcheckevaluatedetailrecord`;
CREATE TABLE `tb_assistcheckevaluatedetailrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assistCheckEvaluateRecordId` int(11) DEFAULT NULL COMMENT '附件检测与评价记录ID',
  `assistCheckEvaluateKey` varchar(200) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL COMMENT '序号',
  `problem` varchar(300) DEFAULT NULL COMMENT '发现问题',
  `suggestStatus` varchar(300) DEFAULT NULL COMMENT '建议状态(完好，待检，待修)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_assistcheckevaluatedetailrecord
-- ----------------------------
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('174', '8', '储罐基础检验及评价', '0', '111', '完好');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('175', '8', '储罐基础检验及评价', '1', '111', '完好');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('176', '8', '储罐基础检验及评价', '2', '222', '完好');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('180', '9', '防雷防静电设施检测及评价', '0', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('181', '9', '防雷防静电设施检测及评价', '1', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('182', '9', '防雷防静电设施检测及评价', '2', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('183', '9', '防雷防静电设施检测及评价', '3', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('184', '9', '防雷防静电设施检测及评价', '4', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('185', '9', '防雷防静电设施检测及评价', '5', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('186', '9', '防雷防静电设施检测及评价', '6', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('187', '9', '测温仪表的检验及评价', '0', '5', '完好');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('188', '9', '测温仪表的检验及评价', '1', '6', '完好');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('189', '9', '测温仪表的检验及评价', '2', '7', '完好');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('190', '8', '防雷防静电设施检测及评价', '0', '555', '待修');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('191', '8', '防雷防静电设施检测及评价', '1', '666', '待检');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('192', '8', '防雷防静电设施检测及评价', '2', '777', '待修');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('196', '10', '阴极保护检测及评价', '0', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('197', '10', '阴极保护检测及评价', '1', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('198', '10', '阴极保护检测及评价', '2', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('199', '10', '阴极保护检测及评价', '3', '', '');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('203', '10', '储罐基础检验及评价', '0', '555', '待修');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('204', '10', '储罐基础检验及评价', '1', '666', '待检');
INSERT INTO `tb_assistcheckevaluatedetailrecord` VALUES ('205', '10', '储罐基础检验及评价', '2', '777', '待修');

-- ----------------------------
-- Table structure for tb_assistcheckevaluaterecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_assistcheckevaluaterecord`;
CREATE TABLE `tb_assistcheckevaluaterecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryid` varchar(100) DEFAULT NULL,
  `factoryName` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `workshopName` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  `areaName` varchar(100) DEFAULT NULL,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `checkType` varchar(100) DEFAULT NULL,
  `evaluateDate` varchar(20) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_assistcheckevaluaterecord
-- ----------------------------
INSERT INTO `tb_assistcheckevaluaterecord` VALUES ('8', '炼油厂', '炼油厂', '原料车间', '原料车间', '原料北罐区', '原料北罐区', 'H-3#', '常压储罐', '防雷防静电设施检测及评价', '2015-11-13', '超级管理员', '审核通过', '否');
INSERT INTO `tb_assistcheckevaluaterecord` VALUES ('9', 'lianyouchang', '炼油厂', 'cuihua', '催化车间', 'Ⅰ催化装置', 'Ⅰ催化装置', 'test', 'test', '测温仪表的检验及评价', '2015-11-13', '超级管理员', '审核通过', '否');
INSERT INTO `tb_assistcheckevaluaterecord` VALUES ('10', '炼油厂', '炼油厂', '催化车间', '催化车间', 'Ⅰ催化装置', 'Ⅰ催化装置', 'G-4', '阻垢剂罐', '储罐基础检验及评价', '2015-11-13', '设备主管', '审核通过', '否');

-- ----------------------------
-- Table structure for tb_attachevaluatedetailrecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_attachevaluatedetailrecord`;
CREATE TABLE `tb_attachevaluatedetailrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachEvaluateRecordId` int(11) DEFAULT NULL COMMENT '附件检测与评价记录ID',
  `attachType` varchar(200) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL COMMENT '序号',
  `result` varchar(10) DEFAULT NULL COMMENT '检查结果',
  `problem` varchar(300) DEFAULT NULL COMMENT '检查发现的问题',
  `method` varchar(300) DEFAULT NULL COMMENT '处理措施',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_attachevaluatedetailrecord
-- ----------------------------
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('13', '5', '生产运行和巡检操作', '0', '发现问题', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('14', '5', '生产运行和巡检操作', '1', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('15', '5', '生产运行和巡检操作', '2', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('16', '5', '生产运行和巡检操作', '3', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('17', '5', '生产运行和巡检操作', '4', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('18', '5', '生产运行和巡检操作', '5', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('19', '6', '生产运行和巡检操作', '0', '发现问题', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('20', '6', '生产运行和巡检操作', '1', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('21', '6', '生产运行和巡检操作', '2', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('22', '6', '生产运行和巡检操作', '3', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('23', '6', '生产运行和巡检操作', '4', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('24', '6', '生产运行和巡检操作', '5', '符合要求', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('88', '6', '土建及钢结构', '0', '不确定', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('89', '6', '土建及钢结构', '1', '不确定', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('90', '6', '土建及钢结构', '2', '不确定', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('91', '6', '土建及钢结构', '3', '不确定', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('92', '6', '土建及钢结构', '4', '不确定', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('93', '6', '土建及钢结构', '5', '不确定', '', '');
INSERT INTO `tb_attachevaluatedetailrecord` VALUES ('94', '6', '土建及钢结构', '6', '不确定', '', '');

-- ----------------------------
-- Table structure for tb_attachevaluaterecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_attachevaluaterecord`;
CREATE TABLE `tb_attachevaluaterecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `attachType` varchar(100) DEFAULT NULL,
  `evaluateDate` varchar(20) DEFAULT NULL,
  `evaluateResult` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_attachevaluaterecord
-- ----------------------------
INSERT INTO `tb_attachevaluaterecord` VALUES ('5', '28', '生产运行和巡检操作', '2015-10-17', '', '设备主管', '审核通过', '否');
INSERT INTO `tb_attachevaluaterecord` VALUES ('6', '29', '生产运行和巡检操作', '2015-10-17', '', '设备主管', '审核通过', '否');

-- ----------------------------
-- Table structure for tb_attachment
-- ----------------------------
DROP TABLE IF EXISTS `tb_attachment`;
CREATE TABLE `tb_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tableId` varchar(100) DEFAULT NULL,
  `recordId` varchar(10) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `filePath` varchar(100) DEFAULT NULL,
  `addTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_attachment
-- ----------------------------
INSERT INTO `tb_attachment` VALUES ('44', 'MaintenanceRecord', '20', '储罐风险评估.xlsx', './Uploads/20160807/57a6a2293418b.xlsx', '2016-08-07 10:51:21');
INSERT INTO `tb_attachment` VALUES ('45', 'MaintenanceRecord', '20', '储罐风险评估.xlsx', './Uploads/20160808/57a843b81cf8c.xlsx', '2016-08-08 16:32:55');
INSERT INTO `tb_attachment` VALUES ('46', 'MaintenanceRecord', '1', '18b1OOOPIC63.jpg', './Uploads/20160824/57bd0a9dd1a83.jpg', '2016-08-24 10:46:53');
INSERT INTO `tb_attachment` VALUES ('53', 'tb_plantinfo', '28', 'chinaMap.jpg', 'Uploads/2016-08-26/1472196532.jpg', '2016-08-26 15:28:52');
INSERT INTO `tb_attachment` VALUES ('55', 'MaintenanceRecord', '', '美丽心灵.jpg', './Uploads/20160831/57c638b26bead.jpg', '2016-08-31 09:53:54');
INSERT INTO `tb_attachment` VALUES ('56', 'tb_plantinfo', '28', 'Chrysanthemum.jpg', 'Uploads/2016-09-17/1474091867.jpg', '2016-09-17 13:57:47');
INSERT INTO `tb_attachment` VALUES ('57', 'MaintenanceRecord', '', 'Chrysanthemum.jpg', './Uploads/20160917/57dcf6651c961.jpg', '2016-09-17 15:53:09');
INSERT INTO `tb_attachment` VALUES ('58', 'tb_plantinfo', '508', 'Chrysanthemum.jpg', 'Uploads/2016-09-18/1474205542.jpg', '2016-09-18 21:32:22');
INSERT INTO `tb_attachment` VALUES ('59', 'tb_plantinfo', '508', 'Desert.jpg', 'Uploads/2016-09-18/1474205551.jpg', '2016-09-18 21:32:31');
INSERT INTO `tb_attachment` VALUES ('66', 'tb_plantinfo', '28', '储罐风险评估.xlsx', 'Uploads/2016-09-21/1474461266.xlsx', '2016-09-21 20:34:26');
INSERT INTO `tb_attachment` VALUES ('71', 'tb_thicknessOrigin', '28', 'Jellyfish.jpg', 'Uploads/2016-09-23/1474594349.jpg', '2016-09-23 09:32:29');
INSERT INTO `tb_attachment` VALUES ('76', 'Inspect', '28', 'Chrysanthemum.jpg', 'Uploads/2016-09-23/1474598590.jpg', '2016-09-23 10:43:10');
INSERT INTO `tb_attachment` VALUES ('79', 'dailyRecord', '28', 'Koala.jpg', 'Uploads/2016-09-23/1474612923.jpg', '2016-09-23 14:42:03');
INSERT INTO `tb_attachment` VALUES ('80', 'MaintenanceRecord', '', 'Hydrangeas.jpg', './Uploads/20160923/57e4e33472de9.jpg', '2016-09-23 16:09:24');
INSERT INTO `tb_attachment` VALUES ('81', 'InspectRecord', '29', 'Lighthouse.jpg', 'Uploads/2016-09-24/1474697066.jpg', '2016-09-24 14:04:26');
INSERT INTO `tb_attachment` VALUES ('82', 'InspectRecord', '28', 'Hydrangeas.jpg', 'Uploads/2016-09-24/1474698559.jpg', '2016-09-24 14:29:19');
INSERT INTO `tb_attachment` VALUES ('84', 'MaintenanceRecord', '1', 'Koala.jpg', './Uploads/20160925/57e75d84c11ee.jpg', '2016-09-25 13:15:48');
INSERT INTO `tb_attachment` VALUES ('85', 'tb_thicknessOrigin', '29', 'Hydrangeas.jpg', 'Uploads/2016-09-29/1475161266.jpg', '2016-09-29 23:01:06');
INSERT INTO `tb_attachment` VALUES ('86', 'tb_thicknessOrigin', '29', 'Chrysanthemum.jpg', 'Uploads/2016-09-29/1475161466.jpg', '2016-09-29 23:04:26');
INSERT INTO `tb_attachment` VALUES ('88', 'tb_plantinfo', '490', 'Koala.jpg', 'Uploads/2016-10-03/1475475853.jpg', '2016-10-03 14:24:13');
INSERT INTO `tb_attachment` VALUES ('93', 'Inspect', '28', 'Koala.jpg', 'Uploads/2016-10-09/1475945177.jpg', '2016-10-09 00:46:17');
INSERT INTO `tb_attachment` VALUES ('99', 'wallOrigin', '28', '日常维护管理.png', '/model/Public/2016-10-10/1476084812.png', '2016-10-10 15:33:32');
INSERT INTO `tb_attachment` VALUES ('100', 'wallOrigin', '28', '日常维护管理.png', '/model/Public/Home/img/observationPointFig/57fb4569e5840.png', '2016-10-10 15:38:17');
INSERT INTO `tb_attachment` VALUES ('104', 'MaintenanceRecord', '28', 'Desert.jpg', 'Uploads/2016-10-11/1476174449.jpg', '2016-10-11 16:27:29');
INSERT INTO `tb_attachment` VALUES ('105', 'MaintenanceRecord', '28', 'Koala.jpg', 'Uploads/2016-10-12/1476254999.jpg', '2016-10-12 14:49:59');
INSERT INTO `tb_attachment` VALUES ('106', 'MaintenanceRecord', '28', 'Hydrangeas.jpg', 'Uploads/2016-10-12/1476255276.jpg', '2016-10-12 14:54:36');
INSERT INTO `tb_attachment` VALUES ('107', 'InspectRecord', '28', 'Chrysanthemum.jpg', 'Uploads/2016-10-12/1476255635.jpg', '2016-10-12 15:00:35');
INSERT INTO `tb_attachment` VALUES ('111', 'Inspect', '28', 'Chrysanthemum.jpg', 'Uploads/2016-10-12/1476256233.jpg', '2016-10-12 15:10:33');
INSERT INTO `tb_attachment` VALUES ('113', 'tb_thicknessOrigin', '28', '常压储罐完整性管理整体设计方案20160529.docx', 'Uploads/2016-10-12/1476256739.docx', '2016-10-12 15:18:59');
INSERT INTO `tb_attachment` VALUES ('117', 'tb_thicknessOrigin', '480', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-13/1476362990.xls', '2016-10-13 20:49:50');
INSERT INTO `tb_attachment` VALUES ('118', 'tb_thicknessOrigin', '28', 'Desert.jpg', 'Uploads/2016-10-19/1476843223.jpg', '2016-10-19 10:13:43');
INSERT INTO `tb_attachment` VALUES ('119', 'Inspect', '28', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-21/1477037143.xls', '2016-10-21 16:05:43');
INSERT INTO `tb_attachment` VALUES ('120', 'Inspect', '29', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-21/1477038338.xls', '2016-10-21 16:25:38');
INSERT INTO `tb_attachment` VALUES ('121', 'tb_plantinfo', '532', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-22/1477144298.xls', '2016-10-22 21:51:38');
INSERT INTO `tb_attachment` VALUES ('122', 'tb_plantinfo', '28', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-22/1477144482.xls', '2016-10-22 21:54:42');
INSERT INTO `tb_attachment` VALUES ('123', 'tb_thicknessOrigin', '536', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-22/1477145517.xls', '2016-10-22 22:11:57');
INSERT INTO `tb_attachment` VALUES ('124', 'dailyRecord', '28', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-23/1477203217.xls', '2016-10-23 14:13:37');
INSERT INTO `tb_attachment` VALUES ('125', 'dailyRecord', '28', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-23/1477204032.xls', '2016-10-23 14:27:12');
INSERT INTO `tb_attachment` VALUES ('126', 'Inspect', '320', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-23/1477214089.xls', '2016-10-23 17:14:49');
INSERT INTO `tb_attachment` VALUES ('127', 'tb_runrecord', '27', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-23/1477214304.xls', '2016-10-23 17:18:24');
INSERT INTO `tb_attachment` VALUES ('128', 'tb_runrecord', '28', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-23/1477214366.xls', '2016-10-23 17:19:26');
INSERT INTO `tb_attachment` VALUES ('129', 'tb_runrecord', '28', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-23/1477214378.xls', '2016-10-23 17:19:38');
INSERT INTO `tb_attachment` VALUES ('130', 'dailyRecord', '16', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-10-23/1477214572.xls', '2016-10-23 17:22:52');
INSERT INTO `tb_attachment` VALUES ('131', 'InspectRecord', '53', 'Desert.jpg', 'Uploads/2016-10-23/1477214757.jpg', '2016-10-23 17:25:57');
INSERT INTO `tb_attachment` VALUES ('132', 'InspectRecord', '51', 'Jellyfish.jpg', 'Uploads/2016-10-23/1477214779.jpg', '2016-10-23 17:26:19');
INSERT INTO `tb_attachment` VALUES ('133', 'tb_thicknessOrigin', '533', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-11-01/1477983310.xls', '2016-11-01 14:55:10');
INSERT INTO `tb_attachment` VALUES ('134', 'dailyRecord', '20', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-11-01/1477983838.xls', '2016-11-01 15:03:58');
INSERT INTO `tb_attachment` VALUES ('135', 'InspectRecord', '55', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-11-01/1477983942.xls', '2016-11-01 15:05:42');
INSERT INTO `tb_attachment` VALUES ('138', 'RiskList', '', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-11-04/1478247199.xls', '2016-11-04 16:13:19');
INSERT INTO `tb_attachment` VALUES ('139', 'tb_plantinfo', '537', '往复机巡检区域划分2016年9月更新.xls', 'Uploads/2016-11-07/1478493376.xls', '2016-11-07 12:36:16');
INSERT INTO `tb_attachment` VALUES ('140', 'tb_runrecord', '114', '2.jpg', 'Uploads/2016-11-15/1479218965.jpg', '2016-11-15 22:09:25');
INSERT INTO `tb_attachment` VALUES ('141', 'dailyRecord', '20', '平面图2.jpg', 'Uploads/2016-11-15/1479220781.jpg', '2016-11-15 22:39:41');
INSERT INTO `tb_attachment` VALUES ('142', 'MaintenanceRecord', '15', '平面图2.jpg', 'Uploads/2016-11-15/1479224574.jpg', '2016-11-15 23:42:54');
INSERT INTO `tb_attachment` VALUES ('143', 'tb_plantinfo', '28', '3.jpg', 'Uploads/2016-11-15/1479224999.jpg', '2016-11-15 23:49:59');
INSERT INTO `tb_attachment` VALUES ('144', 'RiskList', '', '平面图.jpg', 'Uploads/2016-11-15/1479225022.jpg', '2016-11-15 23:50:22');
INSERT INTO `tb_attachment` VALUES ('145', 'Inspect', '339', '3.jpg', 'Uploads/2016-11-15/1479225395.jpg', '2016-11-15 23:56:35');
INSERT INTO `tb_attachment` VALUES ('146', 'Inspect', '339', 'filehelper_1479215396742_85.png', 'Uploads/2016-11-16/1479226046.png', '2016-11-16 00:07:26');
INSERT INTO `tb_attachment` VALUES ('147', 'InspectRecord', '56', '储罐风险评估.xlsx', 'Uploads/2016-11-17/1479394488.xlsx', '2016-11-17 22:54:48');

-- ----------------------------
-- Table structure for tb_comments
-- ----------------------------
DROP TABLE IF EXISTS `tb_comments`;
CREATE TABLE `tb_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_table` varchar(100) NOT NULL COMMENT '评论内容所在表，不带表前缀',
  `post_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论内容 id',
  `url` varchar(255) DEFAULT NULL COMMENT '原文地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '评论时间',
  `content` text NOT NULL COMMENT '评论内容',
  `type` smallint(1) NOT NULL DEFAULT '1' COMMENT '评论类型；1实名评论',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `path` varchar(500) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`post_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `comment_parent` (`parentid`),
  KEY `table_id_status` (`post_table`,`post_id`,`status`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of tb_comments
-- ----------------------------

-- ----------------------------
-- Table structure for tb_common_action_log
-- ----------------------------
DROP TABLE IF EXISTS `tb_common_action_log`;
CREATE TABLE `tb_common_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip',
  PRIMARY KEY (`id`),
  KEY `user_object_action` (`user`,`object`,`action`),
  KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问记录表';

-- ----------------------------
-- Records of tb_common_action_log
-- ----------------------------

-- ----------------------------
-- Table structure for tb_gisdata
-- ----------------------------
DROP TABLE IF EXISTS `tb_gisdata`;
CREATE TABLE `tb_gisdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `plantName` varchar(50) DEFAULT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `positionRadius` int(11) DEFAULT NULL,
  `subMapUrl` varchar(100) DEFAULT NULL,
  `subMapName` varchar(100) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_gisdata
-- ----------------------------
INSERT INTO `tb_gisdata` VALUES ('8', '0', '1', '青岛分公司', '535', '250', '20', '/model/Public/Home/img/gisMap/582b0b2e89cb1.jpg', '青岛分公司', '');
INSERT INTO `tb_gisdata` VALUES ('9', '0', '1', '宁波分公司', '684', '418', '20', '/model/Public/Home/img/gisMap/57c0703104621.jpg', '宁波分公司', '');
INSERT INTO `tb_gisdata` VALUES ('10', '0', '1', '高富分公司', '577', '596', '20', '/model/Public/Home/img/gisMap/57cbd0ffa2abe.png', '高富分公司', '');
INSERT INTO `tb_gisdata` VALUES ('18', '0', '1', '江苏分公司', '677', '393', '0', '/model/Public/Home/img/gisMap/57cd7bcf9e2c2.jpg', '江苏分公司', '');
INSERT INTO `tb_gisdata` VALUES ('23', '0', '1', '秦皇岛分公司', '661', '265', '20', '/model/Public/Home/img/gisMap/57c2a2c628fea.jpg', '秦皇岛分公司', '');
INSERT INTO `tb_gisdata` VALUES ('24', '9', '2', '罐区一', '377', '221', '20', '/model/Public/Home/img/gisMap/57c0775f9bf0a.jpg', '罐区一', '');
INSERT INTO `tb_gisdata` VALUES ('25', '0', '1', '湛江分公司', '620', '540', '20', '/model/Public/Home/img/gisMap/57eb72bf85158.jpg', '湛江分公司', '');
INSERT INTO `tb_gisdata` VALUES ('26', '9', '2', '罐区二', '488', '232', '20', '/model/Public/Home/img/gisMap/57c0793dbb986.jpg', '罐区二', '');
INSERT INTO `tb_gisdata` VALUES ('27', '24', '3', '2#燃料油罐', '147', '193', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('28', '26', '3', 'G-402', '162', '242', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('29', '23', '2', '罐区三', '330', '217', '20', '/model/Public/Home/img/gisMap/57cbd1f084758.jpg', '罐区三', '');
INSERT INTO `tb_gisdata` VALUES ('30', '24', '3', '55-T-0001D', '501', '154', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('31', '8', '2', '罐区一', '167', '291', '20', '/model/Public/Home/img/gisMap/57ccdb7d5a6d6.jpg', '罐区一', '');
INSERT INTO `tb_gisdata` VALUES ('32', '10', '2', '罐区二', '474', '160', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('33', '10', '2', '罐区一', '213', '190', '20', '/model/Public/Home/img/gisMap/58116e1cea9e9.jpg', '罐区一', '');
INSERT INTO `tb_gisdata` VALUES ('34', '31', '3', '234', '106', '243', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('35', '31', '3', 'G-402', '347', '241', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('36', '8', '2', '罐区二', '492', '220', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('37', '18', '2', '罐区一', '529', '151', '20', '/model/Public/Home/img/gisMap/57f90bb1a7466.jpg', '罐区一', '');
INSERT INTO `tb_gisdata` VALUES ('38', '18', '2', '罐区二', '134', '239', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('39', '25', '2', '罐区一', '368', '359', '20', '/model/Public/Home/img/gisMap/57fc3d67a5217.jpg', '罐区一', '');
INSERT INTO `tb_gisdata` VALUES ('40', '39', '3', '1#燃油储罐', '242', '316', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('41', '0', '2', '罐区一', '395', '232', '20', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('42', '33', '3', '3#除盐水箱', '336', '150', '0', null, null, '测试1');
INSERT INTO `tb_gisdata` VALUES ('43', '31', '3', '45689769', '241', '326', '0', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('44', '31', '3', '测试1', '473', '183', '0', null, null, '');
INSERT INTO `tb_gisdata` VALUES ('45', '8', '2', '罐区三', '403', '377', '20', null, null, '');

-- ----------------------------
-- Table structure for tb_gisdata_bak
-- ----------------------------
DROP TABLE IF EXISTS `tb_gisdata_bak`;
CREATE TABLE `tb_gisdata_bak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plantId` varchar(255) DEFAULT NULL,
  `plantName` varchar(255) DEFAULT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_gisdata_bak
-- ----------------------------

-- ----------------------------
-- Table structure for tb_gisimagedata
-- ----------------------------
DROP TABLE IF EXISTS `tb_gisimagedata`;
CREATE TABLE `tb_gisimagedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentImageId` int(11) DEFAULT NULL,
  `childImageId` int(11) DEFAULT NULL,
  `axisLeft` int(11) DEFAULT NULL,
  `axisRight` int(11) DEFAULT NULL,
  `axisTop` int(11) DEFAULT NULL,
  `axisBottom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_gisimagedata
-- ----------------------------
INSERT INTO `tb_gisimagedata` VALUES ('2', '-1', '1', null, null, null, null);
INSERT INTO `tb_gisimagedata` VALUES ('3', '1', '2', '0', '658', '0', '1383');
INSERT INTO `tb_gisimagedata` VALUES ('4', '1', '4', '658', '1624', '0', '671');
INSERT INTO `tb_gisimagedata` VALUES ('5', '1', '3', '658', '1624', '671', '1383');
INSERT INTO `tb_gisimagedata` VALUES ('6', '2', '5', '1474', '1566', '548', '616');
INSERT INTO `tb_gisimagedata` VALUES ('7', '2', '6', '52', '373', '609', '1157');
INSERT INTO `tb_gisimagedata` VALUES ('8', '2', '7', '398', '681', '693', '1076');
INSERT INTO `tb_gisimagedata` VALUES ('9', '2', '8', '2877', '2997', '893', '968');
INSERT INTO `tb_gisimagedata` VALUES ('10', '2', '9', '2430', '2566', '1242', '1340');
INSERT INTO `tb_gisimagedata` VALUES ('11', '2', '10', '2985', '3105', '812', '890');
INSERT INTO `tb_gisimagedata` VALUES ('12', '2', '11', '1147', '1248', '291', '379');
INSERT INTO `tb_gisimagedata` VALUES ('13', '2', '12', '1264', '1419', '639', '721');
INSERT INTO `tb_gisimagedata` VALUES ('14', '2', '13', '1253', '1589', '1675', '1844');
INSERT INTO `tb_gisimagedata` VALUES ('15', '2', '14', '2757', '2985', '1178', '1337');
INSERT INTO `tb_gisimagedata` VALUES ('16', '2', '15', '2444', '2594', '910', '961');
INSERT INTO `tb_gisimagedata` VALUES ('17', '4', '16', '947', '1100', '1517', '1602');
INSERT INTO `tb_gisimagedata` VALUES ('18', '4', '17', '1130', '1242', '1635', '1713');
INSERT INTO `tb_gisimagedata` VALUES ('19', '4', '18', '748', '923', '1497', '1704');
INSERT INTO `tb_gisimagedata` VALUES ('20', '4', '19', '2537', '2722', '485', '580');
INSERT INTO `tb_gisimagedata` VALUES ('21', '4', '20', '2543', '2728', '593', '661');
INSERT INTO `tb_gisimagedata` VALUES ('22', '6', '21', '382', '579', '145', '338');
INSERT INTO `tb_gisimagedata` VALUES ('23', '2', '22', '831', '1732', '233', '1814');
INSERT INTO `tb_gisimagedata` VALUES ('24', '22', '23', '158', '399', '140', '271');

-- ----------------------------
-- Table structure for tb_gisimagedata_bak
-- ----------------------------
DROP TABLE IF EXISTS `tb_gisimagedata_bak`;
CREATE TABLE `tb_gisimagedata_bak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentImageId` int(11) DEFAULT NULL,
  `childImageId` int(11) DEFAULT NULL,
  `axisLeft` int(11) DEFAULT NULL,
  `axisRight` int(11) DEFAULT NULL,
  `axisTop` int(11) DEFAULT NULL,
  `axisBottom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_gisimagedata_bak
-- ----------------------------
INSERT INTO `tb_gisimagedata_bak` VALUES ('2', '-1', '1', null, null, null, null);
INSERT INTO `tb_gisimagedata_bak` VALUES ('3', '1', '2', '0', '658', '0', '1383');
INSERT INTO `tb_gisimagedata_bak` VALUES ('4', '1', '4', '658', '1624', '0', '671');
INSERT INTO `tb_gisimagedata_bak` VALUES ('5', '1', '3', '658', '1624', '671', '1383');
INSERT INTO `tb_gisimagedata_bak` VALUES ('6', '2', '5', '1474', '1566', '548', '616');
INSERT INTO `tb_gisimagedata_bak` VALUES ('7', '2', '6', '52', '373', '609', '1157');
INSERT INTO `tb_gisimagedata_bak` VALUES ('8', '2', '7', '398', '681', '693', '1076');
INSERT INTO `tb_gisimagedata_bak` VALUES ('9', '2', '8', '2877', '2997', '893', '968');
INSERT INTO `tb_gisimagedata_bak` VALUES ('10', '2', '9', '2430', '2566', '1242', '1340');
INSERT INTO `tb_gisimagedata_bak` VALUES ('11', '2', '10', '2985', '3105', '812', '890');
INSERT INTO `tb_gisimagedata_bak` VALUES ('12', '2', '11', '1147', '1248', '291', '379');
INSERT INTO `tb_gisimagedata_bak` VALUES ('13', '2', '12', '1264', '1419', '639', '721');
INSERT INTO `tb_gisimagedata_bak` VALUES ('14', '2', '13', '1253', '1589', '1675', '1844');
INSERT INTO `tb_gisimagedata_bak` VALUES ('15', '2', '14', '2757', '2985', '1178', '1337');
INSERT INTO `tb_gisimagedata_bak` VALUES ('16', '2', '15', '2444', '2594', '910', '961');
INSERT INTO `tb_gisimagedata_bak` VALUES ('17', '4', '16', '947', '1100', '1517', '1602');
INSERT INTO `tb_gisimagedata_bak` VALUES ('18', '4', '17', '1130', '1242', '1635', '1713');
INSERT INTO `tb_gisimagedata_bak` VALUES ('19', '4', '18', '748', '923', '1497', '1704');
INSERT INTO `tb_gisimagedata_bak` VALUES ('20', '4', '19', '2537', '2722', '485', '580');
INSERT INTO `tb_gisimagedata_bak` VALUES ('21', '4', '20', '2543', '2728', '593', '661');
INSERT INTO `tb_gisimagedata_bak` VALUES ('22', '6', '21', '382', '579', '145', '338');
INSERT INTO `tb_gisimagedata_bak` VALUES ('23', '2', '22', '831', '1732', '233', '1814');
INSERT INTO `tb_gisimagedata_bak` VALUES ('24', '22', '23', '158', '399', '140', '271');

-- ----------------------------
-- Table structure for tb_gisimagelist
-- ----------------------------
DROP TABLE IF EXISTS `tb_gisimagelist`;
CREATE TABLE `tb_gisimagelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageLocation` varchar(255) DEFAULT NULL,
  `level` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `factoryId` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_gisimagelist
-- ----------------------------
INSERT INTO `tb_gisimagelist` VALUES ('1', '中国石油独山子石化公司总图.jpg', '公司', '独山子石化', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('2', '炼油厂1-装置位置图.jpg', '分厂', '炼油厂', '炼油厂', null, null);
INSERT INTO `tb_gisimagelist` VALUES ('3', '热电厂1-装置位置图.jpg', '分厂', '热电厂', '热电厂', null, null);
INSERT INTO `tb_gisimagelist` VALUES ('4', '乙烯厂1-装置位置图.jpg', '分厂', '乙烯厂', '乙烯厂', null, null);
INSERT INTO `tb_gisimagelist` VALUES ('5', '炼油厂催化车间1.jpg', '车间', '催化车间', '炼油厂', '催化车间', null);
INSERT INTO `tb_gisimagelist` VALUES ('6', '炼油厂国储公司-300万方原油储备库.jpg', '车间', '300万吨国家原油储备库', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('7', '炼油厂国储公司-140万方原油商业储备库.jpg', '车间', '140万吨原油储备库', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('8', '炼油厂第一联合车间-1000万吨年常减压蒸馏装置1.jpg', '车间', '1000万吨常减压装置', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('9', '炼油厂储运联合车间-新区-50万方原油罐区6.jpg', '车间', '50万原油罐区', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('10', '炼油厂第一联合车间-120万吨延迟焦化装置6.jpg', '车间', '120万延迟焦化', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('11', '炼油厂储运联合车间-北罐区-航煤罐区13.jpg', '车间', '航煤罐区', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('12', '炼油厂储运联合车间-北罐区-重整罐区25.jpg', '车间', '重整罐区', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('13', '炼油厂储运联合车间-南罐区126.jpg', '车间', '南罐区', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('14', '炼油厂储运联合车间-新区-中间油罐区32.jpg', '车间', '中间油罐区', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('15', '炼油厂储运联合车间-新区-成品罐区19.jpg', '车间', '成品罐区', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('16', '乙烯厂烯烃二联合车间-乙二醇装置9.jpg', '车间', '乙二醇装置', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('17', '乙烯厂烯烃二联合车间-甲醇装置3.jpg', '车间', '甲醇装置', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('18', '乙烯厂烯烃二联合车间-碳四装置（醚化装置3、丁二烯装置2）.jpg', '车间', '醚化装置、丁二烯装置', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('19', '乙烯厂净化水联合车间-净化水场10.jpg', '车间', '净化水场', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('20', '乙烯厂净化水联合车间-固废处理场、废碱氧化装置.jpg', '车间', '固废处理装置', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('21', '1.jpg', '区域', '库房', null, null, null);
INSERT INTO `tb_gisimagelist` VALUES ('22', '1.jpg', '车间', '催化车间', '炼油厂', '催化车间', '');
INSERT INTO `tb_gisimagelist` VALUES ('23', '1.jpg', '区域', 'I催化装置', '炼油厂', '催化车间', 'Ⅰ催化装置');

-- ----------------------------
-- Table structure for tb_gisplantdata
-- ----------------------------
DROP TABLE IF EXISTS `tb_gisplantdata`;
CREATE TABLE `tb_gisplantdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentImageId` int(11) DEFAULT NULL,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `factoryId` varchar(100) DEFAULT NULL,
  `axisLeft` int(11) DEFAULT NULL,
  `axisRight` int(11) DEFAULT NULL,
  `axisTop` int(11) DEFAULT NULL,
  `axisBottom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_gisplantdata
-- ----------------------------
INSERT INTO `tb_gisplantdata` VALUES ('31', '21', 'G-4', '阻垢剂罐', 'Ⅰ催化装置', '催化车间', '炼油厂', '216', '299', '176', '218');
INSERT INTO `tb_gisplantdata` VALUES ('32', '21', 'G-8', '废锅水封罐', 'Ⅰ催化装置', '催化车间', '炼油厂', '324', '365', '129', '154');
INSERT INTO `tb_gisplantdata` VALUES ('33', '21', 'G-5', '污油罐', 'Ⅰ催化装置', '催化车间', '炼油厂', '285', '326', '210', '236');

-- ----------------------------
-- Table structure for tb_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `tb_guestbook`;
CREATE TABLE `tb_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL COMMENT '留言者姓名',
  `email` varchar(100) NOT NULL COMMENT '留言者邮箱',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `msg` text NOT NULL COMMENT '留言内容',
  `createtime` datetime NOT NULL COMMENT '留言时间',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '留言状态，1：正常，0：删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表';

-- ----------------------------
-- Records of tb_guestbook
-- ----------------------------

-- ----------------------------
-- Table structure for tb_links
-- ----------------------------
DROP TABLE IF EXISTS `tb_links`;
CREATE TABLE `tb_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT NULL COMMENT '链接与网站的关系',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of tb_links
-- ----------------------------

-- ----------------------------
-- Table structure for tb_measurethicknessrecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_measurethicknessrecord`;
CREATE TABLE `tb_measurethicknessrecord` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '关联原始測厚信息',
  `workshopId` varchar(100) DEFAULT NULL,
  `Mea_dt` varchar(20) DEFAULT NULL COMMENT '测厚日期',
  `Record_dt` varchar(20) DEFAULT NULL,
  `isWallMea` tinyint(8) DEFAULT NULL COMMENT '是否进行了壁板測厚',
  `isBottomMea` tinyint(8) DEFAULT NULL COMMENT '是否进行了底板測厚',
  `isTopMea` tinyint(8) DEFAULT NULL COMMENT '是否进行了顶板測厚',
  `Mea_username` varchar(50) DEFAULT NULL COMMENT '测厚人',
  `Record_username` varchar(50) DEFAULT NULL COMMENT '记录人',
  `record_remark` varchar(300) DEFAULT NULL,
  `handleId` int(11) DEFAULT NULL,
  `handler` varchar(100) DEFAULT NULL,
  `handleType` varchar(100) DEFAULT NULL,
  `HandleDate` varchar(100) DEFAULT NULL,
  `verifier` varchar(100) DEFAULT NULL,
  `verifierLevel` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(10) DEFAULT '否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_measurethicknessrecord
-- ----------------------------

-- ----------------------------
-- Table structure for tb_measurethicknessrecord_origin
-- ----------------------------
DROP TABLE IF EXISTS `tb_measurethicknessrecord_origin`;
CREATE TABLE `tb_measurethicknessrecord_origin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `measureDate` varchar(20) DEFAULT NULL COMMENT '测厚日期',
  `recordDate` varchar(20) DEFAULT NULL,
  `measureUserName` varchar(50) DEFAULT NULL COMMENT '测厚人',
  `recordUserName` varchar(50) DEFAULT NULL COMMENT '记录人',
  `topThickness1` varchar(20) DEFAULT NULL,
  `topThickness2` varchar(20) DEFAULT NULL,
  `topThickness3` varchar(20) DEFAULT NULL,
  `topThickness4` varchar(20) DEFAULT NULL,
  `topThickness5` varchar(20) DEFAULT NULL,
  `topThickness6` varchar(20) DEFAULT NULL,
  `bottomEdgeThickness1` varchar(20) DEFAULT NULL,
  `bottomEdgeThickness2` varchar(20) DEFAULT NULL,
  `bottomEdgeThickness3` varchar(20) DEFAULT NULL,
  `bottomMiddleThickness1` varchar(20) DEFAULT NULL,
  `bottomMiddleThickness2` varchar(20) DEFAULT NULL,
  `bottomMiddleThickness3` varchar(20) DEFAULT NULL,
  `wallPointFigPath` varchar(100) DEFAULT NULL,
  `bottomPointFigPath` varchar(100) DEFAULT NULL,
  `topPointFigPath` varchar(100) DEFAULT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `handleId` int(20) DEFAULT NULL,
  `handler` varchar(100) DEFAULT NULL,
  `handleType` varchar(100) DEFAULT NULL,
  `HandleDate` varchar(100) DEFAULT NULL,
  `verifier` varchar(100) DEFAULT NULL,
  `verufierLevel` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_measurethicknessrecord_origin
-- ----------------------------

-- ----------------------------
-- Table structure for tb_measurethicknessrecord_wall
-- ----------------------------
DROP TABLE IF EXISTS `tb_measurethicknessrecord_wall`;
CREATE TABLE `tb_measurethicknessrecord_wall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gpid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL COMMENT '连接到某台储罐的測厚信息',
  `layerPid` int(11) DEFAULT NULL COMMENT '测点父id，用于确定同一测点的腐蚀速率变化，长期腐蚀速率和短期腐蚀速率等数据',
  `layerGpid` int(11) DEFAULT NULL COMMENT '壁板层号父节点',
  `part` int(11) DEFAULT NULL,
  `layerNO` int(11) DEFAULT NULL COMMENT '壁板序号',
  `layerId` varchar(20) DEFAULT NULL COMMENT '测点编号',
  `thickness` varchar(20) DEFAULT NULL COMMENT '测量厚度',
  `Mea_dt` varchar(20) DEFAULT NULL,
  `Last_Thickness` varchar(20) DEFAULT NULL COMMENT '上次实测厚度',
  `Last_Mea_dt` varchar(20) DEFAULT NULL COMMENT '上次测厚日期',
  `namelyThickness` varchar(20) DEFAULT NULL COMMENT '名义厚度',
  `short_termCorrosion` varchar(50) DEFAULT NULL COMMENT '短期腐蚀速率',
  `long_termCorrosion` varchar(50) DEFAULT NULL COMMENT '长期腐蚀速率',
  `thicknessType` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_measurethicknessrecord_wall
-- ----------------------------

-- ----------------------------
-- Table structure for tb_measurethicknessrecord_wall_origin
-- ----------------------------
DROP TABLE IF EXISTS `tb_measurethicknessrecord_wall_origin`;
CREATE TABLE `tb_measurethicknessrecord_wall_origin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(20) DEFAULT NULL,
  `layerPid` int(20) DEFAULT NULL COMMENT '用于确定设备的唯一测点',
  `layerId` varchar(100) DEFAULT NULL COMMENT '圈板编号',
  `layerNO` int(11) DEFAULT NULL COMMENT '圈板序号',
  `part` int(11) DEFAULT NULL COMMENT '测点的某个部位',
  `thickness` varchar(20) DEFAULT NULL,
  `thicknessDate` varchar(20) DEFAULT NULL,
  `thicknessOrigin` varchar(20) DEFAULT NULL COMMENT '原始測厚厚度',
  `thicknessType` varchar(100) DEFAULT NULL,
  `useDate` varchar(20) DEFAULT NULL,
  `short_termCorrosion` varchar(50) DEFAULT NULL COMMENT '短期腐蚀速率',
  `long_termCorrosion` varchar(50) DEFAULT NULL COMMENT '长期腐蚀速率',
  `thicknessOriginDate` varchar(20) DEFAULT NULL COMMENT '原始測厚日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_measurethicknessrecord_wall_origin
-- ----------------------------

-- ----------------------------
-- Table structure for tb_meathicknesslist
-- ----------------------------
DROP TABLE IF EXISTS `tb_meathicknesslist`;
CREATE TABLE `tb_meathicknesslist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `layerCount` varchar(20) DEFAULT NULL,
  `LastMeasuring_dt` varchar(20) DEFAULT NULL,
  `verifier` varchar(100) DEFAULT NULL,
  `verifierLevel` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_meathicknesslist
-- ----------------------------

-- ----------------------------
-- Table structure for tb_mission
-- ----------------------------
DROP TABLE IF EXISTS `tb_mission`;
CREATE TABLE `tb_mission` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '提醒内容',
  `setDate` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `setterId` int(11) DEFAULT NULL,
  `setter` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `startDate` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '任务设置时间',
  `circle` int(20) DEFAULT NULL COMMENT '提醒周期',
  `nextDate` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '下次提醒时间',
  `status` int(11) DEFAULT '1',
  `remark` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_mission
-- ----------------------------
INSERT INTO `tb_mission` VALUES ('4', '储罐巡检', '2016-10-29', '13', 'user4', '2016-10-29', '3', '2016-11-29', '1', '测试1');
INSERT INTO `tb_mission` VALUES ('5', '储罐检修', '2016-10-30', '13', '张四', '2016-10-30', '1', '2016-11-30', '1', '');
INSERT INTO `tb_mission` VALUES ('12', '储罐巡检4', '2016-10-30', '13', '张四', '2016-08-03', '2', '2016-11-30', '1', '');
INSERT INTO `tb_mission` VALUES ('13', '储罐巡检4', '2016-10-30', '13', '张四', '2016-08-03', '2', '2016-11-30', '1', '');

-- ----------------------------
-- Table structure for tb_node
-- ----------------------------
DROP TABLE IF EXISTS `tb_node`;
CREATE TABLE `tb_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_node
-- ----------------------------
INSERT INTO `tb_node` VALUES ('1', 'Home', '前台页面', '1', '测试1', '1', '0', '1');
INSERT INTO `tb_node` VALUES ('22', 'RiskCalculation', '风险分析', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('21', 'MaintenanceRecord', '维修记录管理', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('20', 'InspectRecord', '检验记录管理', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('18', 'DailyManagement', '日常维护管理', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('17', 'Inspect', '定点测厚数据', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('16', 'Manage', '常压储罐基本信息', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('15', 'Visualization', '可视化管理', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('14', 'Admin', '后台管理', '1', '', '1', '0', '1');
INSERT INTO `tb_node` VALUES ('23', 'RiskStatistics', '风险统计', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('25', 'AlertRecordManage', '报警信息管理', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('26', 'Add', '新增', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('27', 'Delete', '删除', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('29', 'Edit', '编辑', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('30', 'Select', '查询', '1', '', '3', '22', '3');
INSERT INTO `tb_node` VALUES ('31', 'Import', '导入', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('32', 'Export', '导出', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('36', 'Add', '新增', '1', '', '3', '22', '3');
INSERT INTO `tb_node` VALUES ('37', 'Delete', '删除', '1', '', '3', '22', '3');
INSERT INTO `tb_node` VALUES ('38', 'Edit', '编辑', '1', '', '3', '22', '3');
INSERT INTO `tb_node` VALUES ('39', 'Import', '导入', '1', '', '3', '22', '3');
INSERT INTO `tb_node` VALUES ('40', 'Export', '导出', '1', '', '3', '22', '3');
INSERT INTO `tb_node` VALUES ('41', 'Add', '新增', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('42', 'Delete', '删除', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('43', 'Edit', '编辑', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('44', 'Select', '查询', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('45', 'Import', '导入', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('46', 'Export', '导出', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('47', 'Add', '新增', '1', '', '0', '20', '3');
INSERT INTO `tb_node` VALUES ('48', 'Delete', '删除', '1', '', '0', '20', '3');
INSERT INTO `tb_node` VALUES ('49', 'Edit', '编辑', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('51', 'Select', '查询', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('52', 'Import', '导入', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('53', 'Export', '导出', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('54', 'Detail', '详细', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('55', 'Save', '保存', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('58', 'Verified', '审核', '1', '', '3', '22', '3');
INSERT INTO `tb_node` VALUES ('59', 'Verified', '审核', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('60', 'Verified', '审核', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('61', 'Add', '新增', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('62', 'Delete', '删除', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('63', 'Edit', '编辑', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('64', 'Select', '查询', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('65', 'Import', '导入', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('66', 'Export', '导出', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('67', 'Verified', '审核', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('68', 'Add', '新增', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('69', 'Delete', '删除', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('70', 'Edit', '编辑', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('71', 'Select', '查询', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('72', 'Import', '导入', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('73', 'Export', '导出', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('74', 'Verified', '审核', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('75', 'Verified', '审核', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('76', 'Add', '新增', '1', '', '3', '23', '3');
INSERT INTO `tb_node` VALUES ('77', 'Delete', '删除', '1', '', '3', '23', '3');
INSERT INTO `tb_node` VALUES ('78', 'Edit', '编辑', '1', '', '3', '23', '3');
INSERT INTO `tb_node` VALUES ('79', 'Select', '查询', '1', '', '3', '23', '3');
INSERT INTO `tb_node` VALUES ('80', 'Import', '导入', '1', '', '3', '23', '3');
INSERT INTO `tb_node` VALUES ('81', 'Export', '导出', '1', '', '3', '23', '3');
INSERT INTO `tb_node` VALUES ('82', 'Verified', '审核', '1', '', '3', '23', '3');
INSERT INTO `tb_node` VALUES ('83', 'Add', '新增', '1', '', '3', '25', '3');
INSERT INTO `tb_node` VALUES ('84', 'Delete', '删除', '1', '', '3', '25', '3');
INSERT INTO `tb_node` VALUES ('85', 'Edit', '编辑', '1', '', '3', '25', '3');
INSERT INTO `tb_node` VALUES ('86', 'Select', '查询', '1', '', '3', '25', '3');
INSERT INTO `tb_node` VALUES ('87', 'Import', '导入', '1', '', '3', '25', '3');
INSERT INTO `tb_node` VALUES ('89', 'Export', '导出', '1', '', '3', '25', '3');
INSERT INTO `tb_node` VALUES ('90', 'Verified', '审核', '1', '', '3', '25', '3');
INSERT INTO `tb_node` VALUES ('91', 'Download', '下载', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('92', 'Read', '查看', '1', '', '3', '16', '3');
INSERT INTO `tb_node` VALUES ('93', 'Read', '详细', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('94', 'Save', '保存', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('95', 'Download', '下载', '1', '', '3', '17', '3');
INSERT INTO `tb_node` VALUES ('98', 'Add', '新增', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('97', 'RunRecord', '运行记录管理', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('99', 'Delete', '删除', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('100', 'Edit', '编辑', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('101', 'Select', '查询', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('102', 'Detail', '详细', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('103', 'Import', '导入', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('104', 'Export', '导出', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('105', 'Verified', '审核', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('106', 'Download', '下载', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('107', 'Save', '保存', '1', '', '3', '97', '3');
INSERT INTO `tb_node` VALUES ('108', 'Detail', '详细', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('109', 'Download', '下载', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('110', 'Save', '保存', '1', '', '3', '18', '3');
INSERT INTO `tb_node` VALUES ('111', 'Detail', '详细', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('112', 'Detail', '详细', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('113', 'Save', '保存', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('114', 'Save', '保存', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('115', 'Download', '下载', '1', '', '3', '20', '3');
INSERT INTO `tb_node` VALUES ('116', 'Download', '下载', '1', '', '3', '21', '3');
INSERT INTO `tb_node` VALUES ('117', 'Schedule', '待办事项', '1', '', '2', '1', '2');
INSERT INTO `tb_node` VALUES ('118', 'Add', '新增', '1', '', '3', '117', '3');
INSERT INTO `tb_node` VALUES ('119', 'Delete', '删除', '1', '', '3', '117', '3');
INSERT INTO `tb_node` VALUES ('120', 'Edit', '编辑', '1', '', '3', '117', '3');
INSERT INTO `tb_node` VALUES ('121', 'Select', '查询', '1', '', '3', '117', '3');
INSERT INTO `tb_node` VALUES ('122', 'Detail', '详细', '1', '', '3', '117', '3');
INSERT INTO `tb_node` VALUES ('124', 'Verified', '审核', '1', '', '3', '117', '3');

-- ----------------------------
-- Table structure for tb_plantalarm
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantalarm`;
CREATE TABLE `tb_plantalarm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plantId` int(11) DEFAULT NULL,
  `factoryId` varchar(100) DEFAULT NULL,
  `factoryName` varchar(100) DEFAULT NULL,
  `workshopName` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  `areaName` varchar(100) DEFAULT NULL,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `state` tinyint(20) DEFAULT '1' COMMENT '是否报警解除',
  `addTime` varchar(20) DEFAULT NULL,
  `alarmSource` varchar(100) DEFAULT NULL COMMENT '报警数据来源：附件检测与评价、腐蚀速率',
  `alarmSourceRecord` varchar(100) DEFAULT NULL,
  `alarmSourceRecordId` varchar(100) DEFAULT NULL COMMENT '报警数据来源数据记录ID',
  `remark` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL COMMENT '状态：未处理、已处理',
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `dealAlarm` varchar(300) DEFAULT NULL COMMENT '报警处理',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantalarm
-- ----------------------------
INSERT INTO `tb_plantalarm` VALUES ('10', '28', null, null, null, null, null, null, null, null, '1', '2016-10-25 22:32:22', '运行记录管理', 'RunRecord', '35', null, '1', null, null, '处理成功');
INSERT INTO `tb_plantalarm` VALUES ('11', '486', null, null, null, null, null, null, null, null, '1', '2016-10-26 08:58:43', '运行记录管理', 'RunRecord', '36', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('16', '28', null, null, null, null, null, null, null, null, '1', '2016-10-26 09:55:21', '日常维护管理', 'DailyRecord', '20', null, '1', null, null, '已进行相关处理和操作');
INSERT INTO `tb_plantalarm` VALUES ('17', '486', null, null, null, null, null, null, null, null, '1', '2016-10-26 10:16:53', '日常维护管理', 'DailyRecord', '21', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('19', '488', null, null, null, null, null, null, null, null, '1', '2016-10-26 10:46:19', '检验记录管理', 'InspectRecord', '54', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('20', '28', null, null, null, null, null, null, null, null, '1', '2016-10-27 08:50:47', '检验记录管理', 'InspectRecord', '53', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('21', '28', null, null, null, null, null, null, null, null, '1', '2016-11-15 22:40:43', '运行记录管理', 'RunRecord', '115', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('22', '28', null, null, null, null, null, null, null, null, '1', '2016-11-15 23:59:35', '运行记录管理', 'RunRecord', '114', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('23', '29', null, null, null, null, null, null, null, null, '1', '2016-11-16 00:06:18', '日常维护管理', 'DailyRecord', '24', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('24', '29', null, null, null, null, null, null, null, null, '1', '2016-11-16 00:12:20', '检验记录管理', 'InspectRecord', '61', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('25', '30', null, null, null, null, null, null, null, null, '1', '2016-11-16 00:12:44', '日常维护管理', 'DailyRecord', '27', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('26', '537', null, null, null, null, null, null, null, null, '1', '2016-11-18 15:23:11', '风险计算结果', 'RiskListRecord', '691', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('27', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:09:33', '风险计算结果', 'RiskListRecord', '699', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('28', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:09:35', '风险计算结果', 'RiskListRecord', '707', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('29', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:11:51', '风险计算结果', 'RiskListRecord', '715', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('30', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:12:05', '风险计算结果', 'RiskListRecord', '723', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('31', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:12:43', '风险计算结果', 'RiskListRecord', '731', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('32', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:12:46', '风险计算结果', 'RiskListRecord', '739', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('33', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:12:53', '风险计算结果', 'RiskListRecord', '747', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('34', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:12:56', '风险计算结果', 'RiskListRecord', '755', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('35', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:14:32', '风险计算结果', 'RiskListRecord', '763', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('36', '537', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:14:36', '风险计算结果', 'RiskListRecord', '771', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('37', '28', null, null, null, null, null, null, null, null, '1', '2016-11-19 10:35:27', '风险计算结果', 'RiskListRecord', '778', null, '0', null, null, null);
INSERT INTO `tb_plantalarm` VALUES ('38', '532', null, null, null, null, null, null, null, null, '1', '2016-11-21 10:08:15', '运行记录管理', 'RunRecord', '117', null, '0', null, null, null);

-- ----------------------------
-- Table structure for tb_plantchangerecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantchangerecord`;
CREATE TABLE `tb_plantchangerecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId_old` varchar(100) DEFAULT NULL,
  `workshopId_old` varchar(100) DEFAULT NULL,
  `areaId_old` varchar(100) DEFAULT NULL,
  `plantNO_old` varchar(100) DEFAULT NULL,
  `plantName_old` varchar(100) DEFAULT NULL,
  `factoryId_new` varchar(100) DEFAULT NULL,
  `workshopId_new` varchar(100) DEFAULT NULL,
  `areaId_new` varchar(100) DEFAULT NULL,
  `plantNO_new` varchar(100) DEFAULT NULL,
  `plantName_new` varchar(100) DEFAULT NULL,
  `recordDate` varchar(100) DEFAULT NULL,
  `recorder` varchar(100) DEFAULT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantchangerecord
-- ----------------------------
INSERT INTO `tb_plantchangerecord` VALUES ('2', '炼油厂', '催化车间', 'Ⅰ催化装置', 'G-4', '阻垢剂罐', '炼油厂', '催化车间', 'Ⅰ催化装置', 'G-4', 'G-4', '2016年2月19日', '222', '', '设备主管', '审核通过');
INSERT INTO `tb_plantchangerecord` VALUES ('3', '炼油厂', '国储公司', '140万方原油商业储备库', '00608-T-001#', '金属油罐', '炼油厂', '催化车间', 'Ⅰ催化装置', '00608-T-001#', '00608-T-001#', '2016年2月19日', '111', '111', '设备员', '未提交');

-- ----------------------------
-- Table structure for tb_plantcheckitem
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantcheckitem`;
CREATE TABLE `tb_plantcheckitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantcheckitem
-- ----------------------------
INSERT INTO `tb_plantcheckitem` VALUES ('1', '罐顶有无变形');
INSERT INTO `tb_plantcheckitem` VALUES ('2', '罐壁有无变形');
INSERT INTO `tb_plantcheckitem` VALUES ('3', '罐体底部角焊缝完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('4', '罐体基础及散水坡完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('5', '防火堤及隔堤完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('6', '防雷防静电设施测试及完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('7', '罐顶罐壁测厚测试结果');
INSERT INTO `tb_plantcheckitem` VALUES ('8', '呼吸阀等安全附件运行及检查情况');
INSERT INTO `tb_plantcheckitem` VALUES ('9', '液位、温度测量系统运行及完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('10', '罐体内涂层、外油漆完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('11', '罐体保温完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('12', '外加电流阴极保护设施完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('13', '消防设施运行及完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('14', '浮顶罐福鼎/浮舱密封性能完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('15', '浮顶罐转动浮梯、导向装置完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('16', '浮顶罐浮顶排水装置完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('17', '浮顶罐灌顶(罐壁)通气孔等完好情况');
INSERT INTO `tb_plantcheckitem` VALUES ('18', '其它1');
INSERT INTO `tb_plantcheckitem` VALUES ('19', '其它2');
INSERT INTO `tb_plantcheckitem` VALUES ('20', '其它3');

-- ----------------------------
-- Table structure for tb_plantcleanrecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantcleanrecord`;
CREATE TABLE `tb_plantcleanrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `recordDate` varchar(20) DEFAULT NULL,
  `recorder` varchar(100) DEFAULT NULL,
  `cleanMethod` varchar(300) DEFAULT NULL,
  `cleanCompany` varchar(200) DEFAULT NULL,
  `constructType` varchar(100) DEFAULT NULL COMMENT '施工类别',
  `constructCompany` varchar(100) DEFAULT NULL COMMENT '施工单位',
  `beginDate` varchar(20) DEFAULT NULL,
  `endDate` varchar(20) DEFAULT NULL,
  `checkResult` varchar(100) DEFAULT NULL COMMENT '验收结果',
  `checkRemark` varchar(100) DEFAULT NULL COMMENT '验收备注',
  `constructContent` varchar(300) DEFAULT NULL COMMENT '施工内容',
  `remark` varchar(300) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantcleanrecord
-- ----------------------------
INSERT INTO `tb_plantcleanrecord` VALUES ('1', '炼油厂', '催化车间', 'Ⅰ催化装置', 'G-4', '阻垢剂罐', '2016年2月19日', '111', '111', '清洗单位1', '施工类别1', '施工单位1', '2016年2月19日', '2016年2月19日', '验收通过', '', '111', '111', '设备主管', '未审核');
INSERT INTO `tb_plantcleanrecord` VALUES ('2', '炼油厂', '催化车间', '气分装置', '234525/', '尾气脱臭罐', '2016年4月13日', '', '', '清洗单位1', '施工类别1', '施工单位1', '2016年4月13日', '2016年4月13日', '验收通过', '', '', '', '设备员', '未提交');

-- ----------------------------
-- Table structure for tb_plantdailymaintainance
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantdailymaintainance`;
CREATE TABLE `tb_plantdailymaintainance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `lastCheckDate` varchar(20) DEFAULT NULL,
  `lastCheckType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantdailymaintainance
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantdailymaintainancedetail
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantdailymaintainancedetail`;
CREATE TABLE `tb_plantdailymaintainancedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `checkType` varchar(20) DEFAULT NULL,
  `checkTypeDetail` varchar(20) DEFAULT NULL,
  `checkItem` varchar(100) DEFAULT NULL,
  `checkResult` varchar(20) DEFAULT NULL COMMENT '整改措施',
  `checkManage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantdailymaintainancedetail
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantdailymaintainancerecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantdailymaintainancerecord`;
CREATE TABLE `tb_plantdailymaintainancerecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `factoryId` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `maintainanceArea` varchar(100) DEFAULT NULL,
  `maintainanceUser` varchar(100) DEFAULT NULL COMMENT '记录人',
  `maintainanceDate` varchar(20) DEFAULT NULL COMMENT '记录日期',
  `maintainanceNextDate` varchar(20) DEFAULT NULL COMMENT '下次检查日期',
  `maintainanceType` varchar(20) DEFAULT NULL,
  `project` varchar(100) DEFAULT NULL COMMENT '检查人',
  `remark` varchar(300) DEFAULT NULL,
  `handleId` int(11) DEFAULT NULL,
  `handler` varchar(20) DEFAULT NULL,
  `handleType` varchar(20) DEFAULT NULL,
  `HandleDate` varchar(20) DEFAULT NULL,
  `verifier` varchar(100) DEFAULT NULL,
  `verifierLevel` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(20) DEFAULT NULL,
  `alramRemark` varchar(255) DEFAULT NULL,
  `isAlarm` tinyint(20) DEFAULT '0' COMMENT '是否报警',
  `isShowAlarm` tinyint(20) DEFAULT '1' COMMENT '0表示显示报警 1表示不显示报警',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantdailymaintainancerecord
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantexceptionchangerecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantexceptionchangerecord`;
CREATE TABLE `tb_plantexceptionchangerecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `recorder` varchar(100) DEFAULT NULL COMMENT '记录人',
  `recordDate` varchar(20) DEFAULT NULL COMMENT '记录日期',
  `description` varchar(300) DEFAULT NULL COMMENT '检查人',
  `remark` varchar(300) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantexceptionchangerecord
-- ----------------------------
INSERT INTO `tb_plantexceptionchangerecord` VALUES ('1', '乙烯厂', '制氢车间', '制氢装置', 'F0305', '', '1', '2016年3月15日', '1', '1', '超级管理员', '审核通过', null);
INSERT INTO `tb_plantexceptionchangerecord` VALUES ('2', '炼油厂', '原料车间', '原料北罐区', 'H-4#', '常压储罐', '11', '2016年3月15日', '11', '11', '设备主管', '未审核', null);
INSERT INTO `tb_plantexceptionchangerecord` VALUES ('3', '炼油厂', '原料车间', '原料北罐区', 'H-4#', '常压储罐', '44', '2016年3月15日', '11', '44', '设备员', '未提交 ', null);
INSERT INTO `tb_plantexceptionchangerecord` VALUES ('4', '炼油厂', '原料车间', '原料北罐区', 'H-4#', '常压储罐', 'ff', '2016年3月15日', 'ff', 'ff', '设备主管', '未审核', null);

-- ----------------------------
-- Table structure for tb_plantfaultrecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantfaultrecord`;
CREATE TABLE `tb_plantfaultrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` varchar(100) DEFAULT NULL,
  `workshopId` varchar(100) DEFAULT NULL,
  `areaId` varchar(100) DEFAULT NULL,
  `plantId` varchar(100) DEFAULT NULL,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `faultDesc` varchar(255) DEFAULT NULL COMMENT '问题描述',
  `findDate` varchar(20) DEFAULT NULL COMMENT '发现时间',
  `method` varchar(255) DEFAULT NULL COMMENT '整改措施',
  `result` varchar(255) DEFAULT NULL COMMENT '整改结果',
  `solveDate` varchar(20) DEFAULT NULL COMMENT '整改时间',
  `solveUserName` varchar(100) DEFAULT NULL COMMENT '整改负责人',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `attachFile` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantfaultrecord
-- ----------------------------
INSERT INTO `tb_plantfaultrecord` VALUES ('4', '炼油厂', '催化车间', 'Ⅰ催化装置', '', 'G-4', '阻垢剂罐', '1', '2016-01-03', '1', '1', '2016-01-03', '1', '', '2015湖南高中招生人数统计.txt', '设备员', '未提交', '否');
INSERT INTO `tb_plantfaultrecord` VALUES ('5', '炼油厂', '催化车间', 'Ⅰ催化装置', '', 'G-4', '阻垢剂罐', '', '2016-02-23', '', '', '2016-02-23', '', '', '', '设备员', '未提交', '否');
INSERT INTO `tb_plantfaultrecord` VALUES ('6', '炼油厂', '催化车间', 'Ⅰ催化装置', '', 'G-4', '阻垢剂罐', '', '2016-02-23', '', '', '2016-02-23', '', '', '', '设备员', '未提交', '否');
INSERT INTO `tb_plantfaultrecord` VALUES ('7', '炼油厂', '催化车间', 'Ⅰ催化装置', '', 'G-4', '阻垢剂罐', '', '2016-03-04', '', '', '2016-03-04', '', '', '', '设备员', '未提交', '否');
INSERT INTO `tb_plantfaultrecord` VALUES ('8', '炼油厂', '催化车间', 'Ⅰ催化装置', '', 'G-4', '阻垢剂罐', '', '2016-03-04', '', '', '2016-03-04', '', '', '', '设备员', '未提交', '否');

-- ----------------------------
-- Table structure for tb_plantinfo
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantinfo`;
CREATE TABLE `tb_plantinfo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `factoryId` varchar(100) DEFAULT NULL COMMENT '分厂',
  `workshopId` varchar(100) DEFAULT NULL COMMENT '车间',
  `areaId` varchar(100) DEFAULT NULL COMMENT '区域',
  `plantNO` varchar(100) DEFAULT NULL COMMENT '设备位号',
  `plantName` varchar(100) DEFAULT NULL COMMENT '设备名称',
  `ERPPlantType` varchar(100) DEFAULT NULL COMMENT 'ERP设备分类',
  `PlantType` varchar(100) DEFAULT NULL COMMENT '储罐类型',
  `IsMainPlant` tinyint(8) DEFAULT NULL COMMENT '是否主要设备',
  `isMaintainAsRequired` tinyint(8) DEFAULT NULL COMMENT '是否按照要求维护（是/否）',
  `OilTankType` varchar(100) DEFAULT NULL COMMENT '油罐类型',
  `V` varchar(8) DEFAULT NULL COMMENT '公称容量',
  `S` varchar(8) DEFAULT NULL COMMENT '平均截面积',
  `D` varchar(8) DEFAULT NULL COMMENT '油罐直径',
  `H` varchar(8) DEFAULT NULL COMMENT '罐体高度',
  `W` varchar(8) DEFAULT NULL COMMENT '储罐重量',
  `breakSize` varchar(20) DEFAULT NULL COMMENT '破裂口尺寸',
  `fillH` varchar(8) DEFAULT NULL COMMENT '安全填充高度',
  `designTemp` varchar(20) DEFAULT NULL COMMENT '设计温度',
  `operateTemp` varchar(20) DEFAULT NULL COMMENT '操作温度',
  `designPresure` varchar(20) DEFAULT NULL COMMENT '设计压力',
  `operatePresure` varchar(20) DEFAULT NULL COMMENT '操作压力',
  `tankFoundationSettlement` varchar(100) DEFAULT NULL COMMENT '储罐基础',
  `fMatCost_` varchar(20) DEFAULT NULL COMMENT '材料价格系数',
  `storeMedium` varchar(100) DEFAULT NULL COMMENT '储存介质',
  `mediumpH` varchar(20) DEFAULT NULL COMMENT '介质ph值',
  `mediumPercentage` varchar(8) DEFAULT NULL COMMENT '介质比重',
  `isMediumWater` tinyint(8) DEFAULT NULL COMMENT '介质含水',
  `mediumPoison` varchar(20) DEFAULT NULL COMMENT '介质毒性',
  `mediumFire` varchar(20) DEFAULT NULL COMMENT '介质火灾危险性',
  `mediumDyViscosity` varchar(20) DEFAULT NULL COMMENT '介质动力粘度系数',
  `mediumC` varchar(100) DEFAULT NULL COMMENT '介质碳原子数',
  `mantenanceBasis` varchar(100) DEFAULT NULL COMMENT '维修设计依据',
  `sensitiveEnvironment` varchar(20) DEFAULT NULL COMMENT '环境敏感性',
  `soilFoundation` varchar(100) DEFAULT NULL COMMENT '储罐基础土壤',
  `geographyEnvironment` varchar(100) DEFAULT NULL COMMENT '地理环境',
  `sealType` varchar(100) DEFAULT NULL COMMENT '储罐密封形式',
  `measureAdminType` varchar(100) DEFAULT NULL COMMENT '计量管理类别',
  `useDate` varchar(100) DEFAULT NULL COMMENT '投用日期',
  `useStatus` varchar(100) DEFAULT NULL COMMENT ' 使用状态',
  `techniqueStatus` varchar(100) DEFAULT NULL COMMENT '技术状况',
  `designCompany` varchar(100) DEFAULT NULL COMMENT '设计单位',
  `designStandard` varchar(100) DEFAULT NULL COMMENT '设计规范',
  `installCompany` varchar(100) DEFAULT NULL COMMENT '安装单位',
  `installDate` varchar(100) DEFAULT NULL COMMENT '安装日期',
  `installStandard` varchar(100) DEFAULT NULL COMMENT '安装规范',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `checkDate` varchar(20) DEFAULT NULL COMMENT '检查日期',
  `nextCheckDate` varchar(20) DEFAULT NULL COMMENT '下次检查日期',
  `yearCheckDate` varchar(20) DEFAULT NULL COMMENT '年度检查日期',
  `nextYearCheckDate` varchar(20) DEFAULT NULL COMMENT '下次年度检查日期',
  `checkCompany` varchar(100) DEFAULT NULL COMMENT '检查单位',
  `topThickness` varchar(8) DEFAULT NULL COMMENT '顶板厚度',
  `topMaterial` varchar(100) DEFAULT NULL COMMENT '顶板材质',
  `topStyle` varchar(100) DEFAULT NULL COMMENT '罐顶形式',
  `isTopKeepWarm` tinyint(8) DEFAULT NULL COMMENT '罐顶是否保温',
  `topKeepWarmStatus` varchar(20) DEFAULT NULL COMMENT '顶板保温状况',
  `topKeepWarmUseDate` varchar(20) DEFAULT NULL COMMENT '顶板保温安装时间',
  `topKeepWarmMaterial` varchar(100) DEFAULT NULL COMMENT '顶板保温材料',
  `topKeepWarmThickness` varchar(8) DEFAULT NULL COMMENT '顶板保温厚度',
  `isTopCoating` tinyint(8) DEFAULT NULL COMMENT '是否有顶板涂层',
  `topCoatingStatus` varchar(20) DEFAULT NULL COMMENT '顶板涂层质量',
  `topCoatingUseDate` varchar(20) DEFAULT NULL COMMENT '顶板涂层涂装时间',
  `topUseDate` varchar(20) DEFAULT NULL COMMENT '顶板投用日期',
  `topReplaceDate` varchar(20) DEFAULT NULL COMMENT '顶板更换时间',
  `topOnceSealType` varchar(100) DEFAULT NULL COMMENT '顶板一次密封型式',
  `isTopSecondSeal` tinyint(8) DEFAULT NULL COMMENT '是否二次密封',
  `topStartHeight` varchar(20) DEFAULT NULL COMMENT '顶板起浮高度',
  `wallboardLinkType` varchar(100) DEFAULT NULL COMMENT '壁板连接型式',
  `wallboardWeldCoefficient` varchar(100) DEFAULT NULL COMMENT '焊缝系数',
  `wallboardMaterial` varchar(100) DEFAULT NULL COMMENT '罐壁板材质',
  `wallboardOutsideErosionType` varchar(100) DEFAULT NULL COMMENT '壁板外侧腐蚀类型',
  `wallboardProductSideErosionType` varchar(100) DEFAULT NULL COMMENT '壁板产品侧腐蚀类型',
  `isWallboardKeepWarm` tinyint(8) DEFAULT NULL COMMENT '壁板是否有安装保温层',
  `wallboardKeepWarmStatus` varchar(20) DEFAULT NULL COMMENT '壁板保温层状况',
  `wallboardKeepWarmUseDate` varchar(20) DEFAULT NULL COMMENT '壁板保温的安装时间',
  `isWallboardLining` tinyint(8) DEFAULT NULL COMMENT '壁板是否安装衬里',
  `wallboardLiningStatus` varchar(20) DEFAULT NULL COMMENT '壁板衬里质量',
  `wallboardLiningUseDate` varchar(20) DEFAULT NULL COMMENT '壁板衬里安装时间',
  `isWallboardCoating` tinyint(8) DEFAULT NULL COMMENT '壁板是否涂层',
  `wallboardCoatingStatus` varchar(20) DEFAULT NULL COMMENT '壁板涂层质量',
  `wallboardCoatingUseDate` varchar(20) DEFAULT NULL COMMENT '壁板涂层涂装日期',
  `isWallboardInstallHeater` tinyint(8) DEFAULT NULL COMMENT '壁板安装加热器',
  `wallboardHeaterType` varchar(100) DEFAULT NULL COMMENT '壁板加热器型式',
  `isHeatTreatAfterWeld` varchar(8) DEFAULT NULL COMMENT '焊后热处理',
  `bottomNamelyThickness` varchar(8) DEFAULT NULL COMMENT '罐底（中幅）板名义厚度',
  `layerCount` varchar(4) DEFAULT NULL COMMENT '圈板数',
  `bottomMaterial` varchar(100) DEFAULT NULL COMMENT '罐底（中幅）板材质',
  `isBottomInstallHeater` tinyint(8) DEFAULT NULL COMMENT '底板安装加热器',
  `bottomHeaterType` varchar(100) DEFAULT NULL COMMENT '底板加热器型式',
  `bottomCathodeProtect` varchar(100) DEFAULT NULL COMMENT '阴极保护',
  `bottomCathodeProtectMethod` varchar(200) DEFAULT NULL COMMENT '底板阴极保护方法',
  `bottomSoilResistance` varchar(100) DEFAULT NULL COMMENT '土壤电阻率',
  `isBottomInstallLeakDectect` tinyint(8) DEFAULT NULL COMMENT '设有泄露探测系统',
  `bottomEdgeMaterial` varchar(100) DEFAULT NULL COMMENT '边缘板材料',
  `bottomEdgeMinThickness` varchar(8) DEFAULT NULL COMMENT '边缘板最小厚度',
  `bottomEdgeNamelyThickness` varchar(8) DEFAULT NULL COMMENT '边缘板名义厚度',
  `bottomMiddleMaterial` varchar(100) DEFAULT NULL COMMENT '中幅板材料',
  `bottomMiddleNamelyThickness` varchar(8) DEFAULT NULL COMMENT '中幅板名义厚度',
  `isInstallDewater` tinyint(8) DEFAULT NULL COMMENT '安装排水槽',
  `bottomToWaterDistance` varchar(20) DEFAULT NULL COMMENT '罐底距地下水距离',
  `bottomGasket` varchar(100) DEFAULT NULL COMMENT '衬垫类型(储罐基础形式)',
  `bottomGasketSoil` varchar(20) DEFAULT NULL COMMENT '储罐基础下土壤',
  `bottomType` varchar(100) DEFAULT NULL COMMENT '底板类型',
  `bottomUseDate` varchar(20) DEFAULT NULL COMMENT '底板投用日期',
  `bottomReplaceDate` varchar(20) DEFAULT NULL COMMENT '底板更换日期',
  `bottomRainAbility` varchar(100) DEFAULT NULL COMMENT '雨水排放能力',
  `isBottomCoating` tinyint(8) DEFAULT NULL COMMENT '底板是否涂层',
  `bottomCoatingStatus` varchar(20) DEFAULT NULL,
  `bottomCoatingUseDate` varchar(20) DEFAULT NULL COMMENT '底板涂层质量',
  `isBottomLining` tinyint(8) DEFAULT NULL COMMENT '是否底板有衬里',
  `bottomLiningStatus` varchar(20) DEFAULT NULL COMMENT '底板衬里质量',
  `bottomLiningUseDate` varchar(20) DEFAULT NULL COMMENT '底板衬里安装时间',
  `isBottomInstallFireProtection` tinyint(8) DEFAULT NULL COMMENT '防火堤',
  `bottomLinkType` varchar(100) DEFAULT NULL COMMENT '底板连接类型',
  `ErosionAlarmSpeed` varchar(8) DEFAULT NULL COMMENT '腐蚀报警速率限',
  `bottomBaseEva` varchar(20) DEFAULT NULL COMMENT '罐底基础评价',
  `overflowPercentage` varchar(20) DEFAULT NULL COMMENT '溢出围堰流体比',
  `overflowPercentageIn` varchar(20) DEFAULT NULL COMMENT '溢出围堰但仍在罐区，地表土壤流体比',
  `overflowPercentageOut` varchar(20) DEFAULT NULL COMMENT '溢出围堰但已流到罐区外，地表土壤流体比',
  `thresholdRisk` int(11) DEFAULT '500' COMMENT '风险阈值',
  `stopLoss` varchar(20) DEFAULT NULL COMMENT '停产损失',
  `failConseqenceAccept` varchar(20) DEFAULT NULL COMMENT '失效后果可接受基准',
  `submitterId` int(20) DEFAULT NULL,
  `submitter` varchar(100) DEFAULT NULL COMMENT '记录提交者',
  `submitDate` varchar(20) DEFAULT NULL,
  `handleId` int(20) DEFAULT NULL,
  `handler` varchar(20) DEFAULT NULL COMMENT '记录处理者',
  `handleType` varchar(100) DEFAULT NULL,
  `HandleDate` varchar(20) DEFAULT NULL COMMENT '记录提交日期',
  `verifierId` int(20) DEFAULT NULL,
  `verifier` varchar(100) DEFAULT NULL COMMENT '审核人',
  `verifierLevel` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL COMMENT '审核阶段，包括设备员、设备主管、部门领导，老板',
  `verifyResult` varchar(100) DEFAULT NULL COMMENT '审核结果：包括未审核、审核通过、未审核通过',
  `isDelete` varchar(8) DEFAULT '否' COMMENT '是否删除',
  `isHaveBottomEdge` tinyint(20) DEFAULT NULL COMMENT '是否有底板边缘板',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=552 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantinfo
-- ----------------------------
INSERT INTO `tb_plantinfo` VALUES ('545', '中石化燃料油总公司', '青岛分公司', '罐区一', 'G201', '双盘外浮顶罐', '', null, '1', null, '双浮盘外浮顶罐', '', '', '', '', '', '', '', '', '', '', '', '1', null, '重质原油', '', '', '1', '无易燃性', null, '', 'C0~C16', '无', '高', '高盐土', '热带/海上', '机械密封', 'A', '', '在用', '好', '', '', '', '', '', '', '', '', '', '', '', '', 'Q235-AF', '外浮顶', '1', '3', '', 'Q235-AF', null, null, null, null, '', '', null, null, '', '焊接', '', null, '', '', '1', '3', '', '1', '3', '', '1', '3', '', '1', '表面式加热器', '1', '', null, '', '1', '表面式加热器', '1', '牺牲阳极法', null, '1', 'Q235-AF', '', '', 'Q235-AF', '', null, '', '0', '高盐土', '单底板', '', '', '平时三分之一以上的底板浸在水中', null, '3', '', '1', '3', '', '1', '焊接', '', null, '', '', '', '500', '', '', '16', '王星', '2016-11-21 10:18:44', '16', '王星', '编辑', '2016-11-21 10:21:43', '16', '王星', '1', '设备员', '0', '否', null);
INSERT INTO `tb_plantinfo` VALUES ('546', '中石化燃料油总公司', '江苏分公司', '罐区一', '502', '2000m3内浮顶储罐', '', null, '1', null, '立式内浮顶罐', '', '', '', '', '', '', '', '', '', '', '', '1', null, '重质原油', '', '', '1', '无易燃性', null, '', 'C0~C16', '无', '高', '高盐土', '热带/海上', '机械密封', 'A', '', '在用', '好', '', '', '', '', '', '', '', '', '', '', '', '', 'Q235-AF', '外浮顶', '1', '3', '', 'Q235-AF', null, null, null, null, '', '', null, null, '', '焊接', '', null, '', '', '1', '3', '', '1', '3', '', '1', '3', '', '1', '表面式加热器', '1', '', null, '', '1', '表面式加热器', '1', '牺牲阳极法', null, '1', 'Q235-AF', '', '', 'Q235-AF', '', null, '', '0', '高盐土', '单底板', '', '', '平时三分之一以上的底板浸在水中', null, '3', '', '1', '3', '', '1', '焊接', '', null, '', '', '', '500', '', '', '16', '王星', '2016-11-21 10:22:52', '16', '王星', '编辑', '2016-11-21 10:23:09', '16', '王星', '1', '设备员', '0', '否', null);
INSERT INTO `tb_plantinfo` VALUES ('547', '中石化燃料油总公司', '秦皇岛分公司', '罐区一', '102', '1#罐区102#罐', '', null, '1', null, '立式拱顶罐', '', '', '', '', '', '', '', '', '', '', '', '1', null, '重质原油', '', '', '1', '无易燃性', null, '', 'C0~C16', '无', '高', '高盐土', '热带/海上', '机械密封', 'A', '', '在用', '好', '', '', '', '', '', '', '', '', '', '', '', '', 'Q235-AF', '外浮顶', '1', '3', '', 'Q235-AF', null, null, null, null, '', '', null, null, '', '焊接', '', null, '', '', '1', '3', '', '1', '3', '', '1', '3', '', '1', '表面式加热器', '1', '', null, '', '1', '表面式加热器', '1', '牺牲阳极法', null, '1', 'Q235-AF', '', '', 'Q235-AF', '', null, '', '0', '高盐土', '单底板', '', '', '平时三分之一以上的底板浸在水中', null, '3', '', '1', '3', '', '1', '焊接', '', null, '', '', '', '500', '', '', '16', '王星', '2016-11-21 10:24:33', '16', '王星', '编辑', '2016-11-21 10:24:51', '16', '王星', '1', '设备员', '0', '否', null);
INSERT INTO `tb_plantinfo` VALUES ('548', '中石化燃料油总公司', '湛江分公司', '罐区一', 'G101', '储罐', '', null, '1', null, '立式外浮顶罐', '', '', '', '', '', '', '', '', '', '', '', '1', null, '重质原油', '', '', '1', '无易燃性', null, '', 'C0~C16', '无', '高', '高盐土', '热带/海上', '机械密封', 'A', '', '在用', '好', '', '', '', '', '', '', '', '', '', '', '', '', 'Q235-AF', '外浮顶', '1', '3', '', 'Q235-AF', null, null, null, null, '', '', null, null, '', '焊接', '', null, '', '', '1', '3', '', '1', '3', '', '1', '3', '', '1', '表面式加热器', '1', '', null, '', '1', '表面式加热器', '1', '牺牲阳极法', null, '1', 'Q235-AF', '', '', 'Q235-AF', '', null, '', '0', '高盐土', '单底板', '', '', '平时三分之一以上的底板浸在水中', null, '3', '', '1', '3', '', '1', '焊接', '', null, '', '', '', '500', '', '', '16', '王星', '2016-11-21 10:25:32', '16', '王星', '编辑', '2016-11-21 10:25:53', '16', '王星', '1', '设备员', '0', '否', null);
INSERT INTO `tb_plantinfo` VALUES ('549', '中石化燃料油总公司', '高富分公司', '罐区一', 'V-D02', '高富公司储运车间D罐区D02', '', null, '1', null, '立式拱顶罐', '', '', '', '', '', '', '', '', '', '', '', '1', null, '重质原油', '', '', '1', '无易燃性', null, '', 'C0~C16', '无', '高', '高盐土', '热带/海上', '机械密封', 'A', '', '在用', '好', '', '', '', '', '', '', '', '', '', '', '', '', 'Q235-AF', '外浮顶', '1', '3', '', 'Q235-AF', null, null, null, null, '', '', null, null, '', '焊接', '', null, '', '', '1', '3', '', '1', '3', '', '1', '3', '', '1', '表面式加热器', '1', '', null, '', '1', '表面式加热器', '1', '牺牲阳极法', null, '1', 'Q235-AF', '', '', 'Q235-AF', '', null, '', '0', '高盐土', '单底板', '', '', '平时三分之一以上的底板浸在水中', null, '3', '', '1', '3', '', '1', '焊接', '', null, '', '', '', '500', '', '', '16', '王星', '2016-11-21 10:28:36', '16', '王星', '编辑', '2016-11-21 10:28:50', '16', '王星', '1', '设备员', '0', '否', null);
INSERT INTO `tb_plantinfo` VALUES ('550', '中石化燃料油总公司', '温州分公司', '罐区一', 'T303-8', '浮顶罐', '', null, '1', null, '立式内浮顶罐', '', '', '', '', '', '', '', '', '', '', '', '1', null, '重质原油', '', '', '1', '无易燃性', null, '', 'C0~C16', '无', '高', '高盐土', '热带/海上', '机械密封', 'A', '', '在用', '好', '', '', '', '', '', '', '', '', '', '', '', '', 'Q235-AF', '外浮顶', '1', '3', '', 'Q235-AF', null, null, null, null, '', '', null, null, '', '焊接', '', null, '', '', '1', '3', '', '1', '3', '', '1', '3', '', '1', '表面式加热器', '1', '', null, '', '1', '表面式加热器', '1', '牺牲阳极法', null, '1', 'Q235-AF', '', '', 'Q235-AF', '', null, '', '0', '高盐土', '单底板', '', '', '平时三分之一以上的底板浸在水中', null, '3', '', '1', '3', '', '1', '焊接', '', null, '', '', '', '500', '', '', '16', '王星', '2016-11-21 10:29:23', '16', '王星', '编辑', '2016-11-21 10:36:14', '16', '王星', '1', '设备员', '0', '否', null);
INSERT INTO `tb_plantinfo` VALUES ('551', '中石化燃料油总公司', '宁波分公司', '罐区一', 'G101', '双盘式浮顶油罐', '', null, '1', null, '双浮盘外浮顶罐', '', '', '', '', '', '', '', '', '', '', '', '1', null, '重质原油', '', '', '1', '无易燃性', null, '', 'C0~C16', '无', '高', '高盐土', '热带/海上', '机械密封', 'A', '', '在用', '好', '', '', '', '', '', '', '', '', '', '', '', '', 'Q235-AF', '外浮顶', '1', '3', '', 'Q235-AF', null, null, null, null, '', '', null, null, '', '焊接', '', null, '', '', '1', '3', '', '1', '3', '', '1', '3', '', '1', '表面式加热器', '1', '', null, '', '1', '表面式加热器', '1', '牺牲阳极法', null, '1', 'Q235-AF', '', '', 'Q235-AF', '', null, '', '0', '高盐土', '单底板', '', '', '平时三分之一以上的底板浸在水中', null, '3', '', '1', '3', '', '1', '焊接', '', null, '', '', '', '500', '', '', '16', '王星', '2016-11-21 10:31:02', '16', '王星', '编辑', '2016-11-21 10:31:55', '16', '王星', '1', '设备员', '0', '否', null);

-- ----------------------------
-- Table structure for tb_plantinspect
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantinspect`;
CREATE TABLE `tb_plantinspect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `nextTestDate` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantinspect
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantmaintance
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantmaintance`;
CREATE TABLE `tb_plantmaintance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `Last_plantMaintance` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantmaintance
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantmaintancerecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantmaintancerecord`;
CREATE TABLE `tb_plantmaintancerecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `maintanceCompany` varchar(100) DEFAULT NULL COMMENT '维修单位',
  `maintanceDate` varchar(100) DEFAULT NULL COMMENT '维修日期',
  `Record_dt` varchar(20) DEFAULT NULL COMMENT '记录日期',
  `Record_username` varchar(20) DEFAULT NULL COMMENT '记录人姓名',
  `isWall` tinyint(20) DEFAULT NULL,
  `isBottom` tinyint(20) DEFAULT NULL,
  `isTop` tinyint(20) DEFAULT NULL,
  `isChange_top` varchar(100) DEFAULT NULL COMMENT '顶板是否更换',
  `changeDate_top` varchar(100) DEFAULT NULL COMMENT '顶板更换日期',
  `isInsidePaint_top` varchar(100) DEFAULT NULL COMMENT '顶板内部是否涂层',
  `insidePaintDate_top` varchar(100) DEFAULT NULL COMMENT '顶板内部涂层日期',
  `insidePaintQuality_top` varchar(100) DEFAULT NULL COMMENT '顶板内部涂层质量',
  `isOutsidePaint_top` varchar(100) DEFAULT NULL COMMENT '顶板外部是否涂层',
  `outsidePaintDate_top` varchar(100) DEFAULT NULL COMMENT '顶板外部涂层日期',
  `outsidePaintQuality_top` varchar(100) DEFAULT NULL COMMENT '顶板外部涂层质量',
  `isInsidePaint_side` varchar(100) DEFAULT NULL COMMENT '壁板内部是否涂层',
  `insidePaintDate_side` varchar(100) DEFAULT NULL COMMENT '壁板内部涂层日期',
  `insidePaintQuality_side` varchar(100) DEFAULT NULL COMMENT '壁板内部涂层质量',
  `isOutsidePaint_side` varchar(100) DEFAULT NULL COMMENT '壁板外部是否涂层',
  `outsidePaintDate_side` varchar(100) DEFAULT NULL COMMENT '壁板外部涂层日期',
  `outsidePaintQuality_side` varchar(100) DEFAULT NULL COMMENT '壁板外部涂层质量',
  `isInstallLining_side` varchar(100) DEFAULT NULL COMMENT '壁板是否安装衬里',
  `liningType_side` varchar(100) DEFAULT NULL COMMENT '壁板衬里类型',
  `installLiningDate_side` varchar(100) DEFAULT NULL COMMENT '壁板衬里安装日期',
  `liningQuality_side` varchar(100) DEFAULT NULL COMMENT '壁板衬里质量',
  `liningCheckDate_side` varchar(100) DEFAULT NULL COMMENT '壁板衬里最近检验日期',
  `ringCount_side` varchar(100) DEFAULT NULL COMMENT '维修圈板数',
  `isChange_bottom` varchar(100) DEFAULT NULL COMMENT '底板是否更换',
  `changeDate_bottom` varchar(100) DEFAULT NULL COMMENT '底板更换日期',
  `isInsidePaint_bottom` tinyint(20) DEFAULT NULL COMMENT '底板内部是否涂层',
  `insidePaintDate_bottom` varchar(100) DEFAULT NULL COMMENT '底板内部涂层日期',
  `insidePaintQuality_bottom` varchar(100) DEFAULT NULL COMMENT '底板内部涂层质量',
  `isInstallLining_bottom` tinyint(20) DEFAULT NULL COMMENT '底板是否安装衬里',
  `liningType_bottom` varchar(100) DEFAULT NULL COMMENT '底板衬里类型',
  `installLiningDate_bottom` varchar(100) DEFAULT NULL COMMENT '底板衬里安装日期',
  `liningQuality_bottom` varchar(100) DEFAULT NULL COMMENT '底板衬里质量',
  `liningCheckDate_bottom` varchar(100) DEFAULT NULL COMMENT '底板衬里最近检验日期',
  `remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `handleId` int(11) DEFAULT NULL,
  `handler` varchar(20) DEFAULT NULL,
  `handleType` varchar(20) DEFAULT NULL,
  `HandleDate` varchar(20) DEFAULT NULL,
  `verifier` varchar(100) DEFAULT NULL,
  `verifierLevel` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(10) DEFAULT NULL,
  `isAlarm` tinyint(20) DEFAULT '0' COMMENT '是否报警',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantmaintancerecord
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantmaintancerecordwall
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantmaintancerecordwall`;
CREATE TABLE `tb_plantmaintancerecordwall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gpid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `layerNO` int(11) DEFAULT NULL COMMENT '圈板序号',
  `isChange` varchar(100) DEFAULT NULL COMMENT '壁板是否更换',
  `changeDate` varchar(100) DEFAULT NULL COMMENT '壁板更换日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantmaintancerecordwall
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantmaintancerecord_side
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantmaintancerecord_side`;
CREATE TABLE `tb_plantmaintancerecord_side` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintanceId` int(11) DEFAULT NULL,
  `sideNO` int(11) DEFAULT NULL COMMENT '圈板序号',
  `isChange` varchar(100) DEFAULT NULL COMMENT '壁板是否更换',
  `changeDate` varchar(100) DEFAULT NULL COMMENT '壁板更换日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantmaintancerecord_side
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantriskcalcparam_bak
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantriskcalcparam_bak`;
CREATE TABLE `tb_plantriskcalcparam_bak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plantNO` varchar(100) DEFAULT NULL,
  `plantName` varchar(100) DEFAULT NULL,
  `fAcceptBaseQ_` varchar(10) DEFAULT NULL,
  `iEnvSensitibility_` varchar(10) DEFAULT NULL,
  `eLeakHoleSize_` varchar(100) DEFAULT NULL,
  `fHliq_` varchar(100) DEFAULT NULL,
  `fProd_` varchar(100) DEFAULT NULL,
  `fMatCost_` varchar(100) DEFAULT NULL,
  `fPlvdike_` varchar(100) DEFAULT NULL,
  `fPonsite_` varchar(255) DEFAULT NULL,
  `fPoffsite_` varchar(100) DEFAULT NULL,
  `fSgw_` varchar(100) DEFAULT NULL,
  `fMedium_p_` varchar(100) DEFAULT NULL,
  `fMedium_DynVisc_` varchar(100) DEFAULT NULL,
  `iTankBaseType_` varchar(100) DEFAULT NULL,
  `eTankSubsoilType_` varchar(100) DEFAULT NULL,
  `iThinMechanism_side` varchar(10) DEFAULT NULL,
  `arrE_SCC_Mechanism_side` varchar(100) DEFAULT NULL,
  `arrE_TestValid` varchar(100) DEFAULT NULL,
  `eTestValid_max_side` varchar(10) DEFAULT NULL,
  `arrE_SCC_Sensitibility_side` varchar(100) DEFAULT NULL,
  `arrExtTMF_side` varchar(100) DEFAULT NULL,
  `iThinMechanism_bottom` varchar(10) DEFAULT NULL,
  `arrE_SCC_Mechanism_bottom` varchar(100) DEFAULT NULL,
  `arrE_TestValid_bottom` varchar(100) DEFAULT NULL,
  `arrE_SCC_Sensitibility_bottom` varchar(100) DEFAULT NULL,
  `Bottom_ExTdFactor_mid` varchar(10) DEFAULT NULL,
  `Bottom_ExTdFactor_side` varchar(10) DEFAULT NULL,
  `threshold` varchar(100) DEFAULT NULL,
  `nextCheckDate_side` varchar(100) DEFAULT NULL,
  `nextCheckDate_bottom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantriskcalcparam_bak
-- ----------------------------
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('1', 'redianPlant', '热电厂设备', '1.00', '0', '0', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('2', 'G-6', '钝化剂罐', '10.00', '0', '0', '1,000.00', '1,000.00', '10.00', '20.00', '20.00', '20.00', '20.00', '20.00', '20.00', '0', '0', '0', '6', '0', null, '0', '0,0', '0', '1', '0', '0', '0', '0', '3', '十年后', '十年后');
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('3', 'G-4', '阻垢剂罐', '10.00', '0', '0', '1,000.00', '1,000.00', '10.00', '20.00', '20.00', '20.00', '20.00', '20.00', '20.00', '0', '0', '0', '1', '0', null, '0', '1,1', '0', '6', '0', '0', '1', '1', '3', '2017-01-30', '2017-01-30');
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('4', 'G-5', '污油罐', '10', '0', '0', '1000', '1000', '10', '20', '20', '20', '20', '20', '20', '0', '0', '7', '1', '0', null, '0', '1,1', '7', '1,2', '0,0', '0,1', '1', '1', '3', '2017-02-03', '2017-02-03');
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('5', 'G-2', '废锅水封罐', '10.00', '0', '0', '1,000.00', '1,000.00', '10.00', '20.00', '20.00', '20.00', '20.00', '20.00', '20.00', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '3', '2017-02-02', '2017-02-02');
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('6', 'G-7', '抗钒剂罐', '10', '0', '0', '1000', '1000', '10', '20', '10', '20', '20', '20', '20', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '3', '2017-02-02', '2017-02-02');
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('7', 'R-109/2', '尾气脱臭罐', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '', '');
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('8', '10501-T-07', '含盐污水调节罐', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '', '');
INSERT INTO `tb_plantriskcalcparam_bak` VALUES ('9', '234525', '尾气脱臭罐', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '', '');

-- ----------------------------
-- Table structure for tb_plantriskcalcresult_side
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantriskcalcresult_side`;
CREATE TABLE `tb_plantriskcalcresult_side` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resultId` varchar(10) DEFAULT NULL,
  `sideNO` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `hurtFactor` varchar(10) DEFAULT NULL,
  `futureHurtFactor` varchar(10) DEFAULT NULL COMMENT '未来损伤因子',
  `erosionSpeed` varchar(10) DEFAULT NULL,
  `erosionSource` varchar(10) DEFAULT NULL,
  `invalidLevel` varchar(10) DEFAULT NULL COMMENT '失效可能性等级',
  `resultLevel` varchar(10) DEFAULT NULL COMMENT '后果等级',
  `riskLevel` varchar(10) DEFAULT NULL COMMENT '风险等级，根据失效可能性等级和后果等级计算出来',
  `originThick` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantriskcalcresult_side
-- ----------------------------
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('7', '4', '1', '1000', '100', null, '2', '测量', '1', null, null, '0');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('8', '4', '1', '1000', '100', null, '2', '测量', '1', null, null, '0');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('9', '5', '1', '0.8', '2', null, '1000.00', '专家', '1', null, null, '18');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('10', '5', '1', '0.8', '2', null, '1000.00', '专家', '1', null, null, '18');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('11', '6', '1', '0.8', '2', null, '1000', '专家', '1', null, null, '18');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('12', '6', '1', '0.8', '2', null, '1000', '专家', '1', null, null, '18');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('13', '8', '1', '1000', '10', null, '', '3', '测量', null, null, '1');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('14', '8', '1', '1000', '10', null, '', '3', '测量', null, null, '1');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('15', '9', '1', '1000', '10', null, '', '3', '测量', null, null, '1');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('16', '9', '1', '1000', '10', null, '', '3', '测量', null, null, '1');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('17', '10', '1', '1000', '10', null, '10', '3', '测量', null, null, '1');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('18', '10', '1', '1000', '10', null, '10', '3', '测量', null, null, '1');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('19', '11', '1', '1000', '10', '10', '3', '测量', '1', '4', '中高风险', '999');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('20', '11', '2', '1000', '10', '10', '3', '测量', '1', '4', '中高风险', '999');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('21', '12', '1', '1000', '10', '10', '3', '测量', '1', 'E', '中高风险', '999');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('22', '12', '2', '1000', '10', '10', '3', '测量', '1', 'E', '中高风险', '999');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('23', '13', '1', '1000', '10', '10', '1', '测量', '1', 'E', '中高风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('24', '13', '2', '1000', '10', '10', '1', '测量', '1', 'E', '中高风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('25', '14', '1', '1000', '10', '10', '1', '测量', '1', 'E', '中高风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('26', '14', '2', '1000', '10', '10', '1', '测量', '1', 'E', '中高风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('27', '15', '1', '1000', '10', '10', '1', '测量', '1', 'E', '中高风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('28', '15', '2', '1000', '10', '10', '1', '测量', '1', 'E', '中高风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('29', '16', '1', '1000', '10', '', '1', '测量', '1', 'D', '中风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('30', '16', '2', '1000', '10', '', '1', '测量', '1', 'D', '中风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('31', '17', '1', '1000', '10', '', '1', '测量', '1', 'D', '中风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('32', '17', '2', '1000', '10', '', '1', '测量', '1', 'D', '中风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('33', '18', '1', '1000', '10', '10', '1', '测量', '1', 'D', '中风险', '1000');
INSERT INTO `tb_plantriskcalcresult_side` VALUES ('34', '18', '2', '1000', '10', '10', '1', '测量', '1', 'D', '中风险', '1000');

-- ----------------------------
-- Table structure for tb_plantriskcalcresult_trend
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantriskcalcresult_trend`;
CREATE TABLE `tb_plantriskcalcresult_trend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resultId` int(11) DEFAULT NULL COMMENT '风险计算结果ID',
  `plantNO` varchar(100) DEFAULT NULL,
  `sideTrendData` varchar(200) DEFAULT NULL COMMENT '壁板趋势数据',
  `bottomTrendData` varchar(200) DEFAULT NULL COMMENT '底板趋势数据',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantriskcalcresult_trend
-- ----------------------------
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('2', '6', 'G-6', '2,2,2,2,2,2,2,2,2,2', '2.13471472036033,2.13471472036033,2.13471472036033,2.13471472036033,2.13471472036033,2.13471472036033,2.13471472036033,2.13471472036033,2.13471472036033,2.13471472036033');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('3', '7', 'G-4', '-1,-1,-1,-1,-1,-1,-1,-1,-1,-1', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('4', '8', 'G-4', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('5', '9', 'G-4', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('6', '10', 'G-4', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('7', '11', 'G-4', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('8', '12', 'G-4', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('9', '13', 'G-5', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('10', '14', 'G-5', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('11', '15', 'G-5', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('12', '16', 'G-5', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('13', '17', 'G-5', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');
INSERT INTO `tb_plantriskcalcresult_trend` VALUES ('14', '18', 'G-5', '10,10,10,10,10,10,10,10,10,10', '10,10,10,10,10,10,10,10,10,10');

-- ----------------------------
-- Table structure for tb_plantriskcalc_userselectitem
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantriskcalc_userselectitem`;
CREATE TABLE `tb_plantriskcalc_userselectitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) DEFAULT NULL COMMENT '风险计算筛选项',
  `content` varchar(100) DEFAULT NULL COMMENT '风险计算筛选项对应的内容',
  `plantNO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantriskcalc_userselectitem
-- ----------------------------
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('67', '壁板--减薄机理', '盐酸(HCI)腐蚀,高温硫化物/环烷酸腐蚀', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('68', '壁板--应力腐蚀损伤机理', '胺开裂', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('69', '壁板--胺开裂--检验有效性', '高度有效', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('70', '壁板--敏感性', '不敏感', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('71', '壁板--外部腐蚀', '腐蚀速率：0.025,损伤速度：0.025,检验有效性：对＞95%的外表面目视检查及UT、RT、深度尺检测', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('72', '底板--减薄机理', '盐酸(HCI)腐蚀,高温硫化物/环烷酸腐蚀', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('73', '底板--应力腐蚀损伤机理', '胺开裂,硫化物应力腐蚀开裂', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('74', '底板--胺开裂--检验有效性', '高度有效', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('75', '底板--硫化物应力开裂--检验有效性', '高度有效', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('76', '底板--敏感性', '不敏感', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('77', '底板--敏感性--硫化物应力腐蚀', '低敏感度', 'G-5');
INSERT INTO `tb_plantriskcalc_userselectitem` VALUES ('78', '底板--外部腐蚀', '腐蚀速率：2,损伤速度：2,检验有效性：对＞95%的外表面目视检查及UT、RT、深度尺检测', '');

-- ----------------------------
-- Table structure for tb_planttestrecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_planttestrecord`;
CREATE TABLE `tb_planttestrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '检验记录ID',
  `pid` int(11) DEFAULT NULL,
  `testCompany` varchar(200) DEFAULT NULL COMMENT '检验单位',
  `testDate` varchar(30) DEFAULT NULL COMMENT '检验日期',
  `nextTestDate` varchar(30) DEFAULT NULL COMMENT '下次检验日期',
  `testType` varchar(100) DEFAULT NULL COMMENT '检验类型',
  `isWallTest` tinyint(20) DEFAULT NULL COMMENT '是否壁板进行了检验',
  `isBottomTest` tinyint(20) DEFAULT NULL,
  `isTopTest` tinyint(20) DEFAULT NULL,
  `testDate_top` varchar(30) DEFAULT NULL COMMENT '顶板检验日期',
  `testMethod_top` varchar(100) DEFAULT NULL COMMENT '顶板检验方法',
  `testMinThickness_top` varchar(100) DEFAULT NULL COMMENT '顶板最小测量厚度',
  `testRate_top` varchar(100) DEFAULT NULL COMMENT '顶板检验比例',
  `testNumber_side` int(11) DEFAULT NULL COMMENT '检验壁板圈数',
  `testDate_bottom` varchar(30) DEFAULT NULL COMMENT '底板检验日期',
  `testType_bottom` varchar(100) DEFAULT NULL COMMENT '底板检验类型',
  `testBasicSettle_bottom` varchar(100) DEFAULT NULL COMMENT '基础沉降',
  `testMinThickness1_bottom` varchar(50) DEFAULT NULL COMMENT '中幅板最小测量厚度',
  `testMinThickness2_bottom` varchar(50) DEFAULT NULL COMMENT '边缘板最小测量厚度',
  `testMethod_bottom` varchar(100) DEFAULT NULL COMMENT '底板检验方法',
  `testRate_bottom` varchar(100) DEFAULT NULL COMMENT '底板检验比例',
  `testRemark` varchar(200) DEFAULT NULL COMMENT '备注',
  `plantCheckRemark` varchar(100) DEFAULT NULL,
  `plantCheckResult` varchar(100) DEFAULT NULL,
  `handleId` int(11) DEFAULT NULL,
  `handler` varchar(20) DEFAULT NULL,
  `handleType` varchar(20) DEFAULT NULL,
  `HandleDate` varchar(20) DEFAULT NULL,
  `verifier` varchar(100) DEFAULT NULL,
  `verifierLevel` varchar(100) DEFAULT NULL,
  `verifyStage` varchar(100) DEFAULT NULL,
  `verifyResult` varchar(100) DEFAULT NULL,
  `isDelete` varchar(20) DEFAULT '否',
  `isAlarm` tinyint(20) DEFAULT '0' COMMENT '是否报警',
  `isShowAlarm` tinyint(20) DEFAULT '1' COMMENT '是否显示报警，0表示不报警 1表示报警',
  `alarmRecord` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_planttestrecord
-- ----------------------------

-- ----------------------------
-- Table structure for tb_planttestrecordwall
-- ----------------------------
DROP TABLE IF EXISTS `tb_planttestrecordwall`;
CREATE TABLE `tb_planttestrecordwall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '检测记录ID',
  `layerNO` int(11) DEFAULT NULL COMMENT '壁板序号',
  `testDate` varchar(30) DEFAULT NULL COMMENT '检测日期',
  `testMethod` varchar(100) DEFAULT NULL COMMENT '壁板检验方法',
  `testRate` varchar(30) DEFAULT NULL COMMENT '壁板检验比例',
  `minThickness` varchar(30) DEFAULT NULL COMMENT '壁板最小测量厚度 ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_planttestrecordwall
-- ----------------------------

-- ----------------------------
-- Table structure for tb_planttestrecord_checkresult
-- ----------------------------
DROP TABLE IF EXISTS `tb_planttestrecord_checkresult`;
CREATE TABLE `tb_planttestrecord_checkresult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '检验记录ID',
  `checkItem` varchar(100) DEFAULT NULL COMMENT '检查项',
  `checkResult` varchar(100) DEFAULT NULL COMMENT '检查结果',
  `remark` varchar(100) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_planttestrecord_checkresult
-- ----------------------------

-- ----------------------------
-- Table structure for tb_plantwallboardinfo
-- ----------------------------
DROP TABLE IF EXISTS `tb_plantwallboardinfo`;
CREATE TABLE `tb_plantwallboardinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `layerNO` int(11) DEFAULT NULL COMMENT '壁板序号',
  `layerId` varchar(20) DEFAULT NULL,
  `useDate` varchar(20) DEFAULT NULL COMMENT '每层板投用日期',
  `material` varchar(100) DEFAULT NULL COMMENT '每层板壁板材料',
  `height` varchar(8) DEFAULT NULL,
  `thicknessOrigin` varchar(20) DEFAULT NULL COMMENT '原始測厚厚度',
  `thicknessOriginDate` varchar(20) DEFAULT NULL COMMENT '原始測厚日期',
  `thickness` varchar(8) DEFAULT NULL COMMENT '壁板測厚厚度',
  `measureDate` varchar(20) DEFAULT NULL COMMENT '測厚日期',
  `lastThickness` varchar(20) DEFAULT NULL,
  `lastThicknessDate` varchar(20) DEFAULT NULL,
  `namelyThickness` varchar(8) DEFAULT NULL COMMENT '每层板名义厚度',
  `erosionSpeedSelection` varchar(100) DEFAULT NULL COMMENT '每层板腐蚀速率选择',
  `expertErosionSpeed` varchar(8) DEFAULT NULL COMMENT '每层板专家腐蚀速率',
  `theoryErosionSpeed` varchar(8) DEFAULT NULL,
  `erosionAlarm` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_plantwallboardinfo
-- ----------------------------

-- ----------------------------
-- Table structure for tb_record
-- ----------------------------
DROP TABLE IF EXISTS `tb_record`;
CREATE TABLE `tb_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(100) DEFAULT NULL,
  `dataID` varchar(100) DEFAULT NULL,
  `addTime` varchar(20) DEFAULT NULL,
  `remark` varchar(300) DEFAULT NULL,
  `addUserName` varchar(100) DEFAULT NULL,
  `addType` varchar(100) DEFAULT NULL COMMENT '类型：包括保存，提交，打回，审核通过等',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4784 DEFAULT CHARSET=utf8 COMMENT='计算日志，每个人的每一步操作及操作的模块和数据表都会有相应记录';

-- ----------------------------
-- Records of tb_record
-- ----------------------------
INSERT INTO `tb_record` VALUES ('1', 'tb_plantInfo', '6', 'YYYY-57-04 17:09:SS', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('2', 'tb_plantInfo', '6', '2015-14-04 18:09:11', '', '李四', '保存');
INSERT INTO `tb_record` VALUES ('3', 'tb_plantInfo', '6', '2015-14-04 18:09:35', '', '李四', '保存');
INSERT INTO `tb_record` VALUES ('4', 'tb_plantInfo', '6', '2015-14-04 18:09:38', '', '李四', '提交');
INSERT INTO `tb_record` VALUES ('5', 'tb_plantInfo', '6', '2015-17-04 18:09:34', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('6', 'tb_plantInfo', '6', '2015-19-04 18:09:46', '', '李四', '保存');
INSERT INTO `tb_record` VALUES ('7', 'tb_plantInfo', '6', '2015-19-04 18:09:49', '', '李四', '提交');
INSERT INTO `tb_record` VALUES ('8', 'tb_plantInfo', '6', '2015-39-04 18:09:49', '', '王五', '打回');
INSERT INTO `tb_record` VALUES ('9', 'tb_plantInfo', '6', '2015-40-04 18:09:27', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('10', 'tb_plantInfo', '7', '2015-43-04 18:09:48', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('11', 'tb_plantInfo', '6', '2015-51-04 18:09:17', '', '陈六', '提交');
INSERT INTO `tb_record` VALUES ('12', 'tb_plantMaintanceRecord', '3', '2015-49-05 19:09:03', '', '李四', '删除');
INSERT INTO `tb_record` VALUES ('13', 'tb_plantMaintanceRecord', '4', '2015-52-05 19:09:18', '', '李四', '添加');
INSERT INTO `tb_record` VALUES ('14', 'tb_plantMaintanceRecord', '4', '2015-13-05 20:09:54', '', '王五', '保存');
INSERT INTO `tb_record` VALUES ('15', 'tb_plantMaintanceRecord', '4', '2015-21-05 20:09:48', '', '王五', '保存');
INSERT INTO `tb_record` VALUES ('16', 'tb_plantMaintanceRecord', '4', '2015-23-05 20:09:48', '', '王五', '保存');
INSERT INTO `tb_record` VALUES ('17', 'tb_plantMaintanceRecord', '4', '2015-26-05 20:09:04', '', '王五', '保存');
INSERT INTO `tb_record` VALUES ('18', 'tb_planttestrecord', '1', '2015-01-10 10:09:48', '', '李四', '删除');
INSERT INTO `tb_record` VALUES ('19', 'tb_planttestrecord', '2', '2015-03-10 10:09:40', '', '李四', '添加');
INSERT INTO `tb_record` VALUES ('20', 'tb_planttestrecord', '2', '2015-04-10 10:09:03', '', '李四', '删除');
INSERT INTO `tb_record` VALUES ('21', 'tb_planttestrecord', '3', '2015-17-10 10:09:54', '', '李四', '添加');
INSERT INTO `tb_record` VALUES ('22', 'tb_planttestrecord', '3', '2015-18-10 10:09:39', '', '李四', '保存');
INSERT INTO `tb_record` VALUES ('23', 'tb_planttestrecord', '3', '2015-18-10 10:09:44', '', '李四', '提交');
INSERT INTO `tb_record` VALUES ('24', 'tb_planttestrecord', '3', '2015-06-10 11:09:44', '', '李四', '删除');
INSERT INTO `tb_record` VALUES ('25', 'tb_planttestrecord', '4', '2015-07-10 11:09:43', '', '李四', '添加');
INSERT INTO `tb_record` VALUES ('26', 'tb_plantInfo', '6', '2015-09-10 03:42:05', '', '赵七', '撤销删除');
INSERT INTO `tb_record` VALUES ('27', 'tb_plantInfo', '6', '2015-09-10 03:42:15', '', '赵七', '删除');
INSERT INTO `tb_record` VALUES ('28', 'tb_plantInfo', '7', '2015-09-10 03:42:22', '', '赵七', '删除');
INSERT INTO `tb_record` VALUES ('29', 'tb_plantMaintanceRecord', '5', '2015-09-10 03:50:23', '', '赵七', '添加');
INSERT INTO `tb_record` VALUES ('30', 'tb_plantMaintanceRecord', '4', '2015-09-10 03:50:32', '', '赵七', '删除');
INSERT INTO `tb_record` VALUES ('31', 'tb_plantMaintanceRecord', '4', '2015-09-10 03:50:50', '', '赵七', '撤销删除');
INSERT INTO `tb_record` VALUES ('32', 'tb_plantMaintanceRecord', '5', '2015-09-10 03:51:40', '', '赵七', '删除');
INSERT INTO `tb_record` VALUES ('33', 'tb_planttestrecord', '5', '2015-09-10 03:57:39', '', '赵七', '添加');
INSERT INTO `tb_record` VALUES ('34', 'tb_planttestrecord', '4', '2015-09-10 03:57:45', '', '赵七', '删除');
INSERT INTO `tb_record` VALUES ('35', 'tb_plantInfo', '7', '2015-09-13 06:33:49', '', '陈六', '撤销删除');
INSERT INTO `tb_record` VALUES ('36', 'tb_plantInfo', '6', '2015-09-13 06:34:00', '', '陈六', '提交');
INSERT INTO `tb_record` VALUES ('37', 'tb_plantInfo', '6', '2015-09-13 06:34:06', '', '陈六', '提交');
INSERT INTO `tb_record` VALUES ('38', 'tb_plantInfo', '6', '2015-09-13 06:36:02', '', '陈六', '提交');
INSERT INTO `tb_record` VALUES ('39', 'tb_plantInfo', '6', '2015-09-13 07:59:24', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('40', 'tb_plantInfo', '7', '2015-09-13 07:59:28', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('41', 'tb_measureThicknessRecord', '5', '2015-09-13 08:41:10', '', '李四', '添加');
INSERT INTO `tb_record` VALUES ('42', 'tb_measureThicknessRecord', '5', '2015-09-13 08:42:22', '', '李四', '提交');
INSERT INTO `tb_record` VALUES ('43', 'tb_measureThicknessRecord', '5', '2015-09-13 08:43:31', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('44', 'tb_plantInfo', '8', '2015-09-14 08:21:15', '', '热电厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('45', 'tb_plantMaintanceRecord', '6', '2015-09-14 08:44:53', '', '热电厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('46', 'tb_plantInfo', '8', '2015-09-14 08:53:16', '', '热电厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('47', 'tb_plantInfo', '9', '2015-09-14 09:11:00', '', '热电厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('48', 'tb_plantInfo', '9', '2015-09-15 07:46:31', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('49', 'tb_plantInfo', '9', '2015-09-15 07:50:42', '', '热电厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('50', 'tb_plantInfo', '9', '2015-09-15 07:50:51', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('51', 'tb_plantInfo', '9', '2015-09-15 07:50:57', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('52', 'tb_plantInfo', '9', '2015-09-15 07:51:02', '', '热电厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('53', 'tb_plantInfo', '9', '2015-09-15 08:02:40', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('54', 'tb_plantInfo', '9', '2015-09-15 08:10:03', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('55', 'tb_plantInfo', '9', '2015-09-16 01:34:23', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('56', 'tb_plantInfo', '9', '2015-09-16 01:34:31', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('57', 'tb_plantInfo', '9', '2015-09-16 01:34:39', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('58', 'tb_plantInfo', '9', '2015-09-16 01:36:45', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('59', 'tb_plantInfo', '9', '2015-09-16 01:37:05', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('60', 'tb_plantInfo', '9', '2015-09-16 01:38:30', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('61', 'tb_plantInfo', '9', '2015-09-16 01:39:28', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('62', 'tb_plantInfo', '9', '2015-09-16 01:42:44', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('63', 'tb_plantInfo', '9', '2015-09-16 02:00:39', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('64', 'tb_plantInfo', '9', '2015-09-16 02:01:17', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('65', 'tb_plantInfo', '9', '2015-09-16 02:02:40', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('66', 'tb_plantInfo', '9', '2015-09-16 02:03:19', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('67', 'tb_plantInfo', '9', '2015-09-16 02:03:29', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('68', 'tb_plantInfo', '9', '2015-09-16 02:03:38', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('69', 'tb_plantInfo', '9', '2015-09-16 02:04:58', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('70', 'tb_plantInfo', '9', '2015-09-16 02:11:17', '', '热电厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('71', 'tb_plantUselessRecord', '2', '2015-09-16 03:17:52', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('72', 'tb_plantUselessRecord', '2', '2015-09-16 03:18:04', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('73', 'tb_plantUselessRecord', '2', '2015-09-16 03:26:57', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('74', 'tb_plantUselessRecord', '2', '2015-09-16 03:27:29', '', '王五', '保存');
INSERT INTO `tb_record` VALUES ('75', 'tb_plantUselessRecord', '2', '2015-09-16 03:29:55', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('76', 'tb_plantUselessRecord', '2', '2015-09-16 03:30:18', '', '王五', '打回');
INSERT INTO `tb_record` VALUES ('77', 'tb_plantfaultrecord', '3', '2015-09-16 03:43:14', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('78', 'tb_plantfaultrecord', '3', '2015-09-16 03:44:32', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('79', 'tb_plantfaultrecord', '3', '2015-09-16 03:46:44', '', '王五', '打回');
INSERT INTO `tb_record` VALUES ('80', 'tb_measureThicknessRecord_origin', '9', '2015-09-16 04:52:09', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('81', 'tb_measureThicknessRecord', '6', '2015-09-16 04:52:20', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('82', 'tb_measureThicknessRecord', '6', '2015-09-16 04:52:22', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('83', 'tb_measureThicknessRecord_origin', '9', '2015-09-16 05:05:33', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('84', 'tb_measureThicknessRecord_origin', '10', '2015-09-16 05:05:56', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('85', 'tb_measureThicknessRecord_origin', '11', '2015-09-16 05:17:41', '', '热电厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('86', 'tb_measureThicknessRecord_origin', '9', '2015-09-16 05:21:56', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('87', 'tb_measureThicknessRecord_origin', '10', '2015-09-16 05:22:01', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('88', 'tb_planttestrecord', '4', '2015-09-16 08:28:11', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('89', 'tb_planttestrecord', '5', '2015-09-16 08:29:17', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('90', 'tb_planttestrecord', '4', '2015-09-16 08:46:28', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('91', 'tb_planttestrecord', '5', '2015-09-16 08:46:42', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('92', 'tb_planttestrecord', '4', '2015-09-16 08:54:53', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('93', 'tb_planttestrecord', '5', '2015-09-16 08:55:07', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('94', 'tb_attachEvaluateRecord', '1', '2015-09-28 08:32:53', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('95', 'tb_attachEvaluateRecord', '2', '2015-09-28 08:34:27', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('96', 'tb_attachEvaluateRecord', '3', '2015-09-28 08:35:01', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('97', 'tb_attachEvaluateRecord', '4', '2015-09-28 08:35:37', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('98', 'tb_attachEvaluateRecord', '3', '2015-09-28 08:53:22', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('99', 'tb_attachEvaluateRecord', '4', '2015-09-28 09:17:35', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('100', 'tb_attachEvaluateRecord', '4', '2015-09-28 09:17:51', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('101', 'tb_plantriskcalcresult', '4', '2015-10-01 12:47:24', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('102', 'tb_attachEvaluateRecord', '4', '2015-10-05 10:22:00', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('103', 'tb_plantAlarm', '1', '2015-10-05 10:22:00', '', '王五', '添加');
INSERT INTO `tb_record` VALUES ('104', 'tb_attachEvaluateRecord', '4', '2015-10-06 02:51:43', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('105', 'tb_measureThicknessRecord', '1', '2015-10-06 02:55:45', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('106', 'tb_measureThicknessRecord', '2', '2015-10-06 02:56:36', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('107', 'tb_measureThicknessRecord', '3', '2015-10-06 03:04:34', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('108', 'tb_measureThicknessRecord', '4', '2015-10-06 03:05:11', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('109', 'tb_plantInfo', '6', '2015-10-06 03:25:29', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('110', 'tb_measureThicknessRecord', '4', '2015-10-06 03:27:20', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('111', 'tb_measureThicknessRecord', '4', '2015-10-06 03:27:52', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('112', 'tb_plantAlarm', '2', '2015-10-06 03:28:28', '', '王五', '添加');
INSERT INTO `tb_record` VALUES ('113', 'tb_plantAlarm', '1', '2015-10-06 07:33:03', '', '炼油厂设备员', '保存处理方法');
INSERT INTO `tb_record` VALUES ('114', 'tb_plantAlarm', '2', '2015-10-06 07:33:29', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('115', 'tb_plantAlarm', '2', '2015-10-06 07:37:01', '', '王五', '保存处理方法');
INSERT INTO `tb_record` VALUES ('116', 'tb_plantAlarm', '2', '2015-10-06 07:37:04', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('117', 'tb_plantAlarm', '2', '2015-10-06 07:37:04', '', '王五', '处理');
INSERT INTO `tb_record` VALUES ('118', 'tb_plantAlarm', '1', '2015-10-06 07:37:30', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('119', 'tb_plantAlarm', '1', '2015-10-06 07:37:30', '', '王五', '处理');
INSERT INTO `tb_record` VALUES ('120', 'tb_plantInfo', '6', '2015-10-10 06:52:23', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('121', 'tb_plantInfo', '6', '2015-10-10 06:52:37', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('122', 'tb_plantInfo', '6', '2015-10-10 06:52:45', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('123', 'tb_plantInfo', '6', '2015-10-10 07:03:02', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('124', 'tb_plantInfo', '6', '2015-10-10 07:03:14', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('125', 'tb_plantInfo', '6', '2015-10-10 07:03:20', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('126', 'tb_plantInfo', '6', '2015-10-10 07:19:28', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('127', 'tb_plantInfo', '6', '2015-10-10 08:16:39', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('128', 'tb_plantInfo', '6', '2015-10-10 08:16:46', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('129', 'tb_plantInfo', '6', '2015-10-17 11:37:16', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('130', 'tb_plantInfo', '6', '2015-10-17 11:37:31', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('131', 'tb_attachEvaluateRecord', '3', '2015-10-17 11:55:08', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('132', 'tb_attachEvaluateRecord', '3', '2015-10-17 11:55:32', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('133', 'tb_plantAlarm', '3', '2015-10-17 11:55:32', '', '王五', '添加');
INSERT INTO `tb_record` VALUES ('134', 'tb_attachEvaluateRecord', '2', '2015-10-17 12:04:06', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('135', 'tb_attachEvaluateRecord', '5', '2015-10-17 12:49:40', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('136', 'tb_attachEvaluateRecord', '5', '2015-10-17 12:50:19', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('137', 'tb_plantInfo', '6', '2015-10-17 01:00:58', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('138', 'tb_plantInfo', '6', '2015-10-17 01:01:46', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('139', 'tb_plantInfo', '6', '2015-10-17 01:02:02', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('140', 'tb_plantInfo', '6', '2015-10-17 01:04:57', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('141', 'tb_plantInfo', '6', '2015-10-17 01:05:08', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('142', 'tb_plantInfo', '6', '2015-10-17 01:05:14', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('143', 'tb_plantInfo', '6', '2015-10-17 03:54:35', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('144', 'tb_plantriskcalcresult', '5', '2015-10-21 08:52:17', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('145', 'tb_assistcheckevaluaterecord', '6', '2015-11-13 07:48:41', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('146', 'tb_assistcheckevaluaterecord', '6', '2015-11-13 07:59:40', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('147', 'tb_assistcheckevaluaterecord', '7', '2015-11-13 08:00:51', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('148', 'tb_assistcheckevaluaterecord', '8', '2015-11-13 08:06:48', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('149', 'tb_assistcheckevaluaterecord', '8', '2015-11-13 08:07:09', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('150', 'tb_assistcheckevaluaterecord', '9', '2015-11-13 08:07:34', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('151', 'tb_assistcheckevaluaterecord', '9', '2015-11-13 09:06:29', '', '张三', '提交');
INSERT INTO `tb_record` VALUES ('152', 'tb_plantriskcalcresult', '6', '2015-11-14 07:19:31', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('153', 'tb_plantInfo', '10', '2015-12-28 05:39:29', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('154', 'tb_plantInfo', '11', '2015-12-28 05:43:40', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('155', 'tb_plantInfo', '12', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('156', 'tb_plantInfo', '13', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('157', 'tb_plantInfo', '14', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('158', 'tb_plantInfo', '15', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('159', 'tb_plantInfo', '16', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('160', 'tb_plantInfo', '17', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('161', 'tb_plantInfo', '18', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('162', 'tb_plantInfo', '19', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('163', 'tb_plantInfo', '20', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('164', 'tb_plantInfo', '21', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('165', 'tb_plantInfo', '22', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('166', 'tb_plantInfo', '23', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('167', 'tb_plantInfo', '24', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('168', 'tb_plantInfo', '25', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('169', 'tb_plantInfo', '26', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('170', 'tb_plantInfo', '27', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('171', 'tb_plantInfo', '28', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('172', 'tb_plantInfo', '29', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('173', 'tb_plantInfo', '30', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('174', 'tb_plantInfo', '31', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('175', 'tb_plantInfo', '32', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('176', 'tb_plantInfo', '33', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('177', 'tb_plantInfo', '34', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('178', 'tb_plantInfo', '35', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('179', 'tb_plantInfo', '36', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('180', 'tb_plantInfo', '37', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('181', 'tb_plantInfo', '38', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('182', 'tb_plantInfo', '39', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('183', 'tb_plantInfo', '40', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('184', 'tb_plantInfo', '41', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('185', 'tb_plantInfo', '42', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('186', 'tb_plantInfo', '43', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('187', 'tb_plantInfo', '44', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('188', 'tb_plantInfo', '45', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('189', 'tb_plantInfo', '46', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('190', 'tb_plantInfo', '47', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('191', 'tb_plantInfo', '48', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('192', 'tb_plantInfo', '49', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('193', 'tb_plantInfo', '50', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('194', 'tb_plantInfo', '51', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('195', 'tb_plantInfo', '52', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('196', 'tb_plantInfo', '53', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('197', 'tb_plantInfo', '54', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('198', 'tb_plantInfo', '55', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('199', 'tb_plantInfo', '56', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('200', 'tb_plantInfo', '57', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('201', 'tb_plantInfo', '58', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('202', 'tb_plantInfo', '59', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('203', 'tb_plantInfo', '60', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('204', 'tb_plantInfo', '61', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('205', 'tb_plantInfo', '62', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('206', 'tb_plantInfo', '63', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('207', 'tb_plantInfo', '64', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('208', 'tb_plantInfo', '65', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('209', 'tb_plantInfo', '66', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('210', 'tb_plantInfo', '67', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('211', 'tb_plantInfo', '68', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('212', 'tb_plantInfo', '69', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('213', 'tb_plantInfo', '70', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('214', 'tb_plantInfo', '71', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('215', 'tb_plantInfo', '72', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('216', 'tb_plantInfo', '73', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('217', 'tb_plantInfo', '74', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('218', 'tb_plantInfo', '75', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('219', 'tb_plantInfo', '76', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('220', 'tb_plantInfo', '77', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('221', 'tb_plantInfo', '78', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('222', 'tb_plantInfo', '79', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('223', 'tb_plantInfo', '80', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('224', 'tb_plantInfo', '81', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('225', 'tb_plantInfo', '82', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('226', 'tb_plantInfo', '83', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('227', 'tb_plantInfo', '84', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('228', 'tb_plantInfo', '85', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('229', 'tb_plantInfo', '86', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('230', 'tb_plantInfo', '87', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('231', 'tb_plantInfo', '88', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('232', 'tb_plantInfo', '89', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('233', 'tb_plantInfo', '90', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('234', 'tb_plantInfo', '91', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('235', 'tb_plantInfo', '92', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('236', 'tb_plantInfo', '93', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('237', 'tb_plantInfo', '94', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('238', 'tb_plantInfo', '95', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('239', 'tb_plantInfo', '96', '2016-01-02 06:58:30', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('240', 'tb_plantInfo', '97', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('241', 'tb_plantInfo', '98', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('242', 'tb_plantInfo', '99', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('243', 'tb_plantInfo', '100', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('244', 'tb_plantInfo', '101', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('245', 'tb_plantInfo', '102', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('246', 'tb_plantInfo', '103', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('247', 'tb_plantInfo', '104', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('248', 'tb_plantInfo', '105', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('249', 'tb_plantInfo', '106', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('250', 'tb_plantInfo', '107', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('251', 'tb_plantInfo', '108', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('252', 'tb_plantInfo', '109', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('253', 'tb_plantInfo', '110', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('254', 'tb_plantInfo', '111', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('255', 'tb_plantInfo', '112', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('256', 'tb_plantInfo', '113', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('257', 'tb_plantInfo', '114', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('258', 'tb_plantInfo', '115', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('259', 'tb_plantInfo', '116', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('260', 'tb_plantInfo', '117', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('261', 'tb_plantInfo', '118', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('262', 'tb_plantInfo', '119', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('263', 'tb_plantInfo', '120', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('264', 'tb_plantInfo', '121', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('265', 'tb_plantInfo', '122', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('266', 'tb_plantInfo', '123', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('267', 'tb_plantInfo', '124', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('268', 'tb_plantInfo', '125', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('269', 'tb_plantInfo', '126', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('270', 'tb_plantInfo', '127', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('271', 'tb_plantInfo', '128', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('272', 'tb_plantInfo', '129', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('273', 'tb_plantInfo', '130', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('274', 'tb_plantInfo', '131', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('275', 'tb_plantInfo', '132', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('276', 'tb_plantInfo', '133', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('277', 'tb_plantInfo', '134', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('278', 'tb_plantInfo', '135', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('279', 'tb_plantInfo', '136', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('280', 'tb_plantInfo', '137', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('281', 'tb_plantInfo', '138', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('282', 'tb_plantInfo', '139', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('283', 'tb_plantInfo', '140', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('284', 'tb_plantInfo', '141', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('285', 'tb_plantInfo', '142', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('286', 'tb_plantInfo', '143', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('287', 'tb_plantInfo', '144', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('288', 'tb_plantInfo', '145', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('289', 'tb_plantInfo', '146', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('290', 'tb_plantInfo', '147', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('291', 'tb_plantInfo', '148', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('292', 'tb_plantInfo', '149', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('293', 'tb_plantInfo', '150', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('294', 'tb_plantInfo', '151', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('295', 'tb_plantInfo', '152', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('296', 'tb_plantInfo', '153', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('297', 'tb_plantInfo', '154', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('298', 'tb_plantInfo', '155', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('299', 'tb_plantInfo', '156', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('300', 'tb_plantInfo', '157', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('301', 'tb_plantInfo', '158', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('302', 'tb_plantInfo', '159', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('303', 'tb_plantInfo', '160', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('304', 'tb_plantInfo', '161', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('305', 'tb_plantInfo', '162', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('306', 'tb_plantInfo', '163', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('307', 'tb_plantInfo', '164', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('308', 'tb_plantInfo', '165', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('309', 'tb_plantInfo', '166', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('310', 'tb_plantInfo', '167', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('311', 'tb_plantInfo', '168', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('312', 'tb_plantInfo', '169', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('313', 'tb_plantInfo', '170', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('314', 'tb_plantInfo', '171', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('315', 'tb_plantInfo', '172', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('316', 'tb_plantInfo', '173', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('317', 'tb_plantInfo', '174', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('318', 'tb_plantInfo', '175', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('319', 'tb_plantInfo', '176', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('320', 'tb_plantInfo', '177', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('321', 'tb_plantInfo', '178', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('322', 'tb_plantInfo', '179', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('323', 'tb_plantInfo', '180', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('324', 'tb_plantInfo', '181', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('325', 'tb_plantInfo', '182', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('326', 'tb_plantInfo', '183', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('327', 'tb_plantInfo', '184', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('328', 'tb_plantInfo', '185', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('329', 'tb_plantInfo', '186', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('330', 'tb_plantInfo', '187', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('331', 'tb_plantInfo', '188', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('332', 'tb_plantInfo', '189', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('333', 'tb_plantInfo', '190', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('334', 'tb_plantInfo', '191', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('335', 'tb_plantInfo', '192', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('336', 'tb_plantInfo', '193', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('337', 'tb_plantInfo', '194', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('338', 'tb_plantInfo', '195', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('339', 'tb_plantInfo', '196', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('340', 'tb_plantInfo', '197', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('341', 'tb_plantInfo', '198', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('342', 'tb_plantInfo', '199', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('343', 'tb_plantInfo', '200', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('344', 'tb_plantInfo', '201', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('345', 'tb_plantInfo', '202', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('346', 'tb_plantInfo', '203', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('347', 'tb_plantInfo', '204', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('348', 'tb_plantInfo', '205', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('349', 'tb_plantInfo', '206', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('350', 'tb_plantInfo', '207', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('351', 'tb_plantInfo', '208', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('352', 'tb_plantInfo', '209', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('353', 'tb_plantInfo', '210', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('354', 'tb_plantInfo', '211', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('355', 'tb_plantInfo', '212', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('356', 'tb_plantInfo', '213', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('357', 'tb_plantInfo', '214', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('358', 'tb_plantInfo', '215', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('359', 'tb_plantInfo', '216', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('360', 'tb_plantInfo', '217', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('361', 'tb_plantInfo', '218', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('362', 'tb_plantInfo', '219', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('363', 'tb_plantInfo', '220', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('364', 'tb_plantInfo', '221', '2016-01-02 06:58:31', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('365', 'tb_plantInfo', '222', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('366', 'tb_plantInfo', '223', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('367', 'tb_plantInfo', '224', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('368', 'tb_plantInfo', '225', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('369', 'tb_plantInfo', '226', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('370', 'tb_plantInfo', '227', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('371', 'tb_plantInfo', '228', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('372', 'tb_plantInfo', '229', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('373', 'tb_plantInfo', '230', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('374', 'tb_plantInfo', '231', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('375', 'tb_plantInfo', '232', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('376', 'tb_plantInfo', '233', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('377', 'tb_plantInfo', '234', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('378', 'tb_plantInfo', '235', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('379', 'tb_plantInfo', '236', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('380', 'tb_plantInfo', '237', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('381', 'tb_plantInfo', '238', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('382', 'tb_plantInfo', '239', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('383', 'tb_plantInfo', '240', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('384', 'tb_plantInfo', '241', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('385', 'tb_plantInfo', '242', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('386', 'tb_plantInfo', '243', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('387', 'tb_plantInfo', '244', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('388', 'tb_plantInfo', '245', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('389', 'tb_plantInfo', '246', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('390', 'tb_plantInfo', '247', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('391', 'tb_plantInfo', '248', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('392', 'tb_plantInfo', '249', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('393', 'tb_plantInfo', '250', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('394', 'tb_plantInfo', '251', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('395', 'tb_plantInfo', '252', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('396', 'tb_plantInfo', '253', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('397', 'tb_plantInfo', '254', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('398', 'tb_plantInfo', '255', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('399', 'tb_plantInfo', '256', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('400', 'tb_plantInfo', '257', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('401', 'tb_plantInfo', '258', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('402', 'tb_plantInfo', '259', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('403', 'tb_plantInfo', '260', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('404', 'tb_plantInfo', '261', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('405', 'tb_plantInfo', '262', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('406', 'tb_plantInfo', '263', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('407', 'tb_plantInfo', '264', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('408', 'tb_plantInfo', '265', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('409', 'tb_plantInfo', '266', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('410', 'tb_plantInfo', '267', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('411', 'tb_plantInfo', '268', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('412', 'tb_plantInfo', '269', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('413', 'tb_plantInfo', '270', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('414', 'tb_plantInfo', '271', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('415', 'tb_plantInfo', '272', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('416', 'tb_plantInfo', '273', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('417', 'tb_plantInfo', '274', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('418', 'tb_plantInfo', '275', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('419', 'tb_plantInfo', '276', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('420', 'tb_plantInfo', '277', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('421', 'tb_plantInfo', '278', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('422', 'tb_plantInfo', '279', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('423', 'tb_plantInfo', '280', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('424', 'tb_plantInfo', '281', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('425', 'tb_plantInfo', '282', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('426', 'tb_plantInfo', '283', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('427', 'tb_plantInfo', '284', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('428', 'tb_plantInfo', '285', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('429', 'tb_plantInfo', '286', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('430', 'tb_plantInfo', '287', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('431', 'tb_plantInfo', '288', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('432', 'tb_plantInfo', '289', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('433', 'tb_plantInfo', '290', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('434', 'tb_plantInfo', '291', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('435', 'tb_plantInfo', '292', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('436', 'tb_plantInfo', '293', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('437', 'tb_plantInfo', '294', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('438', 'tb_plantInfo', '295', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('439', 'tb_plantInfo', '296', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('440', 'tb_plantInfo', '297', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('441', 'tb_plantInfo', '298', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('442', 'tb_plantInfo', '299', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('443', 'tb_plantInfo', '300', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('444', 'tb_plantInfo', '301', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('445', 'tb_plantInfo', '302', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('446', 'tb_plantInfo', '303', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('447', 'tb_plantInfo', '304', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('448', 'tb_plantInfo', '305', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('449', 'tb_plantInfo', '306', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('450', 'tb_plantInfo', '307', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('451', 'tb_plantInfo', '308', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('452', 'tb_plantInfo', '309', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('453', 'tb_plantInfo', '310', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('454', 'tb_plantInfo', '311', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('455', 'tb_plantInfo', '312', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('456', 'tb_plantInfo', '313', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('457', 'tb_plantInfo', '314', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('458', 'tb_plantInfo', '315', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('459', 'tb_plantInfo', '316', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('460', 'tb_plantInfo', '317', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('461', 'tb_plantInfo', '318', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('462', 'tb_plantInfo', '319', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('463', 'tb_plantInfo', '320', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('464', 'tb_plantInfo', '321', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('465', 'tb_plantInfo', '322', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('466', 'tb_plantInfo', '323', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('467', 'tb_plantInfo', '324', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('468', 'tb_plantInfo', '325', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('469', 'tb_plantInfo', '326', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('470', 'tb_plantInfo', '327', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('471', 'tb_plantInfo', '328', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('472', 'tb_plantInfo', '329', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('473', 'tb_plantInfo', '330', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('474', 'tb_plantInfo', '331', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('475', 'tb_plantInfo', '332', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('476', 'tb_plantInfo', '333', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('477', 'tb_plantInfo', '334', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('478', 'tb_plantInfo', '335', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('479', 'tb_plantInfo', '336', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('480', 'tb_plantInfo', '337', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('481', 'tb_plantInfo', '338', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('482', 'tb_plantInfo', '339', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('483', 'tb_plantInfo', '340', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('484', 'tb_plantInfo', '341', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('485', 'tb_plantInfo', '342', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('486', 'tb_plantInfo', '343', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('487', 'tb_plantInfo', '344', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('488', 'tb_plantInfo', '345', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('489', 'tb_plantInfo', '346', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('490', 'tb_plantInfo', '347', '2016-01-02 06:58:32', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('491', 'tb_plantInfo', '348', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('492', 'tb_plantInfo', '349', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('493', 'tb_plantInfo', '350', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('494', 'tb_plantInfo', '351', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('495', 'tb_plantInfo', '352', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('496', 'tb_plantInfo', '353', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('497', 'tb_plantInfo', '354', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('498', 'tb_plantInfo', '355', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('499', 'tb_plantInfo', '356', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('500', 'tb_plantInfo', '357', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('501', 'tb_plantInfo', '358', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('502', 'tb_plantInfo', '359', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('503', 'tb_plantInfo', '360', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('504', 'tb_plantInfo', '361', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('505', 'tb_plantInfo', '362', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('506', 'tb_plantInfo', '363', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('507', 'tb_plantInfo', '364', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('508', 'tb_plantInfo', '365', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('509', 'tb_plantInfo', '366', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('510', 'tb_plantInfo', '367', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('511', 'tb_plantInfo', '368', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('512', 'tb_plantInfo', '369', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('513', 'tb_plantInfo', '370', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('514', 'tb_plantInfo', '371', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('515', 'tb_plantInfo', '372', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('516', 'tb_plantInfo', '373', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('517', 'tb_plantInfo', '374', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('518', 'tb_plantInfo', '375', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('519', 'tb_plantInfo', '376', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('520', 'tb_plantInfo', '377', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('521', 'tb_plantInfo', '378', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('522', 'tb_plantInfo', '379', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('523', 'tb_plantInfo', '380', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('524', 'tb_plantInfo', '381', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('525', 'tb_plantInfo', '382', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('526', 'tb_plantInfo', '383', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('527', 'tb_plantInfo', '384', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('528', 'tb_plantInfo', '385', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('529', 'tb_plantInfo', '386', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('530', 'tb_plantInfo', '387', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('531', 'tb_plantInfo', '388', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('532', 'tb_plantInfo', '389', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('533', 'tb_plantInfo', '390', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('534', 'tb_plantInfo', '391', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('535', 'tb_plantInfo', '392', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('536', 'tb_plantInfo', '393', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('537', 'tb_plantInfo', '394', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('538', 'tb_plantInfo', '395', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('539', 'tb_plantInfo', '396', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('540', 'tb_plantInfo', '397', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('541', 'tb_plantInfo', '398', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('542', 'tb_plantInfo', '399', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('543', 'tb_plantInfo', '400', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('544', 'tb_plantInfo', '401', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('545', 'tb_plantInfo', '402', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('546', 'tb_plantInfo', '403', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('547', 'tb_plantInfo', '404', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('548', 'tb_plantInfo', '405', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('549', 'tb_plantInfo', '406', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('550', 'tb_plantInfo', '407', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('551', 'tb_plantInfo', '408', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('552', 'tb_plantInfo', '409', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('553', 'tb_plantInfo', '410', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('554', 'tb_plantInfo', '411', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('555', 'tb_plantInfo', '412', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('556', 'tb_plantInfo', '413', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('557', 'tb_plantInfo', '414', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('558', 'tb_plantInfo', '415', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('559', 'tb_plantInfo', '416', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('560', 'tb_plantInfo', '417', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('561', 'tb_plantInfo', '418', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('562', 'tb_plantInfo', '419', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('563', 'tb_plantInfo', '420', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('564', 'tb_plantInfo', '421', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('565', 'tb_plantInfo', '422', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('566', 'tb_plantInfo', '423', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('567', 'tb_plantInfo', '424', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('568', 'tb_plantInfo', '425', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('569', 'tb_plantInfo', '426', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('570', 'tb_plantInfo', '427', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('571', 'tb_plantInfo', '428', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('572', 'tb_plantInfo', '429', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('573', 'tb_plantInfo', '430', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('574', 'tb_plantInfo', '431', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('575', 'tb_plantInfo', '432', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('576', 'tb_plantInfo', '433', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('577', 'tb_plantInfo', '434', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('578', 'tb_plantInfo', '435', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('579', 'tb_plantInfo', '436', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('580', 'tb_plantInfo', '437', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('581', 'tb_plantInfo', '438', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('582', 'tb_plantInfo', '439', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('583', 'tb_plantInfo', '440', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('584', 'tb_plantInfo', '441', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('585', 'tb_plantInfo', '442', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('586', 'tb_plantInfo', '443', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('587', 'tb_plantInfo', '444', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('588', 'tb_plantInfo', '445', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('589', 'tb_plantInfo', '446', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('590', 'tb_plantInfo', '447', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('591', 'tb_plantInfo', '448', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('592', 'tb_plantInfo', '449', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('593', 'tb_plantInfo', '450', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('594', 'tb_plantInfo', '451', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('595', 'tb_plantInfo', '452', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('596', 'tb_plantInfo', '453', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('597', 'tb_plantInfo', '454', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('598', 'tb_plantInfo', '455', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('599', 'tb_plantInfo', '456', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('600', 'tb_plantInfo', '457', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('601', 'tb_plantInfo', '458', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('602', 'tb_plantInfo', '459', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('603', 'tb_plantInfo', '460', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('604', 'tb_plantInfo', '461', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('605', 'tb_plantInfo', '462', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('606', 'tb_plantInfo', '463', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('607', 'tb_plantInfo', '464', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('608', 'tb_plantInfo', '465', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('609', 'tb_plantInfo', '466', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('610', 'tb_plantInfo', '467', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('611', 'tb_plantInfo', '468', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('612', 'tb_plantInfo', '469', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('613', 'tb_plantInfo', '470', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('614', 'tb_plantInfo', '471', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('615', 'tb_plantInfo', '472', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('616', 'tb_plantInfo', '473', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('617', 'tb_plantInfo', '474', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('618', 'tb_plantInfo', '475', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('619', 'tb_plantInfo', '476', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('620', 'tb_plantInfo', '477', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('621', 'tb_plantInfo', '478', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('622', 'tb_plantInfo', '479', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('623', 'tb_plantInfo', '480', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('624', 'tb_plantInfo', '481', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('625', 'tb_plantInfo', '482', '2016-01-02 06:58:33', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('626', 'tb_plantInfo', '483', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('627', 'tb_plantInfo', '484', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('628', 'tb_plantInfo', '485', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('629', 'tb_plantInfo', '486', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('630', 'tb_plantInfo', '487', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('631', 'tb_plantInfo', '488', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('632', 'tb_plantInfo', '489', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('633', 'tb_plantInfo', '490', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('634', 'tb_plantInfo', '491', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('635', 'tb_plantInfo', '492', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('636', 'tb_plantInfo', '493', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('637', 'tb_plantInfo', '494', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('638', 'tb_plantInfo', '495', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('639', 'tb_plantInfo', '496', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('640', 'tb_plantInfo', '497', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('641', 'tb_plantInfo', '498', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('642', 'tb_plantInfo', '499', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('643', 'tb_plantInfo', '500', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('644', 'tb_plantInfo', '501', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('645', 'tb_plantInfo', '502', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('646', 'tb_plantInfo', '503', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('647', 'tb_plantInfo', '504', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('648', 'tb_plantInfo', '505', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('649', 'tb_plantInfo', '506', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('650', 'tb_plantInfo', '507', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('651', 'tb_plantInfo', '508', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('652', 'tb_plantInfo', '509', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('653', 'tb_plantInfo', '510', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('654', 'tb_plantInfo', '511', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('655', 'tb_plantInfo', '512', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('656', 'tb_plantInfo', '513', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('657', 'tb_plantInfo', '514', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('658', 'tb_plantInfo', '515', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('659', 'tb_plantInfo', '516', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('660', 'tb_plantInfo', '517', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('661', 'tb_plantInfo', '518', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('662', 'tb_plantInfo', '519', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('663', 'tb_plantInfo', '520', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('664', 'tb_plantInfo', '521', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('665', 'tb_plantInfo', '522', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('666', 'tb_plantInfo', '523', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('667', 'tb_plantInfo', '524', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('668', 'tb_plantInfo', '525', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('669', 'tb_plantInfo', '526', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('670', 'tb_plantInfo', '527', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('671', 'tb_plantInfo', '528', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('672', 'tb_plantInfo', '529', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('673', 'tb_plantInfo', '530', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('674', 'tb_plantInfo', '531', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('675', 'tb_plantInfo', '532', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('676', 'tb_plantInfo', '533', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('677', 'tb_plantInfo', '534', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('678', 'tb_plantInfo', '535', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('679', 'tb_plantInfo', '536', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('680', 'tb_plantInfo', '537', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('681', 'tb_plantInfo', '538', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('682', 'tb_plantInfo', '539', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('683', 'tb_plantInfo', '540', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('684', 'tb_plantInfo', '541', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('685', 'tb_plantInfo', '542', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('686', 'tb_plantInfo', '543', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('687', 'tb_plantInfo', '544', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('688', 'tb_plantInfo', '545', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('689', 'tb_plantInfo', '546', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('690', 'tb_plantInfo', '547', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('691', 'tb_plantInfo', '548', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('692', 'tb_plantInfo', '549', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('693', 'tb_plantInfo', '550', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('694', 'tb_plantInfo', '551', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('695', 'tb_plantInfo', '552', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('696', 'tb_plantInfo', '553', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('697', 'tb_plantInfo', '554', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('698', 'tb_plantInfo', '555', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('699', 'tb_plantInfo', '556', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('700', 'tb_plantInfo', '557', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('701', 'tb_plantInfo', '558', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('702', 'tb_plantInfo', '559', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('703', 'tb_plantInfo', '560', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('704', 'tb_plantInfo', '561', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('705', 'tb_plantInfo', '562', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('706', 'tb_plantInfo', '563', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('707', 'tb_plantInfo', '564', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('708', 'tb_plantInfo', '565', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('709', 'tb_plantInfo', '566', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('710', 'tb_plantInfo', '567', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('711', 'tb_plantInfo', '568', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('712', 'tb_plantInfo', '569', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('713', 'tb_plantInfo', '570', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('714', 'tb_plantInfo', '571', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('715', 'tb_plantInfo', '572', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('716', 'tb_plantInfo', '573', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('717', 'tb_plantInfo', '574', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('718', 'tb_plantInfo', '575', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('719', 'tb_plantInfo', '576', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('720', 'tb_plantInfo', '577', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('721', 'tb_plantInfo', '578', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('722', 'tb_plantInfo', '579', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('723', 'tb_plantInfo', '580', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('724', 'tb_plantInfo', '581', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('725', 'tb_plantInfo', '582', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('726', 'tb_plantInfo', '583', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('727', 'tb_plantInfo', '584', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('728', 'tb_plantInfo', '585', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('729', 'tb_plantInfo', '586', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('730', 'tb_plantInfo', '587', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('731', 'tb_plantInfo', '588', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('732', 'tb_plantInfo', '589', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('733', 'tb_plantInfo', '590', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('734', 'tb_plantInfo', '591', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('735', 'tb_plantInfo', '592', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('736', 'tb_plantInfo', '593', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('737', 'tb_plantInfo', '594', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('738', 'tb_plantInfo', '595', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('739', 'tb_plantInfo', '596', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('740', 'tb_plantInfo', '597', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('741', 'tb_plantInfo', '598', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('742', 'tb_plantInfo', '599', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('743', 'tb_plantInfo', '600', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('744', 'tb_plantInfo', '601', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('745', 'tb_plantInfo', '602', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('746', 'tb_plantInfo', '603', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('747', 'tb_plantInfo', '604', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('748', 'tb_plantInfo', '605', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('749', 'tb_plantInfo', '606', '2016-01-02 06:58:34', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('750', 'tb_plantInfo', '607', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('751', 'tb_plantInfo', '608', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('752', 'tb_plantInfo', '609', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('753', 'tb_plantInfo', '610', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('754', 'tb_plantInfo', '611', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('755', 'tb_plantInfo', '612', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('756', 'tb_plantInfo', '613', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('757', 'tb_plantInfo', '614', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('758', 'tb_plantInfo', '615', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('759', 'tb_plantInfo', '616', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('760', 'tb_plantInfo', '617', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('761', 'tb_plantInfo', '618', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('762', 'tb_plantInfo', '619', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('763', 'tb_plantInfo', '620', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('764', 'tb_plantInfo', '621', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('765', 'tb_plantInfo', '622', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('766', 'tb_plantInfo', '623', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('767', 'tb_plantInfo', '624', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('768', 'tb_plantInfo', '625', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('769', 'tb_plantInfo', '626', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('770', 'tb_plantInfo', '627', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('771', 'tb_plantInfo', '628', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('772', 'tb_plantInfo', '629', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('773', 'tb_plantInfo', '630', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('774', 'tb_plantInfo', '631', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('775', 'tb_plantInfo', '632', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('776', 'tb_plantInfo', '633', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('777', 'tb_plantInfo', '634', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('778', 'tb_plantInfo', '635', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('779', 'tb_plantInfo', '636', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('780', 'tb_plantInfo', '637', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('781', 'tb_plantInfo', '638', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('782', 'tb_plantInfo', '639', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('783', 'tb_plantInfo', '640', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('784', 'tb_plantInfo', '641', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('785', 'tb_plantInfo', '642', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('786', 'tb_plantInfo', '643', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('787', 'tb_plantInfo', '644', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('788', 'tb_plantInfo', '645', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('789', 'tb_plantInfo', '646', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('790', 'tb_plantInfo', '647', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('791', 'tb_plantInfo', '648', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('792', 'tb_plantInfo', '649', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('793', 'tb_plantInfo', '650', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('794', 'tb_plantInfo', '651', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('795', 'tb_plantInfo', '652', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('796', 'tb_plantInfo', '653', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('797', 'tb_plantInfo', '654', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('798', 'tb_plantInfo', '655', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('799', 'tb_plantInfo', '656', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('800', 'tb_plantInfo', '657', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('801', 'tb_plantInfo', '658', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('802', 'tb_plantInfo', '659', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('803', 'tb_plantInfo', '660', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('804', 'tb_plantInfo', '661', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('805', 'tb_plantInfo', '662', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('806', 'tb_plantInfo', '663', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('807', 'tb_plantInfo', '664', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('808', 'tb_plantInfo', '665', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('809', 'tb_plantInfo', '666', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('810', 'tb_plantInfo', '667', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('811', 'tb_plantInfo', '668', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('812', 'tb_plantInfo', '669', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('813', 'tb_plantInfo', '670', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('814', 'tb_plantInfo', '671', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('815', 'tb_plantInfo', '672', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('816', 'tb_plantInfo', '673', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('817', 'tb_plantInfo', '674', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('818', 'tb_plantInfo', '675', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('819', 'tb_plantInfo', '676', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('820', 'tb_plantInfo', '677', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('821', 'tb_plantInfo', '678', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('822', 'tb_plantInfo', '679', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('823', 'tb_plantInfo', '680', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('824', 'tb_plantInfo', '681', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('825', 'tb_plantInfo', '682', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('826', 'tb_plantInfo', '683', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('827', 'tb_plantInfo', '684', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('828', 'tb_plantInfo', '685', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('829', 'tb_plantInfo', '686', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('830', 'tb_plantInfo', '687', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('831', 'tb_plantInfo', '688', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('832', 'tb_plantInfo', '689', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('833', 'tb_plantInfo', '690', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('834', 'tb_plantInfo', '691', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('835', 'tb_plantInfo', '692', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('836', 'tb_plantInfo', '693', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('837', 'tb_plantInfo', '694', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('838', 'tb_plantInfo', '695', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('839', 'tb_plantInfo', '696', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('840', 'tb_plantInfo', '697', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('841', 'tb_plantInfo', '698', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('842', 'tb_plantInfo', '699', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('843', 'tb_plantInfo', '700', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('844', 'tb_plantInfo', '701', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('845', 'tb_plantInfo', '702', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('846', 'tb_plantInfo', '703', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('847', 'tb_plantInfo', '704', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('848', 'tb_plantInfo', '705', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('849', 'tb_plantInfo', '706', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('850', 'tb_plantInfo', '707', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('851', 'tb_plantInfo', '708', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('852', 'tb_plantInfo', '709', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('853', 'tb_plantInfo', '710', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('854', 'tb_plantInfo', '711', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('855', 'tb_plantInfo', '712', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('856', 'tb_plantInfo', '713', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('857', 'tb_plantInfo', '714', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('858', 'tb_plantInfo', '715', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('859', 'tb_plantInfo', '716', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('860', 'tb_plantInfo', '717', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('861', 'tb_plantInfo', '718', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('862', 'tb_plantInfo', '719', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('863', 'tb_plantInfo', '720', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('864', 'tb_plantInfo', '721', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('865', 'tb_plantInfo', '722', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('866', 'tb_plantInfo', '723', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('867', 'tb_plantInfo', '724', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('868', 'tb_plantInfo', '725', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('869', 'tb_plantInfo', '726', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('870', 'tb_plantInfo', '727', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('871', 'tb_plantInfo', '728', '2016-01-02 06:58:35', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('872', 'tb_plantInfo', '729', '2016-01-02 06:58:36', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('873', 'tb_plantInfo', '730', '2016-01-02 06:58:36', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('874', 'tb_plantInfo', '731', '2016-01-02 06:58:36', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('875', 'tb_plantInfo', '732', '2016-01-02 06:58:36', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('876', 'tb_plantInfo', '733', '2016-01-02 06:58:36', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('877', 'tb_measurethicknessrecord_origin', '12', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('878', 'tb_measurethicknessrecord_origin', '13', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('879', 'tb_measurethicknessrecord_origin', '14', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('880', 'tb_measurethicknessrecord_origin', '15', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('881', 'tb_measurethicknessrecord_origin', '16', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('882', 'tb_measurethicknessrecord_origin', '17', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('883', 'tb_measurethicknessrecord_origin', '18', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('884', 'tb_measurethicknessrecord_origin', '19', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('885', 'tb_measurethicknessrecord_origin', '20', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('886', 'tb_measurethicknessrecord_origin', '21', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('887', 'tb_measurethicknessrecord_origin', '22', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('888', 'tb_measurethicknessrecord_origin', '23', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('889', 'tb_measurethicknessrecord_origin', '24', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('890', 'tb_measurethicknessrecord_origin', '25', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('891', 'tb_measurethicknessrecord_origin', '26', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('892', 'tb_measurethicknessrecord_origin', '27', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('893', 'tb_measurethicknessrecord_origin', '28', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('894', 'tb_measurethicknessrecord_origin', '29', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('895', 'tb_measurethicknessrecord_origin', '30', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('896', 'tb_measurethicknessrecord_origin', '31', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('897', 'tb_measurethicknessrecord_origin', '32', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('898', 'tb_measurethicknessrecord_origin', '33', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('899', 'tb_measurethicknessrecord_origin', '34', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('900', 'tb_measurethicknessrecord_origin', '35', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('901', 'tb_measurethicknessrecord_origin', '36', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('902', 'tb_measurethicknessrecord_origin', '37', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('903', 'tb_measurethicknessrecord_origin', '38', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('904', 'tb_measurethicknessrecord_origin', '39', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('905', 'tb_measurethicknessrecord_origin', '40', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('906', 'tb_measurethicknessrecord_origin', '41', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('907', 'tb_measurethicknessrecord_origin', '42', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('908', 'tb_measurethicknessrecord_origin', '43', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('909', 'tb_measurethicknessrecord_origin', '44', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('910', 'tb_measurethicknessrecord_origin', '45', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('911', 'tb_measurethicknessrecord_origin', '46', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('912', 'tb_measurethicknessrecord_origin', '47', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('913', 'tb_measurethicknessrecord_origin', '48', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('914', 'tb_measurethicknessrecord_origin', '49', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('915', 'tb_measurethicknessrecord_origin', '50', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('916', 'tb_measurethicknessrecord_origin', '51', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('917', 'tb_measurethicknessrecord_origin', '52', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('918', 'tb_measurethicknessrecord_origin', '53', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('919', 'tb_measurethicknessrecord_origin', '54', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('920', 'tb_measurethicknessrecord_origin', '55', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('921', 'tb_measurethicknessrecord_origin', '56', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('922', 'tb_measurethicknessrecord_origin', '57', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('923', 'tb_measurethicknessrecord_origin', '58', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('924', 'tb_measurethicknessrecord_origin', '59', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('925', 'tb_measurethicknessrecord_origin', '60', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('926', 'tb_measurethicknessrecord_origin', '61', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('927', 'tb_measurethicknessrecord_origin', '62', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('928', 'tb_measurethicknessrecord_origin', '63', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('929', 'tb_measurethicknessrecord_origin', '64', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('930', 'tb_measurethicknessrecord_origin', '65', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('931', 'tb_measurethicknessrecord_origin', '66', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('932', 'tb_measurethicknessrecord_origin', '67', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('933', 'tb_measurethicknessrecord_origin', '68', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('934', 'tb_measurethicknessrecord_origin', '69', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('935', 'tb_measurethicknessrecord_origin', '70', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('936', 'tb_measurethicknessrecord_origin', '71', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('937', 'tb_measurethicknessrecord_origin', '72', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('938', 'tb_measurethicknessrecord_origin', '73', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('939', 'tb_measurethicknessrecord_origin', '74', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('940', 'tb_measurethicknessrecord_origin', '75', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('941', 'tb_measurethicknessrecord_origin', '76', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('942', 'tb_measurethicknessrecord_origin', '77', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('943', 'tb_measurethicknessrecord_origin', '78', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('944', 'tb_measurethicknessrecord_origin', '79', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('945', 'tb_measurethicknessrecord_origin', '80', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('946', 'tb_measurethicknessrecord_origin', '81', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('947', 'tb_measurethicknessrecord_origin', '82', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('948', 'tb_measurethicknessrecord_origin', '83', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('949', 'tb_measurethicknessrecord_origin', '84', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('950', 'tb_measurethicknessrecord_origin', '85', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('951', 'tb_measurethicknessrecord_origin', '86', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('952', 'tb_measurethicknessrecord_origin', '87', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('953', 'tb_measurethicknessrecord_origin', '88', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('954', 'tb_measurethicknessrecord_origin', '89', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('955', 'tb_measurethicknessrecord_origin', '90', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('956', 'tb_measurethicknessrecord_origin', '91', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('957', 'tb_measurethicknessrecord_origin', '92', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('958', 'tb_measurethicknessrecord_origin', '93', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('959', 'tb_measurethicknessrecord_origin', '94', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('960', 'tb_measurethicknessrecord_origin', '95', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('961', 'tb_measurethicknessrecord_origin', '96', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('962', 'tb_measurethicknessrecord_origin', '97', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('963', 'tb_measurethicknessrecord_origin', '98', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('964', 'tb_measurethicknessrecord_origin', '99', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('965', 'tb_measurethicknessrecord_origin', '100', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('966', 'tb_measurethicknessrecord_origin', '101', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('967', 'tb_measurethicknessrecord_origin', '102', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('968', 'tb_measurethicknessrecord_origin', '103', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('969', 'tb_measurethicknessrecord_origin', '104', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('970', 'tb_measurethicknessrecord_origin', '105', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('971', 'tb_measurethicknessrecord_origin', '106', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('972', 'tb_measurethicknessrecord_origin', '107', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('973', 'tb_measurethicknessrecord_origin', '108', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('974', 'tb_measurethicknessrecord_origin', '109', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('975', 'tb_measurethicknessrecord_origin', '110', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('976', 'tb_measurethicknessrecord_origin', '111', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('977', 'tb_measurethicknessrecord_origin', '112', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('978', 'tb_measurethicknessrecord_origin', '113', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('979', 'tb_measurethicknessrecord_origin', '114', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('980', 'tb_measurethicknessrecord_origin', '115', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('981', 'tb_measurethicknessrecord_origin', '116', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('982', 'tb_measurethicknessrecord_origin', '117', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('983', 'tb_measurethicknessrecord_origin', '118', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('984', 'tb_measurethicknessrecord_origin', '119', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('985', 'tb_measurethicknessrecord_origin', '120', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('986', 'tb_measurethicknessrecord_origin', '121', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('987', 'tb_measurethicknessrecord_origin', '122', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('988', 'tb_measurethicknessrecord_origin', '123', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('989', 'tb_measurethicknessrecord_origin', '124', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('990', 'tb_measurethicknessrecord_origin', '125', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('991', 'tb_measurethicknessrecord_origin', '126', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('992', 'tb_measurethicknessrecord_origin', '127', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('993', 'tb_measurethicknessrecord_origin', '128', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('994', 'tb_measurethicknessrecord_origin', '129', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('995', 'tb_measurethicknessrecord_origin', '130', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('996', 'tb_measurethicknessrecord_origin', '131', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('997', 'tb_measurethicknessrecord_origin', '132', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('998', 'tb_measurethicknessrecord_origin', '133', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('999', 'tb_measurethicknessrecord_origin', '134', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1000', 'tb_measurethicknessrecord_origin', '135', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1001', 'tb_measurethicknessrecord_origin', '136', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1002', 'tb_measurethicknessrecord_origin', '137', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1003', 'tb_measurethicknessrecord_origin', '138', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1004', 'tb_measurethicknessrecord_origin', '139', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1005', 'tb_measurethicknessrecord_origin', '140', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1006', 'tb_measurethicknessrecord_origin', '141', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1007', 'tb_measurethicknessrecord_origin', '142', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1008', 'tb_measurethicknessrecord_origin', '143', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1009', 'tb_measurethicknessrecord_origin', '144', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1010', 'tb_measurethicknessrecord_origin', '145', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1011', 'tb_measurethicknessrecord_origin', '146', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1012', 'tb_measurethicknessrecord_origin', '147', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1013', 'tb_measurethicknessrecord_origin', '148', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1014', 'tb_measurethicknessrecord_origin', '149', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1015', 'tb_measurethicknessrecord_origin', '150', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1016', 'tb_measurethicknessrecord_origin', '151', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1017', 'tb_measurethicknessrecord_origin', '152', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1018', 'tb_measurethicknessrecord_origin', '153', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1019', 'tb_measurethicknessrecord_origin', '154', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1020', 'tb_measurethicknessrecord_origin', '155', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1021', 'tb_measurethicknessrecord_origin', '156', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1022', 'tb_measurethicknessrecord_origin', '157', '2016-01-02 07:01:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1023', 'tb_measurethicknessrecord_origin', '158', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1024', 'tb_measurethicknessrecord_origin', '159', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1025', 'tb_measurethicknessrecord_origin', '160', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1026', 'tb_measurethicknessrecord_origin', '161', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1027', 'tb_measurethicknessrecord_origin', '162', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1028', 'tb_measurethicknessrecord_origin', '163', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1029', 'tb_measurethicknessrecord_origin', '164', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1030', 'tb_measurethicknessrecord_origin', '165', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1031', 'tb_measurethicknessrecord_origin', '166', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1032', 'tb_measurethicknessrecord_origin', '167', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1033', 'tb_measurethicknessrecord_origin', '168', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1034', 'tb_measurethicknessrecord_origin', '169', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1035', 'tb_measurethicknessrecord_origin', '170', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1036', 'tb_measurethicknessrecord_origin', '171', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1037', 'tb_measurethicknessrecord_origin', '172', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1038', 'tb_measurethicknessrecord_origin', '173', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1039', 'tb_measurethicknessrecord_origin', '174', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1040', 'tb_measurethicknessrecord_origin', '175', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1041', 'tb_measurethicknessrecord_origin', '176', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1042', 'tb_measurethicknessrecord_origin', '177', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1043', 'tb_measurethicknessrecord_origin', '178', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1044', 'tb_measurethicknessrecord_origin', '179', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1045', 'tb_measurethicknessrecord_origin', '180', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1046', 'tb_measurethicknessrecord_origin', '181', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1047', 'tb_measurethicknessrecord_origin', '182', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1048', 'tb_measurethicknessrecord_origin', '183', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1049', 'tb_measurethicknessrecord_origin', '184', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1050', 'tb_measurethicknessrecord_origin', '185', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1051', 'tb_measurethicknessrecord_origin', '186', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1052', 'tb_measurethicknessrecord_origin', '187', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1053', 'tb_measurethicknessrecord_origin', '188', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1054', 'tb_measurethicknessrecord_origin', '189', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1055', 'tb_measurethicknessrecord_origin', '190', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1056', 'tb_measurethicknessrecord_origin', '191', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1057', 'tb_measurethicknessrecord_origin', '192', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1058', 'tb_measurethicknessrecord_origin', '193', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1059', 'tb_measurethicknessrecord_origin', '194', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1060', 'tb_measurethicknessrecord_origin', '195', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1061', 'tb_measurethicknessrecord_origin', '196', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1062', 'tb_measurethicknessrecord_origin', '197', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1063', 'tb_measurethicknessrecord_origin', '198', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1064', 'tb_measurethicknessrecord_origin', '199', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1065', 'tb_measurethicknessrecord_origin', '200', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1066', 'tb_measurethicknessrecord_origin', '201', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1067', 'tb_measurethicknessrecord_origin', '202', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1068', 'tb_measurethicknessrecord_origin', '203', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1069', 'tb_measurethicknessrecord_origin', '204', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1070', 'tb_measurethicknessrecord_origin', '205', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1071', 'tb_measurethicknessrecord_origin', '206', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1072', 'tb_measurethicknessrecord_origin', '207', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1073', 'tb_measurethicknessrecord_origin', '208', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1074', 'tb_measurethicknessrecord_origin', '209', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1075', 'tb_measurethicknessrecord_origin', '210', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1076', 'tb_measurethicknessrecord_origin', '211', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1077', 'tb_measurethicknessrecord_origin', '212', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1078', 'tb_measurethicknessrecord_origin', '213', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1079', 'tb_measurethicknessrecord_origin', '214', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1080', 'tb_measurethicknessrecord_origin', '215', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1081', 'tb_measurethicknessrecord_origin', '216', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1082', 'tb_measurethicknessrecord_origin', '217', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1083', 'tb_measurethicknessrecord_origin', '218', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1084', 'tb_measurethicknessrecord_origin', '219', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1085', 'tb_measurethicknessrecord_origin', '220', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1086', 'tb_measurethicknessrecord_origin', '221', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1087', 'tb_measurethicknessrecord_origin', '222', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1088', 'tb_measurethicknessrecord_origin', '223', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1089', 'tb_measurethicknessrecord_origin', '224', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1090', 'tb_measurethicknessrecord_origin', '225', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1091', 'tb_measurethicknessrecord_origin', '226', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1092', 'tb_measurethicknessrecord_origin', '227', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1093', 'tb_measurethicknessrecord_origin', '228', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1094', 'tb_measurethicknessrecord_origin', '229', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1095', 'tb_measurethicknessrecord_origin', '230', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1096', 'tb_measurethicknessrecord_origin', '231', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1097', 'tb_measurethicknessrecord_origin', '232', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1098', 'tb_measurethicknessrecord_origin', '233', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1099', 'tb_measurethicknessrecord_origin', '234', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1100', 'tb_measurethicknessrecord_origin', '235', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1101', 'tb_measurethicknessrecord_origin', '236', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1102', 'tb_measurethicknessrecord_origin', '237', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1103', 'tb_measurethicknessrecord_origin', '238', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1104', 'tb_measurethicknessrecord_origin', '239', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1105', 'tb_measurethicknessrecord_origin', '240', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1106', 'tb_measurethicknessrecord_origin', '241', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1107', 'tb_measurethicknessrecord_origin', '242', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1108', 'tb_measurethicknessrecord_origin', '243', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1109', 'tb_measurethicknessrecord_origin', '244', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1110', 'tb_measurethicknessrecord_origin', '245', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1111', 'tb_measurethicknessrecord_origin', '246', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1112', 'tb_measurethicknessrecord_origin', '247', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1113', 'tb_measurethicknessrecord_origin', '248', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1114', 'tb_measurethicknessrecord_origin', '249', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1115', 'tb_measurethicknessrecord_origin', '250', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1116', 'tb_measurethicknessrecord_origin', '251', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1117', 'tb_measurethicknessrecord_origin', '252', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1118', 'tb_measurethicknessrecord_origin', '253', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1119', 'tb_measurethicknessrecord_origin', '254', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1120', 'tb_measurethicknessrecord_origin', '255', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1121', 'tb_measurethicknessrecord_origin', '256', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1122', 'tb_measurethicknessrecord_origin', '257', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1123', 'tb_measurethicknessrecord_origin', '258', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1124', 'tb_measurethicknessrecord_origin', '259', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1125', 'tb_measurethicknessrecord_origin', '260', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1126', 'tb_measurethicknessrecord_origin', '261', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1127', 'tb_measurethicknessrecord_origin', '262', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1128', 'tb_measurethicknessrecord_origin', '263', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1129', 'tb_measurethicknessrecord_origin', '264', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1130', 'tb_measurethicknessrecord_origin', '265', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1131', 'tb_measurethicknessrecord_origin', '266', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1132', 'tb_measurethicknessrecord_origin', '267', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1133', 'tb_measurethicknessrecord_origin', '268', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1134', 'tb_measurethicknessrecord_origin', '269', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1135', 'tb_measurethicknessrecord_origin', '270', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1136', 'tb_measurethicknessrecord_origin', '271', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1137', 'tb_measurethicknessrecord_origin', '272', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1138', 'tb_measurethicknessrecord_origin', '273', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1139', 'tb_measurethicknessrecord_origin', '274', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1140', 'tb_measurethicknessrecord_origin', '275', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1141', 'tb_measurethicknessrecord_origin', '276', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1142', 'tb_measurethicknessrecord_origin', '277', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1143', 'tb_measurethicknessrecord_origin', '278', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1144', 'tb_measurethicknessrecord_origin', '279', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1145', 'tb_measurethicknessrecord_origin', '280', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1146', 'tb_measurethicknessrecord_origin', '281', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1147', 'tb_measurethicknessrecord_origin', '282', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1148', 'tb_measurethicknessrecord_origin', '283', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1149', 'tb_measurethicknessrecord_origin', '284', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1150', 'tb_measurethicknessrecord_origin', '285', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1151', 'tb_measurethicknessrecord_origin', '286', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1152', 'tb_measurethicknessrecord_origin', '287', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1153', 'tb_measurethicknessrecord_origin', '288', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1154', 'tb_measurethicknessrecord_origin', '289', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1155', 'tb_measurethicknessrecord_origin', '290', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1156', 'tb_measurethicknessrecord_origin', '291', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1157', 'tb_measurethicknessrecord_origin', '292', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1158', 'tb_measurethicknessrecord_origin', '293', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1159', 'tb_measurethicknessrecord_origin', '294', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1160', 'tb_measurethicknessrecord_origin', '295', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1161', 'tb_measurethicknessrecord_origin', '296', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1162', 'tb_measurethicknessrecord_origin', '297', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1163', 'tb_measurethicknessrecord_origin', '298', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1164', 'tb_measurethicknessrecord_origin', '299', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1165', 'tb_measurethicknessrecord_origin', '300', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1166', 'tb_measurethicknessrecord_origin', '301', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1167', 'tb_measurethicknessrecord_origin', '302', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1168', 'tb_measurethicknessrecord_origin', '303', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1169', 'tb_measurethicknessrecord_origin', '304', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1170', 'tb_measurethicknessrecord_origin', '305', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1171', 'tb_measurethicknessrecord_origin', '306', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1172', 'tb_measurethicknessrecord_origin', '307', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1173', 'tb_measurethicknessrecord_origin', '308', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1174', 'tb_measurethicknessrecord_origin', '309', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1175', 'tb_measurethicknessrecord_origin', '310', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1176', 'tb_measurethicknessrecord_origin', '311', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1177', 'tb_measurethicknessrecord_origin', '312', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1178', 'tb_measurethicknessrecord_origin', '313', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1179', 'tb_measurethicknessrecord_origin', '314', '2016-01-02 07:01:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1180', 'tb_measurethicknessrecord_origin', '315', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1181', 'tb_measurethicknessrecord_origin', '316', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1182', 'tb_measurethicknessrecord_origin', '317', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1183', 'tb_measurethicknessrecord_origin', '318', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1184', 'tb_measurethicknessrecord_origin', '319', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1185', 'tb_measurethicknessrecord_origin', '320', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1186', 'tb_measurethicknessrecord_origin', '321', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1187', 'tb_measurethicknessrecord_origin', '322', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1188', 'tb_measurethicknessrecord_origin', '323', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1189', 'tb_measurethicknessrecord_origin', '324', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1190', 'tb_measurethicknessrecord_origin', '325', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1191', 'tb_measurethicknessrecord_origin', '326', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1192', 'tb_measurethicknessrecord_origin', '327', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1193', 'tb_measurethicknessrecord_origin', '328', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1194', 'tb_measurethicknessrecord_origin', '329', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1195', 'tb_measurethicknessrecord_origin', '330', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1196', 'tb_measurethicknessrecord_origin', '331', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1197', 'tb_measurethicknessrecord_origin', '332', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1198', 'tb_measurethicknessrecord_origin', '333', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1199', 'tb_measurethicknessrecord_origin', '334', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1200', 'tb_measurethicknessrecord_origin', '335', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1201', 'tb_measurethicknessrecord_origin', '336', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1202', 'tb_measurethicknessrecord_origin', '337', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1203', 'tb_measurethicknessrecord_origin', '338', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1204', 'tb_measurethicknessrecord_origin', '339', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1205', 'tb_measurethicknessrecord_origin', '340', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1206', 'tb_measurethicknessrecord_origin', '341', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1207', 'tb_measurethicknessrecord_origin', '342', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1208', 'tb_measurethicknessrecord_origin', '343', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1209', 'tb_measurethicknessrecord_origin', '344', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1210', 'tb_measurethicknessrecord_origin', '345', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1211', 'tb_measurethicknessrecord_origin', '346', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1212', 'tb_measurethicknessrecord_origin', '347', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1213', 'tb_measurethicknessrecord_origin', '348', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1214', 'tb_measurethicknessrecord_origin', '349', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1215', 'tb_measurethicknessrecord_origin', '350', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1216', 'tb_measurethicknessrecord_origin', '351', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1217', 'tb_measurethicknessrecord_origin', '352', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1218', 'tb_measurethicknessrecord_origin', '353', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1219', 'tb_measurethicknessrecord_origin', '354', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1220', 'tb_measurethicknessrecord_origin', '355', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1221', 'tb_measurethicknessrecord_origin', '356', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1222', 'tb_measurethicknessrecord_origin', '357', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1223', 'tb_measurethicknessrecord_origin', '358', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1224', 'tb_measurethicknessrecord_origin', '359', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1225', 'tb_measurethicknessrecord_origin', '360', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1226', 'tb_measurethicknessrecord_origin', '361', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1227', 'tb_measurethicknessrecord_origin', '362', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1228', 'tb_measurethicknessrecord_origin', '363', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1229', 'tb_measurethicknessrecord_origin', '364', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1230', 'tb_measurethicknessrecord_origin', '365', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1231', 'tb_measurethicknessrecord_origin', '366', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1232', 'tb_measurethicknessrecord_origin', '367', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1233', 'tb_measurethicknessrecord_origin', '368', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1234', 'tb_measurethicknessrecord_origin', '369', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1235', 'tb_measurethicknessrecord_origin', '370', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1236', 'tb_measurethicknessrecord_origin', '371', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1237', 'tb_measurethicknessrecord_origin', '372', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1238', 'tb_measurethicknessrecord_origin', '373', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1239', 'tb_measurethicknessrecord_origin', '374', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1240', 'tb_measurethicknessrecord_origin', '375', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1241', 'tb_measurethicknessrecord_origin', '376', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1242', 'tb_measurethicknessrecord_origin', '377', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1243', 'tb_measurethicknessrecord_origin', '378', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1244', 'tb_measurethicknessrecord_origin', '379', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1245', 'tb_measurethicknessrecord_origin', '380', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1246', 'tb_measurethicknessrecord_origin', '381', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1247', 'tb_measurethicknessrecord_origin', '382', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1248', 'tb_measurethicknessrecord_origin', '383', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1249', 'tb_measurethicknessrecord_origin', '384', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1250', 'tb_measurethicknessrecord_origin', '385', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1251', 'tb_measurethicknessrecord_origin', '386', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1252', 'tb_measurethicknessrecord_origin', '387', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1253', 'tb_measurethicknessrecord_origin', '388', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1254', 'tb_measurethicknessrecord_origin', '389', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1255', 'tb_measurethicknessrecord_origin', '390', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1256', 'tb_measurethicknessrecord_origin', '391', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1257', 'tb_measurethicknessrecord_origin', '392', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1258', 'tb_measurethicknessrecord_origin', '393', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1259', 'tb_measurethicknessrecord_origin', '394', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1260', 'tb_measurethicknessrecord_origin', '395', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1261', 'tb_measurethicknessrecord_origin', '396', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1262', 'tb_measurethicknessrecord_origin', '397', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1263', 'tb_measurethicknessrecord_origin', '398', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1264', 'tb_measurethicknessrecord_origin', '399', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1265', 'tb_measurethicknessrecord_origin', '400', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1266', 'tb_measurethicknessrecord_origin', '401', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1267', 'tb_measurethicknessrecord_origin', '402', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1268', 'tb_measurethicknessrecord_origin', '403', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1269', 'tb_measurethicknessrecord_origin', '404', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1270', 'tb_measurethicknessrecord_origin', '405', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1271', 'tb_measurethicknessrecord_origin', '406', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1272', 'tb_measurethicknessrecord_origin', '407', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1273', 'tb_measurethicknessrecord_origin', '408', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1274', 'tb_measurethicknessrecord_origin', '409', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1275', 'tb_measurethicknessrecord_origin', '410', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1276', 'tb_measurethicknessrecord_origin', '411', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1277', 'tb_measurethicknessrecord_origin', '412', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1278', 'tb_measurethicknessrecord_origin', '413', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1279', 'tb_measurethicknessrecord_origin', '414', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1280', 'tb_measurethicknessrecord_origin', '415', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1281', 'tb_measurethicknessrecord_origin', '416', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1282', 'tb_measurethicknessrecord_origin', '417', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1283', 'tb_measurethicknessrecord_origin', '418', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1284', 'tb_measurethicknessrecord_origin', '419', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1285', 'tb_measurethicknessrecord_origin', '420', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1286', 'tb_measurethicknessrecord_origin', '421', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1287', 'tb_measurethicknessrecord_origin', '422', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1288', 'tb_measurethicknessrecord_origin', '423', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1289', 'tb_measurethicknessrecord_origin', '424', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1290', 'tb_measurethicknessrecord_origin', '425', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1291', 'tb_measurethicknessrecord_origin', '426', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1292', 'tb_measurethicknessrecord_origin', '427', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1293', 'tb_measurethicknessrecord_origin', '428', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1294', 'tb_measurethicknessrecord_origin', '429', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1295', 'tb_measurethicknessrecord_origin', '430', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1296', 'tb_measurethicknessrecord_origin', '431', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1297', 'tb_measurethicknessrecord_origin', '432', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1298', 'tb_measurethicknessrecord_origin', '433', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1299', 'tb_measurethicknessrecord_origin', '434', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1300', 'tb_measurethicknessrecord_origin', '435', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1301', 'tb_measurethicknessrecord_origin', '436', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1302', 'tb_measurethicknessrecord_origin', '437', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1303', 'tb_measurethicknessrecord_origin', '438', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1304', 'tb_measurethicknessrecord_origin', '439', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1305', 'tb_measurethicknessrecord_origin', '440', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1306', 'tb_measurethicknessrecord_origin', '441', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1307', 'tb_measurethicknessrecord_origin', '442', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1308', 'tb_measurethicknessrecord_origin', '443', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1309', 'tb_measurethicknessrecord_origin', '444', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1310', 'tb_measurethicknessrecord_origin', '445', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1311', 'tb_measurethicknessrecord_origin', '446', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1312', 'tb_measurethicknessrecord_origin', '447', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1313', 'tb_measurethicknessrecord_origin', '448', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1314', 'tb_measurethicknessrecord_origin', '449', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1315', 'tb_measurethicknessrecord_origin', '450', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1316', 'tb_measurethicknessrecord_origin', '451', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1317', 'tb_measurethicknessrecord_origin', '452', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1318', 'tb_measurethicknessrecord_origin', '453', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1319', 'tb_measurethicknessrecord_origin', '454', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1320', 'tb_measurethicknessrecord_origin', '455', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1321', 'tb_measurethicknessrecord_origin', '456', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1322', 'tb_measurethicknessrecord_origin', '457', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1323', 'tb_measurethicknessrecord_origin', '458', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1324', 'tb_measurethicknessrecord_origin', '459', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1325', 'tb_measurethicknessrecord_origin', '460', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1326', 'tb_measurethicknessrecord_origin', '461', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1327', 'tb_measurethicknessrecord_origin', '462', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1328', 'tb_measurethicknessrecord_origin', '463', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1329', 'tb_measurethicknessrecord_origin', '464', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1330', 'tb_measurethicknessrecord_origin', '465', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1331', 'tb_measurethicknessrecord_origin', '466', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1332', 'tb_measurethicknessrecord_origin', '467', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1333', 'tb_measurethicknessrecord_origin', '468', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1334', 'tb_measurethicknessrecord_origin', '469', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1335', 'tb_measurethicknessrecord_origin', '470', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1336', 'tb_measurethicknessrecord_origin', '471', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1337', 'tb_measurethicknessrecord_origin', '472', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1338', 'tb_measurethicknessrecord_origin', '473', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1339', 'tb_measurethicknessrecord_origin', '474', '2016-01-02 07:01:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1340', 'tb_measurethicknessrecord_origin', '475', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1341', 'tb_measurethicknessrecord_origin', '476', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1342', 'tb_measurethicknessrecord_origin', '477', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1343', 'tb_measurethicknessrecord_origin', '478', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1344', 'tb_measurethicknessrecord_origin', '479', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1345', 'tb_measurethicknessrecord_origin', '480', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1346', 'tb_measurethicknessrecord_origin', '481', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1347', 'tb_measurethicknessrecord_origin', '482', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1348', 'tb_measurethicknessrecord_origin', '483', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1349', 'tb_measurethicknessrecord_origin', '484', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1350', 'tb_measurethicknessrecord_origin', '485', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1351', 'tb_measurethicknessrecord_origin', '486', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1352', 'tb_measurethicknessrecord_origin', '487', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1353', 'tb_measurethicknessrecord_origin', '488', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1354', 'tb_measurethicknessrecord_origin', '489', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1355', 'tb_measurethicknessrecord_origin', '490', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1356', 'tb_measurethicknessrecord_origin', '491', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1357', 'tb_measurethicknessrecord_origin', '492', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1358', 'tb_measurethicknessrecord_origin', '493', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1359', 'tb_measurethicknessrecord_origin', '494', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1360', 'tb_measurethicknessrecord_origin', '495', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1361', 'tb_measurethicknessrecord_origin', '496', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1362', 'tb_measurethicknessrecord_origin', '497', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1363', 'tb_measurethicknessrecord_origin', '498', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1364', 'tb_measurethicknessrecord_origin', '499', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1365', 'tb_measurethicknessrecord_origin', '500', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1366', 'tb_measurethicknessrecord_origin', '501', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1367', 'tb_measurethicknessrecord_origin', '502', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1368', 'tb_measurethicknessrecord_origin', '503', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1369', 'tb_measurethicknessrecord_origin', '504', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1370', 'tb_measurethicknessrecord_origin', '505', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1371', 'tb_measurethicknessrecord_origin', '506', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1372', 'tb_measurethicknessrecord_origin', '507', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1373', 'tb_measurethicknessrecord_origin', '508', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1374', 'tb_measurethicknessrecord_origin', '509', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1375', 'tb_measurethicknessrecord_origin', '510', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1376', 'tb_measurethicknessrecord_origin', '511', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1377', 'tb_measurethicknessrecord_origin', '512', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1378', 'tb_measurethicknessrecord_origin', '513', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1379', 'tb_measurethicknessrecord_origin', '514', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1380', 'tb_measurethicknessrecord_origin', '515', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1381', 'tb_measurethicknessrecord_origin', '516', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1382', 'tb_measurethicknessrecord_origin', '517', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1383', 'tb_measurethicknessrecord_origin', '518', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1384', 'tb_measurethicknessrecord_origin', '519', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1385', 'tb_measurethicknessrecord_origin', '520', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1386', 'tb_measurethicknessrecord_origin', '521', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1387', 'tb_measurethicknessrecord_origin', '522', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1388', 'tb_measurethicknessrecord_origin', '523', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1389', 'tb_measurethicknessrecord_origin', '524', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1390', 'tb_measurethicknessrecord_origin', '525', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1391', 'tb_measurethicknessrecord_origin', '526', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1392', 'tb_measurethicknessrecord_origin', '527', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1393', 'tb_measurethicknessrecord_origin', '528', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1394', 'tb_measurethicknessrecord_origin', '529', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1395', 'tb_measurethicknessrecord_origin', '530', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1396', 'tb_measurethicknessrecord_origin', '531', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1397', 'tb_measurethicknessrecord_origin', '532', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1398', 'tb_measurethicknessrecord_origin', '533', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1399', 'tb_measurethicknessrecord_origin', '534', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1400', 'tb_measurethicknessrecord_origin', '535', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1401', 'tb_measurethicknessrecord_origin', '536', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1402', 'tb_measurethicknessrecord_origin', '537', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1403', 'tb_measurethicknessrecord_origin', '538', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1404', 'tb_measurethicknessrecord_origin', '539', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1405', 'tb_measurethicknessrecord_origin', '540', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1406', 'tb_measurethicknessrecord_origin', '541', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1407', 'tb_measurethicknessrecord_origin', '542', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1408', 'tb_measurethicknessrecord_origin', '543', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1409', 'tb_measurethicknessrecord_origin', '544', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1410', 'tb_measurethicknessrecord_origin', '545', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1411', 'tb_measurethicknessrecord_origin', '546', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1412', 'tb_measurethicknessrecord_origin', '547', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1413', 'tb_measurethicknessrecord_origin', '548', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1414', 'tb_measurethicknessrecord_origin', '549', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1415', 'tb_measurethicknessrecord_origin', '550', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1416', 'tb_measurethicknessrecord_origin', '551', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1417', 'tb_measurethicknessrecord_origin', '552', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1418', 'tb_measurethicknessrecord_origin', '553', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1419', 'tb_measurethicknessrecord_origin', '554', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1420', 'tb_measurethicknessrecord_origin', '555', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1421', 'tb_measurethicknessrecord_origin', '556', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1422', 'tb_measurethicknessrecord_origin', '557', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1423', 'tb_measurethicknessrecord_origin', '558', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1424', 'tb_measurethicknessrecord_origin', '559', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1425', 'tb_measurethicknessrecord_origin', '560', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1426', 'tb_measurethicknessrecord_origin', '561', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1427', 'tb_measurethicknessrecord_origin', '562', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1428', 'tb_measurethicknessrecord_origin', '563', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1429', 'tb_measurethicknessrecord_origin', '564', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1430', 'tb_measurethicknessrecord_origin', '565', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1431', 'tb_measurethicknessrecord_origin', '566', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1432', 'tb_measurethicknessrecord_origin', '567', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1433', 'tb_measurethicknessrecord_origin', '568', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1434', 'tb_measurethicknessrecord_origin', '569', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1435', 'tb_measurethicknessrecord_origin', '570', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1436', 'tb_measurethicknessrecord_origin', '571', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1437', 'tb_measurethicknessrecord_origin', '572', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1438', 'tb_measurethicknessrecord_origin', '573', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1439', 'tb_measurethicknessrecord_origin', '574', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1440', 'tb_measurethicknessrecord_origin', '575', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1441', 'tb_measurethicknessrecord_origin', '576', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1442', 'tb_measurethicknessrecord_origin', '577', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1443', 'tb_measurethicknessrecord_origin', '578', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1444', 'tb_measurethicknessrecord_origin', '579', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1445', 'tb_measurethicknessrecord_origin', '580', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1446', 'tb_measurethicknessrecord_origin', '581', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1447', 'tb_measurethicknessrecord_origin', '582', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1448', 'tb_measurethicknessrecord_origin', '583', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1449', 'tb_measurethicknessrecord_origin', '584', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1450', 'tb_measurethicknessrecord_origin', '585', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1451', 'tb_measurethicknessrecord_origin', '586', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1452', 'tb_measurethicknessrecord_origin', '587', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1453', 'tb_measurethicknessrecord_origin', '588', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1454', 'tb_measurethicknessrecord_origin', '589', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1455', 'tb_measurethicknessrecord_origin', '590', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1456', 'tb_measurethicknessrecord_origin', '591', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1457', 'tb_measurethicknessrecord_origin', '592', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1458', 'tb_measurethicknessrecord_origin', '593', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1459', 'tb_measurethicknessrecord_origin', '594', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1460', 'tb_measurethicknessrecord_origin', '595', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1461', 'tb_measurethicknessrecord_origin', '596', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1462', 'tb_measurethicknessrecord_origin', '597', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1463', 'tb_measurethicknessrecord_origin', '598', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1464', 'tb_measurethicknessrecord_origin', '599', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1465', 'tb_measurethicknessrecord_origin', '600', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1466', 'tb_measurethicknessrecord_origin', '601', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1467', 'tb_measurethicknessrecord_origin', '602', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1468', 'tb_measurethicknessrecord_origin', '603', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1469', 'tb_measurethicknessrecord_origin', '604', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1470', 'tb_measurethicknessrecord_origin', '605', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1471', 'tb_measurethicknessrecord_origin', '606', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1472', 'tb_measurethicknessrecord_origin', '607', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1473', 'tb_measurethicknessrecord_origin', '608', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1474', 'tb_measurethicknessrecord_origin', '609', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1475', 'tb_measurethicknessrecord_origin', '610', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1476', 'tb_measurethicknessrecord_origin', '611', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1477', 'tb_measurethicknessrecord_origin', '612', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1478', 'tb_measurethicknessrecord_origin', '613', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1479', 'tb_measurethicknessrecord_origin', '614', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1480', 'tb_measurethicknessrecord_origin', '615', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1481', 'tb_measurethicknessrecord_origin', '616', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1482', 'tb_measurethicknessrecord_origin', '617', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1483', 'tb_measurethicknessrecord_origin', '618', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1484', 'tb_measurethicknessrecord_origin', '619', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1485', 'tb_measurethicknessrecord_origin', '620', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1486', 'tb_measurethicknessrecord_origin', '621', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1487', 'tb_measurethicknessrecord_origin', '622', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1488', 'tb_measurethicknessrecord_origin', '623', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1489', 'tb_measurethicknessrecord_origin', '624', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1490', 'tb_measurethicknessrecord_origin', '625', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1491', 'tb_measurethicknessrecord_origin', '626', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1492', 'tb_measurethicknessrecord_origin', '627', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1493', 'tb_measurethicknessrecord_origin', '628', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1494', 'tb_measurethicknessrecord_origin', '629', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1495', 'tb_measurethicknessrecord_origin', '630', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1496', 'tb_measurethicknessrecord_origin', '631', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1497', 'tb_measurethicknessrecord_origin', '632', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1498', 'tb_measurethicknessrecord_origin', '633', '2016-01-02 07:01:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1499', 'tb_measurethicknessrecord_origin', '634', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1500', 'tb_measurethicknessrecord_origin', '635', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1501', 'tb_measurethicknessrecord_origin', '636', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1502', 'tb_measurethicknessrecord_origin', '637', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1503', 'tb_measurethicknessrecord_origin', '638', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1504', 'tb_measurethicknessrecord_origin', '639', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1505', 'tb_measurethicknessrecord_origin', '640', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1506', 'tb_measurethicknessrecord_origin', '641', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1507', 'tb_measurethicknessrecord_origin', '642', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1508', 'tb_measurethicknessrecord_origin', '643', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1509', 'tb_measurethicknessrecord_origin', '644', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1510', 'tb_measurethicknessrecord_origin', '645', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1511', 'tb_measurethicknessrecord_origin', '646', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1512', 'tb_measurethicknessrecord_origin', '647', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1513', 'tb_measurethicknessrecord_origin', '648', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1514', 'tb_measurethicknessrecord_origin', '649', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1515', 'tb_measurethicknessrecord_origin', '650', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1516', 'tb_measurethicknessrecord_origin', '651', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1517', 'tb_measurethicknessrecord_origin', '652', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1518', 'tb_measurethicknessrecord_origin', '653', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1519', 'tb_measurethicknessrecord_origin', '654', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1520', 'tb_measurethicknessrecord_origin', '655', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1521', 'tb_measurethicknessrecord_origin', '656', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1522', 'tb_measurethicknessrecord_origin', '657', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1523', 'tb_measurethicknessrecord_origin', '658', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1524', 'tb_measurethicknessrecord_origin', '659', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1525', 'tb_measurethicknessrecord_origin', '660', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1526', 'tb_measurethicknessrecord_origin', '661', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1527', 'tb_measurethicknessrecord_origin', '662', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1528', 'tb_measurethicknessrecord_origin', '663', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1529', 'tb_measurethicknessrecord_origin', '664', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1530', 'tb_measurethicknessrecord_origin', '665', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1531', 'tb_measurethicknessrecord_origin', '666', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1532', 'tb_measurethicknessrecord_origin', '667', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1533', 'tb_measurethicknessrecord_origin', '668', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1534', 'tb_measurethicknessrecord_origin', '669', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1535', 'tb_measurethicknessrecord_origin', '670', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1536', 'tb_measurethicknessrecord_origin', '671', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1537', 'tb_measurethicknessrecord_origin', '672', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1538', 'tb_measurethicknessrecord_origin', '673', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1539', 'tb_measurethicknessrecord_origin', '674', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1540', 'tb_measurethicknessrecord_origin', '675', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1541', 'tb_measurethicknessrecord_origin', '676', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1542', 'tb_measurethicknessrecord_origin', '677', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1543', 'tb_measurethicknessrecord_origin', '678', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1544', 'tb_measurethicknessrecord_origin', '679', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1545', 'tb_measurethicknessrecord_origin', '680', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1546', 'tb_measurethicknessrecord_origin', '681', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1547', 'tb_measurethicknessrecord_origin', '682', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1548', 'tb_measurethicknessrecord_origin', '683', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1549', 'tb_measurethicknessrecord_origin', '684', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1550', 'tb_measurethicknessrecord_origin', '685', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1551', 'tb_measurethicknessrecord_origin', '686', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1552', 'tb_measurethicknessrecord_origin', '687', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1553', 'tb_measurethicknessrecord_origin', '688', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1554', 'tb_measurethicknessrecord_origin', '689', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1555', 'tb_measurethicknessrecord_origin', '690', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1556', 'tb_measurethicknessrecord_origin', '691', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1557', 'tb_measurethicknessrecord_origin', '692', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1558', 'tb_measurethicknessrecord_origin', '693', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1559', 'tb_measurethicknessrecord_origin', '694', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1560', 'tb_measurethicknessrecord_origin', '695', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1561', 'tb_measurethicknessrecord_origin', '696', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1562', 'tb_measurethicknessrecord_origin', '697', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1563', 'tb_measurethicknessrecord_origin', '698', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1564', 'tb_measurethicknessrecord_origin', '699', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1565', 'tb_measurethicknessrecord_origin', '700', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1566', 'tb_measurethicknessrecord_origin', '701', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1567', 'tb_measurethicknessrecord_origin', '702', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1568', 'tb_measurethicknessrecord_origin', '703', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1569', 'tb_measurethicknessrecord_origin', '704', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1570', 'tb_measurethicknessrecord_origin', '705', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1571', 'tb_measurethicknessrecord_origin', '706', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1572', 'tb_measurethicknessrecord_origin', '707', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1573', 'tb_measurethicknessrecord_origin', '708', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1574', 'tb_measurethicknessrecord_origin', '709', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1575', 'tb_measurethicknessrecord_origin', '710', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1576', 'tb_measurethicknessrecord_origin', '711', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1577', 'tb_measurethicknessrecord_origin', '712', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1578', 'tb_measurethicknessrecord_origin', '713', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1579', 'tb_measurethicknessrecord_origin', '714', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1580', 'tb_measurethicknessrecord_origin', '715', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1581', 'tb_measurethicknessrecord_origin', '716', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1582', 'tb_measurethicknessrecord_origin', '717', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1583', 'tb_measurethicknessrecord_origin', '718', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1584', 'tb_measurethicknessrecord_origin', '719', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1585', 'tb_measurethicknessrecord_origin', '720', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1586', 'tb_measurethicknessrecord_origin', '721', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1587', 'tb_measurethicknessrecord_origin', '722', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1588', 'tb_measurethicknessrecord_origin', '723', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1589', 'tb_measurethicknessrecord_origin', '724', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1590', 'tb_measurethicknessrecord_origin', '725', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1591', 'tb_measurethicknessrecord_origin', '726', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1592', 'tb_measurethicknessrecord_origin', '727', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1593', 'tb_measurethicknessrecord_origin', '728', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1594', 'tb_measurethicknessrecord_origin', '729', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1595', 'tb_measurethicknessrecord_origin', '730', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1596', 'tb_measurethicknessrecord_origin', '731', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1597', 'tb_measurethicknessrecord_origin', '732', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1598', 'tb_measurethicknessrecord_origin', '733', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1599', 'tb_measurethicknessrecord_origin', '734', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1600', 'tb_measurethicknessrecord_origin', '735', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1601', 'tb_measurethicknessrecord_origin', '736', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1602', 'tb_measurethicknessrecord_origin', '737', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1603', 'tb_measurethicknessrecord_origin', '738', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1604', 'tb_measurethicknessrecord_origin', '739', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1605', 'tb_measurethicknessrecord_origin', '740', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1606', 'tb_measurethicknessrecord_origin', '741', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1607', 'tb_measurethicknessrecord_origin', '742', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1608', 'tb_measurethicknessrecord_origin', '743', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1609', 'tb_measurethicknessrecord_origin', '744', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1610', 'tb_measurethicknessrecord_origin', '745', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1611', 'tb_measurethicknessrecord_origin', '746', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1612', 'tb_measurethicknessrecord_origin', '747', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1613', 'tb_measurethicknessrecord_origin', '748', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1614', 'tb_measurethicknessrecord_origin', '749', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1615', 'tb_measurethicknessrecord_origin', '750', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1616', 'tb_measurethicknessrecord_origin', '751', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1617', 'tb_measurethicknessrecord_origin', '752', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1618', 'tb_measurethicknessrecord_origin', '753', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1619', 'tb_measurethicknessrecord_origin', '754', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1620', 'tb_measurethicknessrecord_origin', '755', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1621', 'tb_measurethicknessrecord_origin', '756', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1622', 'tb_measurethicknessrecord_origin', '757', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1623', 'tb_measurethicknessrecord_origin', '758', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1624', 'tb_measurethicknessrecord_origin', '759', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1625', 'tb_measurethicknessrecord_origin', '760', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1626', 'tb_measurethicknessrecord_origin', '761', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1627', 'tb_measurethicknessrecord_origin', '762', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1628', 'tb_measurethicknessrecord_origin', '763', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1629', 'tb_measurethicknessrecord_origin', '764', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1630', 'tb_measurethicknessrecord_origin', '765', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1631', 'tb_measurethicknessrecord_origin', '766', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1632', 'tb_measurethicknessrecord_origin', '767', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1633', 'tb_measurethicknessrecord_origin', '768', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1634', 'tb_measurethicknessrecord_origin', '769', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1635', 'tb_measurethicknessrecord_origin', '770', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1636', 'tb_measurethicknessrecord_origin', '771', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1637', 'tb_measurethicknessrecord_origin', '772', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1638', 'tb_measurethicknessrecord_origin', '773', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1639', 'tb_measurethicknessrecord_origin', '774', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1640', 'tb_measurethicknessrecord_origin', '775', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1641', 'tb_measurethicknessrecord_origin', '776', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1642', 'tb_measurethicknessrecord_origin', '777', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1643', 'tb_measurethicknessrecord_origin', '778', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1644', 'tb_measurethicknessrecord_origin', '779', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1645', 'tb_measurethicknessrecord_origin', '780', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1646', 'tb_measurethicknessrecord_origin', '781', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1647', 'tb_measurethicknessrecord_origin', '782', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1648', 'tb_measurethicknessrecord_origin', '783', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1649', 'tb_measurethicknessrecord_origin', '784', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1650', 'tb_measurethicknessrecord_origin', '785', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1651', 'tb_measurethicknessrecord_origin', '786', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1652', 'tb_measurethicknessrecord_origin', '787', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1653', 'tb_measurethicknessrecord_origin', '788', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1654', 'tb_measurethicknessrecord_origin', '789', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1655', 'tb_measurethicknessrecord_origin', '790', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1656', 'tb_measurethicknessrecord_origin', '791', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1657', 'tb_measurethicknessrecord_origin', '792', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1658', 'tb_measurethicknessrecord_origin', '793', '2016-01-02 07:01:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1659', 'tb_measurethicknessrecord_origin', '794', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1660', 'tb_measurethicknessrecord_origin', '795', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1661', 'tb_measurethicknessrecord_origin', '796', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1662', 'tb_measurethicknessrecord_origin', '797', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1663', 'tb_measurethicknessrecord_origin', '798', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1664', 'tb_measurethicknessrecord_origin', '799', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1665', 'tb_measurethicknessrecord_origin', '800', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1666', 'tb_measurethicknessrecord_origin', '801', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1667', 'tb_measurethicknessrecord_origin', '802', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1668', 'tb_measurethicknessrecord_origin', '803', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1669', 'tb_measurethicknessrecord_origin', '804', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1670', 'tb_measurethicknessrecord_origin', '805', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1671', 'tb_measurethicknessrecord_origin', '806', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1672', 'tb_measurethicknessrecord_origin', '807', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1673', 'tb_measurethicknessrecord_origin', '808', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1674', 'tb_measurethicknessrecord_origin', '809', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1675', 'tb_measurethicknessrecord_origin', '810', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1676', 'tb_measurethicknessrecord_origin', '811', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1677', 'tb_measurethicknessrecord_origin', '812', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1678', 'tb_measurethicknessrecord_origin', '813', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1679', 'tb_measurethicknessrecord_origin', '814', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1680', 'tb_measurethicknessrecord_origin', '815', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1681', 'tb_measurethicknessrecord_origin', '816', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1682', 'tb_measurethicknessrecord_origin', '817', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1683', 'tb_measurethicknessrecord_origin', '818', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1684', 'tb_measurethicknessrecord_origin', '819', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1685', 'tb_measurethicknessrecord_origin', '820', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1686', 'tb_measurethicknessrecord_origin', '821', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1687', 'tb_measurethicknessrecord_origin', '822', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1688', 'tb_measurethicknessrecord_origin', '823', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1689', 'tb_measurethicknessrecord_origin', '824', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1690', 'tb_measurethicknessrecord_origin', '825', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1691', 'tb_measurethicknessrecord_origin', '826', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1692', 'tb_measurethicknessrecord_origin', '827', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1693', 'tb_measurethicknessrecord_origin', '828', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1694', 'tb_measurethicknessrecord_origin', '829', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1695', 'tb_measurethicknessrecord_origin', '830', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1696', 'tb_measurethicknessrecord_origin', '831', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1697', 'tb_measurethicknessrecord_origin', '832', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1698', 'tb_measurethicknessrecord_origin', '833', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1699', 'tb_measurethicknessrecord_origin', '834', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1700', 'tb_measurethicknessrecord_origin', '835', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1701', 'tb_measurethicknessrecord_origin', '836', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1702', 'tb_measurethicknessrecord_origin', '837', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1703', 'tb_measurethicknessrecord_origin', '838', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1704', 'tb_measurethicknessrecord_origin', '839', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1705', 'tb_measurethicknessrecord_origin', '840', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1706', 'tb_measurethicknessrecord_origin', '841', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1707', 'tb_measurethicknessrecord_origin', '842', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1708', 'tb_measurethicknessrecord_origin', '843', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1709', 'tb_measurethicknessrecord_origin', '844', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1710', 'tb_measurethicknessrecord_origin', '845', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1711', 'tb_measurethicknessrecord_origin', '846', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1712', 'tb_measurethicknessrecord_origin', '847', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1713', 'tb_measurethicknessrecord_origin', '848', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1714', 'tb_measurethicknessrecord_origin', '849', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1715', 'tb_measurethicknessrecord_origin', '850', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1716', 'tb_measurethicknessrecord_origin', '851', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1717', 'tb_measurethicknessrecord_origin', '852', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1718', 'tb_measurethicknessrecord_origin', '853', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1719', 'tb_measurethicknessrecord_origin', '854', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1720', 'tb_measurethicknessrecord_origin', '855', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1721', 'tb_measurethicknessrecord_origin', '856', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1722', 'tb_measurethicknessrecord_origin', '857', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1723', 'tb_measurethicknessrecord_origin', '858', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1724', 'tb_measurethicknessrecord_origin', '859', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1725', 'tb_measurethicknessrecord_origin', '860', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1726', 'tb_measurethicknessrecord_origin', '861', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1727', 'tb_measurethicknessrecord_origin', '862', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1728', 'tb_measurethicknessrecord_origin', '863', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1729', 'tb_measurethicknessrecord_origin', '864', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1730', 'tb_measurethicknessrecord_origin', '865', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1731', 'tb_measurethicknessrecord_origin', '866', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1732', 'tb_measurethicknessrecord_origin', '867', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1733', 'tb_measurethicknessrecord_origin', '868', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1734', 'tb_measurethicknessrecord_origin', '869', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1735', 'tb_measurethicknessrecord_origin', '870', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1736', 'tb_measurethicknessrecord_origin', '871', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1737', 'tb_measurethicknessrecord_origin', '872', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1738', 'tb_measurethicknessrecord_origin', '873', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1739', 'tb_measurethicknessrecord_origin', '874', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1740', 'tb_measurethicknessrecord_origin', '875', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1741', 'tb_measurethicknessrecord_origin', '876', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1742', 'tb_measurethicknessrecord_origin', '877', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1743', 'tb_measurethicknessrecord_origin', '878', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1744', 'tb_measurethicknessrecord_origin', '879', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1745', 'tb_measurethicknessrecord_origin', '880', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1746', 'tb_measurethicknessrecord_origin', '881', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1747', 'tb_measurethicknessrecord_origin', '882', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1748', 'tb_measurethicknessrecord_origin', '883', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1749', 'tb_measurethicknessrecord_origin', '884', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1750', 'tb_measurethicknessrecord_origin', '885', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1751', 'tb_measurethicknessrecord_origin', '886', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1752', 'tb_measurethicknessrecord_origin', '887', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1753', 'tb_measurethicknessrecord_origin', '888', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1754', 'tb_measurethicknessrecord_origin', '889', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1755', 'tb_measurethicknessrecord_origin', '890', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1756', 'tb_measurethicknessrecord_origin', '891', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1757', 'tb_measurethicknessrecord_origin', '892', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1758', 'tb_measurethicknessrecord_origin', '893', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1759', 'tb_measurethicknessrecord_origin', '894', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1760', 'tb_measurethicknessrecord_origin', '895', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1761', 'tb_measurethicknessrecord_origin', '896', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1762', 'tb_measurethicknessrecord_origin', '897', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1763', 'tb_measurethicknessrecord_origin', '898', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1764', 'tb_measurethicknessrecord_origin', '899', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1765', 'tb_measurethicknessrecord_origin', '900', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1766', 'tb_measurethicknessrecord_origin', '901', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1767', 'tb_measurethicknessrecord_origin', '902', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1768', 'tb_measurethicknessrecord_origin', '903', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1769', 'tb_measurethicknessrecord_origin', '904', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1770', 'tb_measurethicknessrecord_origin', '905', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1771', 'tb_measurethicknessrecord_origin', '906', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1772', 'tb_measurethicknessrecord_origin', '907', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1773', 'tb_measurethicknessrecord_origin', '908', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1774', 'tb_measurethicknessrecord_origin', '909', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1775', 'tb_measurethicknessrecord_origin', '910', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1776', 'tb_measurethicknessrecord_origin', '911', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1777', 'tb_measurethicknessrecord_origin', '912', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1778', 'tb_measurethicknessrecord_origin', '913', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1779', 'tb_measurethicknessrecord_origin', '914', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1780', 'tb_measurethicknessrecord_origin', '915', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1781', 'tb_measurethicknessrecord_origin', '916', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1782', 'tb_measurethicknessrecord_origin', '917', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1783', 'tb_measurethicknessrecord_origin', '918', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1784', 'tb_measurethicknessrecord_origin', '919', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1785', 'tb_measurethicknessrecord_origin', '920', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1786', 'tb_measurethicknessrecord_origin', '921', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1787', 'tb_measurethicknessrecord_origin', '922', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1788', 'tb_measurethicknessrecord_origin', '923', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1789', 'tb_measurethicknessrecord_origin', '924', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1790', 'tb_measurethicknessrecord_origin', '925', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1791', 'tb_measurethicknessrecord_origin', '926', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1792', 'tb_measurethicknessrecord_origin', '927', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1793', 'tb_measurethicknessrecord_origin', '928', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1794', 'tb_measurethicknessrecord_origin', '929', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1795', 'tb_measurethicknessrecord_origin', '930', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1796', 'tb_measurethicknessrecord_origin', '931', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1797', 'tb_measurethicknessrecord_origin', '932', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1798', 'tb_measurethicknessrecord_origin', '933', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1799', 'tb_measurethicknessrecord_origin', '934', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1800', 'tb_measurethicknessrecord_origin', '935', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1801', 'tb_measurethicknessrecord_origin', '936', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1802', 'tb_measurethicknessrecord_origin', '937', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1803', 'tb_measurethicknessrecord_origin', '938', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1804', 'tb_measurethicknessrecord_origin', '939', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1805', 'tb_measurethicknessrecord_origin', '940', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1806', 'tb_measurethicknessrecord_origin', '941', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1807', 'tb_measurethicknessrecord_origin', '942', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1808', 'tb_measurethicknessrecord_origin', '943', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1809', 'tb_measurethicknessrecord_origin', '944', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1810', 'tb_measurethicknessrecord_origin', '945', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1811', 'tb_measurethicknessrecord_origin', '946', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1812', 'tb_measurethicknessrecord_origin', '947', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1813', 'tb_measurethicknessrecord_origin', '948', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1814', 'tb_measurethicknessrecord_origin', '949', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1815', 'tb_measurethicknessrecord_origin', '950', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1816', 'tb_measurethicknessrecord_origin', '951', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1817', 'tb_measurethicknessrecord_origin', '952', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1818', 'tb_measurethicknessrecord_origin', '953', '2016-01-02 07:01:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1819', 'tb_measurethicknessrecord_origin', '954', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1820', 'tb_measurethicknessrecord_origin', '955', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1821', 'tb_measurethicknessrecord_origin', '956', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1822', 'tb_measurethicknessrecord_origin', '957', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1823', 'tb_measurethicknessrecord_origin', '958', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1824', 'tb_measurethicknessrecord_origin', '959', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1825', 'tb_measurethicknessrecord_origin', '960', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1826', 'tb_measurethicknessrecord_origin', '961', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1827', 'tb_measurethicknessrecord_origin', '962', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1828', 'tb_measurethicknessrecord_origin', '963', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1829', 'tb_measurethicknessrecord_origin', '964', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1830', 'tb_measurethicknessrecord_origin', '965', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1831', 'tb_measurethicknessrecord_origin', '966', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1832', 'tb_measurethicknessrecord_origin', '967', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1833', 'tb_measurethicknessrecord_origin', '968', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1834', 'tb_measurethicknessrecord_origin', '969', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1835', 'tb_measurethicknessrecord_origin', '970', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1836', 'tb_measurethicknessrecord_origin', '971', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1837', 'tb_measurethicknessrecord_origin', '972', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1838', 'tb_measurethicknessrecord_origin', '973', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1839', 'tb_measurethicknessrecord_origin', '974', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1840', 'tb_measurethicknessrecord_origin', '975', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1841', 'tb_measurethicknessrecord_origin', '976', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1842', 'tb_measurethicknessrecord_origin', '977', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1843', 'tb_measurethicknessrecord_origin', '978', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1844', 'tb_measurethicknessrecord_origin', '979', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1845', 'tb_measurethicknessrecord_origin', '980', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1846', 'tb_measurethicknessrecord_origin', '981', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1847', 'tb_measurethicknessrecord_origin', '982', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1848', 'tb_measurethicknessrecord_origin', '983', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1849', 'tb_measurethicknessrecord_origin', '984', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1850', 'tb_measurethicknessrecord_origin', '985', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1851', 'tb_measurethicknessrecord_origin', '986', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1852', 'tb_measurethicknessrecord_origin', '987', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1853', 'tb_measurethicknessrecord_origin', '988', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1854', 'tb_measurethicknessrecord_origin', '989', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1855', 'tb_measurethicknessrecord_origin', '990', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1856', 'tb_measurethicknessrecord_origin', '991', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1857', 'tb_measurethicknessrecord_origin', '992', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1858', 'tb_measurethicknessrecord_origin', '993', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1859', 'tb_measurethicknessrecord_origin', '994', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1860', 'tb_measurethicknessrecord_origin', '995', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1861', 'tb_measurethicknessrecord_origin', '996', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1862', 'tb_measurethicknessrecord_origin', '997', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1863', 'tb_measurethicknessrecord_origin', '998', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1864', 'tb_measurethicknessrecord_origin', '999', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1865', 'tb_measurethicknessrecord_origin', '1000', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1866', 'tb_measurethicknessrecord_origin', '1001', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1867', 'tb_measurethicknessrecord_origin', '1002', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1868', 'tb_measurethicknessrecord_origin', '1003', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1869', 'tb_measurethicknessrecord_origin', '1004', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1870', 'tb_measurethicknessrecord_origin', '1005', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1871', 'tb_measurethicknessrecord_origin', '1006', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1872', 'tb_measurethicknessrecord_origin', '1007', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1873', 'tb_measurethicknessrecord_origin', '1008', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1874', 'tb_measurethicknessrecord_origin', '1009', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1875', 'tb_measurethicknessrecord_origin', '1010', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1876', 'tb_measurethicknessrecord_origin', '1011', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1877', 'tb_measurethicknessrecord_origin', '1012', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1878', 'tb_measurethicknessrecord_origin', '1013', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1879', 'tb_measurethicknessrecord_origin', '1014', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1880', 'tb_measurethicknessrecord_origin', '1015', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1881', 'tb_measurethicknessrecord_origin', '1016', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1882', 'tb_measurethicknessrecord_origin', '1017', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1883', 'tb_measurethicknessrecord_origin', '1018', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1884', 'tb_measurethicknessrecord_origin', '1019', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1885', 'tb_measurethicknessrecord_origin', '1020', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1886', 'tb_measurethicknessrecord_origin', '1021', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1887', 'tb_measurethicknessrecord_origin', '1022', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1888', 'tb_measurethicknessrecord_origin', '1023', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1889', 'tb_measurethicknessrecord_origin', '1024', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1890', 'tb_measurethicknessrecord_origin', '1025', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1891', 'tb_measurethicknessrecord_origin', '1026', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1892', 'tb_measurethicknessrecord_origin', '1027', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1893', 'tb_measurethicknessrecord_origin', '1028', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1894', 'tb_measurethicknessrecord_origin', '1029', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1895', 'tb_measurethicknessrecord_origin', '1030', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1896', 'tb_measurethicknessrecord_origin', '1031', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1897', 'tb_measurethicknessrecord_origin', '1032', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1898', 'tb_measurethicknessrecord_origin', '1033', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1899', 'tb_measurethicknessrecord_origin', '1034', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1900', 'tb_measurethicknessrecord_origin', '1035', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1901', 'tb_measurethicknessrecord_origin', '1036', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1902', 'tb_measurethicknessrecord_origin', '1037', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1903', 'tb_measurethicknessrecord_origin', '1038', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1904', 'tb_measurethicknessrecord_origin', '1039', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1905', 'tb_measurethicknessrecord_origin', '1040', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1906', 'tb_measurethicknessrecord_origin', '1041', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1907', 'tb_measurethicknessrecord_origin', '1042', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1908', 'tb_measurethicknessrecord_origin', '1043', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1909', 'tb_measurethicknessrecord_origin', '1044', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1910', 'tb_measurethicknessrecord_origin', '1045', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1911', 'tb_measurethicknessrecord_origin', '1046', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1912', 'tb_measurethicknessrecord_origin', '1047', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1913', 'tb_measurethicknessrecord_origin', '1048', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1914', 'tb_measurethicknessrecord_origin', '1049', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1915', 'tb_measurethicknessrecord_origin', '1050', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1916', 'tb_measurethicknessrecord_origin', '1051', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1917', 'tb_measurethicknessrecord_origin', '1052', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1918', 'tb_measurethicknessrecord_origin', '1053', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1919', 'tb_measurethicknessrecord_origin', '1054', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1920', 'tb_measurethicknessrecord_origin', '1055', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1921', 'tb_measurethicknessrecord_origin', '1056', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1922', 'tb_measurethicknessrecord_origin', '1057', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1923', 'tb_measurethicknessrecord_origin', '1058', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1924', 'tb_measurethicknessrecord_origin', '1059', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1925', 'tb_measurethicknessrecord_origin', '1060', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1926', 'tb_measurethicknessrecord_origin', '1061', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1927', 'tb_measurethicknessrecord_origin', '1062', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1928', 'tb_measurethicknessrecord_origin', '1063', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1929', 'tb_measurethicknessrecord_origin', '1064', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1930', 'tb_measurethicknessrecord_origin', '1065', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1931', 'tb_measurethicknessrecord_origin', '1066', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1932', 'tb_measurethicknessrecord_origin', '1067', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1933', 'tb_measurethicknessrecord_origin', '1068', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1934', 'tb_measurethicknessrecord_origin', '1069', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1935', 'tb_measurethicknessrecord_origin', '1070', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1936', 'tb_measurethicknessrecord_origin', '1071', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1937', 'tb_measurethicknessrecord_origin', '1072', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1938', 'tb_measurethicknessrecord_origin', '1073', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1939', 'tb_measurethicknessrecord_origin', '1074', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1940', 'tb_measurethicknessrecord_origin', '1075', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1941', 'tb_measurethicknessrecord_origin', '1076', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1942', 'tb_measurethicknessrecord_origin', '1077', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1943', 'tb_measurethicknessrecord_origin', '1078', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1944', 'tb_measurethicknessrecord_origin', '1079', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1945', 'tb_measurethicknessrecord_origin', '1080', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1946', 'tb_measurethicknessrecord_origin', '1081', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1947', 'tb_measurethicknessrecord_origin', '1082', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1948', 'tb_measurethicknessrecord_origin', '1083', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1949', 'tb_measurethicknessrecord_origin', '1084', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1950', 'tb_measurethicknessrecord_origin', '1085', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1951', 'tb_measurethicknessrecord_origin', '1086', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1952', 'tb_measurethicknessrecord_origin', '1087', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1953', 'tb_measurethicknessrecord_origin', '1088', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1954', 'tb_measurethicknessrecord_origin', '1089', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1955', 'tb_measurethicknessrecord_origin', '1090', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1956', 'tb_measurethicknessrecord_origin', '1091', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1957', 'tb_measurethicknessrecord_origin', '1092', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1958', 'tb_measurethicknessrecord_origin', '1093', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1959', 'tb_measurethicknessrecord_origin', '1094', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1960', 'tb_measurethicknessrecord_origin', '1095', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1961', 'tb_measurethicknessrecord_origin', '1096', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1962', 'tb_measurethicknessrecord_origin', '1097', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1963', 'tb_measurethicknessrecord_origin', '1098', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1964', 'tb_measurethicknessrecord_origin', '1099', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1965', 'tb_measurethicknessrecord_origin', '1100', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1966', 'tb_measurethicknessrecord_origin', '1101', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1967', 'tb_measurethicknessrecord_origin', '1102', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1968', 'tb_measurethicknessrecord_origin', '1103', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1969', 'tb_measurethicknessrecord_origin', '1104', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1970', 'tb_measurethicknessrecord_origin', '1105', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1971', 'tb_measurethicknessrecord_origin', '1106', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1972', 'tb_measurethicknessrecord_origin', '1107', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1973', 'tb_measurethicknessrecord_origin', '1108', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1974', 'tb_measurethicknessrecord_origin', '1109', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1975', 'tb_measurethicknessrecord_origin', '1110', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1976', 'tb_measurethicknessrecord_origin', '1111', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1977', 'tb_measurethicknessrecord_origin', '1112', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1978', 'tb_measurethicknessrecord_origin', '1113', '2016-01-02 07:01:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1979', 'tb_measurethicknessrecord_origin', '1114', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1980', 'tb_measurethicknessrecord_origin', '1115', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1981', 'tb_measurethicknessrecord_origin', '1116', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1982', 'tb_measurethicknessrecord_origin', '1117', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1983', 'tb_measurethicknessrecord_origin', '1118', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1984', 'tb_measurethicknessrecord_origin', '1119', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1985', 'tb_measurethicknessrecord_origin', '1120', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1986', 'tb_measurethicknessrecord_origin', '1121', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1987', 'tb_measurethicknessrecord_origin', '1122', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1988', 'tb_measurethicknessrecord_origin', '1123', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1989', 'tb_measurethicknessrecord_origin', '1124', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1990', 'tb_measurethicknessrecord_origin', '1125', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1991', 'tb_measurethicknessrecord_origin', '1126', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1992', 'tb_measurethicknessrecord_origin', '1127', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1993', 'tb_measurethicknessrecord_origin', '1128', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1994', 'tb_measurethicknessrecord_origin', '1129', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1995', 'tb_measurethicknessrecord_origin', '1130', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1996', 'tb_measurethicknessrecord_origin', '1131', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1997', 'tb_measurethicknessrecord_origin', '1132', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1998', 'tb_measurethicknessrecord_origin', '1133', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('1999', 'tb_measurethicknessrecord_origin', '1134', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2000', 'tb_measurethicknessrecord_origin', '1135', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2001', 'tb_measurethicknessrecord_origin', '1136', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2002', 'tb_measurethicknessrecord_origin', '1137', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2003', 'tb_measurethicknessrecord_origin', '1138', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2004', 'tb_measurethicknessrecord_origin', '1139', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2005', 'tb_measurethicknessrecord_origin', '1140', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2006', 'tb_measurethicknessrecord_origin', '1141', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2007', 'tb_measurethicknessrecord_origin', '1142', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2008', 'tb_measurethicknessrecord_origin', '1143', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2009', 'tb_measurethicknessrecord_origin', '1144', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2010', 'tb_measurethicknessrecord_origin', '1145', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2011', 'tb_measurethicknessrecord_origin', '1146', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2012', 'tb_measurethicknessrecord_origin', '1147', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2013', 'tb_measurethicknessrecord_origin', '1148', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2014', 'tb_measurethicknessrecord_origin', '1149', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2015', 'tb_measurethicknessrecord_origin', '1150', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2016', 'tb_measurethicknessrecord_origin', '1151', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2017', 'tb_measurethicknessrecord_origin', '1152', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2018', 'tb_measurethicknessrecord_origin', '1153', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2019', 'tb_measurethicknessrecord_origin', '1154', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2020', 'tb_measurethicknessrecord_origin', '1155', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2021', 'tb_measurethicknessrecord_origin', '1156', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2022', 'tb_measurethicknessrecord_origin', '1157', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2023', 'tb_measurethicknessrecord_origin', '1158', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2024', 'tb_measurethicknessrecord_origin', '1159', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2025', 'tb_measurethicknessrecord_origin', '1160', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2026', 'tb_measurethicknessrecord_origin', '1161', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2027', 'tb_measurethicknessrecord_origin', '1162', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2028', 'tb_measurethicknessrecord_origin', '1163', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2029', 'tb_measurethicknessrecord_origin', '1164', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2030', 'tb_measurethicknessrecord_origin', '1165', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2031', 'tb_measurethicknessrecord_origin', '1166', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2032', 'tb_measurethicknessrecord_origin', '1167', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2033', 'tb_measurethicknessrecord_origin', '1168', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2034', 'tb_measurethicknessrecord_origin', '1169', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2035', 'tb_measurethicknessrecord_origin', '1170', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2036', 'tb_measurethicknessrecord_origin', '1171', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2037', 'tb_measurethicknessrecord_origin', '1172', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2038', 'tb_measurethicknessrecord_origin', '1173', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2039', 'tb_measurethicknessrecord_origin', '1174', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2040', 'tb_measurethicknessrecord_origin', '1175', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2041', 'tb_measurethicknessrecord_origin', '1176', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2042', 'tb_measurethicknessrecord_origin', '1177', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2043', 'tb_measurethicknessrecord_origin', '1178', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2044', 'tb_measurethicknessrecord_origin', '1179', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2045', 'tb_measurethicknessrecord_origin', '1180', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2046', 'tb_measurethicknessrecord_origin', '1181', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2047', 'tb_measurethicknessrecord_origin', '1182', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2048', 'tb_measurethicknessrecord_origin', '1183', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2049', 'tb_measurethicknessrecord_origin', '1184', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2050', 'tb_measurethicknessrecord_origin', '1185', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2051', 'tb_measurethicknessrecord_origin', '1186', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2052', 'tb_measurethicknessrecord_origin', '1187', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2053', 'tb_measurethicknessrecord_origin', '1188', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2054', 'tb_measurethicknessrecord_origin', '1189', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2055', 'tb_measurethicknessrecord_origin', '1190', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2056', 'tb_measurethicknessrecord_origin', '1191', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2057', 'tb_measurethicknessrecord_origin', '1192', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2058', 'tb_measurethicknessrecord_origin', '1193', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2059', 'tb_measurethicknessrecord_origin', '1194', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2060', 'tb_measurethicknessrecord_origin', '1195', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2061', 'tb_measurethicknessrecord_origin', '1196', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2062', 'tb_measurethicknessrecord_origin', '1197', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2063', 'tb_measurethicknessrecord_origin', '1198', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2064', 'tb_measurethicknessrecord_origin', '1199', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2065', 'tb_measurethicknessrecord_origin', '1200', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2066', 'tb_measurethicknessrecord_origin', '1201', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2067', 'tb_measurethicknessrecord_origin', '1202', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2068', 'tb_measurethicknessrecord_origin', '1203', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2069', 'tb_measurethicknessrecord_origin', '1204', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2070', 'tb_measurethicknessrecord_origin', '1205', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2071', 'tb_measurethicknessrecord_origin', '1206', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2072', 'tb_measurethicknessrecord_origin', '1207', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2073', 'tb_measurethicknessrecord_origin', '1208', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2074', 'tb_measurethicknessrecord_origin', '1209', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2075', 'tb_measurethicknessrecord_origin', '1210', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2076', 'tb_measurethicknessrecord_origin', '1211', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2077', 'tb_measurethicknessrecord_origin', '1212', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2078', 'tb_measurethicknessrecord_origin', '1213', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2079', 'tb_measurethicknessrecord_origin', '1214', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2080', 'tb_measurethicknessrecord_origin', '1215', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2081', 'tb_measurethicknessrecord_origin', '1216', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2082', 'tb_measurethicknessrecord_origin', '1217', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2083', 'tb_measurethicknessrecord_origin', '1218', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2084', 'tb_measurethicknessrecord_origin', '1219', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2085', 'tb_measurethicknessrecord_origin', '1220', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2086', 'tb_measurethicknessrecord_origin', '1221', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2087', 'tb_measurethicknessrecord_origin', '1222', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2088', 'tb_measurethicknessrecord_origin', '1223', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2089', 'tb_measurethicknessrecord_origin', '1224', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2090', 'tb_measurethicknessrecord_origin', '1225', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2091', 'tb_measurethicknessrecord_origin', '1226', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2092', 'tb_measurethicknessrecord_origin', '1227', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2093', 'tb_measurethicknessrecord_origin', '1228', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2094', 'tb_measurethicknessrecord_origin', '1229', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2095', 'tb_measurethicknessrecord_origin', '1230', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2096', 'tb_measurethicknessrecord_origin', '1231', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2097', 'tb_measurethicknessrecord_origin', '1232', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2098', 'tb_measurethicknessrecord_origin', '1233', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2099', 'tb_measurethicknessrecord_origin', '1234', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2100', 'tb_measurethicknessrecord_origin', '1235', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2101', 'tb_measurethicknessrecord_origin', '1236', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2102', 'tb_measurethicknessrecord_origin', '1237', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2103', 'tb_measurethicknessrecord_origin', '1238', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2104', 'tb_measurethicknessrecord_origin', '1239', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2105', 'tb_measurethicknessrecord_origin', '1240', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2106', 'tb_measurethicknessrecord_origin', '1241', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2107', 'tb_measurethicknessrecord_origin', '1242', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2108', 'tb_measurethicknessrecord_origin', '1243', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2109', 'tb_measurethicknessrecord_origin', '1244', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2110', 'tb_measurethicknessrecord_origin', '1245', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2111', 'tb_measurethicknessrecord_origin', '1246', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2112', 'tb_measurethicknessrecord_origin', '1247', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2113', 'tb_measurethicknessrecord_origin', '1248', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2114', 'tb_measurethicknessrecord_origin', '1249', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2115', 'tb_measurethicknessrecord_origin', '1250', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2116', 'tb_measurethicknessrecord_origin', '1251', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2117', 'tb_measurethicknessrecord_origin', '1252', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2118', 'tb_measurethicknessrecord_origin', '1253', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2119', 'tb_measurethicknessrecord_origin', '1254', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2120', 'tb_measurethicknessrecord_origin', '1255', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2121', 'tb_measurethicknessrecord_origin', '1256', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2122', 'tb_measurethicknessrecord_origin', '1257', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2123', 'tb_measurethicknessrecord_origin', '1258', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2124', 'tb_measurethicknessrecord_origin', '1259', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2125', 'tb_measurethicknessrecord_origin', '1260', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2126', 'tb_measurethicknessrecord_origin', '1261', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2127', 'tb_measurethicknessrecord_origin', '1262', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2128', 'tb_measurethicknessrecord_origin', '1263', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2129', 'tb_measurethicknessrecord_origin', '1264', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2130', 'tb_measurethicknessrecord_origin', '1265', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2131', 'tb_measurethicknessrecord_origin', '1266', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2132', 'tb_measurethicknessrecord_origin', '1267', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2133', 'tb_measurethicknessrecord_origin', '1268', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2134', 'tb_measurethicknessrecord_origin', '1269', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2135', 'tb_measurethicknessrecord_origin', '1270', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2136', 'tb_measurethicknessrecord_origin', '1271', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2137', 'tb_measurethicknessrecord_origin', '1272', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2138', 'tb_measurethicknessrecord_origin', '1273', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2139', 'tb_measurethicknessrecord_origin', '1274', '2016-01-02 07:01:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2140', 'tb_measurethicknessrecord_origin', '1275', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2141', 'tb_measurethicknessrecord_origin', '1276', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2142', 'tb_measurethicknessrecord_origin', '1277', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2143', 'tb_measurethicknessrecord_origin', '1278', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2144', 'tb_measurethicknessrecord_origin', '1279', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2145', 'tb_measurethicknessrecord_origin', '1280', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2146', 'tb_measurethicknessrecord_origin', '1281', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2147', 'tb_measurethicknessrecord_origin', '1282', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2148', 'tb_measurethicknessrecord_origin', '1283', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2149', 'tb_measurethicknessrecord_origin', '1284', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2150', 'tb_measurethicknessrecord_origin', '1285', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2151', 'tb_measurethicknessrecord_origin', '1286', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2152', 'tb_measurethicknessrecord_origin', '1287', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2153', 'tb_measurethicknessrecord_origin', '1288', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2154', 'tb_measurethicknessrecord_origin', '1289', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2155', 'tb_measurethicknessrecord_origin', '1290', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2156', 'tb_measurethicknessrecord_origin', '1291', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2157', 'tb_measurethicknessrecord_origin', '1292', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2158', 'tb_measurethicknessrecord_origin', '1293', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2159', 'tb_measurethicknessrecord_origin', '1294', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2160', 'tb_measurethicknessrecord_origin', '1295', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2161', 'tb_measurethicknessrecord_origin', '1296', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2162', 'tb_measurethicknessrecord_origin', '1297', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2163', 'tb_measurethicknessrecord_origin', '1298', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2164', 'tb_measurethicknessrecord_origin', '1299', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2165', 'tb_measurethicknessrecord_origin', '1300', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2166', 'tb_measurethicknessrecord_origin', '1301', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2167', 'tb_measurethicknessrecord_origin', '1302', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2168', 'tb_measurethicknessrecord_origin', '1303', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2169', 'tb_measurethicknessrecord_origin', '1304', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2170', 'tb_measurethicknessrecord_origin', '1305', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2171', 'tb_measurethicknessrecord_origin', '1306', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2172', 'tb_measurethicknessrecord_origin', '1307', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2173', 'tb_measurethicknessrecord_origin', '1308', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2174', 'tb_measurethicknessrecord_origin', '1309', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2175', 'tb_measurethicknessrecord_origin', '1310', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2176', 'tb_measurethicknessrecord_origin', '1311', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2177', 'tb_measurethicknessrecord_origin', '1312', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2178', 'tb_measurethicknessrecord_origin', '1313', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2179', 'tb_measurethicknessrecord_origin', '1314', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2180', 'tb_measurethicknessrecord_origin', '1315', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2181', 'tb_measurethicknessrecord_origin', '1316', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2182', 'tb_measurethicknessrecord_origin', '1317', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2183', 'tb_measurethicknessrecord_origin', '1318', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2184', 'tb_measurethicknessrecord_origin', '1319', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2185', 'tb_measurethicknessrecord_origin', '1320', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2186', 'tb_measurethicknessrecord_origin', '1321', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2187', 'tb_measurethicknessrecord_origin', '1322', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2188', 'tb_measurethicknessrecord_origin', '1323', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2189', 'tb_measurethicknessrecord_origin', '1324', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2190', 'tb_measurethicknessrecord_origin', '1325', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2191', 'tb_measurethicknessrecord_origin', '1326', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2192', 'tb_measurethicknessrecord_origin', '1327', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2193', 'tb_measurethicknessrecord_origin', '1328', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2194', 'tb_measurethicknessrecord_origin', '1329', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2195', 'tb_measurethicknessrecord_origin', '1330', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2196', 'tb_measurethicknessrecord_origin', '1331', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2197', 'tb_measurethicknessrecord_origin', '1332', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2198', 'tb_measurethicknessrecord_origin', '1333', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2199', 'tb_measurethicknessrecord_origin', '1334', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2200', 'tb_measurethicknessrecord_origin', '1335', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2201', 'tb_measurethicknessrecord_origin', '1336', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2202', 'tb_measurethicknessrecord_origin', '1337', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2203', 'tb_measurethicknessrecord_origin', '1338', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2204', 'tb_measurethicknessrecord_origin', '1339', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2205', 'tb_measurethicknessrecord_origin', '1340', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2206', 'tb_measurethicknessrecord_origin', '1341', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2207', 'tb_measurethicknessrecord_origin', '1342', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2208', 'tb_measurethicknessrecord_origin', '1343', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2209', 'tb_measurethicknessrecord_origin', '1344', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2210', 'tb_measurethicknessrecord_origin', '1345', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2211', 'tb_measurethicknessrecord_origin', '1346', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2212', 'tb_measurethicknessrecord_origin', '1347', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2213', 'tb_measurethicknessrecord_origin', '1348', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2214', 'tb_measurethicknessrecord_origin', '1349', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2215', 'tb_measurethicknessrecord_origin', '1350', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2216', 'tb_measurethicknessrecord_origin', '1351', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2217', 'tb_measurethicknessrecord_origin', '1352', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2218', 'tb_measurethicknessrecord_origin', '1353', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2219', 'tb_measurethicknessrecord_origin', '1354', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2220', 'tb_measurethicknessrecord_origin', '1355', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2221', 'tb_measurethicknessrecord_origin', '1356', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2222', 'tb_measurethicknessrecord_origin', '1357', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2223', 'tb_measurethicknessrecord_origin', '1358', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2224', 'tb_measurethicknessrecord_origin', '1359', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2225', 'tb_measurethicknessrecord_origin', '1360', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2226', 'tb_measurethicknessrecord_origin', '1361', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2227', 'tb_measurethicknessrecord_origin', '1362', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2228', 'tb_measurethicknessrecord_origin', '1363', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2229', 'tb_measurethicknessrecord_origin', '1364', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2230', 'tb_measurethicknessrecord_origin', '1365', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2231', 'tb_measurethicknessrecord_origin', '1366', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2232', 'tb_measurethicknessrecord_origin', '1367', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2233', 'tb_measurethicknessrecord_origin', '1368', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2234', 'tb_measurethicknessrecord_origin', '1369', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2235', 'tb_measurethicknessrecord_origin', '1370', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2236', 'tb_measurethicknessrecord_origin', '1371', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2237', 'tb_measurethicknessrecord_origin', '1372', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2238', 'tb_measurethicknessrecord_origin', '1373', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2239', 'tb_measurethicknessrecord_origin', '1374', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2240', 'tb_measurethicknessrecord_origin', '1375', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2241', 'tb_measurethicknessrecord_origin', '1376', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2242', 'tb_measurethicknessrecord_origin', '1377', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2243', 'tb_measurethicknessrecord_origin', '1378', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2244', 'tb_measurethicknessrecord_origin', '1379', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2245', 'tb_measurethicknessrecord_origin', '1380', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2246', 'tb_measurethicknessrecord_origin', '1381', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2247', 'tb_measurethicknessrecord_origin', '1382', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2248', 'tb_measurethicknessrecord_origin', '1383', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2249', 'tb_measurethicknessrecord_origin', '1384', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2250', 'tb_measurethicknessrecord_origin', '1385', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2251', 'tb_measurethicknessrecord_origin', '1386', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2252', 'tb_measurethicknessrecord_origin', '1387', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2253', 'tb_measurethicknessrecord_origin', '1388', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2254', 'tb_measurethicknessrecord_origin', '1389', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2255', 'tb_measurethicknessrecord_origin', '1390', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2256', 'tb_measurethicknessrecord_origin', '1391', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2257', 'tb_measurethicknessrecord_origin', '1392', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2258', 'tb_measurethicknessrecord_origin', '1393', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2259', 'tb_measurethicknessrecord_origin', '1394', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2260', 'tb_measurethicknessrecord_origin', '1395', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2261', 'tb_measurethicknessrecord_origin', '1396', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2262', 'tb_measurethicknessrecord_origin', '1397', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2263', 'tb_measurethicknessrecord_origin', '1398', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2264', 'tb_measurethicknessrecord_origin', '1399', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2265', 'tb_measurethicknessrecord_origin', '1400', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2266', 'tb_measurethicknessrecord_origin', '1401', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2267', 'tb_measurethicknessrecord_origin', '1402', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2268', 'tb_measurethicknessrecord_origin', '1403', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2269', 'tb_measurethicknessrecord_origin', '1404', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2270', 'tb_measurethicknessrecord_origin', '1405', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2271', 'tb_measurethicknessrecord_origin', '1406', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2272', 'tb_measurethicknessrecord_origin', '1407', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2273', 'tb_measurethicknessrecord_origin', '1408', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2274', 'tb_measurethicknessrecord_origin', '1409', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2275', 'tb_measurethicknessrecord_origin', '1410', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2276', 'tb_measurethicknessrecord_origin', '1411', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2277', 'tb_measurethicknessrecord_origin', '1412', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2278', 'tb_measurethicknessrecord_origin', '1413', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2279', 'tb_measurethicknessrecord_origin', '1414', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2280', 'tb_measurethicknessrecord_origin', '1415', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2281', 'tb_measurethicknessrecord_origin', '1416', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2282', 'tb_measurethicknessrecord_origin', '1417', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2283', 'tb_measurethicknessrecord_origin', '1418', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2284', 'tb_measurethicknessrecord_origin', '1419', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2285', 'tb_measurethicknessrecord_origin', '1420', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2286', 'tb_measurethicknessrecord_origin', '1421', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2287', 'tb_measurethicknessrecord_origin', '1422', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2288', 'tb_measurethicknessrecord_origin', '1423', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2289', 'tb_measurethicknessrecord_origin', '1424', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2290', 'tb_measurethicknessrecord_origin', '1425', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2291', 'tb_measurethicknessrecord_origin', '1426', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2292', 'tb_measurethicknessrecord_origin', '1427', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2293', 'tb_measurethicknessrecord_origin', '1428', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2294', 'tb_measurethicknessrecord_origin', '1429', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2295', 'tb_measurethicknessrecord_origin', '1430', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2296', 'tb_measurethicknessrecord_origin', '1431', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2297', 'tb_measurethicknessrecord_origin', '1432', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2298', 'tb_measurethicknessrecord_origin', '1433', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2299', 'tb_measurethicknessrecord_origin', '1434', '2016-01-02 07:01:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2300', 'tb_measurethicknessrecord_origin', '1435', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2301', 'tb_measurethicknessrecord_origin', '1436', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2302', 'tb_measurethicknessrecord_origin', '1437', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2303', 'tb_measurethicknessrecord_origin', '1438', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2304', 'tb_measurethicknessrecord_origin', '1439', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2305', 'tb_measurethicknessrecord_origin', '1440', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2306', 'tb_measurethicknessrecord_origin', '1441', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2307', 'tb_measurethicknessrecord_origin', '1442', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2308', 'tb_measurethicknessrecord_origin', '1443', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2309', 'tb_measurethicknessrecord_origin', '1444', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2310', 'tb_measurethicknessrecord_origin', '1445', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2311', 'tb_measurethicknessrecord_origin', '1446', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2312', 'tb_measurethicknessrecord_origin', '1447', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2313', 'tb_measurethicknessrecord_origin', '1448', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2314', 'tb_measurethicknessrecord_origin', '1449', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2315', 'tb_measurethicknessrecord_origin', '1450', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2316', 'tb_measurethicknessrecord_origin', '1451', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2317', 'tb_measurethicknessrecord_origin', '1452', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2318', 'tb_measurethicknessrecord_origin', '1453', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2319', 'tb_measurethicknessrecord_origin', '1454', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2320', 'tb_measurethicknessrecord_origin', '1455', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2321', 'tb_measurethicknessrecord_origin', '1456', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2322', 'tb_measurethicknessrecord_origin', '1457', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2323', 'tb_measurethicknessrecord_origin', '1458', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2324', 'tb_measurethicknessrecord_origin', '1459', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2325', 'tb_measurethicknessrecord_origin', '1460', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2326', 'tb_measurethicknessrecord_origin', '1461', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2327', 'tb_measurethicknessrecord_origin', '1462', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2328', 'tb_measurethicknessrecord_origin', '1463', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2329', 'tb_measurethicknessrecord_origin', '1464', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2330', 'tb_measurethicknessrecord_origin', '1465', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2331', 'tb_measurethicknessrecord_origin', '1466', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2332', 'tb_measurethicknessrecord_origin', '1467', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2333', 'tb_measurethicknessrecord_origin', '1468', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2334', 'tb_measurethicknessrecord_origin', '1469', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2335', 'tb_measurethicknessrecord_origin', '1470', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2336', 'tb_measurethicknessrecord_origin', '1471', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2337', 'tb_measurethicknessrecord_origin', '1472', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2338', 'tb_measurethicknessrecord_origin', '1473', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2339', 'tb_measurethicknessrecord_origin', '1474', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2340', 'tb_measurethicknessrecord_origin', '1475', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2341', 'tb_measurethicknessrecord_origin', '1476', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2342', 'tb_measurethicknessrecord_origin', '1477', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2343', 'tb_measurethicknessrecord_origin', '1478', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2344', 'tb_measurethicknessrecord_origin', '1479', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2345', 'tb_measurethicknessrecord_origin', '1480', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2346', 'tb_measurethicknessrecord_origin', '1481', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2347', 'tb_measurethicknessrecord_origin', '1482', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2348', 'tb_measurethicknessrecord_origin', '1483', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2349', 'tb_measurethicknessrecord_origin', '1484', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2350', 'tb_measurethicknessrecord_origin', '1485', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2351', 'tb_measurethicknessrecord_origin', '1486', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2352', 'tb_measurethicknessrecord_origin', '1487', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2353', 'tb_measurethicknessrecord_origin', '1488', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2354', 'tb_measurethicknessrecord_origin', '1489', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2355', 'tb_measurethicknessrecord_origin', '1490', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2356', 'tb_measurethicknessrecord_origin', '1491', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2357', 'tb_measurethicknessrecord_origin', '1492', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2358', 'tb_measurethicknessrecord_origin', '1493', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2359', 'tb_measurethicknessrecord_origin', '1494', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2360', 'tb_measurethicknessrecord_origin', '1495', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2361', 'tb_measurethicknessrecord_origin', '1496', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2362', 'tb_measurethicknessrecord_origin', '1497', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2363', 'tb_measurethicknessrecord_origin', '1498', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2364', 'tb_measurethicknessrecord_origin', '1499', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2365', 'tb_measurethicknessrecord_origin', '1500', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2366', 'tb_measurethicknessrecord_origin', '1501', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2367', 'tb_measurethicknessrecord_origin', '1502', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2368', 'tb_measurethicknessrecord_origin', '1503', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2369', 'tb_measurethicknessrecord_origin', '1504', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2370', 'tb_measurethicknessrecord_origin', '1505', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2371', 'tb_measurethicknessrecord_origin', '1506', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2372', 'tb_measurethicknessrecord_origin', '1507', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2373', 'tb_measurethicknessrecord_origin', '1508', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2374', 'tb_measurethicknessrecord_origin', '1509', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2375', 'tb_measurethicknessrecord_origin', '1510', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2376', 'tb_measurethicknessrecord_origin', '1511', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2377', 'tb_measurethicknessrecord_origin', '1512', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2378', 'tb_measurethicknessrecord_origin', '1513', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2379', 'tb_measurethicknessrecord_origin', '1514', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2380', 'tb_measurethicknessrecord_origin', '1515', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2381', 'tb_measurethicknessrecord_origin', '1516', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2382', 'tb_measurethicknessrecord_origin', '1517', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2383', 'tb_measurethicknessrecord_origin', '1518', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2384', 'tb_measurethicknessrecord_origin', '1519', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2385', 'tb_measurethicknessrecord_origin', '1520', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2386', 'tb_measurethicknessrecord_origin', '1521', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2387', 'tb_measurethicknessrecord_origin', '1522', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2388', 'tb_measurethicknessrecord_origin', '1523', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2389', 'tb_measurethicknessrecord_origin', '1524', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2390', 'tb_measurethicknessrecord_origin', '1525', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2391', 'tb_measurethicknessrecord_origin', '1526', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2392', 'tb_measurethicknessrecord_origin', '1527', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2393', 'tb_measurethicknessrecord_origin', '1528', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2394', 'tb_measurethicknessrecord_origin', '1529', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2395', 'tb_measurethicknessrecord_origin', '1530', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2396', 'tb_measurethicknessrecord_origin', '1531', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2397', 'tb_measurethicknessrecord_origin', '1532', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2398', 'tb_measurethicknessrecord_origin', '1533', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2399', 'tb_measurethicknessrecord_origin', '1534', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2400', 'tb_measurethicknessrecord_origin', '1535', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2401', 'tb_measurethicknessrecord_origin', '1536', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2402', 'tb_measurethicknessrecord_origin', '1537', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2403', 'tb_measurethicknessrecord_origin', '1538', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2404', 'tb_measurethicknessrecord_origin', '1539', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2405', 'tb_measurethicknessrecord_origin', '1540', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2406', 'tb_measurethicknessrecord_origin', '1541', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2407', 'tb_measurethicknessrecord_origin', '1542', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2408', 'tb_measurethicknessrecord_origin', '1543', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2409', 'tb_measurethicknessrecord_origin', '1544', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2410', 'tb_measurethicknessrecord_origin', '1545', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2411', 'tb_measurethicknessrecord_origin', '1546', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2412', 'tb_measurethicknessrecord_origin', '1547', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2413', 'tb_measurethicknessrecord_origin', '1548', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2414', 'tb_measurethicknessrecord_origin', '1549', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2415', 'tb_measurethicknessrecord_origin', '1550', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2416', 'tb_measurethicknessrecord_origin', '1551', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2417', 'tb_measurethicknessrecord_origin', '1552', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2418', 'tb_measurethicknessrecord_origin', '1553', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2419', 'tb_measurethicknessrecord_origin', '1554', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2420', 'tb_measurethicknessrecord_origin', '1555', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2421', 'tb_measurethicknessrecord_origin', '1556', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2422', 'tb_measurethicknessrecord_origin', '1557', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2423', 'tb_measurethicknessrecord_origin', '1558', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2424', 'tb_measurethicknessrecord_origin', '1559', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2425', 'tb_measurethicknessrecord_origin', '1560', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2426', 'tb_measurethicknessrecord_origin', '1561', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2427', 'tb_measurethicknessrecord_origin', '1562', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2428', 'tb_measurethicknessrecord_origin', '1563', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2429', 'tb_measurethicknessrecord_origin', '1564', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2430', 'tb_measurethicknessrecord_origin', '1565', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2431', 'tb_measurethicknessrecord_origin', '1566', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2432', 'tb_measurethicknessrecord_origin', '1567', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2433', 'tb_measurethicknessrecord_origin', '1568', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2434', 'tb_measurethicknessrecord_origin', '1569', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2435', 'tb_measurethicknessrecord_origin', '1570', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2436', 'tb_measurethicknessrecord_origin', '1571', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2437', 'tb_measurethicknessrecord_origin', '1572', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2438', 'tb_measurethicknessrecord_origin', '1573', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2439', 'tb_measurethicknessrecord_origin', '1574', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2440', 'tb_measurethicknessrecord_origin', '1575', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2441', 'tb_measurethicknessrecord_origin', '1576', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2442', 'tb_measurethicknessrecord_origin', '1577', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2443', 'tb_measurethicknessrecord_origin', '1578', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2444', 'tb_measurethicknessrecord_origin', '1579', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2445', 'tb_measurethicknessrecord_origin', '1580', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2446', 'tb_measurethicknessrecord_origin', '1581', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2447', 'tb_measurethicknessrecord_origin', '1582', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2448', 'tb_measurethicknessrecord_origin', '1583', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2449', 'tb_measurethicknessrecord_origin', '1584', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2450', 'tb_measurethicknessrecord_origin', '1585', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2451', 'tb_measurethicknessrecord_origin', '1586', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2452', 'tb_measurethicknessrecord_origin', '1587', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2453', 'tb_measurethicknessrecord_origin', '1588', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2454', 'tb_measurethicknessrecord_origin', '1589', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2455', 'tb_measurethicknessrecord_origin', '1590', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2456', 'tb_measurethicknessrecord_origin', '1591', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2457', 'tb_measurethicknessrecord_origin', '1592', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2458', 'tb_measurethicknessrecord_origin', '1593', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2459', 'tb_measurethicknessrecord_origin', '1594', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2460', 'tb_measurethicknessrecord_origin', '1595', '2016-01-02 07:01:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2461', 'tb_measurethicknessrecord_origin', '1596', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2462', 'tb_measurethicknessrecord_origin', '1597', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2463', 'tb_measurethicknessrecord_origin', '1598', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2464', 'tb_measurethicknessrecord_origin', '1599', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2465', 'tb_measurethicknessrecord_origin', '1600', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2466', 'tb_measurethicknessrecord_origin', '1601', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2467', 'tb_measurethicknessrecord_origin', '1602', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2468', 'tb_measurethicknessrecord_origin', '1603', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2469', 'tb_measurethicknessrecord_origin', '1604', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2470', 'tb_measurethicknessrecord_origin', '1605', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2471', 'tb_measurethicknessrecord_origin', '1606', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2472', 'tb_measurethicknessrecord_origin', '1607', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2473', 'tb_measurethicknessrecord_origin', '1608', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2474', 'tb_measurethicknessrecord_origin', '1609', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2475', 'tb_measurethicknessrecord_origin', '1610', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2476', 'tb_measurethicknessrecord_origin', '1611', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2477', 'tb_measurethicknessrecord_origin', '1612', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2478', 'tb_measurethicknessrecord_origin', '1613', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2479', 'tb_measurethicknessrecord_origin', '1614', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2480', 'tb_measurethicknessrecord_origin', '1615', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2481', 'tb_measurethicknessrecord_origin', '1616', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2482', 'tb_measurethicknessrecord_origin', '1617', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2483', 'tb_measurethicknessrecord_origin', '1618', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2484', 'tb_measurethicknessrecord_origin', '1619', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2485', 'tb_measurethicknessrecord_origin', '1620', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2486', 'tb_measurethicknessrecord_origin', '1621', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2487', 'tb_measurethicknessrecord_origin', '1622', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2488', 'tb_measurethicknessrecord_origin', '1623', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2489', 'tb_measurethicknessrecord_origin', '1624', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2490', 'tb_measurethicknessrecord_origin', '1625', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2491', 'tb_measurethicknessrecord_origin', '1626', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2492', 'tb_measurethicknessrecord_origin', '1627', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2493', 'tb_measurethicknessrecord_origin', '1628', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2494', 'tb_measurethicknessrecord_origin', '1629', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2495', 'tb_measurethicknessrecord_origin', '1630', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2496', 'tb_measurethicknessrecord_origin', '1631', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2497', 'tb_measurethicknessrecord_origin', '1632', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2498', 'tb_measurethicknessrecord_origin', '1633', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2499', 'tb_measurethicknessrecord_origin', '1634', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2500', 'tb_measurethicknessrecord_origin', '1635', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2501', 'tb_measurethicknessrecord_origin', '1636', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2502', 'tb_measurethicknessrecord_origin', '1637', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2503', 'tb_measurethicknessrecord_origin', '1638', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2504', 'tb_measurethicknessrecord_origin', '1639', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2505', 'tb_measurethicknessrecord_origin', '1640', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2506', 'tb_measurethicknessrecord_origin', '1641', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2507', 'tb_measurethicknessrecord_origin', '1642', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2508', 'tb_measurethicknessrecord_origin', '1643', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2509', 'tb_measurethicknessrecord_origin', '1644', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2510', 'tb_measurethicknessrecord_origin', '1645', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2511', 'tb_measurethicknessrecord_origin', '1646', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2512', 'tb_measurethicknessrecord_origin', '1647', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2513', 'tb_measurethicknessrecord_origin', '1648', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2514', 'tb_measurethicknessrecord_origin', '1649', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2515', 'tb_measurethicknessrecord_origin', '1650', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2516', 'tb_measurethicknessrecord_origin', '1651', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2517', 'tb_measurethicknessrecord_origin', '1652', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2518', 'tb_measurethicknessrecord_origin', '1653', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2519', 'tb_measurethicknessrecord_origin', '1654', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2520', 'tb_measurethicknessrecord_origin', '1655', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2521', 'tb_measurethicknessrecord_origin', '1656', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2522', 'tb_measurethicknessrecord_origin', '1657', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2523', 'tb_measurethicknessrecord_origin', '1658', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2524', 'tb_measurethicknessrecord_origin', '1659', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2525', 'tb_measurethicknessrecord_origin', '1660', '2016-01-02 07:01:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2526', 'tb_measurethicknessrecord_origin', '1661', '2016-01-02 07:14:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2527', 'tb_measurethicknessrecord_origin', '1662', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2528', 'tb_measurethicknessrecord_origin', '1663', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2529', 'tb_measurethicknessrecord_origin', '1664', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2530', 'tb_measurethicknessrecord_origin', '1665', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2531', 'tb_measurethicknessrecord_origin', '1666', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2532', 'tb_measurethicknessrecord_origin', '1667', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2533', 'tb_measurethicknessrecord_origin', '1668', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2534', 'tb_measurethicknessrecord_origin', '1669', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2535', 'tb_measurethicknessrecord_origin', '1670', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2536', 'tb_measurethicknessrecord_origin', '1671', '2016-01-02 07:16:43', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2537', 'tb_measurethicknessrecord_origin', '1672', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2538', 'tb_measurethicknessrecord_origin', '1673', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2539', 'tb_measurethicknessrecord_origin', '1674', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2540', 'tb_measurethicknessrecord_origin', '1675', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2541', 'tb_measurethicknessrecord_origin', '1676', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2542', 'tb_measurethicknessrecord_origin', '1677', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2543', 'tb_measurethicknessrecord_origin', '1678', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2544', 'tb_measurethicknessrecord_origin', '1679', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2545', 'tb_measurethicknessrecord_origin', '1680', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2546', 'tb_measurethicknessrecord_origin', '1681', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2547', 'tb_measurethicknessrecord_origin', '1682', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2548', 'tb_measurethicknessrecord_origin', '1683', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2549', 'tb_measurethicknessrecord_origin', '1684', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2550', 'tb_measurethicknessrecord_origin', '1685', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2551', 'tb_measurethicknessrecord_origin', '1686', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2552', 'tb_measurethicknessrecord_origin', '1687', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2553', 'tb_measurethicknessrecord_origin', '1688', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2554', 'tb_measurethicknessrecord_origin', '1689', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2555', 'tb_measurethicknessrecord_origin', '1690', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2556', 'tb_measurethicknessrecord_origin', '1691', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2557', 'tb_measurethicknessrecord_origin', '1692', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2558', 'tb_measurethicknessrecord_origin', '1693', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2559', 'tb_measurethicknessrecord_origin', '1694', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2560', 'tb_measurethicknessrecord_origin', '1695', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2561', 'tb_measurethicknessrecord_origin', '1696', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2562', 'tb_measurethicknessrecord_origin', '1697', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2563', 'tb_measurethicknessrecord_origin', '1698', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2564', 'tb_measurethicknessrecord_origin', '1699', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2565', 'tb_measurethicknessrecord_origin', '1700', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2566', 'tb_measurethicknessrecord_origin', '1701', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2567', 'tb_measurethicknessrecord_origin', '1702', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2568', 'tb_measurethicknessrecord_origin', '1703', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2569', 'tb_measurethicknessrecord_origin', '1704', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2570', 'tb_measurethicknessrecord_origin', '1705', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2571', 'tb_measurethicknessrecord_origin', '1706', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2572', 'tb_measurethicknessrecord_origin', '1707', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2573', 'tb_measurethicknessrecord_origin', '1708', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2574', 'tb_measurethicknessrecord_origin', '1709', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2575', 'tb_measurethicknessrecord_origin', '1710', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2576', 'tb_measurethicknessrecord_origin', '1711', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2577', 'tb_measurethicknessrecord_origin', '1712', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2578', 'tb_measurethicknessrecord_origin', '1713', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2579', 'tb_measurethicknessrecord_origin', '1714', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2580', 'tb_measurethicknessrecord_origin', '1715', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2581', 'tb_measurethicknessrecord_origin', '1716', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2582', 'tb_measurethicknessrecord_origin', '1717', '2016-01-02 07:16:44', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2583', 'tb_measurethicknessrecord_origin', '1718', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2584', 'tb_measurethicknessrecord_origin', '1719', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2585', 'tb_measurethicknessrecord_origin', '1720', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2586', 'tb_measurethicknessrecord_origin', '1721', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2587', 'tb_measurethicknessrecord_origin', '1722', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2588', 'tb_measurethicknessrecord_origin', '1723', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2589', 'tb_measurethicknessrecord_origin', '1724', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2590', 'tb_measurethicknessrecord_origin', '1725', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2591', 'tb_measurethicknessrecord_origin', '1726', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2592', 'tb_measurethicknessrecord_origin', '1727', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2593', 'tb_measurethicknessrecord_origin', '1728', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2594', 'tb_measurethicknessrecord_origin', '1729', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2595', 'tb_measurethicknessrecord_origin', '1730', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2596', 'tb_measurethicknessrecord_origin', '1731', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2597', 'tb_measurethicknessrecord_origin', '1732', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2598', 'tb_measurethicknessrecord_origin', '1733', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2599', 'tb_measurethicknessrecord_origin', '1734', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2600', 'tb_measurethicknessrecord_origin', '1735', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2601', 'tb_measurethicknessrecord_origin', '1736', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2602', 'tb_measurethicknessrecord_origin', '1737', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2603', 'tb_measurethicknessrecord_origin', '1738', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2604', 'tb_measurethicknessrecord_origin', '1739', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2605', 'tb_measurethicknessrecord_origin', '1740', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2606', 'tb_measurethicknessrecord_origin', '1741', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2607', 'tb_measurethicknessrecord_origin', '1742', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2608', 'tb_measurethicknessrecord_origin', '1743', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2609', 'tb_measurethicknessrecord_origin', '1744', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2610', 'tb_measurethicknessrecord_origin', '1745', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2611', 'tb_measurethicknessrecord_origin', '1746', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2612', 'tb_measurethicknessrecord_origin', '1747', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2613', 'tb_measurethicknessrecord_origin', '1748', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2614', 'tb_measurethicknessrecord_origin', '1749', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2615', 'tb_measurethicknessrecord_origin', '1750', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2616', 'tb_measurethicknessrecord_origin', '1751', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2617', 'tb_measurethicknessrecord_origin', '1752', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2618', 'tb_measurethicknessrecord_origin', '1753', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2619', 'tb_measurethicknessrecord_origin', '1754', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2620', 'tb_measurethicknessrecord_origin', '1755', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2621', 'tb_measurethicknessrecord_origin', '1756', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2622', 'tb_measurethicknessrecord_origin', '1757', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2623', 'tb_measurethicknessrecord_origin', '1758', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2624', 'tb_measurethicknessrecord_origin', '1759', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2625', 'tb_measurethicknessrecord_origin', '1760', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2626', 'tb_measurethicknessrecord_origin', '1761', '2016-01-02 07:16:45', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2627', 'tb_measurethicknessrecord_origin', '1762', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2628', 'tb_measurethicknessrecord_origin', '1763', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2629', 'tb_measurethicknessrecord_origin', '1764', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2630', 'tb_measurethicknessrecord_origin', '1765', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2631', 'tb_measurethicknessrecord_origin', '1766', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2632', 'tb_measurethicknessrecord_origin', '1767', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2633', 'tb_measurethicknessrecord_origin', '1768', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2634', 'tb_measurethicknessrecord_origin', '1769', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2635', 'tb_measurethicknessrecord_origin', '1770', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2636', 'tb_measurethicknessrecord_origin', '1771', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2637', 'tb_measurethicknessrecord_origin', '1772', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2638', 'tb_measurethicknessrecord_origin', '1773', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2639', 'tb_measurethicknessrecord_origin', '1774', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2640', 'tb_measurethicknessrecord_origin', '1775', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2641', 'tb_measurethicknessrecord_origin', '1776', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2642', 'tb_measurethicknessrecord_origin', '1777', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2643', 'tb_measurethicknessrecord_origin', '1778', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2644', 'tb_measurethicknessrecord_origin', '1779', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2645', 'tb_measurethicknessrecord_origin', '1780', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2646', 'tb_measurethicknessrecord_origin', '1781', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2647', 'tb_measurethicknessrecord_origin', '1782', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2648', 'tb_measurethicknessrecord_origin', '1783', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2649', 'tb_measurethicknessrecord_origin', '1784', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2650', 'tb_measurethicknessrecord_origin', '1785', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2651', 'tb_measurethicknessrecord_origin', '1786', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2652', 'tb_measurethicknessrecord_origin', '1787', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2653', 'tb_measurethicknessrecord_origin', '1788', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2654', 'tb_measurethicknessrecord_origin', '1789', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2655', 'tb_measurethicknessrecord_origin', '1790', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2656', 'tb_measurethicknessrecord_origin', '1791', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2657', 'tb_measurethicknessrecord_origin', '1792', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2658', 'tb_measurethicknessrecord_origin', '1793', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2659', 'tb_measurethicknessrecord_origin', '1794', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2660', 'tb_measurethicknessrecord_origin', '1795', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2661', 'tb_measurethicknessrecord_origin', '1796', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2662', 'tb_measurethicknessrecord_origin', '1797', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2663', 'tb_measurethicknessrecord_origin', '1798', '2016-01-02 07:16:46', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2664', 'tb_measurethicknessrecord_origin', '1799', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2665', 'tb_measurethicknessrecord_origin', '1800', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2666', 'tb_measurethicknessrecord_origin', '1801', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2667', 'tb_measurethicknessrecord_origin', '1802', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2668', 'tb_measurethicknessrecord_origin', '1803', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2669', 'tb_measurethicknessrecord_origin', '1804', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2670', 'tb_measurethicknessrecord_origin', '1805', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2671', 'tb_measurethicknessrecord_origin', '1806', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2672', 'tb_measurethicknessrecord_origin', '1807', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2673', 'tb_measurethicknessrecord_origin', '1808', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2674', 'tb_measurethicknessrecord_origin', '1809', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2675', 'tb_measurethicknessrecord_origin', '1810', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2676', 'tb_measurethicknessrecord_origin', '1811', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2677', 'tb_measurethicknessrecord_origin', '1812', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2678', 'tb_measurethicknessrecord_origin', '1813', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2679', 'tb_measurethicknessrecord_origin', '1814', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2680', 'tb_measurethicknessrecord_origin', '1815', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2681', 'tb_measurethicknessrecord_origin', '1816', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2682', 'tb_measurethicknessrecord_origin', '1817', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2683', 'tb_measurethicknessrecord_origin', '1818', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2684', 'tb_measurethicknessrecord_origin', '1819', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2685', 'tb_measurethicknessrecord_origin', '1820', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2686', 'tb_measurethicknessrecord_origin', '1821', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2687', 'tb_measurethicknessrecord_origin', '1822', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2688', 'tb_measurethicknessrecord_origin', '1823', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2689', 'tb_measurethicknessrecord_origin', '1824', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2690', 'tb_measurethicknessrecord_origin', '1825', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2691', 'tb_measurethicknessrecord_origin', '1826', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2692', 'tb_measurethicknessrecord_origin', '1827', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2693', 'tb_measurethicknessrecord_origin', '1828', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2694', 'tb_measurethicknessrecord_origin', '1829', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2695', 'tb_measurethicknessrecord_origin', '1830', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2696', 'tb_measurethicknessrecord_origin', '1831', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2697', 'tb_measurethicknessrecord_origin', '1832', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2698', 'tb_measurethicknessrecord_origin', '1833', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2699', 'tb_measurethicknessrecord_origin', '1834', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2700', 'tb_measurethicknessrecord_origin', '1835', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2701', 'tb_measurethicknessrecord_origin', '1836', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2702', 'tb_measurethicknessrecord_origin', '1837', '2016-01-02 07:16:47', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2703', 'tb_measurethicknessrecord_origin', '1838', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2704', 'tb_measurethicknessrecord_origin', '1839', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2705', 'tb_measurethicknessrecord_origin', '1840', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2706', 'tb_measurethicknessrecord_origin', '1841', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2707', 'tb_measurethicknessrecord_origin', '1842', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2708', 'tb_measurethicknessrecord_origin', '1843', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2709', 'tb_measurethicknessrecord_origin', '1844', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2710', 'tb_measurethicknessrecord_origin', '1845', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2711', 'tb_measurethicknessrecord_origin', '1846', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2712', 'tb_measurethicknessrecord_origin', '1847', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2713', 'tb_measurethicknessrecord_origin', '1848', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2714', 'tb_measurethicknessrecord_origin', '1849', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2715', 'tb_measurethicknessrecord_origin', '1850', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2716', 'tb_measurethicknessrecord_origin', '1851', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2717', 'tb_measurethicknessrecord_origin', '1852', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2718', 'tb_measurethicknessrecord_origin', '1853', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2719', 'tb_measurethicknessrecord_origin', '1854', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2720', 'tb_measurethicknessrecord_origin', '1855', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2721', 'tb_measurethicknessrecord_origin', '1856', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2722', 'tb_measurethicknessrecord_origin', '1857', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2723', 'tb_measurethicknessrecord_origin', '1858', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2724', 'tb_measurethicknessrecord_origin', '1859', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2725', 'tb_measurethicknessrecord_origin', '1860', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2726', 'tb_measurethicknessrecord_origin', '1861', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2727', 'tb_measurethicknessrecord_origin', '1862', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2728', 'tb_measurethicknessrecord_origin', '1863', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2729', 'tb_measurethicknessrecord_origin', '1864', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2730', 'tb_measurethicknessrecord_origin', '1865', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2731', 'tb_measurethicknessrecord_origin', '1866', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2732', 'tb_measurethicknessrecord_origin', '1867', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2733', 'tb_measurethicknessrecord_origin', '1868', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2734', 'tb_measurethicknessrecord_origin', '1869', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2735', 'tb_measurethicknessrecord_origin', '1870', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2736', 'tb_measurethicknessrecord_origin', '1871', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2737', 'tb_measurethicknessrecord_origin', '1872', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2738', 'tb_measurethicknessrecord_origin', '1873', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2739', 'tb_measurethicknessrecord_origin', '1874', '2016-01-02 07:16:48', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2740', 'tb_measurethicknessrecord_origin', '1875', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2741', 'tb_measurethicknessrecord_origin', '1876', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2742', 'tb_measurethicknessrecord_origin', '1877', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2743', 'tb_measurethicknessrecord_origin', '1878', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2744', 'tb_measurethicknessrecord_origin', '1879', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2745', 'tb_measurethicknessrecord_origin', '1880', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2746', 'tb_measurethicknessrecord_origin', '1881', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2747', 'tb_measurethicknessrecord_origin', '1882', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2748', 'tb_measurethicknessrecord_origin', '1883', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2749', 'tb_measurethicknessrecord_origin', '1884', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2750', 'tb_measurethicknessrecord_origin', '1885', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2751', 'tb_measurethicknessrecord_origin', '1886', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2752', 'tb_measurethicknessrecord_origin', '1887', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2753', 'tb_measurethicknessrecord_origin', '1888', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2754', 'tb_measurethicknessrecord_origin', '1889', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2755', 'tb_measurethicknessrecord_origin', '1890', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2756', 'tb_measurethicknessrecord_origin', '1891', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2757', 'tb_measurethicknessrecord_origin', '1892', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2758', 'tb_measurethicknessrecord_origin', '1893', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2759', 'tb_measurethicknessrecord_origin', '1894', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2760', 'tb_measurethicknessrecord_origin', '1895', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2761', 'tb_measurethicknessrecord_origin', '1896', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2762', 'tb_measurethicknessrecord_origin', '1897', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2763', 'tb_measurethicknessrecord_origin', '1898', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2764', 'tb_measurethicknessrecord_origin', '1899', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2765', 'tb_measurethicknessrecord_origin', '1900', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2766', 'tb_measurethicknessrecord_origin', '1901', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2767', 'tb_measurethicknessrecord_origin', '1902', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2768', 'tb_measurethicknessrecord_origin', '1903', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2769', 'tb_measurethicknessrecord_origin', '1904', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2770', 'tb_measurethicknessrecord_origin', '1905', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2771', 'tb_measurethicknessrecord_origin', '1906', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2772', 'tb_measurethicknessrecord_origin', '1907', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2773', 'tb_measurethicknessrecord_origin', '1908', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2774', 'tb_measurethicknessrecord_origin', '1909', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2775', 'tb_measurethicknessrecord_origin', '1910', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2776', 'tb_measurethicknessrecord_origin', '1911', '2016-01-02 07:16:49', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2777', 'tb_measurethicknessrecord_origin', '1912', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2778', 'tb_measurethicknessrecord_origin', '1913', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2779', 'tb_measurethicknessrecord_origin', '1914', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2780', 'tb_measurethicknessrecord_origin', '1915', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2781', 'tb_measurethicknessrecord_origin', '1916', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2782', 'tb_measurethicknessrecord_origin', '1917', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2783', 'tb_measurethicknessrecord_origin', '1918', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2784', 'tb_measurethicknessrecord_origin', '1919', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2785', 'tb_measurethicknessrecord_origin', '1920', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2786', 'tb_measurethicknessrecord_origin', '1921', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2787', 'tb_measurethicknessrecord_origin', '1922', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2788', 'tb_measurethicknessrecord_origin', '1923', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2789', 'tb_measurethicknessrecord_origin', '1924', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2790', 'tb_measurethicknessrecord_origin', '1925', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2791', 'tb_measurethicknessrecord_origin', '1926', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2792', 'tb_measurethicknessrecord_origin', '1927', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2793', 'tb_measurethicknessrecord_origin', '1928', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2794', 'tb_measurethicknessrecord_origin', '1929', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2795', 'tb_measurethicknessrecord_origin', '1930', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2796', 'tb_measurethicknessrecord_origin', '1931', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2797', 'tb_measurethicknessrecord_origin', '1932', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2798', 'tb_measurethicknessrecord_origin', '1933', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2799', 'tb_measurethicknessrecord_origin', '1934', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2800', 'tb_measurethicknessrecord_origin', '1935', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2801', 'tb_measurethicknessrecord_origin', '1936', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2802', 'tb_measurethicknessrecord_origin', '1937', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2803', 'tb_measurethicknessrecord_origin', '1938', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2804', 'tb_measurethicknessrecord_origin', '1939', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2805', 'tb_measurethicknessrecord_origin', '1940', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2806', 'tb_measurethicknessrecord_origin', '1941', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2807', 'tb_measurethicknessrecord_origin', '1942', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2808', 'tb_measurethicknessrecord_origin', '1943', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2809', 'tb_measurethicknessrecord_origin', '1944', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2810', 'tb_measurethicknessrecord_origin', '1945', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2811', 'tb_measurethicknessrecord_origin', '1946', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2812', 'tb_measurethicknessrecord_origin', '1947', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2813', 'tb_measurethicknessrecord_origin', '1948', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2814', 'tb_measurethicknessrecord_origin', '1949', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2815', 'tb_measurethicknessrecord_origin', '1950', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2816', 'tb_measurethicknessrecord_origin', '1951', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2817', 'tb_measurethicknessrecord_origin', '1952', '2016-01-02 07:16:50', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2818', 'tb_measurethicknessrecord_origin', '1953', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2819', 'tb_measurethicknessrecord_origin', '1954', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2820', 'tb_measurethicknessrecord_origin', '1955', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2821', 'tb_measurethicknessrecord_origin', '1956', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2822', 'tb_measurethicknessrecord_origin', '1957', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2823', 'tb_measurethicknessrecord_origin', '1958', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2824', 'tb_measurethicknessrecord_origin', '1959', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2825', 'tb_measurethicknessrecord_origin', '1960', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2826', 'tb_measurethicknessrecord_origin', '1961', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2827', 'tb_measurethicknessrecord_origin', '1962', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2828', 'tb_measurethicknessrecord_origin', '1963', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2829', 'tb_measurethicknessrecord_origin', '1964', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2830', 'tb_measurethicknessrecord_origin', '1965', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2831', 'tb_measurethicknessrecord_origin', '1966', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2832', 'tb_measurethicknessrecord_origin', '1967', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2833', 'tb_measurethicknessrecord_origin', '1968', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2834', 'tb_measurethicknessrecord_origin', '1969', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2835', 'tb_measurethicknessrecord_origin', '1970', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2836', 'tb_measurethicknessrecord_origin', '1971', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2837', 'tb_measurethicknessrecord_origin', '1972', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2838', 'tb_measurethicknessrecord_origin', '1973', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2839', 'tb_measurethicknessrecord_origin', '1974', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2840', 'tb_measurethicknessrecord_origin', '1975', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2841', 'tb_measurethicknessrecord_origin', '1976', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2842', 'tb_measurethicknessrecord_origin', '1977', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2843', 'tb_measurethicknessrecord_origin', '1978', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2844', 'tb_measurethicknessrecord_origin', '1979', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2845', 'tb_measurethicknessrecord_origin', '1980', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2846', 'tb_measurethicknessrecord_origin', '1981', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2847', 'tb_measurethicknessrecord_origin', '1982', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2848', 'tb_measurethicknessrecord_origin', '1983', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2849', 'tb_measurethicknessrecord_origin', '1984', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2850', 'tb_measurethicknessrecord_origin', '1985', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2851', 'tb_measurethicknessrecord_origin', '1986', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2852', 'tb_measurethicknessrecord_origin', '1987', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2853', 'tb_measurethicknessrecord_origin', '1988', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2854', 'tb_measurethicknessrecord_origin', '1989', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2855', 'tb_measurethicknessrecord_origin', '1990', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2856', 'tb_measurethicknessrecord_origin', '1991', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2857', 'tb_measurethicknessrecord_origin', '1992', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2858', 'tb_measurethicknessrecord_origin', '1993', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2859', 'tb_measurethicknessrecord_origin', '1994', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2860', 'tb_measurethicknessrecord_origin', '1995', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2861', 'tb_measurethicknessrecord_origin', '1996', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2862', 'tb_measurethicknessrecord_origin', '1997', '2016-01-02 07:16:51', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2863', 'tb_measurethicknessrecord_origin', '1998', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2864', 'tb_measurethicknessrecord_origin', '1999', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2865', 'tb_measurethicknessrecord_origin', '2000', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2866', 'tb_measurethicknessrecord_origin', '2001', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2867', 'tb_measurethicknessrecord_origin', '2002', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2868', 'tb_measurethicknessrecord_origin', '2003', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2869', 'tb_measurethicknessrecord_origin', '2004', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2870', 'tb_measurethicknessrecord_origin', '2005', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2871', 'tb_measurethicknessrecord_origin', '2006', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2872', 'tb_measurethicknessrecord_origin', '2007', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2873', 'tb_measurethicknessrecord_origin', '2008', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2874', 'tb_measurethicknessrecord_origin', '2009', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2875', 'tb_measurethicknessrecord_origin', '2010', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2876', 'tb_measurethicknessrecord_origin', '2011', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2877', 'tb_measurethicknessrecord_origin', '2012', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2878', 'tb_measurethicknessrecord_origin', '2013', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2879', 'tb_measurethicknessrecord_origin', '2014', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2880', 'tb_measurethicknessrecord_origin', '2015', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2881', 'tb_measurethicknessrecord_origin', '2016', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2882', 'tb_measurethicknessrecord_origin', '2017', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2883', 'tb_measurethicknessrecord_origin', '2018', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2884', 'tb_measurethicknessrecord_origin', '2019', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2885', 'tb_measurethicknessrecord_origin', '2020', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2886', 'tb_measurethicknessrecord_origin', '2021', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2887', 'tb_measurethicknessrecord_origin', '2022', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2888', 'tb_measurethicknessrecord_origin', '2023', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2889', 'tb_measurethicknessrecord_origin', '2024', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2890', 'tb_measurethicknessrecord_origin', '2025', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2891', 'tb_measurethicknessrecord_origin', '2026', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2892', 'tb_measurethicknessrecord_origin', '2027', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2893', 'tb_measurethicknessrecord_origin', '2028', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2894', 'tb_measurethicknessrecord_origin', '2029', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2895', 'tb_measurethicknessrecord_origin', '2030', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2896', 'tb_measurethicknessrecord_origin', '2031', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2897', 'tb_measurethicknessrecord_origin', '2032', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2898', 'tb_measurethicknessrecord_origin', '2033', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2899', 'tb_measurethicknessrecord_origin', '2034', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2900', 'tb_measurethicknessrecord_origin', '2035', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2901', 'tb_measurethicknessrecord_origin', '2036', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2902', 'tb_measurethicknessrecord_origin', '2037', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2903', 'tb_measurethicknessrecord_origin', '2038', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2904', 'tb_measurethicknessrecord_origin', '2039', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2905', 'tb_measurethicknessrecord_origin', '2040', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2906', 'tb_measurethicknessrecord_origin', '2041', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2907', 'tb_measurethicknessrecord_origin', '2042', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2908', 'tb_measurethicknessrecord_origin', '2043', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2909', 'tb_measurethicknessrecord_origin', '2044', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2910', 'tb_measurethicknessrecord_origin', '2045', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2911', 'tb_measurethicknessrecord_origin', '2046', '2016-01-02 07:16:52', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2912', 'tb_measurethicknessrecord_origin', '2047', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2913', 'tb_measurethicknessrecord_origin', '2048', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2914', 'tb_measurethicknessrecord_origin', '2049', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2915', 'tb_measurethicknessrecord_origin', '2050', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2916', 'tb_measurethicknessrecord_origin', '2051', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2917', 'tb_measurethicknessrecord_origin', '2052', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2918', 'tb_measurethicknessrecord_origin', '2053', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2919', 'tb_measurethicknessrecord_origin', '2054', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2920', 'tb_measurethicknessrecord_origin', '2055', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2921', 'tb_measurethicknessrecord_origin', '2056', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2922', 'tb_measurethicknessrecord_origin', '2057', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2923', 'tb_measurethicknessrecord_origin', '2058', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2924', 'tb_measurethicknessrecord_origin', '2059', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2925', 'tb_measurethicknessrecord_origin', '2060', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2926', 'tb_measurethicknessrecord_origin', '2061', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2927', 'tb_measurethicknessrecord_origin', '2062', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2928', 'tb_measurethicknessrecord_origin', '2063', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2929', 'tb_measurethicknessrecord_origin', '2064', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2930', 'tb_measurethicknessrecord_origin', '2065', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2931', 'tb_measurethicknessrecord_origin', '2066', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2932', 'tb_measurethicknessrecord_origin', '2067', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2933', 'tb_measurethicknessrecord_origin', '2068', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2934', 'tb_measurethicknessrecord_origin', '2069', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2935', 'tb_measurethicknessrecord_origin', '2070', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2936', 'tb_measurethicknessrecord_origin', '2071', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2937', 'tb_measurethicknessrecord_origin', '2072', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2938', 'tb_measurethicknessrecord_origin', '2073', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2939', 'tb_measurethicknessrecord_origin', '2074', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2940', 'tb_measurethicknessrecord_origin', '2075', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2941', 'tb_measurethicknessrecord_origin', '2076', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2942', 'tb_measurethicknessrecord_origin', '2077', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2943', 'tb_measurethicknessrecord_origin', '2078', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2944', 'tb_measurethicknessrecord_origin', '2079', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2945', 'tb_measurethicknessrecord_origin', '2080', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2946', 'tb_measurethicknessrecord_origin', '2081', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2947', 'tb_measurethicknessrecord_origin', '2082', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2948', 'tb_measurethicknessrecord_origin', '2083', '2016-01-02 07:16:53', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2949', 'tb_measurethicknessrecord_origin', '2084', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2950', 'tb_measurethicknessrecord_origin', '2085', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2951', 'tb_measurethicknessrecord_origin', '2086', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2952', 'tb_measurethicknessrecord_origin', '2087', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2953', 'tb_measurethicknessrecord_origin', '2088', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2954', 'tb_measurethicknessrecord_origin', '2089', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2955', 'tb_measurethicknessrecord_origin', '2090', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2956', 'tb_measurethicknessrecord_origin', '2091', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2957', 'tb_measurethicknessrecord_origin', '2092', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2958', 'tb_measurethicknessrecord_origin', '2093', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2959', 'tb_measurethicknessrecord_origin', '2094', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2960', 'tb_measurethicknessrecord_origin', '2095', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2961', 'tb_measurethicknessrecord_origin', '2096', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2962', 'tb_measurethicknessrecord_origin', '2097', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2963', 'tb_measurethicknessrecord_origin', '2098', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2964', 'tb_measurethicknessrecord_origin', '2099', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2965', 'tb_measurethicknessrecord_origin', '2100', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2966', 'tb_measurethicknessrecord_origin', '2101', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2967', 'tb_measurethicknessrecord_origin', '2102', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2968', 'tb_measurethicknessrecord_origin', '2103', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2969', 'tb_measurethicknessrecord_origin', '2104', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2970', 'tb_measurethicknessrecord_origin', '2105', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2971', 'tb_measurethicknessrecord_origin', '2106', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2972', 'tb_measurethicknessrecord_origin', '2107', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2973', 'tb_measurethicknessrecord_origin', '2108', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2974', 'tb_measurethicknessrecord_origin', '2109', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2975', 'tb_measurethicknessrecord_origin', '2110', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2976', 'tb_measurethicknessrecord_origin', '2111', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2977', 'tb_measurethicknessrecord_origin', '2112', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2978', 'tb_measurethicknessrecord_origin', '2113', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2979', 'tb_measurethicknessrecord_origin', '2114', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2980', 'tb_measurethicknessrecord_origin', '2115', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2981', 'tb_measurethicknessrecord_origin', '2116', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2982', 'tb_measurethicknessrecord_origin', '2117', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2983', 'tb_measurethicknessrecord_origin', '2118', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2984', 'tb_measurethicknessrecord_origin', '2119', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2985', 'tb_measurethicknessrecord_origin', '2120', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2986', 'tb_measurethicknessrecord_origin', '2121', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2987', 'tb_measurethicknessrecord_origin', '2122', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2988', 'tb_measurethicknessrecord_origin', '2123', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2989', 'tb_measurethicknessrecord_origin', '2124', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2990', 'tb_measurethicknessrecord_origin', '2125', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2991', 'tb_measurethicknessrecord_origin', '2126', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2992', 'tb_measurethicknessrecord_origin', '2127', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2993', 'tb_measurethicknessrecord_origin', '2128', '2016-01-02 07:16:54', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2994', 'tb_measurethicknessrecord_origin', '2129', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2995', 'tb_measurethicknessrecord_origin', '2130', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2996', 'tb_measurethicknessrecord_origin', '2131', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2997', 'tb_measurethicknessrecord_origin', '2132', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2998', 'tb_measurethicknessrecord_origin', '2133', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('2999', 'tb_measurethicknessrecord_origin', '2134', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3000', 'tb_measurethicknessrecord_origin', '2135', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3001', 'tb_measurethicknessrecord_origin', '2136', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3002', 'tb_measurethicknessrecord_origin', '2137', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3003', 'tb_measurethicknessrecord_origin', '2138', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3004', 'tb_measurethicknessrecord_origin', '2139', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3005', 'tb_measurethicknessrecord_origin', '2140', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3006', 'tb_measurethicknessrecord_origin', '2141', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3007', 'tb_measurethicknessrecord_origin', '2142', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3008', 'tb_measurethicknessrecord_origin', '2143', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3009', 'tb_measurethicknessrecord_origin', '2144', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3010', 'tb_measurethicknessrecord_origin', '2145', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3011', 'tb_measurethicknessrecord_origin', '2146', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3012', 'tb_measurethicknessrecord_origin', '2147', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3013', 'tb_measurethicknessrecord_origin', '2148', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3014', 'tb_measurethicknessrecord_origin', '2149', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3015', 'tb_measurethicknessrecord_origin', '2150', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3016', 'tb_measurethicknessrecord_origin', '2151', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3017', 'tb_measurethicknessrecord_origin', '2152', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3018', 'tb_measurethicknessrecord_origin', '2153', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3019', 'tb_measurethicknessrecord_origin', '2154', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3020', 'tb_measurethicknessrecord_origin', '2155', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3021', 'tb_measurethicknessrecord_origin', '2156', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3022', 'tb_measurethicknessrecord_origin', '2157', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3023', 'tb_measurethicknessrecord_origin', '2158', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3024', 'tb_measurethicknessrecord_origin', '2159', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3025', 'tb_measurethicknessrecord_origin', '2160', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3026', 'tb_measurethicknessrecord_origin', '2161', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3027', 'tb_measurethicknessrecord_origin', '2162', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3028', 'tb_measurethicknessrecord_origin', '2163', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3029', 'tb_measurethicknessrecord_origin', '2164', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3030', 'tb_measurethicknessrecord_origin', '2165', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3031', 'tb_measurethicknessrecord_origin', '2166', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3032', 'tb_measurethicknessrecord_origin', '2167', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3033', 'tb_measurethicknessrecord_origin', '2168', '2016-01-02 07:16:55', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3034', 'tb_measurethicknessrecord_origin', '2169', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3035', 'tb_measurethicknessrecord_origin', '2170', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3036', 'tb_measurethicknessrecord_origin', '2171', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3037', 'tb_measurethicknessrecord_origin', '2172', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3038', 'tb_measurethicknessrecord_origin', '2173', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3039', 'tb_measurethicknessrecord_origin', '2174', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3040', 'tb_measurethicknessrecord_origin', '2175', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3041', 'tb_measurethicknessrecord_origin', '2176', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3042', 'tb_measurethicknessrecord_origin', '2177', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3043', 'tb_measurethicknessrecord_origin', '2178', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3044', 'tb_measurethicknessrecord_origin', '2179', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3045', 'tb_measurethicknessrecord_origin', '2180', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3046', 'tb_measurethicknessrecord_origin', '2181', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3047', 'tb_measurethicknessrecord_origin', '2182', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3048', 'tb_measurethicknessrecord_origin', '2183', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3049', 'tb_measurethicknessrecord_origin', '2184', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3050', 'tb_measurethicknessrecord_origin', '2185', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3051', 'tb_measurethicknessrecord_origin', '2186', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3052', 'tb_measurethicknessrecord_origin', '2187', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3053', 'tb_measurethicknessrecord_origin', '2188', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3054', 'tb_measurethicknessrecord_origin', '2189', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3055', 'tb_measurethicknessrecord_origin', '2190', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3056', 'tb_measurethicknessrecord_origin', '2191', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3057', 'tb_measurethicknessrecord_origin', '2192', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3058', 'tb_measurethicknessrecord_origin', '2193', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3059', 'tb_measurethicknessrecord_origin', '2194', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3060', 'tb_measurethicknessrecord_origin', '2195', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3061', 'tb_measurethicknessrecord_origin', '2196', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3062', 'tb_measurethicknessrecord_origin', '2197', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3063', 'tb_measurethicknessrecord_origin', '2198', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3064', 'tb_measurethicknessrecord_origin', '2199', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3065', 'tb_measurethicknessrecord_origin', '2200', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3066', 'tb_measurethicknessrecord_origin', '2201', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3067', 'tb_measurethicknessrecord_origin', '2202', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3068', 'tb_measurethicknessrecord_origin', '2203', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3069', 'tb_measurethicknessrecord_origin', '2204', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3070', 'tb_measurethicknessrecord_origin', '2205', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3071', 'tb_measurethicknessrecord_origin', '2206', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3072', 'tb_measurethicknessrecord_origin', '2207', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3073', 'tb_measurethicknessrecord_origin', '2208', '2016-01-02 07:16:56', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3074', 'tb_measurethicknessrecord_origin', '2209', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3075', 'tb_measurethicknessrecord_origin', '2210', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3076', 'tb_measurethicknessrecord_origin', '2211', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3077', 'tb_measurethicknessrecord_origin', '2212', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3078', 'tb_measurethicknessrecord_origin', '2213', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3079', 'tb_measurethicknessrecord_origin', '2214', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3080', 'tb_measurethicknessrecord_origin', '2215', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3081', 'tb_measurethicknessrecord_origin', '2216', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3082', 'tb_measurethicknessrecord_origin', '2217', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3083', 'tb_measurethicknessrecord_origin', '2218', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3084', 'tb_measurethicknessrecord_origin', '2219', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3085', 'tb_measurethicknessrecord_origin', '2220', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3086', 'tb_measurethicknessrecord_origin', '2221', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3087', 'tb_measurethicknessrecord_origin', '2222', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3088', 'tb_measurethicknessrecord_origin', '2223', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3089', 'tb_measurethicknessrecord_origin', '2224', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3090', 'tb_measurethicknessrecord_origin', '2225', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3091', 'tb_measurethicknessrecord_origin', '2226', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3092', 'tb_measurethicknessrecord_origin', '2227', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3093', 'tb_measurethicknessrecord_origin', '2228', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3094', 'tb_measurethicknessrecord_origin', '2229', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3095', 'tb_measurethicknessrecord_origin', '2230', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3096', 'tb_measurethicknessrecord_origin', '2231', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3097', 'tb_measurethicknessrecord_origin', '2232', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3098', 'tb_measurethicknessrecord_origin', '2233', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3099', 'tb_measurethicknessrecord_origin', '2234', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3100', 'tb_measurethicknessrecord_origin', '2235', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3101', 'tb_measurethicknessrecord_origin', '2236', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3102', 'tb_measurethicknessrecord_origin', '2237', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3103', 'tb_measurethicknessrecord_origin', '2238', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3104', 'tb_measurethicknessrecord_origin', '2239', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3105', 'tb_measurethicknessrecord_origin', '2240', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3106', 'tb_measurethicknessrecord_origin', '2241', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3107', 'tb_measurethicknessrecord_origin', '2242', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3108', 'tb_measurethicknessrecord_origin', '2243', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3109', 'tb_measurethicknessrecord_origin', '2244', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3110', 'tb_measurethicknessrecord_origin', '2245', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3111', 'tb_measurethicknessrecord_origin', '2246', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3112', 'tb_measurethicknessrecord_origin', '2247', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3113', 'tb_measurethicknessrecord_origin', '2248', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3114', 'tb_measurethicknessrecord_origin', '2249', '2016-01-02 07:16:57', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3115', 'tb_measurethicknessrecord_origin', '2250', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3116', 'tb_measurethicknessrecord_origin', '2251', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3117', 'tb_measurethicknessrecord_origin', '2252', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3118', 'tb_measurethicknessrecord_origin', '2253', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3119', 'tb_measurethicknessrecord_origin', '2254', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3120', 'tb_measurethicknessrecord_origin', '2255', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3121', 'tb_measurethicknessrecord_origin', '2256', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3122', 'tb_measurethicknessrecord_origin', '2257', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3123', 'tb_measurethicknessrecord_origin', '2258', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3124', 'tb_measurethicknessrecord_origin', '2259', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3125', 'tb_measurethicknessrecord_origin', '2260', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3126', 'tb_measurethicknessrecord_origin', '2261', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3127', 'tb_measurethicknessrecord_origin', '2262', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3128', 'tb_measurethicknessrecord_origin', '2263', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3129', 'tb_measurethicknessrecord_origin', '2264', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3130', 'tb_measurethicknessrecord_origin', '2265', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3131', 'tb_measurethicknessrecord_origin', '2266', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3132', 'tb_measurethicknessrecord_origin', '2267', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3133', 'tb_measurethicknessrecord_origin', '2268', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3134', 'tb_measurethicknessrecord_origin', '2269', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3135', 'tb_measurethicknessrecord_origin', '2270', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3136', 'tb_measurethicknessrecord_origin', '2271', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3137', 'tb_measurethicknessrecord_origin', '2272', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3138', 'tb_measurethicknessrecord_origin', '2273', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3139', 'tb_measurethicknessrecord_origin', '2274', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3140', 'tb_measurethicknessrecord_origin', '2275', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3141', 'tb_measurethicknessrecord_origin', '2276', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3142', 'tb_measurethicknessrecord_origin', '2277', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3143', 'tb_measurethicknessrecord_origin', '2278', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3144', 'tb_measurethicknessrecord_origin', '2279', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3145', 'tb_measurethicknessrecord_origin', '2280', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3146', 'tb_measurethicknessrecord_origin', '2281', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3147', 'tb_measurethicknessrecord_origin', '2282', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3148', 'tb_measurethicknessrecord_origin', '2283', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3149', 'tb_measurethicknessrecord_origin', '2284', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3150', 'tb_measurethicknessrecord_origin', '2285', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3151', 'tb_measurethicknessrecord_origin', '2286', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3152', 'tb_measurethicknessrecord_origin', '2287', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3153', 'tb_measurethicknessrecord_origin', '2288', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3154', 'tb_measurethicknessrecord_origin', '2289', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3155', 'tb_measurethicknessrecord_origin', '2290', '2016-01-02 07:16:58', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3156', 'tb_measurethicknessrecord_origin', '2291', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3157', 'tb_measurethicknessrecord_origin', '2292', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3158', 'tb_measurethicknessrecord_origin', '2293', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3159', 'tb_measurethicknessrecord_origin', '2294', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3160', 'tb_measurethicknessrecord_origin', '2295', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3161', 'tb_measurethicknessrecord_origin', '2296', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3162', 'tb_measurethicknessrecord_origin', '2297', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3163', 'tb_measurethicknessrecord_origin', '2298', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3164', 'tb_measurethicknessrecord_origin', '2299', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3165', 'tb_measurethicknessrecord_origin', '2300', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3166', 'tb_measurethicknessrecord_origin', '2301', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3167', 'tb_measurethicknessrecord_origin', '2302', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3168', 'tb_measurethicknessrecord_origin', '2303', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3169', 'tb_measurethicknessrecord_origin', '2304', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3170', 'tb_measurethicknessrecord_origin', '2305', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3171', 'tb_measurethicknessrecord_origin', '2306', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3172', 'tb_measurethicknessrecord_origin', '2307', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3173', 'tb_measurethicknessrecord_origin', '2308', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3174', 'tb_measurethicknessrecord_origin', '2309', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3175', 'tb_measurethicknessrecord_origin', '2310', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3176', 'tb_measurethicknessrecord_origin', '2311', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3177', 'tb_measurethicknessrecord_origin', '2312', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3178', 'tb_measurethicknessrecord_origin', '2313', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3179', 'tb_measurethicknessrecord_origin', '2314', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3180', 'tb_measurethicknessrecord_origin', '2315', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3181', 'tb_measurethicknessrecord_origin', '2316', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3182', 'tb_measurethicknessrecord_origin', '2317', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3183', 'tb_measurethicknessrecord_origin', '2318', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3184', 'tb_measurethicknessrecord_origin', '2319', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3185', 'tb_measurethicknessrecord_origin', '2320', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3186', 'tb_measurethicknessrecord_origin', '2321', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3187', 'tb_measurethicknessrecord_origin', '2322', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3188', 'tb_measurethicknessrecord_origin', '2323', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3189', 'tb_measurethicknessrecord_origin', '2324', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3190', 'tb_measurethicknessrecord_origin', '2325', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3191', 'tb_measurethicknessrecord_origin', '2326', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3192', 'tb_measurethicknessrecord_origin', '2327', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3193', 'tb_measurethicknessrecord_origin', '2328', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3194', 'tb_measurethicknessrecord_origin', '2329', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3195', 'tb_measurethicknessrecord_origin', '2330', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3196', 'tb_measurethicknessrecord_origin', '2331', '2016-01-02 07:16:59', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3197', 'tb_measurethicknessrecord_origin', '2332', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3198', 'tb_measurethicknessrecord_origin', '2333', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3199', 'tb_measurethicknessrecord_origin', '2334', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3200', 'tb_measurethicknessrecord_origin', '2335', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3201', 'tb_measurethicknessrecord_origin', '2336', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3202', 'tb_measurethicknessrecord_origin', '2337', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3203', 'tb_measurethicknessrecord_origin', '2338', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3204', 'tb_measurethicknessrecord_origin', '2339', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3205', 'tb_measurethicknessrecord_origin', '2340', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3206', 'tb_measurethicknessrecord_origin', '2341', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3207', 'tb_measurethicknessrecord_origin', '2342', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3208', 'tb_measurethicknessrecord_origin', '2343', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3209', 'tb_measurethicknessrecord_origin', '2344', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3210', 'tb_measurethicknessrecord_origin', '2345', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3211', 'tb_measurethicknessrecord_origin', '2346', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3212', 'tb_measurethicknessrecord_origin', '2347', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3213', 'tb_measurethicknessrecord_origin', '2348', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3214', 'tb_measurethicknessrecord_origin', '2349', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3215', 'tb_measurethicknessrecord_origin', '2350', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3216', 'tb_measurethicknessrecord_origin', '2351', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3217', 'tb_measurethicknessrecord_origin', '2352', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3218', 'tb_measurethicknessrecord_origin', '2353', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3219', 'tb_measurethicknessrecord_origin', '2354', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3220', 'tb_measurethicknessrecord_origin', '2355', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3221', 'tb_measurethicknessrecord_origin', '2356', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3222', 'tb_measurethicknessrecord_origin', '2357', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3223', 'tb_measurethicknessrecord_origin', '2358', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3224', 'tb_measurethicknessrecord_origin', '2359', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3225', 'tb_measurethicknessrecord_origin', '2360', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3226', 'tb_measurethicknessrecord_origin', '2361', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3227', 'tb_measurethicknessrecord_origin', '2362', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3228', 'tb_measurethicknessrecord_origin', '2363', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3229', 'tb_measurethicknessrecord_origin', '2364', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3230', 'tb_measurethicknessrecord_origin', '2365', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3231', 'tb_measurethicknessrecord_origin', '2366', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3232', 'tb_measurethicknessrecord_origin', '2367', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3233', 'tb_measurethicknessrecord_origin', '2368', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3234', 'tb_measurethicknessrecord_origin', '2369', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3235', 'tb_measurethicknessrecord_origin', '2370', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3236', 'tb_measurethicknessrecord_origin', '2371', '2016-01-02 07:17:00', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3237', 'tb_measurethicknessrecord_origin', '2372', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3238', 'tb_measurethicknessrecord_origin', '2373', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3239', 'tb_measurethicknessrecord_origin', '2374', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3240', 'tb_measurethicknessrecord_origin', '2375', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3241', 'tb_measurethicknessrecord_origin', '2376', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3242', 'tb_measurethicknessrecord_origin', '2377', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3243', 'tb_measurethicknessrecord_origin', '2378', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3244', 'tb_measurethicknessrecord_origin', '2379', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3245', 'tb_measurethicknessrecord_origin', '2380', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3246', 'tb_measurethicknessrecord_origin', '2381', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3247', 'tb_measurethicknessrecord_origin', '2382', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3248', 'tb_measurethicknessrecord_origin', '2383', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3249', 'tb_measurethicknessrecord_origin', '2384', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3250', 'tb_measurethicknessrecord_origin', '2385', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3251', 'tb_measurethicknessrecord_origin', '2386', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3252', 'tb_measurethicknessrecord_origin', '2387', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3253', 'tb_measurethicknessrecord_origin', '2388', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3254', 'tb_measurethicknessrecord_origin', '2389', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3255', 'tb_measurethicknessrecord_origin', '2390', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3256', 'tb_measurethicknessrecord_origin', '2391', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3257', 'tb_measurethicknessrecord_origin', '2392', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3258', 'tb_measurethicknessrecord_origin', '2393', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3259', 'tb_measurethicknessrecord_origin', '2394', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3260', 'tb_measurethicknessrecord_origin', '2395', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3261', 'tb_measurethicknessrecord_origin', '2396', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3262', 'tb_measurethicknessrecord_origin', '2397', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3263', 'tb_measurethicknessrecord_origin', '2398', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3264', 'tb_measurethicknessrecord_origin', '2399', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3265', 'tb_measurethicknessrecord_origin', '2400', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3266', 'tb_measurethicknessrecord_origin', '2401', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3267', 'tb_measurethicknessrecord_origin', '2402', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3268', 'tb_measurethicknessrecord_origin', '2403', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3269', 'tb_measurethicknessrecord_origin', '2404', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3270', 'tb_measurethicknessrecord_origin', '2405', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3271', 'tb_measurethicknessrecord_origin', '2406', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3272', 'tb_measurethicknessrecord_origin', '2407', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3273', 'tb_measurethicknessrecord_origin', '2408', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3274', 'tb_measurethicknessrecord_origin', '2409', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3275', 'tb_measurethicknessrecord_origin', '2410', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3276', 'tb_measurethicknessrecord_origin', '2411', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3277', 'tb_measurethicknessrecord_origin', '2412', '2016-01-02 07:17:01', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3278', 'tb_measurethicknessrecord_origin', '2413', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3279', 'tb_measurethicknessrecord_origin', '2414', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3280', 'tb_measurethicknessrecord_origin', '2415', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3281', 'tb_measurethicknessrecord_origin', '2416', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3282', 'tb_measurethicknessrecord_origin', '2417', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3283', 'tb_measurethicknessrecord_origin', '2418', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3284', 'tb_measurethicknessrecord_origin', '2419', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3285', 'tb_measurethicknessrecord_origin', '2420', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3286', 'tb_measurethicknessrecord_origin', '2421', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3287', 'tb_measurethicknessrecord_origin', '2422', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3288', 'tb_measurethicknessrecord_origin', '2423', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3289', 'tb_measurethicknessrecord_origin', '2424', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3290', 'tb_measurethicknessrecord_origin', '2425', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3291', 'tb_measurethicknessrecord_origin', '2426', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3292', 'tb_measurethicknessrecord_origin', '2427', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3293', 'tb_measurethicknessrecord_origin', '2428', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3294', 'tb_measurethicknessrecord_origin', '2429', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3295', 'tb_measurethicknessrecord_origin', '2430', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3296', 'tb_measurethicknessrecord_origin', '2431', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3297', 'tb_measurethicknessrecord_origin', '2432', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3298', 'tb_measurethicknessrecord_origin', '2433', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3299', 'tb_measurethicknessrecord_origin', '2434', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3300', 'tb_measurethicknessrecord_origin', '2435', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3301', 'tb_measurethicknessrecord_origin', '2436', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3302', 'tb_measurethicknessrecord_origin', '2437', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3303', 'tb_measurethicknessrecord_origin', '2438', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3304', 'tb_measurethicknessrecord_origin', '2439', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3305', 'tb_measurethicknessrecord_origin', '2440', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3306', 'tb_measurethicknessrecord_origin', '2441', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3307', 'tb_measurethicknessrecord_origin', '2442', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3308', 'tb_measurethicknessrecord_origin', '2443', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3309', 'tb_measurethicknessrecord_origin', '2444', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3310', 'tb_measurethicknessrecord_origin', '2445', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3311', 'tb_measurethicknessrecord_origin', '2446', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3312', 'tb_measurethicknessrecord_origin', '2447', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3313', 'tb_measurethicknessrecord_origin', '2448', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3314', 'tb_measurethicknessrecord_origin', '2449', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3315', 'tb_measurethicknessrecord_origin', '2450', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3316', 'tb_measurethicknessrecord_origin', '2451', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3317', 'tb_measurethicknessrecord_origin', '2452', '2016-01-02 07:17:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3318', 'tb_measurethicknessrecord_origin', '2453', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3319', 'tb_measurethicknessrecord_origin', '2454', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3320', 'tb_measurethicknessrecord_origin', '2455', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3321', 'tb_measurethicknessrecord_origin', '2456', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3322', 'tb_measurethicknessrecord_origin', '2457', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3323', 'tb_measurethicknessrecord_origin', '2458', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3324', 'tb_measurethicknessrecord_origin', '2459', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3325', 'tb_measurethicknessrecord_origin', '2460', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3326', 'tb_measurethicknessrecord_origin', '2461', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3327', 'tb_measurethicknessrecord_origin', '2462', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3328', 'tb_measurethicknessrecord_origin', '2463', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3329', 'tb_measurethicknessrecord_origin', '2464', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3330', 'tb_measurethicknessrecord_origin', '2465', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3331', 'tb_measurethicknessrecord_origin', '2466', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3332', 'tb_measurethicknessrecord_origin', '2467', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3333', 'tb_measurethicknessrecord_origin', '2468', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3334', 'tb_measurethicknessrecord_origin', '2469', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3335', 'tb_measurethicknessrecord_origin', '2470', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3336', 'tb_measurethicknessrecord_origin', '2471', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3337', 'tb_measurethicknessrecord_origin', '2472', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3338', 'tb_measurethicknessrecord_origin', '2473', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3339', 'tb_measurethicknessrecord_origin', '2474', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3340', 'tb_measurethicknessrecord_origin', '2475', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3341', 'tb_measurethicknessrecord_origin', '2476', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3342', 'tb_measurethicknessrecord_origin', '2477', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3343', 'tb_measurethicknessrecord_origin', '2478', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3344', 'tb_measurethicknessrecord_origin', '2479', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3345', 'tb_measurethicknessrecord_origin', '2480', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3346', 'tb_measurethicknessrecord_origin', '2481', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3347', 'tb_measurethicknessrecord_origin', '2482', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3348', 'tb_measurethicknessrecord_origin', '2483', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3349', 'tb_measurethicknessrecord_origin', '2484', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3350', 'tb_measurethicknessrecord_origin', '2485', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3351', 'tb_measurethicknessrecord_origin', '2486', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3352', 'tb_measurethicknessrecord_origin', '2487', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3353', 'tb_measurethicknessrecord_origin', '2488', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3354', 'tb_measurethicknessrecord_origin', '2489', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3355', 'tb_measurethicknessrecord_origin', '2490', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3356', 'tb_measurethicknessrecord_origin', '2491', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3357', 'tb_measurethicknessrecord_origin', '2492', '2016-01-02 07:17:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3358', 'tb_measurethicknessrecord_origin', '2493', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3359', 'tb_measurethicknessrecord_origin', '2494', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3360', 'tb_measurethicknessrecord_origin', '2495', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3361', 'tb_measurethicknessrecord_origin', '2496', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3362', 'tb_measurethicknessrecord_origin', '2497', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3363', 'tb_measurethicknessrecord_origin', '2498', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3364', 'tb_measurethicknessrecord_origin', '2499', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3365', 'tb_measurethicknessrecord_origin', '2500', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3366', 'tb_measurethicknessrecord_origin', '2501', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3367', 'tb_measurethicknessrecord_origin', '2502', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3368', 'tb_measurethicknessrecord_origin', '2503', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3369', 'tb_measurethicknessrecord_origin', '2504', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3370', 'tb_measurethicknessrecord_origin', '2505', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3371', 'tb_measurethicknessrecord_origin', '2506', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3372', 'tb_measurethicknessrecord_origin', '2507', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3373', 'tb_measurethicknessrecord_origin', '2508', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3374', 'tb_measurethicknessrecord_origin', '2509', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3375', 'tb_measurethicknessrecord_origin', '2510', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3376', 'tb_measurethicknessrecord_origin', '2511', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3377', 'tb_measurethicknessrecord_origin', '2512', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3378', 'tb_measurethicknessrecord_origin', '2513', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3379', 'tb_measurethicknessrecord_origin', '2514', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3380', 'tb_measurethicknessrecord_origin', '2515', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3381', 'tb_measurethicknessrecord_origin', '2516', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3382', 'tb_measurethicknessrecord_origin', '2517', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3383', 'tb_measurethicknessrecord_origin', '2518', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3384', 'tb_measurethicknessrecord_origin', '2519', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3385', 'tb_measurethicknessrecord_origin', '2520', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3386', 'tb_measurethicknessrecord_origin', '2521', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3387', 'tb_measurethicknessrecord_origin', '2522', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3388', 'tb_measurethicknessrecord_origin', '2523', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3389', 'tb_measurethicknessrecord_origin', '2524', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3390', 'tb_measurethicknessrecord_origin', '2525', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3391', 'tb_measurethicknessrecord_origin', '2526', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3392', 'tb_measurethicknessrecord_origin', '2527', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3393', 'tb_measurethicknessrecord_origin', '2528', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3394', 'tb_measurethicknessrecord_origin', '2529', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3395', 'tb_measurethicknessrecord_origin', '2530', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3396', 'tb_measurethicknessrecord_origin', '2531', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3397', 'tb_measurethicknessrecord_origin', '2532', '2016-01-02 07:17:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3398', 'tb_measurethicknessrecord_origin', '2533', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3399', 'tb_measurethicknessrecord_origin', '2534', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3400', 'tb_measurethicknessrecord_origin', '2535', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3401', 'tb_measurethicknessrecord_origin', '2536', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3402', 'tb_measurethicknessrecord_origin', '2537', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3403', 'tb_measurethicknessrecord_origin', '2538', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3404', 'tb_measurethicknessrecord_origin', '2539', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3405', 'tb_measurethicknessrecord_origin', '2540', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3406', 'tb_measurethicknessrecord_origin', '2541', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3407', 'tb_measurethicknessrecord_origin', '2542', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3408', 'tb_measurethicknessrecord_origin', '2543', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3409', 'tb_measurethicknessrecord_origin', '2544', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3410', 'tb_measurethicknessrecord_origin', '2545', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3411', 'tb_measurethicknessrecord_origin', '2546', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3412', 'tb_measurethicknessrecord_origin', '2547', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3413', 'tb_measurethicknessrecord_origin', '2548', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3414', 'tb_measurethicknessrecord_origin', '2549', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3415', 'tb_measurethicknessrecord_origin', '2550', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3416', 'tb_measurethicknessrecord_origin', '2551', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3417', 'tb_measurethicknessrecord_origin', '2552', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3418', 'tb_measurethicknessrecord_origin', '2553', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3419', 'tb_measurethicknessrecord_origin', '2554', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3420', 'tb_measurethicknessrecord_origin', '2555', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3421', 'tb_measurethicknessrecord_origin', '2556', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3422', 'tb_measurethicknessrecord_origin', '2557', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3423', 'tb_measurethicknessrecord_origin', '2558', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3424', 'tb_measurethicknessrecord_origin', '2559', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3425', 'tb_measurethicknessrecord_origin', '2560', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3426', 'tb_measurethicknessrecord_origin', '2561', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3427', 'tb_measurethicknessrecord_origin', '2562', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3428', 'tb_measurethicknessrecord_origin', '2563', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3429', 'tb_measurethicknessrecord_origin', '2564', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3430', 'tb_measurethicknessrecord_origin', '2565', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3431', 'tb_measurethicknessrecord_origin', '2566', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3432', 'tb_measurethicknessrecord_origin', '2567', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3433', 'tb_measurethicknessrecord_origin', '2568', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3434', 'tb_measurethicknessrecord_origin', '2569', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3435', 'tb_measurethicknessrecord_origin', '2570', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3436', 'tb_measurethicknessrecord_origin', '2571', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3437', 'tb_measurethicknessrecord_origin', '2572', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3438', 'tb_measurethicknessrecord_origin', '2573', '2016-01-02 07:17:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3439', 'tb_measurethicknessrecord_origin', '2574', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3440', 'tb_measurethicknessrecord_origin', '2575', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3441', 'tb_measurethicknessrecord_origin', '2576', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3442', 'tb_measurethicknessrecord_origin', '2577', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3443', 'tb_measurethicknessrecord_origin', '2578', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3444', 'tb_measurethicknessrecord_origin', '2579', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3445', 'tb_measurethicknessrecord_origin', '2580', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3446', 'tb_measurethicknessrecord_origin', '2581', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3447', 'tb_measurethicknessrecord_origin', '2582', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3448', 'tb_measurethicknessrecord_origin', '2583', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3449', 'tb_measurethicknessrecord_origin', '2584', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3450', 'tb_measurethicknessrecord_origin', '2585', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3451', 'tb_measurethicknessrecord_origin', '2586', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3452', 'tb_measurethicknessrecord_origin', '2587', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3453', 'tb_measurethicknessrecord_origin', '2588', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3454', 'tb_measurethicknessrecord_origin', '2589', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3455', 'tb_measurethicknessrecord_origin', '2590', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3456', 'tb_measurethicknessrecord_origin', '2591', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3457', 'tb_measurethicknessrecord_origin', '2592', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3458', 'tb_measurethicknessrecord_origin', '2593', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3459', 'tb_measurethicknessrecord_origin', '2594', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3460', 'tb_measurethicknessrecord_origin', '2595', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3461', 'tb_measurethicknessrecord_origin', '2596', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3462', 'tb_measurethicknessrecord_origin', '2597', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3463', 'tb_measurethicknessrecord_origin', '2598', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3464', 'tb_measurethicknessrecord_origin', '2599', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3465', 'tb_measurethicknessrecord_origin', '2600', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3466', 'tb_measurethicknessrecord_origin', '2601', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3467', 'tb_measurethicknessrecord_origin', '2602', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3468', 'tb_measurethicknessrecord_origin', '2603', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3469', 'tb_measurethicknessrecord_origin', '2604', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3470', 'tb_measurethicknessrecord_origin', '2605', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3471', 'tb_measurethicknessrecord_origin', '2606', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3472', 'tb_measurethicknessrecord_origin', '2607', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3473', 'tb_measurethicknessrecord_origin', '2608', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3474', 'tb_measurethicknessrecord_origin', '2609', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3475', 'tb_measurethicknessrecord_origin', '2610', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3476', 'tb_measurethicknessrecord_origin', '2611', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3477', 'tb_measurethicknessrecord_origin', '2612', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3478', 'tb_measurethicknessrecord_origin', '2613', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3479', 'tb_measurethicknessrecord_origin', '2614', '2016-01-02 07:17:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3480', 'tb_measurethicknessrecord_origin', '2615', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3481', 'tb_measurethicknessrecord_origin', '2616', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3482', 'tb_measurethicknessrecord_origin', '2617', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3483', 'tb_measurethicknessrecord_origin', '2618', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3484', 'tb_measurethicknessrecord_origin', '2619', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3485', 'tb_measurethicknessrecord_origin', '2620', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3486', 'tb_measurethicknessrecord_origin', '2621', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3487', 'tb_measurethicknessrecord_origin', '2622', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3488', 'tb_measurethicknessrecord_origin', '2623', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3489', 'tb_measurethicknessrecord_origin', '2624', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3490', 'tb_measurethicknessrecord_origin', '2625', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3491', 'tb_measurethicknessrecord_origin', '2626', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3492', 'tb_measurethicknessrecord_origin', '2627', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3493', 'tb_measurethicknessrecord_origin', '2628', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3494', 'tb_measurethicknessrecord_origin', '2629', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3495', 'tb_measurethicknessrecord_origin', '2630', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3496', 'tb_measurethicknessrecord_origin', '2631', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3497', 'tb_measurethicknessrecord_origin', '2632', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3498', 'tb_measurethicknessrecord_origin', '2633', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3499', 'tb_measurethicknessrecord_origin', '2634', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3500', 'tb_measurethicknessrecord_origin', '2635', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3501', 'tb_measurethicknessrecord_origin', '2636', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3502', 'tb_measurethicknessrecord_origin', '2637', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3503', 'tb_measurethicknessrecord_origin', '2638', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3504', 'tb_measurethicknessrecord_origin', '2639', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3505', 'tb_measurethicknessrecord_origin', '2640', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3506', 'tb_measurethicknessrecord_origin', '2641', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3507', 'tb_measurethicknessrecord_origin', '2642', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3508', 'tb_measurethicknessrecord_origin', '2643', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3509', 'tb_measurethicknessrecord_origin', '2644', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3510', 'tb_measurethicknessrecord_origin', '2645', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3511', 'tb_measurethicknessrecord_origin', '2646', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3512', 'tb_measurethicknessrecord_origin', '2647', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3513', 'tb_measurethicknessrecord_origin', '2648', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3514', 'tb_measurethicknessrecord_origin', '2649', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3515', 'tb_measurethicknessrecord_origin', '2650', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3516', 'tb_measurethicknessrecord_origin', '2651', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3517', 'tb_measurethicknessrecord_origin', '2652', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3518', 'tb_measurethicknessrecord_origin', '2653', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3519', 'tb_measurethicknessrecord_origin', '2654', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3520', 'tb_measurethicknessrecord_origin', '2655', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3521', 'tb_measurethicknessrecord_origin', '2656', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3522', 'tb_measurethicknessrecord_origin', '2657', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3523', 'tb_measurethicknessrecord_origin', '2658', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3524', 'tb_measurethicknessrecord_origin', '2659', '2016-01-02 07:17:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3525', 'tb_measurethicknessrecord_origin', '2660', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3526', 'tb_measurethicknessrecord_origin', '2661', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3527', 'tb_measurethicknessrecord_origin', '2662', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3528', 'tb_measurethicknessrecord_origin', '2663', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3529', 'tb_measurethicknessrecord_origin', '2664', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3530', 'tb_measurethicknessrecord_origin', '2665', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3531', 'tb_measurethicknessrecord_origin', '2666', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3532', 'tb_measurethicknessrecord_origin', '2667', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3533', 'tb_measurethicknessrecord_origin', '2668', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3534', 'tb_measurethicknessrecord_origin', '2669', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3535', 'tb_measurethicknessrecord_origin', '2670', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3536', 'tb_measurethicknessrecord_origin', '2671', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3537', 'tb_measurethicknessrecord_origin', '2672', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3538', 'tb_measurethicknessrecord_origin', '2673', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3539', 'tb_measurethicknessrecord_origin', '2674', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3540', 'tb_measurethicknessrecord_origin', '2675', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3541', 'tb_measurethicknessrecord_origin', '2676', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3542', 'tb_measurethicknessrecord_origin', '2677', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3543', 'tb_measurethicknessrecord_origin', '2678', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3544', 'tb_measurethicknessrecord_origin', '2679', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3545', 'tb_measurethicknessrecord_origin', '2680', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3546', 'tb_measurethicknessrecord_origin', '2681', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3547', 'tb_measurethicknessrecord_origin', '2682', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3548', 'tb_measurethicknessrecord_origin', '2683', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3549', 'tb_measurethicknessrecord_origin', '2684', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3550', 'tb_measurethicknessrecord_origin', '2685', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3551', 'tb_measurethicknessrecord_origin', '2686', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3552', 'tb_measurethicknessrecord_origin', '2687', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3553', 'tb_measurethicknessrecord_origin', '2688', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3554', 'tb_measurethicknessrecord_origin', '2689', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3555', 'tb_measurethicknessrecord_origin', '2690', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3556', 'tb_measurethicknessrecord_origin', '2691', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3557', 'tb_measurethicknessrecord_origin', '2692', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3558', 'tb_measurethicknessrecord_origin', '2693', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3559', 'tb_measurethicknessrecord_origin', '2694', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3560', 'tb_measurethicknessrecord_origin', '2695', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3561', 'tb_measurethicknessrecord_origin', '2696', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3562', 'tb_measurethicknessrecord_origin', '2697', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3563', 'tb_measurethicknessrecord_origin', '2698', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3564', 'tb_measurethicknessrecord_origin', '2699', '2016-01-02 07:17:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3565', 'tb_measurethicknessrecord_origin', '2700', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3566', 'tb_measurethicknessrecord_origin', '2701', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3567', 'tb_measurethicknessrecord_origin', '2702', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3568', 'tb_measurethicknessrecord_origin', '2703', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3569', 'tb_measurethicknessrecord_origin', '2704', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3570', 'tb_measurethicknessrecord_origin', '2705', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3571', 'tb_measurethicknessrecord_origin', '2706', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3572', 'tb_measurethicknessrecord_origin', '2707', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3573', 'tb_measurethicknessrecord_origin', '2708', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3574', 'tb_measurethicknessrecord_origin', '2709', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3575', 'tb_measurethicknessrecord_origin', '2710', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3576', 'tb_measurethicknessrecord_origin', '2711', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3577', 'tb_measurethicknessrecord_origin', '2712', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3578', 'tb_measurethicknessrecord_origin', '2713', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3579', 'tb_measurethicknessrecord_origin', '2714', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3580', 'tb_measurethicknessrecord_origin', '2715', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3581', 'tb_measurethicknessrecord_origin', '2716', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3582', 'tb_measurethicknessrecord_origin', '2717', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3583', 'tb_measurethicknessrecord_origin', '2718', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3584', 'tb_measurethicknessrecord_origin', '2719', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3585', 'tb_measurethicknessrecord_origin', '2720', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3586', 'tb_measurethicknessrecord_origin', '2721', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3587', 'tb_measurethicknessrecord_origin', '2722', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3588', 'tb_measurethicknessrecord_origin', '2723', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3589', 'tb_measurethicknessrecord_origin', '2724', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3590', 'tb_measurethicknessrecord_origin', '2725', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3591', 'tb_measurethicknessrecord_origin', '2726', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3592', 'tb_measurethicknessrecord_origin', '2727', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3593', 'tb_measurethicknessrecord_origin', '2728', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3594', 'tb_measurethicknessrecord_origin', '2729', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3595', 'tb_measurethicknessrecord_origin', '2730', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3596', 'tb_measurethicknessrecord_origin', '2731', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3597', 'tb_measurethicknessrecord_origin', '2732', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3598', 'tb_measurethicknessrecord_origin', '2733', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3599', 'tb_measurethicknessrecord_origin', '2734', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3600', 'tb_measurethicknessrecord_origin', '2735', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3601', 'tb_measurethicknessrecord_origin', '2736', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3602', 'tb_measurethicknessrecord_origin', '2737', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3603', 'tb_measurethicknessrecord_origin', '2738', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3604', 'tb_measurethicknessrecord_origin', '2739', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3605', 'tb_measurethicknessrecord_origin', '2740', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3606', 'tb_measurethicknessrecord_origin', '2741', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3607', 'tb_measurethicknessrecord_origin', '2742', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3608', 'tb_measurethicknessrecord_origin', '2743', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3609', 'tb_measurethicknessrecord_origin', '2744', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3610', 'tb_measurethicknessrecord_origin', '2745', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3611', 'tb_measurethicknessrecord_origin', '2746', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3612', 'tb_measurethicknessrecord_origin', '2747', '2016-01-02 07:17:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3613', 'tb_measurethicknessrecord_origin', '2748', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3614', 'tb_measurethicknessrecord_origin', '2749', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3615', 'tb_measurethicknessrecord_origin', '2750', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3616', 'tb_measurethicknessrecord_origin', '2751', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3617', 'tb_measurethicknessrecord_origin', '2752', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3618', 'tb_measurethicknessrecord_origin', '2753', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3619', 'tb_measurethicknessrecord_origin', '2754', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3620', 'tb_measurethicknessrecord_origin', '2755', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3621', 'tb_measurethicknessrecord_origin', '2756', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3622', 'tb_measurethicknessrecord_origin', '2757', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3623', 'tb_measurethicknessrecord_origin', '2758', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3624', 'tb_measurethicknessrecord_origin', '2759', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3625', 'tb_measurethicknessrecord_origin', '2760', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3626', 'tb_measurethicknessrecord_origin', '2761', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3627', 'tb_measurethicknessrecord_origin', '2762', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3628', 'tb_measurethicknessrecord_origin', '2763', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3629', 'tb_measurethicknessrecord_origin', '2764', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3630', 'tb_measurethicknessrecord_origin', '2765', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3631', 'tb_measurethicknessrecord_origin', '2766', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3632', 'tb_measurethicknessrecord_origin', '2767', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3633', 'tb_measurethicknessrecord_origin', '2768', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3634', 'tb_measurethicknessrecord_origin', '2769', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3635', 'tb_measurethicknessrecord_origin', '2770', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3636', 'tb_measurethicknessrecord_origin', '2771', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3637', 'tb_measurethicknessrecord_origin', '2772', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3638', 'tb_measurethicknessrecord_origin', '2773', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3639', 'tb_measurethicknessrecord_origin', '2774', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3640', 'tb_measurethicknessrecord_origin', '2775', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3641', 'tb_measurethicknessrecord_origin', '2776', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3642', 'tb_measurethicknessrecord_origin', '2777', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3643', 'tb_measurethicknessrecord_origin', '2778', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3644', 'tb_measurethicknessrecord_origin', '2779', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3645', 'tb_measurethicknessrecord_origin', '2780', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3646', 'tb_measurethicknessrecord_origin', '2781', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3647', 'tb_measurethicknessrecord_origin', '2782', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3648', 'tb_measurethicknessrecord_origin', '2783', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3649', 'tb_measurethicknessrecord_origin', '2784', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3650', 'tb_measurethicknessrecord_origin', '2785', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3651', 'tb_measurethicknessrecord_origin', '2786', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3652', 'tb_measurethicknessrecord_origin', '2787', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3653', 'tb_measurethicknessrecord_origin', '2788', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3654', 'tb_measurethicknessrecord_origin', '2789', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3655', 'tb_measurethicknessrecord_origin', '2790', '2016-01-02 07:17:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3656', 'tb_measurethicknessrecord_origin', '2791', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3657', 'tb_measurethicknessrecord_origin', '2792', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3658', 'tb_measurethicknessrecord_origin', '2793', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3659', 'tb_measurethicknessrecord_origin', '2794', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3660', 'tb_measurethicknessrecord_origin', '2795', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3661', 'tb_measurethicknessrecord_origin', '2796', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3662', 'tb_measurethicknessrecord_origin', '2797', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3663', 'tb_measurethicknessrecord_origin', '2798', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3664', 'tb_measurethicknessrecord_origin', '2799', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3665', 'tb_measurethicknessrecord_origin', '2800', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3666', 'tb_measurethicknessrecord_origin', '2801', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3667', 'tb_measurethicknessrecord_origin', '2802', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3668', 'tb_measurethicknessrecord_origin', '2803', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3669', 'tb_measurethicknessrecord_origin', '2804', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3670', 'tb_measurethicknessrecord_origin', '2805', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3671', 'tb_measurethicknessrecord_origin', '2806', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3672', 'tb_measurethicknessrecord_origin', '2807', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3673', 'tb_measurethicknessrecord_origin', '2808', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3674', 'tb_measurethicknessrecord_origin', '2809', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3675', 'tb_measurethicknessrecord_origin', '2810', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3676', 'tb_measurethicknessrecord_origin', '2811', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3677', 'tb_measurethicknessrecord_origin', '2812', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3678', 'tb_measurethicknessrecord_origin', '2813', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3679', 'tb_measurethicknessrecord_origin', '2814', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3680', 'tb_measurethicknessrecord_origin', '2815', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3681', 'tb_measurethicknessrecord_origin', '2816', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3682', 'tb_measurethicknessrecord_origin', '2817', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3683', 'tb_measurethicknessrecord_origin', '2818', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3684', 'tb_measurethicknessrecord_origin', '2819', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3685', 'tb_measurethicknessrecord_origin', '2820', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3686', 'tb_measurethicknessrecord_origin', '2821', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3687', 'tb_measurethicknessrecord_origin', '2822', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3688', 'tb_measurethicknessrecord_origin', '2823', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3689', 'tb_measurethicknessrecord_origin', '2824', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3690', 'tb_measurethicknessrecord_origin', '2825', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3691', 'tb_measurethicknessrecord_origin', '2826', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3692', 'tb_measurethicknessrecord_origin', '2827', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3693', 'tb_measurethicknessrecord_origin', '2828', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3694', 'tb_measurethicknessrecord_origin', '2829', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3695', 'tb_measurethicknessrecord_origin', '2830', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3696', 'tb_measurethicknessrecord_origin', '2831', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3697', 'tb_measurethicknessrecord_origin', '2832', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3698', 'tb_measurethicknessrecord_origin', '2833', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3699', 'tb_measurethicknessrecord_origin', '2834', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3700', 'tb_measurethicknessrecord_origin', '2835', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3701', 'tb_measurethicknessrecord_origin', '2836', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3702', 'tb_measurethicknessrecord_origin', '2837', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3703', 'tb_measurethicknessrecord_origin', '2838', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3704', 'tb_measurethicknessrecord_origin', '2839', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3705', 'tb_measurethicknessrecord_origin', '2840', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3706', 'tb_measurethicknessrecord_origin', '2841', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3707', 'tb_measurethicknessrecord_origin', '2842', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3708', 'tb_measurethicknessrecord_origin', '2843', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3709', 'tb_measurethicknessrecord_origin', '2844', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3710', 'tb_measurethicknessrecord_origin', '2845', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3711', 'tb_measurethicknessrecord_origin', '2846', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3712', 'tb_measurethicknessrecord_origin', '2847', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3713', 'tb_measurethicknessrecord_origin', '2848', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3714', 'tb_measurethicknessrecord_origin', '2849', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3715', 'tb_measurethicknessrecord_origin', '2850', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3716', 'tb_measurethicknessrecord_origin', '2851', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3717', 'tb_measurethicknessrecord_origin', '2852', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3718', 'tb_measurethicknessrecord_origin', '2853', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3719', 'tb_measurethicknessrecord_origin', '2854', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3720', 'tb_measurethicknessrecord_origin', '2855', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3721', 'tb_measurethicknessrecord_origin', '2856', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3722', 'tb_measurethicknessrecord_origin', '2857', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3723', 'tb_measurethicknessrecord_origin', '2858', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3724', 'tb_measurethicknessrecord_origin', '2859', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3725', 'tb_measurethicknessrecord_origin', '2860', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3726', 'tb_measurethicknessrecord_origin', '2861', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3727', 'tb_measurethicknessrecord_origin', '2862', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3728', 'tb_measurethicknessrecord_origin', '2863', '2016-01-02 07:17:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3729', 'tb_measurethicknessrecord_origin', '2864', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3730', 'tb_measurethicknessrecord_origin', '2865', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3731', 'tb_measurethicknessrecord_origin', '2866', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3732', 'tb_measurethicknessrecord_origin', '2867', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3733', 'tb_measurethicknessrecord_origin', '2868', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3734', 'tb_measurethicknessrecord_origin', '2869', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3735', 'tb_measurethicknessrecord_origin', '2870', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3736', 'tb_measurethicknessrecord_origin', '2871', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3737', 'tb_measurethicknessrecord_origin', '2872', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3738', 'tb_measurethicknessrecord_origin', '2873', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3739', 'tb_measurethicknessrecord_origin', '2874', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3740', 'tb_measurethicknessrecord_origin', '2875', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3741', 'tb_measurethicknessrecord_origin', '2876', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3742', 'tb_measurethicknessrecord_origin', '2877', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3743', 'tb_measurethicknessrecord_origin', '2878', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3744', 'tb_measurethicknessrecord_origin', '2879', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3745', 'tb_measurethicknessrecord_origin', '2880', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3746', 'tb_measurethicknessrecord_origin', '2881', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3747', 'tb_measurethicknessrecord_origin', '2882', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3748', 'tb_measurethicknessrecord_origin', '2883', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3749', 'tb_measurethicknessrecord_origin', '2884', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3750', 'tb_measurethicknessrecord_origin', '2885', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3751', 'tb_measurethicknessrecord_origin', '2886', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3752', 'tb_measurethicknessrecord_origin', '2887', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3753', 'tb_measurethicknessrecord_origin', '2888', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3754', 'tb_measurethicknessrecord_origin', '2889', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3755', 'tb_measurethicknessrecord_origin', '2890', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3756', 'tb_measurethicknessrecord_origin', '2891', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3757', 'tb_measurethicknessrecord_origin', '2892', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3758', 'tb_measurethicknessrecord_origin', '2893', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3759', 'tb_measurethicknessrecord_origin', '2894', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3760', 'tb_measurethicknessrecord_origin', '2895', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3761', 'tb_measurethicknessrecord_origin', '2896', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3762', 'tb_measurethicknessrecord_origin', '2897', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3763', 'tb_measurethicknessrecord_origin', '2898', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3764', 'tb_measurethicknessrecord_origin', '2899', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3765', 'tb_measurethicknessrecord_origin', '2900', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3766', 'tb_measurethicknessrecord_origin', '2901', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3767', 'tb_measurethicknessrecord_origin', '2902', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3768', 'tb_measurethicknessrecord_origin', '2903', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3769', 'tb_measurethicknessrecord_origin', '2904', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3770', 'tb_measurethicknessrecord_origin', '2905', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3771', 'tb_measurethicknessrecord_origin', '2906', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3772', 'tb_measurethicknessrecord_origin', '2907', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3773', 'tb_measurethicknessrecord_origin', '2908', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3774', 'tb_measurethicknessrecord_origin', '2909', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3775', 'tb_measurethicknessrecord_origin', '2910', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3776', 'tb_measurethicknessrecord_origin', '2911', '2016-01-02 07:17:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3777', 'tb_measurethicknessrecord_origin', '2912', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3778', 'tb_measurethicknessrecord_origin', '2913', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3779', 'tb_measurethicknessrecord_origin', '2914', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3780', 'tb_measurethicknessrecord_origin', '2915', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3781', 'tb_measurethicknessrecord_origin', '2916', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3782', 'tb_measurethicknessrecord_origin', '2917', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3783', 'tb_measurethicknessrecord_origin', '2918', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3784', 'tb_measurethicknessrecord_origin', '2919', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3785', 'tb_measurethicknessrecord_origin', '2920', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3786', 'tb_measurethicknessrecord_origin', '2921', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3787', 'tb_measurethicknessrecord_origin', '2922', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3788', 'tb_measurethicknessrecord_origin', '2923', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3789', 'tb_measurethicknessrecord_origin', '2924', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3790', 'tb_measurethicknessrecord_origin', '2925', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3791', 'tb_measurethicknessrecord_origin', '2926', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3792', 'tb_measurethicknessrecord_origin', '2927', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3793', 'tb_measurethicknessrecord_origin', '2928', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3794', 'tb_measurethicknessrecord_origin', '2929', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3795', 'tb_measurethicknessrecord_origin', '2930', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3796', 'tb_measurethicknessrecord_origin', '2931', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3797', 'tb_measurethicknessrecord_origin', '2932', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3798', 'tb_measurethicknessrecord_origin', '2933', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3799', 'tb_measurethicknessrecord_origin', '2934', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3800', 'tb_measurethicknessrecord_origin', '2935', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3801', 'tb_measurethicknessrecord_origin', '2936', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3802', 'tb_measurethicknessrecord_origin', '2937', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3803', 'tb_measurethicknessrecord_origin', '2938', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3804', 'tb_measurethicknessrecord_origin', '2939', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3805', 'tb_measurethicknessrecord_origin', '2940', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3806', 'tb_measurethicknessrecord_origin', '2941', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3807', 'tb_measurethicknessrecord_origin', '2942', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3808', 'tb_measurethicknessrecord_origin', '2943', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3809', 'tb_measurethicknessrecord_origin', '2944', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3810', 'tb_measurethicknessrecord_origin', '2945', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3811', 'tb_measurethicknessrecord_origin', '2946', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3812', 'tb_measurethicknessrecord_origin', '2947', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3813', 'tb_measurethicknessrecord_origin', '2948', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3814', 'tb_measurethicknessrecord_origin', '2949', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3815', 'tb_measurethicknessrecord_origin', '2950', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3816', 'tb_measurethicknessrecord_origin', '2951', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3817', 'tb_measurethicknessrecord_origin', '2952', '2016-01-02 07:17:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3818', 'tb_measurethicknessrecord_origin', '2953', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3819', 'tb_measurethicknessrecord_origin', '2954', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3820', 'tb_measurethicknessrecord_origin', '2955', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3821', 'tb_measurethicknessrecord_origin', '2956', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3822', 'tb_measurethicknessrecord_origin', '2957', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3823', 'tb_measurethicknessrecord_origin', '2958', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3824', 'tb_measurethicknessrecord_origin', '2959', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3825', 'tb_measurethicknessrecord_origin', '2960', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3826', 'tb_measurethicknessrecord_origin', '2961', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3827', 'tb_measurethicknessrecord_origin', '2962', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3828', 'tb_measurethicknessrecord_origin', '2963', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3829', 'tb_measurethicknessrecord_origin', '2964', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3830', 'tb_measurethicknessrecord_origin', '2965', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3831', 'tb_measurethicknessrecord_origin', '2966', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3832', 'tb_measurethicknessrecord_origin', '2967', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3833', 'tb_measurethicknessrecord_origin', '2968', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3834', 'tb_measurethicknessrecord_origin', '2969', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3835', 'tb_measurethicknessrecord_origin', '2970', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3836', 'tb_measurethicknessrecord_origin', '2971', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3837', 'tb_measurethicknessrecord_origin', '2972', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3838', 'tb_measurethicknessrecord_origin', '2973', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3839', 'tb_measurethicknessrecord_origin', '2974', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3840', 'tb_measurethicknessrecord_origin', '2975', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3841', 'tb_measurethicknessrecord_origin', '2976', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3842', 'tb_measurethicknessrecord_origin', '2977', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3843', 'tb_measurethicknessrecord_origin', '2978', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3844', 'tb_measurethicknessrecord_origin', '2979', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3845', 'tb_measurethicknessrecord_origin', '2980', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3846', 'tb_measurethicknessrecord_origin', '2981', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3847', 'tb_measurethicknessrecord_origin', '2982', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3848', 'tb_measurethicknessrecord_origin', '2983', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3849', 'tb_measurethicknessrecord_origin', '2984', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3850', 'tb_measurethicknessrecord_origin', '2985', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3851', 'tb_measurethicknessrecord_origin', '2986', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3852', 'tb_measurethicknessrecord_origin', '2987', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3853', 'tb_measurethicknessrecord_origin', '2988', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3854', 'tb_measurethicknessrecord_origin', '2989', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3855', 'tb_measurethicknessrecord_origin', '2990', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3856', 'tb_measurethicknessrecord_origin', '2991', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3857', 'tb_measurethicknessrecord_origin', '2992', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3858', 'tb_measurethicknessrecord_origin', '2993', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3859', 'tb_measurethicknessrecord_origin', '2994', '2016-01-02 07:17:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3860', 'tb_measurethicknessrecord_origin', '2995', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3861', 'tb_measurethicknessrecord_origin', '2996', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3862', 'tb_measurethicknessrecord_origin', '2997', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3863', 'tb_measurethicknessrecord_origin', '2998', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3864', 'tb_measurethicknessrecord_origin', '2999', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3865', 'tb_measurethicknessrecord_origin', '3000', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3866', 'tb_measurethicknessrecord_origin', '3001', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3867', 'tb_measurethicknessrecord_origin', '3002', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3868', 'tb_measurethicknessrecord_origin', '3003', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3869', 'tb_measurethicknessrecord_origin', '3004', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3870', 'tb_measurethicknessrecord_origin', '3005', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3871', 'tb_measurethicknessrecord_origin', '3006', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3872', 'tb_measurethicknessrecord_origin', '3007', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3873', 'tb_measurethicknessrecord_origin', '3008', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3874', 'tb_measurethicknessrecord_origin', '3009', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3875', 'tb_measurethicknessrecord_origin', '3010', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3876', 'tb_measurethicknessrecord_origin', '3011', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3877', 'tb_measurethicknessrecord_origin', '3012', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3878', 'tb_measurethicknessrecord_origin', '3013', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3879', 'tb_measurethicknessrecord_origin', '3014', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3880', 'tb_measurethicknessrecord_origin', '3015', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3881', 'tb_measurethicknessrecord_origin', '3016', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3882', 'tb_measurethicknessrecord_origin', '3017', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3883', 'tb_measurethicknessrecord_origin', '3018', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3884', 'tb_measurethicknessrecord_origin', '3019', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3885', 'tb_measurethicknessrecord_origin', '3020', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3886', 'tb_measurethicknessrecord_origin', '3021', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3887', 'tb_measurethicknessrecord_origin', '3022', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3888', 'tb_measurethicknessrecord_origin', '3023', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3889', 'tb_measurethicknessrecord_origin', '3024', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3890', 'tb_measurethicknessrecord_origin', '3025', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3891', 'tb_measurethicknessrecord_origin', '3026', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3892', 'tb_measurethicknessrecord_origin', '3027', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3893', 'tb_measurethicknessrecord_origin', '3028', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3894', 'tb_measurethicknessrecord_origin', '3029', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3895', 'tb_measurethicknessrecord_origin', '3030', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3896', 'tb_measurethicknessrecord_origin', '3031', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3897', 'tb_measurethicknessrecord_origin', '3032', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3898', 'tb_measurethicknessrecord_origin', '3033', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3899', 'tb_measurethicknessrecord_origin', '3034', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3900', 'tb_measurethicknessrecord_origin', '3035', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3901', 'tb_measurethicknessrecord_origin', '3036', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3902', 'tb_measurethicknessrecord_origin', '3037', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3903', 'tb_measurethicknessrecord_origin', '3038', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3904', 'tb_measurethicknessrecord_origin', '3039', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3905', 'tb_measurethicknessrecord_origin', '3040', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3906', 'tb_measurethicknessrecord_origin', '3041', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3907', 'tb_measurethicknessrecord_origin', '3042', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3908', 'tb_measurethicknessrecord_origin', '3043', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3909', 'tb_measurethicknessrecord_origin', '3044', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3910', 'tb_measurethicknessrecord_origin', '3045', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3911', 'tb_measurethicknessrecord_origin', '3046', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3912', 'tb_measurethicknessrecord_origin', '3047', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3913', 'tb_measurethicknessrecord_origin', '3048', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3914', 'tb_measurethicknessrecord_origin', '3049', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3915', 'tb_measurethicknessrecord_origin', '3050', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3916', 'tb_measurethicknessrecord_origin', '3051', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3917', 'tb_measurethicknessrecord_origin', '3052', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3918', 'tb_measurethicknessrecord_origin', '3053', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3919', 'tb_measurethicknessrecord_origin', '3054', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3920', 'tb_measurethicknessrecord_origin', '3055', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3921', 'tb_measurethicknessrecord_origin', '3056', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3922', 'tb_measurethicknessrecord_origin', '3057', '2016-01-02 07:17:15', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3923', 'tb_measurethicknessrecord_origin', '3058', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3924', 'tb_measurethicknessrecord_origin', '3059', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3925', 'tb_measurethicknessrecord_origin', '3060', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3926', 'tb_measurethicknessrecord_origin', '3061', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3927', 'tb_measurethicknessrecord_origin', '3062', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3928', 'tb_measurethicknessrecord_origin', '3063', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3929', 'tb_measurethicknessrecord_origin', '3064', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3930', 'tb_measurethicknessrecord_origin', '3065', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3931', 'tb_measurethicknessrecord_origin', '3066', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3932', 'tb_measurethicknessrecord_origin', '3067', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3933', 'tb_measurethicknessrecord_origin', '3068', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3934', 'tb_measurethicknessrecord_origin', '3069', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3935', 'tb_measurethicknessrecord_origin', '3070', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3936', 'tb_measurethicknessrecord_origin', '3071', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3937', 'tb_measurethicknessrecord_origin', '3072', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3938', 'tb_measurethicknessrecord_origin', '3073', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3939', 'tb_measurethicknessrecord_origin', '3074', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3940', 'tb_measurethicknessrecord_origin', '3075', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3941', 'tb_measurethicknessrecord_origin', '3076', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3942', 'tb_measurethicknessrecord_origin', '3077', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3943', 'tb_measurethicknessrecord_origin', '3078', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3944', 'tb_measurethicknessrecord_origin', '3079', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3945', 'tb_measurethicknessrecord_origin', '3080', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3946', 'tb_measurethicknessrecord_origin', '3081', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3947', 'tb_measurethicknessrecord_origin', '3082', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3948', 'tb_measurethicknessrecord_origin', '3083', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3949', 'tb_measurethicknessrecord_origin', '3084', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3950', 'tb_measurethicknessrecord_origin', '3085', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3951', 'tb_measurethicknessrecord_origin', '3086', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3952', 'tb_measurethicknessrecord_origin', '3087', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3953', 'tb_measurethicknessrecord_origin', '3088', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3954', 'tb_measurethicknessrecord_origin', '3089', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3955', 'tb_measurethicknessrecord_origin', '3090', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3956', 'tb_measurethicknessrecord_origin', '3091', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3957', 'tb_measurethicknessrecord_origin', '3092', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3958', 'tb_measurethicknessrecord_origin', '3093', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3959', 'tb_measurethicknessrecord_origin', '3094', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3960', 'tb_measurethicknessrecord_origin', '3095', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3961', 'tb_measurethicknessrecord_origin', '3096', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3962', 'tb_measurethicknessrecord_origin', '3097', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3963', 'tb_measurethicknessrecord_origin', '3098', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3964', 'tb_measurethicknessrecord_origin', '3099', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3965', 'tb_measurethicknessrecord_origin', '3100', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3966', 'tb_measurethicknessrecord_origin', '3101', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3967', 'tb_measurethicknessrecord_origin', '3102', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3968', 'tb_measurethicknessrecord_origin', '3103', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3969', 'tb_measurethicknessrecord_origin', '3104', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3970', 'tb_measurethicknessrecord_origin', '3105', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3971', 'tb_measurethicknessrecord_origin', '3106', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3972', 'tb_measurethicknessrecord_origin', '3107', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3973', 'tb_measurethicknessrecord_origin', '3108', '2016-01-02 07:17:16', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3974', 'tb_measurethicknessrecord_origin', '3109', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3975', 'tb_measurethicknessrecord_origin', '3110', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3976', 'tb_measurethicknessrecord_origin', '3111', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3977', 'tb_measurethicknessrecord_origin', '3112', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3978', 'tb_measurethicknessrecord_origin', '3113', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3979', 'tb_measurethicknessrecord_origin', '3114', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3980', 'tb_measurethicknessrecord_origin', '3115', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3981', 'tb_measurethicknessrecord_origin', '3116', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3982', 'tb_measurethicknessrecord_origin', '3117', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3983', 'tb_measurethicknessrecord_origin', '3118', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3984', 'tb_measurethicknessrecord_origin', '3119', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3985', 'tb_measurethicknessrecord_origin', '3120', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3986', 'tb_measurethicknessrecord_origin', '3121', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3987', 'tb_measurethicknessrecord_origin', '3122', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3988', 'tb_measurethicknessrecord_origin', '3123', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3989', 'tb_measurethicknessrecord_origin', '3124', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3990', 'tb_measurethicknessrecord_origin', '3125', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3991', 'tb_measurethicknessrecord_origin', '3126', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3992', 'tb_measurethicknessrecord_origin', '3127', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3993', 'tb_measurethicknessrecord_origin', '3128', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3994', 'tb_measurethicknessrecord_origin', '3129', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3995', 'tb_measurethicknessrecord_origin', '3130', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3996', 'tb_measurethicknessrecord_origin', '3131', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3997', 'tb_measurethicknessrecord_origin', '3132', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3998', 'tb_measurethicknessrecord_origin', '3133', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('3999', 'tb_measurethicknessrecord_origin', '3134', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4000', 'tb_measurethicknessrecord_origin', '3135', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4001', 'tb_measurethicknessrecord_origin', '3136', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4002', 'tb_measurethicknessrecord_origin', '3137', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4003', 'tb_measurethicknessrecord_origin', '3138', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4004', 'tb_measurethicknessrecord_origin', '3139', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4005', 'tb_measurethicknessrecord_origin', '3140', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4006', 'tb_measurethicknessrecord_origin', '3141', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4007', 'tb_measurethicknessrecord_origin', '3142', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4008', 'tb_measurethicknessrecord_origin', '3143', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4009', 'tb_measurethicknessrecord_origin', '3144', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4010', 'tb_measurethicknessrecord_origin', '3145', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4011', 'tb_measurethicknessrecord_origin', '3146', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4012', 'tb_measurethicknessrecord_origin', '3147', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4013', 'tb_measurethicknessrecord_origin', '3148', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4014', 'tb_measurethicknessrecord_origin', '3149', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4015', 'tb_measurethicknessrecord_origin', '3150', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4016', 'tb_measurethicknessrecord_origin', '3151', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4017', 'tb_measurethicknessrecord_origin', '3152', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4018', 'tb_measurethicknessrecord_origin', '3153', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4019', 'tb_measurethicknessrecord_origin', '3154', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4020', 'tb_measurethicknessrecord_origin', '3155', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4021', 'tb_measurethicknessrecord_origin', '3156', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4022', 'tb_measurethicknessrecord_origin', '3157', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4023', 'tb_measurethicknessrecord_origin', '3158', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4024', 'tb_measurethicknessrecord_origin', '3159', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4025', 'tb_measurethicknessrecord_origin', '3160', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4026', 'tb_measurethicknessrecord_origin', '3161', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4027', 'tb_measurethicknessrecord_origin', '3162', '2016-01-02 07:17:17', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4028', 'tb_measurethicknessrecord_origin', '3163', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4029', 'tb_measurethicknessrecord_origin', '3164', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4030', 'tb_measurethicknessrecord_origin', '3165', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4031', 'tb_measurethicknessrecord_origin', '3166', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4032', 'tb_measurethicknessrecord_origin', '3167', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4033', 'tb_measurethicknessrecord_origin', '3168', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4034', 'tb_measurethicknessrecord_origin', '3169', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4035', 'tb_measurethicknessrecord_origin', '3170', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4036', 'tb_measurethicknessrecord_origin', '3171', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4037', 'tb_measurethicknessrecord_origin', '3172', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4038', 'tb_measurethicknessrecord_origin', '3173', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4039', 'tb_measurethicknessrecord_origin', '3174', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4040', 'tb_measurethicknessrecord_origin', '3175', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4041', 'tb_measurethicknessrecord_origin', '3176', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4042', 'tb_measurethicknessrecord_origin', '3177', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4043', 'tb_measurethicknessrecord_origin', '3178', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4044', 'tb_measurethicknessrecord_origin', '3179', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4045', 'tb_measurethicknessrecord_origin', '3180', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4046', 'tb_measurethicknessrecord_origin', '3181', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4047', 'tb_measurethicknessrecord_origin', '3182', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4048', 'tb_measurethicknessrecord_origin', '3183', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4049', 'tb_measurethicknessrecord_origin', '3184', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4050', 'tb_measurethicknessrecord_origin', '3185', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4051', 'tb_measurethicknessrecord_origin', '3186', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4052', 'tb_measurethicknessrecord_origin', '3187', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4053', 'tb_measurethicknessrecord_origin', '3188', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4054', 'tb_measurethicknessrecord_origin', '3189', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4055', 'tb_measurethicknessrecord_origin', '3190', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4056', 'tb_measurethicknessrecord_origin', '3191', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4057', 'tb_measurethicknessrecord_origin', '3192', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4058', 'tb_measurethicknessrecord_origin', '3193', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4059', 'tb_measurethicknessrecord_origin', '3194', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4060', 'tb_measurethicknessrecord_origin', '3195', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4061', 'tb_measurethicknessrecord_origin', '3196', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4062', 'tb_measurethicknessrecord_origin', '3197', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4063', 'tb_measurethicknessrecord_origin', '3198', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4064', 'tb_measurethicknessrecord_origin', '3199', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4065', 'tb_measurethicknessrecord_origin', '3200', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4066', 'tb_measurethicknessrecord_origin', '3201', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4067', 'tb_measurethicknessrecord_origin', '3202', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4068', 'tb_measurethicknessrecord_origin', '3203', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4069', 'tb_measurethicknessrecord_origin', '3204', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4070', 'tb_measurethicknessrecord_origin', '3205', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4071', 'tb_measurethicknessrecord_origin', '3206', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4072', 'tb_measurethicknessrecord_origin', '3207', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4073', 'tb_measurethicknessrecord_origin', '3208', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4074', 'tb_measurethicknessrecord_origin', '3209', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4075', 'tb_measurethicknessrecord_origin', '3210', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4076', 'tb_measurethicknessrecord_origin', '3211', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4077', 'tb_measurethicknessrecord_origin', '3212', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4078', 'tb_measurethicknessrecord_origin', '3213', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4079', 'tb_measurethicknessrecord_origin', '3214', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4080', 'tb_measurethicknessrecord_origin', '3215', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4081', 'tb_measurethicknessrecord_origin', '3216', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4082', 'tb_measurethicknessrecord_origin', '3217', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4083', 'tb_measurethicknessrecord_origin', '3218', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4084', 'tb_measurethicknessrecord_origin', '3219', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4085', 'tb_measurethicknessrecord_origin', '3220', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4086', 'tb_measurethicknessrecord_origin', '3221', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4087', 'tb_measurethicknessrecord_origin', '3222', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4088', 'tb_measurethicknessrecord_origin', '3223', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4089', 'tb_measurethicknessrecord_origin', '3224', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4090', 'tb_measurethicknessrecord_origin', '3225', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4091', 'tb_measurethicknessrecord_origin', '3226', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4092', 'tb_measurethicknessrecord_origin', '3227', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4093', 'tb_measurethicknessrecord_origin', '3228', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4094', 'tb_measurethicknessrecord_origin', '3229', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4095', 'tb_measurethicknessrecord_origin', '3230', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4096', 'tb_measurethicknessrecord_origin', '3231', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4097', 'tb_measurethicknessrecord_origin', '3232', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4098', 'tb_measurethicknessrecord_origin', '3233', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4099', 'tb_measurethicknessrecord_origin', '3234', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4100', 'tb_measurethicknessrecord_origin', '3235', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4101', 'tb_measurethicknessrecord_origin', '3236', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4102', 'tb_measurethicknessrecord_origin', '3237', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4103', 'tb_measurethicknessrecord_origin', '3238', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4104', 'tb_measurethicknessrecord_origin', '3239', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4105', 'tb_measurethicknessrecord_origin', '3240', '2016-01-02 07:17:18', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4106', 'tb_measurethicknessrecord_origin', '3241', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4107', 'tb_measurethicknessrecord_origin', '3242', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4108', 'tb_measurethicknessrecord_origin', '3243', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4109', 'tb_measurethicknessrecord_origin', '3244', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4110', 'tb_measurethicknessrecord_origin', '3245', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4111', 'tb_measurethicknessrecord_origin', '3246', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4112', 'tb_measurethicknessrecord_origin', '3247', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4113', 'tb_measurethicknessrecord_origin', '3248', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4114', 'tb_measurethicknessrecord_origin', '3249', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4115', 'tb_measurethicknessrecord_origin', '3250', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4116', 'tb_measurethicknessrecord_origin', '3251', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4117', 'tb_measurethicknessrecord_origin', '3252', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4118', 'tb_measurethicknessrecord_origin', '3253', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4119', 'tb_measurethicknessrecord_origin', '3254', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4120', 'tb_measurethicknessrecord_origin', '3255', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4121', 'tb_measurethicknessrecord_origin', '3256', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4122', 'tb_measurethicknessrecord_origin', '3257', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4123', 'tb_measurethicknessrecord_origin', '3258', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4124', 'tb_measurethicknessrecord_origin', '3259', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4125', 'tb_measurethicknessrecord_origin', '3260', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4126', 'tb_measurethicknessrecord_origin', '3261', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4127', 'tb_measurethicknessrecord_origin', '3262', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4128', 'tb_measurethicknessrecord_origin', '3263', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4129', 'tb_measurethicknessrecord_origin', '3264', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4130', 'tb_measurethicknessrecord_origin', '3265', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4131', 'tb_measurethicknessrecord_origin', '3266', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4132', 'tb_measurethicknessrecord_origin', '3267', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4133', 'tb_measurethicknessrecord_origin', '3268', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4134', 'tb_measurethicknessrecord_origin', '3269', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4135', 'tb_measurethicknessrecord_origin', '3270', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4136', 'tb_measurethicknessrecord_origin', '3271', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4137', 'tb_measurethicknessrecord_origin', '3272', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4138', 'tb_measurethicknessrecord_origin', '3273', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4139', 'tb_measurethicknessrecord_origin', '3274', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4140', 'tb_measurethicknessrecord_origin', '3275', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4141', 'tb_measurethicknessrecord_origin', '3276', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4142', 'tb_measurethicknessrecord_origin', '3277', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4143', 'tb_measurethicknessrecord_origin', '3278', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4144', 'tb_measurethicknessrecord_origin', '3279', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4145', 'tb_measurethicknessrecord_origin', '3280', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4146', 'tb_measurethicknessrecord_origin', '3281', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4147', 'tb_measurethicknessrecord_origin', '3282', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4148', 'tb_measurethicknessrecord_origin', '3283', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4149', 'tb_measurethicknessrecord_origin', '3284', '2016-01-02 07:17:19', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4150', 'tb_measurethicknessrecord_origin', '3285', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4151', 'tb_measurethicknessrecord_origin', '3286', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4152', 'tb_measurethicknessrecord_origin', '3287', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4153', 'tb_measurethicknessrecord_origin', '3288', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4154', 'tb_measurethicknessrecord_origin', '3289', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4155', 'tb_measurethicknessrecord_origin', '3290', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4156', 'tb_measurethicknessrecord_origin', '3291', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4157', 'tb_measurethicknessrecord_origin', '3292', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4158', 'tb_measurethicknessrecord_origin', '3293', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4159', 'tb_measurethicknessrecord_origin', '3294', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4160', 'tb_measurethicknessrecord_origin', '3295', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4161', 'tb_measurethicknessrecord_origin', '3296', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4162', 'tb_measurethicknessrecord_origin', '3297', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4163', 'tb_measurethicknessrecord_origin', '3298', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4164', 'tb_measurethicknessrecord_origin', '3299', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4165', 'tb_measurethicknessrecord_origin', '3300', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4166', 'tb_measurethicknessrecord_origin', '3301', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4167', 'tb_measurethicknessrecord_origin', '3302', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4168', 'tb_measurethicknessrecord_origin', '3303', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4169', 'tb_measurethicknessrecord_origin', '3304', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4170', 'tb_measurethicknessrecord_origin', '3305', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4171', 'tb_measurethicknessrecord_origin', '3306', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4172', 'tb_measurethicknessrecord_origin', '3307', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4173', 'tb_measurethicknessrecord_origin', '3308', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4174', 'tb_measurethicknessrecord_origin', '3309', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4175', 'tb_measurethicknessrecord_origin', '3310', '2016-01-02 07:17:20', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4176', 'tb_measurethicknessrecord_origin', '3311', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4177', 'tb_measurethicknessrecord_origin', '3312', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4178', 'tb_measurethicknessrecord_origin', '3313', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4179', 'tb_measurethicknessrecord_origin', '3314', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4180', 'tb_measurethicknessrecord_origin', '3315', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4181', 'tb_measurethicknessrecord_origin', '3316', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4182', 'tb_measurethicknessrecord_origin', '3317', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4183', 'tb_measurethicknessrecord_origin', '3318', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4184', 'tb_measurethicknessrecord_origin', '3319', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4185', 'tb_measurethicknessrecord_origin', '3320', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4186', 'tb_measurethicknessrecord_origin', '3321', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4187', 'tb_measurethicknessrecord_origin', '3322', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4188', 'tb_measurethicknessrecord_origin', '3323', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4189', 'tb_measurethicknessrecord_origin', '3324', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4190', 'tb_measurethicknessrecord_origin', '3325', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4191', 'tb_measurethicknessrecord_origin', '3326', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4192', 'tb_measurethicknessrecord_origin', '3327', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4193', 'tb_measurethicknessrecord_origin', '3328', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4194', 'tb_measurethicknessrecord_origin', '3329', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4195', 'tb_measurethicknessrecord_origin', '3330', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4196', 'tb_measurethicknessrecord_origin', '3331', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4197', 'tb_measurethicknessrecord_origin', '3332', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4198', 'tb_measurethicknessrecord_origin', '3333', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4199', 'tb_measurethicknessrecord_origin', '3334', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4200', 'tb_measurethicknessrecord_origin', '3335', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4201', 'tb_measurethicknessrecord_origin', '3336', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4202', 'tb_measurethicknessrecord_origin', '3337', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4203', 'tb_measurethicknessrecord_origin', '3338', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4204', 'tb_measurethicknessrecord_origin', '3339', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4205', 'tb_measurethicknessrecord_origin', '3340', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4206', 'tb_measurethicknessrecord_origin', '3341', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4207', 'tb_measurethicknessrecord_origin', '3342', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4208', 'tb_measurethicknessrecord_origin', '3343', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4209', 'tb_measurethicknessrecord_origin', '3344', '2016-01-02 07:26:02', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4210', 'tb_measurethicknessrecord_origin', '3345', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4211', 'tb_measurethicknessrecord_origin', '3346', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4212', 'tb_measurethicknessrecord_origin', '3347', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4213', 'tb_measurethicknessrecord_origin', '3348', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4214', 'tb_measurethicknessrecord_origin', '3349', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4215', 'tb_measurethicknessrecord_origin', '3350', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4216', 'tb_measurethicknessrecord_origin', '3351', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4217', 'tb_measurethicknessrecord_origin', '3352', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4218', 'tb_measurethicknessrecord_origin', '3353', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4219', 'tb_measurethicknessrecord_origin', '3354', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4220', 'tb_measurethicknessrecord_origin', '3355', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4221', 'tb_measurethicknessrecord_origin', '3356', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4222', 'tb_measurethicknessrecord_origin', '3357', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4223', 'tb_measurethicknessrecord_origin', '3358', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4224', 'tb_measurethicknessrecord_origin', '3359', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4225', 'tb_measurethicknessrecord_origin', '3360', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4226', 'tb_measurethicknessrecord_origin', '3361', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4227', 'tb_measurethicknessrecord_origin', '3362', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4228', 'tb_measurethicknessrecord_origin', '3363', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4229', 'tb_measurethicknessrecord_origin', '3364', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4230', 'tb_measurethicknessrecord_origin', '3365', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4231', 'tb_measurethicknessrecord_origin', '3366', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4232', 'tb_measurethicknessrecord_origin', '3367', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4233', 'tb_measurethicknessrecord_origin', '3368', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4234', 'tb_measurethicknessrecord_origin', '3369', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4235', 'tb_measurethicknessrecord_origin', '3370', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4236', 'tb_measurethicknessrecord_origin', '3371', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4237', 'tb_measurethicknessrecord_origin', '3372', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4238', 'tb_measurethicknessrecord_origin', '3373', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4239', 'tb_measurethicknessrecord_origin', '3374', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4240', 'tb_measurethicknessrecord_origin', '3375', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4241', 'tb_measurethicknessrecord_origin', '3376', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4242', 'tb_measurethicknessrecord_origin', '3377', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4243', 'tb_measurethicknessrecord_origin', '3378', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4244', 'tb_measurethicknessrecord_origin', '3379', '2016-01-02 07:26:03', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4245', 'tb_measurethicknessrecord_origin', '3380', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4246', 'tb_measurethicknessrecord_origin', '3381', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4247', 'tb_measurethicknessrecord_origin', '3382', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4248', 'tb_measurethicknessrecord_origin', '3383', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4249', 'tb_measurethicknessrecord_origin', '3384', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4250', 'tb_measurethicknessrecord_origin', '3385', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4251', 'tb_measurethicknessrecord_origin', '3386', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4252', 'tb_measurethicknessrecord_origin', '3387', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4253', 'tb_measurethicknessrecord_origin', '3388', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4254', 'tb_measurethicknessrecord_origin', '3389', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4255', 'tb_measurethicknessrecord_origin', '3390', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4256', 'tb_measurethicknessrecord_origin', '3391', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4257', 'tb_measurethicknessrecord_origin', '3392', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4258', 'tb_measurethicknessrecord_origin', '3393', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4259', 'tb_measurethicknessrecord_origin', '3394', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4260', 'tb_measurethicknessrecord_origin', '3395', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4261', 'tb_measurethicknessrecord_origin', '3396', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4262', 'tb_measurethicknessrecord_origin', '3397', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4263', 'tb_measurethicknessrecord_origin', '3398', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4264', 'tb_measurethicknessrecord_origin', '3399', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4265', 'tb_measurethicknessrecord_origin', '3400', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4266', 'tb_measurethicknessrecord_origin', '3401', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4267', 'tb_measurethicknessrecord_origin', '3402', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4268', 'tb_measurethicknessrecord_origin', '3403', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4269', 'tb_measurethicknessrecord_origin', '3404', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4270', 'tb_measurethicknessrecord_origin', '3405', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4271', 'tb_measurethicknessrecord_origin', '3406', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4272', 'tb_measurethicknessrecord_origin', '3407', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4273', 'tb_measurethicknessrecord_origin', '3408', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4274', 'tb_measurethicknessrecord_origin', '3409', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4275', 'tb_measurethicknessrecord_origin', '3410', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4276', 'tb_measurethicknessrecord_origin', '3411', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4277', 'tb_measurethicknessrecord_origin', '3412', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4278', 'tb_measurethicknessrecord_origin', '3413', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4279', 'tb_measurethicknessrecord_origin', '3414', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4280', 'tb_measurethicknessrecord_origin', '3415', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4281', 'tb_measurethicknessrecord_origin', '3416', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4282', 'tb_measurethicknessrecord_origin', '3417', '2016-01-02 07:26:04', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4283', 'tb_measurethicknessrecord_origin', '3418', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4284', 'tb_measurethicknessrecord_origin', '3419', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4285', 'tb_measurethicknessrecord_origin', '3420', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4286', 'tb_measurethicknessrecord_origin', '3421', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4287', 'tb_measurethicknessrecord_origin', '3422', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4288', 'tb_measurethicknessrecord_origin', '3423', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4289', 'tb_measurethicknessrecord_origin', '3424', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4290', 'tb_measurethicknessrecord_origin', '3425', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4291', 'tb_measurethicknessrecord_origin', '3426', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4292', 'tb_measurethicknessrecord_origin', '3427', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4293', 'tb_measurethicknessrecord_origin', '3428', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4294', 'tb_measurethicknessrecord_origin', '3429', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4295', 'tb_measurethicknessrecord_origin', '3430', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4296', 'tb_measurethicknessrecord_origin', '3431', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4297', 'tb_measurethicknessrecord_origin', '3432', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4298', 'tb_measurethicknessrecord_origin', '3433', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4299', 'tb_measurethicknessrecord_origin', '3434', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4300', 'tb_measurethicknessrecord_origin', '3435', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4301', 'tb_measurethicknessrecord_origin', '3436', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4302', 'tb_measurethicknessrecord_origin', '3437', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4303', 'tb_measurethicknessrecord_origin', '3438', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4304', 'tb_measurethicknessrecord_origin', '3439', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4305', 'tb_measurethicknessrecord_origin', '3440', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4306', 'tb_measurethicknessrecord_origin', '3441', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4307', 'tb_measurethicknessrecord_origin', '3442', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4308', 'tb_measurethicknessrecord_origin', '3443', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4309', 'tb_measurethicknessrecord_origin', '3444', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4310', 'tb_measurethicknessrecord_origin', '3445', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4311', 'tb_measurethicknessrecord_origin', '3446', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4312', 'tb_measurethicknessrecord_origin', '3447', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4313', 'tb_measurethicknessrecord_origin', '3448', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4314', 'tb_measurethicknessrecord_origin', '3449', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4315', 'tb_measurethicknessrecord_origin', '3450', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4316', 'tb_measurethicknessrecord_origin', '3451', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4317', 'tb_measurethicknessrecord_origin', '3452', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4318', 'tb_measurethicknessrecord_origin', '3453', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4319', 'tb_measurethicknessrecord_origin', '3454', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4320', 'tb_measurethicknessrecord_origin', '3455', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4321', 'tb_measurethicknessrecord_origin', '3456', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4322', 'tb_measurethicknessrecord_origin', '3457', '2016-01-02 07:26:05', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4323', 'tb_measurethicknessrecord_origin', '3458', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4324', 'tb_measurethicknessrecord_origin', '3459', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4325', 'tb_measurethicknessrecord_origin', '3460', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4326', 'tb_measurethicknessrecord_origin', '3461', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4327', 'tb_measurethicknessrecord_origin', '3462', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4328', 'tb_measurethicknessrecord_origin', '3463', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4329', 'tb_measurethicknessrecord_origin', '3464', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4330', 'tb_measurethicknessrecord_origin', '3465', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4331', 'tb_measurethicknessrecord_origin', '3466', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4332', 'tb_measurethicknessrecord_origin', '3467', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4333', 'tb_measurethicknessrecord_origin', '3468', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4334', 'tb_measurethicknessrecord_origin', '3469', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4335', 'tb_measurethicknessrecord_origin', '3470', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4336', 'tb_measurethicknessrecord_origin', '3471', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4337', 'tb_measurethicknessrecord_origin', '3472', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4338', 'tb_measurethicknessrecord_origin', '3473', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4339', 'tb_measurethicknessrecord_origin', '3474', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4340', 'tb_measurethicknessrecord_origin', '3475', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4341', 'tb_measurethicknessrecord_origin', '3476', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4342', 'tb_measurethicknessrecord_origin', '3477', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4343', 'tb_measurethicknessrecord_origin', '3478', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4344', 'tb_measurethicknessrecord_origin', '3479', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4345', 'tb_measurethicknessrecord_origin', '3480', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4346', 'tb_measurethicknessrecord_origin', '3481', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4347', 'tb_measurethicknessrecord_origin', '3482', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4348', 'tb_measurethicknessrecord_origin', '3483', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4349', 'tb_measurethicknessrecord_origin', '3484', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4350', 'tb_measurethicknessrecord_origin', '3485', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4351', 'tb_measurethicknessrecord_origin', '3486', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4352', 'tb_measurethicknessrecord_origin', '3487', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4353', 'tb_measurethicknessrecord_origin', '3488', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4354', 'tb_measurethicknessrecord_origin', '3489', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4355', 'tb_measurethicknessrecord_origin', '3490', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4356', 'tb_measurethicknessrecord_origin', '3491', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4357', 'tb_measurethicknessrecord_origin', '3492', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4358', 'tb_measurethicknessrecord_origin', '3493', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4359', 'tb_measurethicknessrecord_origin', '3494', '2016-01-02 07:26:06', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4360', 'tb_measurethicknessrecord_origin', '3495', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4361', 'tb_measurethicknessrecord_origin', '3496', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4362', 'tb_measurethicknessrecord_origin', '3497', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4363', 'tb_measurethicknessrecord_origin', '3498', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4364', 'tb_measurethicknessrecord_origin', '3499', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4365', 'tb_measurethicknessrecord_origin', '3500', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4366', 'tb_measurethicknessrecord_origin', '3501', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4367', 'tb_measurethicknessrecord_origin', '3502', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4368', 'tb_measurethicknessrecord_origin', '3503', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4369', 'tb_measurethicknessrecord_origin', '3504', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4370', 'tb_measurethicknessrecord_origin', '3505', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4371', 'tb_measurethicknessrecord_origin', '3506', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4372', 'tb_measurethicknessrecord_origin', '3507', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4373', 'tb_measurethicknessrecord_origin', '3508', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4374', 'tb_measurethicknessrecord_origin', '3509', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4375', 'tb_measurethicknessrecord_origin', '3510', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4376', 'tb_measurethicknessrecord_origin', '3511', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4377', 'tb_measurethicknessrecord_origin', '3512', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4378', 'tb_measurethicknessrecord_origin', '3513', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4379', 'tb_measurethicknessrecord_origin', '3514', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4380', 'tb_measurethicknessrecord_origin', '3515', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4381', 'tb_measurethicknessrecord_origin', '3516', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4382', 'tb_measurethicknessrecord_origin', '3517', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4383', 'tb_measurethicknessrecord_origin', '3518', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4384', 'tb_measurethicknessrecord_origin', '3519', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4385', 'tb_measurethicknessrecord_origin', '3520', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4386', 'tb_measurethicknessrecord_origin', '3521', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4387', 'tb_measurethicknessrecord_origin', '3522', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4388', 'tb_measurethicknessrecord_origin', '3523', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4389', 'tb_measurethicknessrecord_origin', '3524', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4390', 'tb_measurethicknessrecord_origin', '3525', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4391', 'tb_measurethicknessrecord_origin', '3526', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4392', 'tb_measurethicknessrecord_origin', '3527', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4393', 'tb_measurethicknessrecord_origin', '3528', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4394', 'tb_measurethicknessrecord_origin', '3529', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4395', 'tb_measurethicknessrecord_origin', '3530', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4396', 'tb_measurethicknessrecord_origin', '3531', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4397', 'tb_measurethicknessrecord_origin', '3532', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4398', 'tb_measurethicknessrecord_origin', '3533', '2016-01-02 07:26:07', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4399', 'tb_measurethicknessrecord_origin', '3534', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4400', 'tb_measurethicknessrecord_origin', '3535', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4401', 'tb_measurethicknessrecord_origin', '3536', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4402', 'tb_measurethicknessrecord_origin', '3537', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4403', 'tb_measurethicknessrecord_origin', '3538', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4404', 'tb_measurethicknessrecord_origin', '3539', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4405', 'tb_measurethicknessrecord_origin', '3540', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4406', 'tb_measurethicknessrecord_origin', '3541', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4407', 'tb_measurethicknessrecord_origin', '3542', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4408', 'tb_measurethicknessrecord_origin', '3543', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4409', 'tb_measurethicknessrecord_origin', '3544', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4410', 'tb_measurethicknessrecord_origin', '3545', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4411', 'tb_measurethicknessrecord_origin', '3546', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4412', 'tb_measurethicknessrecord_origin', '3547', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4413', 'tb_measurethicknessrecord_origin', '3548', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4414', 'tb_measurethicknessrecord_origin', '3549', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4415', 'tb_measurethicknessrecord_origin', '3550', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4416', 'tb_measurethicknessrecord_origin', '3551', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4417', 'tb_measurethicknessrecord_origin', '3552', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4418', 'tb_measurethicknessrecord_origin', '3553', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4419', 'tb_measurethicknessrecord_origin', '3554', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4420', 'tb_measurethicknessrecord_origin', '3555', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4421', 'tb_measurethicknessrecord_origin', '3556', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4422', 'tb_measurethicknessrecord_origin', '3557', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4423', 'tb_measurethicknessrecord_origin', '3558', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4424', 'tb_measurethicknessrecord_origin', '3559', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4425', 'tb_measurethicknessrecord_origin', '3560', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4426', 'tb_measurethicknessrecord_origin', '3561', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4427', 'tb_measurethicknessrecord_origin', '3562', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4428', 'tb_measurethicknessrecord_origin', '3563', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4429', 'tb_measurethicknessrecord_origin', '3564', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4430', 'tb_measurethicknessrecord_origin', '3565', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4431', 'tb_measurethicknessrecord_origin', '3566', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4432', 'tb_measurethicknessrecord_origin', '3567', '2016-01-02 07:26:08', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4433', 'tb_measurethicknessrecord_origin', '3568', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4434', 'tb_measurethicknessrecord_origin', '3569', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4435', 'tb_measurethicknessrecord_origin', '3570', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4436', 'tb_measurethicknessrecord_origin', '3571', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4437', 'tb_measurethicknessrecord_origin', '3572', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4438', 'tb_measurethicknessrecord_origin', '3573', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4439', 'tb_measurethicknessrecord_origin', '3574', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4440', 'tb_measurethicknessrecord_origin', '3575', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4441', 'tb_measurethicknessrecord_origin', '3576', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4442', 'tb_measurethicknessrecord_origin', '3577', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4443', 'tb_measurethicknessrecord_origin', '3578', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4444', 'tb_measurethicknessrecord_origin', '3579', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4445', 'tb_measurethicknessrecord_origin', '3580', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4446', 'tb_measurethicknessrecord_origin', '3581', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4447', 'tb_measurethicknessrecord_origin', '3582', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4448', 'tb_measurethicknessrecord_origin', '3583', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4449', 'tb_measurethicknessrecord_origin', '3584', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4450', 'tb_measurethicknessrecord_origin', '3585', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4451', 'tb_measurethicknessrecord_origin', '3586', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4452', 'tb_measurethicknessrecord_origin', '3587', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4453', 'tb_measurethicknessrecord_origin', '3588', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4454', 'tb_measurethicknessrecord_origin', '3589', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4455', 'tb_measurethicknessrecord_origin', '3590', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4456', 'tb_measurethicknessrecord_origin', '3591', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4457', 'tb_measurethicknessrecord_origin', '3592', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4458', 'tb_measurethicknessrecord_origin', '3593', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4459', 'tb_measurethicknessrecord_origin', '3594', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4460', 'tb_measurethicknessrecord_origin', '3595', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4461', 'tb_measurethicknessrecord_origin', '3596', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4462', 'tb_measurethicknessrecord_origin', '3597', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4463', 'tb_measurethicknessrecord_origin', '3598', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4464', 'tb_measurethicknessrecord_origin', '3599', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4465', 'tb_measurethicknessrecord_origin', '3600', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4466', 'tb_measurethicknessrecord_origin', '3601', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4467', 'tb_measurethicknessrecord_origin', '3602', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4468', 'tb_measurethicknessrecord_origin', '3603', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4469', 'tb_measurethicknessrecord_origin', '3604', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4470', 'tb_measurethicknessrecord_origin', '3605', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4471', 'tb_measurethicknessrecord_origin', '3606', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4472', 'tb_measurethicknessrecord_origin', '3607', '2016-01-02 07:26:09', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4473', 'tb_measurethicknessrecord_origin', '3608', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4474', 'tb_measurethicknessrecord_origin', '3609', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4475', 'tb_measurethicknessrecord_origin', '3610', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4476', 'tb_measurethicknessrecord_origin', '3611', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4477', 'tb_measurethicknessrecord_origin', '3612', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4478', 'tb_measurethicknessrecord_origin', '3613', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4479', 'tb_measurethicknessrecord_origin', '3614', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4480', 'tb_measurethicknessrecord_origin', '3615', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4481', 'tb_measurethicknessrecord_origin', '3616', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4482', 'tb_measurethicknessrecord_origin', '3617', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4483', 'tb_measurethicknessrecord_origin', '3618', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4484', 'tb_measurethicknessrecord_origin', '3619', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4485', 'tb_measurethicknessrecord_origin', '3620', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4486', 'tb_measurethicknessrecord_origin', '3621', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4487', 'tb_measurethicknessrecord_origin', '3622', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4488', 'tb_measurethicknessrecord_origin', '3623', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4489', 'tb_measurethicknessrecord_origin', '3624', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4490', 'tb_measurethicknessrecord_origin', '3625', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4491', 'tb_measurethicknessrecord_origin', '3626', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4492', 'tb_measurethicknessrecord_origin', '3627', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4493', 'tb_measurethicknessrecord_origin', '3628', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4494', 'tb_measurethicknessrecord_origin', '3629', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4495', 'tb_measurethicknessrecord_origin', '3630', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4496', 'tb_measurethicknessrecord_origin', '3631', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4497', 'tb_measurethicknessrecord_origin', '3632', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4498', 'tb_measurethicknessrecord_origin', '3633', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4499', 'tb_measurethicknessrecord_origin', '3634', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4500', 'tb_measurethicknessrecord_origin', '3635', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4501', 'tb_measurethicknessrecord_origin', '3636', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4502', 'tb_measurethicknessrecord_origin', '3637', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4503', 'tb_measurethicknessrecord_origin', '3638', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4504', 'tb_measurethicknessrecord_origin', '3639', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4505', 'tb_measurethicknessrecord_origin', '3640', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4506', 'tb_measurethicknessrecord_origin', '3641', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4507', 'tb_measurethicknessrecord_origin', '3642', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4508', 'tb_measurethicknessrecord_origin', '3643', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4509', 'tb_measurethicknessrecord_origin', '3644', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4510', 'tb_measurethicknessrecord_origin', '3645', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4511', 'tb_measurethicknessrecord_origin', '3646', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4512', 'tb_measurethicknessrecord_origin', '3647', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4513', 'tb_measurethicknessrecord_origin', '3648', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4514', 'tb_measurethicknessrecord_origin', '3649', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4515', 'tb_measurethicknessrecord_origin', '3650', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4516', 'tb_measurethicknessrecord_origin', '3651', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4517', 'tb_measurethicknessrecord_origin', '3652', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4518', 'tb_measurethicknessrecord_origin', '3653', '2016-01-02 07:26:10', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4519', 'tb_measurethicknessrecord_origin', '3654', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4520', 'tb_measurethicknessrecord_origin', '3655', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4521', 'tb_measurethicknessrecord_origin', '3656', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4522', 'tb_measurethicknessrecord_origin', '3657', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4523', 'tb_measurethicknessrecord_origin', '3658', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4524', 'tb_measurethicknessrecord_origin', '3659', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4525', 'tb_measurethicknessrecord_origin', '3660', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4526', 'tb_measurethicknessrecord_origin', '3661', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4527', 'tb_measurethicknessrecord_origin', '3662', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4528', 'tb_measurethicknessrecord_origin', '3663', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4529', 'tb_measurethicknessrecord_origin', '3664', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4530', 'tb_measurethicknessrecord_origin', '3665', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4531', 'tb_measurethicknessrecord_origin', '3666', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4532', 'tb_measurethicknessrecord_origin', '3667', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4533', 'tb_measurethicknessrecord_origin', '3668', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4534', 'tb_measurethicknessrecord_origin', '3669', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4535', 'tb_measurethicknessrecord_origin', '3670', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4536', 'tb_measurethicknessrecord_origin', '3671', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4537', 'tb_measurethicknessrecord_origin', '3672', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4538', 'tb_measurethicknessrecord_origin', '3673', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4539', 'tb_measurethicknessrecord_origin', '3674', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4540', 'tb_measurethicknessrecord_origin', '3675', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4541', 'tb_measurethicknessrecord_origin', '3676', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4542', 'tb_measurethicknessrecord_origin', '3677', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4543', 'tb_measurethicknessrecord_origin', '3678', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4544', 'tb_measurethicknessrecord_origin', '3679', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4545', 'tb_measurethicknessrecord_origin', '3680', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4546', 'tb_measurethicknessrecord_origin', '3681', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4547', 'tb_measurethicknessrecord_origin', '3682', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4548', 'tb_measurethicknessrecord_origin', '3683', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4549', 'tb_measurethicknessrecord_origin', '3684', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4550', 'tb_measurethicknessrecord_origin', '3685', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4551', 'tb_measurethicknessrecord_origin', '3686', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4552', 'tb_measurethicknessrecord_origin', '3687', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4553', 'tb_measurethicknessrecord_origin', '3688', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4554', 'tb_measurethicknessrecord_origin', '3689', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4555', 'tb_measurethicknessrecord_origin', '3690', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4556', 'tb_measurethicknessrecord_origin', '3691', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4557', 'tb_measurethicknessrecord_origin', '3692', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4558', 'tb_measurethicknessrecord_origin', '3693', '2016-01-02 07:26:11', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4559', 'tb_measurethicknessrecord_origin', '3694', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4560', 'tb_measurethicknessrecord_origin', '3695', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4561', 'tb_measurethicknessrecord_origin', '3696', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4562', 'tb_measurethicknessrecord_origin', '3697', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4563', 'tb_measurethicknessrecord_origin', '3698', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4564', 'tb_measurethicknessrecord_origin', '3699', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4565', 'tb_measurethicknessrecord_origin', '3700', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4566', 'tb_measurethicknessrecord_origin', '3701', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4567', 'tb_measurethicknessrecord_origin', '3702', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4568', 'tb_measurethicknessrecord_origin', '3703', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4569', 'tb_measurethicknessrecord_origin', '3704', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4570', 'tb_measurethicknessrecord_origin', '3705', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4571', 'tb_measurethicknessrecord_origin', '3706', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4572', 'tb_measurethicknessrecord_origin', '3707', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4573', 'tb_measurethicknessrecord_origin', '3708', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4574', 'tb_measurethicknessrecord_origin', '3709', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4575', 'tb_measurethicknessrecord_origin', '3710', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4576', 'tb_measurethicknessrecord_origin', '3711', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4577', 'tb_measurethicknessrecord_origin', '3712', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4578', 'tb_measurethicknessrecord_origin', '3713', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4579', 'tb_measurethicknessrecord_origin', '3714', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4580', 'tb_measurethicknessrecord_origin', '3715', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4581', 'tb_measurethicknessrecord_origin', '3716', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4582', 'tb_measurethicknessrecord_origin', '3717', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4583', 'tb_measurethicknessrecord_origin', '3718', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4584', 'tb_measurethicknessrecord_origin', '3719', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4585', 'tb_measurethicknessrecord_origin', '3720', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4586', 'tb_measurethicknessrecord_origin', '3721', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4587', 'tb_measurethicknessrecord_origin', '3722', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4588', 'tb_measurethicknessrecord_origin', '3723', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4589', 'tb_measurethicknessrecord_origin', '3724', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4590', 'tb_measurethicknessrecord_origin', '3725', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4591', 'tb_measurethicknessrecord_origin', '3726', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4592', 'tb_measurethicknessrecord_origin', '3727', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4593', 'tb_measurethicknessrecord_origin', '3728', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4594', 'tb_measurethicknessrecord_origin', '3729', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4595', 'tb_measurethicknessrecord_origin', '3730', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4596', 'tb_measurethicknessrecord_origin', '3731', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4597', 'tb_measurethicknessrecord_origin', '3732', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4598', 'tb_measurethicknessrecord_origin', '3733', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4599', 'tb_measurethicknessrecord_origin', '3734', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4600', 'tb_measurethicknessrecord_origin', '3735', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4601', 'tb_measurethicknessrecord_origin', '3736', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4602', 'tb_measurethicknessrecord_origin', '3737', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4603', 'tb_measurethicknessrecord_origin', '3738', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4604', 'tb_measurethicknessrecord_origin', '3739', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4605', 'tb_measurethicknessrecord_origin', '3740', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4606', 'tb_measurethicknessrecord_origin', '3741', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4607', 'tb_measurethicknessrecord_origin', '3742', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4608', 'tb_measurethicknessrecord_origin', '3743', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4609', 'tb_measurethicknessrecord_origin', '3744', '2016-01-02 07:26:12', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4610', 'tb_measurethicknessrecord_origin', '3745', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4611', 'tb_measurethicknessrecord_origin', '3746', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4612', 'tb_measurethicknessrecord_origin', '3747', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4613', 'tb_measurethicknessrecord_origin', '3748', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4614', 'tb_measurethicknessrecord_origin', '3749', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4615', 'tb_measurethicknessrecord_origin', '3750', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4616', 'tb_measurethicknessrecord_origin', '3751', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4617', 'tb_measurethicknessrecord_origin', '3752', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4618', 'tb_measurethicknessrecord_origin', '3753', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4619', 'tb_measurethicknessrecord_origin', '3754', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4620', 'tb_measurethicknessrecord_origin', '3755', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4621', 'tb_measurethicknessrecord_origin', '3756', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4622', 'tb_measurethicknessrecord_origin', '3757', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4623', 'tb_measurethicknessrecord_origin', '3758', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4624', 'tb_measurethicknessrecord_origin', '3759', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4625', 'tb_measurethicknessrecord_origin', '3760', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4626', 'tb_measurethicknessrecord_origin', '3761', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4627', 'tb_measurethicknessrecord_origin', '3762', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4628', 'tb_measurethicknessrecord_origin', '3763', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4629', 'tb_measurethicknessrecord_origin', '3764', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4630', 'tb_measurethicknessrecord_origin', '3765', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4631', 'tb_measurethicknessrecord_origin', '3766', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4632', 'tb_measurethicknessrecord_origin', '3767', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4633', 'tb_measurethicknessrecord_origin', '3768', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4634', 'tb_measurethicknessrecord_origin', '3769', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4635', 'tb_measurethicknessrecord_origin', '3770', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4636', 'tb_measurethicknessrecord_origin', '3771', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4637', 'tb_measurethicknessrecord_origin', '3772', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4638', 'tb_measurethicknessrecord_origin', '3773', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4639', 'tb_measurethicknessrecord_origin', '3774', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4640', 'tb_measurethicknessrecord_origin', '3775', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4641', 'tb_measurethicknessrecord_origin', '3776', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4642', 'tb_measurethicknessrecord_origin', '3777', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4643', 'tb_measurethicknessrecord_origin', '3778', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4644', 'tb_measurethicknessrecord_origin', '3779', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4645', 'tb_measurethicknessrecord_origin', '3780', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4646', 'tb_measurethicknessrecord_origin', '3781', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4647', 'tb_measurethicknessrecord_origin', '3782', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4648', 'tb_measurethicknessrecord_origin', '3783', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4649', 'tb_measurethicknessrecord_origin', '3784', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4650', 'tb_measurethicknessrecord_origin', '3785', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4651', 'tb_measurethicknessrecord_origin', '3786', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4652', 'tb_measurethicknessrecord_origin', '3787', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4653', 'tb_measurethicknessrecord_origin', '3788', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4654', 'tb_measurethicknessrecord_origin', '3789', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4655', 'tb_measurethicknessrecord_origin', '3790', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4656', 'tb_measurethicknessrecord_origin', '3791', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4657', 'tb_measurethicknessrecord_origin', '3792', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4658', 'tb_measurethicknessrecord_origin', '3793', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4659', 'tb_measurethicknessrecord_origin', '3794', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4660', 'tb_measurethicknessrecord_origin', '3795', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4661', 'tb_measurethicknessrecord_origin', '3796', '2016-01-02 07:26:13', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4662', 'tb_measurethicknessrecord_origin', '3797', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4663', 'tb_measurethicknessrecord_origin', '3798', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4664', 'tb_measurethicknessrecord_origin', '3799', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4665', 'tb_measurethicknessrecord_origin', '3800', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4666', 'tb_measurethicknessrecord_origin', '3801', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4667', 'tb_measurethicknessrecord_origin', '3802', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4668', 'tb_measurethicknessrecord_origin', '3803', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4669', 'tb_measurethicknessrecord_origin', '3804', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4670', 'tb_measurethicknessrecord_origin', '3805', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4671', 'tb_measurethicknessrecord_origin', '3806', '2016-01-02 07:26:14', '', '张三', '导入');
INSERT INTO `tb_record` VALUES ('4672', 'tb_plantfaultrecord', '4', '2016-01-03 06:36:42', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4673', 'tb_plantUselessRecord', '3', '2016-01-03 06:37:18', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4674', 'tb_plantUselessRecord', '4', '2016-01-03 06:37:31', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4675', 'tb_plantInfo', '12', '2016-01-03 09:22:41', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4676', 'tb_plantInfo', '12', '2016-01-03 09:25:37', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4677', 'tb_plantInfo', '12', '2016-01-03 09:26:08', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4678', 'tb_plantriskcalcresult', '7', '2016-01-03 09:36:49', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4679', 'tb_plantInfo', '12', '2016-01-04 06:19:27', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4680', 'tb_plantInfo', '13', '2016-01-04 06:19:44', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4681', 'tb_assistcheckevaluaterecord', '8', '2016-01-25 08:58:20', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('4682', 'tb_assistcheckevaluaterecord', '8', '2016-01-25 08:58:22', '', '张三', '提交');
INSERT INTO `tb_record` VALUES ('4683', 'tb_plantInfo', '12', '2016-01-30 10:02:48', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4684', 'tb_plantInfo', '12', '2016-01-30 10:03:32', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4685', 'tb_plantInfo', '12', '2016-01-30 10:03:49', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4686', 'tb_plantInfo', '12', '2016-01-30 10:03:53', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('4687', 'tb_measureThicknessRecord_origin', '3807', '2016-01-30 10:05:22', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4688', 'tb_measureThicknessRecord', '5', '2016-01-30 10:06:19', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4689', 'tb_measureThicknessRecord', '6', '2016-01-30 10:06:55', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4690', 'tb_measureThicknessRecord', '7', '2016-01-30 10:07:47', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4691', 'tb_measureThicknessRecord', '5', '2016-01-30 10:08:55', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4692', 'tb_measureThicknessRecord', '6', '2016-01-30 10:09:33', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4693', 'tb_measureThicknessRecord', '6', '2016-01-30 10:09:36', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4694', 'tb_measureThicknessRecord', '7', '2016-01-30 10:10:14', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4695', 'tb_measureThicknessRecord', '7', '2016-01-30 10:10:17', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('4696', 'tb_measureThicknessRecord', '6', '2016-01-30 10:10:37', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4697', 'tb_plantInfo', '12', '2016-01-30 10:12:13', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4698', 'tb_plantriskcalcresult', '8', '2016-01-30 10:16:49', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4699', 'tb_plantriskcalcresult', '9', '2016-01-30 10:21:01', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4700', 'tb_plantriskcalcresult', '10', '2016-01-30 12:09:36', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4701', 'tb_plantriskcalcresult', '11', '2016-01-30 01:08:24', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4702', 'tb_plantriskcalcresult', '12', '2016-01-30 01:13:39', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4703', 'tb_measureThicknessRecord', '5', '2016-01-30 08:14:45', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('4704', 'tb_plantInfo', '13', '2016-01-30 08:24:44', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4705', 'tb_plantInfo', '13', '2016-01-30 08:24:47', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('4706', 'tb_measureThicknessRecord', '8', '2016-01-30 08:25:36', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4707', 'tb_measureThicknessRecord', '9', '2016-01-30 08:26:28', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4708', 'tb_measureThicknessRecord_origin', '3808', '2016-01-30 08:28:06', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4709', 'tb_measureThicknessRecord_origin', '3808', '2016-01-30 08:41:30', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4710', 'tb_measureThicknessRecord_origin', '3808', '2016-01-30 08:45:07', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4711', 'tb_plantriskcalcresult', '13', '2016-01-30 08:46:06', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4712', 'tb_plantriskcalcresult', '14', '2016-01-31 09:17:55', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4713', 'tb_measureThicknessRecord', '5', '2016-02-01 10:31:50', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('4714', 'tb_measureThicknessRecord', '6', '2016-02-01 10:39:08', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('4715', 'tb_measureThicknessRecord', '5', '2016-02-01 10:39:24', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('4716', 'tb_measureThicknessRecord', '10', '2016-02-01 10:39:53', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4717', 'tb_measureThicknessRecord', '10', '2016-02-01 10:40:05', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4718', 'tb_measureThicknessRecord', '5', '2016-02-01 10:45:01', '', '张三', '提交');
INSERT INTO `tb_record` VALUES ('4719', 'tb_plantriskcalcresult', '15', '2016-02-02 06:04:57', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4720', 'tb_plantInfo', '13', '2016-02-02 08:46:12', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4721', 'tb_plantInfo', '12', '2016-02-02 08:46:25', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4722', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 09:58:18', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4723', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 09:58:27', '', '张三', '提交');
INSERT INTO `tb_record` VALUES ('4724', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 09:59:55', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4725', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 10:07:23', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4726', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 10:07:41', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4727', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 10:07:58', '', '王五', '保存');
INSERT INTO `tb_record` VALUES ('4728', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 10:08:00', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4729', 'tb_assistcheckevaluaterecord', '10', '2016-02-03 10:08:51', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4730', 'tb_attachEvaluateRecord', '5', '2016-02-03 10:11:26', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4731', 'tb_attachEvaluateRecord', '5', '2016-02-03 10:11:37', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4732', 'tb_attachEvaluateRecord', '5', '2016-02-03 10:11:51', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4733', 'tb_attachEvaluateRecord', '6', '2016-02-03 10:12:00', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4734', 'tb_attachEvaluateRecord', '6', '2016-02-03 10:12:41', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4735', 'tb_plantAlarm', '1', '2016-02-03 10:12:41', '', '王五', '添加');
INSERT INTO `tb_record` VALUES ('4736', 'tb_attachEvaluateRecord', '5', '2016-02-03 10:12:48', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4737', 'tb_plantAlarm', '2', '2016-02-03 10:12:48', '', '王五', '添加');
INSERT INTO `tb_record` VALUES ('4738', 'tb_plantriskcalcresult', '8', '2016-02-03 06:52:09', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4739', 'tb_plantriskcalcresult', '8', '2016-02-03 07:00:56', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4740', 'tb_plantriskcalcresult', '9', '2016-02-03 07:01:04', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4741', 'tb_plantriskcalcresult', '10', '2016-02-03 07:01:09', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4742', 'tb_plantriskcalcresult', '14', '2016-02-03 10:02:27', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4743', 'tb_plantriskcalcresult', '16', '2016-02-03 10:02:35', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4744', 'tb_plantriskcalcresult', '16', '2016-02-03 10:02:58', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4745', 'tb_plantriskcalcresult', '17', '2016-02-03 10:03:04', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4746', 'tb_plantriskcalcresult', '15', '2016-02-03 10:03:09', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4747', 'tb_plantriskcalcresult', '18', '2016-02-03 10:08:19', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4748', 'tb_plantriskcalcresult', '17', '2016-02-03 10:08:26', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4749', 'tb_plantChangeRecord', '-1', '2016-02-19 11:33:05', '', '张三', '保存');
INSERT INTO `tb_record` VALUES ('4750', 'tb_plantChangeRecord', '1', '2016-02-19 11:33:41', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4751', 'tb_plantChangeRecord', '1', '2016-02-19 11:34:57', '', '张三', '提交');
INSERT INTO `tb_record` VALUES ('4752', 'tb_plantChangeRecord', '1', '2016-02-19 12:03:32', '', '张三', '删除');
INSERT INTO `tb_record` VALUES ('4753', 'tb_plantChangeRecord', '2', '2016-02-19 12:07:41', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4754', 'tb_plantChangeRecord', '3', '2016-02-19 12:08:08', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4755', 'tb_plantChangeRecord', '2', '2016-02-19 12:08:23', '', '炼油厂设备员', '保存');
INSERT INTO `tb_record` VALUES ('4756', 'tb_plantChangeRecord', '2', '2016-02-19 12:21:33', '', '王五', '提交');
INSERT INTO `tb_record` VALUES ('4757', 'tb_plantChangeRecord', '3', '2016-02-19 03:04:00', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4758', 'tb_plantCleanRecord', '1', '2016-02-19 03:04:10', '', '张三', '修改');
INSERT INTO `tb_record` VALUES ('4759', 'tb_plantCleanRecord', '1', '2016-02-19 03:10:03', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('4760', 'tb_plantCleanRecord', '1', '2016-02-19 03:23:28', '', '炼油厂设备员', '修改');
INSERT INTO `tb_record` VALUES ('4761', 'tb_plantChangeRecord', '3', '2016-02-19 03:23:40', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4762', 'tb_plantCleanRecord', '1', '2016-02-19 03:23:48', '', '炼油厂设备员', '提交');
INSERT INTO `tb_record` VALUES ('4763', 'tb_plantCleanRecord', '2', '2016-02-19 03:23:54', '', '炼油厂设备员', '修改');
INSERT INTO `tb_record` VALUES ('4764', 'tb_plantfaultrecord', '2', '2016-02-19 03:24:07', '', '炼油厂设备员', '删除');
INSERT INTO `tb_record` VALUES ('4765', 'tb_plantCleanRecord', '2', '2016-02-19 03:25:01', '', '炼油厂设备员', '删除');
INSERT INTO `tb_record` VALUES ('4766', 'tb_planttestrecord', '6', '2016-02-20 11:14:27', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4767', 'tb_planttestrecord', '7', '2016-02-20 11:14:40', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4768', 'tb_plantMaintanceRecord', '7', '2016-02-20 11:15:04', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4769', 'tb_plantMaintanceRecord', '8', '2016-02-20 11:15:16', '', '炼油厂设备员', '添加');
INSERT INTO `tb_record` VALUES ('4770', 'tb_plantfaultrecord', '5', '2016-02-23 02:39:42', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4771', 'tb_plantfaultrecord', '6', '2016-02-23 02:39:53', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4772', 'tb_measureThicknessRecord', '11', '2016-02-23 02:50:39', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4773', 'tb_plantfaultrecord', '7', '2016-03-04 09:36:44', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4774', 'tb_plantfaultrecord', '8', '2016-03-04 09:36:47', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4775', 'tb_plantriskcalcresult', '19', '2016-03-04 09:40:21', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4776', 'tb_plantAlarm', '1', '2016-03-04 09:42:25', '', '张三', '保存处理方法');
INSERT INTO `tb_record` VALUES ('4777', 'tb_plantAlarm', '1', '2016-03-04 09:42:30', '', '张三', '保存处理方法');
INSERT INTO `tb_record` VALUES ('4778', 'tb_plantAlarm', '1', '2016-03-04 09:42:34', '', '张三', '提交');
INSERT INTO `tb_record` VALUES ('4779', 'tb_plantAlarm', '1', '2016-03-04 09:42:36', '', '张三', '打回');
INSERT INTO `tb_record` VALUES ('4780', 'tb_plantUselessRecord', '5', '2016-03-04 09:50:19', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4781', 'tb_measureThicknessRecord', '12', '2016-03-04 10:09:07', '', '陈六', '添加');
INSERT INTO `tb_record` VALUES ('4782', 'tb_plantChangeRecord', '3', '2016-04-13 08:32:24', '', '张三', '添加');
INSERT INTO `tb_record` VALUES ('4783', 'tb_plantCleanRecord', '2', '2016-04-13 08:32:29', '', '张三', '修改');

-- ----------------------------
-- Table structure for tb_riskcalpara
-- ----------------------------
DROP TABLE IF EXISTS `tb_riskcalpara`;
CREATE TABLE `tb_riskcalpara` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(20) DEFAULT NULL COMMENT '关联相应设备',
  `wallThiningMechanism` varchar(100) DEFAULT NULL COMMENT '减薄机理筛选结果',
  `wallThiningMechanismId` int(11) DEFAULT NULL,
  `floorThiningMechanism` varchar(100) DEFAULT NULL COMMENT '底板减薄机理',
  `floorThiningMechanismId` int(11) DEFAULT NULL,
  `ClConcentration` varchar(20) DEFAULT NULL COMMENT 'cl离子浓度',
  `SConcentration` varchar(20) DEFAULT NULL COMMENT '介质硫含量',
  `HFConcentration` varchar(20) DEFAULT NULL COMMENT 'HF含量',
  `AmineConcentration` varchar(20) DEFAULT NULL COMMENT '胺液浓度',
  `TANValue` varchar(20) DEFAULT NULL COMMENT '总酸值',
  `steamH2S` varchar(20) DEFAULT NULL COMMENT '蒸汽中硫h化氢含量',
  `isOxidizer` tinyint(8) DEFAULT NULL,
  `wallSCCMechanism` varchar(100) DEFAULT NULL COMMENT '壁板应力腐蚀开裂次因子',
  `wallSCCMechanismId` int(11) DEFAULT NULL,
  `floorSCCMechanism` varchar(100) DEFAULT NULL COMMENT '应力腐蚀开裂机理筛选结果',
  `floorSCCMechanismId` int(11) DEFAULT NULL,
  `isMediumWater` int(11) DEFAULT NULL,
  `SCCMaterialType` varchar(100) DEFAULT NULL COMMENT 'scc选择时的材料类型',
  `SCCSurroundingsMedium` varchar(100) DEFAULT NULL COMMENT 'SCC筛选时环境含有物',
  `SCCNaOHConcentration` varchar(20) DEFAULT NULL COMMENT 'NaOH浓度',
  `SCCisHeatTracing` tinyint(8) DEFAULT NULL COMMENT '是否伴热',
  `SCCisSteamBlowing` tinyint(8) DEFAULT NULL COMMENT '是否蒸汽吹扫',
  `isStressRelief` tinyint(8) DEFAULT NULL COMMENT '是否应力消除',
  `SCCAmineComposition` varchar(20) DEFAULT NULL COMMENT '胺液成分',
  `SCCWaterpH` varchar(20) DEFAULT NULL COMMENT '水中pH值',
  `SCCWaterH2S` varchar(20) DEFAULT NULL COMMENT '水中H2S的含量',
  `SCCisCyanide` tinyint(8) DEFAULT NULL COMMENT '是否存在氰化物',
  `SCCBHardness` varchar(20) DEFAULT NULL COMMENT '最大布氏硬度',
  `SCCSteeltype` varchar(20) DEFAULT NULL COMMENT '钢产品形式',
  `SCCSteelSulfur` varchar(20) DEFAULT NULL COMMENT '钢板中硫含量',
  `SCCWaterCarbonateConcentration` varchar(20) DEFAULT NULL COMMENT '碳酸盐浓度',
  `SCCHeatHistory` varchar(20) DEFAULT NULL COMMENT '热历史',
  `SCCisShutdownProtect` tinyint(8) DEFAULT NULL COMMENT '是否停工保护',
  `wallOutDamageMechanism` varchar(100) DEFAULT NULL,
  `wallOutDamageMechanismId` int(11) DEFAULT NULL,
  `floorOutDamageMechanism` varchar(100) DEFAULT NULL COMMENT '底板外部损伤机理',
  `floorOutDamageMechanismId` int(11) DEFAULT NULL,
  `outDamageMaterialType` varchar(20) DEFAULT NULL COMMENT '外部损伤',
  `outDamageisPipeSupport` tinyint(8) DEFAULT NULL COMMENT '是否管支架补偿',
  `outDamageisInterfaceCompensation` tinyint(8) DEFAULT NULL COMMENT '是否进行界面补偿',
  `isKeepWarmHasCL` tinyint(8) DEFAULT NULL COMMENT '是否保温层含氯',
  `pipeComplexity` varchar(20) DEFAULT NULL COMMENT '管道复杂度',
  `isNormalization` tinyint(8) DEFAULT NULL COMMENT '是否正火处理',
  `isBrittleProtect` tinyint(8) DEFAULT NULL COMMENT '是否有防脆断措施',
  `wallBrittleFracMechanism` varchar(100) DEFAULT NULL COMMENT '脆性断裂机理',
  `floorBrittleFracMechanism` varchar(100) DEFAULT NULL COMMENT '脆性断裂机理筛选结果',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_riskcalpara
-- ----------------------------
INSERT INTO `tb_riskcalpara` VALUES ('6', '545', '盐酸腐蚀', '1', '盐酸腐蚀', '1', null, null, null, null, null, null, null, '碱开裂', '1', '碱开裂', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '碳钢和低合金钢的CUI腐蚀', '2', '碳钢和低合金钢的外部损伤', '1', null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for tb_riskdetail
-- ----------------------------
DROP TABLE IF EXISTS `tb_riskdetail`;
CREATE TABLE `tb_riskdetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gpid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `part` int(11) DEFAULT NULL COMMENT '设备序号',
  `layerId` varchar(20) DEFAULT NULL COMMENT '测点序号',
  `layerNO` int(11) DEFAULT NULL COMMENT '壁板序号',
  `damageFactor` varchar(100) DEFAULT NULL,
  `futureDamageFactor` varchar(100) DEFAULT NULL,
  `corrosionSpeed` varchar(100) DEFAULT NULL,
  `failurePro` varchar(100) DEFAULT NULL,
  `consequenceLevel` varchar(100) DEFAULT NULL,
  `thicknessType` varchar(20) DEFAULT NULL,
  `riskLevel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设备风险结果详情，包括每个壁板的损伤因子，失效后果，失效概率已经风险等级等，以及底板\r\n';

-- ----------------------------
-- Records of tb_riskdetail
-- ----------------------------

-- ----------------------------
-- Table structure for tb_risklist
-- ----------------------------
DROP TABLE IF EXISTS `tb_risklist`;
CREATE TABLE `tb_risklist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` varchar(20) DEFAULT NULL COMMENT '对应的设备键值',
  `factoryId` varchar(20) DEFAULT NULL,
  `workshopId` varchar(20) DEFAULT NULL,
  `areaId` varchar(20) DEFAULT NULL,
  `plantNO` varchar(20) DEFAULT NULL,
  `plantName` varchar(20) DEFAULT NULL,
  `countDate` varchar(100) DEFAULT NULL COMMENT '风险计算日期',
  `wallMajorRisk` varchar(20) DEFAULT NULL COMMENT '壁板风险最大测点',
  `floorMajorRisk` varchar(20) DEFAULT NULL COMMENT '底板风险最大测点',
  `wallDamageFactor` float(20,2) DEFAULT NULL COMMENT '壁板最大损伤因子',
  `floorDamageFactor` float(20,2) DEFAULT NULL COMMENT '底板最大损伤因子',
  `floorEdgeDamageFactor` float(20,2) DEFAULT NULL COMMENT '边缘板损伤因子',
  `floorEdgeCorrosionSpeed` float(20,2) DEFAULT NULL COMMENT '边缘板腐蚀速率',
  `floorMiddleDamageFactor` float(20,2) DEFAULT NULL COMMENT '底板中间板损伤因子',
  `floorMiddleCorrosionSpeed` float(20,2) DEFAULT NULL COMMENT '底板中间板腐蚀速率',
  `wallRisk` float(11,7) DEFAULT NULL COMMENT '壁板风险',
  `wallRiskLevel` varchar(20) DEFAULT NULL COMMENT '壁板风险等级',
  `floorRisk` float(11,7) DEFAULT NULL COMMENT '底板风险',
  `floorRiskLevel` varchar(20) DEFAULT NULL COMMENT '底板风险等级',
  `wallFailPro` float(11,7) DEFAULT NULL COMMENT '壁板失效概率',
  `wallFailProLevel` int(20) DEFAULT NULL COMMENT '壁板失效可能性等级',
  `floorFailPro` float(11,7) DEFAULT NULL COMMENT '底板失效概率',
  `floorFailProLevel` int(20) DEFAULT NULL COMMENT '底板失效可能性等级',
  `wallConsequence` float(11,4) DEFAULT NULL COMMENT '壁板失效后果',
  `wallConsequenceLevel` varchar(20) DEFAULT NULL COMMENT '壁板后果等级',
  `floorConsequence` float(11,4) DEFAULT NULL COMMENT '底板失效后果',
  `floorConsequenceLevel` varchar(20) DEFAULT NULL COMMENT '底板后果等级',
  `wallNextCheckDate` varchar(20) DEFAULT NULL COMMENT '壁板下次检查日期',
  `floorNextCheckDate` varchar(20) CHARACTER SET tis620 DEFAULT NULL COMMENT '底板下次检查日期',
  `wallFailPro_fu` float(11,7) DEFAULT NULL,
  `floorFailPro_fu` float(11,7) DEFAULT NULL,
  `wallRisk_fu` varchar(20) DEFAULT NULL,
  `floorRisk_fu` varchar(20) DEFAULT NULL,
  `wallRiskLevel_fu` varchar(20) DEFAULT NULL,
  `floorRiskLevel_fu` varchar(20) DEFAULT NULL,
  `wallDamageFactor_trendYear` varchar(100) DEFAULT NULL,
  `wallDamageFactor_trend` varchar(100) DEFAULT NULL,
  `floorDamageFactor_trend` varchar(100) DEFAULT NULL,
  `isAlarm` tinyint(20) DEFAULT '0' COMMENT '是否报警',
  `isShowAlarm` tinyint(20) DEFAULT '1' COMMENT '是否显示报警',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='该表是风险列表，包含某个设备的单个风险计算的详细情况\r\n\r\n';

-- ----------------------------
-- Records of tb_risklist
-- ----------------------------

-- ----------------------------
-- Table structure for tb_riskrecordlist
-- ----------------------------
DROP TABLE IF EXISTS `tb_riskrecordlist`;
CREATE TABLE `tb_riskrecordlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `wallEvaDate` varchar(20) DEFAULT NULL,
  `floorEvaDate` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_riskrecordlist
-- ----------------------------
INSERT INTO `tb_riskrecordlist` VALUES ('20', '545', '2016-11-21', '2016-11-21');

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updata_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `level` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES ('1', '公司领导', '0', '1', '2016-10-05 18:04:41', '2016-10-05 18:04:41', '3', '123');
INSERT INTO `tb_role` VALUES ('2', '厂区领导', '0', '1', '2016-10-05 18:04:33', '2016-10-05 18:04:33', '2', '');
INSERT INTO `tb_role` VALUES ('3', '设备主管', '0', '1', '2016-10-04 20:58:47', '2016-10-04 20:58:47', '2', null);
INSERT INTO `tb_role` VALUES ('5', '设备员', '0', '1', '2016-10-05 17:06:11', '2016-10-05 17:06:11', '1', '');
INSERT INTO `tb_role` VALUES ('6', '超级管理员', '0', '1', '2016-10-04 20:58:55', '2016-10-04 20:58:55', '0', null);

-- ----------------------------
-- Table structure for tb_role_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_role_user`;
CREATE TABLE `tb_role_user` (
  `role_id` char(32) NOT NULL DEFAULT '0',
  `user_id` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_role_user
-- ----------------------------
INSERT INTO `tb_role_user` VALUES ('5', '13');
INSERT INTO `tb_role_user` VALUES ('5', '14');
INSERT INTO `tb_role_user` VALUES ('5', '16');
INSERT INTO `tb_role_user` VALUES ('3', '4');

-- ----------------------------
-- Table structure for tb_runrecord
-- ----------------------------
DROP TABLE IF EXISTS `tb_runrecord`;
CREATE TABLE `tb_runrecord` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父节点id',
  `last_RecordDate` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '上次记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_runrecord
-- ----------------------------

-- ----------------------------
-- Table structure for tb_runrecorddetail
-- ----------------------------
DROP TABLE IF EXISTS `tb_runrecorddetail`;
CREATE TABLE `tb_runrecorddetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `gPid` int(11) DEFAULT NULL,
  `part` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '罐体位置',
  `partDetail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `checkResult` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `remark` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_runrecorddetail
-- ----------------------------

-- ----------------------------
-- Table structure for tb_runrecordlist
-- ----------------------------
DROP TABLE IF EXISTS `tb_runrecordlist`;
CREATE TABLE `tb_runrecordlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `record_dt` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `check_dt` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `recorder` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `checker` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `remark` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注',
  `handleId` int(20) DEFAULT NULL,
  `handler` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `handleType` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `HandleDate` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `verifier` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `verifierLevel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `verifyStage` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `verifyResult` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `alarmRemark` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '报警处理意见',
  `isAlarm` tinyint(20) DEFAULT '0' COMMENT '是否报警 0表示不报警 1表示报警',
  `isShowAlarm` tinyint(20) DEFAULT '1' COMMENT '0 表示显示报警 1表示不显示报警',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_runrecordlist
-- ----------------------------

-- ----------------------------
-- Table structure for tb_schedule
-- ----------------------------
DROP TABLE IF EXISTS `tb_schedule`;
CREATE TABLE `tb_schedule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '待办事项',
  `plantId` int(11) NOT NULL COMMENT '跳转设备编号',
  `indexHref` varchar(100) CHARACTER SET utf8 NOT NULL,
  `controller` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '跳转模块',
  `function` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '跳转页面',
  `verifyResult` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '任务类型',
  `verifyStage` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `solveDate` varchar(40) CHARACTER SET utf8 NOT NULL COMMENT '解决时间',
  `solver` varchar(40) CHARACTER SET utf8 NOT NULL COMMENT '解决者',
  `sender` varchar(40) CHARACTER SET utf8 NOT NULL COMMENT '发送者',
  `sendDate` varchar(40) CHARACTER SET utf8 NOT NULL COMMENT '发送日期',
  `workshopId` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '所属厂区',
  `plantNO` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '设备位号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_schedule
-- ----------------------------
INSERT INTO `tb_schedule` VALUES ('8', '新增设备基本信息', '514', '', 'Manage', 'tankInfo', '1', null, '', '', '王二', '2016-10-03', '江苏分公司', '1234131');
INSERT INTO `tb_schedule` VALUES ('11', '新增设备基本信息', '517', '', 'Manage', 'tankInfo', '1', null, '', '', '陈六', '2016-10-04', '总公司', '45387683');
INSERT INTO `tb_schedule` VALUES ('14', '新增设备基本信息', '520', '', 'Manage', 'tankInfo', '1', '1', '', '', '王二', '2016-10-05', '江苏分公司', '4564637');
INSERT INTO `tb_schedule` VALUES ('17', '新增设备基本信息', '523', '', 'Manage', 'tankInfo', '1', '待审核', '', '', '王二', '2016-10-05', '高富分公司', '45682135');
INSERT INTO `tb_schedule` VALUES ('18', '新增设备基本信息', '524', '', 'Manage', 'tankInfo', '1', '待审核', '', '', '王二', '2016-10-05', '高富分公司', '5949865');
INSERT INTO `tb_schedule` VALUES ('19', '新增设备基本信息', '525', '', 'Manage', 'tankInfo', '1', '待审核', '', '', '王二', '2016-10-05', '高富分公司', '6548326');
INSERT INTO `tb_schedule` VALUES ('27', '新增设备定点测厚信息', '28', '', 'Inspect', 'thicknessData', '1', '待审核', '', '', '陈六', '2016-10-06', '总公司', 'G-402');
INSERT INTO `tb_schedule` VALUES ('29', '新增设备定点测厚信息', '23', '', 'RunRecord', 'RunRecordList', '1', '待审核', '', '', '陈六', '2016-10-06', '总公司', null);
INSERT INTO `tb_schedule` VALUES ('30', '新增设备定点测厚信息', '11', '', 'DailyManagement', 'DailyManagementRecordList', '1', '待审核', '', '', '陈六', '2016-10-06', '总公司', null);
INSERT INTO `tb_schedule` VALUES ('31', '新增设备检验记录', '28', '', 'InspectRecord', 'PlantList', '1', '待审核', '', '', '陈六', '2016-10-07', '总公司', null);
INSERT INTO `tb_schedule` VALUES ('32', '新增设备日常维护信息', '28', '', 'MaintenanceRecord', 'PlantList', '1', '待审核', '', '', '陈六', '2016-10-07', '总公司', null);
INSERT INTO `tb_schedule` VALUES ('33', '新增设备基本信息', '529', '', 'Manage', 'tankInfo', '1', '待审核', '', '', '陈六', '2016-10-07', '总公司', '456789');
INSERT INTO `tb_schedule` VALUES ('34', '新增设备基本信息', '530', '', 'Manage', 'tankInfo', '1', '待审核', '', '', '陈六', '2016-10-07', '总公司', '46789');
INSERT INTO `tb_schedule` VALUES ('36', '新增设备基本信息', '532', '', 'Manage', 'tankInfo', '0', '待审核', '', '', '陈六', '2016-10-07', '总公司', '546231');
INSERT INTO `tb_schedule` VALUES ('39', '新增设备定点测厚信息', '28', '', 'Inspect', 'thickness', '0', '待审核', '', '', '陈六', '2016-10-07', '总公司', 'G-402');
INSERT INTO `tb_schedule` VALUES ('40', '新增设备定点测厚信息', '28', '', 'Inspect', 'thickness', '0', '待审核', '', '', '陈六', '2016-10-21', '青岛分公司', 'G-402');
INSERT INTO `tb_schedule` VALUES ('41', '新增设备定点测厚信息', '29', '', 'Inspect', 'thickness', '0', '待审核', '', '', '陈六', '2016-10-21', '青岛分公司', '234');
INSERT INTO `tb_schedule` VALUES ('42', '新增设备定点测厚信息', '29', '', 'Inspect', 'thickness', '0', '待审核', '', '', '陈六', '2016-10-21', '青岛分公司', '234');
INSERT INTO `tb_schedule` VALUES ('43', '新增设备维修信息', '28', '', 'MaintenanceRecord', 'index', '0', '待审核', '', '', '陈六', '2016-10-21', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('44', '新增设备维修信息', '28', '', 'MaintenanceRecord', 'index', '0', '待审核', '', '', '陈六', '2016-10-21', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('45', '新增设备运行管理信息', '28', '', 'RunRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('46', '新增设备检验记录', '28', '', 'InspectRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('47', '新增设备检验记录', '28', '', 'InspectRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('48', '新增设备检验记录', '28', '', 'InspectRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('49', '新增设备维修信息', '28', '', 'MaintenanceRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('50', '新增设备维修信息', '28', '', 'MaintenanceRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('51', '新增设备运行管理信息', '28', '', 'RunRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('52', '新增设备定点测厚信息', '28', '', 'Inspect', 'thickness', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', 'G-402');
INSERT INTO `tb_schedule` VALUES ('53', '新增设备定点测厚信息', '28', '', 'Inspect', 'thickness', '0', '待审核', '', '', '张四', '2016-10-23', '青岛分公司', 'G-402');
INSERT INTO `tb_schedule` VALUES ('54', '新增设备运行管理信息', '28', '', 'RunRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-25', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('55', '新增设备运行管理信息', '28', '', 'RunRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-25', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('56', '新增设备运行管理信息', '28', '', 'RunRecord', 'index', '0', '待审核', '', '', '张四', '2016-10-25', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('57', '新增设备维修信息', '28', '', 'MaintenanceRecord', 'index', '0', '待审核', '', '', '张四', '2016-11-01', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('58', '新增设备维修信息', '28', '', 'MaintenanceRecord', 'index', '0', '待审核', '', '', '张四', '2016-11-18', '青岛分公司', null);
INSERT INTO `tb_schedule` VALUES ('59', '新增设备维修信息', '28', '', 'MaintenanceRecord', 'index', '0', '待审核', '', '', '张四', '2016-11-18', '青岛分公司', null);

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL COMMENT '用户类型：admin,设备员，设备主管，部门领导，老板等等',
  `areaId` varchar(100) DEFAULT NULL COMMENT '所属区域',
  `workshopId` varchar(100) DEFAULT NULL COMMENT '所属车间',
  `factoryId` varchar(100) DEFAULT NULL COMMENT '所属分厂',
  `create_time` varchar(100) DEFAULT NULL COMMENT '创建时间',
  `login_time` varchar(100) DEFAULT NULL COMMENT '最近一次登录时间',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '最近一次登录ip',
  `is_login` tinyint(8) DEFAULT NULL COMMENT '是否登陆',
  `status` tinyint(8) DEFAULT NULL COMMENT '启用状态',
  `deviceMAC` varchar(100) DEFAULT NULL COMMENT '设备物理地址',
  `remark` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('4', 'user3', '123', '陈六', '188104641', '', '3', '', '青岛分公司', '秦皇岛分公司', '2016-05-20 20:19:59', '2016-11-22  10:55:32', '127.0.0.1', '1', '1', '02-00-4C-4F-4F-50', '你好1\n');
INSERT INTO `tb_user` VALUES ('13', 'user4', '123', '张四', '137098', null, '5', null, '青岛分公司', '青岛分公司', '2016-05-23 22:13:10', '2016-11-29  10:32:54', '127.0.0.1', '1', '1', '02-00-4C-4F-4F-50', '你好');
INSERT INTO `tb_user` VALUES ('14', 'user5', '123', '王二', '81748', null, '5', null, '高富分公司', '青岛分公司', '2016-05-23 22:14:34', null, null, null, '1', null, '你好');
INSERT INTO `tb_user` VALUES ('16', 'user7', '123', '王星', '1983137082', null, '5', null, '总公司', '青岛分公司', '2016-05-23 22:16:44', '2016-11-22  10:23:36', '127.0.0.1', '0', '1', '0', '你好');

-- ----------------------------
-- Table structure for tb_user_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_admin`;
CREATE TABLE `tb_user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL COMMENT '用户类型：admin,设备员，设备主管，部门领导，老板等等',
  `areaId` varchar(100) DEFAULT NULL COMMENT '所属区域',
  `workshopId` varchar(100) DEFAULT NULL COMMENT '所属车间',
  `factoryId` varchar(100) DEFAULT NULL COMMENT '所属分厂',
  `create_time` varchar(100) DEFAULT NULL COMMENT '创建时间',
  `login_time` varchar(100) DEFAULT NULL COMMENT '最近一次登录时间',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '最近一次登录ip',
  `is_login` tinyint(8) DEFAULT NULL COMMENT '是否登陆',
  `status` tinyint(8) DEFAULT NULL COMMENT '启用状态',
  `deviceMAC` varchar(100) DEFAULT NULL COMMENT '设备物理地址',
  `remark` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user_admin
-- ----------------------------
INSERT INTO `tb_user_admin` VALUES ('18', 'admin', 'admin', 'admin', '18810464129', null, '', null, '青岛分公司', null, null, '2016-11-18  08:55:04', '127.0.0.1', '1', '1', '02-00-4C-4F-4F-50', '');
INSERT INTO `tb_user_admin` VALUES ('19', 'admin2', '123', '测试1', '18810464129', null, '', null, '青岛分公司', null, '2016-11-18', null, null, null, '1', null, '');
