<?php
    
    namespace App\Models;
    
    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Filament\Models\Contracts\FilamentUser;
    use Filament\Models\Contracts\HasAvatar;
    use Filament\Panel;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    
    class User extends Authenticatable implements FilamentUser, HasAvatar
    {
        
        use HasFactory, Notifiable;
        
        protected $fillable = [
          'name',
          'email',
          'password',
          'avatar',
        ];
        protected $hidden = [
          'password',
          'remember_token',
        ];
        
        public function canAccessPanel(Panel $panel): bool
        {
            if ($panel->getId() === 'admin') {
                return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
            }
            return true;
        }
        
        public function isAdmin(): bool
        {
            return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
        }
        
        public function getFilamentAvatarUrl(): ?string
        {
            if ($this->avatar) {
                return '/'.$this->avatar;
            } else {
                return null;
            }
        }
        
        public function products(): HasMany
        {
            return $this->hasMany(Product::class);
        }
        
        public function getCountProducts(): int
        {
            return Product::where('user_id', $this->id)->count();
        }
        
        protected function casts(): array
        {
            return [
              'email_verified_at' => 'datetime',
              'password' => 'hashed',
            ];
        }
    }
