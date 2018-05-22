<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\devices;


class DevicesType extends BaseType
{
    protected $attributes = [
        'name' => 'DevicesType',
        'description' => 'A devicetype',
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
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of device'
            ],
            'dev-eui' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The dev-uit code'
            ],
            
            'locations_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The location id'
            ],

            'sensors' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id of sensor',
                    ],
                ],
                'type'        => Type::listOf(GraphQL::type('sensors')),
                'description' => 'The sensors from the device',
            ],

            'locations' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id of locations',
                    ],
                ],
                'type'        => GraphQL::type('locations'),
                'description' => 'The sensors from the device',
            ],
           
            // 'created_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'created at',
            // ],
            // 'updated_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'updated at'
            // ],
            // 'sensors' => [
            //     'type' => Type::listof(GraphQL::type('sensors')),
            //     'description' => 'The sensors from the device',
            //     'resolve' => function($data, $args) {
            //         return $data->sensors()->get();
            //     }
            // ],
            // 'locations' => [
            //     'type' => GraphQL::type('locations'),
            //     'description' => 'The location of the device'
            // ]
        ];
        
    }       
}
