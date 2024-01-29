<?php

function app_get_tree($cats, $parent_id = null) {
    $list = [];

    foreach($cats as $cat) {
        if($cat['parent_id'] === $parent_id) {
            $cat['children'] = app_get_tree($cats, $cat['id']);
            $list[] = $cat;
        }
    }

    return $list;
}
