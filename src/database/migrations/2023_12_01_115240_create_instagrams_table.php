<?php

use App\Enums\InstagramPostType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('instagrams', function (Blueprint $table) {
            $table->id();
            $table->enum('post_type',InstagramPostType::asArray());
            $table->text('body');
            $table->string('source');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instagrams');
    }
};
