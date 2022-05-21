<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class NavHelper
{
    /**
     * Active Parent Nav
     *
     * @param string $current
     * @param array $allSlugs
     * @return string
     */
    public function navActive($current,$allSlugs = []){
        if(in_array($current,$allSlugs)){
            return 'active collapsed';
        }
    }
    /**
     * Collaps Open Dropdwon
     *
     * @param sting $current
     * @param array $allSlugs
     * @return string
     */
    public function navOpen($current,$allSlugs = []){
        if(in_array($current,$allSlugs)){
            return 'show';
        }
    }
    /**
     * Active link
     *
     * @param string $current
     * @param string $slug
     * @return string
     */
    public function linkActive($current,$slug){
        if($current == $slug){
            return 'active';
        }
    }
    /**
     *
     *
     * @param string $current
     * @param array $allSlugs
     * @return string
     */
    public function navExpand($current,$allSlugs = [])
    {
        if(in_array($current,$allSlugs)){
            return 'true';
        }else{
            return 'false';
        }
    }
    public function adminBreadcrumb()
    {
        for($i = 1; $i <= count(Request::segments()); $i++):?>
            <li class="breadcrumb-item text-sm">

                <?= Request::segment($i); ?>
            </li>
        <?php endfor;
    }
}
