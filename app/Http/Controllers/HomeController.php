<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Questionnaire;

class HomeController extends Controller
{
	/*
	 * The main application page 
	 */
    public function welcome()
    {
    	$data = [];
        return view('welcome', $data); // May use compact
    }

    /*
     * Display the login page for the admin backoffice
     */
    public function login()
    {
    	$data = [];
    	return view('login', $data); // May use compact
    }
    public function authenticate(){  
        session(['email' => $_POST["email"], "firstName"=>$_POST["firstName"], "lastName"=>$_POST["lastName"]]);
 
        return redirect()->action('HomeController@index');  
    }
    public function index(){
        //echo session('email');
        //$questionnaires = DB::table('questionnaire')->get();
        //$page       = 'home';
         $questionnaires = Questionnaire::paginate(5);
        
        //var_dump($aQuestionnaire);
        //die('AAA');
        return view('index', compact('page', 'questionnaires')); // May use compact

        //display questionnaires list        
    }
    public function launch($id){

        //$category = Category::findOrFail($id);
       $aQuestionnaire = array();
        $questions = DB::table('question as q')
                ->select('question_id', 'q.label as question_label' , 'q.description as description_label', 'a.label as answer_label', 'a.id as answer_id', 'a.verify as verify')
                ->join('questionnaire_has_category as qhc', 'qhc.category_id', '=', 'q.category_id')
                 ->join('answer as a', 'a.question_id', '=', 'q.id')
                ->where('qhc.questionnaire_id', $id)
                ->get();;
        
        $questions = $this->object_to_array($questions);
        $aQuestions = array();
        foreach ($questions as $key => $value) {
            //echo "  ".$value["question_id"];
            $aQuestionnaire[$value["question_id"]] = array ("questionnaire_id" =>  $id, "id"=>$value["question_id"], "label"=>$value["question_label"] , "description"=>$value["description_label"], "answers"=>array());
            # code...
        }
        foreach ($questions as $key => $value) {
            //echo "  ".$value["question_id"];
            array_push($aQuestionnaire[$value["question_id"]]["answers"],array('label'=>$value["answer_label"], 'id'=>$value["answer_id"], "verify"=>$value["verify"] ));
            # code...
        }
    

         return view('launch', compact('aQuestionnaire')); // May use compact
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
    public function valider(){

         if(isset($_POST["questionnaire_id"])){
             $answers = DB::table('answer')
                ->select('answer.*')
                ->join('question', 'answer.question_id', '=', 'question.id')
                ->join('questionnaire_has_category', 'questionnaire_has_category.category_id', '=', 'question.category_id')              
                ->where('questionnaire_has_category.questionnaire_id', $_POST["questionnaire_id"])
                ->get();;
        
            $answers = $this->object_to_array($answers);
            $iCorrect= 0;
            $iKO=0;
            foreach ($answers as $key => $value) {
               if(isset($_POST[$value["id"]])){
                    if($_POST[$value["id"]] == $value["verify"])
                       $iCorrect++;
                    else{
                        $iKO++;
                    } 
                }
            } 
            
            $sujet = "Résultat du questionnaire du candidat: ".session('lastName')." ".session('firstName'); 
            $message = $iCorrect. " réponses correctes, et ".$iKO." réponses incorrectes.";
            
            mail(session('email'),$sujet,$message);

            return redirect()->action('HomeController@welcome'); 
        }
        else{
            //probleme lors du traitment
            return redirect()->action('HomeController@index');  
        }       
    }

}
