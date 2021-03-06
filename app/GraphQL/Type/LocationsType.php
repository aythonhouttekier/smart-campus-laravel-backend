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
        'description' => 'A location type',
        'model' => locations::class

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
            'devices' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id of device',
                    ],
                ],
                'type'        => Type::listOf(GraphQL::type('devices')),
                'description' => 'The device from the locations',
            ],
            
        ];
    }
}
