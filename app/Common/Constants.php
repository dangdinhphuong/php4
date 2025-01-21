<?php

namespace App\Common;

class Constants{
    const DISABLE = 2;
    const ENABLED = 1;
    const DISABLE_ACCOUNT = 0;
    const ENABLED_ACCOUNT = 1;

    const STATUS_CUSTOMER = [
        self::DISABLE => 'Inactive',
        self::ENABLED => 'Active',
    ];

    const STATUS_PRODUCTS = [
        self::DISABLE_ACCOUNT => 'Inactive',
        self::ENABLED_ACCOUNT => 'Active',
    ];

    const STATUS_BLOGS = [
        self::DISABLE_ACCOUNT => 'Post not approved',
        self::ENABLED_ACCOUNT => 'Post approved',
    ];

    const CUSTOMER = 0;
    const ADMIN = 1;
    const ACCOUNTANT = 2;

    const ROLE = [
        self::ADMIN => 'Senior manager',
        self::ACCOUNTANT => 'Accountant',
        self::CUSTOMER => 'User',
    ];


    const WAIT_FOR_CONFIRMATION = 0;
    const CONFIRMED = 1;
    const PACKING = 2;
    const Being_transported =3;
    const Delivered =4;
    const Delivery_Successful =5;
    const Delivery_failed =6;
    const Cancel_order =6;

    const STATUS_ORDER = [
        self::WAIT_FOR_CONFIRMATION => 'Waiting for confirmation',
        self::CONFIRMED => 'Confirmed',
        self::PACKING => 'Packing',
        self::Being_transported => 'In transit',
        self::Delivered => 'Delivered',
        self::Delivery_Successful => 'Delivery successful',
        self::Delivery_failed => 'Delivery failed',
        self::Cancel_order => 'Order canceled'
    ];

    const STATUS_CONTACT = [
        self::WAIT_FOR_CONFIRMATION => 'Waiting for confirmation',
        self::CONFIRMED => 'Confirmed',
        self::PACKING => 'Canceled'
    ];

}
