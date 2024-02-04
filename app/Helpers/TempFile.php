<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 21.11.16
 * Time: 10:01
 */

namespace App\Helpers;
use Storage;
use Illuminate\Http\Request;

class TempFile
{
    protected $disk;
    function __construct(Request $request){
        $this->request = $request;
        $this->disk = Storage::disk('temp');
        $this->dir = csrf_token().'/';
    }

    public function uploadFile($name_file,$dir=''){
        $this->clearTemps();
        if($this->request->file($name_file)&&$this->request->file($name_file)->isValid()){
            $name = $this->request->file($name_file)->getClientOriginalName();
            $dir = $dir==''?'':$dir.'/';
            $this->disk->put(
                $this->dir.$dir.$name,
                file_get_contents($this->request->file($name_file)->getRealPath())
            );
            return $name;
        }
        return false;
    }

    public function getFile($name){
        if(!$this->disk->has($this->dir.$name)){
            return false;
        }
        return $this->disk->get($this->dir.$name);
    }

    public function getAllFiles($dir=''){
        $dir = $dir==''?'':$dir.'/';
        return $this->disk->allFiles($this->dir.$dir);
    }


    public function deleteFile($name_file){
        $name = $this->dir."/".$name_file;
        if( $this->disk->has($name)){
            $this->disk->delete($name);
            return true;
        }
        return false;

    }

    public function clearTemps(){
        $time_life = 3600; // папки старше часа удаляем
        $directories = $this->disk->directories();
        if($directories){
            foreach($directories as $dir){
                if($this->disk->lastModified($dir)+$time_life<time()) {
                    $this->disk->deleteDirectory($dir);
                }
            }
        }
    }

    public function getPatch(){
        if(!isset($this->patch)){
            $this->patch = $this->disk->getDriver()->getAdapter()->getPathPrefix();
        }
        return $this->patch;
    }

}