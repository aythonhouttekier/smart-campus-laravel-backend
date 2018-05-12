<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;


class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'A query of users'
    ];

    public function type()
    {
        return GraphQL::type('user');
        //return Type::listOf(Type::string());
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'name' => [
                'type' => Type::nonNull(Type::varchar(191))

            ],
            'email' => [
                'type' => Type::varchar(191)
            ],
        /*  'password' => [
                'type' => Type::varchar(191)
            ],
             'remember_token' => [
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

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) {
            return User::find($args['id']);
        }

        else if(isset($args['name'])) {
            return User::find($args['name']);
        } 
        
        else if(isset($args['email'])) {
            return User::find($args['email']);
        } 

      //  else if(isset($args['password'])) {
      //      return user::find($args['password']);
      //  } 
              
        else { 
            return User::all();
        }

    }
}
