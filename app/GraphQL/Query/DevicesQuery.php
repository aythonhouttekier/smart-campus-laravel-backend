<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use app\devices;

class DevicesQuery extends Query
{
    protected $attributes = [
        'name' => 'DevicesQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('DevicesType');
        //return Type::listOf(Type::string());
    }

    public function args()
    {
        return [
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return [];
    }
}
