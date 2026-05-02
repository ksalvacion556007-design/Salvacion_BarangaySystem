<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();

            $table->string('gender');
            $table->date('birthdate');
            $table->string('place_of_birth')->nullable();

            $table->string('civil_status');
            $table->string('purok');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');

            $table->string('occupation')->nullable();
            $table->string('mobile_number')->nullable();

            $table->string('voter_status')->default('No');
            $table->string('pwd_status')->default('No');
            $table->string('fourps_status')->default('No');

            $table->string('resident_status')->default('Active');
            $table->decimal('monthly_income', 12, 2)->nullable();

            $table->string('citizenship')->default('Filipino');
            $table->integer('years_of_residency')->nullable();
            $table->string('employment_status')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('archived_by')->nullable()->constrained('users')->nullOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};