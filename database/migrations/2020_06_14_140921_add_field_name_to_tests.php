<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldNameToTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tests')) {
            Schema::table('tests', function (Blueprint $table) {
                // Checking For Existence Of Columns
                if (!Schema::hasColumn('tests', 'name')) {
                    $table->string('name');
                }
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
