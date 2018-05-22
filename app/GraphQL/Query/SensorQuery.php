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
            'measurement_unit' => [
                'type' => Type::string(),
                'description' => 'The unit of measurement'
            ],
            'devices_id' => [
                'type' => Type::string(),
                'description' => 'The id of sensor'
            ],
            // 'created_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'created at',
            // ],
            // 'updated_at' => [
            //     'type' => Type::timestamp(),
            //     'description' => 'updated at'
            // ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) {
            return sensors::find($args['id']);
            return  $root->measurements->where('id', $args['id']);
            return  $root->devices->where('id', $args['id']);
        }

        else if(isset($args['name'])) {
            return sensors::find($args['name']);
        } 
        
        else if(isset($args['measurement_unit'])) {
            return sensors::find($args['measurement_unit']);
        } 
       
        else if(isset($args['devices_id'])) {
            return sensors::find($args['devices_id']);
        } 

        else { 
            return sensors::all();
        }    
    }
}
