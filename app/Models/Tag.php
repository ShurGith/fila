<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    
    class Tag extends Model
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
          'category_id',
        ];
        protected $casts = [
          'id' => 'integer',
          'icon_active' => 'boolean',
          'category_id' => 'integer',
        ];
        
        public function products(): belongsToMany
        {
            return $this->belongsToMany(Product::class, 'product_tag', '`product_id', 'tag_id');
            
        }
        
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }
    }
