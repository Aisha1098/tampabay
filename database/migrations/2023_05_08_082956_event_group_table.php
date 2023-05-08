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
        Schema::create('event_group', function(Blueprint $table){
            $table->primary(['group_id','event_id']);
            $table->foreignId('group_id')->references('id')->on('groups');
            $table->foreignId('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
