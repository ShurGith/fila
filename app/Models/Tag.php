<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    
    class Tag extends Model
    {
        use HasFactory;
        
        /**
         * Indicates if the model should be timestamped.
         *
         * @var bool
         */
        public $timestamps = false;
        
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
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
        
        public function products(): HasMany
        {
            return $this->hasMany(Product::class);
        }
        
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }
    }
