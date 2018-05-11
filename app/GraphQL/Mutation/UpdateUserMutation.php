<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUser',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('updateusers');
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
