<?php

use App\GraphQL\Query\UserQuery;
use App\GraphQL\Query\DevicesQuery;
use App\GraphQL\Query\LocationsQuery;
use App\GraphQL\Query\MeasurementsQuery;
use App\GraphQL\Query\SensorQuery;

use App\GraphQL\Type\UserType;
use App\GraphQL\Type\DevicesType;
use App\GraphQL\Type\LocationsType;
use App\GraphQL\Type\MeasurementsType;
use App\GraphQL\Type\SensorsType;

use App\GraphQL\Mutation\CreateUserMutation;
use App\GraphQL\Mutation\UpdateUserMutation;
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
                'UsersQuery' => App\GraphQL\Query\UserQuery::class,
                'DevicesQuery' => App\GraphQL\Query\DevicesQuery::class,
                'LocationsQuery' => App\GraphQL\Query\LocationsQuery::class,
                'MeasurementsQuery' => App\GraphQL\Query\MeasurementsQuery::class,
                'SensorQuery' => App\GraphQL\Query\SensorQuery::class,
            ],
            'mutation' => [
                'CreateUserMutation' => App\GraphQL\Mutation\CreateUserMutation::class,
                'UpdateUserMutation' => App\GraphQL\Mutation\UpdateUserMutation::class,
                'createDevice' => App\GraphQL\Mutation\CreateDevicesMutation::class, 
            ]
            ]
        ],
        
    'types' => [
        'UsersType' => app\GraphQL\Type\UserType::class,
        'DevicesType' => App\GraphQL\Type\DevicesType::class,
        'LocationsType' => App\GraphQL\Type\LocationsType::class,
        'MeasurementsType' => App\GraphQL\Type\MeasurementsType::class,
        'SensorType' => App\GraphQL\Type\SensorType::class
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
