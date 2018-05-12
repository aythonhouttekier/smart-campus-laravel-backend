<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\sensors;

class SensorType extends BaseType
{
    protected $attributes = [
        'name' => 'SensorType',
        'description' => 'A type of sensor'
    ];

    public function fields()
    {
        return [
          
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of sensor'
            ],
            'name' => [
                'type' => Type::nonNull(Type::varchar(45)),
                'description' => 'The name of sensor'
            ],
            'created_at' => [
                'type' => Type::timestamp(),
                'description' => 'created at',
            ],
            'updated_at' => [
                'type' => Type::timestamp(),
                'description' => 'updated at'
            ],
            'measurements' => [
                'type' => Type::listof(GraphQL::type('measurements')),
                'description' => 'The the measurementsunit of sensor'
            ],
            'devices' => [
                'type' => GraphQL::type('devices'),
                'description' => 'The device_id from a sensor'
            ]

        ];
    }
}
