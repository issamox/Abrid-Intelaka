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
        Schema::create('legal_files', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('carteAutoentrepreneur')->nullable();
            $table->string('statuts')->nullable();
            $table->string('projectStatus')->nullable();
            $table->string('lastRC')->nullable();
            $table->string('taxes')->nullable();
            $table->string('attestationIF')->nullable();
            $table->string('cnss')->nullable();
            $table->string('announcementsJournal')->nullable();
            $table->string('bulletin')->nullable();
            $table->string('ice')->nullable();
            $table->string('jrc')->nullable();

            $table->string('registreLocal')->nullable();
            $table->string('listSubscribing')->nullable();
            $table->string('certifiedStatus')->nullable();
            $table->string('pv')->nullable();
            $table->string('lastTwoPv')->nullable();

            $table->boolean('hasLocal')->default(false);
            $table->string('localType')->nullable();
            $table->string('propertyCertificat')->nullable();
            $table->string('promiseLease')->nullable();
            $table->string('attestationAdministrative')->nullable();
            $table->string('domiciliationContract')->nullable();

            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_files');
    }
};
