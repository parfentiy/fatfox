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
        Schema::create('random_users', function (Blueprint $table) {
            $table->id();
            $table->string('gender')->nullable();
            $table->string('name_title')->nullable();
            $table->string('name_first')->nullable();
            $table->string('name_last')->nullable();
            $table->string('l_street_number')->nullable();
            $table->string('l_street_name')->nullable();
            $table->string('l_city')->nullable();
            $table->string('l_state')->nullable();
            $table->string('l_country')->nullable();
            $table->string('l_postcode')->nullable();
            $table->string('l_coord_lat')->nullable();
            $table->string('l_coord_long')->nullable();
            $table->string('l_tzone_offset')->nullable();
            $table->string('l_tzone_desc')->nullable();
            $table->string('email')->nullable();
            $table->string('login_uuid')->nullable();
            $table->string('login_username')->nullable();
            $table->string('login_password')->nullable();
            $table->string('login_salt')->nullable();
            $table->string('login_md5')->nullable();
            $table->string('login_sha1')->nullable();
            $table->string('login_sha256')->nullable();
            $table->string('dob_date')->nullable();
            $table->integer('dob_age')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('reg_age')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell')->nullable();
            $table->string('id_name')->nullable();
            $table->string('id_value')->nullable();
            $table->string('pic_large')->nullable();
            $table->string('pic_medium')->nullable();
            $table->string('pic_thumbnail')->nullable();
            $table->string('nat')->nullable();
            $table->timestamps();
            $table->index(['name_last', 'l_city']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('random_users');
    }
};
