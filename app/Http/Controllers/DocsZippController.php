<?php

namespace App\Http\Controllers;

use App\Models\DocsZipp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocsZippController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $user = new User;
        $docsZipps = new DocsZipp;
        $docsZipps  = $docsZipps->docsTranslationSelect();
        $docsZipps = $docsZipps->paginate(3);

        //  $docsZipps= DocsZipp::Select()
        //  ->paginate(3);
        return view('doczipp.docs',['docsZipps'=> $docsZipps,
        'user'=> $user,
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocsZipp  $docsZipp
     * @return \Illuminate\Http\Response
     */
    public function show(DocsZipp $docsZipp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocsZipp  $docsZipp
     * @return \Illuminate\Http\Response
     */
    public function edit(DocsZipp $docsZipp)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocsZipp  $docsZipp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocsZipp $docsZipp)
    {
        $docsZipp->update([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'user_id'=> Auth::user()->id
        ]);

    
        
        return view(route('doczipp.docs', ['docsZipp'=>$docsZipp]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocsZipp  $docsZipp
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocsZipp $docsZipp)
    {
        
        $docsZipp->delete();

        //return redirect(route('docs.delete'));
        return 'allo';
        
    }
}
