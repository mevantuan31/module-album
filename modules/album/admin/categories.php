<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 10 Nov 2020 06:56:08 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['main'];

$post = [];
$error = [];
$upload_info =[];


if ($nv_Request->isset_request('submit', 'post') and isset($_FILES, $_FILES['image_album'], $_FILES['image_album']['tmp_name']) and is_uploaded_file($_FILES['image_album']['tmp_name'])) {
    $upload = new NukeViet\Files\Upload($admin_info['allow_files_type'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);
    $upload->setLanguage($lang_global);
    $upload_info = $upload->save_file($_FILES['image_album'], NV_UPLOADS_REAL_DIR.'/'.$module_name, false,$global_config['nv_auto_resize']);
}

$post['id'] = $nv_Request->get_int('id','post,get','0');

$post['category_name'] = $nv_Request->get_title('category_name','post','');
$post['active_album'] = $nv_Request->get_int('active_album','post','1');
$post['category_desc'] = $nv_Request->get_title('category_desc','post','');
$post['category_image'] = $upload_info['basename'];

$post['submit'] = $nv_Request->get_title('submit','post');

if (!empty($post['submit'])) {
    if (empty($post['category_name'])) {
        $error[] = "Chưa nhập tên";
    }
    if (empty($post['category_desc'])) {
        $error[] = "Chưa nhập thông tin chi tiết";
    }

    if (empty($error)) {
        if ($post['id'] > 0) {
            $sql = "UPDATE `nv4_categories` SET `category_name`=:category_name,`category_image`=:category_image,`category_desc`=:category_desc,
            `active_album`=:active_album,`update_at`=:update_at WHERE id =".$post['id'];
            $s = $db->prepare($sql);
            $s->bindValue('update_at',NV_CURRENTTIME);
        } else {
            $sql = "INSERT INTO `nv4_categories`(`id`, `category_name`, `category_image`, `category_desc`, `active_album`, `create_at`) 
            VALUES (NULL,:category_name,:category_image,:category_desc,:active_album, :create_at)";
            $s = $db->prepare($sql);
            $s->bindValue('create_at', NV_CURRENTTIME);
        }
        $s->bindParam('category_name', $post['category_name']);
        $s->bindParam('active_album', $post['active_album']);
        $s->bindParam('category_desc', $post['category_desc']);
        $s->bindParam('category_image', $post['category_image']);

        $exe = $s->execute();

        if ($exe) {
            $error[] = "Thêm dữ liệu thành công";
        } else {
            $error[] = "Thêm dữ liệu thất bại";
        }
    }

}elseif ($post['id']>0){
    $sql = "SELECT * FROM `nv4_categories` WHERE id=".$post['id'];
    $post = $db->query($sql)->fetch();

} else{
        $post['category_name'] = "";
        $post['active_album'] = "";
        $post['category_desc'] = "";
}
 
//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('categories.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('POST', $post);
$xtpl->assign('ERROR',implode('<br>',$error));
if (!empty($error)){
    $xtpl->parse('main.error');
}

//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
