<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use app\User;


class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateUserMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('UserType');
        //return Type::listOf(Type::string());
    }

    public function args()
    {
        return [
            'name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'type' => Type::nonNull(Type::varchar(191)),
                'rules' => ['email', 'unique:users']
            ],
            'password' => [
                'type' => Type::nonNull(Type::varchar(191)),
              //'rules' => ['min:4']
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = new User();
        $user->fill($args);
        $user->save();
        return $user;
    }
}
