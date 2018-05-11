<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\devices;

class DevicesType extends BaseType
{

    protected $attributes = [
        'name' => 'devicesType',
        'description' => 'A type',
        'model' => devices::class
    ];

    public function fields()
    {
        return [

            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of device'
            ],
            'name' => [
                'type' => Type::nonNull(Type::varchar(45)),
                'description' => 'The name of device'
            ],
            'dev-eui' => [
                'type' => Type::nonNull(Type::varchar(16)),
                'description' => 'The dev-uit code'
            ],
         //   'location_id' => [
         //       'type' => Type::nonNull(Type::int()),
         //       'description' => 'The location id'
         //   ],
            'created_at' => [
                'type' => Type::timestamp(),
                'description' => 'created at',
            ],
            'updated_at' => [
                'type' => Type::timestamp(),
                'description' => 'updated at'
            ],
            'sensors' => [
                'type' => Type::listof(GraphQL::type('sensors')),
                'description' => 'The sensors from the device'
            ],
            'locations' => [
                'type' => GraphQL::type('locations'),
                'description' => 'The location of the device'
            ]
        ];
    }
}
