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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('series_id')
                ->constrained('series');  // 関連づけるテーブル名を指定する(※先にteams テーブルを作成しておく必要がある)

            $table->string('subtitle');
            $table->text('episode_text');
            $table->string('cover_image_path')
                ->nullable()
                ->default(null);
            $table->boolean('is_release');
            $table->bigInteger('like')
            ->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
