<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained();
            $table->smallInteger('status');
            $table->smallInteger('viewed')->default(0);
            $table->smallInteger('Notified')->default(0);
            $table->text('info')->nullable()->default('No info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_logs');
    }
};
