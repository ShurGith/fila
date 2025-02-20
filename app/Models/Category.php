<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    
    class Category extends Model
    {
        use HasFactory;
        
        public $timestamps = false;
        
        protected $fillable = [
          'name',
          'bgcolor',
          'color',
          'image',
          'icon',
          'icon_active',
        ];
        protected $casts = [
          'id' => 'integer',
          'icon_active' => 'boolean',
        ];
        
        public function tags(): HasMany
        {
            return $this->hasMany(Tag::class);
        }
        
        public function products()
        {
            return $this->belongsToMany(Product::class, 'category_product', 'product_id', 'category_id');
        }
    }
