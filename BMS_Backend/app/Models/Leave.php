<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leaves';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'date',
    ];

    public function employee() // Assuming a foreign key referencing employees
    {
        return $this->belongsTo(Employee::class); // Belongs to an Employee
    }

}
