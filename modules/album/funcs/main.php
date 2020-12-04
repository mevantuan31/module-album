<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 10 Nov 2020 06:56:08 GMT
 */

if (!defined('NV_IS_MOD_ALBUM')) {
    die('Stop!!!');
}

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$array_data = [];


$perpage = 20;
$page = $nv_Request->get_int('page', 'get', 1);
$keyword = $nv_Request->get_title('keyword', 'get', '');
$order_by = $nv_Request->get_title('order_by', 'get', '');
$stype = $nv_Request->get_title('stype', 'get', '');

$db->sqlreset()
    ->select('COUNT(*)')
    ->from($db_config['prefix'] . '_' . 'categories')
    ->where('category_name LIKE ' . $db->quote('%' . $keyword . '%'));
$sql = $db->sql();

$total = $db->query($sql)->fetchColumn();


if (!empty($order_by)) {
    $db->select('*')
        ->order($order_by . ' ' . $stype)
        ->limit($perpage)
        ->offset(($page - 1) * $perpage);
} else {
    $db->select('*')
        ->order('weight ASC')
        ->limit($perpage)
        ->offset(($page - 1) * $perpage);
}


$sql = $db->sql();
$result = $db->query($sql);
while ($row = $result->fetch()) {
    $array_data[$row['id']] = $row;
}



//------------------

$contents = nv_theme_album_main($array_data);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
