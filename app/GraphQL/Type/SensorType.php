<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class SensorType extends BaseType
{
    protected $attributes = [
        'name' => 'SensorType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            
        ];
    }
}
