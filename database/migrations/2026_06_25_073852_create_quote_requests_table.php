<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 150);
            $table->string('phone', 50)->nullable();
            $table->string('vehicle_model', 150)->nullable();
            $table->string('service_required', 80);
            $table->string('preferred_contact_method', 30);
            $table->text('message');
            $table->string('status', 30)->default('new')->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['service_required', 'created_at']);
        });
    }
};
