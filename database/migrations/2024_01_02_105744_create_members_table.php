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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->string('fullName');
            $table->string('groupe');
            $table->string('secteur');
            $table->string('mobile');
            $table->string('email');
            $table->string('legalStatus');
            $table->dateTime('startActivity')->nullable();
            $table->string('creationProcedure')->nullable();
            $table->string('cin')->nullable();
            $table->text('projectDescription')->nullable();

            $table->foreignId('experience_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('legal_file_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('business_plan_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
