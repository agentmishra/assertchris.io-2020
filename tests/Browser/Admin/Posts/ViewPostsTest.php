<?php

namespace Tests\Browser\Admin\Posts;

use App\Models\Post;
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
    public function can_use_edit_links()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit(env('APP_URL') . '/admin/posts')->assertSeeIn('a', 'edit');
            $browser->clickLink('edit');
            $browser->waitForRoute('admin.posts.edit-post', Post::first());
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
