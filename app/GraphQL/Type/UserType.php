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
        'description' => 'A type of user'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'name' => [
                'type' => Type::nonNull(Type::varchar(191))

            ],
            'email' => [
                'type' => Type::nonNull(Type::varchar(191))
            ],
            'password' => [
                'type' => Type::nonNull(Type::varchar(191))
            ],
     /*        'remember_token' => [
                'type' => Type::varchar(100)
            ],
            'created_at' => [
                'type' => Type::timestamp()
            ],
            'updated_at' => [
                'type' => Type::timestamp()
            ], */

        ];
    }
}
