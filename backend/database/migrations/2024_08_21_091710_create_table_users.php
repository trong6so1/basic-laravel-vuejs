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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar',255);
            $table->string('username',255)->unique();
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->string('remember_token',100);
            $table->timestamp('login_at')->nullable();
            $table->timestamp('change_password_at')->nullable();
            $table->timestamps();

            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
