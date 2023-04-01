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
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                  ->default(1)
                  ->after('category_id');

            $table->foreign('user_id')
                   ->references('id')
                   ->on('users')
                   ->cascadeOnDelete()
                   ->cascadeOnUpdate();


            $table->enum('status', ['published', 'draft'])
                  ->default('draft')
                  ->after('views');

            $table->boolean('is_featured')
                  ->default(false)
                  ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign('blog_posts_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('status');
            $table->dropColumn('is_featured');
        });
    }
};
