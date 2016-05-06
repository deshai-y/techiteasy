<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $category_id = DB::table('category')->insertGetId(
                array('name' => 'Front-end')
        );

        DB::table('level')->insert(array(
            array('id' => 1, 'label' => 'Débutant'),
            array('id' => 2, 'label' => 'Intermédaire'),
            array('id' => 3, 'label' => 'Difficile')
        ));

        $question_id = DB::table('question')->insertGetId(
                array('level_id' => '1', 'label' => 'Qu\'est ce qu\'une fonction anonyme ?', 'description' => 'Question basique concernant le JavaScript', 'category_id' => $category_id)
        );

        DB::table('answer')->insert(array(
            array('label' => 'Une fonction qui sert à isoler du code, contrairement aux fonctions classiques qui servent pour de nombreuses autres utilisations', 'verify' => 1, 'question_id' => $question_id),
            array('label' => 'Une fonction qui est plus rapide à l\'exécution', 'verify' => 0, 'question_id' => $question_id),
            array('label' => 'Une fonction sans nom', 'verify' => 0, 'question_id' => $question_id),
            array('label' => 'Une fonction réutilisable facilement à plusieurs endroits', 'verify' => 0, 'question_id' => $question_id)
        ));


        $question_id = DB::table('question')->insertGetId(
                array('level_id' => '1', 'label' => 'Quelle version d\'ecmascript est sorti en juin 2015 ?', 'description' => 'Question basique concernant le JavaScript', 'category_id' => $category_id)
        );

        DB::table('answer')->insert(array(
            array('label' => 'ES5', 'verify' => 0, 'question_id' => $question_id),
            array('label' => 'ES6', 'verify' => 1, 'question_id' => $question_id),
            array('label' => 'ES7', 'verify' => 0, 'question_id' => $question_id),
            array('label' => 'ES8', 'verify' => 0, 'question_id' => $question_id)
        ));

        $category_id = DB::table('category')->insertGetId(
                array('name' => 'Back-end')
        );

        $question_id = DB::table('question')->insertGetId(
                array('level_id' => '1', 'label' => 'Quelle fonction permet de lire le résultat d\'une ressources MySQL renvoyée par mysql_query() ?', 'description' => 'Question basique concernant du back-end au niveau SQL', 'category_id' => $category_id)
        );

        DB::table('answer')->insert(array(
            array('label' => 'mysql_data_seek()', 'verify' => 0, 'question_id' => $question_id),
            array('label' => 'mysql_affected_rows()', 'verify' => 0, 'question_id' => $question_id),
            array('label' => 'mysql_fetch_row()', 'verify' => 1, 'question_id' => $question_id),
            array('label' => 'mysql_display_rows()', 'verify' => 0, 'question_id' => $question_id)
        ));
        $category_id = DB::table('category')->insertGetId(
                array('name' => 'CSS3')
        );

        $question_id = DB::table('question')->insertGetId(
                array('level_id' => '2', 'label' => 'Quelle unité n\'a pas été introduite dans CSS3 ?', 'description' => 'Question concernant les unités en CSS', 'category_id' => $category_id)
        );

        DB::table('answer')->insert(array(
            array('label' => 'fr', 'verify' => 0, 'question_id' => $question_id),
            array('label' => 'br', 'verify' => 1, 'question_id' => $question_id),
            array('label' => 'gr', 'verify' => 1, 'question_id' => $question_id),
            array('label' => 'rem', 'verify' => 0, 'question_id' => $question_id)
        ));
    }

}
