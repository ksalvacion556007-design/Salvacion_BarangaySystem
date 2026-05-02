<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('resident_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('issued_by')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->string('type');

            $table->string('purpose')->nullable();        
            $table->decimal('income', 12, 2)->nullable(); 

            $table->timestamp('issued_at')->nullable();
            $table->date('valid_until')->nullable(); 

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};