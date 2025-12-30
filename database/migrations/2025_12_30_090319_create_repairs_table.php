<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')
              ->constrained()
              ->cascadeOnDelete();

            $table->foreignId('user_id') // staff
                  ->constrained('users')
                  ->cascadeOnDelete();
            
            $table->enum('status', [
                'not started',
                'in progress',
                'completed'
            ])->default('not started');

        $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
