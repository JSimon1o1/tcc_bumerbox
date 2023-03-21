<?php

namespace App\Traits;

trait AuditionUsers
{
    public static function bootAuditionUsers(): void
    {
        self::createdBy();
        self::updatedBy();
        self::modifiedBy();
        self::deletedBy();
    }

    public static function createdBy(): void
    {
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = 1;
            }
        });
    }

    public static function updatedBy(): void
    {
        static::creating(function ($model) {
            if ($model->timestamps && !$model->isDirty('updated_by')) {
                $model->updated_by = 1;
            }
        });
    }

    public static function modifiedBy(): void
    {
        static::updating(function ($model) {
            if ($model->timestamps && !$model->isDirty('updated_by')) {
                $model->updated_by = 1;
            }
        });
    }

    public static function deletedBy(): void
    {
        static::deleting(function ($model) {
            if ($model->timestamps && !$model->isDirty('deleted_by')) {
                $model->updated_by = 1;
            }
        });
    }
}
