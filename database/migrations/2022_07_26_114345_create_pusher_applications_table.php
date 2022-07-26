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
        Schema::create('pusher_applications', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('key');
            $table->string('secret');
            $table->string('name');
            $table->string('path')->nullable();
            $table->string('capacity')->nullable();
            $table->boolean('enable_client_messages')->default(false);
            $table->boolean('enable_statistics')->default(true);

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
        Schema::dropIfExists('pusher_applications');
    }
};
