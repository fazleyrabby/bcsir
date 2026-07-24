<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('departments', 'name_bn')) {
            Schema::table('departments', function (Blueprint $table) {
                $table->string('name_bn')->nullable()->after('name');
                $table->text('description_bn')->nullable()->after('description');
            });
        }

        if (!Schema::hasColumn('employees', 'name_bn')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->string('name_bn')->nullable()->after('name');
                $table->string('designation_bn')->nullable()->after('designation');
                $table->text('bio_bn')->nullable()->after('bio');
            });
        }

        if (!Schema::hasColumn('news', 'title_bn')) {
            Schema::table('news', function (Blueprint $table) {
                $table->string('title_bn', 1000)->nullable()->after('title');
                $table->text('body_bn')->nullable()->after('body');
            });
        }

        if (!Schema::hasColumn('notices', 'title_bn')) {
            Schema::table('notices', function (Blueprint $table) {
                $table->string('title_bn', 1000)->nullable()->after('title');
                $table->text('body_bn')->nullable()->after('body');
            });
        }

        if (!Schema::hasColumn('research', 'title_bn')) {
            Schema::table('research', function (Blueprint $table) {
                $table->string('title_bn', 1000)->nullable()->after('title');
                $table->text('abstract_bn')->nullable()->after('abstract');
            });
        }

        if (!Schema::hasColumn('pages', 'title_bn')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('title_bn')->nullable()->after('title');
                $table->text('content_bn')->nullable()->after('content');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('departments', 'name_bn')) {
            Schema::table('departments', function (Blueprint $table) {
                $table->dropColumn(['name_bn', 'description_bn']);
            });
        }

        if (Schema::hasColumn('employees', 'name_bn')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->dropColumn(['name_bn', 'designation_bn', 'bio_bn']);
            });
        }

        if (Schema::hasColumn('news', 'title_bn')) {
            Schema::table('news', function (Blueprint $table) {
                $table->dropColumn(['title_bn', 'body_bn']);
            });
        }

        if (Schema::hasColumn('notices', 'title_bn')) {
            Schema::table('notices', function (Blueprint $table) {
                $table->dropColumn(['title_bn', 'body_bn']);
            });
        }

        if (Schema::hasColumn('research', 'title_bn')) {
            Schema::table('research', function (Blueprint $table) {
                $table->dropColumn(['title_bn', 'abstract_bn']);
            });
        }

        if (Schema::hasColumn('pages', 'title_bn')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn(['title_bn', 'content_bn']);
            });
        }
    }
};
