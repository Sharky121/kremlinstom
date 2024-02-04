<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request As Requ;

use App\Pictures;
use App\Files;
use App\Page;
use App\Action;
use App\Worker;
use App\News;
use App\Service;
use App\DopService;
use App\Review;
use App\Price;
use App\Http\Requests;
use Auth;
use DB;
use Storage;
use App\Setting;
use App\Question;
use App\User;
use App\Experience;
use App\Access;
use App\Menu;
use Request;
use Hash;
use Carbon\Carbon;
use App;
use Input;
use Excel;

class ApanelModelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    // рекурсивная функция преобразует дерево в массив где ключами являются id сгенерированные js скриптом
    function tree2array($tree,$parent='parent')
    {
        $catalog = array();
        foreach ($tree AS $key => $row) {
            $catalog[$row['__uid__']] =array('id'=>$row['id'],$parent=>isset($row[$parent])?$row[$parent]:0,'sort'=>$row['__index__']+1,'sort_old'=>isset($row['sort'])?$row['sort']:1,'__parent__'=>$row['__parent__'],'__edit__'=>isset($row['__edit__'])?true:false);
            if($row['__children__']){
                $catalog = array_merge($catalog,$this->tree2array($row['__children__'],$parent));
            }
        }
        return $catalog;
    }


    // меню админки
    public function postCpinfo(){
        $menu = Auth::user()->menu();//->select('title','url')
        return response()->json(["menu"=>$menu]);
    }

    // работа с фотками
    public function postDelphoto(){
        $id=Request::only('id');
        if($id){
            if(Pictures::findOrFail($id['id'])->delete()){
                return response()->json(array('status' => 1, "mess" => "Изображение удалено"));
            }
            abort(500);
        }
        abort(400);
    }

    public function postSavephoto(){
        $photo = Request::only('photo');
        if(!$photo){
            abort(400);
        }
        $photo = $photo['photo'];
        $picture = Pictures::findOrFail($photo['id']);

        $picture->title = $photo['title'];
        if($picture->save()){
            return response()->json(array('status' => 1, "mess" => "Изменения сохранены"));
        }

        abort(500);

    }

    public function postSortphoto(){
        $photo = Request::only('photo');
        if(!$photo){
            abort(400);
        }
        $photo = $photo['photo'];
        if(is_array($photo)){
            foreach($photo as $k => $ph){
                Pictures::where('id',$ph['id'])->update(['sort'=>$k+1]);
            }
            return response()->json(array('status' => 1, "mess" => "Изменения сохранены"));
        }
        abort(500);
    }

    // работа с файлами
    public function postDelfile(){
        $id=Request::only('id');
        if($id){
            if(Files::findOrFail($id['id'])->delete()){
                return response()->json(array('status' => 1, "mess" => "Файл удалён"));
            }
            abort(500);
        }
        abort(400);
    }

    public function postSavefile(){
        $file = Request::only('file');
        if(!$file){
            abort(400);
        }
        $file = $file['file'];
        $files = Files::findOrFail($file['id']);

        $files->title = $file['title'];
        if($files->save()){
            return response()->json(array('status' => 1, "mess" => "Изменения сохранены"));
        }

        abort(500);

    }

    public function postSortfile(){
        $files = Request::only('files');
        if(!$files){
            abort(400);
        }
        $files = $files['files'];
        if(is_array($files)){
            foreach($files as $k => $ph){
                Files::where('id',$ph['id'])->update(['sort'=>$k+1]);
            }
            return response()->json(array('status' => 1, "mess" => "Изменения сохранены"));
        }
        abort(500);
    }

    public function getFile($id){
        $file = Files::findOrFail($id);
       return $file -> download();
    }

    // пользователи
    public function postListUsers(){
        if(Gate::denies('readModule',18)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = User::all();
        return response()->json(['items'=>$items]);
    }


    public function postDeleteUsers(){
        if(Gate::denies('deleteModule',18)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = Request::only('item');
        if(!$item){
            abort(400);
        }
        $item = $item['item'];
        $cat = Quest::find($item['id']);
        if($cat) {
            $cat->delete();
            return response()->json(array('status' => 1, "mess" => "Удалено"));
        }
        abort(400);
    }

    public function postGetUsers(){
        if(Gate::denies('readModule',18)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = User::findOrFail(Request::input('id'));
        $item ->syncAccess();
//        if(Gate::denies('readPermiss',1)) {
//            $modules = [];
//        }else{
            $modules = $item->modules();
//        }
//        if(Gate::denies('readPermiss',2)) {
//            $permiss = [];
//        }else{
//            $permiss = $item->permiss();
//        }


        return response()->json(array('item'=>$item,'modules'=>$modules/*,'permiss'=>$permiss*/));
    }

    public function postSaveUsers(Requ $request){
        //return response()->json(['mess' => Menu::all()->pluck('id')], 403);

        if(Gate::denies('writeModule',18)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.name' => 'required|max:255',
            'item.email' => 'required|unique:users,email,'.$request->input('item.id'),
            'item.pass' => 'confirmed'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.name.required'=>'Укажите имя',
                'item.name.max'=>'Имя слишком длинное',
                'item.email.required'=>'Укажите e-mail',
                'item.email.unique'=>'Указанный e-mail зарегистрирован в системе',
                'item.pass.confirmed' =>'Пароли не совпадают',
            ]
        );

        if($request->input('item.id')=='new'){
            $page = new User;
            $page->save();
            $page->allMenu()->sync(Menu::all()->pluck('id')->toArray());

        }else{
            $page = User::findOrFail($request->input('item.id'));
        }


        $page->name = $request->input('item.name');
        $page->email = $request->input('item.email');
        if( $request->input('item.pass')) {
            $page->password = Hash::make( $request->input('item.pass'));
        }
        $page->save();
        // сохранение настроек доступа к модулям
        $modules = $request->input('modules');
//        if($modules&&Gate::allows('writePermiss',1)){
            $modules = collect($modules)->pluck('pivot');
            $arr_update=[];
            foreach($modules as $module){
                $arr_update[$module['menu_id']]=array_only($module,['read','write','delete']);
            }
            $page->allMenu()->sync($arr_update);
//        }
        // сохранение настроек разрешений
//        $permiss = $request->input('permiss');
//        if($permiss&&Gate::allows('writePermiss',2)){
//            $permiss = collect($permiss)->pluck('pivot');
//            $arr_update=[];
//            foreach($permiss as $perm){
//                $arr_update[$perm['permission_id']]=array_only($perm,['read','write','delete']);
//            }
//            $page->permissions()->sync($arr_update);
//        }

        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    // профиль
    public function postGetProfile(){
        $item = Request::user();
        return response()->json(array('item'=>$item));
    }

    public function postSaveProfile(Requ $request){
        $this->validate($request, [
            'item.name' => 'required|max:255',
            'item.email' => 'required|unique:users,email,'.$request->input('item.id'),
            'item.pass' => 'confirmed'
        ],[
                'item.name.required'=>'Укажите имя',
                'item.name.max'=>'Имя слишком длинное',
                'item.email.required'=>'Укажите e-mail',
                'item.email.unique'=>'Указанный e-mail зарегистрирован в системе',
                'item.pass.confirmed' =>'Пароли не совпадают',
            ]
        );
        $user = $request->user();
        $user->name = $request->input('item.name');
        $user->email = $request->input('item.email');
        if($request->has('item.pass')) {
            $user->password = bcrypt($request->input('item.pass'));
        }
        $user->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено"));

    }

    // работа с временными файлами
    protected function uploadFile(Requ $request){
        $files = Storage::disk('temp')->files(csrf_token());
        $this->clearTemps();
        if($request->file('file')->isValid()){
            $name = $request->file('file')->getClientOriginalName();
            Storage::disk('temp')->put(
                csrf_token()."/".$name,
                file_get_contents($request->file('file')->getRealPath())
            );
            return json_encode([$name]);
        }
        return false;
    }

    protected function deleteFile(Requ $request){
        if($request->has('name')&&$request->has('op')){
            $name = csrf_token()."/".$request->input('name');
            if( Storage::disk('temp')->has($name)){
                Storage::disk('temp')->delete($name);
                return 'Файл удалён';
            }
            //return abort('404','Файл не найден');
            return response()->json([
                'message' => 'Файл не найден',
            ], 404);
        }
        return response()->json([
            'message' => 'Ошибка запроса',
        ], 400);
    }

    protected function clearTemps(){
        $time_life = 3600; // папки старше часа удаляем
        $directories = Storage::disk('temp')->directories();
        if($directories){
            foreach($directories as $dir){
                if(Storage::disk('temp')->lastModified($dir)+$time_life<time()) {
                    Storage::disk('temp')->deleteDirectory($dir);
                }
            }
        }

    }

    // страницы
    public function postListpages(){
        if(Gate::denies('readModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $pages = Page::orderBy('sort')->get();
        return response()->json($pages);
    }

    public function postSavepages()
    {
        if(Gate::denies('writeModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $tree = Request::only('tree');
        if(!$tree){
            return response()->json([
                'message' => 'Bad Request'
            ], 400);
        }
        $tree = $this->tree2array($tree['tree'],'page_id');

        // перебираем дерево и добавляем новые|обновляем измененые  элементы попутно меняя id в массиве на созданный
        foreach($tree AS $key => $row){
            $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
            if($row['sort']!=$row['sort_old'] || $parent!=$row['page_id']){
//                Page::where('id',$row['id'])
//                    ->update(array('sort'=>$row['sort'],'page_id'=>$parent));
                if($parent!=$row['page_id']){
                    $p = Page::find($row['id']);
                    $p->sort=$row['sort'];
                    $p->page_id=$parent;
                    $p->link = $p->link;// для запуска обновления url
                    $p->save();
                }else{
                    Page::where('id',$row['id'])
                    ->update(array('sort'=>$row['sort'],'page_id'=>$parent));
                }

            }
        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    public function postDeletepage(){
        if(Gate::denies('deleteModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = Request::only('item');
        if(!$item){
            abort(400);
        }
        $item = $item['item'];
        $cat = Page::find($item['id']);
        if($cat) {
            if($cat->not_delete){
                abort(400,"Удаление запрещено");
            }else{
                $cat->delete();
                return response()->json(array('status' => 1, "mess" => "Удалено"));
            }

        }
        abort(400);
    }

    public function postGetpage(){
        if(Gate::denies('readModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $page = Page::with('parent','childs','gallery','ico')->findOrFail(Request::input('id'));
        $pictures = $page->pictures->toArray();
        return response()->json(array('item'=>$page,'pictures'=>$pictures,'types'=>App\PageType::all()));
    }

    public function postSavepage(Requ $request){
        if(Gate::denies('writeModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите имя'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new Page;
            $page->page_id = $request->input('item.page_id',0);
        }else{
            $page = Page::findOrFail($request->input('item.id'));
        }

        $page->title = $request->input('item.title');
//        $page->sort = $request->input('item.sort');
        if($page->not_delete!=1){
            $page->link = $request->input('item.link');
        }
        $page->type_id = $request->input('item.type_id',1);
        $page->content = $request->input('item.content');
        $page->public = $request->input('item.public',0);
        $page->top_menu = $request->input('item.top_menu',0);
        $page->small_content = $request->input('item.small_content');
        $page->seo_description = $request->input('item.seo_description');
        $page->seo_keywords = $request->input('item.seo_keywords');
        $page->seo_title = $request->input('item.seo_title');
        $page->seo_content = $request->input('item.seo_content');
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postLoadphotopage($id){
        if(Gate::denies('writeModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'page','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postLoadGalleryPage($id){
        if(Gate::denies('writeModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'gallery_page','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postLoadIcoPage($id){
        if(Gate::denies('writeModule',1)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'page_ico','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postListPageTypes(){
        $items = App\PageType::all();
        return response()->json(['items'=>$items]);
    }
    /* *********************** конец основных разделов ***************************** */

    // сотрудники
    public function postListWorkers(){
        $items = Worker::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postSaveSortWorkers()
    {
        $tree = Request::only('tree');
        if(!$tree){
            return response()->json([
                'message' => 'Bad Request'
            ], 400);
        }
        $tree = $this->tree2array($tree['tree']);

        // перебираем дерево и добавляем новые|обновляем измененые  элементы попутно меняя id в массиве на созданный
        foreach($tree AS $key => $row){
            if($row['id']=='new'|| $row['__edit__'] ){
                $cc = Worker::firstOrCreate(array(
                    'id' => $row['id']));
                $cc->parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
                $cc->sort = $row['sort'];
                $cc->save();
                $tree[$key]['id']=$cc->id;
            }else{
                $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
                if($row['sort']!=$row['sort_old'] || $parent!=$row['parent']){
                    DB::table('workers')
                        ->where('id',$row['id'])
                        ->update(array('sort'=>$row['sort']/*,'parent'=>$parent*/));
                }
            }
        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    public function postDeleteWorker(Requ $request){
        if(Gate::denies('deleteModule',4)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:workers,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );

        $cat = Worker::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    public function postGetWorker(){
        $item = Worker::with('pictures','pictures_top','certificates','specializations')->findOrFail(Request::only('id')['id']);
        return response()->json(array('item'=>$item));
    }

    public function postSaveWorker(Requ $request){
        if(Gate::denies('writeModule',4)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.name' => 'required|max:255',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.name.required'=>'Укажите имя',
                'item.name.max'=>'Имя слишком длинное'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new Worker;
        }else{
            $page = Worker::findOrFail($request->input('item.id'));
        }
        $page->name = $request->input('item.name');
        $page->position = $request->input('item.position');
        $page->public = $request->input('item.public');
        $page->content = $request->input('item.content');
        $page->small_content = $request->input('item.small_content');
        $page->link = $request->input('item.link');
        $page->clinic_id = $request->input('item.clinic_id',0);
        $page->save();

        $spec = collect($request->input('item.specializations'))->pluck('id');
        $page->specializations()->sync($spec->toArray());

        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postLoadPhotoWorker($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'worker','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }
    public function postLoadPhotoTopWorker($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'worker_top','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }
    public function postLoadPhotoCertWorker($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'worker_cert','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    // опыт сотрудника
    public function postListExperiences($worker_id){
        $worker = Worker::with('experiences')->findOrFail($worker_id);
        return response()->json(['items'=>$worker->experiences]);
    }

    public function postSaveExperiences(Requ $request){
        if(Gate::denies('writeModule',4)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите имя'
            ]
        );
        $worker = Worker::findOrFail($request->input('item.worker_id'));

        if($request->input('item.id')=='new'){
            $page = new Experience();
        }else{
            $page = Experience::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->public = $request->input('item.public');
        $page->content = $request->input('item.content');
        //$page->save();
        $page = $worker->experiences()->save($page);
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postGetExperiences($worker_id){
        $worker = Worker::findOrFail($worker_id);
        $item = $worker->experiences()->findOrFail(Request::input('id'))->load('pictures');
        return response()->json(array('item'=>$item));
    }

    public function postSaveSortExperiences()
    {
        $tree = Request::only('tree');
        if(!$tree){
            return response()->json([
                'message' => 'Bad Request'
            ], 400);
        }
        $tree = $this->tree2array($tree['tree']);

        // перебираем дерево и добавляем новые|обновляем измененые  элементы попутно меняя id в массиве на созданный
        foreach($tree AS $key => $row){
            $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
            if($row['sort']!=$row['sort_old'] || $parent!=$row['parent']){
                DB::table('experiences')
                    ->where('id',$row['id'])
                    ->update(array('sort'=>$row['sort']));
            }

        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    public function postLoadPhotoExperiences($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'experience','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postDeleteExperiences(Requ $request){
        if(Gate::denies('deleteModule',4)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:experiences,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );

        $cat = App\Experience::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    // услуги
    public function postListServices(){
        if(Gate::denies('readModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = Service::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postSaveSortServices(Requ $request)
    {
        if(Gate::denies('writeModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'tree'=>'required|array',
            ],[
                'tree.array'=>"Ошибка входных данных",
                'tree.required'=>"Ошибка входных данных",
            ]
        );
        $parent_col = 'service_id';
        $tree = $this->tree2array($request->input('tree'),$parent_col);

        // перебираем дерево и обновляем измененые  элементы
        foreach($tree AS $key => $row){
                $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
                if($row['sort']!=$row['sort_old'] || $parent!=$row[$parent_col]){
                    if($parent!=$row[$parent_col]){
                        $p = Service::find($row['id']);
                        $p->sort=$row['sort'];
                        $p->{$parent_col}=$parent;
                        $p->link = $p->link;// для запуска обновления url
                        $p->save();
                    }else{
                        Service::where('id',$row['id'])
                            ->update(array('sort'=>$row['sort'],$parent_col=>$parent));
                    }
                }
        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    public function postDeleteServices(Requ $request){
        if(Gate::denies('deleteModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:services,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );

        $cat = Service::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    public function postGetServices(){
        if(Gate::denies('readModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = Service::with('workers','prices','actions','content_blocks.pictures','diseases','technologies')->findOrFail(Request::input('id'));
        $photo = $item->pictures->toArray();
        $gallery = $item->gallery->toArray();
        $ico = $item->ico->toArray();
        return response()->json(array('item'=>$item, 'pictures'=>$photo,'gallery'=>$gallery,'ico'=>$ico));
    }

    public function postSaveServices(Requ $request){
        if(Gate::denies('writeModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required|max:255',
            'item.workers' => 'array',
            'item.technologiess' => 'array',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите имя',
                'item.title.max'=>'Имя слишком длинное',
                'item.workers.array'=>'Ошибка формата сотрудников',
                'item.technologiess.array'=>'Ошибка формата технологий'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new Service;
        }else{
            $page = Service::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->public = $request->input('item.public',0);
        $page->content = $request->input('item.content');
        $page->dop_content = $request->input('item.dop_content');
        $page->link = $request->input('item.link');
        $page->seo_content = $request->input('item.seo_content');
        $page->seo_description = $request->input('item.seo_description');
        $page->seo_keywords = $request->input('item.seo_keywords');
        $page->seo_title = $request->input('item.seo_title');
        $page->save();

        $workers = collect($request->input('item.workers'))->pluck('id');
        $page->workers()->sync($workers->toArray());

        $actions = collect($request->input('item.actions'))->pluck('id');
        $page->actions()->sync($actions->toArray());

        $diseases = collect($request->input('item.diseases'))->pluck('id');
        $page->diseases()->sync($diseases->toArray());

        $technologies = collect($request->input('item.technologies'))->pluck('id');
        $page->technologies()->sync($technologies->toArray());

        foreach($request->input('item.content_blocks',[]) as $request_block){
            if($block=App\ContentBlock::find($request_block['id'])){
                $block->title=$request_block['title'];
                $block->sort=$request_block['sort'];
                $block->content=$request_block['content'];
                $block->save();
            }
        }

        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postLoadPhotoServices($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'service','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postLoadGalleryServices($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'service_gallery','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postLoadIcoServices($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'service_ico','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    // блоки в услугах
    public function postAddBlockServices(Requ $request){
        if(Gate::denies('readModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'service' => 'exists:services,id'
        ],[
                'service.exists'=>'Услуга не найдена'
            ]
        );
        $item = Service::with('content_blocks')->findOrFail($request->input('service'));
        $block = $item->content_blocks()->create(['sort'=>$item->content_blocks->count()+1]);
        $block->load('pictures');
        return response()->json(['block'=>$block]);
    }

    public function postDeleteBlockServices(Requ $request){
        if(Gate::denies('deleteModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'block.id' => 'exists:content_blocks,id'
        ],[
                'block.id.exists'=>'Запись не найдена'
            ]
        );

        $cat = App\ContentBlock::findOrFail($request->input('block.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postLoadPhotoBlock($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'content_block','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    // доп. услуги
    public function postListDopservices(){
        if(Gate::denies('readModule',6)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = DopService::get();
        return response()->json(['items'=>$items]);
    }

    public function postDeleteDopservices(Requ $request){
        if(Gate::denies('deleteModule',6)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:dop_services,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );

        $cat = DopService::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postGetDopservices(){
        if(Gate::denies('readModule',6)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = DopService::findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveDopservices(Requ $request){
        if(Gate::denies('writeModule',6)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required',
        ],[
            'item.array'=>"Ошибка входных данных",
            'item.required'=>"Ошибка входных данных",
            'item.title.required'=>'Укажите название'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new DopService;
        }else{
            $page = DopService::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->content = $request->input('item.content');
        $page->price = $request->input('item.price');
        $page->price_max = $request->input('item.price_max');
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));
    }

    // цены на услуги
    public function postListPriceServices(Requ $request){
        if(Gate::denies('readModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'service_id' => 'exists:services,id'
        ],[
                'service_id.exists'=>'Запись не найдена'
            ]
        );
        $items = Price::where('service_id',$request->input('service_id'))->orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postDeletePriceServices(Requ $request){
        if(Gate::denies('deleteModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:prices,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );

        $cat = Price::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postSetPricesServices(Requ $request){
        if(Gate::denies('writeModule',7)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required',
            'item.service_id'=>'exists:services,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название',
                'item.service_id.exists'=>'Укажите название'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new Price;
            $page->service_id = $request->input('item.service_id');
        }else{
            $page = Price::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->content = $request->input('item.content');
        $page->price = $request->input('item.price');
        $page->price_max = $request->input('item.price_max');
        $page->sort = $request->input('item.sort');
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));
    }


    // новости
    public function postListNews(){
        if(Gate::denies('readModule',5)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = News::orderBy('date','desc')->get();
        return response()->json(['items'=>$items]);
    }

    public function postDeleteNews(Requ $request){
        if(Gate::denies('deleteModule',5)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:news,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = News::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postGetNews(Requ $request){
        if(Gate::denies('readModule',5)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = News::with('pictures')->findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveNews(Requ $request){
        if(Gate::denies('writeModule',5)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required'
        ],[
            'item.array'=>"Ошибка входных данных",
            'item.required'=>"Ошибка входных данных",
            'item.title.required'=>'Укажите название'
            ]
        );

        if($request->input('item.id')=='new'){
            $page = new News;
        }else{
            $page = News::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->content = $request->input('item.content');
        $page->small_content = $request->input('item.small_content');
        $page->date = $request->input('item.date');
        $page->public = $request->input('item.public',0);
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postLoadPhotoNews($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'news','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    // акции
    public function postListActions(){
        if(Gate::denies('readModule',3)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = Action::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postDeleteActions(Requ $request){
        if(Gate::denies('deleteModule',3)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:actions,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = Action::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postGetActions(Requ $request){
        if(Gate::denies('readModule',3)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = Action::with('pictures')->findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveActions(Requ $request){
        if(Gate::denies('writeModule',3)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );

        if($request->input('item.id')=='new'){
            $page = new Action;
        }else{
            $page = Action::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->content = $request->input('item.content');
        $page->period = $request->input('item.period');
        $page->public = $request->input('item.public',0);
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postLoadPhotoActions($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'action','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postSaveSortActions(Requ $request)
    {
        if(Gate::denies('writeModule',3)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'tree'=>'required|array',
        ],[
                'tree.array'=>"Ошибка входных данных",
                'tree.required'=>"Ошибка входных данных",
            ]
        );

        $tree = $this->tree2array($request->input('tree'));
        // перебираем дерево и обновляем измененые  элементы
        foreach($tree AS $key => $row){
            if($row['sort']!=$row['sort_old']){
               Action::where('id',$row['id'])
                        ->update(array('sort'=>$row['sort']));
            }
        }
        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    // отзывы
    public function postDeleteReviews(Requ $request){
        if(Gate::denies('deleteModule',8)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:reviews,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = Review::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postGetReviews(){
        if(Gate::denies('readModule',8)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = Review::with('owner','pictures')->findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item,'owner'=>$item->owner));
    }

    public function postSaveReviews(Requ $request){
        if(Gate::denies('writeModule',8)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new Review();
        }else{
            $page = Review::findOrFail($request->input('item.id'));
        }

        if($page) {
            $page->author = $request->input('item.author');
            $page->type = $request->input('item.type');
            $page->parent = $request->input('item.parent');
            $page->content = $request->input('item.content');
            $page->public = $request->input('item.public',0);
            $page->video_link = $request->input('item.video_link');
            $page->save();
            return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));
        }
        abort(400);
    }

    public function postTableListReviews(Requ $request){
        if(Gate::denies('readModule',8)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = Review::with('owner')->whereNotNull('id');
        if($request->has('filter')) {
            foreach($request->input('filter',[]) as $field=>$value) {
                $items = $items->where($field, 'LIKE', '%' . $value . '%');
            }
        }
//        paginate($request->count);
        if($request->has('sorting')){
            if(empty($request->sorting)){
                $items = $items->orderBy('created_at', 'desc');
            }
            foreach($request->input('sorting',[]) as $field=>$asc) {
                $items = $items->orderBy($field, $asc);
            }
        }
        $items = $items->paginate($request->count);
        return response()->json(['items'=>$items]);
    }

    public function postLoadPhotoReviews($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'review','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    // вопрос-ответ
    public function postDeleteQuestions(Requ $request){
        if(Gate::denies('deleteModule',10)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:questions,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = Question::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    public function postGetQuestions(){
        if(Gate::denies('readModule',10)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = Question::findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveQuestions(Requ $request){
        if(Gate::denies('writeModule',10)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new Question();
        }else{
            $page = Question::findOrFail($request->input('item.id'));
        }

        if($page) {
            $page->author = $request->input('item.author');
            $page->dop_content = $request->input('item.dop_content');
            $page->content = $request->input('item.content');
            $page->public = $request->input('item.public',0);
            $page->faq = $request->input('item.faq',0);
            $page->date = $request->input('item.date');
            $page->save();
            return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));
        }
        abort(400);
    }

    public function postTableListQuestions(Requ $request){
        if(Gate::denies('readModule',10)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = Question::whereNotNull('id');
        if($request->has('filter')) {
            foreach($request->input('filter',[]) as $field=>$value) {
                $items = $items->where($field, 'LIKE', '%' . $value . '%');
            }
        }
//        paginate($request->count);
        if($request->has('sorting')){
            if(empty($request->sorting)){
                $items = $items->orderBy('id', 'desc');
            }
            foreach($request->input('sorting',[]) as $field=>$asc) {
                $items = $items->orderBy($field, $asc);
            }
        }
        $items = $items->paginate($request->count);
        return response()->json(['items'=>$items]);
    }

    // прайс
    public function postImportFilePrices(){
        $file = Input::file('file');
        $sheets = Excel::load($file)->get();
        $res = [];

            foreach($sheets[0]->toArray() as $row){
                if(isset($row[1])&&intval($row[1])>0){
                    $res[intval($row[1])] = $row[4];
                    DB::table('prices')
                        ->where('id', intval($row[1]))
                        ->update(['price' => isset($row[4])?$row[4]:'','price_max'=>isset($row[5])?$row[5]:'']);
                }
            }

        if(count($res)>0){
            return response()->json(array('status'=>1,'mess'=>"Обновлено ".count($res)." записей"));
        }else{
            return response()->json(array('status'=>2,'mess'=>"Внимание! Цены не обновлены!<br> Возможно структура файла нарушена, сделайте экспорт и редактируйте цены в полученом файле"));
        }

    }

    // баннер 1
    public function postDeleteBaners(Requ $request){
        if(Gate::denies('deleteModule',9)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:questions,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = App\Baner::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    public function postGetBaners(){
        if(Gate::denies('readModule',9)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = App\Baner::with('pictures')->findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveBaners(Requ $request){
        if(Gate::denies('writeModule',9)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new App\Baner();
        }else{
            $page = App\Baner::findOrFail($request->input('item.id'));
        }

        if($page) {
            $page->title = $request->input('item.title');
            $page->content = $request->input('item.content');
            $page->public = $request->input('item.public',0);
            $page->type = $request->input('item.type');
            $page->link = $request->input('item.link');
            $page->save();
            return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));
        }
        abort(400);
    }

    public function postListBaners(){
        if(Gate::denies('readModule',9)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = App\Baner::orderBy('sort')->where('type',1)->get();
        return response()->json(['items'=>$items]);
    }

    public function postLoadPhotoBaners($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'baner','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postSaveSortBaners(Requ $request)
    {
        if(Gate::denies('writeModule',9)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'tree'=>'required|array',
        ],[
                'tree.array'=>"Ошибка входных данных",
                'tree.required'=>"Ошибка входных данных",
            ]
        );
        $parent_col = 'title';
        $tree = $this->tree2array($request->input('tree'),$parent_col);

        // перебираем дерево и обновляем измененые  элементы
        foreach($tree AS $key => $row){
            $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
            if($row['sort']!=$row['sort_old'] || $parent!=$row[$parent_col]){
                if($parent!=$row[$parent_col]){
                    $p = \App\Baner::find($row['id']);
                    $p->sort=$row['sort'];
                    //$p->{$parent_col}=$parent;
                    //$p->link = $p->link;// для запуска обновления url
                    $p->save();
                }else{
                    \App\Baner::where('id',$row['id'])
                        ->update(array('sort'=>$row['sort']/*,$parent_col=>$parent*/));
                }
            }
        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    // баннер 2
    public function postDeleteBaners2(Requ $request){
        return $this->postDeleteBaners($request);
    }

    public function postGetBaners2(){
        return $this->postGetBaners();
    }

    public function postSaveBaners2(Requ $request){
        return $this->postSaveBaners($request);
    }

    public function postListBaners2(){
        if(Gate::denies('readModule',9)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = App\Baner::orderBy('sort')->where('type',2)->get();
        return response()->json(['items'=>$items]);
    }

    // заболевания
    public function postListDiseases(){
        if(Gate::denies('readModule',13)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = App\Disease::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postDeleteDiseases(Requ $request){
        if(Gate::denies('deleteModule',13)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:diseases,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = App\Disease::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postGetDiseases(Requ $request){
        if(Gate::denies('readModule',13)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = App\Disease::findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveDiseases(Requ $request){
        if(Gate::denies('writeModule',13)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );

        if($request->input('item.id')=='new'){
            $page = new App\Disease();
        }else{
            $page = App\Disease::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postSaveSortDiseases(Requ $request)
    {
        if(Gate::denies('writeModule',13)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'tree'=>'required|array',
        ],[
                'tree.array'=>"Ошибка входных данных",
                'tree.required'=>"Ошибка входных данных",
            ]
        );

        $tree = $this->tree2array($request->input('tree'));
        // перебираем дерево и обновляем измененые  элементы
        foreach($tree AS $key => $row){
            if($row['sort']!=$row['sort_old']){
                App\Disease::where('id',$row['id'])
                    ->update(array('sort'=>$row['sort']));
            }
        }
        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    // галерея
    public function postDeleteGallery(Requ $request){
        if(Gate::denies('deleteModule',14)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:questions,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = App\Gallery::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    public function postGetGallery(){
        if(Gate::denies('readModule',14)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = App\Gallery::with('pictures')->findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveGallery(Requ $request){
        if(Gate::denies('writeModule',14)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new App\Gallery();
        }else{
            $page = App\Gallery::findOrFail($request->input('item.id'));
        }

        if($page) {
            $page->title = $request->input('item.title');
            $page->content = $request->input('item.content');
            $page->public = $request->input('item.public',0);
            $page->save();
            return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));
        }
        abort(400);
    }

    public function postListGallery(){
        if(Gate::denies('readModule',14)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = App\Gallery::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postLoadPhotoGallery($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'gallery','node_id'=>intval($id),'th_w'=>260,'th_h'=>175))));
    }

    // специализации
    public function postListSpecializations(){
        if(Gate::denies('readModule',15)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = App\Specialization::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postDeleteSpecializations(Requ $request){
        if(Gate::denies('deleteModule',15)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:specializations,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = App\Specialization::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postGetSpecializations(Requ $request){
        if(Gate::denies('readModule',15)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = App\Specialization::findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveSpecializations(Requ $request){
        if(Gate::denies('writeModule',15)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );

        if($request->input('item.id')=='new'){
            $page = new App\Specialization();
        }else{
            $page = App\Disease::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postSaveSortSpecializations(Requ $request)
    {
        if(Gate::denies('writeModule',15)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'tree'=>'required|array',
        ],[
                'tree.array'=>"Ошибка входных данных",
                'tree.required'=>"Ошибка входных данных",
            ]
        );

        $tree = $this->tree2array($request->input('tree'));
        // перебираем дерево и обновляем измененые  элементы
        foreach($tree AS $key => $row){
            if($row['sort']!=$row['sort_old']){
                App\Specialization::where('id',$row['id'])
                    ->update(array('sort'=>$row['sort']));
            }
        }
        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    // клиники
    public function postListClinics(){
        if(Gate::denies('readModule',16)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = App\Clinic::all();
        return response()->json(['items'=>$items]);
    }

    public function postDeleteClinics(Requ $request){
        if(Gate::denies('deleteModule',16)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:clinics,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = App\Clinic::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));
    }

    public function postGetClinics(Requ $request){
        if(Gate::denies('readModule',16)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = App\Clinic::findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveClinics(Requ $request){
        if(Gate::denies('writeModule',16)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );

        if($request->input('item.id')=='new'){
            $page = new App\Clinic();
        }else{
            $page = App\Clinic::findOrFail($request->input('item.id'));
        }
        $page->title = $request->input('item.title');
        $page->address = $request->input('item.address');
        $page->grafik = $request->input('item.grafik');
        $page->phone = $request->input('item.phone');
        $page->coords = $request->input('item.coords');
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    // технологии
    public function postListTechnologies(){
        if(Gate::denies('readModule',19)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = \App\Technology::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postSaveSortTechnologies(Requ $request)
    {
        if(Gate::denies('writeModule',19)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'tree'=>'required|array',
        ],[
                'tree.array'=>"Ошибка входных данных",
                'tree.required'=>"Ошибка входных данных",
            ]
        );
        $parent_col = 'technology_id';
        $tree = $this->tree2array($request->input('tree'),$parent_col);

        // перебираем дерево и обновляем измененые  элементы
        foreach($tree AS $key => $row){
            $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
            if($row['sort']!=$row['sort_old'] || $parent!=$row[$parent_col]){
                if($parent!=$row[$parent_col]){
                    $p = \App\Technology::find($row['id']);
                    $p->sort=$row['sort'];
                    $p->{$parent_col}=$parent;
                    $p->link = $p->link;// для запуска обновления url
                    $p->save();
                }else{
                    \App\Technology::where('id',$row['id'])
                        ->update(array('sort'=>$row['sort'],$parent_col=>$parent));
                }
            }
        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    public function postDeleteTechnologies(Requ $request){
        if(Gate::denies('deleteModule',19)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:Technologies,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );

        $cat = \App\Technology::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    public function postGetTechnologies(){
        if(Gate::denies('readModule',19)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = \App\Technology::with('pictures','pictures_top')->findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveTechnologies(Requ $request){
        if(Gate::denies('writeModule',19)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите имя',
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new \App\Technology;
        }else{
            $page = \App\Technology::findOrFail($request->input('item.id'));
        }

        $page->title = $request->input('item.title');
        $page->public = $request->input('item.public',0);
        $page->content = $request->input('item.content');
        $page->small_content = $request->input('item.small_content');
        $page->link = $request->input('item.link');
        $page->seo_content = $request->input('item.seo_content');
        $page->seo_description = $request->input('item.seo_description');
        $page->seo_keywords = $request->input('item.seo_keywords');
        $page->seo_title = $request->input('item.seo_title');
        $page->video_link = $request->input('item.video_link');
        $page->save();

        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postLoadPhotoTechnologies($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'techno','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    public function postLoadPhotoTopTechnologies($id){
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'techno_top','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

    // видео
    public function postDeleteVideo(Requ $request){
        if(Gate::denies('deleteModule',20)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.id' => 'exists:videos,id'
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.id.exists'=>'Запись не найдена'
            ]
        );
        $cat = \App\Video::findOrFail($request->input('item.id'));
        $cat->delete();
        return response()->json(array('status' => 1, "mess" => "Удалено"));

    }

    public function postGetVideo(){
        if(Gate::denies('readModule',20)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = \App\Video::findOrFail(Request::input('id'));
        return response()->json(array('item'=>$item));
    }

    public function postSaveVideo(Requ $request){
        if(Gate::denies('writeModule',20)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );
        if($request->input('item.id')=='new'){
            $page = new \App\Video();
        }else{
            $page = \App\Video::findOrFail($request->input('item.id'));
        }

        if($page) {
            $page->title = $request->input('item.title');
            $page->link = $request->input('item.link');
            $page->public = $request->input('item.public',0);
            $page->save();
            return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));
        }
        abort(400);
    }

    public function postListVideo(){
        if(Gate::denies('readModule',20)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $items = \App\Video::orderBy('sort')->get();
        return response()->json(['items'=>$items]);
    }

    public function postSaveSortVideo(Requ $request)
    {
        if(Gate::denies('writeModule',20)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'tree'=>'required|array',
        ],[
                'tree.array'=>"Ошибка входных данных",
                'tree.required'=>"Ошибка входных данных",
            ]
        );
        $parent_col = 'title';
        $tree = $this->tree2array($request->input('tree'),$parent_col);

        // перебираем дерево и обновляем измененые  элементы
        foreach($tree AS $key => $row){
            $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
            if($row['sort']!=$row['sort_old'] || $parent!=$row[$parent_col]){
                if($parent!=$row[$parent_col]){
                    $p = \App\Video::find($row['id']);
                    $p->sort=$row['sort'];
                    //$p->{$parent_col}=$parent;
                    //$p->link = $p->link;// для запуска обновления url
                    $p->save();
                }else{
                    \App\Video::where('id',$row['id'])
                        ->update(array('sort'=>$row['sort']/*,$parent_col=>$parent*/));
                }
            }
        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    // блог
    public function postListBlog(){
        if(Gate::denies('readModule',21)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $pages = App\Blog::orderBy('date')->get();
        return response()->json(['items'=>$pages]);
    }

    public function postSaveSortBlog()
    {
        if(Gate::denies('writeModule',21)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $tree = Request::only('tree');
        if(!$tree){
            return response()->json([
                'message' => 'Bad Request'
            ], 400);
        }
        $tree = $this->tree2array($tree['tree'],'blog_id');

        // перебираем дерево и добавляем новые|обновляем измененые  элементы попутно меняя id в массиве на созданный
        foreach($tree AS $key => $row){
            $parent = isset($tree[$row['__parent__']]['id'])?$tree[$row['__parent__']]['id']:0;
            if($row['sort']!=$row['sort_old'] || $parent!=$row['blog_id']){
                if($parent!=$row['blog_id']){
                    $p = App\Blog::find($row['id']);
                    $p->sort=$row['sort'];
                    $p->blog_id=$parent;
                    $p->link = $p->link;// для запуска обновления url
                    $p->save();
                }else{
                    App\Blog::where('id',$row['id'])
                        ->update(array('sort'=>$row['sort'],'blog_id'=>$parent));
                }

            }
        }

        return response()->json(array('status'=>1,"mess"=>"Сохранено"));
    }

    public function postDeleteBlog(){
        if(Gate::denies('deleteModule',21)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $item = Request::input('item');
        if(!$item){
            abort(400);
        }
        $cat = App\Blog::find($item['id']);
        if($cat) {
            $cat->delete();
            return response()->json(array('status' => 1, "mess" => "Удалено"));
        }
        abort(400);
    }

    public function postGetBlog(){
        if(Gate::denies('readModule',21)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $page = App\Blog::with('parent','childs','gallery')->findOrFail(Request::input('id'));
        return response()->json(array('item'=>$page));
    }

    public function postSaveBlog(Requ $request){
        if(Gate::denies('writeModule',21)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        $this->validate($request, [
            'item'=>'required|array',
            'item.title' => 'required',
        ],[
                'item.array'=>"Ошибка входных данных",
                'item.required'=>"Ошибка входных данных",
                'item.title.required'=>'Укажите название'
            ]
        );

        if($request->input('item.id')=='new'){
            $page = new App\Blog();
            //$page->blog_id = $request->input('item.blog_id',0);
        }else{
            $page = App\Blog::findOrFail($request->input('item.id'));
        }

        $page->title = $request->input('item.title');
        $page->link = $request->input('item.link');
        $page->content = $request->input('item.content');
        $page->public = $request->input('item.public',0);
        $page->date = $request->input('item.date',new Carbon());
        $page->small_content = $request->input('item.small_content');
        $page->seo_description = $request->input('item.seo_description');
        $page->seo_keywords = $request->input('item.seo_keywords');
        $page->seo_title = $request->input('item.seo_title');
        $page->seo_content = $request->input('item.seo_content');
        $page->save();
        return response()->json(array('status' => 1, "mess" => "Сохранено",'id'=>$page->id));

    }

    public function postLoadGalleryBlog($id){
        if(Gate::denies('writeModule',21)) {
            return response()->json(['mess' => 'Нет доступа'], 403);
        }
        return response()->json(array('picture'=>Pictures::loadPicture(array('link'=>'blog','node_id'=>intval($id),'th_w'=>200,'th_h'=>200))));
    }

}
