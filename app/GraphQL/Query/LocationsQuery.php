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
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('locations');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of location'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of location'
            ],
            'roomnumber' => [
                'type' => Type::float(),
                'description' => 'The roomnumber'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description'
            ],
        
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) {
            return locations::find($args['id']);
            return  $root->devices->where('id', $args['id']);

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
        
        else { 
            return locations::all();
            return $root->devices;

        }    
    }
}
