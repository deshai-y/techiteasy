<?php

namespace App\Http\Controllers\Admin;

use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Questionnaire;
use App\Models\Category;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page       = 'questionnaire';
        $questionnaires = Questionnaire::paginate(8);
        $questionnaires->setPath('questionnaire');
        
        return view('admin.questionnaire', compact('page', 'questionnaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page     = 'questionnaire';
        $questionnaire = new Questionnaire;

        $categories = Category::paginate(8);

        return view('admin.questionnaire-create-update', compact('page', 'questionnaire', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $page     = 'questionnaire';
        $questionnaire = questionnaire::findOrFail($id);

        $categories = Category::paginate(8);

        $categoriesInQuestionnaire = DB::table('questionnaire_has_category')
                ->select('category_id')
                ->where('questionnaire_id', '=', $id)
                ->get();
       

        
        $categoriesInQuestionnaire =  $this->object_to_array($categoriesInQuestionnaire);
      

        foreach ($categories as &$cat) {
            $result = array_search($cat->id, array_column($categoriesInQuestionnaire, 'category_id'));
            if(is_numeric($result)){
                 $cat->checked = true;
            }
            else{
                $cat->checked = 0;
            }

        }
        
        return view('admin.questionnaire-create-update', compact('page', 'questionnaire', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        

        $page     = 'questionnaire';
        $questionnaire = questionnaire::findOrFail($id);
        $questionnaire->title = $request->input('title');
        
        //we save
        $questionnaire->save();


        DB::table('questionnaire_has_category')->where('questionnaire_id', '=', $id)->delete();
        
        foreach($request->input('category_valide')  as  $val) {
             DB::table('questionnaire_has_category')->insert(
            array('questionnaire_id' => $id, 'category_id' => $val)
            );         
        }

       

        return redirect()
                ->route('admin.questionnaire.index')
                ->withSuccess('Le questionnaire a bien été modifiée.');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->isMethod('post')) {

            $idQuestionnaire = DB::table('questionnaire')->insertGetId(
                    ['title' => $request->input('title')]);

             foreach($request->input('category_valide')  as  $val) {
             DB::table('questionnaire_has_category')->insert(
            array('questionnaire_id' => $idQuestionnaire, 'category_id' => $val)
            );         
        }

            return redirect(route('admin.questionnaire.index'));
        }
    }
    protected function object_to_array($obj) {
        if(is_object($obj)) $obj = (array) $obj;
        if(is_array($obj)) {
            $new = array();
            foreach($obj as $key => $val) {
                $new[$key] = $this->object_to_array($val);
            }
        }
        else $new = $obj;

        return $new;       
    }

}
