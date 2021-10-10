<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Contracts\Foundation\Application;
use App;
use Illuminate\Support\Facades\Storage;
use FileVault;
use Illuminate\Support\Str;

class DocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('created_at', 'desc')->get();

        return view('documents.index', [
            'documents' => $documents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'file'=>'required|mimes:csv,doc,docx,txt,xlx,xls,pdf|nullable|max:2048',
        ]);

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$extension;
            $file = Storage::putFileAs('public/file/', $request->file('file'), $fileNameToStore);
            FileVault::encrypt($file);
        } else {
            $fileNameToStore = 'nofile.pdf';
        }

        // Create Post
        $document = new Document;
        $document->title = $request->input('title');
        $document->description = $request->input('description');
        $document->file = $fileNameToStore;
        $document->user_id = auth()->user()->id;
        $document->save();

        return redirect('/documents')->with('success', 'Document Created');
    }

    public function download($id, $file)
    {
        $where[]=['id','=', $id];
        $where[]=['file','=', $file];
        $document = Document::where($where)->firstOrFail();

        // Check for correct user
        if(auth()->user()->id !== $document->user_id){
            return redirect('/documents')->with('error', 'Unauthorized Page');
        }

        $pathToFile = public_path('storage/file/'.$document->file);
        FileVault::decryptCopy('public/file/'.$document->file.'.enc');
        return response()->download($pathToFile)->deleteFileAfterSend(true);
    }

    public function viewfile($id, $file)
    {
        $where[]=['id','=', $id];
        $where[]=['file','=', $file];
        $document = Document::where($where)->firstOrFail();

        // Check for correct user
        if(auth()->user()->id !== $document->user_id){
            return redirect('/documents')->with('error', 'Unauthorized Page');
        }

        $pathToFile = public_path('storage/file/'.$document->file);
        FileVault::decryptCopy('public/file/'.$document->file.'.enc');
        return response()->file($pathToFile)->deleteFileAfterSend(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);

        return view('documents.show', [
            'document' => $document
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        
        //Check if post exists before deleting
        if (!isset($document)){
            return redirect('/documents')->with('error', 'No Document Found');
        }

        // Check for correct user
        if(auth()->user()->id !== $document->user_id){
            return redirect('/documents')->with('error', 'Unauthorized Page');
        }

        return view('documents.edit')->with('document', $document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $document = Document::find($id);

        $document->title = $request->input('title');
        $document->description = $request->input('description');
        // if($request->hasFile('cover_image')){
        //     $post->cover_image = $fileNameToStore;
        // }
        $document->save();

        return redirect('/documents')->with('success', 'Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        
        if (!isset($document)){
            return redirect('/documents')->with('error', 'No Document Found');
        }

        if(auth()->user()->id !== $document->user_id){
            return redirect('/documents')->with('error', 'Unauthorized Page');
        }

        if($document->file != 'nofile.pdf'){
            Storage::delete('public/file/'.$document->file.'.enc');
        }

        $document->delete();
        return redirect('/documents')->with('success', 'Document Removed');
    }
}
