<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\Transaction as Authenticable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Transaction extends model{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'transactions'; // Specify the table name
    protected $primaryKey ='ID';
    protected $fillable = ['ID','Date', 'Product', 'Transactor', 'Qty', 'Price', 'Type']; // Specify fillable columns
}
