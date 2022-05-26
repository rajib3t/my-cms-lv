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
        Schema::create('admin_user_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('name');
            $table->text('value')->nullable();
            $table->text('previous_value')->nullable();
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
        Schema::dropIfExists('admin_user_settings');
    }
};
