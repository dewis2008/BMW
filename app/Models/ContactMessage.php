<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'email_or_phone',
    'message',
    'status',
    'ip_address',
    'user_agent',
])]
class ContactMessage extends Model
{
    public const StatusNew = 'new';

    public const StatusContacted = 'contacted';

    public const StatusCompleted = 'completed';

    public const StatusArchived = 'archived';

    public static function statuses(): array
    {
        return [
            self::StatusNew,
            self::StatusContacted,
            self::StatusCompleted,
            self::StatusArchived,
        ];
    }
}
