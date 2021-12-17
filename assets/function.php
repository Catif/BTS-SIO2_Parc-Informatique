<?php

function create_box(array $equipement, string $type, int $id){
    $id++;
    $equipement['CREATED_AT'] = new DateTime($equipement['CREATED_AT']);
    $equipement['CREATED_AT'] = $equipement['CREATED_AT']->format('d/m/Y à H:i');
    $equipement['EDITED_AT'] = new DateTime($equipement['EDITED_AT']);
    $equipement['EDITED_AT'] = $equipement['EDITED_AT']->format('d/m/Y à H:i');
    require __DIR__ . '/components/box.php';
}