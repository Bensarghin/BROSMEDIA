<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreaterRdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->date('date_prend_rdv')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreignId('pat_id')->references('id')->on('patients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('med_id')->nullable()->references('id')->on('medecins')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->bigInteger('act_id')->unsigned()->nullable();
            $table->foreign('act_id')->references('id')->on('actes')
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
        Schema::dropIfExists('rdvs');
    }
}
