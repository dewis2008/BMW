<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'email',
    'phone',
    'vehicle_model',
    'service_required',
    'preferred_contact_method',
    'message',
    'status',
    'ip_address',
    'user_agent',
])]
class QuoteRequest extends Model
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
