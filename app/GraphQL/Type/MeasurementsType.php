<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\measurements;

class MeasurementsType extends BaseType
{
    protected $attributes = [
        'name' => 'MeasurementsType',
        'description' => 'A Measurementstype'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of measerument'
            ],
            'value' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The value of measurement'
            ],
            'sensor_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The sensor_id'
            ],
            // 'created_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'created at'
            // ],
            // 'updated_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'updated at'
            // ],
            // 'sensors' => [
            //     'type' => GraphQL::nonNull(Type::type('sensors')),
            //     'description' => 'The sensorid of measerurment'
            // ]
        ];
    }
}
