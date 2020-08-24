<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('info_name');
            $table->string('event_name');
            $table->string('category');
            $table->string('industry');
            $table->text('actual_info');
            $table->text('keywords')->comment('separate keywords with commas');
            $table->date('activity_date');
            $table->date('expiry_date');
            $table->string('related_agency')->nullable();
            $table->integer('numerical_value')->nullable();
            $table->string('other_details')->nullable();
            $table->boolean('enabled')->default($value = true);
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
        Schema::dropIfExists('info_table');
    }
}
