<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('destination_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('city')->nullable();
            $table->date('travel_date')->nullable();
            $table->integer('travelers')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['new', 'contacted', 'converted', 'closed'])->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
