<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('gender');
            $table->text('skill')->nullable();
            $table->timestamps(); // This creates 'created_at' and 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};

