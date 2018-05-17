<?php

use Illuminate\Database\Seeder;

class createDemoContent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Création des utilisateurs demo
        if(true)
        {

            $customerEmail =  "@gmail.com";
            //create customers users
            if($this->command->choice('Do you want to create customers ?',['no','yes'],1) == 'yes'):
                $max = $this->command->ask('How many ?','100');
                $this->command->info("Create demo customers");
                $bar = $this->command->getOutput()->createProgressBar($max);
                for($i=0;$i<$max;$i++):
                    $customer = new \App\User();
                    $customer->name = 'customer_'.$i;
                    $customer->email = 'customer_'.$i.$customerEmail;
                    $customer->password = bcrypt('demo123');
                    $customer->save();
                    $bar->advance();
                endfor;
                $bar->finish();
                $this->command->getOutput()->writeln('');
                $this->command->info("Demo customers created");
            endif;


        }

    }
}
