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
        Schema::connection('sqlite1')->create('command_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technique_id')->references('id')->on('techniques')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->longText('command');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('command_lists');
    }
};
