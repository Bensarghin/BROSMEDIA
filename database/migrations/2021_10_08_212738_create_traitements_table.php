<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
            $table->string('nomTrait');
            $table->string('typeTrait');
            $table->text('description');
            $table->string('status');
            $table->foreignId('erdv_id')->references('id')->on('etat_rdvs')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('cons_id')->unsigned()->nullable();
            $table->foreign('cons_id')->references('id')->on('consultations')
            ->onDelete('set null')
            ->onUpdate('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traitements');
    }
}
