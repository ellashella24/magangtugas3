<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\UserModel;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateUserMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('UserType');
    }

    public function args()
    {
        return [
            'customer_code' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_name' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_address' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_district' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_city' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_province' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_postalcode' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_email' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_password' => [
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $data = new UserModel;
        $data->fill($args);
        $data->save();

        return $data;
    }
}
