<?php

use Illuminate\Support\Str;
use StubKit\Facades\Fields;

return [

    /*
    |--------------------------------------------------------------------------
    | Scaffolds
    |--------------------------------------------------------------------------
    | Groups of commands to run together when php artisan scaffold is run
    | Without a --type=<name>, * group will be used as a default type
    | You can add different groups of commands for different needs.
    |--------------------------------------------------------------------------
    */

    'scaffolds' => [

        'default' => [
            'make:model {{ scaffold.studly }}',
            'make:controller {{ scaffold.studly }}Controller --model={{ scaffold.studly }}',
            'make:views {{ scaffold.studly }}',
            'make:routes {{ scaffold.studly }} --to=auth',
            'make:request Create{{ scaffold.studly }}Request',
            'make:request Update{{ scaffold.studly }}Request',
            'make:test {{ scaffold.studly }}Test',
            'make:factory {{ scaffold.studly }}Factory',
            'make:seeder {{ scaffold.studly }}Seeder',
            'make:migration create_{{ scaffold.snakePlural }}_table',
            'migrate',
            'db:seed --class={{ scaffold.studly }}Seeder',
            'test --filter={{ scaffold.studly }}Test',
            'echo {{app.url}}/{{scaffold.slugPlural}}',
        ],

        'api' => [
            'make:model {{ scaffold.studly }}',
            'make:controller Api\{{ scaffold.studly }}Controller --model={{ scaffold.studly }} --api',
            'make:resource {{ scaffold.studly }}Resource',
            'make:resource {{ scaffold.studly }}Collection',
            'migrate',
            'db:seed --class={{ scaffold.studly }}Seeder',
            'test --filter={{ scaffold.studly }}Test',
        ],

        'pivot' => [
            'make:model {{scaffold.studly}} --pivot',
            'make:controller {{scaffold.studly}}Controller --pivot',
            'make:routes {{scaffold.studly}} --stub=pivot',
            'make:test {{scaffold.studly}}Test',
            'make:factory {{ scaffold.studly }}Factory',
            'make:seeder {{ scaffold.studly }}Seeder',
            'make:migration create_{{ scaffold.snakePlural }}_table',
            'migrate',
            'test --filter={{ scaffold.studly }}Test',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Variables
    |--------------------------------------------------------------------------
    |
    */

    'variables' => [

        '*' => [

            'lower' => function ($value) {
                return Str::reset($value);
            },

            'title' => function ($value) {
                return Str::reset($value)->title();
            },

            'studly' => function ($value) {
                return Str::reset($value)->studly();
            },

            'camel' => function ($value) {
                return Str::reset($value)->camel();
            },

            'slug' => function ($value) {
                return Str::reset($value)->slug();
            },

            'snake' => function ($value) {
                return Str::reset($value)->snake();
            },

            'lowerPlural' => function ($value) {
                return Str::reset($value)->plural();
            },

            'titlePlural' => function ($value) {
                return Str::reset($value)->plural()->title();
            },

            'studlyPlural' => function ($value) {
                return Str::reset($value)->plural()->studly();
            },

            'camelPlural' => function ($value) {
                return Str::reset($value)->plural()->camel();
            },

            'slugPlural' => function ($value) {
                return Str::reset($value)->plural()->slug();
            },

            'snakePlural' => function ($value) {
                return Str::reset($value)->plural()->snake();
            },
        ],

        'app' => [
            'url' => function () {
                return config('app.url');
            },
            'namespace' => function () {
                return app()->getNamespace();
            },
        ],

        'fields' => [
            'schema' => function ($fields) {
                return Fields::render('schema', $fields);
            },
            'faker' => function ($fields) {
                return Fields::render('faker', $fields);
            },
            'rules' => function ($fields) {
                return Fields::render('rules', $fields);
            },
            'index' => function ($fields) {
                return Fields::render('index', $fields);
            },
            'show' => function ($fields) {
                return Fields::render('show', $fields);
            },
            'create' => function ($fields) {
                return Fields::render('create', $fields);
            },
            'edit' => function ($fields) {
                return Fields::render('edit', $fields);
            },
            'casts' => function ($fields) {
                $fields = Fields::render('casts', $fields);
                return empty($fields) ? '' : "public \$casts = [\n$fields\n];";
            },
            'array' => function($fields) {
               return view('stubkit::formats.array')->with('fields', $fields);
            },
            'jsObjectEmpty' => function($fields) {
                return view('stubkit::formats.js-object-empty')->with('fields', $fields);
            },
            'jsObjectFilled' => function($fields) {
                return view('stubkit::formats.js-object-filled')->with('fields', $fields);
            }
        ],
    ],

    /*
   |--------------------------------------------------------------------------
   | Views
   |--------------------------------------------------------------------------
   | These settings refer to the make:views command.
   |--------------------------------------------------------------------------
   */
    'views' => [

        'path' => 'resources/js/Pages/{{model.studlyPlural}}/{{view.studly}}.vue',

        'stubs' => [
            'index',
            'create',
            'create-{{model.slug}}-form',
            'show',
            'show-{{model.slug}}-details',
            'edit',
            'edit-{{model.slug}}-form',
            'remove',
            'remove-{{model.slug}}-form',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Commands
    |--------------------------------------------------------------------------
    | These commands will trigger StubKit.. all others will be ignored.
    |--------------------------------------------------------------------------
    */

    'commands' => [
        'make:cast',
        'make:channel',
        'make:command',
        'make:component',
        'make:controller',
        'make:event',
        'make:exception',
        'make:factory',
        'make:job',
        'make:listener',
        'make:mail',
        'make:middleware',
        'make:migration',
        'make:model',
        'make:notification',
        'make:observer',
        'make:policy',
        'make:provider',
        'make:request',
        'make:rule',
        'make:seeder',
        'make:test',
        'make:scaffold',
        'make:routes',
        'make:views',
    ],

    /*
    |--------------------------------------------------------------------------
    | Excludes
    |--------------------------------------------------------------------------
    | These relative sub folders to ignore when file changes are gathered.
    |--------------------------------------------------------------------------
    */

    'excludes' => [
        'public',
        'vendor',
        'storage',
        'bootstrap',
    ],
];
