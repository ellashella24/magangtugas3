<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\UserModel;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('UserType');
    }

    public function args()
    {
        return [
            'customer_id' => [
                'type' => Type::nonNull(Type::int())
            ],
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
        $data = UserModel::where('customer_id', $args['customer_id'])->first();
        if ($data) {
            $data->customer_code = $args['customer_code'];
            $data->customer_name = $args['customer_name'];
            $data->customer_address = $args['customer_address'];
            $data->customer_district = $args['customer_district'];
            $data->customer_city = $args['customer_city'];
            $data->customer_province = $args['customer_province'];
            $data->customer_postalcode= $args['customer_postalcode'];
            $data->customer_email = $args['customer_email'];
            $data->customer_password = $args['customer_password'];

            $data->save();

            return $data;
        }

        else {
            return [];
        }
    }
}
