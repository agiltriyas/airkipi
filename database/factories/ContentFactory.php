<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->realText(50);
        $category = $this->faker->randomElement(['Hikayat', 'Budaya', 'Tokoh', 'Situs', 'Lagu-Daerah']);
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $post = "";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }
        $thumbnail = $this->faker->image('public/storage/image/content/test-image', 600, 400, null, false);
        $headerimage = $this->faker->image('public/storage/image/content/test-image', 800, 500, null, false);
        return [
            'title' => $title,
            'subtitle' => $title,
            'kategori' => $category,
            'slug' => Str::slug($category) . '/' . Str::slug($title),
            'content' => $post,
            'thumbnail' => 'image/content/test-image/' . $thumbnail,
            'headerimage' => 'image/content/test-image/' . $headerimage,
            'status' => 'published',
            'tags' => $category,
            'tagtitle' => $title,
            'tagtype' => 'article',
            'user_id' => 1,
            'tagdescription' => substr(strip_tags($post), 0, 200),
            'tagurl' => url()->current(),
            'tagsitename' => "sejarahlokalsumut.org/" . Str::slug($title),
            'tagimage' => 'test',
        ];
    }
}
