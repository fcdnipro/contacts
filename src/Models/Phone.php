<?php

namespace Fcdniproua\Contacts\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phone';
    protected $fillable = ['number', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
