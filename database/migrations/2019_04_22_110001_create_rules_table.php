<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');

            /* Habilita o recurso de liberação a cada impressão */
	        $table->boolean('queue_control')->default(0);

            /* atualmente apenas: monthly or daily */
            $table->string('quota_period')->nullable();

            /* quota para o tipo escolhido (monthly or daily) */
            $table->integer('quota')->nullable();

            /* categorias */
            $table->text('categories')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}
