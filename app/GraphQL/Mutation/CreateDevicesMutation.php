<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\devices;

class CreateDevicesMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateDevicesMutation',
        'description' => 'A mutation for devices'
    ];

    public function type()
    {
        return Type::listOf(Type::string());
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
            'location_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'location_id',
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
        $device = new devices();
        $device->fill($args);
        $device->save();
        return $device;
    }
}
