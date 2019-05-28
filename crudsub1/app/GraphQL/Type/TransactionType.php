<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class TransactionType extends BaseType
{
    protected $attributes = [
        'name' => 'TransactionType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'transaction_id' => [
                'type' => Type::int()
            ],
            'invoice_code' => [
                'type' => Type::string()
            ],
            'customer_id' => [
                'type' => Type::int()
            ],
            'service_id' => [
                'type' => Type::int()
            ],
            'invoice_total' => [
                'type' => Type::int()
            ],
            'payment_tax' => [
                'type' => Type::int()
            ],
            'surcharge' => [
                'type' => Type::int()
            ],
            'payment_status' => [
                'type' => Type::int()
            ]  
        ];
    }
}
