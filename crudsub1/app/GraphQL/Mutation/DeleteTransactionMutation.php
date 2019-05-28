<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\TransactionModel;

class DeleteTransactionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'DeleteTransactionMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('TransactionType');
    }

    public function args()
    {
        return [
            'transaction_id' => ['name' => 'transaction_id', 'type' => Type::nonNull(Type::int())]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $data = TransactionModel::find($args['transaction_id']);

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
