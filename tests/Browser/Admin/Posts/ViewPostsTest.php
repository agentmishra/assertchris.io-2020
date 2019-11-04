<?php

namespace Tests\Browser\Admin\Posts;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewPostsTest extends DuskTestCase
{
    /** @test */
    public function can_see_heading()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit(env('APP_URL') . '/admin/posts')->assertSee('View Posts');
        });
    }

    /** @test */
    public function can_see_pagination()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit(env('APP_URL') . '/admin/posts')->assertSeeIn('nav *', 'Previous');
            $browser->visit(env('APP_URL') . '/admin/posts')->assertSeeIn('nav *', 'Next');
        });
    }
}
