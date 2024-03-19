<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("departaments_id");
            $table->foreign("departaments_id")->references("id")->on("departments")->onDelete("cascade");
            $table->string("name");
            $table->float("hourly_rate", 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('positions');
    }
};
