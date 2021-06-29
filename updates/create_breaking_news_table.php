<?php namespace PanatauSolusindo\BreakingNews\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateBreakingNewsTable Migration
 */
class CreateBreakingNewsTable extends Migration
{
    public function up()
    {
        Schema::create('panatausolusindo_breakingnews_breaking_news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tulisan_id')->unsigned()->index();
            $table->string('url');
            $table->string('judul');
            $table->date('tampil_sd')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('panatausolusindo_breakingnews_breaking_news');
    }
}
