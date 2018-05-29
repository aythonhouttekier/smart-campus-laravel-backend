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
        'description' => 'A Sensortype',
        'model' => sensors::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of sensor'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of sensor'
            ],

            'measurement_unit' => [
                'type' => Type::string(),
                'description' => 'The unit of measurement'
            ],
            'devices_id' => [
                'type' => Type::string(),
                'description' => 'The id of sensor'
            ],

            'measurements' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id of sensor',
                    ],
                ],
                'type'        => Type::listOf(GraphQL::type('measurements')),
                'description' => 'The measurements from the device',
            ],

            'devices' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id of locations',
                    ],
                ],
                'type'        => GraphQL::type('devices'),
                'description' => 'The device from the sensors',
            ],

        ];
    }
}
