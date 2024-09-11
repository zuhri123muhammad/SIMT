<?php

namespace Database\Seeders;

use App\Models\Operator;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('12345678');
        $user = User::create([
            'email' => 'operator@simt.com',
            'password' => $password,
            'role' => 'isOperator',
        ]);

        if ($user) {
            $opr = Operator::create([
                'user_id' => $user->id,
                'fullName' => 'Mimin T-Rex',
                'address' => 'Jln. UPN Veteran',
                'phone' => '00882233441',
            ]);
    
            if ($opr) {
                $upUser = User::findorfail($user->id);
                $dt = [
                    'name' => $opr->fullName,
                ];
                $upUser->update($dt);
            }
        }

    }
}
