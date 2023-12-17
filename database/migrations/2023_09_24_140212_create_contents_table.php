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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug');
            $table->longText('content');
            $table->string('thumbnail');
            $table->string('headerimage');
            $table->foreignId('user_id');
            $table->string('status');
            $table->string('tagtitle');
            $table->string('tagtype');
            $table->string('tagimage');
            $table->text('tagdescription');
            $table->string('tagurl');
            $table->string('tagsitename');
            $table->integer('counter')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
