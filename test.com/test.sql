/*
 Navicat Premium Data Transfer

 Source Server         : mysql8
 Source Server Type    : MySQL
 Source Server Version : 80012 (8.0.12)
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 80012 (8.0.12)
 File Encoding         : 65001

 Date: 16/01/2024 23:38:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for employers
-- ----------------------------
DROP TABLE IF EXISTS `employers`;
CREATE TABLE `employers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of employers
-- ----------------------------
INSERT INTO `employers` VALUES (1, '123456', '123456', '2024-01-16 03:23:54', '2024-01-16 03:23:54');
INSERT INTO `employers` VALUES (2, '123123', '123123', '2024-01-16 03:37:57', '2024-01-16 03:37:57');
INSERT INTO `employers` VALUES (3, '133133', '133133', '2024-01-16 03:38:23', '2024-01-16 03:38:23');
INSERT INTO `employers` VALUES (4, '144144', '144144', '2024-01-16 03:42:11', '2024-01-16 03:42:11');
INSERT INTO `employers` VALUES (5, '155155', '155155', '2024-01-16 14:49:22', '2024-01-16 14:49:22');

-- ----------------------------
-- Table structure for internship_positions
-- ----------------------------
DROP TABLE IF EXISTS `internship_positions`;
CREATE TABLE `internship_positions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `internship_positions_employer_id_foreign`(`employer_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of internship_positions
-- ----------------------------
INSERT INTO `internship_positions` VALUES (1, 1, 'PHP实习开发工程师', '1、小程序功能、页面优化\r\n2、对接技术团队\r\n3、新零售交易系统\r\n培养计划\r\n培养方向，技术部门骨干成员', 'it', 'photos/wlWPiVY9PAd93wwmx4Xf7SahmhLhmlpYppDjFjpZ.jpg', '2024-01-16 09:04:23', '2024-01-16 13:48:56');
INSERT INTO `internship_positions` VALUES (2, 1, 'java实习生', '本岗位培养公司未来梯队！只考虑全日制二本以上，研究生\r\n不考虑短期实习，请勿投！\r\n负责系统的后端开发工作。\r\n要求：\r\n熟悉Java，MySQL 数据库相关基础知识和开发\r\n2024、5年毕业，本科以上学历；\r\n计算机科学与技术、软件工程、物联网、大数据等计算机、数学相关专业', 'it', 'photos/9aDVKxQzEloUsxGQoyAnmSmBB5VNlfFZ0hv3SWAH.jpg', '2024-01-16 09:05:34', '2024-01-16 09:05:34');
INSERT INTO `internship_positions` VALUES (3, 1, '会计实习', '毕业时间：2023年 招聘截止日期：2023.02.28\r\n\r\n工作时间：8:45-12:00 13:30-17:30 周末双休 \r\n岗位职责：\r\n1、协助进行企业日常收支、基本账务的管理和核对；\r\n2、收集、审核原始凭证，保证报销手续及原始单据的合法性、准确性；\r\n3、对单据等记账凭证进行编号、装订、整理及归档；\r\n4、完成上级布置的任务。\r\n任职要求：\r\n1、大专或以上学历，财会类相关专业，持有会计相关资格证书优先；\r\n2、了解会计、税务法规和财务软件、熟练操作Excel等办公软件；\r\n3、为人正直，责任心强，作风谨慎，工作仔细认真。', 'accounting', 'photos/QFQwMS2CVv0em7kDhDAH5XFw0a0gKJR3EOckAMqd.jpg', '2024-01-16 09:11:19', '2024-01-16 09:11:19');
INSERT INTO `internship_positions` VALUES (4, 1, '金融实习生', '中央金融工作会议中“金融强国”概念首次提出，表明金融在整个国民经济中的作用和地位愈发重要，未来金融将作为一股中坚力量走向中心。公司为了更好的发展，现向各高校优秀人才提供实习岗位，补充行政、市场、运营、风控等部门，招聘内容如下：\r\n1. 招收对象：高校2024年毕业生；\r\n2. 专业要求：中文、工商管理、财政金融、经济学、会计审计、财务管理、市场营销、法学等相关专业；本科以上学历；有组织社区活动、担任学生会干部或学习成绩优秀者优先。\r\n3. 实习要求：连续实习6个月以上。\r\n4. 实习补助：100-200一天，只要够优秀，均可谈。\r\n5. 实习地点：南昌。\r\n6、实习要求：工作积极、具有良好人际关系、沟通能力、组织能力；具有团队合作意识，责任心强，工作细致；熟练运用word、excel等办公软件。', 'business', 'photos/YzcwzHdbAfyqKysehns5HMnKHg7rrusFbxwzFLRi.jpg', '2024-01-16 09:12:21', '2024-01-16 09:12:21');
INSERT INTO `internship_positions` VALUES (5, 1, 'php实习', '负责后端产品开发的工作，熟悉php，熟悉php开发框架，掌握mysql数据库开发技术，性格开朗，工作积极主动', 'it', 'photos/0GdT5864YgtvR2t37NWzsZmvourIe0JwSMuuN2WM.jpg', '2024-01-16 09:15:54', '2024-01-16 09:15:54');
INSERT INTO `internship_positions` VALUES (6, 1, '招聘PHP实习生应届毕业生', '岗位职责\r\n1熟悉LNMP（Linux+Nginx+Mysql+PHP）运行架构，熟悉html、css、jQuery\r\n熟悉PHP 会使用thinkPHP\r\n2.参与项目立项会，根据项目文档进行技术开发；\r\n3.参与需求文档撰写，并完成相关业务流程；\r\n任职要求\r\n1.本科及以上学历，计算机相关专业优先；\r\n2.必须对PHP有基本的认知，读过PHP文档，熟悉PHP函数并实际练习过；\r\n3.阅读过文档同时自己练习过代码；\r\n4.会写基本的sql语句，熟练使用MySQL；\r\n5.具有良好的自学能力和独立解决问题的能力;\r\n公司福利：\r\n正式录用后购买【五险一金】（养老、医疗、工伤、失业、生育、公积金）', 'it', 'photos/7lNvDUmY1uJTGgYilZy5y0ztJL5WA3O92IFiAkTU.jpg', '2024-01-16 09:24:07', '2024-01-16 09:24:07');
INSERT INTO `internship_positions` VALUES (7, 1, 'PHP实习', '精通PHP，熟悉面向对象思想(OOP)，在开发中灵活应用面向对象；\r\n熟悉主流开发框架，有框架开发经验优先考虑。\r\n精通SQL和数据结构，具有数据库设计和调优经验，有大数据量优化经验和较强的优化意识；\r\n​至少熟悉另外一种语言：JavaScript/Python/Go/Java/C/C++等。', 'it', 'photos/RHDSEW5OzGt2JF10VTuYjKQolu5fok07na2yDf00.jpg', '2024-01-16 09:32:35', '2024-01-16 09:32:35');
INSERT INTO `internship_positions` VALUES (8, 1, 'Python爬虫实习生', '1.爬取一些新闻信息处理并分析\r\n2.一到三个月实习期，有能力的优先转正\r\n3.法定工作日，朝九晚六\r\n4.实习生需要全职\r\n培养计划\r\n有能力者按管理层培养', 'it', 'photos/28QgzkszJDquJSigdg69XNgzBWkiU0xykiDCKBKE.jpg', '2024-01-16 13:55:06', '2024-01-16 13:55:06');
INSERT INTO `internship_positions` VALUES (9, 1, '全栈开发工程师 实习', '1、全栈，前后端都需要做；\r\n2、软件开发专业，具备基本的专业知识，操作能力；\r\n3、计算机原理、操作系统原理、数据库原理、算法、数据结构，java, javascript，JS，数据库、高数等课程，学的比较好。\r\n优先条件\r\n1、熟悉jquery、easyui、SSM框架、java开发语言、oracle，springMVC，基础的html，js知识(能写js函数，使用ajax调用接口等)。\r\n2、有实际项目经验的优先。\r\n备注说明\r\n1、有无实际工作经验均可，欢迎应届毕业生加入；\r\n2、面试通过后，进入实习期，有同事专人指导；\r\n3、前期协助同事开发，修改BUG，后期做简单的模块开发。根据技术能力安排', 'it', 'photos/QPwySSo2D4mekKzvqHoDfVATaJgLeEAVftK3BY3k.jpg', '2024-01-16 13:57:23', '2024-01-16 14:39:45');
INSERT INTO `internship_positions` VALUES (10, 5, '123123123456465', '123123456465645', 'business', 'photos/SyWQY43k9Ii4KtXalwGxwfbdqHtixnaPBUtf8x03.jpg', '2024-01-16 14:49:47', '2024-01-16 14:49:54');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2024_01_16_015938_create_employers_table', 1);
INSERT INTO `migrations` VALUES (2, '2024_01_16_021449_create_internship_positions_table', 2);

SET FOREIGN_KEY_CHECKS = 1;
