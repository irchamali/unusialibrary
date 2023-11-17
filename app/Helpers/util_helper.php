<?php function show_message($message, $type = null, $dismiss = true)
{
    if (is_array($message)) {

        if (key_exists('status', $message)) {
            $type = $message['status'];
            if (key_exists('message', $message)) {
                $message_source = $message['message'];
            } else if (key_exists('content', $message)) {
                $message_source = $message['content'];
            }


            if (is_array($message_source)) {
                $message_content = $message_source;
            } else {
                $message_content[] = $message_source;
            }
        } else {
            if (is_array($message)) {
                foreach ($message as $key => $val) {
                    if (is_array($val)) {
                        foreach ($val as $key2 => $val2) {
                            $message_content[] = $val2;
                        }
                    } else {
                        $message_content[] = $val;
                    }
                }
            }
        }

        if (count($message_content) > 1) {
            $message_content = recursive_loop($message_content);
            $message = '<ul><li>' . join('</li><li>', $message_content) . '</li></ul>';
        } else {
            $message_content = recursive_loop($message_content);
            $message = $message_content[0];
        }
    }

    switch ($type) {
        case 'error':
            $type_alert = 'danger';
            break;
        case 'warning':
            $type_alert = 'warning';
            break;
        case 'info':
            $type_alert = 'info';
            break;
        default:
            $type_alert = 'success';
            break;
    }

    $close_btn = '';
    if ($dismiss) {
        $close_btn = '<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>';
    }

    echo '<div class="alert alert-' . $type_alert . ' alert-dismissible">' . $close_btn . $message . '</div>';
}

function recursive_loop($array, $result = [])
{
    foreach ($array as $val) {
        if (is_array($val)) {
            $result = recursive_loop($val, $result);
        } else {
            $result[] = $val;
        }
    }
    return $result;
}


function show_alert($message, $title = null, $dismiss = true)
{

    if (is_array($message)) {
        // $message = ['status' => 'ok', 'message' => 'Data berhasil disimpan'];
        if (key_exists('status', $message)) {
            $type = $message['status'];
        }

        if (key_exists('message', $message)) {
            $message = $message['message'];
        }

        if (is_array($message)) {
            foreach ($message as $key => $val) {
                if (is_array($val)) {
                    foreach ($val as $key2 => $val2) {
                        $message_content[] = $val2;
                    }
                } else {
                    $message_content[] = $val;
                }
            }

            if (count($message_content) > 1) {
                // $message = '<ul><li>' . join($message_content, '</li><li>') . '</li></ul>';
            } else {
                $message = $message_content[0];
            }
        }
    }

    if (!$title) {
        switch ($type) {
            case 'error':
                $title = 'ERROR !!!';
                $icon_type = 'error';
                break;
            case 'warning':
                $title = 'WARNIG !!!';
                $icon_type = 'error';
                break;
            default:
                $title = 'SUKSES !!!';
                $icon_type = 'success';
                break;
        }
    }

    echo '<script type="text/javascript">
			Swal.fire({
				title: "' . $title . '",
				html: "' . $message . '",
				icon: "' . $icon_type . '",
				showCloseButton: ' . $dismiss . ',
				confirmButtonText: "OK"
			})
		</script>';
}


function breadcrumb($result)
{
    echo '<ol class="breadcrumb">';
    foreach ($result as $title => $url) {
        if ($url) {
            echo '<li><a href="' . $url . '">' . $title . '</a></li>';
        } else {
            echo '<li class="active">' . $title . '</li>';
        }
    }
    echo '</ol>';
}

function set_depth(&$result, $depth = 0)
{
    foreach ($result as $key => &$val) {
        $val['depth'] = $depth;
        if (key_exists('children', $val)) {
            set_depth($val['children'], $val['depth'] + 1);
        }
    }
}

function list_menu($result)
{
    $refs = array();
    $list = array();
    foreach ($result as $key => $data) {
        if (!$key || empty($data['menu_id']))
            continue;

        $thisref = &$refs[$data['menu_id']];
        foreach ($data as $field => $value) {
            $thisref[$field] = $value;
        }

        if ($data['parent_id'] == 0) {

            $list[$data['menu_id']] = &$thisref;
        } else {

            $thisref['depth'] = ++$refs[$data['menu_id']]['depth'];
            $refs[$data['parent_id']]['children'][$data['menu_id']] = &$thisref;
        }
    }
    set_depth($list);
    return $list;
}

