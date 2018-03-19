-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 07 月 09 日 12:40
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `automedicine`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_notice`
--

CREATE TABLE IF NOT EXISTS `admin_notice` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `dateline` date NOT NULL,
  `state` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `admin_notice`
--

INSERT INTO `admin_notice` (`id`, `title`, `content`, `dateline`, `state`) VALUES
(1, '去王企鹅无群二群二', '王企鹅群翁群无', '2017-07-06', 1),
(2, '686', '8686', '2017-07-06', 1),
(3, 'test', 'test', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章编号',
  `title` char(100) NOT NULL COMMENT '文章标题',
  `author` char(50) NOT NULL DEFAULT '未知' COMMENT '文章作者',
  `description` varchar(255) NOT NULL COMMENT '文章简介',
  `content` text NOT NULL COMMENT '文章内容',
  `dateline` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `author`, `description`, `content`, `dateline`) VALUES
(1, '肠道微生物如何导致小儿肝病？', '作者：qinqiyun 来源：梅斯医学 日期：2017-06-07', '  2013年肠道菌群与人体健康关系的研究被列入“Science”杂志发表的十大科学进展。多项研究发现肠道菌群对人类健康有重要，如肝脏。但目前，肠道菌群如何影响肝脏疾病...', ' 2013年肠道菌群与人体健康关系的研究被列入“Science”杂志发表的十大科学进展。多项研究发现肠道菌群对人类健康有重要影响，如肝脏。但目前，肠道菌群如何影响肝脏疾病，尚不清楚，近期，Lancet子刊上发表了一篇关于肠道微生物与小儿肝病进展的关系的文章。\r\n        在近期研究中，肠道微生物受到广泛关注，但是，微生物如何影响相关连的器官(例如肝脏)尚不清楚。肠道微生物可以调节肠粘膜的渗透性并帮助将食物分解成小分子，从而直接影响肝脏健康。多项研究发现肠道菌群失调与肝脏疾病的严重程度和进展相关联，如非酒精性脂肪肝、非酒精性脂肪性肝炎、原发性硬化性胆管炎、全肠道外营养相关性肝病和囊性纤维化相关性肝病。但是，尚没有足够的信息可以解释微生物如何在小儿中导致这些肝病。因为在出生时，肠内菌群存在很大差异，而且，3岁后菌群才会建立稳定的定植。临床研究表明小儿肝病在进展的严重性及概率均与成年人的不同，说明小儿肝病可能有其独立的发病机制。研究者们在本文中论述关于肠道菌群与肝病进展的联系和改变儿童肠内微生物的治疗方式。', 2017),
(2, '摄入低脂乳制品可能会增加帕金森病的风险', '作者：伊文 来源：MedicalNewstoday 日期：2017-06-09', ' 我们通常会认为低脂乳制品是一种健康的全脂奶制品的替代食品。但是根据一项最新研究结果，摄入大量低脂乳制品可能会增加帕金森病的风险。研究人员发现，每天摄入至少三份低脂乳...', ' 我们通常会认为低脂乳制品是一种健康的全脂奶制品的替代食品。但是根据一项最新研究结果，摄入大量低脂乳制品可能会增加帕金森病的风险。\r\n        研究人员发现，每天摄入至少三份低脂乳制品的成年人患帕金森病的风险要大于那些只摄入一份的人。\r\n        该研究的合着者，波士顿哈佛T.H. Chan公共卫生学院的Katherine C. Hughes及其同事将他们的最新研究成果发表在《神经病学》杂志上。\r\n        之前已有研究表明，摄入乳制品，尤其是牛奶，可能与帕金森病风险增加有关。\r\n        Hughes及其同事在他们的这项新研究中对二者之间的关系进行了更为深入的研究。这项研究包括近25年来120，000多名男性和女性的数据。\r\n        这项研究共纳入了参与了护士健康研究项目的80，736名女性以及参与健康专业人员随访研究项目的48，610名男性。\r\n        每2年，该研究的参与者每隔2年完成一份健康问卷，每隔4年完成一份膳食问卷。\r\n        在长达25年的研究过程中，共有1，036名参与者患上了帕金森氏病。\r\n        与每天摄入少于一份奶制品的参与者相比，每天摄入至少三份的受试者患帕金森病的风险要高出34%。\r\n        更重要的是，研究小组发现，帕金森病风险可能与牛奶摄入量有关;每天饮用至少一份脱脂奶或低脂牛奶的人与每周喝不到一杯的人相比，患帕金森病的风险增加了39%。\r\n        该研究还报告，摄入冰冻果子露和冷冻酸奶也与帕金森病风险中度增加有关。\r\n        研究未发现摄入全脂乳与帕金森病之间存在关联。', 2017),
(17, '轻度创伤性脑损伤与阿尔茨海默病人群脑皮质变薄相关', '作者：伊文 来源：医学论坛网 日期：2017-06-09', '中至重度创伤性脑损伤是神经退行性疾病如晚发性阿尔茨海默氏病发生发展中最强的环境危险因素之一，但轻度创伤性脑损伤或脑震荡是否也具有相关风险尚不清楚。最近Hayes等人探讨了轻度创伤性...', '中至重度创伤性脑损伤是神经退行性疾病如晚发性阿尔茨海默氏病发生发展中最强的环境危险因素之一，但轻度创伤性脑损伤或脑震荡是否也具有相关风险尚不清楚。最近Hayes等人探讨了轻度创伤性脑损伤与具有遗传风险的早期阿尔茨海默病相关脑区皮质厚度变薄之间的关系，并研究其与情景记忆之间的关系，其结果发表在最近一期的Brain杂志上。\n        研究对象是160名伊拉克和阿富汗战争退伍军人，年龄介于19和58岁之间，其中许多人诊断有轻度创伤性脑损伤和创伤后应激障碍。研究使用来自最大的阿尔茨海默病全基因组关联研究的统计数据来对这些研究对象进行阿尔茨海默病发展的全基因组多基因风险评分。', 2017);

-- --------------------------------------------------------

--
-- 表的结构 `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `state` int(2) NOT NULL DEFAULT '0',
  `uname` varchar(20) NOT NULL,
  `utelphone` int(11) NOT NULL,
  `upwd` varchar(20) NOT NULL,
  `usex` varchar(2) NOT NULL,
  `uage` int(2) NOT NULL,
  `ubloodType` varchar(2) NOT NULL,
  `uallegicHistory` varchar(50) NOT NULL,
  `umedicalHistory` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `data_user`
