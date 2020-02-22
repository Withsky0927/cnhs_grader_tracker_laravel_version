<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateReportDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private function changeToBlobType()
    {
        DB::statement('ALTER TABLE `report_documents` CHANGE `report_document` `report_document` LONGBLOB NOT NULL');
    }

    public function up()
    {
        Schema::create('report_documents', function (Blueprint $table) {
            $table->uuid('report_document_id');
            $table->primary('report_document_id');
            $table->binary('report_document');
            $table->longText('report_document_name');
            $table->string('report_mime', 100);
        });
        $this->changeToBlobType();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_documents');
    }
}
