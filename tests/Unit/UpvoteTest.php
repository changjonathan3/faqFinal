<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class UpvoteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanIncrement()
    {
        $tgtAnswer = DB::table('answers')->orderBy('id')->first();
        $countB4 = $tgtAnswer->votes;
        $expCountAfter = $countB4 + 1;
        DB::table('answers')->where('id',$tgtAnswer->id)->update(['votes'=>$expCountAfter]);
        $this->assertDatabaseHas('answers',['id'=>$tgtAnswer->id, 'votes'=>$expCountAfter]);
    }
}