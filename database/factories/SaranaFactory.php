<?php

namespace Database\Factories;

use App\Models\Sarana;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaranaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sarana::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'sarana' => $this->faker->randomElement([
                "SCANNER",
                "CPU",
                "MONITOR",
                "WACOM"
            ]),
            'aktiva' => "C01." . $this->faker->latitude($min = 1, $max = 90),
            'sn' => $this->faker->swiftBicNumber,
            'tahun_perolehan' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status' => $this->faker->randomElement([
                "SERVICE",
                "AKTIF"
            ]),
            'kode_dc' => "G001"
        ];
    }
}
