<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\TransactionModel;

class CreateTransactionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateTransactionMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
       return GraphQL::type('TransactionType');
    }

    public function args()
    {
        return [
            'invoice_code' => [
                'type' => Type::nonNull(Type::string())
            ],
            'customer_id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'service_id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'invoice_total' => [
                'type' => Type::nonNull(Type::int())
            ],
            'payment_tax' => [
                'type' => Type::nonNull(Type::int())
            ],
            'surcharge' => [
                'type' => Type::nonNull(Type::int())
            ],
            'payment_status' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $data = new TransactionModel;
        $data->fill($args);
        $data->save();

        return $data;
    }
}
