<?php

use Illuminate\Database\Seeder;

use App\Person;
use Carbon\Carbon;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fakePerson();
        
    }

    protected function fakePerson() {
        $persons = [];
        for ($i = 1; $i < 10; $i++) {
            $data = [
                'name'       => 'Pessoa '. $i,
                'gender'     => $i % 2 === 0 ? 'male' : 'female',
                'birth_date' => (new Carbon('1998-'. $i . '-25'))->toDateString()
            ];
            $person = new Person();
            $person->fill($data);
            $person->save();
            
        }

    }
}
