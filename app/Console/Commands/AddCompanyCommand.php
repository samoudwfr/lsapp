<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new company';

    /**
     * Create a new command instance.
     *
     *
     */

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is the company name');
        $phone = $this->ask('What is the company phone number');
        if($this->confirm('Are you ready to add ' .$name)){

        $company = Company::create([
            'name' => $name,
            'phone' => $phone
        ]);
            return $this->info('Added ' .$company->name);
        }
//        $this->info('Added ' .$company->name);
    }
}
