<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\User;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'A UserType'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'name' => [
                'type' => Type::string()
            ],
            'email' => [
                'type' => Type::string()
            ],
            'password' => [
                'type' => Type::string()
            ],
            'remember_token' => [
                'type' => Type::string()
            ],
            // 'created_at' => [
            //     'type' => Type::Timestamp()
            // ],
            // 'updated_at' => [
            //     'type' => Type::Timestamp()
            // ]
        ];
    }
}
