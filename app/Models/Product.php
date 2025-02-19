<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    
    class Product extends Model
    {
        use HasFactory;
        
        protected $fillable = [
          'name',
          'description',
          'price',
          'active',
          'oferta',
          'descuento',
          'units',
          'user_id',
        ];
        
        protected $casts = [
          'id' => 'integer',
          'active' => 'boolean',
          'oferta' => 'boolean',
          'user_id' => 'integer',
        ];
        
        public function imageproducts(): HasMany
        {
            return $this->hasMany(Imageproduct::class);
        }
        
        public function tags(): BelongsToMany
        {
            return $this->belongsToMany(Tag::class);
        }
        
        public function categories(): BelongsToMany
        {
            return $this->belongsToMany(Category::class);
        }
        
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    }
