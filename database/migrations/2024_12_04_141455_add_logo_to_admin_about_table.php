<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('admin_about', function (Blueprint $table) {
            $table->string('logo')->nullable(); // Menambahkan kolom logo
        });
    }
    
    public function down()
    {
        Schema::table('admin_about', function (Blueprint $table) {
            $table->dropColumn('logo'); // Menghapus kolom logo jika migrasi di-roll back
        });
    }
};
