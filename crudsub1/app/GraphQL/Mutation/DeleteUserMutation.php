<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\UserModel;

class DeleteUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'DeleteUserMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('UserType');
    }

    public function args()
    {
        return [
            'customer_id' => ['name' => 'customer_id', 'type' => Type::nonNull(Type::int())]
        ];
    }

    public function resolve($root, $args)
    {
        $data = UserModel::find($args['customer_id']);

        if ($data) {
            $delete = $data->toArray();
            $data->delete();

            return $delete;
        }

        else {
            return [];
        }

        
    }
}
