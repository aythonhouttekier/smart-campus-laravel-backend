<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class DevicesType extends BaseType
{
    protected $attributes = [
        'name' => 'DevicesType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            
        ];
    }
}
