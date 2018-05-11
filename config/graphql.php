<?php

use App\GraphQL\Query\UserQuery;
use App\GraphQL\Type\UserType;
use App\GraphQL\Mutation\CreateUserMutation;
use App\GraphQL\Mutation\UpdateUserMutation;
use App\GraphQL\Query\DevicesQuery;
use App\GraphQL\Type\DevicesType;
use App\GraphQL\Mutation\CreateDevicesMutation;

return [

   
    'prefix' => 'graphql',

    'domain' => null,

    'routes' => '{graphql_schema?}',

    'controllers' => \Folklore\GraphQL\GraphQLController::class.'@query',

   
    'variables_input_name' => 'variables',

    'middleware' => [],

    'middleware_schema' => [
        'default' => [],
    ],

    'headers' => [],

    'json_encoding_options' => 0,

    'graphiql' => [
        'routes' => '/graphiql/{graphql_schema?}',
        'controller' => \Folklore\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'composer' => \Folklore\GraphQL\View\GraphiQLComposer::class,
    ],

  



    'schema' => 'default',

    'schemas' => [
        'default' => [
            'query' => [
                'usersQuery' => App\GraphQL\Query\UserQuery::class,
                'devicesQuery' => App\GraphQL\Query\DevicesQuery::class,
            ],
            'mutation' => [
                'createUser' => App\GraphQL\Mutation\CreateUserMutation::class,
                'updateUser' => App\GraphQL\Mutation\UpdateUserMutation::class,
                'createDevice' => App\GraphQL\Mutation\CreateDevicesMutation::class, 
            ]
            ]
        ],
        
    'types' => [
        'usersType' => app\GraphQL\Type\UserType::class,
        'devicesType' => App\GraphQL\Type\DevicesType::class
    ],
       




    'resolvers' => [
        'default' => [
        ],
    ],

    'defaultFieldResolver' => null,


    
    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

   
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];
