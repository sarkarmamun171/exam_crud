<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    function showLoginForm()
    {
        return view('login');
    }

    function login(Request $request)
    {

        $validatedData = $request->validate([
            '*' => 'required',

        ]);

        $email = $request->post('email');
        $password = $request->post('password');

        $check = DB::Table('users')->where('email', $email)->where('password', $password)->get();

        if (count($check)) {

            return redirect()->route('admindashboard')->with('success', 'Login Sucessfully');
        } else {
            return redirect()->route('dashboard')->with('message', 'Email and Password wrong');
        }
    }

    function dashboard()
    {

        return view('dashbaord');
    }

    function savequestion(Request $request)
    {
        $question = $request->post('question');
        $answer = $request->post('answer');

        $id = DB::table('questions')->insertGetId([
            'name' => $question,
        ]);

        for ($i = 0; $i < count($answer); $i++) {
            DB::Table('answers')->insert([

                'qid' => $id,
                'answer' => $answer[$i]

            ]);
        }

        return response()->json(['message' => 'Question Added successfully']);
    }

    function allquestion()
    {
        $all = DB::Table('questions')
            ->join('answers', 'questions.id', 'answers.qid')
            ->select('questions.name', 'questions.id', DB::raw('GROUP_CONCAT(answers.answer SEPARATOR ", ") as answers'))
            ->groupBy('questions.id')
            ->get();

        return response()->json(['status' => true, 'all' => $all]);
    }

    function deleteques($id)
    {
        $delete = DB::Table('questions')->where('id', $id)->delete();
        return response()->json(['status' => true, 'message' => 'Question Delete Sucessfully']);
    }

    function editquestion($id)
    {
        $que = DB::Table('questions')->where('id', $id)->first();
        $answer = DB::Table('answers')->where('qid', $id)->get();
        return response()->json(['status' => true, 'que' => $que, 'answer' => $answer]);
    }

    function updatequestion(Request $request)
    {
        $question = $request->post('question');
        $answer = $request->post('answer');
        $id = $request->post('id');

        DB::table('questions')->where('id', $id)->update([
            'name' => $question,
        ]);

        DB::table('answers')->where('qid', $id)->delete();

        for ($i = 0; $i < count($answer); $i++) {
            DB::Table('answers')->insert([

                'qid' => $id,
                'answer' => $answer[$i]

            ]);
        }

        return response()->json(['message' => 'Question Update successfully']);
    }
}
