<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\locations;

class LocationsType extends BaseType
{
    protected $attributes = [
        'name' => 'LocationsType',
        'description' => 'A location type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of location'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of location'
            ],
            'roomnumber' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'The roomnumber'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The description'
            ],
            // 'created_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'created at',
            // ],
            // 'updated_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'updated at'
            // ],
            // 'devices' => [
            //     'type' => Type::listof(GraphQL::type('devices')),
            //     'description' => 'The devices from the location'
            // ]
        ];
    }
}
