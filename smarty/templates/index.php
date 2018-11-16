<?php
    require('Smarty.class.php');
    $smarty = new Smarty;
    $smarty->template_dir = 'C:\XAMPPPortable\htdocs\smarty\templates';
    $smarty->config_dir = 'C:\XAMPPPortable\htdocs\smarty\configs';
    $smarty->cache_dir = 'C:\XAMPPPortable\smarty\cache';
    $smarty->compile_dir = 'C:\XAMPPPortable\smarty\templates_c';
    $smarty->left_delimiter = '{{'; 
    $smarty->right_delimiter = '}}';
    //基本smarty印出
    $smarty->assign('name','Penguin!!');
    $smarty->assign('name2','Jerry!!');
    //一維陣列印出
    $user['name']="Tad";
    $user['birthday']="1973-06-16";
    $smarty->assign('user', $user);
    //二維陣列印出
    $users[1]['name']="tad";
    $users[1]['birthday']="1973-06-16";
    $users[2]['name']="phebe";
    $users[2]['birthday']="1973-03-10";
    $users[24]['name']="hebe";
    $users[24]['birthday']="1983-07-18";
    $smarty->assign('users', $users);
    //while 迴圈
    $smarty->assign('x','1');
    $smarty->assign('y','1');
    $smarty->display('index.tpl');
?>