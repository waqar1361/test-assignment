<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inquiry extends Model {
    
    protected $fillable = ['name', 'email', 'phone', 'message'];
    
    public function scopeSearch($query ,$request)
    {
        
        $keys = explode(' ', $request->search);
        
        $query->where('email', 'like', "%$request->search%");
       
        foreach ($keys as $key)
        {
            $query->orWhere('name', 'like', "%$key%");
            $query->orWhere('email', 'like', "%$key%");
            $query->orWhere('phone', 'like', "%$key%");
        }
        
        return $query;
    }
    
}
