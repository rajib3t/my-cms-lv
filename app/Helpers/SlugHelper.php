<?php
namespace App\Helpers;

use App\Models\Samithi;
use App\Models\District;
use Illuminate\Support\Str;

class SlugHelper
{
    public  function district($title,$id = 0)
    {
        $slug = Str::slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getDistrictRelatedSlugs($slug,$id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug))
        {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++)
        {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug))
            {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');

    }
    protected function getDistrictRelatedSlugs($slug,$id = 0)
    {
        return District::select('slug')->where('slug', 'like', $slug.'%')

            ->where('id','<>',$id)
            ->get();
    }
    public function samithi($title,$district_id = 0,$id = 0)
    {
        $slug = Str::slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getSamithiRelatedSlugs($slug,$district_id,$id,);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug))
        {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++)
        {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug))
            {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getSamithiRelatedSlugs($slug,$district_id = 0,$id = 0)
    {
        return Samithi::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id','<>',$id)
            ->where('district_id','<>',$district_id)
            ->get();
    }
}
