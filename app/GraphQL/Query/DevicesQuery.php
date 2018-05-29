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
            'locations_id' => [
                'type' => Type::int(),
                'description' => 'The location id'
            ],
           
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
                return devices::find($args['id']);
                return  $root->sensors->where('id', $args['id']);
                return  $root->locations->where('id', $args['id']);
            }         
                
        else if(isset($args['name'])) {
            return devices::find($args['name']);
        } 
        
        else if(isset($args['dev-eui'])) {
            return devices::find($args['dev-eui']);
        } 
        else if(isset($args['locations_id'])) {
            return devices::find($args['locations_id']);
        } 
               
        else { 
            return devices::all();
            return $root->sensors;
            return $root->locations;
        }

        
       
    }
}