function build_menu($current_module, $arr_menu, $submenu = false)
{
    $menu = "";
    foreach ($arr_menu as $key => $val) {
        if (!$key)
            continue;

        $class_active = '';

        if ($val['highlight']) {
            $class_active = 'active';
        }

        if (key_exists('children', $val)) {
            $menu .= '<li class="treeview ' . $class_active . '"><a href="' . base_url($val['url']) . '"><i class="' . $val['icon'] . '"></i> <span>' . $val['nama_menu'] . '</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
        } else {
            $menu .= '<li class="' . $class_active . '"><a href="' . base_url($val['url']) . '"><i class="' . $val['icon'] . '"></i> <span>' . $val['nama_menu'] . '</span></a>';
        }

        if (key_exists('children', $val)) {
            $menu .= '<ul class="treeview-menu">';
            $menu .= build_menu($current_module, $val['children'], '');
            $menu .= "</ul>\n";
        }

        $menu .= "</li>\n";
    }

    return $menu;
}

function build_menu_frontend($current_module, $arr_menu, $submenu = false)
{
    $menu = "";
    foreach ($arr_menu as $key => $val) {
        if (!$key)
            continue;

        $dropdown_indicator = key_exists('children', $val) ? '<a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">' : '';

        if (key_exists('children', $val)) {
            $menu .= '<li class="nav-item dropdown">' . $dropdown_indicator . $val['nama_menu'] . '</a>';
        } else {
            $dropdown_item = '';
            $nav_item_dropdown = '';
            if ($val['parent_id']) {
                $dropdown_item = '<a class="dropdown-item" href="' . base_url($val['url']) . '">';
                $nav_item_dropdown = '';
            } else {
                $dropdown_item = '<a class="nav-link" href="' . base_url($val['url']) . '" role="button">';
                $nav_item_dropdown = 'class="nav-item dropdown"';
            }
            $menu .= '<li ' . $nav_item_dropdown . '>' . $dropdown_item . $val['nama_menu'] . '</a>';
        }

        if (key_exists('children', $val)) {
            $menu .= '<ul class="dropdown-menu">';
            $menu .= build_menu_frontend($current_module, $val['children'], '');
            $menu .= "</ul>\n";
        }

        $menu .= "</li>\n";
    }
    // echo '<pre>'; print_r($result); die;
    return $menu;
}

function status_user($type, $id)
{
    switch ($type) {
        case '1':
            $status = '<span class="label label-success change-status" data-id="' . $id . '" data-type="0" title="Non Aktifkan" style="cursor:pointer;">Aktif</span>';
            break;
        case '0':
            $status = '<span class="label label-danger change-status" data-id="' . $id . '" data-type="1" title="Aktifkan" style="cursor:pointer;">Tidak Aktif</span>';
            break;
        default:
            $status = '<span class="label label-success change-status" data-id="' . $id . '" data-type="0" title="Non Aktifkan" style="cursor:pointer;">Aktif</span>';
            break;
    }
    return $status;
}

function button_theme($type)
{
    switch ($type) {
        case 'skin-blue':
            $button = 'btn-primary';
            break;
        case 'skin-black':
            $button = 'btn-default';
            break;
        case 'skin-purple':
            $button = 'bg-purple';
            break;
        case 'skin-green':
            $button = 'btn-success';
            break;
        case 'skin-red':
            $button = 'btn-danger';
            break;
        case 'skin-yellow':
            $button = 'btn-warning';
            break;
        case 'skin-blue-light':
            $button = 'btn-primary';
            break;
        case 'skin-black-light':
            $button = 'btn-default';
            break;
        case 'skin-purple-light':
            $button = 'bg-purple';
            break;
        case 'skin-green-light':
            $button = 'btn-success';
            break;
        case 'skin-red-light':
            $button = 'btn-danger';
            break;
        case 'skin-yellow-light':
            $button = 'btn-warning';
            break;
        default:
            $button = 'btn-default';
            break;
    }

    return $button;
}

function button_submit($type)
{
    return '<button type="submit" name="submit" id="button-submit" value="submit" class="btn ' . $type . '">Simpan</button>';
}

function delete_file($path)
{
    if (file_exists($path)) {
        $unlink = unlink($path);
        if ($unlink) {
            return true;
        }
        return false;
    }

    return true;
}
