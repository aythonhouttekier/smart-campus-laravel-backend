<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserMutation',
        'description' => 'update the user'
    ];

    public function type()
    {
        return GraphQL::type('updateUser');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int())
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'type' => Type::varchar(191)
            ],
            'password' => [
                'type' => Type::varchar(191)
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = User::find($args['id']);
        if (!$user) {
            return null;
        }
        $user->name = $args['name'];
        $user->save();
        return $user;
    }
}
