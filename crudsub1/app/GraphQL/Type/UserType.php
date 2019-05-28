<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'customer_id' => [
            	'type' => Type::int()
            ],
            'customer_code' => [
            	'type' => Type::string()
            ],
            'customer_name' => [
            	'type' => Type::string()
            ],
            'customer_address' => [
            	'type' => Type::string()
            ],
            'customer_district' => [
            	'type' => Type::string()
            ],
            'customer_city' => [
            	'type' => Type::string()
            ],
            'customer_province' => [
            	'type' => Type::string()
            ],
            'customer_postalcode' => [
            	'type' => Type::string()
            ],
            'customer_email' => [
            	'type' => Type::string()
            ],
            'customer_password' => [
            	'type' => Type::string()
            ]
        ];
    }
}
