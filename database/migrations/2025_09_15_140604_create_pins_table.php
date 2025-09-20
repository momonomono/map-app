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
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->comment('ユーザーID');
            $table->string("title")->comment('タイトル');
            $table->decimal("latitude", 9, 6)->comment('緯度');
            $table->decimal("longitude", 9, 6)->comment('経度');
            $table->text("detail")->comment('詳細');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};
