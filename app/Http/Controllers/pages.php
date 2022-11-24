<?php

namespace App\Http\Controllers;

class pages extends Controller
{
    //
    public function pages()
    {
        $pageBox = [];
        $pageBox['pages'] = [
            "http://unsplash.it/600/400?image=940",
            "http://unsplash.it/640/450?image=906",
            "http://unsplash.it/550/420?image=885",
            "http://unsplash.it/650/450?image=823",
            "http://unsplash.it/600/350?image=815",
            "http://unsplash.it/560/500?image=677",
            "http://unsplash.it/670/410?image=401",
            "http://unsplash.it/620/340?image=623",
            "http://unsplash.it/790/390?image=339",
        ];
        return view('page2', $pageBox);
    }
}