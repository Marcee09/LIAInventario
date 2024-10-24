<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Traits\DebugHelper;
use App\Traits\ToastTrigger;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DebugHelper, ToastTrigger;
    public function index(Request $request): View {
        $assets = Asset::orderBy('id', 'DESC')->paginate(5);
        // Obtener el término de búsqueda
        $search = $request->input('search');
        
        

        // Filtrar activos basados en la búsqueda
        $assets = Asset::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', "%{$search}%")
                         ->orWhere('codigo_inventario', 'like', "%{$search}%")
                         ->orWhere('codigo_patrimonio', 'like', "%{$search}%")
                         ->orWhere('detalle', 'like', "%{$search}%")
                         ->orWhere('tipo', 'like', "%{$search}%")
                         ->orWhere('observaciones', 'like', "%{$search}%");
        })->get();

        // Pasar los activos y la búsqueda a la vista
        return view('assets.index', compact('assets', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_inventario' => 'required|string|unique:assets,codigo_inventario',
            'codigo_patrimonio' => 'required|string|unique:assets,codigo_patrimonio',
            'detalle' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tipo' => 'required|string',
            'cantidad' => 'required|integer',
            'alta' => 'required|date',
            'baja' => 'nullable|date',
            'observaciones' => 'nullable|string',
        ]);

        // Manejar la subida de la imagen
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('assets_images', 'public');
            $validated['imagen'] = $imagePath;
        }

        // Guardar los datos en la base de datos
        Asset::create($validated);

        // Redirigir después de guardar
        return redirect()->route('assets.index')->with('success', 'Activo creado con éxito');
    }

    // Otros métodos (show, edit, update, destroy) permanecen sin cambios...

    public function show(Asset $asset): View {
        return view('assets.show', compact('asset'));
    }

    public function edit(Asset $asset): View {
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, Asset $asset): RedirectResponse {
        // Validar los datos para la actualización
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_inventario' => 'required|string|unique:assets,codigo_inventario,' . $asset->id,
            'codigo_patrimonio' => 'required|string|unique:assets,codigo_patrimonio,' . $asset->id,
            'detalle' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tipo' => 'required|string',
            'cantidad' => 'required|integer',
            'alta' => 'required|date',
            'baja' => 'nullable|date',
            'observaciones' => 'nullable|string',
        ]);

        // Manejar la subida de la nueva imagen si es necesario
        if ($request->hasFile('imagen')) {
            // Borrar la imagen anterior si existe
            if ($asset->imagen) {
                Storage::delete('public/' . $asset->imagen);
            }

            // Guardar la nueva imagen
            $imagePath = $request->file('imagen')->store('assets_images', 'public');
            $validated['imagen'] = $imagePath;
        }

        // Actualizar los datos del activo
        $asset->update($validated);

        return redirect()->route('assets.index')->with('success', 'Activo actualizado con éxito');
    }

    public function destroy(Asset $asset): RedirectResponse {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Activo eliminado con éxito');
    }

    public function upload(Request $request): RedirectResponse
    {
        // Validar el archivo subido
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Almacenar el archivo en la carpeta 'uploads'
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        // Guardar el nombre del archivo en la base de datos (considera si esto es lo necesario)
        Asset::create(['filename' => $fileName]);

        return back()->with('success', 'Archivo subido correctamente.');
    }

    public function showFiles(): View {
        $files = Asset::all(); // Asegúrate de que esto es lo que deseas
        return view('show-files', compact('files'));
    }
}




