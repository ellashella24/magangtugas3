<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\UserModel;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('UserType');
    }

    public function args()
    {
        return [
            'customer_id' => Type::nonNull(Type::int())
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $data = UserModel::where('customer_id', $args['customer_id'])->first();

        if ($data) {
            return $data;
        }

        else {
            return [];
        }
    }
}
