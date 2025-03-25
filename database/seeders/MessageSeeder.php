<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conversation;

/**
 * Class MessageSeeder
 *
 * Seed the conversation with messages.
 */
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conversations = Conversation::all();
        foreach ($conversations as $conversation) {

            // In 30% of the cases, skip the conversation.
            if (rand(1, 10) > 3) continue;

            $numberOfMessages = rand(1, 20);

            for ($i = 0; $i < $numberOfMessages; $i++) {
                $user_id = rand(1, 2) === 1 ? $conversation->user_one_id : $conversation->user_two_id;
                $conversation->messages()->create([
                    'content' => fake()->sentence(),
                    'user_id' => $user_id,
                ]);
            }
        }
    }
}
