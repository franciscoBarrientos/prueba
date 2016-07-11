<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    //
    protected $table = "tenders";

    protected $fillable = ['externalCode'
                            , 'name'
                            , 'stateCode'
                            , 'closingDate'
                            , 'registrationDate'];

    public $timestamps = false;
}
