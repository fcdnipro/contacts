<?php

namespace Fcdniproua\Contacts\Models;

use Illuminate\Database\Eloquent\Model;
use Fcdniproua\Contacts\Models\Phone;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact';
    protected $fillable = ['last_name', 'first_name'];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
