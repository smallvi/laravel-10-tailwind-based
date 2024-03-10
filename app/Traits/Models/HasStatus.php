<?php

namespace App\Traits\Models;

use App\Helpers\Status;

trait HasStatus
{
    // Function
    public function getStatusBadgeAttribute()
    {
        $config = Status::getStatusBadgeConfig($this->status);
        return '<span class="' . $config['class'] . '">' . $config['text'] . '</span>';
    }

    // Scope
    public function scopeActive($query)
    {
        return $query->where('status', Status::STATUS_ACTIVE);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', Status::STATUS_INACTIVE);
    }

    public function scopePending($query)
    {
        return $query->where('status', Status::STATUS_PENDING);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', Status::STATUS_COMPLETED);
    }
}
