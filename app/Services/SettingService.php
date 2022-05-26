<?php
namespace App\Services;

use App\Models\AdminUserSetting;
use App\Models\Option;

class SettingService
{
    public  function get($option_name, $all = null)
    {
        $option = Option::where('name',$option_name)->first();
        if($option){
            if($all){
                return $option;
            }else{
                return $option->value;
            }

        }else{
            return false;
        }

        return false;
    }
    public function add($option_name, $option_value)
    {
        $inputs = array(
            'name' =>$option_name,
            'value'=>$option_value

        );
        $res = Option::create($inputs);

        return $res->id;
    }

    public function update($option_name, $option_value)
    {
        $option = Option::where('name',$option_name)->first();
        if($option){
            $option_up = Option::where('name',$option_name)->get()->first();
            $inputs = array(
                'value'=>$option_value
            );
            $res = Option::where('name',$option_name)
            ->get()
            ->first()
            ->update($inputs);
            return $option_up->id;
            //$option_up->id;
        }else{
            $inputs = array(
                'name' =>$option_name,
                'value'=>$option_value

            );
            $res = Option::create($inputs);

            return $res->id;
        }
        return false;
    }

    public function admin_setting_get($name,$all = false)
    {
        $user_id = auth()->user()->id;
        $settings = AdminUserSetting::where(['admin_id'=>$user_id,'name'=>$name])->first();
        if($settings){
            if($all){
                return $settings;
            }else{
                return $settings->value;
            }

        }else{
            return false;
        }

        return false;
    }
    public function admin_setting_update($option_name, $option_value)
    {
        $user_id = auth()->user()->id;
        $settings = AdminUserSetting::where(['admin_id'=>$user_id,'name'=>$option_name])->first();
        if($settings){
            $option_up = AdminUserSetting::where(['admin_id'=>$user_id,'name'=>$option_name])->get()->first();
            $inputs = array(
                'value'=>$option_value
            );
            $res = AdminUserSetting::where(['admin_id'=>$user_id,'name'=>$option_name])
            ->get()
            ->first()
            ->update($inputs);
            return $option_up->id;
            //$option_up->id;
        }else{
            $inputs = array(
                'admin_id' =>$user_id,
                'name' =>$option_name,
                'value'=>$option_value

            );
            $res = AdminUserSetting::create($inputs);

            return $res->id;
        }
        return false;
    }
}