--

INSERT INTO `data_user` (`uid`, `id`, `state`, `uname`, `utelphone`, `upwd`, `usex`, `uage`, `ubloodType`, `uallegicHistory`, `umedicalHistory`) VALUES
(1, 1, 1, '1411740128', 110, 'xm123', '女', 22, 'AB', '花粉过敏', '无'),
(2, 0, 1, '兮兮', 852369, 'xm123', '男', 19, 'O', '无', '无'),
(5, 0, 0, '李明', 138, '123', '{s', 0, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `diseasetype`
--

CREATE TABLE IF NOT EXISTS `diseasetype` (
  `did` int(11) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `dsum` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `yz` double NOT NULL DEFAULT '0.125',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `diseasetype`
--

INSERT INTO `diseasetype` (`did`, `dname`, `dsum`, `type`, `yz`) VALUES
(1, '痔疮', 10000, '普外科', 0.125),
(2, '禽流感', 7200, '呼吸科', 0.2),
(3, '慢性胃炎', 8000, '消化科', 0.125),
(4, '胆结石', 15000, '消化科', 0.105),
(5, '便秘', 12000, '消化科', 0.005),
(6, '皮肤过敏', 6000, '皮肤科', 0.095),
(7, '癫痫', 5000, '脑、神经科', 0.015),
(8, '失眠', 20000, '脑、神经科科', 0.175);

-- --------------------------------------------------------

--
-- 表的结构 `izmu_admin`
--

CREATE TABLE IF NOT EXISTS `izmu_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `state` int(2) unsigned NOT NULL DEFAULT '0',
  `permission` int(5) NOT NULL DEFAULT '0' COMMENT '管理员级别',
  `lockPwd` int(10) unsigned NOT NULL DEFAULT '123456',
  `question` varchar(100) NOT NULL,
  `answer` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `izmu_admin`
--

INSERT INTO `izmu_admin` (`id`, `username`, `password`, `email`, `state`, `permission`, `lockPwd`, `question`, `answer`) VALUES
(7, '1412840107', '198a541ffccdb09103ce892cc1c4426e', '826739558@qq.com', 1, 1, 123456, '你大学辅导员的名字是?\n', '杨夏'),
(24, 'test', '098f6bcd4621d373cade4e832627b4f6', '499513902@qq.com', 1, 0, 123456, '你大学辅导员的名字是?', '杨夏');

-- --------------------------------------------------------

--
-- 表的结构 `izmu_album`
--

CREATE TABLE IF NOT EXISTS `izmu_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `izmu_album`
--

INSERT INTO `izmu_album` (`id`, `pid`, `albumPath`) VALUES
(41, 34, 'ea5e5272abec082ed492da35448bb537.jpg'),
(42, 35, '687f3a5db9051b10a9e809e0415eaf1d.jpg'),
(43, 34, '7c651324b3ddbc1821c5cf74faf0c363.jpg'),
(44, 35, 'cbd7001462abd34a8765df3c98790490.jpg'),
(46, 37, '6ce25cf606ec1011c3e286701b6bdec7.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `izmu_cate`
--

CREATE TABLE IF NOT EXISTS `izmu_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `izmu_cate`
--

INSERT INTO `izmu_cate` (`id`, `type`) VALUES
(1, '普外科'),
(2, '呼吸科'),
(3, '消化科'),
(4, '皮肤科'),
(5, '脑、神经外科'),
(7, '外科'),
(8, '内科');

-- --------------------------------------------------------

--
-- 表的结构 `izmu_mingyan`
--

CREATE TABLE IF NOT EXISTS `izmu_mingyan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `izmu_mingyan`
--

INSERT INTO `izmu_mingyan` (`id`, `content`) VALUES
(1, '因为刚好遇见你 留下十年的期许'),
(2, '己所不欲 勿施于人'),
(3, '三人行 必有我师'),
(4, '生命不息 奋斗不止'),
(5, '庐山烟雨浙江潮 未到千般恨不消');

-- --------------------------------------------------------

--
-- 表的结构 `izmu_pro`
--

CREATE TABLE IF NOT EXISTS `izmu_pro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(255) NOT NULL,
  `mPrice` decimal(10,2) NOT NULL,
  `pDesc` text,
  `pubTime` int(10) unsigned NOT NULL,
  `cId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pName` (`pName`),
  UNIQUE KEY `pName_2` (`pName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `izmu_pro`
--

INSERT INTO `izmu_pro` (`id`, `pName`, `mPrice`, `pDesc`, `pubTime`, `cId`) VALUES
(34, '徐长卿', '100.00', '<span style="color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;">徐长卿 ，学名 </span><i>Cynanchum paniculatum (Bunge) Kitagawa</i><span style="color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;">，英文名：RADIX CYNANCHI PANICULATI。竹叶细辛。多年生直立草本。种子长圆形花期5～7月，果期9～12 月。多生于阳坡草丛中。分布于黑龙江、吉林、辽宁、河北、河南、 山东、内蒙、江苏、浙江、江西、 福建、湖北、湖南、广东、广西、陕西、甘肃、四川、贵州、云南等省区。有极高的药用价值。</span>', 1499332388, 1),
(35, '田七', '50.00', '<div class="lemma-summary" style="font-size:14px;color:#333333;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;">\r\n	<div class="para">\r\n		田七是<a target="_blank" href="http://baike.baidu.com/item/%E4%B8%89%E4%B8%83/648675">三七</a>的别称，为第三纪古热带孑遗植物，全世界仅有我国云南等省区部分县种植， 以产于云南<a target="_blank" href="http://baike.baidu.com/item/%E6%96%87%E5%B1%B1%E5%B7%9E">文山州</a>各个县，海拔1600米以上高山坡地为佳。\r\n	</div>\r\n	<div>\r\n		<br />\r\n	</div>\r\n</div>\r\n<div class="configModuleBanner" style="color:#333333;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;">\r\n</div>\r\n<div class="basic-info cmn-clearfix" style="margin:20px 0px 35px;background:url(" color:#333333;font-family:arial,="" 宋体,="" sans-serif;"="">\r\n	</div>', 1499332507, 1),
(37, '尼莫地平片', '12.00', '<span style="color:#333333;font-family:arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;">尼莫地平，①用于急性脑血管病恢复期的血液循环改善。各种原因的蛛网膜下腔出血后的脑血管痉挛，及其所致的缺血性神经障碍高血压、偏头痛等。②也被用作缺血性神经元保护和血管性痴呆的治疗。③对突发性耳聋也有一定疗效。</span>', 1499395193, 5);

-- --------------------------------------------------------

--
-- 表的结构 `knowledge`
--

CREATE TABLE IF NOT EXISTS `knowledge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `knowledge`
--

INSERT INTO `knowledge` (`id`, `title`, `content`) VALUES
(1, '胃病', '多吃一些生姜，生姜同样可以治脚气跟冻疮。'),
(2, '腿抽筋', '用力捏可能不会很快有效。可以伸直腿，让脚尖回勾，指向自己，能有效缓解抽筋 。'),
(3, '睡眠', '睡眠不足会变笨，一天需要睡眠八小时，有午睡习惯可延缓衰老。'),
(4, '烫伤', '小面积皮肤损伤或者烧伤、烫伤，抹上少许牙膏，可立即止血止痛。'),
(5, '咳嗽', '干咳或痰少可用甘草片（两三块左右）+阿莫西林。'),
(6, '低血压', '甘草20克，桂枝，肉桂各40克，将以上药物混合后当茶冲泡服用一周。'),
(7, '止咳化痰', '白菜根两棵洗净，冰糖30克，共用水煮，喝汤。注意：针对咳嗽、痰多病症。'),
(8, '感冒', '将新鲜白菜根一个洗净，加红糖30克和老姜五片，水煎服。每日一剂一服，连服三日定见效'),
(9, '胆囊炎', '每天清早空腹吃一个苹果，隔半小时后再进餐。一年365天，天天如此，可治胆囊炎。注意，千万要连皮一起食用。'),
(10, '水土不服', '到了陌生地，第一道菜应先吃水磨制的豆腐，在一定程度上可以预防和克服水土不服'),
(11, '胃反酸', '每次饭前吃上几口，坚持5~6天就可治好胃反酸。'),
(12, '鼻炎', '在每天吃饭时，随着吃菜同吃一些生大葱。在吃的过程中，最好在口中多嚼一会儿，有意让大葱的辣味从鼻孔中通过，这样的效果会更好'),
(13, '扭伤', '根据扭伤部位的大小，取葱白200克至300克，用刀切碎之后再捣烂，放在锅中炒热到50℃左右的时候，取出敷在患处，并用医用纱布盖好。每天操作一次，七天为一个疗程，一般二至三个疗程就可治愈扭伤。'),
(14, '失眠', '醋10毫升，加一杯水中，睡前饮服，每日一次。用于治疗高血压之失眠者，饮后片刻即可入睡。'),
(15, '痢疾', '大葱两根，去掉干皮和须根，生吃一根，第二天再吃一根，痢疾即可治愈'),
(16, '牛皮癣', '把大蒜放些盐捣烂如泥，敷在患处，用纱布盖好并用胶布固定，每天换新蒜泥一次。一段时间后牛皮癣便可以消除，患处只留下一块深色的斑印。'),
(17, '瘙痒', '取大枣20枚、绿豆100克、猪油一匙、冰糖适量，加水共煮至绿豆开花即可服用，每天服一剂，分次服下，一般服药3天即可减轻瘙痒感，10天内痊愈。'),
(18, '脚气', '每天睡觉前用温水洗脚后,用棉签蘸适量风油精涂于患处,一般连续使用5天,就能基本达到止痛、止痒的作用。如果伴有水疱，应先用针将水疱挑破，再用风油精。'),
(19, '高血压眩晕', '蜂蜜10克，温开水化开冲服，每日1~2次，长期服用更佳'),
(20, '溃疡', '常吃葡萄对治疗和防止口腔溃疡十分有效。每日吃数次，量不限，一般2~3天可痊愈。'),
(21, '不孕', '知柏、苍术、香附各15克，陈皮、白茯苓各20克，枳壳、半夏、南星、炙甘草各10克，做成丸状，如梧桐子大，每日1丸，配合生姜汁服用'),
(22, '节疼痛', '桃仁、白芥子各6克，鸡蛋1个。将桃仁、白芥子研成细末，用适量蛋清调成糊状，外敷痛处，一般3～4小时即能止痛，但应注意不要久敷'),
(23, '癫 狂', '蚕蜕纸烧灰，酒调服'),
(24, '羊痈凤', '初生儿脐带1节，焙干研细未，多服无碍'),
(25, '高血脂', '生山楂30克，沏水代茶饮，常服有效。'),
(26, '胃、十二指肠溃疡', '豆浆1碗，加白糖25克煮沸，空腹饮用，每日2次。'),
(27, '腹 痛', '治急肚痛，用本人头发烧灰存性，研末3克，不拘时，酒下。随即以白芥子研末少许，水调封脐中，汗出而愈。'),
(28, '腹 胀', '嫩花椒，泡咸菜缸内，泡熟后当咸菜吃。多吃气从上散，胀可除根。此方为辛酸两和法，能健胃杀虫'),
(29, '恶心呕吐', '取生姜汁1盏，煎滚收贮：白蜜250克，炼熟，亦收贮。每服姜汁1匙，蜜2匙，沸汤调服，日夜5～7次'),
(30, '高 烧', '冰片研细末，加3—4倍的蒸馏水，混合调匀。用消毒纱布蘸液擦浴全身皮肤和颈部、腋部、腹股沟、胳窝、肘窝表浅大血管等处，以红为度。'),
(31, ' 噎食', '      按压印堂穴（位于鼻梁上方两眉连线的正中点）。于指尖稍用力按压，低头闭目，意守胸脘，持续数秒至数十秒，可感食道中停滞之物自梗阻之处缓移而下，噎阻即可自行解除'),
(32, '便  秘', '烟瘾大，饭后吃个梨子，可以使积存在体内的致癌物质大量排出。川贝雪梨猪肺汤，杏仁雪梨山药糊，都是预防烟源性疾病的良好方法。');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(3) NOT NULL AUTO_INCREMENT,
  `id` int(3) NOT NULL,
  `user` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL,
  `lastdate` date NOT NULL,
  `state` int(5) NOT NULL DEFAULT '0' COMMENT '回复状态',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`mid`, `id`, `user`, `title`, `content`, `lastdate`, `state`) VALUES
(1, 1, '1411740128', '痔疮', '发烧', '2017-07-09', 1),
(2, 1, '1411740128', '禽流感', '谢谢', '2017-07-09', 1),
(13, 1, '1411740128', '胆结石', '腹痛 ', '2017-07-09', 1),
(14, 1, '1411740128', '便秘', '消化不良', '2017-07-09', 1),
(15, 1, '1411740128', '慢性胃炎', '效果比较明显', '2017-07-09', 1);

-- --------------------------------------------------------

--
-- 表的结构 `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `rid` int(3) NOT NULL AUTO_INCREMENT,
  `recipe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `did` int(3) NOT NULL,
  `effect1` int(5) NOT NULL,
  `effect2` int(5) NOT NULL,
  `effect3` int(5) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=411 ;

--
-- 转存表中的数据 `recipe`
--

INSERT INTO `recipe` (`rid`, `recipe`, `did`, `effect1`, `effect2`, `effect3`) VALUES
(1, '徐长卿', 1, 820, 700, 1050),
(2, '乌药、大黄、当归、血竭、地榆各150克，黄柏、菖蒲、红花各75克，黄连15克，冰片、枯矾各50克', 1, 600, 1020, 980),
(3, '双黄连口服液、板清颗粒', 1, 800, 960, 1050),
(4, '荆防败毒散、银翘散、维生素C泡腾片', 1, 500, 1020, 980),
(5, '蝉蜕15克，冰片12克，麻油30毫升', 2, 580, 900, 880),
(6, '黄注射液、清瘟败毒片', 2, 770, 1000, 500),
(7, '麝香、熊胆、冰片、猬皮各0.3克', 2, 600, 700, 1000),
(8, ' 腹胀著【平胃散加味】           6味（10包） 甘草3g           炒苍术10g ×2     陈皮6g ×2    姜厚朴3g ×3     广藿香10g    砂仁3g   ', 3, 700, 900, 1000),
(9, '胃痛著【安胃煎加味】           9味（12包） 甘草3g ×2       白芍10g ×2       醋延胡索10g    浙贝母10g     蒲公英15g ×2 徐长卿10g    ', 3, 1000, 800, 600),
(10, '浅表性【和中消痞汤】           8味（10包） 党参10g          丹参10g        炙甘草3g ×2      法半夏6g       炒白芍10g ×2    黄连3g', 3, 1100, 900, 1000),
(11, '【利胆排石汤】            9味（20包） 郁金10g ×2     芦根10g ×3    金钱草15g ×2     柴胡6g ×2      茵陈15g ×2   金银花10g    ', 4, 3200, 2500, 2800),
(12, '【利胆五金汤】               6味（9包） 郁金10g         金钱草15g ×2       玉米须15g  炒川楝子10g     炒鸡内金3g ×3     海金沙15g ', 4, 2800, 2000, 1700),
(13, '实热症、肠梗阻【大承气汤】            4味（7包） 大黄3g ×3       姜厚朴3g ×2       炒枳实6g        芒硝10g', 5, 2000, 2500, 2200),
(14, '弱、习惯性【麻仁颗粒】（蜜调服）            6味（6包） 大黄3g          白芍10g           姜厚朴3g      杏仁10g         火麻仁10g    ', 5, 1800, 2300, 1200),
(15, '【消风散】            12味（12包） 苦参10g          地黄10g         当归10g         甘草3g      炒苍术10g   知母10g       ', 6, 900, 780, 1200),
(16, '过敏方】            10味（22包） 地黄10g ×2   甘草3g ×3      防风6g ×3        牡丹皮6g ×2  白鲜皮10g ×2    地骨皮10g ×2    ', 6, 1000, 920, 1200),
(17, ' 发作控制期【断痫方】           11味（13包） 党参10g        甘草3g ×2         黄连3g          制远志6g         石菖蒲6g      茯', 7, 1000, 820, 700),
(18, '小儿【定痫豁痰汤】（一贴分两天服）       10味（10包） 当归10g        郁金10g        炒白芍10g        天麻6g           茯苓10g 钩藤10g ', 7, 780, 900, 800),
(19, '伴体虚心慌【养心方】          12味（12包） 太子参10g      当归10g       麦冬10g         黄芪10g       百合10g         茯苓10g  ', 8, 3000, 4200, 3600),
(372, '感冒灵+美扑伪麻', 9, 1000, 2000, 3000),
(373, '感冒清+右美沙芬', 9, 1000, 2000, 3000),
(374, '速效伤风胶囊+VC银翘片+氨酚伪麻', 9, 1000, 2000, 3000),
(375, '感冒灵+氨酚伪麻+右美沙芬 ', 9, 1000, 2000, 3000),
(376, '左氧氟沙星（头孢或阿莫西林）+扑热息痛（尼美舒利，布洛芬，阿司林）+吗啉胍（病毒唑）+vitc+扑尔敏 ', 9, 1000, 2000, 3000),
(377, '扑热息痛+右美沙', 10, 1000, 2000, 3000),
(378, '酚咖片+右美沙芬（复方甘草）', 10, 1000, 2000, 3000),
(379, '左氧氟沙星+头孢克肟（拉定，呋辛）+扑热息痛（尼美舒利）+右美沙芬+阿昔洛韦（利巴韦林）', 10, 1000, 2000, 3000),
(380, '小柴胡颗粒+感冒软胶囊', 11, 1000, 2000, 3000),
(381, '通宣理肺丸+风寒感冒颗粒', 11, 1000, 2000, 3000),
(382, '感冒止咳胶囊+小柴胡颗粒', 11, 1000, 2000, 3000),
(383, '四季感冒胶囊+氨酚伪麻', 11, 1000, 2000, 3000),
(384, '双黄连+感冒止咳胶囊（糖浆） ', 12, 1000, 2000, 3000),
(385, '清热解毒胶囊（片，口服液）+板蓝根+银翘解毒（片，丸，胶囊）', 12, 1000, 2000, 3000),
(386, '感冒清+重感灵 ', 12, 1000, 2000, 3000),
(387, '扑热息痛+藿香正气 ', 13, 1000, 2000, 3000),
(388, '小柴胡颗粒+藿香正气', 13, 1000, 2000, 3000),
(389, '藿香正气+思密达（蒙脱石散）', 13, 1000, 2000, 3000),
(390, '藿香正气胶囊+氟派酸（左氧氟沙星，头孢拉定）+扑热息痛 ', 13, 1000, 2000, 3000),
(391, '双黄连+咽炎片', 14, 1000, 2000, 3000),
(392, '清热解毒口服液（片，胶囊）+VC银翘片', 14, 1000, 2000, 3000),
(393, '抗病毒口服液+咽炎片清咽片） ', 14, 1000, 2000, 3000),
(394, '喉痛灵（喉疾灵）+黄连上清片+穿心莲', 14, 1000, 2000, 3000),
(395, '牛黄消炎灵胶囊+VC银翘片', 14, 1000, 2000, 3000),
(396, '罗红霉素+咽炎片', 14, 1000, 2000, 3000),
(397, '阿奇霉素+清咽片 ', 14, 1000, 2000, 3000),
(398, '头孢呋辛酯+又黄连（咽炎片，清咽片，清热散结片） ', 14, 1000, 2000, 3000),
(399, '罗红霉素（阿奇霉素，头孢呋辛，头孢克肟，头孢拉定，阿莫西林，左氧氟沙星）+甲硝唑+布洛芬（尼美舒利，双氯芬酸）+穿心莲（咽炎片，喉疾灵）+vitc ', 14, 1000, 2000, 3000),
(400, '慢支发作期以抗感染为重点，兼顾祛痰，止咳、平喘。常用抗菌药有复方新诺明，青霉素，庆大霉素等', 15, 1000, 2000, 3000),
(401, '法痰止咳有必嗽平，氨茶碱，舒喘灵0.1～0．2毫克，喷雾l～2次，每4小时一次喷雾吸入', 15, 1000, 2000, 3000),
(402, '用川贝批把膏,川贝止咳露,痰咳净等', 15, 1000, 2000, 3000),
(403, '化痰平喘片+氨溴索', 15, 1000, 2000, 3000),
(404, '化痰平喘片+咳特灵胶囊 ', 15, 1000, 2000, 3000),
(405, '肺宁胶囊+氨溴索', 15, 1000, 2000, 3000),
(406, '消炎止咳片+咳特灵', 15, 1000, 2000, 3000),
(407, '消炎止咳片+咳特灵', 15, 1000, 2000, 3000),
(408, '罗红霉素+咳特灵+氨溴索', 15, 1000, 2000, 3000),
(409, '加替沙星+头孢类抗生素+氨溴索+特布他林 ', 15, 1000, 2000, 3000),
(410, '加替沙星+化痰平喘片', 15, 1000, 2000, 3000);

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL COMMENT '疾病名的id',
  `user` varchar(20) CHARACTER SET utf8 NOT NULL,
  `content` varchar(200) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`rid`, `id`, `user`, `content`, `title`, `date`) VALUES
(2, 2, '1411740128', '好的 建议你去医院看下', '禽流感', '2017-07-09'),
(3, 13, '1411740128', '谢谢您的反馈意见', '胆结石', '2017-07-09'),
(5, 15, '1411740128', '我们会继续努力', '慢性胃炎', '2017-07-09');

-- --------------------------------------------------------

--
-- 表的结构 `user_notice`
--

CREATE TABLE IF NOT EXISTS `user_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(50) CHARACTER SET utf8 NOT NULL,
  `pid` int(5) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `dateline` date NOT NULL,
  `state` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `user_notice`
--

INSERT INTO `user_notice` (`id`, `title`, `pid`, `content`, `dateline`, `state`) VALUES
(1, '公益医疗', 0, '7月7日清晨4时30分，国航北京地服工作人员早已全部到位，提前开放专门柜台为赴藏医疗团队办理值机、行李托运等手续；6时许，第一个航班按计划顺利起航。', '2017-07-06', 0),
(2, '义务献血', 2, '义务献血活动  将在遵义医学院新浦校区举办', '2017-07-06', 0),
(3, '抗菌药物限制令', 3, '《通知》规定，此《目录》为山东省抗菌药物分级管理的依据和最低要求，医疗机构可根据本机构具体情况提高抗菌药物管理级别，将“非限制使用级”的品种上调为“限制使用级”，“限制使用级”的品种上调为“特殊使用级”管理，禁止下调抗菌药物管理级别。限制级别逐级提高，也就是实际的使用范围比《目录》还要严格许多。', '2017-07-02', 0),
(4, '中医药发展势起', 4, '“政策长远利好，但眼前仍是寒冬。”云南生物谷药业股份有限公司董事长林艳和在做《把握产业未来 共享共创共赢》主题报告时分析指出，利好政策频发利好中医药，但是分级诊疗、按疾病诊断相关分组收付费（DRGS）、药品零加成、药占比、两票制等医改的深化措施，让医药行业进入了寒冬。', '2017-07-04', 0),
(5, '医疗器械企业', 6, '医药网7月7日讯　7月6日，由中国医药保健品进出口商会主办的2017稳健•第十届中国（国际）医用耗材大会暨中国医疗产业国际合作论坛在北京举行，赛柏蓝器械应邀参加本次大会。', '2017-07-03', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
