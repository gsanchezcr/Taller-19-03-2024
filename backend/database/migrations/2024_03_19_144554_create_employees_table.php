<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("position_id");
            $table->foreign("position_id")->references("id")->on("positions")->onDelete("cascade");
            $table->string("name");
            $table->string("lastname");
            $table->string("card");
            $table->date("start_date");
            $table->date("start_contract_date");
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('employees');
    }
};
