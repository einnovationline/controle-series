<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::table('episodes', function (Blueprint $table) {
            $table->boolean('watched')->default(false);
        });
    }

    public function down() {
        Schema::table('episodes', function (Blueprint $table) {
            $table->dropColumn('watched');//->default(false)
        });
    }
};
