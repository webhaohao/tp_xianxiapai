/*
DataBase Version: 0.1
Be used For Pretty Vendor
Date: 2019-12-08 20:16:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) DEFAULT NULL COMMENT 'Banner描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', '首页置顶', '首页轮播图', null, null);
INSERT INTO `banner` VALUES ('2', '新鲜置顶', '新鲜轮播图', null, null);
INSERT INTO `banner` VALUES ('3', '体育圈置顶', '体育圈轮播图', null, null);
-- ----------------------------
-- Table structure for banner_item
-- ----------------------------
DROP TABLE IF EXISTS `banner_item`;
CREATE TABLE `banner_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '外键，关联image表',
  `key_word` varchar(100) NOT NULL COMMENT '执行关键字，根据不同的type含义不同',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '跳转类型，可能导向商品，可能导向专题，可能导向其他。0，无导向；1：导向商品;2:导向专题',
  `delete_time` int(11) DEFAULT NULL,
  `banner_id` int(11) NOT NULL COMMENT '外键，关联banner表',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='banner子项表';

-- ----------------------------
-- Records of banner_item
-- ----------------------------
INSERT INTO `banner_item` VALUES ('1', '65', '6', '1', null, '1', null);
INSERT INTO `banner_item` VALUES ('2', '2', '25', '1', null, '1', null);
INSERT INTO `banner_item` VALUES ('3', '3', '11', '1', null, '1', null);
INSERT INTO `banner_item` VALUES ('5', '1', '10', '1', null, '1', null);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `topic_img_id` int(11) DEFAULT NULL COMMENT '外键，关联image表',
  `activity_type_id` int(11) DEFAULT NULL COMMENT '大活动类型',
  `delete_time` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL COMMENT '描述',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='商品类目';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('2', '美术', '6','3', null, null, null);
INSERT INTO `category` VALUES ('3', '游戏', '5','3', null, null, null);
INSERT INTO `category` VALUES ('4', '娱乐', '7','3', null, null, null);
INSERT INTO `category` VALUES ('5', '交友', '4','4', null, null, null);
INSERT INTO `category` VALUES ('6', '旅游', '8','4', null, null, null);
INSERT INTO `category` VALUES ('7', '学习', '9','4', null, null, null);
INSERT INTO `category` VALUES ('8', '美术', '6','2', null, null, null);
INSERT INTO `category` VALUES ('9', '游戏', '5','2', null, null, null);
INSERT INTO `category` VALUES ('10', '娱乐', '7','2', null, null, null);
INSERT INTO `category` VALUES ('11', '交友', '4','2', null, null, null);
INSERT INTO `category` VALUES ('12', '旅游', '8','2', null, null, null);
INSERT INTO `category` VALUES ('13', '学习', '9','2', null, null, null);
-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '图片路径',
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 来自本地，2 来自公网',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COMMENT='图片总表';

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', '/banner-1a.png', '1', null, null);
INSERT INTO `image` VALUES ('2', '/banner-2a.png', '1', null, null);
INSERT INTO `image` VALUES ('3', '/banner-3a.png', '1', null, null);
INSERT INTO `image` VALUES ('4', '/category-cake.png', '1', null, null);
INSERT INTO `image` VALUES ('5', '/category-vg.png', '1', null, null);
INSERT INTO `image` VALUES ('6', '/category-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('7', '/category-fry-a.png', '1', null, null);
INSERT INTO `image` VALUES ('8', '/category-tea.png', '1', null, null);
INSERT INTO `image` VALUES ('9', '/category-rice.png', '1', null, null);
INSERT INTO `image` VALUES ('10', '/product-dryfruit@1.png', '1', null, null);
INSERT INTO `image` VALUES ('13', '/product-vg@1.png', '1', null, null);
INSERT INTO `image` VALUES ('14', '/product-rice@6.png', '1', null, null);
INSERT INTO `image` VALUES ('16', '/1@theme.png', '1', null, null);
INSERT INTO `image` VALUES ('17', '/2@theme.png', '1', null, null);
INSERT INTO `image` VALUES ('18', '/3@theme.png', '1', null, null);
INSERT INTO `image` VALUES ('19', '/detail-1@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('20', '/detail-2@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('21', '/detail-3@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('22', '/detail-4@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('23', '/detail-5@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('24', '/detail-6@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('25', '/detail-7@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('26', '/detail-8@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('27', '/detail-9@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('28', '/detail-11@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('29', '/detail-10@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('31', '/product-rice@1.png', '1', null, null);
INSERT INTO `image` VALUES ('32', '/product-tea@1.png', '1', null, null);
INSERT INTO `image` VALUES ('33', '/product-dryfruit@2.png', '1', null, null);
INSERT INTO `image` VALUES ('36', '/product-dryfruit@3.png', '1', null, null);
INSERT INTO `image` VALUES ('37', '/product-dryfruit@4.png', '1', null, null);
INSERT INTO `image` VALUES ('38', '/product-dryfruit@5.png', '1', null, null);
INSERT INTO `image` VALUES ('39', '/product-dryfruit-a@6.png', '1', null, null);
INSERT INTO `image` VALUES ('40', '/product-dryfruit@7.png', '1', null, null);
INSERT INTO `image` VALUES ('41', '/product-rice@2.png', '1', null, null);
INSERT INTO `image` VALUES ('42', '/product-rice@3.png', '1', null, null);
INSERT INTO `image` VALUES ('43', '/product-rice@4.png', '1', null, null);
INSERT INTO `image` VALUES ('44', '/product-fry@1.png', '1', null, null);
INSERT INTO `image` VALUES ('45', '/product-fry@2.png', '1', null, null);
INSERT INTO `image` VALUES ('46', '/product-fry@3.png', '1', null, null);
INSERT INTO `image` VALUES ('47', '/product-tea@2.png', '1', null, null);
INSERT INTO `image` VALUES ('48', '/product-tea@3.png', '1', null, null);
INSERT INTO `image` VALUES ('49', '/1@theme-head.png', '1', null, null);
INSERT INTO `image` VALUES ('50', '/2@theme-head.png', '1', null, null);
INSERT INTO `image` VALUES ('51', '/3@theme-head.png', '1', null, null);
INSERT INTO `image` VALUES ('52', '/product-cake@1.png', '1', null, null);
INSERT INTO `image` VALUES ('53', '/product-cake@2.png', '1', null, null);
INSERT INTO `image` VALUES ('54', '/product-cake-a@3.png', '1', null, null);
INSERT INTO `image` VALUES ('55', '/product-cake-a@4.png', '1', null, null);
INSERT INTO `image` VALUES ('56', '/product-dryfruit@8.png', '1', null, null);
INSERT INTO `image` VALUES ('57', '/product-fry@4.png', '1', null, null);
INSERT INTO `image` VALUES ('58', '/product-fry@5.png', '1', null, null);
INSERT INTO `image` VALUES ('59', '/product-rice@5.png', '1', null, null);
INSERT INTO `image` VALUES ('60', '/product-rice@7.png', '1', null, null);
INSERT INTO `image` VALUES ('62', '/detail-12@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('63', '/detail-13@1-dryfruit.png', '1', null, null);
INSERT INTO `image` VALUES ('65', '/banner-4a.png', '1', null, null);
INSERT INTO `image` VALUES ('66', '/product-vg@4.png', '1', null, null);
INSERT INTO `image` VALUES ('67', '/product-vg@5.png', '1', null, null);
INSERT INTO `image` VALUES ('68', '/product-vg@2.png', '1', null, null);
INSERT INTO `image` VALUES ('69', '/product-vg@3.png', '1', null, null);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `user_id` int(11) NOT NULL COMMENT '外键，用户id，注意并不是openid',
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:未支付， 2：已支付，3：已发货 , 4: 已支付，但库存不足',
  `snap_img` varchar(255) DEFAULT NULL COMMENT '订单快照图片',
  `snap_name` varchar(80) DEFAULT NULL COMMENT '订单快照名称',
  `total_count` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) DEFAULT NULL,
  `snap_items` text COMMENT '订单其他信息快照（json)',
  `snap_address` varchar(500) DEFAULT NULL COMMENT '地址快照',
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=539 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for order_product
-- ----------------------------
DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL COMMENT '联合主键，订单id',
  `product_id` int(11) NOT NULL COMMENT '联合主键，商品id',
  `count` int(11) NOT NULL COMMENT '商品数量',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order_product
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '商品名称',
  `price` decimal(6,2) NOT NULL COMMENT '价格,单位：分',
  `stock` int(11) NOT NULL DEFAULT '0' COMMENT '库存量',
  `delete_time` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `main_img_url` varchar(255) DEFAULT NULL COMMENT '主图ID号，这是一个反范式设计，有一定的冗余',
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '图片来自 1 本地 ，2公网',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  `summary` varchar(50) DEFAULT NULL COMMENT '摘要',
  `img_id` int(11) DEFAULT NULL COMMENT '图片外键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '芹菜 半斤', '0.01', '998', null, '3', '/product-vg@1.png', '1', null, null, null, '13');
INSERT INTO `product` VALUES ('2', '梨花带雨 3个', '0.01', '984', null, '2', '/product-dryfruit@1.png', '1', null, null, null, '10');
INSERT INTO `product` VALUES ('3', '素米 327克', '0.01', '996', null, '7', '/product-rice@1.png', '1', null, null, null, '31');
INSERT INTO `product` VALUES ('4', '红袖枸杞 6克*3袋', '0.01', '998', null, '6', '/product-tea@1.png', '1', null, null, null, '32');
INSERT INTO `product` VALUES ('5', '春生龙眼 500克', '0.01', '995', null, '2', '/product-dryfruit@2.png', '1', null, null, null, '33');
INSERT INTO `product` VALUES ('6', '小红的猪耳朵 120克', '0.01', '997', null, '5', '/product-cake@2.png', '1', null, null, null, '53');
INSERT INTO `product` VALUES ('7', '泥蒿 半斤', '0.01', '998', null, '3', '/product-vg@2.png', '1', null, null, null, '68');
INSERT INTO `product` VALUES ('8', '夏日芒果 3个', '0.01', '995', null, '2', '/product-dryfruit@3.png', '1', null, null, null, '36');
INSERT INTO `product` VALUES ('9', '冬木红枣 500克', '0.01', '996', null, '2', '/product-dryfruit@4.png', '1', null, null, null, '37');
INSERT INTO `product` VALUES ('10', '万紫千凤梨 300克', '0.01', '996', null, '2', '/product-dryfruit@5.png', '1', null, null, null, '38');
INSERT INTO `product` VALUES ('11', '贵妃笑 100克', '0.01', '994', null, '2', '/product-dryfruit-a@6.png', '1', null, null, null, '39');
INSERT INTO `product` VALUES ('12', '珍奇异果 3个', '0.01', '999', null, '2', '/product-dryfruit@7.png', '1', null, null, null, '40');
INSERT INTO `product` VALUES ('13', '绿豆 125克', '0.01', '999', null, '7', '/product-rice@2.png', '1', null, null, null, '41');
INSERT INTO `product` VALUES ('14', '芝麻 50克', '0.01', '999', null, '7', '/product-rice@3.png', '1', null, null, null, '42');
INSERT INTO `product` VALUES ('15', '猴头菇 370克', '0.01', '999', null, '7', '/product-rice@4.png', '1', null, null, null, '43');
INSERT INTO `product` VALUES ('16', '西红柿 1斤', '0.01', '999', null, '3', '/product-vg@3.png', '1', null, null, null, '69');
INSERT INTO `product` VALUES ('17', '油炸花生 300克', '0.01', '999', null, '4', '/product-fry@1.png', '1', null, null, null, '44');
INSERT INTO `product` VALUES ('18', '春泥西瓜子 128克', '0.01', '997', null, '4', '/product-fry@2.png', '1', null, null, null, '45');
INSERT INTO `product` VALUES ('19', '碧水葵花籽 128克', '0.01', '999', null, '4', '/product-fry@3.png', '1', null, null, null, '46');
INSERT INTO `product` VALUES ('20', '碧螺春 12克*3袋', '0.01', '999', null, '6', '/product-tea@2.png', '1', null, null, null, '47');
INSERT INTO `product` VALUES ('21', '西湖龙井 8克*3袋', '0.01', '998', null, '6', '/product-tea@3.png', '1', null, null, null, '48');
INSERT INTO `product` VALUES ('22', '梅兰清花糕 1个', '0.01', '997', null, '5', '/product-cake-a@3.png', '1', null, null, null, '54');
INSERT INTO `product` VALUES ('23', '清凉薄荷糕 1个', '0.01', '998', null, '5', '/product-cake-a@4.png', '1', null, null, null, '55');
INSERT INTO `product` VALUES ('25', '小明的妙脆角 120克', '0.01', '999', null, '5', '/product-cake@1.png', '1', null, null, null, '52');
INSERT INTO `product` VALUES ('26', '红衣青瓜 混搭160克', '0.01', '999', null, '2', '/product-dryfruit@8.png', '1', null, null, null, '56');
INSERT INTO `product` VALUES ('27', '锈色瓜子 100克', '0.01', '998', null, '4', '/product-fry@4.png', '1', null, null, null, '57');
INSERT INTO `product` VALUES ('28', '春泥花生 200克', '0.01', '999', null, '4', '/product-fry@5.png', '1', null, null, null, '58');
INSERT INTO `product` VALUES ('29', '冰心鸡蛋 2个', '0.01', '999', null, '7', '/product-rice@5.png', '1', null, null, null, '59');
INSERT INTO `product` VALUES ('30', '八宝莲子 200克', '0.01', '999', null, '7', '/product-rice@6.png', '1', null, null, null, '14');
INSERT INTO `product` VALUES ('31', '深涧木耳 78克', '0.01', '999', null, '7', '/product-rice@7.png', '1', null, null, null, '60');
INSERT INTO `product` VALUES ('32', '土豆 半斤', '0.01', '999', null, '3', '/product-vg@4.png', '1', null, null, null, '66');
INSERT INTO `product` VALUES ('33', '青椒 半斤', '0.01', '999', null, '3', '/product-vg@5.png', '1', null, null, null, '67');

-- ----------------------------
-- Table structure for product_image
-- ----------------------------
DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '外键，关联图片表',
  `delete_time` int(11) DEFAULT NULL COMMENT '状态，主要表示是否删除，也可以扩展其他状态',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '图片排序序号',
  `product_id` int(11) NOT NULL COMMENT '商品id，外键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product_image
-- ----------------------------
INSERT INTO `product_image` VALUES ('4', '19', null, '1', '11');
INSERT INTO `product_image` VALUES ('5', '20', null, '2', '11');
INSERT INTO `product_image` VALUES ('6', '21', null, '3', '11');
INSERT INTO `product_image` VALUES ('7', '22', null, '4', '11');
INSERT INTO `product_image` VALUES ('8', '23', null, '5', '11');
INSERT INTO `product_image` VALUES ('9', '24', null, '6', '11');
INSERT INTO `product_image` VALUES ('10', '25', null, '7', '11');
INSERT INTO `product_image` VALUES ('11', '26', null, '8', '11');
INSERT INTO `product_image` VALUES ('12', '27', null, '9', '11');
INSERT INTO `product_image` VALUES ('13', '28', null, '11', '11');
INSERT INTO `product_image` VALUES ('14', '29', null, '10', '11');
INSERT INTO `product_image` VALUES ('18', '62', null, '12', '11');
INSERT INTO `product_image` VALUES ('19', '63', null, '13', '11');

-- ----------------------------
-- Table structure for product_property
-- ----------------------------
DROP TABLE IF EXISTS `product_property`;
CREATE TABLE `product_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '详情属性名称',
  `detail` varchar(255) NOT NULL COMMENT '详情属性',
  `product_id` int(11) NOT NULL COMMENT '商品id，外键',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product_property
-- ----------------------------
INSERT INTO `product_property` VALUES ('1', '品名', '杨梅', '11', null, null);
INSERT INTO `product_property` VALUES ('2', '口味', '青梅味 雪梨味 黄桃味 菠萝味', '11', null, null);
INSERT INTO `product_property` VALUES ('3', '产地', '火星', '11', null, null);
INSERT INTO `product_property` VALUES ('4', '保质期', '180天', '11', null, null);
INSERT INTO `product_property` VALUES ('5', '品名', '梨子', '2', null, null);
INSERT INTO `product_property` VALUES ('6', '产地', '金星', '2', null, null);
INSERT INTO `product_property` VALUES ('7', '净含量', '100g', '2', null, null);
INSERT INTO `product_property` VALUES ('8', '保质期', '10天', '2', null, null);

-- ----------------------------
-- Table structure for theme
-- ----------------------------
DROP TABLE IF EXISTS `theme`;
CREATE TABLE `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '专题名称',
  `description` varchar(255) DEFAULT NULL COMMENT '专题描述',
  `topic_img_id` int(11) NOT NULL COMMENT '主题图，外键',
  `delete_time` int(11) DEFAULT NULL,
  `head_img_id` int(11) NOT NULL COMMENT '专题列表页，头图',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='主题信息表';

-- ----------------------------
-- Records of theme
-- ----------------------------
INSERT INTO `theme` VALUES ('1', '专题栏位一', '美味水果世界', '16', null, '49', null);
INSERT INTO `theme` VALUES ('2', '专题栏位二', '新品推荐', '17', null, '50', null);
INSERT INTO `theme` VALUES ('3', '专题栏位三', '做个干物女', '18', null, '18', null);

-- ----------------------------
-- Table structure for theme_product
-- ----------------------------
DROP TABLE IF EXISTS `theme_product`;
CREATE TABLE `theme_product` (
  `theme_id` int(11) NOT NULL COMMENT '主题外键',
  `product_id` int(11) NOT NULL COMMENT '商品外键',
  PRIMARY KEY (`theme_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='主题所包含的商品';

-- ----------------------------
-- Records of theme_product
-- ----------------------------
INSERT INTO `theme_product` VALUES ('1', '2');
INSERT INTO `theme_product` VALUES ('1', '5');
INSERT INTO `theme_product` VALUES ('1', '8');
INSERT INTO `theme_product` VALUES ('1', '10');
INSERT INTO `theme_product` VALUES ('1', '12');
INSERT INTO `theme_product` VALUES ('2', '1');
INSERT INTO `theme_product` VALUES ('2', '2');
INSERT INTO `theme_product` VALUES ('2', '3');
INSERT INTO `theme_product` VALUES ('2', '5');
INSERT INTO `theme_product` VALUES ('2', '6');
INSERT INTO `theme_product` VALUES ('2', '16');
INSERT INTO `theme_product` VALUES ('2', '33');
INSERT INTO `theme_product` VALUES ('3', '15');
INSERT INTO `theme_product` VALUES ('3', '18');
INSERT INTO `theme_product` VALUES ('3', '19');
INSERT INTO `theme_product` VALUES ('3', '27');
INSERT INTO `theme_product` VALUES ('3', '30');
INSERT INTO `theme_product` VALUES ('3', '31');

-- ----------------------------
-- Table structure for third_app
-- ----------------------------
DROP TABLE IF EXISTS `third_app`;
CREATE TABLE `third_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(64) NOT NULL COMMENT '应用app_id',
  `app_secret` varchar(64) NOT NULL COMMENT '应用secret',
  `app_description` varchar(100) DEFAULT NULL COMMENT '应用程序描述',
  `scope` varchar(20) NOT NULL COMMENT '应用权限',
  `scope_description` varchar(100) DEFAULT NULL COMMENT '权限描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='访问API的各应用账号密码表';

-- ----------------------------
-- Records of third_app
-- ----------------------------
INSERT INTO `third_app` VALUES ('1', 'xianxiapai', 'xianxiapai666', 'CMS', '32', 'Super', null, null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `integral` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for user_address
-- ----------------------------
DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '收获人姓名',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `country` varchar(20) DEFAULT NULL COMMENT '区',
  `detail` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `delete_time` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT '外键',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_address
-- ----------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE  `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL COMMENT '活动标题',
  `start_time` int(11) NOT NULL COMMENT '开始时间',
  `end_time` int(11) NOT NULL COMMENT '结束时间',
  `location` varchar(20) NOT NULL COMMENT '活动地点',
  `number` varchar(20) NOT NULL COMMENT '人数',
  `detail` longtext NOT NULL COMMENT '详情',
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `release_id` int(11) NOT NULL COMMENT '外键',
  `category_id` int(11) NOT NULL COMMENT '类别',
  `activity_type_id` int(11) NOT NULL COMMENT '活动类别',
  `img_id` int(11) DEFAULT NULL COMMENT '图片外键',
  `scope` int(11) NOT NULL COMMENT '权限，谁发的活动',
  `integral` int(11) NOT NULL COMMENT  '积分',
  `join_people` int(11) NOT NULL DEFAULT '0' COMMENT '参加的人数',
  `main_img_url` varchar(255) DEFAULT NULL COMMENT '主图ID号，这是一个反范式设计，有一定的冗余',
  `update_time` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'  COMMENT '活动状态 0 未开始, 1 已开始',
  PRIMARY KEY (`id`)
--   UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
INSERT INTO `activity` (`id`, `title`, `start_time`, `end_time`, `location`, `number`, `detail`, `delete_time`, `create_time`, `release_id`, `category_id`, `activity_type_id`, `img_id`, `scope`, `integral`, `join_people`, `main_img_url`, `update_time`) VALUES
(35, '模式口庙会', 1579612020, 1579705620, '模式口', '50', '模式口祈福哦', NULL, 1579612117, 65, 27, 2, NULL, 16, 10, 0, '/20200121/901a04750087cbf36985f12f61652dfe.jpg', 1579612117),
(36, '颐和园看雪', 1579612020, 1579871220, '颐和园', '50', '去颐和园看雪啦', NULL, 1579612239, 65, 27, 2, NULL, 16, 10, 0, '/20200121/7fd94e1e011d7f4b94c4db10d45c2312.jpg', 1579612239);

-- ----------------------------
-- Table structure for activity_image
-- ----------------------------
DROP TABLE IF EXISTS `activity_image`;
CREATE TABLE `activity_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '外键，关联图片表',
  `delete_time` int(11) DEFAULT NULL COMMENT '状态，主要表示是否删除，也可以扩展其他状态',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '图片排序序号',
  `activity_id` int(11) NOT NULL COMMENT '活动id，外键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of activity_image
-- ----------------------------
-- ----------------------------
-- Table structure for user_activity
-- ----------------------------
DROP TABLE IF EXISTS ` user_activity`;
CREATE TABLE `user_activity` (
  `user_id` int(11) NOT NULL COMMENT '联合主键，用户id',
  `activity_id` int(11) NOT NULL COMMENT '联合主键，活动id',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of  user_activity
-- ----------------------------



-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;

CREATE TABLE  `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL COMMENT '新闻标题',
  `abstract` varchar(100) NOT NULL COMMENT '新闻摘要',
  `detail` varchar(100) NOT NULL COMMENT '新闻详情',
  `delete_time` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL COMMENT '类别',
  `img_id` int(11) DEFAULT NULL COMMENT '图片外键',
  `main_img_url` varchar(255) DEFAULT NULL COMMENT '主图ID号，这是一个反范式设计，有一定的冗余',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
--   UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
-- ----------------------------
-- Records of  news
-- ----------------------------


-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;

CREATE TABLE  `news_category` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `topic_img_id` int(11) DEFAULT NULL COMMENT '外键，关联image表',
  `delete_time` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL COMMENT '描述',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
--   UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


INSERT INTO `news_category` VALUES ('2', '美术', '6', null, null, null);
INSERT INTO `news_category` VALUES ('3', '游戏', '5', null, null, null);
INSERT INTO `news_category` VALUES ('4', '娱乐', '7', null, null, null);
INSERT INTO `news_category` VALUES ('5', '交友', '4', null, null, null);
INSERT INTO `news_category` VALUES ('6', '旅游', '8', null, null, null);
INSERT INTO `news_category` VALUES ('7', '学习', '9', null, null, null);
-- ----------------------------
-- Records of  news
-- ----------------------------


-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;

CREATE TABLE  `about` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `delete_time` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL COMMENT '描述',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
INSERT INTO `about` (`id`, `delete_time`, `description`, `update_time`) VALUES
(35, NULL, '<p>线下派是一个活动整合平台，由法大同学创立，主要用来发起和参与个人活动，可以随时随地发起和参加自己感兴趣的健康活动。在线下派，你可以：</p>\n<ol>\n<li>1. 发起和参与个人组织的形式多样的健康线下活动；</li>\n<li>2. 参加线下派或线下派与社团组织举办的部门活动；</li>\n<li>3. 加入线下派运动圈，享受场地、物资报销以及免费兴趣教练；</li>\n<li>4. 参与活动获得积分兑换丰厚礼品！</li>\n</ol>\n<p>&nbsp;</p>\n<p>大家也可以加入线下派活动微信群，线小派会时不时在群里发活动咨询和红包哦！</p>\n<p>线小派微信：Xianxp666</p>', NULL);
-- ----------------------------
-- Records of  about
-- ----------------------------


-- ----------------------------
-- Table structure for activity_type
-- ----------------------------
DROP TABLE IF EXISTS `activity_type`;

CREATE TABLE  `activity_type` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL COMMENT '描述',
  `scope` int(11) DEFAULT NULL COMMENT '活动权限',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO `activity_type` VALUES ('2', '个人活动', '个人发起的活动',16, null, null);
INSERT INTO `activity_type` VALUES ('3', '部门活动', '管理员发的活动',24, null, null);
INSERT INTO `activity_type` VALUES ('4', '体育圈', '体育部发布的活动',32, null, null);
-- ----------------------------
-- Records of  activity_type
-- ----------------------------

-- ----------------------------
-- Table structure for user_agreement
-- ----------------------------
DROP TABLE IF EXISTS `user_agreement`;

CREATE TABLE  `user_agreement` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `delete_time` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL COMMENT '描述',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_agreement` (`id`, `delete_time`, `description`, `update_time`) VALUES
(35, NULL, '<p>您好！欢迎您使用&ldquo;线下派&rdquo;微信小程序（以下简称&ldquo;小程序&rdquo;）</p>\n<p>&nbsp;</p>\n<p>1.特别提示</p>\n<p>1.1为了更好地为您提供服务，请您仔细阅读这份协议。本协议是您与小程序就您登录小程序平台进行注册及使用等所涉及的全部行为所订立的权利义务规范。您在注册过程中点击&ldquo;微信同意授权&rdquo;等按钮、及注册后登录和使用时，均表明您已完全同意并接受本协议，愿意遵守本协议的各项规则、规范的全部内容，若不同意则可停止注册或使用小程序平台。</p>\n<p>1.2为提高用户的使用感受和满意度，用户同意小程序将基于用户的操作行为对用户数据进行调查研究和分析，从而进一步优化服务。</p>\n<p>&nbsp;</p>\n<p>2.服务内容</p>\n<p>2.1小程序是一个专注于校内同学的活动整合平台，平台内严禁一切非法、涉黄信息，违反社区运营规范者，一律封号处理。</p>\n<p>2.2 小程序服务的具体内容由小程序开发者与制作者根据实际情况提供。</p>\n<p>2.3 除非本注册及服务协议另有其它明示规定，小程序所推出的新功能、新服务，均受到本注册及注册协议规范。小程序仅提供相关的网络服务，除此之外与相关网络服务有关的设备(如手机及其他与接入互联网或移动网有关的装置)及所需的费用(如为接入互联网而支付的电话费及上网费、为使用移动网而支付的手机费等)均应由用户自行负担。</p>\n<p>&nbsp;</p>\n<p>3.使用规则</p>\n<p>3.1 使用小程序系统注册的用户，应使用微信号授权登录并提供手机号用以发送验证码，以达到实名认证的目的。用户注册时手机应该保持接受短信畅通。</p>\n<p>3.2 用户请勿注册涉嫌违法或侵犯他人合法权益以及不文明、不健康的用户名称，或使用包含歧视、侮辱、猥亵类词语的账号；用户因违反上述行为所产生的法律责任完全由用户本人承担，小程序若发现则会采取封号处理。</p>\n<p>3.3用户小程序账号的所有权归小程序，用户仅享有使用权。</p>\n<p>3.4用户有义务保证密码和账号的安全，用户利用该密码和账号所进行的一切活动引起的任何损失或损害，由用户自行承担全部责任，小程序不承担任何责任。如用户发现账号遭到未授权的使用或发生其他任何安全问题，应立即修改微信账号密码并妥善保管，如有必要，请反馈通知小程序管理人员。因黑客行为或用户的保管疏忽导致账号非法使用，小程序不承担任何责任。</p>\n<p>3.5 用户承诺对其发表或者上传于小程序的所有活动信息(即属于《中华人民共和国著作权法》规定的作品，包括但不限于文字、图片、音乐、电影、表演和录音录像制品和电脑程序等)均享有完整的知识产权，或者已经得到相关权利人的合法授权；如用户违反本条规定造成小程序被第三人索赔的，用户应全额补偿小程序的一切费用(包括但不限于各种赔偿费、诉讼代理费及为此支出的其它合理费用)；</p>\n<p>3.6当第三方认为用户发表或者上传于小程序的信息侵犯其权利，并根据《信息网络传播权保护条例》或者相关法律规定向小程序发送权利通知书时，用户同意小程序可以自行判断决定删除涉嫌侵权信息，除非用户提交书面证据材料排除侵权的可能性，小程序将不会自动恢复上述删除的信息；</p>\n<p>3.7</p>\n<p>(1)不得为任何非法目的而使用小程序系统；</p>\n<p>(2)遵守所有与网络服务有关的网络协议、规定和程序；</p>\n<p>(3)不得利用小程序的服务进行任何可能对互联网的正常运转造成不利影响的行为；</p>\n<p>(4)不得利用小程序服务进行任何不利于小程序的行为。</p>\n<p>如用户在使用网络服务时违反上述任何规定，小程序有权要求用户改正或直接采取一切必要的措施(包括但不限于删除用户发布的活动、暂停或终止用户使用网络服务的权利)以减轻用户不当行为而造成的影响。</p>\n<p>&nbsp;</p>\n<p>4.责任声明</p>\n<p>4.1 任何网站、单位或者个人如认为小程序或者小程序提供的相关内容涉嫌侵犯其合法权益，应及时向小程序提供书面通知，并提供身份证明、权属证明及详细侵权情况证明。小程序在收到上述法律文件后，将会尽快切断相关内容以保证相关网站、单位或者个人的合法权益得到保障。</p>\n<p>4.2小程序仅为用于提供活动的整合服务和促成服务，用户明确同意其使用小程序活动服务所存在的风险及一切后果将完全由用户本人承担，小程序对此不承担任何责任。</p>\n<p>4.3小程序无法保证活动服务一定能满足用户的要求。</p>\n<p>4.4小程序系统内由用户自行发布的活动信息，小程序也不保证该信息的及时性、安全性、准确性。</p>\n<p>4.5小程序将定期与第三方进行合作，由于第三方完全过错产生的各种后果，小程序不承担任何责任。</p>\n<p>4.6 在法律允许的范围内，小程序对受到计算机病毒、木马或其他恶意程序、黑客攻击的破坏；小程序的电脑软件、系统、硬件和通信线路出现故障及其他小程序无法控制或合理预见的情形所导致的服务中断或终止不承担责任。</p>\n<p>4.7 发生不可抗力等因素造成小程序服务中断或终止时，小程序将努力在第一时间与相关部门配合，及时进行修复，但是由此给用户造成的损失，小程序在法律允许的范围内免责。</p>\n<p>&nbsp;</p>\n<p>5.知识产权</p>\n<p>5.1&nbsp;小程序特有的标识、版面设计、编排方式等版权均属小程序享有，未经小程序许可授权，不得任意复制或转载。</p>\n<p>5.2&nbsp;用户从小程序的服务中获得的活动信息，非以小程序为媒介，不得任意复制或转载。</p>\n<p>5.3&nbsp;小程序的所有内容，包括活动描述、图片等内容所有权归属于小程序的用户，任何人未经允许，不得转载。</p>\n<p>5.4上述及其他任何本服务包含的内容的知识产权均受到法律保护，未经小程序、用户或相关权利人书面许可，任何人不得以任何形式进行使用或创造相关衍生作品。</p>\n<p>&nbsp;</p>\n<p>6.隐私保护</p>\n<p>6.1 小程序不对外公开或向第三方提供单个用户的注册资料及用户在使用网络服务时存储在本社区的非公开内容，但下列情况除外：</p>\n<p>(1)事先获得用户的明确授权；</p>\n<p>(2)根据有关的法律法规要求；</p>\n<p>(3)按照相关政府主管部门的要求；</p>\n<p>(4)为维护社会公众的利益。</p>\n<p>6.2 小程序可能会与第三方合作向用户提供相关的活动服务，在此情况下，如该第三方同意承担与本社区同等的保护用户隐私的责任，则本社区有权将用户的注册资料等信息提供给该第三方，并无须另行告知用户。</p>\n<p>6.3 在不透露单个用户隐私资料的前提下，小程序有权对整个用户数据库进行分析并对用户数据库进行商业上的利用。</p>\n<p>&nbsp;</p>\n<p>7.协议修改</p>\n<p>7.1小程序有权随时修改本协议的任何条款，一旦本协议的内容发生变动，小程序将会在小程序上公布修改之后的协议内容，若用户不同意上述修改，则可以选择停止使用小程序。小程序也可选择通过其他适当方式（比如系统通知）向用户通知修改内容。</p>\n<p>7.2如果不同意小程序对本协议相关条款所做的修改，用户有权停止使用小程序。如果用户继续使用小程序，则视为用户接受小程序对本协议相关条款所做的修改。</p>\n<p>&nbsp;</p>\n<p>8.通知送达</p>\n<p>8.1本协议项下小程序对于用户所有的通知均可通过系统内部通知、微信账号主动联系、手机短信等方式进行；该等通知发送成功即视为已送达。</p>\n<p>8.2用户对于小程序的通知应当通过小程序对外正式公布的微信账号、通信地址、电子邮件地址等联系信息进行送达。</p>\n<p>8.3 上述送达方式同样适用于相关仲裁或司法程序（含起诉、审理、执行等各阶段）。</p>\n<p>&nbsp;</p>\n<p>9.管辖、法律适用与争议解决</p>\n<p>9.1 本用户协议的成立、生效、履行、解释与纠纷解决，适用中华人民共和国大陆地区法律法规，并且排除一切冲突法规定的适用。</p>\n<p>9.2 因使用小程序的产品或服务发生纠纷时，您同意该等纠纷由适用于该项产品或服务的法律法规所规定的有管辖权的人民法院受理。就本用户协议产生纠纷时，您同意交由本用户协议签订地有管辖权人民法院受理。本用户协议签订地为北京市昌平区。</p>', NULL);
-- ----------------------------
-- Records of  user_agreement
-- ----------------------------