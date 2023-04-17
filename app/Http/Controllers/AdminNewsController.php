<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        // $actus =  News::all() ;// lister tout 

        $actus =  News::orderBy('created_at', 'desc')->paginate(10);

        return view("adminnews.liste", compact('actus'));
    }
    public function formAdd()
    {
        //Affichage de mon formulaire

        return view('adminnews.edit');
    }

    public function formEdit($id = 0)
    {
        //Affichage de mon formulaire
        $actu = News::findOrFail($id);

        return view('adminnews.edit', compact('actu'));
    }

    // Ajout des informations
    public function add(Request $request)
    {

        // Vérification des données du formulaire
        /**
         * Titre obligatoire
         */
        $request->validate(['titre' => 'required|min:5']);
        // création d'une instance de class (model News) pour enregistrer en base .
        $newsModel = new News;

        $newsModel->titre = $request->titre;
        // Traitement de l'upload de 'image
        if ($request->file()) {
            $fileName = $request->image->store('public/images');
            $newsModel->image = $fileName;
        }

        $newsModel->description = $request->description;

        // Enregistrement des données
        $newsModel->titre = $request->titre;
        $newsModel->save(); // Enregistrement des données
        return redirect(route('news.add'));
    }

    public function delete($id = 0)
    {
        $actu = News::findOrfail($id); //recuperation d'une news


        $actu = News::findOrFail($id);

        Storage::get($actu->image);


        $actu->delete();


        return 'delete';
    }
}
