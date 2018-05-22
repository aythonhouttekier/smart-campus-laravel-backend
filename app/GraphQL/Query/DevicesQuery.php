<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\devices;
use App\sensors;
use App\locations;

class DevicesQuery extends Query
{
    protected $attributes = [
        'name' => 'DevicesQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('devices');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of device'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of device'
            ],
            'dev-eui' => [
                'type' => Type::string(),
                'description' => 'The dev-uit code'
            ],
            // 'location_id' => [
            //     'type' => Type::int(),
            //     'description' => 'The location id'
            // ],
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
            //     'description' => 'The sensors from the device'
            // ],
            // 'locations' => [
            //     'type' => GraphQL::type('locations'),
            //     'description' => 'The location of the device'
            // ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        // $fields = $info->getFieldSelection($depth = 5);

        // $devices = devices::query();

        // foreach ($fields as $field => $keys) {
        //     if ($field === 'sensors') {
        //         $devices->with('sensors');
        //     }
        // }   
        if (isset($args['id'])) {
                return devices::find($args['id']);
                return  $root->sensors->where('id', $args['id']);
            }
        
            
                
        else if(isset($args['name'])) {
            return devices::find($args['name']);
        } 
        
        else if(isset($args['dev-eui'])) {
            return devices::find($args['dev-eui']);
        } 
        else if(isset($args['location_id'])) {
            return devices::find($args['location_id']);
        } 
        // else if(isset($args['sensors'])) {
        //     return sensors::find($args['sensors']);
        // } 
        // else if(isset($args['locations'])) {
        //     return locations::find($args['locations']);
        // } 
       
        else { 
            return devices::all();
            return $root->sensors;
        }

        
       
    }
}
