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
        'description' => 'A UserQuery'
    ];

    public function type()
    {
        return GraphQL::type('User');

    }

    public function args()
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

        else if(isset($args['password'])) {
             return User::find($args['password']);
        } 

        else if(isset($args['remember_token'])) {
            return User::find($args['remember_token']);
        }
       
        else { 
            return User::all();
        }

    }
}
