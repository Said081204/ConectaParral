<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_requests', function (Blueprint $table) {
            $table->id();

            // Relación con users
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Datos del negocio
            $table->string('business_name');
            $table->string('contact_phone', 20)->nullable();
            $table->string('city')->nullable();
            $table->text('description')->nullable();

            // Control del admin
            $table->string('status')->default('pendiente'); 
            // pendiente | aprobado | rechazado

            $table->text('admin_note')->nullable();
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();

            // Un usuario = una solicitud
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_requests');
    }
};
