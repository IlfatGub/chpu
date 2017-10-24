<?php

return [
    'admin/index' => 'admin/index',
    'admin/delete/([0-9]+)' => 'admin/details/$1',
    'admin/parameter/([0-9]+)/delete/([0-9]+)' => 'admin/parameter/$1/$2',
    'admin/parameter/([0-9]+)' => 'admin/parameter/$1',
    'admin/details' => 'admin/details',

    'admin/for/([0-9]+)' => 'admin/for/$1',
    'admin/for' => 'admin/for',

    'for/([0-9]+)/parameter/([0-9]+)' => 'chpu/parameter/$1/$2',
    'for/([0-9]+)' => 'chpu/for/$1',

    'save/delete/([0-9]+)' => 'save/delete/$1',

    'add' => 'chpu/add',

    '' => 'chpu/index',
    'chpu' => 'news/index',

];