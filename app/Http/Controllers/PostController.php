<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // Requiere autenticación JWT para todos los métodos
        $this->middleware('auth:api');
    }

    // Mostrar todos los posts
    public function index()
    {
        return response()->json(Post::with('user')->get());
    }

    // Crear un nuevo post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return response()->json($post, 201);
    }

    // Mostrar un post específico
    public function show($id)
    {
        $post = Post::with('user')->find($id);

        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
    
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }
    
        // Verifica que el post le pertenezca al usuario autenticado
        if ($post->user_id !== auth()->id()) {
            return response()->json(['message' => 'No autorizado para editar este post'], 403);
        }
    
        // Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        // Actualiza
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    
        return response()->json([
            'message' => 'Post actualizado correctamente',
            'post' => $post
        ]);
    }
    

    // Eliminar un post (solo si es del usuario)
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post || $post->user_id !== auth()->id()) {
            return response()->json(['message' => 'No autorizado o post no encontrado'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post eliminado correctamente']);
    }
}
