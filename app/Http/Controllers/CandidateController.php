<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use Illuminate\Http\Request;
use DB;

class CandidateController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($page, $limit) {
        $page = $page ? $page : 1;
        $limit = $limit ? $limit : 10;
        $candidates = Candidate::limit($limit)->offset(($page - 1) * $limit)->get()->toArray();

        return response()->json($candidates,200);
    }

    public function show($id) {
        $candidate = Candidate::find($id);

        if(!$candidate){
            return response()->json(['message' => "The candidate with {$id} doesn't exist"], 404);
        }

        return response()->json($candidate,200);
    }

    public function search(Request $request) {

        $sql = DB::table('candidate');


        foreach($request->post() as $key => $val) {
            if($key != 'limit' && $key != 'page') {
                $sql->where($key, 'like', "%$val%");
            }
        }

        $page = isset($request->page) ? $request->page : 1;
        $limit = isset($request->limit) ? $request->limit : 10;

        $search_candidates = $sql->limit($limit)->offset(($page - 1) * $limit)->get();
        
        return response()->json([
            'current_page' => $page,
            'per_page' => $limit,
            'fetched_result' => count($search_candidates),
            'data' => $search_candidates
        ]);  

    }

    public function create(Request $request) {
        
        $this->validateRequest($request);

        $candidate = new Candidate();

        foreach($request->post() as $key => $val) {
            $candidate->{$key} = $val;
        }

        $candidate->save();

        return response()->json("Candidate Added Successfully!",200);
    }

    public function validateRequest(Request $request){

        $rules = [
            'first_name' => 'required|max:40',
            'last_name' => 'max:40',
            'contact_number' => 'max:10',
            'gender' => 'numeric|min:1|max:2',
            'specialization' => 'max:200',
            'work_ex_year' => 'numeric|min:0|max:30',
            'address' => 'max:500',
            'email' => 'email|max:100'
        ];

        $this->validate($request, $rules);
    }
}
