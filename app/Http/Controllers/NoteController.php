<?php

namespace Notes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Notes\Note;
use Notes\Http\Requests\StoreNoteRequest;

class NoteController extends Controller
{
    /**
     * Constructor
     * sirve para filtrar e acceso si no estas 
     * con la sesion activa.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $notes = DB::select('CALL getNotesByUserId('.$id.')');
        return view('notes.index', compact('notes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteRequest $request)
    {
        $note = new Note();
        $note->note=$request->input('note');
        $note->user_id=$request->input('user_id');
        $note->save();
        return redirect()->route('index.index')->with('status', '¡ tu nota fue creada !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNoteRequest $request, $id)
    {
        $note = Note::find($id);
        $note->note = $request->input('note');
        $note->user_id = $request->input('user_id');
        $note->save();
        return redirect()->route('index.show', [$note])->with('status', '¡ tu nota fue actualizada !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note=Note::find($id);
        $note->delete();
        return redirect()->route('index.index')->with('status', '! tu nota fue eliminada !');
    }
}
