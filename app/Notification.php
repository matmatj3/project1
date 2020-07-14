<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    
	/**
     * Class for notification object that goes with the notifications table
     *
     * 
     */
	
	protected $fillable = [
        'user_id', 
		'status', 
    ];
}
