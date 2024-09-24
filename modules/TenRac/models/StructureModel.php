<?php

namespace TenRac\models;

use TenRac\models\DbConnect;

class StructureModel
{
    public function __construct(private DbConnect $connect)
    {
    }
}