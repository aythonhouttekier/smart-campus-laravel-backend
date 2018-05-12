<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\sensors;

class SensorQuery extends Query
{
    protected $attributes = [
        'name' => 'SensorQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('sensors');
    }

    public function args()
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

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) {
            return devices::find($args['id']);
        }

        else if(isset($args['name'])) {
            return devices::find($args['name']);
        } 
        
        else if(isset($args['measurements'])) {
            return devices::find($args['measurements']);
        } 
       
        else if(isset($args['devices'])) {
            return devices::find($args['devices']);
        } 

        else { 
            return devices::all();
        }    }
}
