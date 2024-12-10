<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToAffiliatesTable extends Migration
{
    public function up()
    {
        Schema::table('affiliates', function (Blueprint $table) {
            if (!Schema::hasColumn('affiliates', 'created_at')) {
                $table->timestamps();  // Adiciona os campos created_at e updated_at se não existirem
            }
        });
    }

    public function down()
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropTimestamps(); // Remove os campos created_at e updated_at
        });
    }
}


