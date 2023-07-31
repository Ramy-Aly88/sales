<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Inv_itemcard_categorie;
use Illuminate\Http\Request;
use App\Http\Requests\Inv_itemcard_categoriesRequest;


class Inv_itemcard_categories extends Controller
{
    
    public function index()
    {
        $data=Inv_itemcard_categorie::select()->orderby('id','asc')->paginate(PAGINATION_COUNT);

        if(!empty($data)){
            foreach($data as $info){
            $info->added_by_admin=Admin::where('id',$info->added_by)->value('name');
            if($info->updated_by>0 and $info->updated_by!=null){
            $info->updated_by_admin=Admin::where('id',$info->updated_by)->value('name');
                }

            }
        }

       return view('admin.inv_itemcard_categories.index',['data'=>$data]); 
    }

   
    public function create()
    {
        return view('admin.inv_itemcard_categories.create');
    }

   
    public function store(Inv_itemcard_categoriesRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            //check if not exsits
            $checkExists = Inv_itemcard_categorie::where(['name' => $request->name, 'com_code' => $com_code])->first();
            if ($checkExists == null) {
                $data['name'] = $request->name;
                $data['active'] = $request->active;
                $data['created_at'] = date("Y-m-d H:i:s");
                $data['added_by'] = auth()->user()->id;
                $data['com_code'] = $com_code;
                $data['date'] = date("Y-m-d");
                Inv_itemcard_categorie::create($data);
                return redirect()->route('inv_itemcard_categories.index')->with(['success' => 'لقد تم اضافة الصنف بنجاح']);
            }
            else {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الصنف مسجل من قبل'])
                    ->withInput();
            }
        } catch (\Exception $ex) {

            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

 
    public function show($id)
    {
     
    }

    public function edit($id)
    {
        $data=Inv_itemcard_categorie::select()->find($id);
        return view('admin.inv_itemcard_categories.edit',['data'=>$data]);
    }

    
    public function update($id,Inv_itemcard_categoriesRequest $request){
        try{
        $com_code=auth()->user()->com_code;
        $data=Inv_itemcard_categorie::select()->find($id);
        if(empty($data)){
        return redirect()->route('inv_itemcard_categories.index')->with(['error'=>'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
        }
        $checkExists=Inv_itemcard_categorie::where(['name'=>$request->name,'com_code'=>$com_code])->where('id','!=',$id)->first();
        if( $checkExists!=null){
        return redirect()->back()
        ->with(['error'=>'عفوا اسم الصنف مسجل من قبل'])
        ->withInput();
        }

        $data_to_update['name']=$request->name;
        $data_to_update['active']=$request->active;
        $data_to_update['updated_by']=auth()->user()->id;
        $data_to_update['updated_at']=date("Y-m-d H:i:s");
        Inv_itemcard_categorie::where(['id'=>$id,'com_code'=>$com_code])->update($data_to_update);
        return redirect()->route('inv_itemcard_categories.index')->with(['success'=>'لقد تم تحديث البيانات بنجاح']);
        }catch(\Exception $ex){
        return redirect()->back()
        ->with(['error'=>'عفوا حدث خطأ ما'.$ex->getMessage()])
        ->withInput();
        }
        }


        public function destory(){

        }
    
        
        public function delete($id){
            try{
            $Sales_matrial_types_row=inv_itemcard_categorie::find($id);
            if(!empty($Sales_matrial_types_row)){
                $flag=$Sales_matrial_types_row->delete();
                if($flag){
                    return redirect()->back()
                    ->with(['success'=>'   تم حذف البيانات بنجاح']);
                }else{
                    return redirect()->back()
                    ->with(['error'=>'عفوا حدث خطأ ما']);
                              
                }
            }else{
                return redirect()->back()
                ->with(['error'=>'عفوا غير قادر الي الوصول للبيانات المطلوبة']);
            }
            
            
            }catch(\Exception $ex){
                
                    return redirect()->back()
                    ->with(['error'=>'عفوا حدث خطأ ما'.$ex->getMessage()]);
                              
                
            
                }
                
               } 
    }
    