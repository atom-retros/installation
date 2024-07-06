<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('website_installation', function (Blueprint $table) {
            $table->id();
            $table->integer('step')->default(0);
            $table->string('installation_key');
            $table->string('user_ip')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }
};
