<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->bigIncrements('expcate_id');
            $table->string('expcate_name',50)->unique();
            $table->string('expcate_remarks',200)->nullable();
            $table->integer('expcate_creator')->nullable();
            $table->integer('expcate_editor')->nullable();
            $table->string('expcate_slug',30)->nullable();
            $table->integer('expcate_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_categories');
    }
};
