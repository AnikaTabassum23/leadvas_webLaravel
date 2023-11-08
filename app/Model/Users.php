<?php

namespace App\Model;
use App\Model\BaseModel;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Users extends BaseModel implements JWTSubject
{
    protected $table = 'users';
    public $connection = "mysql2";
    protected $guarded = array('id', 'created_at', 'created_by', 'created_by_type', 'updated_at', 'updated_by', 'updated_by_type', 'deleted_at', 'deleted_by', 'deleted_by_type');

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}