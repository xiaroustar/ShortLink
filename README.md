# ShortLink
免费又可爱的轻量化短链接系统喵

![GitHub Repo Size](https://img.shields.io/badge/Repo-轻量级-green)
![GitHub stars](https://img.shields.io/badge/Stars-⭐️-yellow)
![GitHub issues](https://img.shields.io/badge/Issues-0-blue)

**宝子，喂的链接越长我越满足哦喵～！**

一个可爱的网页应用，用于将长链接转换为短链接，支持打字机动态效果和实时交互体验。

---

## 功能特色

- **快速生成短链接**：输入长 URL，一键转换成短链接  
- **动态打字机效果**：交互式提示，引导用户操作  
- **复制与清空功能**：短链接生成后，可快速复制或重新输入  
- **隐私保护**：
  - 不收集个人身份信息，仅记录必要技术数据  
  - 使用最少的会话 Cookie，无跟踪行为  
  - 数据处理在服务器端完成，不与第三方共享  
- **服务条款与常见问题**：
  - 链接长期有效，违规内容会被屏蔽  
  - 提供联系方式，支持用户删除或管理短链接  
- **轻松可爱风格**：网页整体风格轻松俏皮，让体验更有趣  

---

## 🛠 技术栈

- **前端**：
  - HTML5 / CSS3 / JavaScript（ES6+）  
  - 打字机动态效果  
  - 弹窗模态（隐私条款、联系方式）  
- **后端**：
  - PHP + Mysql5.7（处理短链接创建）  
  - 防止滥用（蜜罐字段验证、请求频率限制）  

---

## 使用说明

1. 打开网页  
2. 在输入框输入你想缩短的长链接（需包含 `http://` 或 `https://`）  
3. 点击 **转换** 按钮生成短链接  
4. 可使用 **复制** 按钮复制短链接，或 **清除** 重新输入  
5. 查看隐私条款、服务条款或联系我们  

---

## 项目目录结构

.
├── index.html # 主页面
├── assets/
│ └── css/
│ └── style.css # 样式文件
├── api/
│ └── create.php # 短链接创建接口
└── README.md # 项目说明
---

## ⚙ 部署方式

1. 克隆仓库：
   ```bash
   git clone https://github.com/你的用户名/链接裁缝.git
部署到支持 PHP 的服务器（Apache/Nginx + PHP）

2. 打包程序上传部署：

php版本要求：7.4
数据库版本要求：Mysql5.7

数据库创建语句：
```bash
CREATE TABLE `ip_rate_limit` (
  `ip_address` varchar(45) NOT NULL,
  `minute_key` char(12) NOT NULL COMMENT 'YYYYMMDDHHMM',
  `day_key` char(8) NOT NULL COMMENT 'YYYYMMDD',
  `minute_count` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `day_count` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ip_address`,`minute_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `short_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_code` varchar(8) NOT NULL COMMENT '短码',
  `original_url` text NOT NULL COMMENT '原始链接',
  `ip_address` varchar(45) NOT NULL COMMENT '创建IP',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=正常 0=禁用',
  `clicks` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '访问次数',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_code` (`short_code`),
  KEY `idx_ip` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `short_sequence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



配置数据库（database.php 里面有自己的网址，替换一下即可）

打开浏览器访问 即可 使用
