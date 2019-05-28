<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\TransactionModel;

class TransactionQuery extends Query
{
    protected $attributes = [
        'name' => 'TransactionQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('TransactionType');
    }

    public function args()
    {
        return [
            'transaction_id' => Type::nonNull(Type::int())
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $data = TransactionModel::find($args['transaction_id']);

        if ($data) {
            return $data;
        }

        else {
            return [];
        }
    }
}
