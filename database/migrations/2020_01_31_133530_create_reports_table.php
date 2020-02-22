<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->uuid('report_id');
            $table->primary('report_id');
            $table->string('report_type', 150);
            $table->string('report_name', 100);
            $table->longText('report_description');
            $table->string('report_status', 50);
            $table->string('uploaded_by', 150);
            $table->date('uploaded_date');
            $table->date('updated_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
