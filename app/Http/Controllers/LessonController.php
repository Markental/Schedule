<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lessons = Lesson::all();

        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id'=>'required|max:255',
            'room_id'=>'required|max:255',
            'teacher_id'=>'required|max:255',
            'subject_id'=>'required|max:255',
            'start_time'=>'required',
            'end_time'=>'required'
        ]);

        $lesson = new Lesson([
            'group_id' => $request->get('group_id'),
            'room_id' => $request->get('room_id'),
            'teacher_id' => $request->get('teacher_id'),
            'subject_id' => $request->get('subject_id'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time')
        ]);
        $lesson->save();
        return redirect('/lesson')->with('success', 'Group saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'group_id'=>'required|max:255',
            'room_id'=>'required|max:255',
            'teacher_id'=>'required|max:255',
            'subject_id'=>'required|max:255',
            'start_time'=>'required',
            'end_time'=>'required'
        ]);

        $lesson = Lesson::find($id);
        $lesson->group_name = $request->get('group_name');
        $lesson->group_id = $request->get('group_id');
        $lesson->room_id = $request->get('room_id');
        $lesson->teacher_id = $request->get('teacher_id');
        $lesson->subject_id = $request->get('subject_id');
        $lesson->start_time = $request->get('start_time');
        $lesson->end_time = $request->get('end_time');


        $lesson->save();
        return redirect('/lesson')->with('success', 'Lesson updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect('/lesson')->with('success', 'Lesson deleted!');
    }
}
