<?php

namespace App\Model;

class RequestInfoAttachment_provider extends BaseModel
{
    protected $table = 'service_request_info_attachments';

    protected $guarded = array('id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'valid');

    public static function boot()
    {
        parent::providerBoot();
    }

    public function scopeValid($query)
    {
        return $query->where('valid', 1);
    }
}
