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
        Schema::create('internship_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers'); // 外键关联到雇主表的id
            $table->string('title'); // 岗位名称
            $table->text('content'); // 岗位描述
            $table->string('major'); // 专业
            $table->string('photo'); // 办公室照片
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_positions');
    }
};
