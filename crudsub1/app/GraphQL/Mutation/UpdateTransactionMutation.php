<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\TransactionModel;

class UpdateTransactionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateTransactionMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('TransactionType');
    }

    public function args()
    {
        return [
            'transaction_id' => [
                'type' => Type::nonNull(Type::int())
            ],
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
        $data = TransactionModel::where('transaction_id', $args['transaction_id'])->first();
        if ($data) {
            $data->invoice_code = $args['invoice_code'];
            $data->customer_id = $args['customer_id'];
            $data->service_id = $args['service_id'];
            $data->invoice_total = $args['invoice_total'];
            $data->payment_tax = $args['payment_tax'];
            $data->surcharge = $args['surcharge'];
            $data->payment_status= $args['payment_status'];

            $data->save();

            return $data;
        }

        else {
            return [];
        }
    }
}
