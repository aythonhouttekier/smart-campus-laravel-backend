<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\locations;

class LocationsType extends BaseType
{
    protected $attributes = [
        'name' => 'LocationsType',
        'description' => 'A type of location',
        'model' => locations::class
    ];

    public function fields()
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
            'created_at' => [
                'type' => Type::timestamp(),
                'description' => 'created at',
            ],
            'updated_at' => [
                'type' => Type::timestamp(),
                'description' => 'updated at'
            ],
            'devices' => [
                'type' => Type::listof(GraphQL::type('devices')),
                'description' => 'The devices from the location'
            ]
            
        ];
    }
}