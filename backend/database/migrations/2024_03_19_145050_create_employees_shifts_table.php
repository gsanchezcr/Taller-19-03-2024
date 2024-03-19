<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('employees_shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("employee_id");
            $table->foreign("employee_id")->references("id")->on("employees")->onDelete("cascade");
            $table->datetime("shift_start");
            $table->datetime("shift_end");
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('employees_shifts');
    }
};
