<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('city');
            $table->string('type'); // Villa, Chalet, Apartment, etc.
            $table->string('purpose'); // Book Now, Naqera Lease, For Sale
            $table->decimal('price', 10, 2);
            $table->string('host_name');
            $table->string('host_phone')->nullable();
            $table->string('tourism_license_number')->nullable();
            $table->string('status')->default('pending_review');
            // status values: pending_review, published, rejected, suspended
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};