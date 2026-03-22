<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    // 变量名, 外部表单名, 描述, 默认值

    // 设置网站icon
    $iconUrl = new Typecho_Widget_Helper_Form_Element_Text(
        "iconUrl", NULL, NULL, 
        "站点 Icon 地址",
        "设置网站标签 Icon"
    );
    $form->addInput($iconUrl);
    

    // 头部设置

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'logoUrl', NULL, NULL, 
        "站点 Logo 地址", 
        "在这里输入 Logo 图片的 URL 地址，不填则显示文字标题"
    );
    $form->addInput($logoUrl);

    $site_title = new Typecho_Widget_Helper_Form_Element_Text('site_title', NULL, NULL, "网站标题", "博客首页头部显示的标题");
    $form->addInput($site_title);
    $site_describe = new Typecho_Widget_Helper_Form_Element_Text('site_describe', NULL, NULL, "网站描述", "博客首页头部显示的描述");
    $form->addInput($site_describe);

    // 备案号设置
    
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, "ICP 备案号", "在这里输入 ICP 备案号,例如: 京ICP备12345678号-1");
    $form->addInput($beian);


    // 侧边栏设置
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
        array(
            'ShowSearch' => "搜索卡片",
            'ShowAuthor' => "站长卡片",
            'ShowCategory' => '分类列表',
            'ShowRecentPosts' => "最新文章",
            'ShowRecentComments' => "最近评论",
            'ShowOther' => "显示其它"
        ),
        array('ShowSearch', 'ShowAuthor', 'ShowRecentPosts', 'ShowCategory', 'ShowRecentComments', 'ShowOther'), "侧边栏显示内容");
    $form->addInput($sidebarBlock->multiMode());
}
?>