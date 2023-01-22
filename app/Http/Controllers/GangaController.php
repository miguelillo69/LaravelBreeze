<?php

namespace App\Http\Controllers;

use App\Http\Requests\GangaRequest;
use App\Models\Category;
use App\Models\Ganga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gangas = Ganga::orderBy('title', 'ASC')->paginate(3);
        return view('gangas.index',compact('gangas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('gangas.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GangaRequest $request)
    {
        $ganga = new Ganga();
        $ganga->title = $request->get('title');
        $ganga->description = $request->get('description');
        $ganga->category = $request->get('category');
        $ganga->price = $request->get('price');
        $ganga->url =$request->get('url');
        $ganga->price_sale = $request->get('price_sale');
        $ganga->user_id = Auth::id();
        $ganga->available = $request->get('available') ? 1 : 0;
        $ganga->save();

        $insertedId = $ganga->id;
        $imagen  = $request->imagen;
        $path = $imagen->storeAs('img', $insertedId.'-ganga-severa.jpg', 'public');

        return redirect()->route('gangas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ganga = Ganga::find($id);
        return view('gangas.show', compact('ganga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ganga = Ganga::find($id);
        $categories = Category::all();
        return view('gangas.edit', compact('ganga','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function update(GangaRequest $request, $id)
    {
        $gangaAModificar = Ganga::findOrFail($id);
        $gangaAModificar->title = $request->get('title');
        $gangaAModificar->description = $request->get('description');
        $gangaAModificar->category = $request->get('category');
        $gangaAModificar->price = $request->get('price');
        $gangaAModificar->url =$request->get('url');
        $gangaAModificar->price_sale = $request->get('price_sale');
        $gangaAModificar->user_id = Auth::id();
        $gangaAModificar->available = $request->get('available') ? 1 : 0;
        $gangaAModificar->save();
        return redirect()->route('gangas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ganga::where('id', $id)->delete();
        return redirect()->route('gangas.index');
    }

    public function like($id) {
        $ganga = Ganga::findOrFail($id);
        $ganga->likes ++ ;
        $ganga->save();
        return redirect()->back();
    }

    public function unlike($id) {
        $ganga = Ganga::findOrFail($id);
        $ganga->unlikes ++ ;
        $ganga->save();
        return redirect()->back();
    }

    public function showGanasUser($user_id) {
        $ganga = Ganga::find($user_id);
        $categories = Category::all();
        return view('gangas.edit', compact('ganga','categories'));
    }
public function autor($user_id)
{
$gangas_autor = Ganga::where('user_id', $user_id)->paginate(3);
return view('gangas.autor', compact('gangas_autor'));
}

}
