<?php

return [
    'stub-path' => resource_path('stubs'),
    'getColumn' => [
        'columnInfoHandle' => function (\Doctrine\DBAL\Schema\Column $column) {
            $info = $column->toArray();
            echo "{label:'$info[comment]',prop:'$info[name]'}," . PHP_EOL;
        }
    ]
];