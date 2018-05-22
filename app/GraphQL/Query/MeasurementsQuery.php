<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\measurements;

class MeasurementsQuery extends Query
{
    protected $attributes = [
        'name' => 'MeasurementsQuery',
        'description' => 'A MeasurementsQuery'
    ];

    public function type()
    {
        return GraphQL::type('measurements');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of measerument'
            ],
            'value' => [
                'type' => Type::int(),
                'description' => 'The value of measurement'
            ],
            'sensor_id' => [
                'type' => Type::int(),
                'description' => 'The sensor_id'
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
            //     'type' => GraphQL::type('sensors'),
            //     'description' => 'The sensorid of measurement'
            // ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) {
            return measurements::find($args['id']);
            return  $root->sensors->where('id', $args['id']);
        }

        else if(isset($args['value'])) {
            return measurements::find($args['value']);
        } 
        
        else if(isset($args['sensor_id'])) {
            return measurements::find($args['sensor_id']);
        } 

        else { 
            return measurements::all();
            return $root->sensors;
        }    

    }
}
