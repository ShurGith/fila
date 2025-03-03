<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    
    class Generaloptions extends Model
    {
        public $timestamps = false;
        
        protected $fillable = [
          'name',
          'active'
        ];
        
        protected $casts = [
          'name' => 'string',
          'active' => 'boolean',
        ];
        
        public static function get($key, $default = null)
        {
            return self::where('name', $key)->value('active') ?? $default;
        }
        
        public static function set($key, $value)
        {
            return self::updateOrCreate(['name' => $key], ['active' => $value]);
        }
    }
