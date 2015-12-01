<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Question;
use DB;

class QuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page = 'question';
        $questions = DB::table('question')
                ->select('question.id', 'level', 'label', 'description', 'name')
                ->join('category', 'question.category_id', '=', 'category.id')
                ->get();
        return view('admin.question', compact('page', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $page = 'question';
        $cats = DB::table('category')
                ->get();
        $difficulties = array("1" => "Débutant", "2" => "Intermédiare", "3" => "Difficile");
        $categories = [];
        foreach ($cats as $cat) {
            $categories[$cat->id] = $cat->name;
        }
        error_log(print_r($categories, true));
        return view('admin.questionAjout', compact('page', 'categories', 'difficulties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->isMethod('post')) {
            DB::table('question')->insert(
                    ['level' => $request->input('difficulties'), 'label' => $request->input('question'), 'description' => $request->input('description'), 'category_id' => $request->input('categories')]);
        }
        return redirect(route('admin.reponse.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        error_log(print_r('coucouShow', true));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        error_log(print_r('coucouEdit', true));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        error_log(print_r('coucouUpdate', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        DB::table('answer')->where('question_id', '=', $id)->delete();
        DB::table('question')->where('id', '=', $id)->delete();
        return redirect(route('admin.question.index'));
    }

    /**
     * Test si la question est utilisée dans un QCM
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testQuestion(Request $request, $id) {
        if ($request->ajax()) {
            $questionnaire = DB::table('questionnaire_has_question')
                    ->where('question_id', '=', $id)
                    ->get();
            if (empty($questionnaire)) {
                $reponse = array(
                    'success' => true,
                    'data' => true
                );
            } else {
                $reponse = array(
                    'success' => true,
                    'data' => false
                );
            }
            return json_encode($reponse);
        }
    }

}
