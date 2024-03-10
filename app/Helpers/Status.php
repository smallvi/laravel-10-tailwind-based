<?php

namespace App\Helpers;

class Status
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';

    public static function getStatusBadgeConfig($status)
    {
        $configs = [
            self::STATUS_ACTIVE => [
                'text' => 'Active',
                'class' => 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300'
            ],
            self::STATUS_INACTIVE => [
                'text' => 'Inactive',
                'class' => 'bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300'
            ],
            self::STATUS_PENDING => [
                'text' => 'Pending',
                'class' => 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300'
            ],
            self::STATUS_COMPLETED => [
                'text' => 'Completed',
                'class' => 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300'
            ],
        ];

        return $configs[$status];
    }
}
