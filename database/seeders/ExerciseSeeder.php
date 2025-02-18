<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {

        $exercises = [
            // SOUND (Category ID 1)
            ['category_id' => 1, 'name' => 'Puh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SOUND/puh sound.m4a'],

            ['category_id' => 2, 'name' => 'Puh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - puh.m4a'],
            ['category_id' => 2, 'name' => 'Paw (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - paw.m4a'],
            ['category_id' => 2, 'name' => 'Pee (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - pee.m4a'],
            ['category_id' => 2, 'name' => 'Poo (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - poo.m4a'],
            ['category_id' => 2, 'name' => 'Peh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - peh.m4a'],
            ['category_id' => 2, 'name' => 'Pow (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - pow.m4a'],

            ['category_id' => 3, 'name' => 'Puh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - puh.m4a'],
            ['category_id' => 3, 'name' => 'Paw (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - paw.m4a'],
            ['category_id' => 3, 'name' => 'Pee (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - pee.m4a'],
            ['category_id' => 3, 'name' => 'Poo (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - poo.m4a'],
            ['category_id' => 3, 'name' => 'Peh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - peh.m4a'],
            ['category_id' => 3, 'name' => 'Pow (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SYLLABLE/syllable - pow.m4a'],

            ['category_id' => 4, 'name' => 'Pig - Inital P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - pig.m4a'],
            ['category_id' => 4, 'name' => 'Put - Inital P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - put.m4a'],
            ['category_id' => 4, 'name' => 'Pencil - Initial P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - pencil.m4a'],
            ['category_id' => 4, 'name' => 'Pancackes - Inital P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - pancakes.m4a'],

            ['category_id' => 4, 'name' => 'Super - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - super.m4a'],
            ['category_id' => 4, 'name' => 'Copy - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - copy.m4a'],
            ['category_id' => 4, 'name' => 'Paper - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - paper.m4a'],
            ['category_id' => 4, 'name' => 'Open - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - open.m4a'],

            ['category_id' => 4, 'name' => 'Mop - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - mop.m4a'],
            ['category_id' => 4, 'name' => 'Soap - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - soap.m4a'],
            ['category_id' => 4, 'name' => 'Sweep - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - sweep.m4a'],
            ['category_id' => 4, 'name' => 'Syrup - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - syrup.m4a'],

            ['category_id' => 5, 'name' => 'Pig - Inital P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - pig.m4a'],
            ['category_id' => 5, 'name' => 'Put - Inital P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - put.m4a'],
            ['category_id' => 5, 'name' => 'Pencil - Initial P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - pencil.m4a'],
            ['category_id' => 5, 'name' => 'Pancackes - Inital P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/initial word - pancakes.m4a'],

            ['category_id' => 5, 'name' => 'Super - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - super.m4a'],
            ['category_id' => 5, 'name' => 'Copy - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - copy.m4a'],
            ['category_id' => 5, 'name' => 'Paper - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - paper.m4a'],
            ['category_id' => 5, 'name' => 'Open - Middle P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/middle word - open.m4a'],

            ['category_id' => 5, 'name' => 'Mop - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - mop.m4a'],
            ['category_id' => 5, 'name' => 'Soap - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - soap.m4a'],
            ['category_id' => 5, 'name' => 'Sweep - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - sweep.m4a'],
            ['category_id' => 5, 'name' => 'Syrup - Final P. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/WORDS/final word - syrup.m4a'],

            ['category_id' => 6, 'name' => 'Hot Pancakes (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - hot pancakes.m4a'],
            ['category_id' => 6, 'name' => 'Short Pencil (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - short pencil.m4a'],
            ['category_id' => 6, 'name' => 'New Pants (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - new pants.m4a'],
            ['category_id' => 6, 'name' => 'Cherry Pie (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - cherry pie.m4a'],

            ['category_id' => 7, 'name' => 'Hot Pancakes (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - hot pancakes.m4a'],
            ['category_id' => 7, 'name' => 'Short Pencil (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - short pencil.m4a'],
            ['category_id' => 7, 'name' => 'New Pants (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - new pants.m4a'],
            ['category_id' => 7, 'name' => 'Cherry Pie (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/PHRASES/phrases - cherry pie.m4a'],

            ['category_id' => 8, 'name' => 'Your pancakes look really good. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - your pancakes look really good.m4a'],
            ['category_id' => 8, 'name' => 'He needs to sharpen his pencil. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - he needs to sharpen his pencil.m4a'],
            ['category_id' => 8, 'name' => 'There is a sale on pants today. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - there is a sale on pants today..m4a'],
            ['category_id' => 8, 'name' => 'Your cherry pie looks delicious. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - your cherry pie looks delicious.m4a'],

            ['category_id' => 9, 'name' => 'Your pancakes look really good. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - your pancakes look really good.m4a'],
            ['category_id' => 9, 'name' => 'He needs to sharpen his pencil. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - he needs to sharpen his pencil.m4a'],
            ['category_id' => 9, 'name' => 'There is a sale on pants today. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - there is a sale on pants today.m4a'],
            ['category_id' => 9, 'name' => 'Your cherry pie looks delicious. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/FIRST SET (P)/SENTENCES/sentences - you cherry pie looks delicious.m4a'],

            ['category_id' => 10, 'name' => 'Buh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SOUND/buh sound.m4a'],

            ['category_id' => 11, 'name' => 'Buh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - buh.m4a'],
            ['category_id' => 11, 'name' => 'Bee (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - bee.m4a'],
            ['category_id' => 11, 'name' => 'Boo (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - boo.m4a'],
            ['category_id' => 11, 'name' => 'Bow (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - bow.m4a'],
            ['category_id' => 11, 'name' => 'Baw (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - baw.m4a'],
            ['category_id' => 11, 'name' => 'Beh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - beh.m4a'],

            ['category_id' => 12, 'name' => 'Buh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - buh.m4a'],
            ['category_id' => 12, 'name' => 'Bee (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - bee.m4a'],
            ['category_id' => 12, 'name' => 'Boo (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - boo.m4a'],
            ['category_id' => 12, 'name' => 'Bow (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - bow.m4a'],
            ['category_id' => 12, 'name' => 'Baw (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - baw.m4a'],
            ['category_id' => 12, 'name' => 'Beh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SYLLABLE/syllable - beh.m4a'],

            ['category_id' => 13, 'name' => 'Book - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - book.m4a'],
            ['category_id' => 13, 'name' => 'Bed - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - bed.m4a'],
            ['category_id' => 13, 'name' => 'Baby - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - baby.m4a'],
            ['category_id' => 13, 'name' => 'Banana - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - banana.m4a'],


            ['category_id' => 13, 'name' => 'Somebody - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - somebody.m4a'],
            ['category_id' => 13, 'name' => 'Rabbit - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - rabbit.m4a'],
            ['category_id' => 13, 'name' => 'Kickball - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - kickball.m4a'],
            ['category_id' => 13, 'name' => 'Able - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - able.m4a'],

            ['category_id' => 13, 'name' => 'Bib - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - bib.m4a'],
            ['category_id' => 13, 'name' => 'Rub - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - rub.m4a'],
            ['category_id' => 13, 'name' => 'Job - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - job.m4a'],
            ['category_id' => 13, 'name' => 'Crab - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - crab.m4a'],

            ['category_id' => 14, 'name' => 'Book - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - book.m4a'],
            ['category_id' => 14, 'name' => 'Bed - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - bed.m4a'],
            ['category_id' => 14, 'name' => 'Baby - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - baby.m4a'],
            ['category_id' => 14, 'name' => 'Banana - Inital B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/initial word - banana.m4a'],


            ['category_id' => 14, 'name' => 'Somebody - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - somebody.m4a'],
            ['category_id' => 14, 'name' => 'Rabbit - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - rabbit.m4a'],
            ['category_id' => 14, 'name' => 'Kickball - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - kickball.m4a'],
            ['category_id' => 14, 'name' => 'Able - Middle B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/middle word - able.m4a'],

            ['category_id' => 14, 'name' => 'Bib - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - bib.m4a'],
            ['category_id' => 14, 'name' => 'Rub - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - rub.m4a'],
            ['category_id' => 14, 'name' => 'Job - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - job.m4a'],
            ['category_id' => 14, 'name' => 'Crab - Final B. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/WORDS/final word - crab.m4a'],

            ['category_id' => 15, 'name' => 'Baby Socks (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - blue socks.m4a'],
            ['category_id' => 15, 'name' => 'Blue Bag (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - blue bug.m4a'],
            ['category_id' => 15, 'name' => 'Dusty Books (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - dusty books.m4a'],
            ['category_id' => 15, 'name' => 'Dribble The Ball (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - dribble the ball.m4a'],

            ['category_id' => 16, 'name' => 'Baby Socks (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - blue socks.m4a'],
            ['category_id' => 16, 'name' => 'Blue Bag (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - blue bug.m4a'],
            ['category_id' => 16, 'name' => 'Dusty Books (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - dusty books.m4a'],
            ['category_id' => 16, 'name' => 'Dribble The Ball (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/PHRASES/phrases - dribble the ball.m4a'],

            ['category_id' => 17, 'name' => 'That is a cute baby. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - that is a cute baby.m4a'],
            ['category_id' => 17, 'name' => 'He has a blue bag. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - he has a blue bag.m4a'],
            ['category_id' => 17, 'name' => 'This is my favorite book. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - this is my favorite book.m4a'],
            ['category_id' => 17, 'name' => 'He shot the ball at the buzzer. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - he shot the ball at the buzzer.m4a'],

            ['category_id' => 18, 'name' => 'That is a cute baby. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - that is a cute baby.m4a'],
            ['category_id' => 18, 'name' => 'He has a blue bag. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - he has a blue bag.m4a'],
            ['category_id' => 18, 'name' => 'This is my favorite book. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - this is my favorite book.m4a'],
            ['category_id' => 18, 'name' => 'He shot the ball at the buzzer. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/SECOND SET (B)/SENTENCES/sentences - he shot the ball at the buzzer.m4a'],

            ['category_id' => 19, 'name' => 'Mmm (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SOUND/mm sound.m4a'],

            ['category_id' => 20, 'name' => 'Muh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - muh.m4a'],
            ['category_id' => 20, 'name' => 'Meh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - meh.m4a'],
            ['category_id' => 20, 'name' => 'Mow (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - mow.m4a'],
            ['category_id' => 20, 'name' => 'My (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - my.m4a'],
            ['category_id' => 20, 'name' => 'Mah (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - mah.m4a'],
            ['category_id' => 20, 'name' => 'Mee (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - mee.m4a'],

            ['category_id' => 21, 'name' => 'Muh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - muh.m4a'],
            ['category_id' => 21, 'name' => 'Meh (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - meh.m4a'],
            ['category_id' => 21, 'name' => 'Mow (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - mow.m4a'],
            ['category_id' => 21, 'name' => 'My (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - my.m4a'],
            ['category_id' => 21, 'name' => 'Mah (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - mah.m4a'],
            ['category_id' => 21, 'name' => 'Mee (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SYLLABLE/syllable - mee.m4a'],

            ['category_id' => 22, 'name' => 'More - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - more.m4a'],
            ['category_id' => 22, 'name' => 'Movie - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - movie.m4a'],
            ['category_id' => 22, 'name' => 'Mask - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - mask.m4a'],
            ['category_id' => 22, 'name' => 'Mountain - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - mountain.m4a'],


            ['category_id' => 22, 'name' => 'Camera - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - camera.m4a'],
            ['category_id' => 22, 'name' => 'Watermelon - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - watermelon.m4a'],
            ['category_id' => 22, 'name' => 'Camel - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - camel.m4a'],
            ['category_id' => 22, 'name' => 'Tomato - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - tomato.m4a'],

            ['category_id' => 22, 'name' => 'Bathroom - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - bathroom.m4a'],
            ['category_id' => 22, 'name' => 'Climb - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - climb.m4a'],
            ['category_id' => 22, 'name' => 'Swim - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - swim.m4a'],
            ['category_id' => 22, 'name' => 'Dream - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - dream.m4a'],

            ['category_id' => 23, 'name' => 'More - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - more.m4a'],
            ['category_id' => 23, 'name' => 'Movie - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - movie.m4a'],
            ['category_id' => 23, 'name' => 'Mask - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - mask.m4a'],
            ['category_id' => 23, 'name' => 'Mountain - Inital M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/initial word - mountain.m4a'],


            ['category_id' => 23, 'name' => 'Camera - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - camera.m4a'],
            ['category_id' => 23, 'name' => 'Watermelon - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - watermelon.m4a'],
            ['category_id' => 23, 'name' => 'Camel - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - camel.m4a'],
            ['category_id' => 23, 'name' => 'Tomato - Middle M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/middle word - tomato.m4a'],

            ['category_id' => 23, 'name' => 'Bathroom - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - bathroom.m4a'],
            ['category_id' => 23, 'name' => 'Climb - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - climb.m4a'],
            ['category_id' => 23, 'name' => 'Swim - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - swim.m4a'],
            ['category_id' => 23, 'name' => 'Dream - Final M. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/WORDS/final word - dream.m4a'],

            ['category_id' => 24, 'name' => 'Party Mask (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - party mask.m4a'],
            ['category_id' => 24, 'name' => 'Black Moose (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - black moose.m4a'],
            ['category_id' => 24, 'name' => 'Nice Mom (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - nice mom.m4a'],
            ['category_id' => 24, 'name' => 'Funny Movie (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - funny movie.m4a'],

            ['category_id' => 25, 'name' => 'Party Mask (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - party mask.m4a'],
            ['category_id' => 25, 'name' => 'Black Moose (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - black moose.m4a'],
            ['category_id' => 25, 'name' => 'Nice Mom (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - nice mom.m4a'],
            ['category_id' => 25, 'name' => 'Funny Movie (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/PHRASES/phrases - funny movie.m4a'],

            ['category_id' => 26, 'name' => 'Wear a mask to the party. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - wear a mask to the party.m4a'],
            ['category_id' => 26, 'name' => 'The moose has big antlers. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - the moose has big antlers.m4a'],
            ['category_id' => 26, 'name' => 'My mom gave me a hug. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - my mom gave me a hug.m4a'],
            ['category_id' => 26, 'name' => 'We are going to the movie at 7 PM. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - we are going to the movies at 7 PM.m4a'],

            ['category_id' => 27, 'name' => 'Wear a mask to the party. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - wear a mask to the party.m4a'],
            ['category_id' => 27, 'name' => 'The moose has big antlers. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - the moose has big antlers.m4a'],
            ['category_id' => 27, 'name' => 'My mom gave me a hug. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - my mom gave me a hug.m4a'],
            ['category_id' => 27, 'name' => 'We are going to the movie at 7 PM. (Repeat 5 Times)', 'media_file' => 'media/SPEAK RECORDING/THIRD SET (M)/SENTENCES/sentences - we are going to the movies at 7 PM.m4a'],




        ];

        // Insert each exercise
        foreach ($exercises as $exercise) {
            if (!Exercise::where('category_id', $exercise['category_id'])->where('name', $exercise['name'])->exists()) {
                Exercise::create([
                    'category_id' => $exercise['category_id'],
                    'name' => $exercise['name'],
                    'media_url' => Storage::url($exercise['media_file']),
                    'media_file' => $exercise['media_file']
                ]);
            }
        }
    }
}
