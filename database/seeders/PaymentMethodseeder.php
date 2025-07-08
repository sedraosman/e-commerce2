<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;
class PaymentMethodseeder extends Seeder
{
    /**
     * Run the database seeds.php
     */
    public function run(): void
    {
        $methods=['VisaCard','MasterCart','Paypal','Cash on Delivery'];
        foreach($methods as $method){
            PaymentMethod::create(['name'=>$method]);

        }
    }
}
