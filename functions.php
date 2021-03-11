<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $statisticCode = new Typecho_Widget_Helper_Form_Element_Text('statisticCode', NULL, NULL, _t('自定义统计代码'), _t('在这里填写自定义统计代码，如百度统计等'));
    $form->addInput($statisticCode);

    $GravatarUrl = new Typecho_Widget_Helper_Form_Element_Radio('GravatarUrl',
        array(false => _t('官方源'),
            'https://cn.gravatar.com/avatar/' => _t('国内源'),
            'https://cdn.v2ex.com/gravatar/' => _t('V2EX源')),
        false, _t('Gravatar头像源'), _t('默认官方源'));
    $form->addInput($GravatarUrl);
}