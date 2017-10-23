<?php

return [
    'for/([0-9]+)/parameter/([0-9]+)' => 'chpu/parameter/$1/$2',
    'for/([0-9]+)' => 'chpu/for/$1',


    'save/delete/([0-9]+)' => 'save/delete/$1',

    'add' => 'chpu/add',

    '' => 'chpu/index',
    'chpu' => 'news/index',

    'news/page-([0-9]+)' => 'news/index/$1',
//    'parameter/([0-9]+)/page-([0-9]+)' => 'news/view/$1/$2',
    'products' => 'products/list',
];