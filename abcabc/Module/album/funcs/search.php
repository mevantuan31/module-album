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


$post['id'] = $nv_Request->get_int('id','post,get','0');

$db->sqlreset()
    ->select('*')
    ->from($db_config['prefix'].'_'.'image')
    ->where('id='.$post['id']);
$sql = $db->sql();
$result = $db->query($sql);

while ($row = $result->fetch()){
    $array_data[$row['id']] = $row;
}

$db->sqlreset()
    ->select('*')
    ->from($db_config['prefix'].'_'.'image')
    ->where('category_id='.$post['id']);
$sql = $db->sql();
$result = $db->query($sql);
while ($row = $result->fetch()){
    $array_row[$row['id']] = $row;
}
//------------------
// Viết code vào đây
//------------------

$contents = nv_theme_album_search($array_data, $array_row);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
