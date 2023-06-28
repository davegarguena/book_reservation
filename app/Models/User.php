<?php

//Models deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{ 

 public $timestamps = false; // <-- para dili na need ang updated at @ created at column

 protected $primaryKey = 'reservation_id'; //<-- this is a primary key

//name of table
 protected $table = 'bookreservation';

 // column sa table
 protected $fillable = [

 'user_name', 'book_name', 'reservation_date', 'return_date'
 ];
 }
