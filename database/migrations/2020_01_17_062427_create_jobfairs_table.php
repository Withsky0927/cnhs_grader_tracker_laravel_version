<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobfairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobfairs', function (Blueprint $table) {
            $table->uuid('jobfair_id');
            $table->primary('jobfair_id');
            $table->string('job', 30);
            $table->string('strand', 30);
            $table->string('company',  30);
            $table->string('address', 500);
            $table->text('job_description');
            $table->text('job_qualification');
            $table->date('job_posted');
            $table->date('job_avail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobfairs');
    }
}
