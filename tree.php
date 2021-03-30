<?php

$pages = [
    0 => [
        'id' => 1,
        'title' => 'Головна сторінка',
        'parent_id' => 0,
    ],
    1 => [
        'id' => 2,
        'title' => 'Блог',
        'parent_id' => 1
    ],
    2 => [
        'id' => 3,
        'title' => 'Категорії товарів',
        'parent_id' => 1
    ],
    3 => [
        'id' => 4,
        'title' => 'Доставка товарів',
        'parent_id' => 1
    ],
    4 => [
        'id' => 5,
        'title' => 'Стаття 1',
        'parent_id' => 2
    ],
    5 => [
        'id' => 6,
        'title' => 'Стаття 2',
        'parent_id' => 2
    ],
    6 => [
        'id' => 7,
        'title' => 'Товар 1',
        'parent_id' => 3
    ],
    7 => [
        'id' => 8,
        'title' => 'Товар 2',
        'parent_id' => 3
    ],
    8 => [
        'id' => 9,
        'title' => 'Пошта',
        'parent_id' => 4
    ],
    9 => [
        'id' => 10,
        'title' => 'Кур’єр',
        'parent_id' => 4
    ],
];


function createTree($pages){
    $parents_arr = [];
    foreach($pages as $key => $item){
        $parents_arr[$item['parent_id']][$item['id']] = $item;
    }
    $treeElement = $parents_arr[0];
    generateElementTree($treeElement, $parents_arr);
    return $treeElement;

}

function generateElementTree(&$treeElement, $parents_arr) {
    foreach($treeElement as $key => $item){
        if(!isset($item['children'])){
            $treeElement[$key]['children'] = [];
        }
        if(array_key_exists($key, $parents_arr)){
            $treeElement[$key]['children'] = $parents_arr[$key];
            generateElementTree($treeElement[$key]['children'], $parents_arr);

        }
    }

}

$tree = createTree($pages);
echo "<pre>";
print_r($tree);
echo "</pre>";