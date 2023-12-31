<?php

namespace App\Model;
use App\Model\BaseModel;

class CostCalculationItem extends BaseModel{
    
    protected $table = 'cost_calculation_item';

    protected $guarded = array('id', 'created_at', 'created_by', 'created_by_type', 'updated_at', 'updated_by', 'updated_by_type', 'deleted_at', 'deleted_by', 'deleted_by_type', 'valid');

    public static function boot()
    {
        parent::providerBoot(2);
    }

    public function scopeValid($query)
    {
        return $query->where('valid', 1);
    }
}