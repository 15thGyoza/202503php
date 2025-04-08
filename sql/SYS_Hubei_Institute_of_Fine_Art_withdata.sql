/*
 Navicat Premium Dump SQL

 Source Server         : docker-local
 Source Server Type    : MySQL
 Source Server Version : 80041 (8.0.41)
 Source Host           : 127.0.0.1:3306
 Source Schema         : SYS_Hubei_Institute_of_Fine_Art

 Target Server Type    : MySQL
 Target Server Version : 80041 (8.0.41)
 File Encoding         : 65001

 Date: 08/04/2025 20:25:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for classes
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '班级id',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '班级名',
  `major_id` int NOT NULL COMMENT '专业id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES (1, '2023级A班', 1);
INSERT INTO `classes` VALUES (2, '2023级B班', 7);
INSERT INTO `classes` VALUES (3, '2023级C班', 4);
INSERT INTO `classes` VALUES (4, '2023级D班', 2);
INSERT INTO `classes` VALUES (5, '2023级E班', 3);
INSERT INTO `classes` VALUES (6, '2023级F班', 5);

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '课程id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '课程名',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of courses
-- ----------------------------
INSERT INTO `courses` VALUES (1, '素描基础');
INSERT INTO `courses` VALUES (2, '油画基础');
INSERT INTO `courses` VALUES (3, '艺术设计');
INSERT INTO `courses` VALUES (4, '设计理论');
INSERT INTO `courses` VALUES (5, '艺术史');
INSERT INTO `courses` VALUES (6, '中国画');
INSERT INTO `courses` VALUES (7, '现代艺术');
INSERT INTO `courses` VALUES (8, '雕塑制作');
INSERT INTO `courses` VALUES (9, '艺术市场与管理');
INSERT INTO `courses` VALUES (10, '插画艺术');
INSERT INTO `courses` VALUES (11, '数字艺术设计');
INSERT INTO `courses` VALUES (12, '摄影艺术');
INSERT INTO `courses` VALUES (13, '陶艺基础');
INSERT INTO `courses` VALUES (14, '环境艺术设计');
INSERT INTO `courses` VALUES (15, '版画艺术');
INSERT INTO `courses` VALUES (16, '摄影后期处理');
INSERT INTO `courses` VALUES (17, '艺术创作与实践');
INSERT INTO `courses` VALUES (18, '美术教育');
INSERT INTO `courses` VALUES (19, '数字媒体艺术');
INSERT INTO `courses` VALUES (20, '美术作品鉴赏');

-- ----------------------------
-- Table structure for majors
-- ----------------------------
DROP TABLE IF EXISTS `majors`;
CREATE TABLE `majors`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '专业id',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '专业名',
  `course_id_1` int NULL DEFAULT NULL COMMENT '课程id1',
  `course_id_2` int NULL DEFAULT NULL COMMENT '课程id2',
  `course_id_3` int NULL DEFAULT NULL COMMENT '课程id3',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of majors
-- ----------------------------
INSERT INTO `majors` VALUES (1, '油画', 5, 15, 18);
INSERT INTO `majors` VALUES (2, '国画', 14, 2, 5);
INSERT INTO `majors` VALUES (3, '雕塑', 4, 11, 7);
INSERT INTO `majors` VALUES (4, '视觉传达', 20, 13, 7);
INSERT INTO `majors` VALUES (5, '环境艺术', 13, 12, 6);
INSERT INTO `majors` VALUES (6, '数字媒体', 20, 5, 1);
INSERT INTO `majors` VALUES (7, '版画', 2, 4, 14);
INSERT INTO `majors` VALUES (8, '艺术设计学', 1, 4, 20);
INSERT INTO `majors` VALUES (9, '艺术教育', 20, 6, 13);
INSERT INTO `majors` VALUES (10, '陶艺', 3, 1, 11);

-- ----------------------------
-- Table structure for scores
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '成绩id',
  `student_id` int NOT NULL COMMENT '学生id',
  `course_id` int NOT NULL COMMENT '课程id',
  `score` double(5, 2) NOT NULL COMMENT '分数',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scores
-- ----------------------------
INSERT INTO `scores` VALUES (1, 1, 5, 85.50);
INSERT INTO `scores` VALUES (2, 1, 15, 78.00);
INSERT INTO `scores` VALUES (3, 2, 14, 92.00);
INSERT INTO `scores` VALUES (4, 2, 2, 88.50);
INSERT INTO `scores` VALUES (5, 3, 4, 75.00);
INSERT INTO `scores` VALUES (6, 4, 5, 83.00);
INSERT INTO `scores` VALUES (7, 5, 1, 67.00);
INSERT INTO `scores` VALUES (8, 6, 6, 90.00);
INSERT INTO `scores` VALUES (9, 7, 7, 80.00);
INSERT INTO `scores` VALUES (10, 8, 8, 91.50);
INSERT INTO `scores` VALUES (11, 9, 9, 70.00);
INSERT INTO `scores` VALUES (12, 10, 10, 88.00);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '学员id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '学员姓名',
  `gender` enum('男','女') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '学员性别',
  `birthday` date NOT NULL COMMENT '学员出生年月日',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '学员地址',
  `class_id` int NOT NULL COMMENT '班级id',
  `major_id` int NOT NULL COMMENT '专业id',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `class_id`(`class_id` ASC) USING BTREE,
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, '张伟', '男', '2000-01-01', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (2, '李娜', '女', '1999-02-02', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (3, '王磊', '男', '2001-03-03', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (4, '赵婷', '女', '2000-04-04', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (5, '刘洋', '男', '1999-05-05', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (6, '陈曦', '女', '2001-06-06', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (7, '杨浩', '男', '2000-07-07', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (8, '孙丽', '女', '1999-08-08', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (9, '周杰', '男', '2001-09-09', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (10, '吴婷', '女', '2000-10-10', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (11, '郑杰', '男', '1999-11-11', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (12, '冯雪', '女', '2001-12-12', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (13, '钱建', '男', '2000-01-13', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (14, '李玲', '女', '1999-02-14', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (15, '王刚', '男', '2001-03-15', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (16, '赵艳', '女', '2000-04-16', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (17, '刘宁', '男', '1999-05-17', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (18, '陈阳', '女', '2001-06-18', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (19, '杨梅', '女', '2000-07-19', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (20, '孙涛', '男', '1999-08-20', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (21, '周丹', '女', '2001-09-21', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (22, '吴璇', '女', '2000-10-22', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (23, '郑成', '男', '1999-11-23', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (24, '冯琪', '女', '2001-12-24', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (25, '钱凤', '女', '2000-01-25', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (26, '李晨', '男', '1999-02-26', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (27, '王平', '男', '2001-03-27', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (28, '赵俊', '男', '2000-04-28', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (29, '刘岩', '男', '1999-05-29', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (30, '陈璐', '女', '2001-06-30', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (31, '杨俊', '男', '2000-07-31', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (32, '孙瑶', '女', '1999-08-01', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (33, '周莹', '女', '2001-09-02', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (34, '吴欣', '女', '2000-10-03', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (35, '郑龙', '男', '1999-11-04', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (36, '冯琳', '女', '2001-12-05', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (37, '钱睿', '男', '2000-01-06', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (38, '李娜', '女', '1999-02-07', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (39, '王凯', '男', '2001-03-08', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (40, '赵珊', '女', '2000-04-09', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (41, '刘宇', '男', '1999-05-10', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (42, '陈丽', '女', '2001-06-11', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (43, '杨光', '男', '2000-07-12', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (44, '孙珍', '女', '1999-08-13', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (45, '周琦', '男', '2001-09-14', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (46, '吴娜', '女', '2000-10-15', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (47, '郑雨', '男', '1999-11-16', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (48, '冯馨', '女', '2001-12-17', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (49, '钱杰', '男', '2000-01-18', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (50, '李阳', '男', '1999-02-19', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (51, '王俊', '男', '2001-03-20', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (52, '赵晴', '女', '2000-04-21', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (53, '刘宇', '男', '1999-05-22', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (54, '陈飞', '男', '2001-06-23', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (55, '杨娟', '女', '2000-07-24', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (56, '孙琪', '男', '1999-08-25', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (57, '周超', '男', '2001-09-26', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (58, '吴俊', '男', '2000-10-27', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (59, '郑秋', '男', '1999-11-28', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (60, '冯琳', '女', '2001-12-29', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (61, '钱娜', '女', '2000-01-30', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (62, '李坤', '男', '1999-02-01', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (63, '王东', '男', '2001-03-02', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (64, '赵波', '男', '2000-04-03', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (65, '刘鹏', '男', '1999-05-04', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (66, '陈瑶', '女', '2001-06-05', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (67, '杨林', '男', '2000-07-06', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (68, '孙悦', '女', '1999-08-07', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (69, '周伟', '男', '2001-09-08', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (70, '吴星', '男', '2000-10-09', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (71, '郑哲', '男', '1999-11-10', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (72, '冯涛', '男', '2001-12-11', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (73, '张欣', '女', '1999-01-01', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (74, '李飞', '男', '2000-02-02', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (75, '王涛', '男', '1998-03-03', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (76, '赵珂', '女', '2001-04-04', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (77, '刘峰', '男', '1999-05-05', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (78, '陈丽', '女', '2000-06-06', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (79, '杨华', '男', '1999-07-07', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (80, '孙梅', '女', '2001-08-08', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (81, '周婷', '女', '1998-09-09', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (82, '吴强', '男', '2000-10-10', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (83, '郑静', '女', '1999-11-11', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (84, '冯宇', '男', '2001-12-12', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (85, '钱菲', '女', '1999-01-13', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (86, '李慧', '女', '2000-02-14', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (87, '王涛', '男', '2001-03-15', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (88, '赵娟', '女', '1998-04-16', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (89, '刘畅', '男', '1999-05-17', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (90, '陈雪', '女', '2000-06-18', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (91, '杨丽', '女', '1999-07-19', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (92, '孙涛', '男', '2001-08-20', '湖北省咸宁市', 2, 2);
INSERT INTO `students` VALUES (93, '周杰', '男', '1998-09-21', '湖北省随州市', 3, 3);
INSERT INTO `students` VALUES (94, '吴瑞', '男', '2000-10-22', '湖北省恩施市', 4, 4);
INSERT INTO `students` VALUES (95, '郑莹', '女', '1999-11-23', '湖北省仙桃市', 5, 5);
INSERT INTO `students` VALUES (96, '冯磊', '男', '2001-12-24', '湖北省荆门市', 6, 6);
INSERT INTO `students` VALUES (97, '钱阳', '男', '1999-01-25', '湖北省武汉市', 1, 1);
INSERT INTO `students` VALUES (98, '李东', '男', '2000-02-26', '湖北省襄阳市', 2, 2);
INSERT INTO `students` VALUES (99, '王静', '女', '2001-03-27', '湖北省黄石市', 3, 3);
INSERT INTO `students` VALUES (100, '赵杨', '男', '1998-04-28', '湖北省荆州市', 4, 4);
INSERT INTO `students` VALUES (101, '刘明', '男', '1999-05-29', '湖北省宜昌市', 5, 5);
INSERT INTO `students` VALUES (102, '陈欣', '女', '2000-06-30', '湖北省鄂州市', 6, 6);
INSERT INTO `students` VALUES (103, '杨峰', '男', '1999-07-01', '湖北省十堰市', 1, 1);
INSERT INTO `students` VALUES (104, '孙琪', '女', '2001-08-02', '湖北省咸宁市', 2, 2);

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '教员id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '教员姓名',
  `gender` enum('男','女') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '教员性别',
  `birthday` date NOT NULL COMMENT '教员出生年月日',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '教员地址',
  `major_id` int NOT NULL COMMENT '教员专业',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `major_id`(`major_id` ASC) USING BTREE,
  CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (1, '张杰', '男', '1980-01-15', '湖北省武汉市', 1);
INSERT INTO `teachers` VALUES (2, '李娜', '女', '1982-02-20', '湖北省襄阳市', 2);
INSERT INTO `teachers` VALUES (3, '王伟', '男', '1979-03-25', '湖北省黄石市', 3);
INSERT INTO `teachers` VALUES (4, '赵梅', '女', '1985-04-10', '湖北省荆州市', 4);
INSERT INTO `teachers` VALUES (5, '刘强', '男', '1980-05-05', '湖北省宜昌市', 5);
INSERT INTO `teachers` VALUES (6, '陈瑶', '女', '1983-06-15', '湖北省鄂州市', 6);
INSERT INTO `teachers` VALUES (7, '杨亮', '男', '1979-07-30', '湖北省十堰市', 7);
INSERT INTO `teachers` VALUES (8, '孙芳', '女', '1981-08-12', '湖北省咸宁市', 8);
INSERT INTO `teachers` VALUES (9, '周轩', '男', '1980-09-01', '湖北省随州市', 9);

SET FOREIGN_KEY_CHECKS = 1;
