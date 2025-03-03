<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        
        public function up(): void
        {
            Schema::create('generaloptions', function (Blueprint $table) {
                $table->string('name');
                $table->boolean('active');
            });
            
        }
        
        public function down(): void
        {
            Schema::dropIfExists('generaloptions');
            
        }
    };
