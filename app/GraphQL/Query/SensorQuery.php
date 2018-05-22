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
        'description' => 'A SensorQuery'
    ];

    public function type()
    {
        return GraphQL::type('sensors');

        //return Type::listOf(Type::string());
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of sensor'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of sensor'
            ],
            // 'created_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'created at',
            // ],
            // 'updated_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'updated at'
            // ],
            // 'measurements' => [
            //     'type' => Type::listof(GraphQL::type('measurements')),
            //     'description' => 'The the measurements_unit of sensor'
            // ],
            // 'devices' => [
            //     'type' => GraphQL::type('devices'),
            //     'description' => 'The device_id from a sensor'
            // ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) {
            return sensors::find($args['id']);
        }

        else if(isset($args['name'])) {
            return sensors::find($args['name']);
        } 
        
        // else if(isset($args['measurements'])) {
        //     return measurements::find($args['measurements']);
        // } 
       
        // else if(isset($args['devices'])) {
        //     return devices::find($args['devices']);
        // } 

        else { 
            return sensors::all();
        }    
    }
}
