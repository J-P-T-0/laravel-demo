<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 100, 2000), // Precio entre 10 y 2000
            'stock' => $this->faker->numberBetween(0, 100), // Stock entre 0 y 100
            'category' => $this->faker->randomElement(['Creatina', 'Pre-Entreno', 'Proteína', 'Suplemento']),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->randomElement([
                'image/1kQPUWn7a1heiQGBMNJucNDrUAqkfjk9WJGE37mQ.png',
                'image/6R47B8tbMXlwn4pSeaVIkfQDk6BpUoFXvTw1Ey1h.jpg',
                'image/D4AhRLRFLi0YeJNVXpX9O45qise7S8ootJVDPLUn.webp',
                'image/AAab10rPUL1kLUHZUwciU2t2jd9fWRxdMHJH0JXB.jpg',
                'image/HvKsHS5miFLhEhbX7NBb8ITLGgj66hTxMhbuzpan.jpg',
                'image/DuAAmk7DuSphod5nq2zvsuI9z3tLkoisURqqrf4S.png',
                'image/hlhbnNUVxcrKDuDt2WtnPctq3O6i6OcDmZSh1PGt.jpg',
                'image/NzuzwCfJjb6lPUcg5YQe3Y2ST2L4jeeyHzwo8bEq.jpg',
                'image/S883Z94v7SGB4LYRlNjGVRpSvipRjrewTJJe4zzc.jpg',
                'image/2ZShcnn2Bchspj9hWL65ZJ10oFbfKlsFQyKRGc5X.webp',
                'image/3SEkBA8NqpiV0uSBxqNQcwm7X3uE9G35gLIkPpw5.jpg',
                'image/KuuUv9PWRkWmTeILaIqUkunL15dH9AMM6Fgd5jvY.jpg']), // URL aleatoria de imagen
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
