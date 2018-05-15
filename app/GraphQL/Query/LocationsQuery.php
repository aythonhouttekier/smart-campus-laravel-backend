<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\locations;

class LocationsQuery extends Query
{
    protected $attributes = [
        'name' => 'LocationsQuery',
        'description' => 'A query for locations'
    ];

    public function type()
    {
        return GraphQL::type('locations');
    }

    public function args()
    {
        return [
            
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of location'
            ],
            'name' => [
                'type' => Type::nonNull(Type::varchar(45)),
                'description' => 'The name of location'
            ],
            'roomnumber' => [
                'type' => Type::nonNull(Type::varchar(16)),
                'description' => 'The roomnumber'
            ],
            'description' => [
                'type' => Type::nonNull(Type::varchar(100)),
                'description' => 'The description'
            ],
            'devices' => [
                'type' => Type::listof(GraphQL::type('devices')),
                'description' => 'The devices from the location'
            ]

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
        if(isset($args['id'])) {
            return locations::find($args['id']);
        }

        else if(isset($args['name'])) {
            return locations::find($args['name']);
        } 
        
        else if(isset($args['roomnumber'])) {
            return locations::find($args['roomnumber']);
        } 
        else if(isset($args['description'])) {
            return locations::find($args['description']);
        } 
        else if(isset($args['devices'])) {
            return locations::find($args['devices']);
        } 

        else { 
            return locations::all();
        }

        
    }
}
