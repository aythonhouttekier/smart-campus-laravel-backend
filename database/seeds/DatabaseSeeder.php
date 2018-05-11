<?php

use Illuminate\Database\Seeder;
use App\locations;
use App\devices;
use App\sensors;
use App\measurements;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Eloquent::unguard();

        $this->call('SmartCampusDummySeeder');
        $this->command->info('Smart campus dummy seeds finished.');
    }
}

class SmartCampusDummySeeder extends Seeder {

    public function run() {
        DB::table('measurements')->delete();
        DB::table('sensors')->delete();
        DB::table('devices')->delete();
        DB::table('locations')->delete();
        
        $roomEmbedded = locations::create(array(
            'name'         => 'Embedded systems',
            'roomnumber'   => '2.65',
            'description'  => 'Our hackerspace lab, sometimes there is some education also'
        ));

        $this->command->info('Classroom created!');

        $device = devices::create(array(
            'name'        => 'dummy_device',
            'dev-eui'     => '00E4F052209EE8A5',
            'location_id' => $roomEmbedded->id
        ));

        $this->command->info('We have put a device in a classroom');

        $dummySensor = sensors::create(array(
            'name'             => 'Dummy_sensor',
            'measurement_unit' => 'Dummy_unit',
            'device_id' => $device->id
        ));

        $dummySensor = sensors::create(array(
            'name'             => 'temperature',
            'measurement_unit' => 'Celcius',
            'device_id' => $device->id
        ));

        $dummySensor = sensors::create(array(
            'name'             => 'humidity',
            'measurement_unit' => '%',
            'device_id' => $device->id
        ));

        $dummySensor = sensors::create(array(
            'name'             => 'movement',
            'measurement_unit' => '%',
            'device_id' => $device->id
        ));

        $this->command->info('Dummy sensor created, you can add dummy measurments with the api');



        User::create(array(
            'id' => 1,
            'name' => "Fernanda Costermans",
            'email' => "fern.cos@telenet.be",
            'password' => "jdfksjf",
            'remember_token' => "tokenkjdfj",
            'created_at' => "1990-01-01 00:00:01",
            'updated_at' => "1991-01-01 07:00:01"
        ));






        measurements::create(array(
            'value' => 20,
            'sensor_id' => $dummySensor->id
        ));

        measurements::create(array(
            'value' => 21,
            'sensor_id' => $dummySensor->id
        ));

        measurements::create(array(
            'value' => 22,
            'sensor_id' => $dummySensor->id
        ));
        measurements::create(array(
            'value' => 23,
            'sensor_id' => $dummySensor->id
        ));
        measurements::create(array(
            'value' => 24,
            'sensor_id' => $dummySensor->id
        ));
        measurements::create(array(
            'value' => 25,
            'sensor_id' => $dummySensor->id
        ));

        $this->command->info('Added one value');
    }

}
