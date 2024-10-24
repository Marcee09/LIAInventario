<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssetFactory extends Factory
{
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'codigo_inventario' => $this->faker->unique()->numerify('INV-#####'),
            'codigo_patrimonio' => $this->faker->unique()->numerify('PAT-#####'),
            'detalle' => $this->faker->sentence(),
             //  'imagen' => $this->faker->image('public/storage/assets_images', 640, 480, null, false),Genera una imagen automática
            //'imagen' => 'https://picsum.photos/200/200?random=' . rand(1, 1000),  URL aleatoria
            'imagen' => $this->generateBase64Image(), // Llama a la función para generar imagen en Base64
            'tipo' => $this->faker->randomElement(['Tipo 1', 'Tipo 2', 'Tipo 3']),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'alta' => $this->faker->date(),
            'baja' => $this->faker->optional()->date(), // Puede ser null
            'observaciones' => $this->faker->optional()->text(),
        ];
    }

    private function generateBase64Image()
{
    // Generar una imagen de 255x255
    $imageUrl = 'https://picsum.photos/255/255?random=' . rand(1, 200);
    
    // Obtener el contenido de la imagen
    $image = file_get_contents($imageUrl);
    
    // Codificar la imagen en Base64
    return 'data:image/jpeg;base64,' . base64_encode($image);
}

}

