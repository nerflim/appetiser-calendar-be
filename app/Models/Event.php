<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['days'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
      'created_at', 'updated_at'
    ];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['days'];
    /**
     * Set the event's days
     *
     * @param  string  $value
     * @return void
     */
    public function getDaysAttribute()
    {
      $days = array_map(function ($n) {
        return intval($n);
      }, explode(',', $this->attributes['days']));

      return $days;
    }
}