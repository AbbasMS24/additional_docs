<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('addition_docs', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code'); // اتصال به پرونده
            $table->string('title');
            $table->text('data');
            $table->timestamp('time')->nullable();
            $table->string('officer')->nullable();
            $table->timestamps();
    
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addition_docs');
    }
};
