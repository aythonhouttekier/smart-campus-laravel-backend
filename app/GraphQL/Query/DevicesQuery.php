<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\devices;

class DevicesQuery extends Query
{
    protected $attributes = [
        'name' => 'devicesQuery',
        'description' => 'A query for devices'
    ];

    public function type()
    {
        return GraphQL::type('DevicesType');
    }

    public function args()
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
            /* 'created_at' => [
                'type' => Type::timestamp(),
                'description' => 'created at',
            ],
            'updated_at' => [
                'type' => Type::timestamp(),
                'description' => 'updated at'
            ], */
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

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) {
            return devices::find($args['id']);
        }

        else if(isset($args['name'])) {
            return devices::find($args['name']);
        } 
        
        else if(isset($args['dev-eui'])) {
            return devices::find($args['dev-eui']);
        } 

        else if(isset($args['sensors'])) {
            return devices::find($args['sensors']);
        } 

        else if(isset($args['locations'])) {
            return devices::find($args['locations']);
        } 
      //  else if(isset($args['password'])) {
      //      return user::find($args['password']);
      //  } 
              
        else { 
            return devices::all();
        }


    }
}