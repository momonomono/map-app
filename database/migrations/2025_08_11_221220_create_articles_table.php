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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('ユーザー名');
            $table->integer('like_count')->comment('いいね数');
            $table->integer('view_count')->comment('閲覧数');
            $table->string('title')->comment('タイトル');
            $table->text('map_link')->comment('googleマップのリンク');
            $table->text('detail')->comment('投稿の詳細');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
