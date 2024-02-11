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

function get_all_parent_cat_ids($cats, $cat_id, & $list = []) {
    $list[] = $cat_id;
    foreach($cats as $cat) {
        if($cat['parent_id'] === $cat_id) {
            get_all_parent_cat_ids($cats, $cat['id'], $list);
        }
    }

    return $list;
}

function get_flat_parents($cats, $cat_id, & $list = []) {
    foreach($cats as $cat) {
        if($cat['id'] === $cat_id) {
            $list[] = $cat;
            get_flat_parents($cats, $cat['parent_id'], $list);
        }
    }

    return $list;
}
