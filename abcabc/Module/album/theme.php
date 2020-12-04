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

/**
 * nv_theme_album_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_main($array_data)
{
    global $module_info, $lang_module, $lang_global, $op, $page, $perpage, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    if (!empty($array_data)) {
        $i = ($page - 1) * $perpage;
        foreach ($array_data as $row) {
            if (!empty($row['category_image']))
                $row['category_image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $row['category_image'];
                $row['url_view']= NV_BASE_SITEURL . $module_name .  '/detail';
                $row['url_slide']= NV_BASE_SITEURL . $module_name .  '/search';
            $xtpl->assign('ROW', $row);
            $xtpl->parse('main.loop');
            $i++;
        }
    }



    
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_album_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_detail($array_data)
{
    global $module_info, $lang_module, $lang_global, $op,  $module_name, $db;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    if (!empty($array_data)) {

        foreach ($array_data as $row) {

            if (!empty($row['product_image']))
                $row['product_image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $row['product_image'];
    
            if (!empty($row['category_id'])) {
                $db->sqlreset()
                    ->select('*')
                    ->from('nv4_categories')
                    ->where('nv4_categories.id=' . $row['category_id']);
                $sql3 = $db->sql();
                $result = $db->query($sql3);
                $array_data = $result->fetch();
                $row['category_id'] = $array_data['category_name'];
            }    
            $xtpl->assign('ROW', $row);
            $xtpl->parse('main.loop');

    
        }
    }
    

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_album_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_search($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}
