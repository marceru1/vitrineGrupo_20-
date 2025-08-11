<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Imagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ImagemController extends Controller
{
  public function store(Request $request) {
    $imagem = new Imagem; // objeto da model

    if ($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;
        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . '.' . $extension;

        $destinationPath = 'imagens_inseridas/';
        // Salvar em public/images
        $requestImage->move(public_path($destinationPath), $imageName);

        // Salvar no banco
        $imagem->name = $imageName;

        $imagem->path = $destinationPath . $imageName;
    }
    $imagem->user = auth()->id();
    $imagem->save();

    return redirect('/dashboard');
}

public function galeria()
{
    $imagens = Imagem::where('user', auth()->id())->latest()->get();

    return view('dashboard', ['imagens' => $imagens]);
}
public function destroy($id)
{
    $imagem = Imagem::findOrFail($id);

    // Verifica se o usuário autenticado é dono da imagem


    // Apaga a imagem
    $imagePath = public_path($imagem->path);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Apaga do banco
    $imagem->delete();

    return redirect('/dashboard')->with('msg', 'Imagem excluída com sucesso!');
}

public function listarImagens()
{
    $path = public_path('images'); // Caminho real: public/images

    if (!File::exists($path)) {
        return response()->json(['error' => 'Pasta de imagens não encontrada'], 404);
    }

    $files = File::files($path);


    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    $imageFiles = array_filter($files, function ($file) use ($allowedExtensions) {
        return in_array(strtolower($file->getExtension()), $allowedExtensions);
    });


    $imageUrls = array_map(function ($file) {
        return asset('images/' . $file->getFilename());
    }, $imageFiles);

    return response()->json(array_values($imageUrls));
}
}
